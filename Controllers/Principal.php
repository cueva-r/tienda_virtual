<?php
class Principal extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    //vista about
    public function about()
    {
        $data['perfil'] = 'no';
        $data['title'] = 'Nuestro equipo';
        $this->views->getView('principal', "about", $data);
    }

    //vista shop
    public function shop($page)
    {
        $data['perfil'] = 'no';
        $pagina = (empty($page)) ? 1 : $page;
        $porPagina = 20;
        $desde = ($pagina - 1) * $porPagina;
        $data['title'] = 'Nuestros productos';
        $data['productos'] = $this->model->getProductos($desde, $porPagina);
        $data['pagina'] = $pagina;
        $total = $this->model->getTotalProductos();
        $data['total'] = ceil($total['total'] / $porPagina);
        $this->views->getView('principal', "shop", $data);
    }

    //vista detail
    public function detail($id_producto)
    {
        $data['perfil'] = 'no';
        $data['producto'] = $this->model->getProducto($id_producto);
        $id_categoria = $data['producto']['id_categoria'];
        $data['relacionados'] = $this->model->getAleatorios($id_categoria, $data['producto']['id']);
        $data['title'] = $data['producto']['nombre'];
        $this->views->getView('principal', "detail", $data);
    }

    //vista categorias
    public function categorias($datos)
    {
        $data['perfil'] = 'no';
        $id_categoria = 1;
        $page = 1;
        $array = explode(',', $datos);
        if (isset($array[0])) {
            if (!empty($array[0])) {
                $id_categoria = $array[0];
            }
        }
        $array = explode(',', $datos);
        if (isset($array[1])) {
            if (!empty($array[1])) {
                $page = $array[1];
            }
        }
        $pagina = (empty($page)) ? 1 : $page;
        $porPagina = 4;
        $desde = ($pagina - 1) * $porPagina;

        $data['pagina'] = $pagina;
        $total = $this->model->getTotalProductosCat($id_categoria);
        $data['total'] = ceil($total['total'] / $porPagina);

        $data['productos'] = $this->model->getProductosCat($id_categoria, $desde, $porPagina);
        $data['title'] = 'Categorias';
        $data['id_categoria'] = $id_categoria;
        $this->views->getView('principal', "categorias", $data);
    }

    //vista contactos
    public function contactos($id_producto)
    {
        $data['perfil'] = 'no';
        $data['title'] = 'Contactenos';
        $this->views->getView('principal', "contact", $data);
    }

    //vista lista deseos
    public function deseo($id_producto)
    {
        $data['perfil'] = 'no';
        $data['title'] = 'Tu lista de deseos';
        $this->views->getView('principal', "deseo", $data);
    }

    //obtener productos a travez de la lista de deseos
    public function listaProductos()
    {
        $datos = file_get_contents('php://input');
        $json = json_decode($datos, true);
        $array['productos'] = array();
        $total = 0.00;
        if (!empty($json)) {
            foreach ($json as $producto) {
                $result = $this->model->getProducto($producto['idProducto']);
                $data['id'] = $result['id'];
                $data['nombre'] = $result['nombre'];
                $data['precio'] = $result['precio'];
                $data['cantidad'] = $producto['cantidad'];
                $data['imagen'] = $result['imagen'];
                $subTotal = $result['precio'] * $producto['cantidad'];
                $data['subTotal'] = number_format($subTotal, 2);
                $total += $subTotal;
                array_push($array['productos'], $data);
            }
        }
        $array['total'] = number_format($total, 2);
        $array['totalPaypal'] = $total;
        $array['moneda'] = MONEDA;
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function busqueda($valor)
    {
        $data = $this->model->getBusqueda($valor);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}
