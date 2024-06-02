<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <center>Cipta Interior <br>Jl. Meruya Selatan No.7C, RT.1/RW.7, Meruya Sel.,
            Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11620
        </center>
        <hr>
    </title>

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

            <div style="margin-left: 10px;" class="col-md-8">
                <label for="date1">Pilih Periode </label>
                <form method="POST" action="" class="form-inline">

                    <select style="width: 100px;" class="form-control mr-2" name="bulan">
                        <option value=" #"> Bulan</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>

                    <select style="width: 80px;" class="form-control mr-2" name="tahun" ; <?php
                                                                                            $mulai = date('Y') - 5;
                                                                                            for ($i = $mulai; $i < $mulai + 10; $i++) {
                                                                                                $sel = $i == date('Y') ? ' selected="selected"' : '';
                                                                                                echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                                                                            }
                                                                                            ?> </select>
                        <button type=" submit" name="submit" class="btn btn-primary">Tampilkan</button> &nbsp;
                        <a class="btn btn-success" href="<?php echo base_url(); ?>datapengiriman">Refresh</a>
                </form>
            </div>
            <br>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Laporan Data Pengiriman</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Id Pengiriman</th>
                                                <th>Id Pemesanan</th>
                                                <th>Nama Customer</th>
                                                <th>Alamat</th>
                                                <th>Telepon</th>
                                                <th>Nama Produk</th>
                                                <th>Harga Produk</th>
                                                <th>Nama Kurir</th>

                                                <th>Jumlah Bayar</th>
                                                <th>Catatan</th>
                                                <th>Tanggal Pengiriman</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //jika tanggal dari dan tanggal ke ada maka
                                            if (isset($_POST['submit'])) {
                                                $bln = date($_POST['bulan']);
                                                $tahun = date($_POST['tahun']);

                                                $data = $this->db->query("SELECT * FROM laporan_pengiriman where month(tgl_pengiriman)='$bln'and year(tgl_pengiriman) = '$tahun' ; ");
                                            } else {
                                                $data = $this->db->query("SELECT * FROM laporan_pengiriman");
                                            }


                                            foreach ($data->result()  as $row) {
                                            ?>


                                                <tr>

                                                    <td style="width:50px ;"><?php echo $row->id_pengiriman; ?></td>
                                                    <td><?php echo $row->id_pemesanan; ?></td>
                                                    <td><?php echo $row->nm_customer; ?></td>
                                                    <td><?php echo $row->alamat; ?></td>
                                                    <td><?php echo $row->telepon; ?></td>
                                                    <td><?php echo $row->nama_produk; ?></td>
                                                    <td><?php echo "Rp " ?><?php echo number_format($row->harga); ?></td>
                                                    <td><?php echo $row->nama_kurir; ?></td>

                                                    <td><?php echo "Rp " ?><?php echo number_format($row->jumlah_bayar); ?></td>
                                                    <td><?php echo $row->catatan; ?></td>
                                                    <td><?php echo $row->tgl_pengiriman; ?></td>
                                                    <td><a href="<?php echo base_url('laporanpdf/index/' . $row->id_pengiriman); ?>" class="btn btn-primary" id="example1">Cetak</td>
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
            $('#example1').append(
                '<caption style="font-size:0px;caption-side: top;text-align:center;display: table-caption;font-weight:bold;">Laporan data pengiriman &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Periode :  </caption>'

            );
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["print", "pdf"]

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