<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>


<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div style="background-color:white;" class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div style="text-align:center;" class="col-12">
                            <img src="<?php echo base_url(); ?>assets/dist/img/logocipta.png">
                            <h1>Selamat Datang di Website Admin Cipta Interior</h1>
                            <p>Jl. Meruya Selatan No.7C, RT.1/RW.7, Meruya Sel., <br>Kec. Kembangan, Kota Jakarta Barat,
                                Daerah Khusus Ibukota Jakarta 11620</p>
                            <p2 style="font-size:18px; font-weight:bold;">Telepon: (021) 58904875 &nbsp; Email :
                                ciptainterior@kkpubl.my.id</p2>

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



    </div>
    <!-- ./wrapper -->


</body>

<script>
<?php if ($this->session->flashdata('sukses_login')) : ?>
Swal.fire({
    text: '<?= $this->session->flashdata('sukses_login') ?>',
    icon: 'success',
    showConfirmButton: true,
    timer: 2000
});
<?php endif; ?>
</script>

</html>