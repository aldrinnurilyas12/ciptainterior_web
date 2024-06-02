<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
</head>
<?php

$transaksi = $transactions->row_array();
$spent      = $spent_total->row_array();

?>

<body style="font-family: 'Inter', sans-serif;" class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Invoice Pemesanan Cipta Interior</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <img style="width: 90px; height:90px;"
                                            src="<?php echo base_url() ?>assets/dist/img/logocipta.png" alt=""></i>Cipta
                                        Interior
                                        <small class="float-right">Tanggal: <?php echo date('Y-m-d h:m:s') ?></small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Dari:
                                    <address>
                                        <strong>Cipta Interior</strong><br>
                                        Jl. Meruya Selatan No.7C, RT.1/RW.7, Meruya Sel.<br>
                                        Kec. Kembangan, Kota Jakarta Barat<br>
                                        Daerah Khusus Ibukota Jakarta 11620, Indonesia<br>
                                        Telepon: (021) 58904875<br>
                                        Email: ciptainterior@cipta.com
                                    </address>
                                </div>
                                <!-- /.col -->

                                <?php foreach ($customers->result() as $customer) : ?>

                                <div class="col-sm-4 invoice-col">
                                    Kepada:
                                    <address>
                                        <strong><?php echo $customer->nama_lengkap; ?></strong><br>
                                        <?php echo $customer->alamat; ?><br>
                                        Telepon: <?php echo $customer->telepon; ?> <br>
                                        Email: <?php echo $customer->email; ?>
                                    </address>
                                </div>

                                <?php endforeach; ?>
                                <!-- /.col -->



                                <div class="col-sm-4 invoice-col">

                                    <b>Kode Referensi #<?php echo $transaksi['id_pemesanan']; ?></b><br>
                                    <br>
                                    <b>Tanggal pemesanan:</b> <?php echo $transaksi['tgl_pesan']; ?><br>
                                    <b>Tanggal Bayar:</b> <?php echo $transaksi['tgl_bayar']; ?><br>

                                </div>



                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->

                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode Referensi</th>
                                                <th>Produk</th>
                                                <th>Banyak</th>
                                                <th>Total belanja</th>
                                            </tr>
                                        </thead>
                                        <?php foreach ($transactions->result() as $transaksi) : ?>
                                        <tbody>

                                            <tr>
                                                <td><?php echo $transaksi->id_pemesanan; ?></td>
                                                <td><?php echo $transaksi->nama_produk; ?></td>
                                                <td><?php echo $transaksi->quantity; ?></td>
                                                <td><?php echo "Rp " . number_format($transaksi->total_shop); ?></td>
                                            </tr>
                                        </tbody>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>

                            <!-- /.row -->


                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    <p class="lead">Payment Methods:</p>
                                    <img src="<?php echo base_url() ?>assets/dist/img/visa.png" alt="Visa">
                                    <img src="<?php echo base_url() ?>assets/dist/img/mastercard.png" alt="Mastercard">

                                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                        Terima kasih sudah belanja di Cipta Interior.
                                        Beri kami saran yang membantu untuk meningkatkan kualitas dari layanan kami.
                                        &nbsp;
                                        <a style="color: #DC143C;text-decoration:underline;"
                                            href="<?php echo base_url() ?>testimonial">Kirim
                                            testimonial</a>
                                    </p>
                                </div>
                                <!-- /.col -->

                                <div class="col-6">


                                    <div class="table-responsive">
                                        <table class="table">

                                            <tr>
                                                <th>Shipping:</th>
                                                <td>Free</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td><?php echo "Rp" . number_format($spent['spent_total']); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <a href="invoice-print.html" rel="noopener" target="_blank"
                                        class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                    <button type="button" class="btn btn-success float-right"><i
                                            class="far fa-credit-card"></i> Submit
                                        Payment
                                    </button>
                                    <button type="button" class="btn btn-primary float-right"
                                        style="margin-right: 5px;">
                                        <i class="fas fa-download"></i> Generate PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->




    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</body>

</html>