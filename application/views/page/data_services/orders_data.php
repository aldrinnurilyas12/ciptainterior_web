<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data pemesanan cipta interior</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href=<?php echo base_url("assets/dist/css/adminlte.min.css"); ?>>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href=<?php echo base_url("assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"); ?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"); ?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"); ?>>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href=<?php echo base_url("assets/dist/css/adminlte.min.css"); ?>>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a style="margin-right:10px;" class="btn btn-primary" href="<?php echo base_url(); ?>login/logout">Log Out</span>
                    </a>

                </li>
            </ul>
        </nav>

        <div class="content-wrapper">


            <div style="font-family: Inter, sans-serif;width:100%" class="w3-container">
                <div class="w3-bar w3-black">
                    <button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event,'done')">Selesai</button>
                    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'confirmed')">Sudah
                        Konfirmasi</button>
                    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'not-confirmed')">Belum
                        Konfirmasi</button>
                </div>

                <!-- order DONE -->
                <div id="done" class="w3-container w3-border city">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">

                                <div class="card">

                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <h1 style="font-size: 26px;" class="card-title">Data Pemesanan selesai
                                        </h1>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>

                                                <tr>
                                                    <th>Id Pemesanan</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Alamat</th>
                                                    <th>Nama Produk</th>
                                                    <th>Harga</th>
                                                    <th>Banyak</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th>Tanggal Pesan</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($order_complete->result() as $row) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row->id_pemesanan; ?></td>
                                                        <td><?php echo $row->nama_lengkap; ?></td>
                                                        <td><?php echo $row->alamat; ?>
                                                            <?php echo $row->telepon; ?></td>
                                                        <td><?php echo $row->nama_produk; ?></td>
                                                        <td style="font-size: 14px;">
                                                            <?php echo "Rp "; ?><?php echo number_format($row->total_harga); ?>
                                                        </td>
                                                        <td><?php echo $row->quantity; ?></td>
                                                        <td><?php echo "Rp "; ?><?php echo number_format($row->grand_total); ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo $row->status_code == '0' ? '<p style="width:90px;color:red;font-weight:bold; font-size:14px;">Menunggu Konfirmasi</p>'
                                                                : ($row->status_code == '1'
                                                                    ? '<p style="width:90px;color:purple;font-weight:bold; font-size:14px;" >Sudah dikonfirmasi</p>'
                                                                    : '<p style="width:90px;color:green;font-weight:bold; font-size:14px;" >Selesai</p>');
                                                            ?>
                                                        </td>

                                                        <td><?php echo $row->tgl_pesan; ?></td>


                                                    </tr>
                                                <?php } ?>
                                            </tbody>

                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>


                <!-- CONFIRMED -->
                <div id="confirmed" class="w3-container w3-border city" style="display: none;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">

                                <div style="overflow-x: scroll;" class="card">

                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <h1 style="font-size: 26px;" class="card-title">Sudah konfirmasi
                                        </h1>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>

                                                <tr>
                                                    <th>Id Pemesanan</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Alamat</th>
                                                    <th>Nama Produk</th>
                                                    <th>Harga</th>
                                                    <th>Banyak</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th>Tanggal Pesan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($comfirmed->result() as $row) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row->id_pemesanan; ?></td>
                                                        <td><?php echo $row->nama_lengkap; ?></td>
                                                        <td><?php echo $row->alamat; ?>
                                                            <?php echo $row->telepon; ?></td>
                                                        <td><?php echo $row->nama_produk; ?></td>
                                                        <td style="font-size: 14px;">
                                                            <?php echo "Rp "; ?><?php echo number_format($row->total_harga); ?>
                                                        </td>
                                                        <td><?php echo $row->quantity; ?></td>
                                                        <td><?php echo "Rp "; ?><?php echo number_format($row->grand_total); ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo $row->status_code == '0' ? '<p style="width:90px;color:red;font-weight:bold; font-size:14px;">Menunggu Konfirmasi</p>'
                                                                : ($row->status_code == '1'
                                                                    ? '<p style="width:90px;color:purple;font-weight:bold; font-size:14px;" >Sudah dikonfirmasi</p>'
                                                                    : '<p style="width:90px;color:green;font-weight:bold; font-size:14px;" >Selesai</p>');
                                                            ?>
                                                        </td>

                                                        <td><?php echo $row->tgl_pesan; ?></td>
                                                        <td>
                                                            <a href="<?= site_url('master_data_services/datapemesanan/change_status/' . $row->id_pemesanan) ?>" style="width:110px;font-size:15px; font-weight:bold;" class="btn btn-outline-primary btn-block btn-active active">
                                                                Ubah status</a>
                                                            <a style="color:red;" class="fa fa-trash fa-1x">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>

                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- END -->


                <!-- NOT CONFIRMED -->
                <div id="not-confirmed" class="w3-container w3-border city" style="display: none;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">

                                <div style="overflow-x: scroll;" class="card">

                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <h1 style="font-size: 26px;" class="card-title">Belum Konfirmasi
                                        </h1>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>

                                                <tr>
                                                    <th>Id Pemesanan</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Alamat</th>
                                                    <th>Nama Produk</th>
                                                    <th>Harga</th>
                                                    <th>Banyak</th>
                                                    <th>Total</th>
                                                    <th>Status Bayar</th>
                                                    <th>Status</th>
                                                    <th>Tanggal Pesan</th>
                                                    <th>Aksi</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($not_complete->result() as $row) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row->id_pemesanan; ?></td>
                                                        <td><?php echo $row->nama_lengkap; ?></td>
                                                        <td><?php echo $row->alamat; ?>
                                                            <?php echo $row->telepon; ?></td>
                                                        <td><?php echo $row->nama_produk; ?></td>

                                                        <td style="font-size: 14px;">
                                                            <?php echo "Rp "; ?><?php echo number_format($row->total_harga); ?>
                                                        </td>
                                                        <td><?php echo $row->quantity; ?></td>
                                                        <td><?php echo "Rp "; ?><?php echo number_format($row->grand_total); ?>
                                                        </td>

                                                        <td style="color: green;font-weight:bold;">
                                                            <?php
                                                            echo $row->payment_status == null ? '<p style="width:90px;color:red;font-weight:bold; font-size:14px;">Belum bayar</p>'
                                                                : ($row->payment_status == 'Sudah Bayar'
                                                                    ? '<p style="width:90px;color:green;font-weight:bold; font-size:14px;" >Sudah Bayar</p>'
                                                                    : '');
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                            echo $row->status_code == '0' ? '<p style="width:90px;color:red;font-weight:bold; font-size:14px;">Menunggu Konfirmasi</p>'
                                                                : ($row->status_code == '1'
                                                                    ? '<p style="width:90px;color:purple;font-weight:bold; font-size:14px;" >Sudah dikonfirmasi</p>'
                                                                    : '<p style="width:90px;color:green;font-weight:bold; font-size:14px;" >Selesai</p>');
                                                            ?>
                                                        </td>


                                                        <td><?php echo $row->tgl_pesan; ?></td>
                                                        <td>

                                                            <a style="background-color: yellow;color:black; border:none;font-weight:bold;" href="<?= site_url('master_data_services/datapembayaran/confirmed_payment/' . $row->id_payment);  ?>" style="width:110px;font-size:15px; font-weight:bold;" class="btn btn-outline-primary btn-block btn-active active">
                                                                Konfirmasi</a>
                                                            <a style="font-size: 13px;text-decoration:underline;" href="<?php echo site_url('master_data_services/datapembayaran') ?>">Lihat
                                                                bukti bayar</a>

                                                        </td>

                                                    </tr>
                                                <?php } ?>
                                            </tbody>

                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>







            </div>
        </div>
    </div>
    <!-- Control Sidebar -->
    <aside class=" control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js">
    </script>

    <script>
        import {
            Tab,
            initMDB
        } from "mdb-ui-kit";

        initMDB({
            Tab
        });
    </script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js">
    </script>

    <!-- jQuery -->
    <script src=<?php echo base_url("assets/plugins/jquery/jquery.min.js"); ?>></script>
    <!-- Bootstrap 4 -->
    <script src=<?php echo base_url("assets/plugins/bootstrap/js/bootstrap.bundle.min.js;") ?>>
    </script>
    <!-- DataTables  & assets/Plugins -->
    <script src=<?php echo base_url("assets/plugins/datatables/jquery.dataTables.min.js"); ?>>
    </script>
    <script src=<?php echo base_url("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"); ?>>
    </script>
    <script src=<?php echo base_url("assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"); ?>>
    </script>
    <script src=<?php echo base_url("assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"); ?>>
    </script>
    <script src=<?php echo base_url("assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"); ?>>
    </script>
    <script src=<?php echo base_url("assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"); ?>>
    </script>
    <script src=<?php echo base_url("assets/plugins/jszip/jszip.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/plugins/pdfmake/pdfmake.min.js"); ?>>
    </script>
    <script src=<?php echo base_url("assets/plugins/pdfmake/vfs_fonts.js"); ?>></script>
    <script src=<?php echo base_url("assets/plugins/datatables-buttons/js/buttons.html5.min.js"); ?>>
    </script>
    <script src=<?php echo base_url("assets/plugins/datatables-buttons/js/buttons.print.min.js"); ?>>
    </script>
    <script src=<?php echo base_url("assets/plugins/datatables-buttons/js/buttons.colVis.min.js"); ?>>
    </script>
    <!-- AdminLTE App -->
    <script src=<?php echo base_url("assets/dist/js/adminlte.min.js"); ?>></script>
    <!-- AdminLTE for demo purposes -->
    <script src=<?php echo base_url("assets/dist/js/demo.js"); ?>></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false

            }).buttons().container().appendTo(
                '#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });


        function openCity(evt, cityName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " w3-red";
        }
    </script>


</body>

</html>