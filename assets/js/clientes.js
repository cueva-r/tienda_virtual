const tableLista = document.querySelector('#tableListaProductos tbody');
const tblPendietes = document.querySelector('#tblPendietes tbody');
const tblProductos = document.querySelector('#tblProductos tbody');

let tblCalificacion;

const estadoEnviado = document.querySelector('#estadoEnviado');
const estadoProceso = document.querySelector('#estadoProceso');
const estadoCompletado = document.querySelector('#estadoCompletado');

document.addEventListener('DOMContentLoaded', function () {
    if (tableLista) {
        getListaProductos();
    }

    //cargar datos pendientes
    $('#tblPendietes').DataTable({
        ajax: {
            url: base_url + 'clientes/listarPendientes',
            dataSrc: ''
        },
        columns: [
            { data: 'id_transaccion' },
            { data: 'monto' },
            { data: 'fecha' },
            { data: 'accion' }
        ],
        language,
        dom,
        buttons
    });

    tblCalificacion = $('#tblProductos').DataTable({
        ajax: {
            url: base_url + 'clientes/listarProductos',
            dataSrc: ''
        },
        columns: [
            { data: 'id_producto' },
            { data: 'producto' },
            { data: 'precio' },
            { data: 'cantidad' },
            { data: 'calificacion' }
        ],
        language,
        dom,
        buttons
    });
});


function getListaProductos() {
    let html = '';
    const url = base_url + 'principal/listaProductos';
    const http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(JSON.stringify(listaCarrito));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            if (res.totalPaypal > 0) {
                res.productos.forEach(producto => {
                    html += `
                        <tr>
                        <td>
                            <img class="img-thumbnail rounded-circle" src="${producto.imagen}" alt="" width="100">
                        </td>
                        <td>${producto.nombre}</td>
                        <td>
                            <span class="badge bg-primary">${res.moneda + ' ' + producto.precio}</span>
                        </td>
                        <td>
                            <span class="badge bg-warning">${producto.cantidad}</span>
                        </td>
                        <td>
                            ${producto.subTotal}
                        </td>
                    </tr>`;
                });
                tableLista.innerHTML = html;
                document.querySelector('#totalProducto').textContent = 'Total a pagar: ' + res.moneda + ' ' + res.total;
                botonPaypal(res.totalPaypal);
            } else {
                tableLista.innerHTML = `
                    <tr style="font-family: cursive;">
                        <td colspan="5" class="text-center">Carrito vacío</td>
                    </tr>
                `;
            }
        }
    }
}

function botonPaypal(total) {
    paypal.Buttons({
        // Order is created on the server and the order id is returned
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: total
                    }
                }]
            });
        },
        // Finalize the transaction on the server after payer approval
        onApprove: (data, actions) => {
            return actions.order.capture().then(function (orderData) {
                registrarPedido(orderData)
            });
        }
    }).render('#paypal-button-container');
}

function registrarPedido(datos) {
    const url = base_url + 'clientes/registrarPedido';
    const http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(JSON.stringify({
        pedidos: datos,
        productos: listaCarrito
    }));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            Swal.fire('Aviso', res.msg, res.icono);
            if (res.icono == 'success') {
                localStorage.removeItem('listaCarrito');
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            }
        }
    }
}

function verPedido(idPedido) {
    estadoEnviado.classList.remove('services-icon-wap');
    estadoProceso.classList.remove('services-icon-wap');
    estadoCompletado.classList.remove('services-icon-wap');
    const mPedido = new bootstrap.Modal(document.getElementById('modalPedido'));
    const url = base_url + 'clientes/verPedidos/' + idPedido;
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let html = '';
            if (res.pedido.proceso == 1) {
                estadoEnviado.classList.add('services-icon-wap')
            } else if(res.pedido.proceso == 2){
                estadoProceso.classList.add('services-icon-wap')
            }else{
                estadoCompletado.classList.add('services-icon-wap')
            }
            res.productos.forEach(row => {
                let subTotal = parseFloat(row.precio) * parseInt(row.cantidad);
                html += `
                <tr>
                    <td>${row.producto}</td>
                    <td>
                        <span class="badge bg-primary">${res.moneda + ' ' + row.precio}</span>
                    </td>
                    <td>
                        <span class="badge bg-warning">${row.cantidad}</span>
                    </td>
                    <td>
                        ${subTotal.toFixed(2)}
                    </td>
                </tr>`;
            });
            document.querySelector('#tablePedidos tbody').innerHTML = html;
            mPedido.show();
        }
    }
}

function agregarCalificacion(id_producto, cantidad) {
    const url = base_url + 'clientes/agregarCalificacion';
    const http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(JSON.stringify({
        id_producto: id_producto,
        cantidad: cantidad
    }));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            Swal.fire('Aviso', res.msg, res.icono);
            if (res.icono == 'success') {
                tblCalificacion.ajax.reload();
            }
        }
    }
}