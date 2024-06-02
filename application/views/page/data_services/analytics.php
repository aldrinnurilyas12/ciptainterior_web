<!-- application/views/chart_view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter Chart.js Example</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
    <script src="<?php echo base_url(); ?>assets/plugins/chart.js/chart.js"></script>
    <!-- Include Chart.js -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <?php

    $total_cust = $total_account->row_array();
    $total_orders = $total_order->row_array();
    $total_pendapatan = $total_revenue->row_array();
    $rev = $revenues->row_array()

    ?>


    <div style="background-color:white; display:block; justify-content:center;" class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $total_orders['total_order'] ?></h3>
                            <p>Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo base_url() ?>datapemesanan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo "Rp" . number_format($rev['revenue']) ?></h3>
                            <p>Pendapatan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $total_cust['total_customer'] ?></h3>
                            <p>Pelanggan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo base_url() ?>datapelanggan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>
                            <p>Testimonial</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?php echo base_url() ?>datatestimonial" class="small-box-footer">More info
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
        </section>


        <!-- THIS SEGMENT FOR CHARTS -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- FIRST CHART -->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">

                                    <h1 class="card-title">Pendapatan Penjualan Harian</h1>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">

                                <!-- /.d-flex -->

                                <div style="overflow-y: scroll;height: 300px;" class="position-relative mb-4">
                                    <canvas id="line-saleschart"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-primary"></i> This Week
                                    </span>

                                    <span>
                                        <i class="fas fa-square text-gray"></i> Last Week
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">

                        <!-- Category chart -->
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-chart-bar"></i>
                                    Penjualan per Kategori Produk
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">

                                <canvas height="160px;" id="piechart-category"></canvas>

                            </div>
                            <!-- /.card-body-->
                        </div>
                        <!-- /.card -->
                    </div>

                    <!-- seconds charts -->
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">
                                        <i class="far fa-chart-bar"></i>
                                        Penjualan Produk
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>

                                </div>
                            </div>


                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg"><?php echo "Rp " . number_format($total_pendapatan['total_revenue']); ?></span>
                                        <span>Sales Over Time</span>
                                    </p>
                                    <p class="ml-auto d-flex flex-column text-right">
                                        <span class="text-success">
                                            <i class="fas fa-arrow-up"></i> 33.1%
                                        </span>
                                        <span class="text-muted">Since last month</span>
                                    </p>
                                </div>


                                <div class="position-relative mb-4">
                                    <canvas style="height: 185px;" id="barchart-sales">
                                    </canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-primary"></i> This year
                                    </span>

                                    <span>
                                        <i class="fas fa-square text-gray"></i> Last year
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->

                    </div>

                    <!-- Products-table -->
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">
                                        <i class="far fa-chart-bar"></i>
                                        Penjualan Produk
                                    </h3>
                                    <div class="card-tools">
                                        <a href="#" class="btn btn-tool btn-sm">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="btn btn-tool btn-sm">
                                            <i class="fas fa-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Produk</th>
                                                <th scope="col">Foto</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Terjual</th>
                                                <th scope="col">Pendapatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $number = 1;
                                            foreach ($products_statistic->result() as $prd_stats) {

                                            ?>
                                                <tr>
                                                    <td><?php echo $number++; ?></td>
                                                    <td><?php echo $prd_stats->nama_produk; ?></td>
                                                    <td>
                                                        <img style="width: 40px;height:40px;border-radius:5px;" src="<?php echo base_url() . '/uploads/' . $prd_stats->foto; ?>">

                                                    </td>
                                                    <td><?php echo  "Rp " . number_format($prd_stats->total_harga); ?></td>
                                                    <td>

                                                        <?php
                                                        if ($prd_stats->total_sold == null) {
                                                            echo "Belum terjual";
                                                        } else {
                                                            echo $prd_stats->total_sold;
                                                        }

                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($prd_stats->revenue == null) {
                                                            echo "-";
                                                        } else {
                                                            echo "Rp " . number_format($prd_stats->revenue);
                                                        }

                                                        ?>
                                                    </td>
                                                </tr>

                                        </tbody>
                                    <?php } ?>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">
                                                Total Pendapatan:
                                            </th>
                                            <td style="font-weight: 600;padding:10px;" colspan="2">
                                                <?php echo "Rp " . number_format($total_pendapatan['total_revenue']); ?>
                                            </td>
                                        </tr>


                                        </tr>
                                    </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php

    $products = [];
    $total = [];
    $revenues = [];


    foreach ($revenue->result() as $rvn) {
        $products[] = $rvn->nama_produk;
        $total[] = $rvn->total_sold;
        $revenues[] = $rvn->revenue;
    }
    ?>



    <!-- data category -->

    <?php
    $category = [];
    $sold_category = [];
    foreach ($category_sold->result() as $catsold) {
        $category[] = $catsold->kategori;
        $sold_category[] = $catsold->total_sold;
    }
    ?>
    <!-- end kategori -->


    <!-- REVENUE MONTH -->
    <?php
    $revenuemonth = [];

    $tanggal = [];

    foreach ($revenuechartmonth->result() as $revchart) {
        $revenuemonth[] = $revchart->revenue;
        $tanggal[] = $revchart->tanggal;
    }
    ?>


    <script>
        'use strict'

        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }

        var mode = 'index'
        var intersect = true


        // data for line chart
        var data = {
            labels: <?php echo json_encode($tanggal) ?>,
            datasets: [{
                label: 'Revenue of Month',
                data: <?php echo json_encode($revenuemonth) ?>,
                backgroundColor: 'transparent', // Set background color to transparent
                borderColor: 'rgba(153, 102, 255)',
                borderWidth: 2.4 // Define border width
            }]
        };

        var ctx = document.getElementById('line-saleschart').getContext('2d');

        var salesChart = new Chart(ctx, {
            type: 'line',
            data: data

        });


        // END

        // Kategori Bar

        var data_kategori = {
            labels: <?php echo json_encode($category); ?>,
            datasets: [{
                label: 'Pendapatan by Produk',
                data: <?php echo json_encode($sold_category) ?>,
                backgroundColor: [
                    'rgba(153, 102, 255)',
                    '#FF6384',
                    '#FFCE56',
                    '#36A2EB',
                    'rgba(153, 102, 255)'

                ]
            }]
        };

        var barchart = document.getElementById('piechart-category').getContext('2d');
        var barChart = new Chart(barchart, {
            type: 'pie',
            data: data_kategori,


            // BAR CHART
        });

        var data_bar = {
            labels: <?php echo json_encode($products); ?>,
            datasets: [{
                label: 'Pendapatan by Produk',
                data: <?php echo json_encode($revenues) ?>,
                backgroundColor: [
                    'rgba(153, 102, 255)',
                    'rgba(153, 102, 255)',
                    'rgba(153, 102, 255)',
                    'rgba(153, 102, 255)',
                    'rgba(153, 102, 255)'

                ]
            }]
        };

        var barchart = document.getElementById('barchart-sales').getContext('2d');
        var barChart = new Chart(barchart, {
            type: 'bar',
            data: data_bar,
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    mode: mode,
                    intersect: intersect
                },
                hover: {
                    mode: mode,
                    intersect: intersect
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: true,
                            color: 'rgba(0, 0, 0, .2)',
                            zeroLineColor: 'transparent'
                        },

                    }],
                    xAxes: [{
                        display: true,

                        barPercentage: 0.5,
                        barThickness: 40,
                        categorySpacing: 5,

                        ticks: {
                            autoSkip: false,
                            maxRotation: 40,
                            minRotation: 40
                        },
                        gridLines: {
                            display: false
                        }
                    }]
                }
            }
        });
    </script>

</body>

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->

<script src="<?php echo base_url(); ?>assets/plugins/chart.js/chart.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard3.js"></script>

</html>