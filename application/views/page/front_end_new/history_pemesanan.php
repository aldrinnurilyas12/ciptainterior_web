<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="<?php echo base_url() ?>assets/css/responsive.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/build/css/beranda.css">

    <title>Cipta Interior</title>
</head>

<body>
    <div class="container-content-first">
        <div class="w3-container">
            <div style="overflow-x:auto;" class="w3-menu-bar">
                <div class="menu-btn">
                    <button class="w3-bar-item w3-button-tab tablink w3-tab" onclick="openCity(event,'Order_success')">Selesai</button>
                    <button class="w3-bar-item w3-button-tab tablink" onclick="openCity(event,'Order_confirmed')">Sudah
                        konfirmasi</button>
                    <button class="w3-bar-item w3-button-tab tablink" onclick="openCity(event,'Order_not_confirmed')">Belum
                        konfirmasi</button>
                    <button class="w3-bar-item w3-button-tab tablink" onclick="openCity(event,'Payment')">Pembayaran</button>
                    <button class="w3-bar-item w3-button-tab tablink" onclick="openCity(event,'Voucher')">E-Voucher</button>

                </div>


            </div>

            <!-- SUCCESS ORDER SEGMENT -->
            <div id="Order_success" class="w3-container-content city">
                <h2 style="font-family: Inter, sans-serif;">Pesanan Selesai</h2>

                <div style="overflow-x: hidden;">
                    <section style="height: 100%; overflow-x: hidden;" class="gradient-custom">

                        <div style="width: 100%;display:flex; justify-content:center;padding:0;" class="container">
                            <div style="width: 100%;" class="container-content">
                                <?php
                                $base_url = 'assets/dist/icons/';
                                $image_filename = 'shopping.png';
                                if (empty($order_success->result())) {
                                    echo '<div style="text-align: center; justify-content:center;display:block;">';
                                    echo '<img class="img_empty" src="' . $base_url . $image_filename . '" alt="Empty Image">';
                                    echo '<p style="font-size:15px; font-weight:600;">Pesananmu masih kosong nih...</p>';
                                    echo '</div>';
                                } else {
                                    foreach ($order_success->result() as $row) :
                                ?>
                                        <div class="card card-stepper" style="border-radius: 10px;margin-top:10px;margin-bottom:10px;font-size:12px; width:100%;">
                                            <div style="padding: 15px 15px 0px 15px" class="card-header-new">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>

                                                        <div style="display: block;" class="d-block-order-date">
                                                            <div style="display: block;" class="order-date-confirm">
                                                                <p style="margin-bottom:0px; font-weight:700;"> Belanja
                                                                </p>
                                                                <p style="margin-bottom: 0px;color: gray;">
                                                                    <?php
                                                                    $date = new DateTime($row->tgl_pesan);
                                                                    $OrderDate = $date->format('d F Y H:i A');
                                                                    echo $OrderDate;
                                                                    ?></p>

                                                                <p style="margin-bottom:0px; font-weight:700;"> Terima
                                                                </p>
                                                                <p style="margin-bottom: 0px;color: gray;">
                                                                    <?php

                                                                    if ($row->status_code == '3') {
                                                                        $date = new DateTime($row->confirm_date);
                                                                        $OrderDate = $date->format('d F Y H:i A');
                                                                        echo $OrderDate;
                                                                    } else {
                                                                        echo "Belum diterima";
                                                                    }

                                                                    ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h6 style="display: flex;gap:8px;" class="mb-0">

                                                            <?php

                                                            if ($row->status_code == '3') {
                                                                echo '<p style="width:max-content;color:green;font-weight:bold;
                                                                background:rgba(0, 255, 71, 0.12);border-radius:5px;padding:8px ;font-size:12px;font-family:Inter,sans-serif;">
                                                                           Sudah diterima / Selesai</p>';
                                                            } elseif ($row->status_code == '2') {


                                                                echo '<p style="width:max-content;background:rgba(187, 255, 180, 0.8);color:green;font-weight:bold; border-radius:5px; 
                                                                font-size:12px;padding:8px;font-family:Inter,sans-serif;" >Selesai</p>';
                                                            }

                                                            ?>



                                                        </h6>
                                                    </div>

                                                </div>
                                            </div>
                                            <hr style="margin: 0;">
                                            <div style="padding: 15px 15px 15px 15px;" class="card-bodynew">
                                                <div style="padding: 0; gap:12px;" class="d-flex flex-row ">
                                                    <div>
                                                        <img style="border-radius: 5px;" class="align-self-center img-fluid" src="<?php echo base_url() . '/uploads/' . $row->foto; ?>" width="60" height="60">
                                                    </div>
                                                    <div class="flex-fill">
                                                        <h5 style="font-weight: 600;margin-top:0;font-size:14px;" class="bold">
                                                            <?php echo $row->nama_produk; ?>
                                                        </h5>
                                                        <p style="margin-bottom: 5px;" class="text-muted">
                                                            <?php echo $row->quantity; ?> Barang</p>

                                                        <div style="display: block;" class="d-block-total">
                                                            <p style="margin: 0;font-size:11px;">Total belanja</p>
                                                            <p style="font-weight: 700;margin:0;" class="mb-3">
                                                                <?php echo "Rp" . number_format($row->grand_total) ?>

                                                            </p>
                                                        </div>
                                                        <div style="display: flex;flex-wrap:wrap; gap:5px;" class="btn-pay">
                                                            <a style="width: 100px;padding:7px;color:white; background:#DC143C;border-radius:5px;text-align:center;font-family:Inter,sans-serif;font-weight:600;" href="<?= site_url('products/view/' . $row->id_produk) ?>">Beli
                                                                lagi</a>
                                                            <a style="width: 100px;padding:7px;color:#DC143C;border-radius:5px;text-align:center;font-family:Inter,sans-serif;font-weight:600;border:1px solid #DC143C;" href="<?= site_url('ulasproducts/ulasan/' . $row->id_produk) ?>">Ulas</a>
                                                            <a style="width: max-content;padding:7px;color:#DC143C;border-radius:5px;text-align:center;font-family:Inter,sans-serif;font-weight:600;border:1px solid #DC143C;" href="<?= site_url('user/invoice/' . $row->id_pemesanan);  ?>">
                                                                Nota Kwitansi</a>



                                                            <?php
                                                            if ($row->status_code == 3) {
                                                                echo "";
                                                            } elseif ($row->status_code == 2) {
                                                                echo  '<a class="btn btn-primary"
                                                                 href=" ' .  site_url('user/order_accept/' . $row->id_pemesanan) . '">Terima</a>';
                                                            }


                                                            ?>




                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

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
                                                        <p>Apa kamu yakin pesanan diterima ?</p>
                                                    </div>
                                                    <form action="<?php echo base_url('user/updatestatus_order'); ?>" method="post">
                                                        <div style="display: flex; justify-content:center;" class="checkbox-wrapper-19">
                                                            <select style="height: 35px;border-radius:5px;margin-top:5px;font-size: 
                            12px;font-weight:600;padding-top:0; padding-bottom:0;font-family:Inter,sans-serif;" name="status_code" id="">

                                                                <option>--Ubah status--</option>
                                                                <?php
                                                                foreach ($data_category->result() as $ctg) { ?>
                                                                    <option value="<?php echo $ctg->id ?>">
                                                                        <?php echo $ctg->status_category_name ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                            <?php foreach ($payments->result() as $pay) {

                                                            ?>
                                                                <input type="text" value="<?php echo $pay->status_id ?>" name="status_id">

                                                            <?php } ?>
                                                        </div>

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Terima
                                                                pesanan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                <?php endforeach;
                                } ?>
                            </div>
                        </div>

                    </section>
                </div>
            </div>

            <!-- SUCCESS CONFIRMED SEGMENT -->
            <div id="Order_confirmed" class="w3-container-content city" style="display:none">
                <h2 style="font-family:Inter,sans-serif;">Sudah dikonfirmasi</h2>
                <div style="overflow-x: hidden;">
                    <section style="height: 100%; overflow-x: hidden;" class="gradient-custom">

                        <div style="width: 100%;display:flex; justify-content:center;padding:0;" class="container">
                            <div style="width: 100%;" class="container-content">
                                <?php
                                $base_url = 'assets/dist/icons/';
                                $image_filename = 'shopping.png';

                                if (empty($success_confirmed->result())) {
                                    echo '<div style="text-align: center; justify-content:center;display:block;">';
                                    echo '<img class="img_empty" src="' . $base_url . $image_filename . '" alt="Empty Image">';
                                    echo '<p style="font-size:15px; font-weight:600;">Pesananmu masih kosong nih...</p>';
                                    echo '</div>';
                                } else {
                                    foreach ($success_confirmed->result() as $row) :
                                ?>
                                        <div class="card card-stepper" style="border-radius: 10px;margin-top:10px;margin-bottom:10px;font-size:12px; width:100%;">
                                            <div style="padding: 15px;" class="card-header-new">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div style="display: flex;gap:15px;" class="d-flex-order-dates">
                                                            <div style="display: block;" class="d-block-order-date">
                                                                <p style="margin-bottom:0px; font-weight:700;"> Belanja
                                                                </p>
                                                                <p style="color: gray;margin-bottom:0px;">
                                                                    <?php
                                                                    $date = new DateTime($row->tgl_pesan);
                                                                    $OrderDate = $date->format('d F Y H:i A');
                                                                    echo $OrderDate;
                                                                    ?>

                                                                </p>
                                                            </div>

                                                            <div style="display: block;" class="d-block-order-date">
                                                                <p style="margin-bottom:0px; font-weight:700;"> Bayar
                                                                </p>
                                                                <p style="color: gray;margin-bottom:0px;">
                                                                    <?php
                                                                    if (empty($row->tgl_bayar)) {
                                                                        echo "-";
                                                                    } else {
                                                                        $datepay = new DateTime($row->tgl_bayar);
                                                                        $Date = $datepay->format('d F Y H:i A');
                                                                        echo $Date;
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div style="display: block;" class="d-block-order-date">
                                                            <p style="margin-bottom:0px; font-weight:700;"> Order ID
                                                            </p>
                                                            <p style="color: gray;margin-bottom:0px;">
                                                                <?php echo $row->id_pemesanan; ?>
                                                            </p>
                                                        </div>
                                                        <div style="display: block;" class="d-block-order-date">
                                                            <p style="margin-bottom:0px; font-weight:700;"> Alamat pengiriman
                                                                &nbsp; &nbsp;
                                                                <span>
                                                                    <a style="font-size: 11px;text-decoration:underline;color:#DC143C;" href="<?php echo base_url() ?>user-profile">
                                                                        Ubah</a></span>
                                                            </p>
                                                            <p style="color: gray;margin-bottom:0px;">
                                                                <?php echo $row->alamat; ?>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <h6 class="mb-0">
                                                            <?php echo $row->status == '1' ? '<p style="width:max-content;color:green;font-weight:bold; background:rgba(0, 255, 71, 0.12);border-radius:5px;padding:4px ;font-size:11px;font-family:Inter,sans-serif;">Sudah Konfirmasi</p>' :
                                                                '<p style="width:max-content;background:rgba(255, 0, 3, 0.12);color:red;font-weight:bold; border-radius:5px; font-size:10px;padding:5px;font-family:Inter,sans-serif;" >Belum Konfirmasi</p>'; ?>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr style="margin: 0;">
                                            <div style="padding: 15px;" class="card-bodynew">
                                                <div style="padding: 0; gap:12px;" class="d-flex flex-row ">
                                                    <div>
                                                        <img style="border-radius: 5px;" class="align-self-center img-fluid" src="<?php echo base_url() . '/uploads/' . $row->foto; ?>" width="60" height="60">
                                                    </div>
                                                    <div class="flex-fill">
                                                        <h5 style="font-weight: 600;font-family:Inter,sans-serif;margin-top:0;font-size:14px;" class="bold">
                                                            <?php echo $row->nama_produk; ?>
                                                        </h5>
                                                        <p style="margin-bottom: 5px;" class="text-muted">
                                                            <?php echo $row->quantity; ?> Barang</p>
                                                        <div style="display: block;" class="d-block-total">
                                                            <p style="margin: 0;font-size:11px;">Total belanja</p>
                                                            <p style="font-weight: 700;margin:0;" class="mb-3">
                                                                <?php echo "Rp" . number_format($row->grand_total) ?>

                                                            </p>
                                                        </div>
                                                        <div style="display: flex;flex-wrap:wrap; gap:5px;" class="btn-pay">


                                                            <?php echo $row->id_payment !== null ?
                                                                '<a style="width: 100px;padding:7px;color:white; background:gray;border-radius:5px;text-align:center;font-family:Inter,sans-serif;font-weight:600;">Sudah Bayar</a>'
                                                                :
                                                                '<a style="width: 100px;padding:7px;color:white; background:#DC143C;border-radius:5px;text-align:center;font-family:Inter,sans-serif;font-weight:600;" href="' . site_url('pembayaran/sendpay/' . $row->id_pemesanan) . '">Bayar</a>';
                                                            ?>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>



                                <?php endforeach;
                                } ?>
                            </div>
                        </div>

                    </section>
                </div>
            </div>

            <!-- NOT CONFIRMED SEGMENT -->
            <div id="Order_not_confirmed" class="w3-container-content city" style="display:none">
                <h2 style="font-family:Inter,sans-serif;">Belum dikonfirmasi</h2>
                <p>Harap melakukan pembayaran</p>
                <div style="overflow-x: hidden;">
                    <section style="height: 100%; overflow-x: hidden;" class="gradient-custom">

                        <div style="width: 100%;display:flex; justify-content:center;padding:0;" class="container">
                            <div style="width: 100%;" class="container-content">
                                <?php
                                $base_url = 'assets/dist/icons/';
                                $image_filename = 'shopping.png';

                                if (empty($not_confirmed->result())) {
                                    echo '<div style="text-align: center; justify-content:center;display:block;">';
                                    echo '<img class="img_empty" src="' . $base_url . $image_filename . '" alt="Empty Image">';
                                    echo '<p style="font-size:15px; font-weight:600;">Pesananmu masih kosong nih...</p>';
                                    echo '</div>';
                                } else {
                                    foreach ($not_confirmed->result() as $row) :
                                ?>
                                        <div class="card card-stepper" style="border-radius: 10px;margin-top:10px;margin-bottom:10px;font-size:12px; width:100%;">
                                            <div style="padding: 15px;" class="card-header-new">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div style="display: flex;gap:15px;" class="d-flex-order-dates">
                                                            <div style="display: block;" class="d-block-order-date">
                                                                <p style="margin-bottom:0px; font-weight:700;"> Belanja
                                                                </p>
                                                                <p style="color: gray;margin-bottom:0px;">
                                                                    <?php
                                                                    $date = new DateTime($row->tgl_pesan);
                                                                    $OrderDate = $date->format('d F Y H:i A');
                                                                    echo $OrderDate;
                                                                    ?>

                                                                </p>
                                                            </div>

                                                            <div style="display: block;" class="d-block-order-date">
                                                                <p style="margin-bottom:0px; font-weight:700;"> Bayar
                                                                </p>
                                                                <p style="color: gray;margin-bottom:0px;">
                                                                    <?php
                                                                    if (empty($row->tgl_bayar)) {
                                                                        echo "-";
                                                                    } else {
                                                                        $datepay = new DateTime($row->tgl_bayar);
                                                                        $Date = $datepay->format('d F Y H:i A');
                                                                        echo $Date;
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <div style="display: block;" class="d-block-order-date">
                                                            <p style="margin-bottom:0px; font-weight:700;"> Order ID
                                                            </p>
                                                            <p style="color: gray;margin-bottom:0px;">
                                                                <?php echo $row->id_pemesanan; ?>
                                                            </p>
                                                        </div>

                                                        <div style="display: block;" class="d-block-order-date">
                                                            <p style="margin-bottom:0px; font-weight:700;"> Alamat pengiriman
                                                                &nbsp; &nbsp;
                                                                <span>
                                                                    <a style="font-size: 11px;text-decoration:underline;color:#DC143C;" href="<?php echo base_url() ?>user-profile">
                                                                        Ubah</a></span>
                                                            </p>
                                                            <p style="color: gray;margin-bottom:0px;">
                                                                <?php echo $row->alamat; ?>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <h6 class="mb-0">
                                                            <?php echo $row->status == '1' ? '<p style="width:max-content;color:green;font-weight:bold; background:rgba(0, 255, 71, 0.12);border-radius:5px;padding:4px ;font-size:11px;font-family:Inter,sans-serif;">Sudah Konfirmasi</p>' :
                                                                '<p style="width:max-content;background:rgba(255, 0, 3, 0.12);color:red;font-weight:bold; border-radius:5px; font-size:10px;padding:5px;font-family:Inter,sans-serif;" >Belum Konfirmasi</p>'; ?>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr style="margin: 0;">
                                            <div style="padding: 15px;" class="card-bodynew">
                                                <div style="padding: 0; gap:12px;" class="d-flex flex-row ">
                                                    <div>
                                                        <img style="border-radius: 5px;" class="align-self-center img-fluid" src="<?php echo base_url() . '/uploads/' . $row->foto; ?>" width="60" height="60">
                                                    </div>
                                                    <div class="flex-fill">
                                                        <h5 style="font-weight: 600;font-family:Inter,sans-serif;margin-top:0;font-size:14px;" class="bold">
                                                            <?php echo $row->nama_produk; ?>
                                                        </h5>
                                                        <p style="margin-bottom: 5px;" class="text-muted">
                                                            <?php echo $row->quantity; ?> Barang</p>
                                                        <div style="display: block;" class="d-block-total">
                                                            <p style="margin: 0;font-size:11px;">Total belanja</p>
                                                            <p style="font-weight: 700;margin:0;" class="mb-3">
                                                                <?php echo "Rp" . number_format($row->grand_total) ?>

                                                            </p>
                                                        </div>
                                                        <div style="display: flex;flex-wrap:wrap; gap:5px;" class="btn-pay">

                                                            <?php echo $row->id_payment !== null ?
                                                                '<a style="width: 100px;padding:7px;color:white; background:gray;border-radius:5px;text-align:center;font-family:Inter,sans-serif;font-weight:600;">Sudah Bayar</a>'
                                                                :
                                                                '<a style="width: 100px;padding:7px;color:white; background:#DC143C;border-radius:5px;text-align:center;font-family:Inter,sans-serif;font-weight:600;" href="' . site_url('pembayaran/sendpay/' . $row->id_pemesanan) . '">Bayar</a>';
                                                            ?>
                                                            <a style="width: 100px;padding:7px;color:#DC143C;border-radius:5px;text-align:center;font-family:Inter,sans-serif;font-weight:600;border:1px solid #DC143C;" href="<?= site_url('history_services/historypemesanan/remove/' . $row->id_pemesanan);  ?>">Batalkan</a>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                <?php endforeach;
                                } ?>
                            </div>
                        </div>

                    </section>
                </div>
            </div>

            <!-- PAYMENT SEGMENT -->
            <div id="Payment" class="w3-container-content city" style="display:none">
                <h2>Riwayat Pembayaran</h2>
                <div style="overflow-x:auto;">

                    <table class="table" style="margin-top: 10px;">
                        <thead>
                            <tr>
                                <th>Bukti Bayar</th>
                                <th>Id Payment</th>
                                <th>Id Pemesanan</th>
                                <th>Nama Pelanggan</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Banyak</th>
                                <th>Bank</th>
                                <th>Jumlah Bayar</th>
                                <th>Status</th>

                                <th>Tanggal Bayar</th>
                            </tr>

                        </thead>
                        <?php


                        if (empty($payments_history->result())) {
                            echo "Tidak ada pembayaran";
                        } else {
                            foreach ($payments_history->result() as $pay) :
                        ?>
                                <tbody>
                                    <tr style="font-size: 15px;">
                                        <td><img src="<?php echo base_url() . '/fotobuktibayar/' . $pay->bukti_bayar; ?>" width="50" height="50"></td>
                                        <td style="width:50px ;"><?php echo $pay->id_payment; ?></td>
                                        <td><?php echo $pay->id_pemesanan; ?></td>
                                        <td><?php echo $pay->nama_lengkap; ?></td>
                                        <td><?php echo $pay->nama_produk; ?></td>
                                        <td><?php echo "Rp" . number_format($pay->harga); ?></td>
                                        <td><?php echo $pay->quantity; ?></td>
                                        <td><?php echo $pay->bank; ?></td>
                                        <td><?php echo "Rp" . number_format($pay->grand_total); ?></td>
                                        <td><?php echo $pay->status == '1' ? '<p style="width:90px;color:green;font-weight:bold; font-size:14px;">Sudah Konfirmasi</p>' : '<p style="width:90px;color:red;font-weight:bold; font-size:14px;" >Belum Konfirmasi</p>'; ?>



                                        <td><?php echo $pay->tgl_bayar; ?></td>

                                    </tr>
                                </tbody>
                        <?php endforeach;
                        } ?>
                    </table>
                </div>
            </div>
        </div>


    </div>



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


    <?php
    if ($this->session->flashdata('sukses_hapus')) : ?>

        Swal.fire({
            text: '<?= $this->session->flashdata('sukses_hapus') ?>',
            icon: 'success',
            position: 'bottom-end',
            toast: true,
            showConfirmButton: false,
            timer: 3000
        });
    <?php endif; ?>

    function openCity(evt, cityName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" w3-tab", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " w3-tab";
    }
</script>
</script>


<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>

</html>