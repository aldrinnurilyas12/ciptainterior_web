<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Entry Data Produk</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href=<?php echo base_url("assets/plugins/fontawesome-free/css/all.min.css"); ?>>
    <!-- DataTables -->
    <link rel="stylesheet" href=<?php echo base_url("assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"); ?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"); ?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"); ?>>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet" href=<?php echo base_url("assets/dist/css/adminlte.min.css"); ?>>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

</head>

<?php
$id_produk = $this->uri->segment(3);
$kodeproduct = $this->product_model->kode_products($id_produk);
$kodeproduct;

$success_message = $this->session->flashdata('success_message');
$error_message = $this->session->flashdata('error_message');

if (!empty($success_message)) {
    echo "<script>alert('$success_message');</script>";
} elseif (!empty($error_message)) {
    echo "<script>alert('$error_message');</script>";
}
?>



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
                                    <h3 style="font-size:25px;font-weight:bold;" class="card-title">Entry Data Produk
                                    </h3>
                                </div>
                                <?php echo validation_errors(); ?>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <form action="<?php echo site_url('master_data_services/produk/save_data'); ?>" method="post" enctype="multipart/form-data" class="needs-validation">
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">ID Produk</label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder="id produk" name="id_produk" value="<?= $kodeproduct ?>" readonly>

                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Nama Produk</label>
                                                <input type="text" class="form-control" placeholder="Masukan Nama produk" name="nama_produk">

                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Harga</label>
                                                <input type="text" id="price" class="form-control" placeholder="Masukan harga produk" name="harga">

                                            </div>



                                        </div>


                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Kategori Produk</label>
                                                <br>
                                                <select name="category_id" id="">
                                                    <option value="">--Pilih Kategori--</option>
                                                    <?php foreach ($category->result() as $ctg) : ?>

                                                        <option value="<?php echo $ctg->category_id ?>">
                                                            <?php echo $ctg->category_name ?></option>
                                                    <?php endforeach; ?>
                                                </select>

                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Diskon (%)</label>
                                                <input style="width:200px ;" id="mrp" type="text" class="form-control" placeholder="Masukan diskon" name="diskon">
                                                <p style="font-size: 13px;color:gray;">*Jika tidak diskon masukan 0</p>


                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Potongan Harga</label>

                                                <input type="text" class="form-control" id="discount" placeholder="Potongan harga" name="harga_diskon" readonly>


                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Total Harga</label>

                                                <input type="text" class="form-control" id="TotalDiscount" placeholder="Total Harga" name="total_harga" readonly>
                                                <p style="font-size: 13px;color:gray;">*Harga ini digunakan untuk
                                                    penawaran ke
                                                    pelanggan</p>

                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Waktu Pengerjaan</label>
                                                <input style="width:200px ;" type="text" class="form-control" placeholder="" name="waktu_pengerjaan">
                                                <p style="font-size: 13px;color:gray;">*Kosongkan jika tidak pre order
                                                </p>

                                            </div>
                                            <div style="width:250px;">
                                                <label for="validationCustom02">Deskripsi</label>
                                                <textarea style="width:250px;" type="text" class="form-control" id="validationCustom02" placeholder="Masukan deskripsi" name="deskripsi"></textarea>

                                            </div>

                                        </div>

                                        <div style="display: flex;gap:20px;" class="form-row">
                                            <div style="width: max-content; margin-right:20px;">
                                                <label for="validationCustom02">Status Produk</label><br>
                                                <input type="radio" size="10px" name="status_produk" value="Pre Order">Pre
                                                Order</input>
                                                <input type="radio" size="10px" name="status_produk" value="Ready/Ada">Ready</input>

                                            </div>

                                            <div style="width: max-content;">
                                                <label for="validationCustom02">Minimal Pemesanan (Opsi)</label>
                                                <input style="width:200px ;" type="text" class="form-control" placeholder="" name="min_order">

                                            </div>

                                            <div style="width: max-content;">
                                                <label for="validationCustom02">Dimensi Ukuran (Opsi)</label>
                                                <input style="width:200px ;" type="text" class="form-control" placeholder="" name="dimensional">

                                            </div>

                                            <div style="width: max-content;">
                                                <label for="validationCustom02">Berat (gram)</label>
                                                <input style="width:200px ;" type="text" class="form-control" placeholder="" name="size_height">

                                            </div>


                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Foto</label>
                                                <input type="file" class="form-control" name="filefoto" multiple>
                                            </div>

                                        </div>

                                        <hr style="border:1.5px solid gray">
                                        <label for="validationCustom02">Masukan Bahan</label><br>
                                        <input type="text" name="id" hidden>

                                        <div style="display: flex;gap:35px;" class="form-row">



                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustom02">Bahan 1</label>
                                                <input style="width:200px ;" type="text" class="form-control" id="TotalDiscount" placeholder="Masukan bahan produk" name="material_satu">


                                            </div>

                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustom02">Bahan 2</label>
                                                <input style="width:200px ;" type="text" class="form-control" placeholder="Masukan bahan produk" name="material_dua">

                                            </div>

                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustom02">Bahan 3</label>
                                                <input style="width:200px ;" type="text" class="form-control" placeholder="Masukan bahan produk" name="material_tiga">

                                            </div>

                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustom02">Bahan 4</label>
                                                <input style="width:200px ;" type="text" class="form-control" placeholder="Masukan bahan produk" name="material_empat">

                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustom02">Bahan 5</label>
                                                <input style="width:200px ;" type="text" class="form-control" placeholder="Masukan bahan produk" name="material_lima">

                                            </div>
                                        </div>

                                        <button class="btn btn-primary" value="upload" type="submit">Tambah
                                            Produk</button>
                                        <button class="btn btn-danger" type="reset">Reset Data</button>
                                </div>

                            </div>
                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </section>




            <div style="margin-left: 10px;" class="col-md-8">
            </div>
            <br>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Diskon Produk</h3>


                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>

                                                <th style="width:350px ;">Foto</th>
                                                <th>Nama Produk</th>
                                                <th>Harga </th>
                                                <th>Diskon</th>
                                                <th>Harga Diskon</th>
                                                <th>Total Harga</th>
                                                <th>Bahan</th>
                                                <th>Min Order</th>
                                                <th>Dimensi Ukuran</th>
                                                <th>Berat</th>
                                                <th>Deskripsi</th>
                                                <th>Waktu Pengerjaan</th>
                                                <th>Status Produk</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //jika tanggal dari dan tanggal ke ada maka

                                            $no = 1;
                                            foreach ($product->result_array()  as $row) {
                                                $id_produk = $row['id_produk'];
                                                $foto = $row['foto'];
                                                $nama_produk = $row['nama_produk'];
                                                $harga = $row['harga'];
                                                $diskon = $row['diskon'];
                                                $harga_diskon = $row['harga_diskon'];
                                                $tot_harga = $row['total_harga'];
                                                $bahan_satu = $row['material_satu'];
                                                $bahan_dua = $row['material_dua'];
                                                $bahan_tiga = $row['material_tiga'];
                                                $bahan_empat = $row['material_empat'];
                                                $bahan_lima = $row['material_lima'];
                                                $min_order = $row['min_order'];
                                                $dimensional = $row['dimensional'];
                                                $berat = $row['size_height'];
                                                $deskripsi = $row['deskripsi'];
                                                $time_work = $row['waktu_pengerjaan'];
                                                $status = $row['status_produk'];
                                                $tgl_masuk = $row['tanggal_masuk'];
                                            ?>
                                                <tr>

                                                    <td><img style="width:250px ;" src="<?php echo base_url() . '/uploads/' . $foto; ?>"></td>
                                                    <td style="width:200px ;"><?php echo $nama_produk; ?></td>

                                                    <td><?php echo "Rp "  ?><?php echo number_format($harga); ?></td>
                                                    <td><?php echo $diskon; ?></td>
                                                    <td><?php echo "Rp " ?><?php echo number_format($harga_diskon); ?>
                                                    </td>
                                                    <td><?php echo "Rp " ?><?php echo number_format($tot_harga); ?>
                                                    </td>
                                                    <td style="font-size: 12px;">
                                                        <li><?php echo $bahan_satu ?></li>
                                                        <li><?php echo $bahan_dua ?></li>
                                                        <li><?php echo $bahan_tiga ?></li>
                                                        <li><?php echo $bahan_empat ?></li>
                                                        <li><?php echo $bahan_lima ?></li>
                                                    </td>
                                                    <td><?php echo $min_order; ?></td>
                                                    <td><?php echo $dimensional; ?></td>
                                                    <td><?php echo $berat; ?></td>
                                                    <td><textarea> <?php echo $deskripsi; ?></textarea></td>
                                                    <td><?php echo $time_work; ?></td>
                                                    <td><?php echo $status; ?></td>
                                                    <td><?php echo $tgl_masuk; ?></td>

                                                    <td>
                                                        <a style="width:20px;" href="<?= site_url('master_data_services/editproduk/edit_data/' . $id_produk);  ?>" class="fas fa-edit fa-1x"></a>
                                                        <a class="bi bi-trash3-fill" style="color:red;" href="<?= site_url('master_data_services/produk/delete/' . $id_produk);  ?>"></a>


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
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
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
        // 
    </script>
</body>
<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

</html>