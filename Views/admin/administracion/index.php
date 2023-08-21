<?php include_once 'Views/template/header-admin.php' ?>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-10 border-warning border-start border-0 border-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0">Pedidos pendientes</p>
                        <h4 class="my-1 text-warning"><?php echo $data['pendientes']['total']; ?></h4>
                    </div>
                    <div class="text-warning ms-auto font-35"><i class="fas fa-exclamation-circle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 border-info border-start border-0 border-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0">Pedidos en proceso</p>
                        <h4 class="my-1 text-info"><?php echo $data['procesos']['total']; ?></h4>
                    </div>
                    <div class="text-info ms-auto font-35"><i class="fas fa-spinner"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10  border-success border-start border-0 border-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0">Pedidos finalizados</p>
                        <h4 class="text-success my-1"><?php echo $data['finalizados']['total']; ?></h4>
                    </div>
                    <div class="text-success ms-auto font-35"><i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 border-danger border-start border-0 border-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0">Total productos</p>
                        <h4 class="my-1 text-danger"><?php echo $data['productos']['total']; ?></h4>
                    </div>
                    <div class="text-danger ms-auto font-35"><i class="fas fa-cart-arrow-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->

<div class="row">
    <div class="col-12 col-lg-4">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Pedidos</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-container-2">
                    <canvas id="reportePedidos" style="display: block; box-sizing: border-box; height: 210px; width: 312px;" width="624" height="420"></canvas>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">Finalizados <span class="badge bg-success rounded-pill"><?php echo $data['finalizados']['total']; ?></span>
                </li>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Proceso <span class="badge bg-primary rounded-pill"><?php echo $data['procesos']['total']; ?></span>
                </li>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Pendientes <span class="badge bg-warning text-dark rounded-pill"><?php echo $data['pendientes']['total']; ?></span>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--end row-->

<?php include_once 'Views/template/footer-admin.php' ?>

<script>
    // chart 2

    var ctx = document.getElementById("reportePedidos").getContext('2d');
    var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke1.addColorStop(0, '#fc4a1a');
    gradientStroke1.addColorStop(1, '#f7b733');

    var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke2.addColorStop(0, '#4776e6');
    gradientStroke2.addColorStop(1, '#8e54e9');

    var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke3.addColorStop(0, '#42e695');
    gradientStroke3.addColorStop(1, '#3bb2b8');

    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Pendientes", "Proceso", "Finalizados"],
            datasets: [{
                backgroundColor: [
                    gradientStroke1,
                    gradientStroke2,
                    gradientStroke3
                ],
                hoverBackgroundColor: [
                    gradientStroke1,
                    gradientStroke2,
                    gradientStroke3
                ],
                data: [<?php echo $data['pendientes']['total']; ?>,
                <?php echo $data['procesos']['total']; ?>, 
                <?php echo $data['finalizados']['total']; ?>],
                borderWidth: [1, 1, 1]
            }]
        },
        options: {
            maintainAspectRatio: false,
            cutout: 82,
            plugins: {
                legend: {
                    display: false,
                }
            }

        }
    });
</script>

<script src="<?php echo BASE_URL; ?>assets/js/index.js"></script>

</body>

</html>