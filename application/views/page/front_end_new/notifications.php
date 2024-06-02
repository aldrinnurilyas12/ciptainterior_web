<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi</title>
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container-content-first">
        <main id="main" class="main">
            <section class="section profile">
                <div style="font-family: Inter, sans-serif;display: flex;justify-content:center;padding:20px;" class="row">
                    <h3 style="font-size: 20px; font-weight:700;">Notifikasi</h3>
                    <div style="font-family: Inter, sans-serif;width:100%" class="w3-container">
                        <div class="w3-menu-bar-profile">
                            <div class="menu-btn">
                                <button class="w3-bar-item w3-button-tab tablink w3-tab" onclick="openCity(event,'all-notification')">Semua</button>
                                <button class="w3-bar-item w3-button-tab tablink" onclick="openCity(event,'confirmed')">Berhasil</button>
                            </div>
                        </div>

                        <!-- ALL NOTIFICATIONS -->
                        <div id="all-notification" class="w3-container-content city">
                            <div style="font-family: Inter, sans-serif;padding: 0;" class="container">
                                <div style="font-family: Inter, sans-serif;padding: 10px;" class="main-body">
                                    <div style="display:flex; justify-content:center;padding:0px 25px 25px 25px;" class="row gutters-sm">
                                        <div style="display: block; width:450px;height:450px;overflow-y:scroll;overflow-x: hidden;padding:10px;" class="show-notifications">
                                            <div style="padding: 8px;" class="card-notifications">


                                                <?php if ($notification->result() == null) {
                                                    echo "Tidak ada notifikasi";
                                                } else {
                                                    foreach ($notification->result() as $notif) {  ?>
                                                        <div style="display: flex; justify-content:space-between;" class="title-notif">
                                                            <h4 style="font-size: 12px;font-weight:bold;margin:0;">
                                                                Transaksi - Pemesanan
                                                            </h4>
                                                            <p style="font-size: 12px;color:black; margin:0;">
                                                                <?php
                                                                $tgl_pesan = new DateTime($notif->confirm_date);
                                                                $order_date = $tgl_pesan->format('d F Y H:i A');
                                                                echo $order_date; ?>
                                                            </p>
                                                        </div>

                                                        <p style="width: 350px;height:max-content;font-size:13px;color:black;margin:0;">
                                                            <i class="fa fa-check" aria-hidden="true"></i> Pemesanan untuk
                                                            produk
                                                            <span style="font-weight: 600;"><?php echo $notif->nama_produk; ?></span>
                                                            <?php if ($notif->status_code == 1) {
                                                                echo "berhasil dikonfirmasi";
                                                            } elseif ($notif->status_code == 2) {
                                                                echo "selesai";
                                                            } else {
                                                                echo "berhasil dipesan dengan Harga Rp" . number_format($notif->spent_total);
                                                            }
                                                            ?>

                                                            <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                                                        </p>
                                                        <div style="display: flex;gap:8px;" class="text-content-status">
                                                            <p style="color:grey; font-size:11px;margin-top:5px;margin-bottom:5px;">
                                                                Kode ref:
                                                                <?php echo $notif->id_pemesanan; ?></p>


                                                        </div>

                                                        <hr style="margin: 15px;">
                                                    <?php } ?>
                                                <?php } ?>


                                                <?php foreach ($pay_notifications->result() as $notif_pay) {  ?>
                                                    <div style="display: flex; justify-content:space-between;" class="title-notif">
                                                        <h4 style="font-size: 12px;font-weight:bold;margin:0;">
                                                            Transaksi - Pembayaran
                                                        </h4>
                                                        <p style="font-size: 12px;color:black; margin:0;">
                                                            <?php
                                                            $tgl_bayar = new DateTime($notif_pay->tgl_bayar);
                                                            $pay_date = $tgl_bayar->format('d F Y H:i A');
                                                            echo $pay_date; ?>
                                                        </p>
                                                    </div>

                                                    <p style="width: 350px;height:max-content;font-size:13px;color:black;margin:0;">
                                                        <i class="fa fa-check" aria-hidden="true"></i> Pembayaran untuk
                                                        produk
                                                        <span style="font-weight: 600;"><?php echo $notif_pay->nama_produk; ?></span>
                                                        <?php if ($notif_pay->status == 1) {
                                                            echo "berhasil";
                                                        }

                                                        ?>

                                                        <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                                                    </p>
                                                    <p style="color:grey; font-size:11px;margin-top:5px;margin-bottom:5px;">
                                                        Kode ref:
                                                        <?php echo $notif_pay->id_pemesanan; ?></p>
                                                    <hr style="margin: 15px;">
                                                <?php } ?>

                                            </div>

                                            <!-- PAY notif -->

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END -->

                        <!-- CONFIRMED NOTIFICATIONS -->


                        <div id="confirmed" class="w3-container-content city" style="display: none;">
                            <div style="font-family: Inter, sans-serif;padding: 0;" class="container">
                                <div style="font-family: Inter, sans-serif;padding: 10px;" class="main-body">
                                    <div style="display:flex; justify-content:center;padding:25px;" class="row gutters-sm">
                                        <div style="display: block; width:450px;height:450px;overflow-y:scroll;overflow-x: hidden;padding:0px;" class="show-notifications">
                                            <div style="padding: 10px;" class="card-notifications">
                                                <?php if ($notification_success->result() == null) {
                                                    echo "Tidak ada notifikasi";
                                                } else {
                                                    foreach ($notification_success->result() as $notif) {  ?>
                                                        <div style="display: flex; justify-content:space-between;" class="title-notif">
                                                            <h4 style="font-size: 12px;font-weight:bold;margin:0;">
                                                                Transaksi - Pemesanan

                                                            </h4>
                                                            <p style="font-size: 12px;color:black; margin:0;">
                                                                <?php
                                                                $tgl_pesan = new DateTime($notif->confirm_date);
                                                                $order_date = $tgl_pesan->format('d F Y H:i A');
                                                                echo $order_date; ?>
                                                            </p>
                                                        </div>

                                                        <p style="width: 350px;height:max-content;font-size:13px;color:black;margin:0;">
                                                            <i class="fa fa-check" aria-hidden="true"></i> Pemesanan untuk
                                                            produk
                                                            <span style="font-weight: 600;"><?php echo $notif->nama_produk; ?></span>
                                                            <?php if ($notif->status_code == 1) {
                                                                echo "berhasil dikonfirmasi";
                                                            } elseif ($notif->status_code == 2) {
                                                                echo "selesai";
                                                            }
                                                            ?>

                                                            <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                                                        </p>
                                                        <p style="color:grey; font-size:11px;margin-top:5px;margin-bottom:5px;">
                                                            Kode ref:
                                                            <?php echo $notif_pay->id_pemesanan; ?></p>
                                                        <hr style="margin: 15px;">
                                                    <?php } ?>
                                                <?php } ?>


                                                <!-- Pay Notif -->
                                                <!-- PAY notif -->

                                                <?php if ($pay_notifications->result() == null) {
                                                    echo "Tidak ada notifikasi";
                                                } else {
                                                    foreach ($pay_notifications->result() as $notif_pay) {  ?>
                                                        <div style="display: flex; justify-content:space-between;" class="title-notif">
                                                            <h4 style="font-size: 12px;font-weight:bold;margin:0;">
                                                                Transaksi - Pembayaran
                                                            </h4>
                                                            <p style="font-size: 12px;color:black; margin:0;">
                                                                <?php
                                                                $tgl_bayar = new DateTime($notif_pay->tgl_bayar);
                                                                $pay_date = $tgl_bayar->format('d F Y H:i A');
                                                                echo $pay_date; ?>
                                                            </p>
                                                        </div>

                                                        <p style="width: 350px;height:max-content;font-size:13px;color:black;margin:0;">
                                                            <i class="fa fa-check" aria-hidden="true"></i> Pembayaran untuk
                                                            produk
                                                            <span style="font-weight: 600;"><?php echo $notif_pay->nama_produk; ?></span>
                                                            <?php if ($notif_pay->status == 1) {
                                                                echo "berhasil";
                                                            }

                                                            ?>

                                                            <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                                                        </p>
                                                        <p style="color:grey; font-size:11px;margin-top:5px;margin-bottom:5px;">
                                                            Kode ref:
                                                            <?php echo $notif_pay->id_pemesanan; ?></p>
                                                        <hr style="margin: 15px;">
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- END  -->




                    </div>
                </div>

            </section>

        </main>
    </div>

</body>


<script>
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


</html>