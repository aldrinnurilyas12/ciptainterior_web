<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rincian pemesanan</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- font awesome style -->
    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>


    <div style="font-family: Inter, sans-serif;padding: 0;" class="container">
        <div style="font-family: Inter, sans-serif;padding: 0;padding-top:15px;" class="main-body">
            <div style="display: flex;" class="row gutters-sm">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data" action="<?php echo site_url('pembayaran/send_payment'); ?>">

                                    <input readonly class="forminput" type="hidden" name="id_pemesanan" value="">

                                    <input readonly class=" forminput" type="hidden" name="id_customer" value="<?php echo $this->session->userdata('id_customer'); ?>">
                                    <input readonly name="id_produk" hidden value="">
                                    <input type="text" name="payment_status" value="Sudah Bayar" hidden id="">
                                    <input type="text" name="status_order" hidden value="0" id="">


                                    <p style="font-family: Inter, sans-serif;font-weight: bold;">
                                        Rincian Pemesanan
                                    </p>
                                    <hr>
                                    <div style="display: flex;align-items:center;" class="row">
                                        <div class="col-sm-3">
                                            <h6 style="font-family:Inter, sans-serif;margin: 0;font-family: Inter , sans-serif;" class="mb-0">No Invoice</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input name="id_pemesanan" readonly style="border-style:none;margin:0;background:none;" value="<?php echo $id_pemesanan; ?>" type="text" class="form-control text-left" />

                                        </div>
                                    </div>

                                    <hr>
                                    <div style="display: flex;align-items:center;" class="row">
                                        <div class="col-sm-3">
                                            <h6 style="font-family:Inter, sans-serif;margin: 0;font-family: Inter , sans-serif;" class="mb-0">Tanggal Pemesanan</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <p><?php echo $tgl_pesan ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div style="display: flex;align-items:center;" class="row">
                                        <div class="col-sm-3">
                                            <h6 style="font-family:Inter, sans-serif;margin: 0;font-family: Inter , sans-serif;" class="mb-0">Nama Pelanggan</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input readonly value="<?php echo $this->session->userdata('nama_lengkap'); ?>" style="border-style:none;margin:0; background:none;" type="text" class="form-control text-left" />

                                        </div>
                                    </div>
                                    <hr>
                                    <div style="display: flex;align-items:center;" class="row">
                                        <div class="col-sm-3">
                                            <h6 style="font-family:Inter, sans-serif;margin: 0;" class="mb-0">Jumlah
                                                Barang
                                            </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <input readonly value="<?php echo $quantity . " Barang"; ?>" readonly style="border-style:none;margin:0;background:none;" name="quantity" id="quantity" type="text" class="form-control text-left" />
                                        </div>
                                    </div>

                                    <hr>
                                    <div style="display: flex;align-items:center;" class="row">
                                        <div class="col-sm-3">
                                            <h6 style="font-family:Inter, sans-serif;margin: 0;" class="mb-0">Grand
                                                Total
                                            </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input class="form-control text-left" readonly style="border: none;background:none;margin:0;" name="grand_total" value="<?php echo $grand_total; ?>" readonly type="text">
                                        </div>
                                    </div>

                                    <hr>
                                    <div style="display: flex;align-items:center;" class="row">

                                        <div class="col-sm-3">
                                            <h6 style="font-family:Inter, sans-serif;margin: 0;" class="mb-0">Bank
                                            </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select style="margin-top: 10px; height:30px; font-size:12px;" name="bank" id="card_type" required>
                                                <option value="">--Pilih Bank--</option>
                                                <option style="font-weight:bold ;" value="Bank Mandiri">Bank Mandiri
                                                </option>
                                                <option style="font-weight:bold ;" value="Bank BCA">Bank BCA
                                                </option>
                                                <option style="font-weight:bold ;" value="Bank BRI">Bank BRI
                                                </option>
                                                <option style="font-weight:bold ;" value="Bank BNI">Bank BNI
                                                </option>
                                                <option style="font-weight:bold ;" value="Gopay">Gopay
                                                </option>
                                            </select>
                                        </div>

                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 style="font-family:Inter, sans-serif;margin: 0;" class="mb-0">Upload
                                                Bukti
                                            </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input class="forminput1" type="file" placeholder="Upload Bukti (Opsional)" name="filefoto">

                                        </div>
                                    </div>


                                    <br>
                                    <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-primary">Pesan</button>


                                    <!-- MODAL -->
                                    <div class="modal fade" id="modal-default">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Pemesanan</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Bayar Pemesanan produk?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Bayar</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>


                </div>



            </div>
        </div>
    </div>

    <!-- MODAL NEW -->




</body>

<script>
    <?php
    if ($this->session->flashdata('success_message')) : ?>

        Swal.fire({
            title: "Berhasil!",
            text: '<?= $this->session->flashdata('success_message') ?>',
            icon: 'success',
            position: 'center',
            showConfirmButton: true,
            timer: 5000
        });
    <?php endif; ?>
</script>


<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url() ?>assets/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>

</html>