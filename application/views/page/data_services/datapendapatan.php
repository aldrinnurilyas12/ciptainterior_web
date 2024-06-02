<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entry Data Pendapatan</title>

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
                        <div class="col-sm-6">

                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1></h1>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <h3 style="font-size:26px;font-weight:bold;" class="card-title">Entry Data Pendapatan</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="<?php echo site_url('datapendapatan/simpan_data'); ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">ID Produk</label>
                                                <input type="text" class="form-control" id="id_produk" placeholder="id produk" name="id_produk" required>

                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Nama Produk</label>
                                                <input type="text" class="form-control" id="validationCustom02" placeholder="Nama produk" name="nama_produk">

                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Harga Produk</label>
                                                <input type="text" class="form-control" id="validationCustom02" placeholder="Harga produk" name="harga" readonly>

                                            </div>

                                        </div>


                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Jumlah Terjual</label>
                                                <input style="width:200px ;" type="text" class="form-control" id="validationCustom02" placeholder="Jumlah terjual" name="total_terjual">

                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Tanggal Pendapatan</label>
                                                <input style="width:200px ;" type="date" class="form-control" id="validationCustom02" name="tgl_laporan">

                                            </div>

                                        </div>


                                        <button class="btn btn-primary" type="submit">Simpan Data</button>
                                        <button class="btn btn-danger" type="reset">Reset Data</button>
                                    </form>
                                </div>
                            </div>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </section>
            <br>
            <br>


            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2022 <a href="https://adminlte.io">Admin Cipta Interior</a>.</strong> All rights
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
    <script src=<?php echo base_url("assets/plugins/bootstrap/js/bootstrap.bundle.min.js;") ?>></script>
    <!-- DataTables  & assets/Plugins -->
    <script src=<?php echo base_url("assets/plugins/datatables/jquery.dataTables.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"); ?>>
    </script>
    <script src=<?php echo base_url("assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"); ?>>
    </script>
    <script src=<?php echo base_url("assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/plugins/jszip/jszip.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/plugins/pdfmake/pdfmake.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/plugins/pdfmake/vfs_fonts.js"); ?>></script>
    <script src=<?php echo base_url("assets/plugins/datatables-buttons/js/buttons.html5.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/plugins/datatables-buttons/js/buttons.print.min.js"); ?>></script>
    <script src=<?php echo base_url("assets/plugins/datatables-buttons/js/buttons.colVis.min.js"); ?>></script>
    <!-- AdminLTE App -->
    <script src=<?php echo base_url("assets/dist/js/adminlte.min.js"); ?>></script>
    <!-- AdminLTE for demo purposes -->
    <script src=<?php echo base_url("assets/dist/js/demo.js"); ?>></script>

    <script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/jquery.min.js' ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#id_produk').on('input', function() {

                var id_produk = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('lappendapatan/get_produk') ?>",
                    dataType: "JSON",
                    data: {
                        id_produk: id_produk
                    },
                    cache: false,
                    success: function(data) {
                        $.each(data, function(id_produk, nama_produk, harga, ) {
                            $('[name="id_produk"]').val(data.id_produk);
                            $('[name="nama_produk"]').val(data.nama_produk);
                            $('[name="harga"]').val(data.total_harga);


                        });

                    }
                });
                return false;
            });

        });
    </script>



    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
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