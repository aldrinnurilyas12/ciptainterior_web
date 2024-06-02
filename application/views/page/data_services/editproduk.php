<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit data produk</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=<?php echo base_url("assets/plugins/fontawesome-free/css/all.min.css"); ?>>
    <!-- DataTables -->
    <link rel="stylesheet"
        href=<?php echo base_url("assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"); ?>>
    <link rel="stylesheet"
        href=<?php echo base_url("assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"); ?>>
    <link rel="stylesheet"
        href=<?php echo base_url("assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"); ?>>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href=<?php echo base_url("assets/dist/css/adminlte.min.css"); ?>>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <?php

    $success_message = $this->session->flashdata('success_message');
    $error_message = $this->session->flashdata('error_message');

    if (!empty($success_message)) {
        echo "<script>alert('$success_message');</script>";
    } elseif (!empty($error_message)) {
        echo "<script>alert('$error_message');</script>";
    }
    ?>

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <!-- Navbar Search -->

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a style="margin-right:10px;" class="btn btn-primary" href="<?php echo base_url(); ?>login/logout">Log
                    Out</span>
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

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ubah Data Produk</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <?php foreach ($products->result() as $prd) : ?>
                                <form action="<?php echo base_url(); ?>master_data_services/editproduk/ubah"
                                    method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">ID Produk</label>
                                            <input type="text" class="form-control" id="validationCustom01"
                                                placeholder="id produk" name="id_produk"
                                                value="<?php echo $prd->id_produk; ?>" readonly>

                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Nama Produk</label>
                                            <input type="text" class="form-control" id="validationCustom02"
                                                placeholder="Masukan Nama produk" name="nama_produk"
                                                value="<?php echo $prd->nama_produk; ?>">

                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Harga Produk</label>
                                            <input type="text" class="form-control" id="price"
                                                placeholder="Masukan harga produk" name="harga"
                                                value="<?php echo $prd->harga; ?>">

                                        </div>

                                    </div>


                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Diskon</label>
                                            <input style="width:200px ;" type="text" id="mrp" class="form-control"
                                                placeholder="Masukan diskon" name="diskon"
                                                value="<?php echo $prd->diskon; ?>">

                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Harga Diskon</label>

                                            <input style="width:200px ;" id="discount" type="text" class="form-control"
                                                placeholder="Masukan harga diskon" name="harga_diskon"
                                                value="<?php echo $prd->harga_diskon; ?>">

                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Total Harga</label>

                                            <input style="width:200px ;" id="TotalDiscount" type="text"
                                                class="form-control" placeholder="Total Harga" name="total_harga"
                                                value="<?php echo $prd->total_harga; ?>" readonly>
                                            <p style="font-size: 13px;color:gray;">*Harga ini digunakan untuk
                                                penawaran ke pelanggan</p>
                                        </div>


                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Foto</label>
                                            <td><img src="<?php echo base_url() . '/uploads/' . $prd->foto; ?>"
                                                    width="200">
                                            </td>
                                            <input style="width: 400px;" type="file" class="form-control"
                                                name="filefoto"
                                                value="<?php echo base_url() . '/uploads/' . $prd->foto; ?>"
                                                placeholder="Foto">


                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Deskripsi</label>
                                            <textarea style="width:300px ;" type="text" class="form-control"
                                                id="validationCustom02" placeholder="Masukan deskripsi" name="deskripsi"
                                                value=""><?php echo $prd->deskripsi; ?></textarea>

                                        </div>

                                        <div class="col-md-4 mb-3">

                                            <label for="validationCustom02">Waktu Pengerjaan</label>
                                            <input style="width:200px ;" type="text" class="form-control"
                                                id="validationCustom02" placeholder="pengerjaan" name="waktu_pengerjaan"
                                                value="<?php echo $prd->waktu_pengerjaan; ?> ">

                                        </div>

                                        <div style="display:flex; gap:15px;margin-bottom:20px;" class="content-detail">


                                            <div style="width: max-content; ">
                                                <label for="validationCustom02">Minimal Pemesanan (Opsi)</label>
                                                <input style="width:200px ;" type="text" class="form-control"
                                                    placeholder="" value="<?php echo $prd->min_order;?>"
                                                    name="min_order">

                                            </div>

                                            <div style="width: max-content;">
                                                <label for="validationCustom02">Dimensi Ukuran (Opsi)</label>
                                                <input style="width:200px ;" type="text" class="form-control"
                                                    placeholder="" value="<?php echo $prd->dimensional;?>"
                                                    name="dimensional">

                                            </div>

                                            <div style="width: max-content;">
                                                <label for="validationCustom02">Berat (gram)</label>
                                                <input style="width:200px ;" type="text" class="form-control"
                                                    placeholder="" value="<?php echo $prd->size_height;?>"
                                                    name="size_height">

                                            </div>
                                        </div>



                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02">Status Produk</label><br>
                                        <input type="radio" size="10px" name="status_produk" value="Pre Order">Pre
                                        Order</input>

                                    </div>
                                    <?php endforeach; ?>


                                    <button class="btn btn-primary" type="submit">Simpan Data</button>
                                    <a class="btn btn-secondary" href="<?php echo base_url(); ?>produk">Kembali</a>

                            </div>
                        </div>
                        </form>

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
    <!-- Page specific script -->
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


    $(document).ready(function() {
        $("#mrp").keyup(function() {
            var price = parseInt($("#price").val());
            var mrp = parseInt($("#mrp").val());
            var total = (price * (mrp / 100));
            $("#discount").val(total);
        });
    });
    // 
    $(document).ready(function() {
        $("#mrp").keyup(function() {
            var price = parseInt($("#price").val());
            var mrp = parseInt($("#mrp").val());
            var total = price - (price * (mrp / 100));
            $("#TotalDiscount").val(total);
        });
    });
    </script>
</body>

</html>