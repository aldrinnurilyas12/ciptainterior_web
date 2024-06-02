<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data keluhan pelanggan</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=<?php echo base_url("assets/plugins/fontawesome-free/css/all.min.css"); ?>>
    <!-- DataTables -->
    <link rel="stylesheet" href=<?php echo base_url("assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"); ?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"); ?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"); ?>>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
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

                <!-- Navbar Search -->

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a style="margin-right:10px;" class="btn btn-primary" href="<?php echo base_url(); ?>login/logout">Log Out</span>
                    </a>

                </li>
                <!-- Notifications Dropdown Menu -->


            </ul>
        </nav>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1></h1>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>







            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <h3 style="font-size:26px;" class="card-title">Data keluhan pelanggan </h3>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Id Keluhan</th>

                                                <th>Id Customer</th>
                                                <th>Nama Customer</th>
                                                <th>Id Pemesanan</th>
                                                <th>Tanggal Pesan</th>
                                                <th>Nama Produk</th>
                                                <th>Email</th>
                                                <th>Keluhan </th>
                                                <th>Balasan </th>
                                                <th>Tanggal Keluhan</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            //jika tanggal dari dan tanggal ke ada maka
                                            if (isset($_POST['submit'])) {
                                                $bln = date($_POST['bulan']);
                                                $tahun = date($_POST['tahun']);

                                                $data = $this->db->query("SELECT * FROM keluhan_customer where month(tgl_keluhan)='$bln'and year(tgl_keluhan) = '$tahun' ; ");
                                            } else {
                                                $data = $this->db->query("SELECT * FROM keluhan_customer");
                                            }


                                            foreach ($data->result()  as $row) {
                                            ?>

                                                <tr>

                                                    <td><?php echo $row->id_keluhan; ?></td>

                                                    <td><?php echo $row->id_customer; ?></td>
                                                    <td><?php echo $row->nm_customer; ?></td>
                                                    <td><?php echo $row->id_pemesanan; ?></td>
                                                    <td><?php echo $row->tgl_pesan; ?></td>
                                                    <td><?php echo $row->nama_produk; ?></td>
                                                    <td><?php echo $row->email; ?></td>
                                                    <td style="width : 180px;"><?php echo $row->keluhan; ?> </td>
                                                    <td style="width : 180px;"><?php echo $row->balasan; ?> </td>
                                                    <td style="width : 180px;"><?php echo $row->tgl_keluhan; ?> </td>


                                                    <td style=" width:150px;">
                                                        <a href="<?= site_url('balaskeluhan/balasan/' . $row->id_keluhan);  ?>" class="btn btn-primary">Balas</a> &nbsp; | &nbsp;
                                                        <a style="color:red;" class="fa fa-trash fa-1.5x" href="<?= site_url('datakeluhan/delete/' . $row->id_keluhan);  ?>" </a>
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
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class=" main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All
            rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

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
    <script src=<?php echo base_url("assets/plugins/pdfmake/pdfmake.min.js"); ?>></script>
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

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
    </script>
</body>

</html>