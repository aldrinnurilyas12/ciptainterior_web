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
    <script type="text/javascript" src="https://rajaongkir.com/script/widget.js"></script>
</head>

<body>
    <?php
    $id_order = $this->order_model->get_id_order();
    $id_order;
    $id_status = $this->order_model->get_status_id();
    ?>



    <div style="font-family: Inter, sans-serif;padding: 0;" class="container">
        <div style="padding: 0;padding-top:15px;" class="main-body">
            <div style="display: flex;" class="row gutters-sm">
                <div class="col-md-7">
                    <div class="card mb-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <form action="<?php echo base_url() ?>orderproduk/pesanproduk" method="post" enctype="multipart/form-data">
                                    <?php $i = 1; ?>
                                    <?php foreach ($this->cart->contents() as $item_order) : ?>
                                        <?php echo form_hidden($i . '[rowid]', $item_order['rowid']); ?>
                                        <input class="forminput" type="hidden" name="id_pemesanan" value="<?php echo $id_order; ?>">

                                        <input class=" forminput" type="hidden" name="id_customer" value="<?php echo $this->session->userdata('id_customer'); ?>">
                                        <input name="id_produk" hidden value="<?php echo  $item_order['id']; ?>">
                                        <input type="text" name="status_id" hidden value="<?php echo $id_status; ?>">


                                        <p style="font-family: Inter, sans-serif;font-weight: bold;">
                                            Rincian Pemesanan
                                        </p>
                                        <hr>
                                        <div style="display: flex;align-items:center;" class="row">
                                            <div class="col-sm-3">
                                                <h6 style="font-family:Inter, sans-serif;margin: 0;font-family: Inter , sans-serif;" class="mb-0">Nama Produk</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input readonly style="border-style:none;margin:0;background:none;" value="<?= $item_order['name']; ?>" type="text" class="form-control text-left" />

                                            </div>
                                        </div>
                                        <hr>
                                        <div style="display: flex;align-items:center;" class="row">
                                            <div class="col-sm-3">
                                                <h6 style="font-family:Inter, sans-serif;margin: 0;" class="mb-0">Jumlah
                                                </h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">

                                                <input readonly style="border-style:none;margin:0;background:none;" name="quantity" id="quantity" value="<?= $item_order['qty']; ?>" type="text" class="form-control text-left" />
                                            </div>
                                        </div>
                                        <hr>
                                        <div style="display: flex;align-items:center;" class="row">
                                            <div class="col-sm-3">
                                                <h6 style="font-family:Inter, sans-serif;margin: 0;" class="mb-0">Harga
                                                    Produk
                                                </h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input readonly style="border-style:none;margin:0;background:none;" value="<?= $item_order['price']; ?>" type="text" class="form-control text-left" />

                                            </div>
                                        </div>
                                        <hr>
                                        <div style="display: flex;align-items:center;" class="row">
                                            <div class="col-sm-3">
                                                <h6 style="font-family:Inter, sans-serif;margin: 0;" class="mb-0">Subtotal
                                                </h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input readonly style="border-style:none;margin:0;background:none;" value="<?= $item_order['subtotal']; ?>" type="text" class="form-control text-left" />
                                            </div>
                                        </div>
                                        <hr>
                                        <div style="display: flex;align-items:center;" class="row">
                                            <div class="col-sm-3">
                                                <h6 style="font-family:Inter, sans-serif;margin: 0;" class="mb-0">Ongkir
                                                </h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <p style="color:green;">Gratis</p>
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
                                                <input readonly style="border-style:none;margin:0;background:none;" name="grand_total" value="<?= $item_order['subtotal']; ?>" type="text" class="form-control text-left" />
                                            </div>
                                        </div>
                                        <hr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>

                                    <br>
                                    <div style="display: flex;gap:10px;align-items:center;" class="btn-order">
                                        <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-primary">Pesan <i class="fa-solid fa-arrow-right"></i></button>
                                        <a style="color:red;font-size:15px;border:1px solid red;padding:6px;border-radius:4px;" href="<?php echo base_url() . 'cart/delete_order_detail/' . $item_order['rowid']; ?>">Batalkan</a>
                                    </div>


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
                                                    <p>Apa kamu yakin ingin memesan produk?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Pesan
                                                        sekarang</button>
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

                <!-- SHIPMENT CONTENT -->

                <!-- Shipment Information -->
                <div class="col-md-5 mb-3">
                    <div class="card mb-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <p style="font-family: Inter, sans-serif;font-weight: bold;">Pilih Jasa Pengiriman
                                </p>
                                <hr>

                                <div class="container p-5">

                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Berat</span>
                                        </div>
                                        <input type="number" value="1" min="1" class="form-control" id="berat" name="berat">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Kg</span>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                    </div>

                                    <p>Lokasi Asal :</p>
                                    <div class="form-group">
                                        <select class="form-control" id="sel1">
                                            <option value=""> Pilih Provinsi</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" id="sel2" disabled>
                                            <option value=""> Pilih Kota</option>
                                        </select>
                                    </div>

                                    <p>Lokasi Tujuan :</p>


                                    <div class="form-group">
                                        <select class="form-control" id="sel11">
                                            <option value=""> Pilih Provinsi</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" id="sel22" disabled>
                                            <option value=""> Pilih Kota</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" id="kurir" disabled>
                                            <option value=""> Pilih Kurir</option>
                                            <option value="jne">JNE</option>
                                            <option value="tiki">TIKI</option>
                                            <option value="pos">POS Indonesia</option>
                                        </select>
                                    </div>

                                    <div id="hasil"></div>

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


<!-- SCRIPT FOR API ONGKIR -->
<script type="text/javascript">
    function getLokasi() {
        var $op = $("#sel1"),
            $op1 = $("#sel11");

        $.getJSON("provinsi", function(data) {
            $.each(data, function(i, field) {

                $op.append('<option value="' + field.province_id + '">' + field.province + '</option>');
                $op1.append('<option value="' + field.province_id + '">' + field.province + '</option>');

            });

        });

    }

    getLokasi();

    $("#sel11").on("change", function(e) {
        e.preventDefault();
        var option = $('option:selected', this).val();
        $('#sel22 option:gt(0)').remove();
        $('#kurir').val('');

        if (option === '') {
            alert('null');
            $("#sel22").prop("disabled", true);
            $("#kurir").prop("disabled", true);
        } else {
            $("#sel22").prop("disabled", false);
            getKota1(option);
        }
    });


    $("#sel1").on("change", function(e) {
        e.preventDefault();
        var option = $('option:selected', this).val();
        $('#sel2 option:gt(0)').remove();
        $('#kurir').val('');

        if (option === '') {
            alert('null');
            $("#sel2").prop("disabled", true);
            $("#kurir").prop("disabled", true);
        } else {
            $("#sel2").prop("disabled", false);
            getKota(option);
        }
    });




    $("#sel22").on("change", function(e) {
        e.preventDefault();
        var option = $('option:selected', this).val();
        $('#kurir').val('');

        if (option === '') {
            alert('null');
            $("#kurir").prop("disabled", true);
        } else {
            $("#kurir").prop("disabled", false);
        }
    });


    $("#kurir").on("change", function(e) {
        e.preventDefault();
        var option = $('option:selected', this).val();
        var origin = $("#sel2").val();
        var des = $("#sel22").val();
        var qty = $("#berat").val();

        if (qty === '0' || qty === '') {
            alert('null');
        } else if (option === '') {
            alert('null');
        } else {
            getOrigin(origin, des, qty, option);
        }
    });


    function getOrigin(origin, des, qty, cour) {
        var $op = $("#hasil");
        var i, j, x = "";

        $.getJSON("tarif/" + origin + "/" + des + "/" + qty + "/" + cour, function(data) {
            $.each(data, function(i, field) {

                for (i in field.costs) {
                    x += "<p class='mb-0'><b>" + field.costs[i].service + "</b> : " + field.costs[i]
                        .description + "</p>";

                    for (j in field.costs[i].cost) {
                        x += field.costs[i].cost[j].value + "<br>" + field.costs[i].cost[j].etd + "<br>" +
                            field.costs[i].cost[j].note;
                    }

                }

                $op.html(x);

            });
        });

    }


    function getKota1(idpro) {
        var $op = $("#sel22");

        $.getJSON("kota/" + idpro, function(data) {
            $.each(data, function(i, field) {


                $op.append('<option value="' + field.city_id + '">' + field.type + ' ' + field.city_name +
                    '</option>');

            });

        });

    }

    function getKota(idpro) {
        var $op = $("#sel2");

        $.getJSON("kota/" + idpro, function(data) {
            $.each(data, function(i, field) {


                $op.append('<option value="' + field.city_id + '">' + field.type + ' ' + field.city_name +
                    '</option>');

            });

        });

    }
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