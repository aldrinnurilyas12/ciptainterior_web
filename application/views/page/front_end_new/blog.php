<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Entry Data Produk</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href=<?php echo base_url("assets/plugins/fontawesome-free/css/all.min.css"); ?>>
    <!-- DataTables -->
    <link rel="stylesheet"
        href=<?php echo base_url("assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"); ?>>
    <link rel="stylesheet"
        href=<?php echo base_url("assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"); ?>>
    <link rel="stylesheet"
        href=<?php echo base_url("assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"); ?>>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet" href=<?php echo base_url("assets/dist/css/adminlte.min.css"); ?>>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

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
                    <a style="margin-right:10px;" class="btn btn-primary"
                        href="<?php echo base_url(); ?>login/logout">Log Out</span>
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
                                    <h3 style="font-size:25px;font-weight:bold;" class="card-title">Upload Artikel
                                    </h3>
                                </div>
                                <?php echo validation_errors(); ?>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <form action="<?php echo site_url('master_data_services/blog/createpost'); ?>"
                                        method="post" enctype="multipart/form-data" class="needs-validation">
                                        <div class="form-row">

                                            <input hidden type="text" class="form-control" id="validationCustom01"
                                                placeholder="id produk" name="id_produk" readonly>

                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Nama Artikel</label>
                                                <input type="text" class="form-control" placeholder="nama artikel"
                                                    name="nama_artikel">

                                            </div>


                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Isi Konten Artikel</label>
                                                <textarea type="text" class="form-control"
                                                    placeholder="isi konten artikel..." name="isi_artikel"></textarea>

                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Foto</label>
                                                <input type="file" class="form-control" name="filefoto" multiple>
                                            </div>

                                        </div>


                                        <button class="btn btn-primary" value="upload" type="submit">Posting
                                            Artikel</button>
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

            <section class="showbanner">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>

                                <th style="width:350px;">Foto</th>
                                <th>Nama Artikelr</th>
                                <th>Isi artikel</th>
                                <th>Tanggal </th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //jika tanggal dari dan tanggal ke ada maka

                            $no = 1;
                            foreach ($blog->result_array()  as $row) {
                                $id_blog = $row['id'];
                                $title = $row['nama_artikel'];
                                $foto = $row['foto'];
                                $content = $row['isi_artikel'];
                                $create_at = $row['article_date'];

                            ?>
                            <tr>

                                <td><img style="width:150px; height:100px"
                                        src="<?php echo base_url() . '/blog_media/' . $foto; ?>">
                                </td>
                                <td style="width:200px ;"><?php echo $title; ?></td>
                                <td style="width:200px ;"> <textarea name="" id="" cols="30"
                                        rows="10"> <?php echo $content; ?></textarea></td>


                                <td><?php echo $create_at; ?></td>
                                <td>
                                    <a style="width:20px;" href="<?= site_url('editproduk/edit_data/' . $id_blog);  ?>"
                                        class="fas fa-edit fa-1x"></a>
                                    <a class="bi bi-trash3-fill" style="color:red;"
                                        href="<?= site_url('produk/delete/' . $id_blog);  ?>"></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>


</body>


<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

</html>