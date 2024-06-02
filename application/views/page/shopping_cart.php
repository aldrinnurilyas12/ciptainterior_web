<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

    <title>Keranjang Belanja</title>
    <link href="<?php echo base_url() . 'assets/img/logo.png' ?>" rel="shortcut icon" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'mobile/css/jquery.mmenu.all.css' ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'mobile/css/style.css' ?>" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-startup-image" href="img/apple-touch-startup-image.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="o-page" style="background-color:#fff;">

    <?php
    $id_status = $this->order_model->get_status_id();

    ?>


    <div style="display: flex;height:max-content;width:100%;position:sticky;" class="bannerPane banner-bg">
        <div style="display:block;height:max-content;padding:35px 0px 0px 35px;" class="s-banner-content">
            <h3 style="font-weight: bold;">Shopping Cart</h3>
            <p style="font-size: 15px;">
                <?php
                if ($this->cart->total_items()) {
                    echo $this->cart->total_items() . " Produk ada dikeranjang
                belanja anda";
                } else {
                    echo "Tidak ada produk dikeranjang anda";
                }   ?>
            </p>
        </div>

    </div>
    <div style="padding: 0px 30px 30px 30px;height:420px;overflow-y: scroll;" id="content">
        <form method="POST" action="<?php echo base_url() . 'cart/update' ?>">
            <?php $i = 1; ?>
            <?php foreach ($this->cart->contents() as $items) : ?>
            <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>

            <div class="card card-stepper"
                style="border-radius: 10px;margin-top:10px;margin-bottom:10px;font-size:12px; width:100%;">

                <div style="padding: 15px;" class="card-bodynew">
                    <div style="padding: 0; gap:12px;" class="d-flex flex-row ">
                        <div>
                            <img style="width: 140px;height:120px;border-radius:10px;"
                                src="<?php echo base_url() . 'uploads/' . $items['image']; ?>">
                        </div>
                        <div class="flex-fill">

                            <div style="display: flex; justify-content:space-between;" class="content-title-dlt-trash">


                                <h5 style="font-weight: 600;font-family:Inter,sans-serif;margin-top:0;font-size:14px;"
                                    class="bold">
                                    <?= $items['name']; ?>
                                </h5>
                            </div>

                            <div style="display: block;" class="d-block-total">

                                <p style="font-weight: 600;margin:0;margin-bottom:5px;font-size:13px;" class="mb">
                                    <?php echo "Rp " . number_format($items['price']); ?>

                                </p>

                                <div style="display: block; height:max-content;" class="grand-total">
                                    <div style="display:flex;gap:10px;padding: 0;color:black;font-size: 12px;font-weight:500;font-family:Inter,sans-serif;align-content:center;"
                                        class="text4">
                                        Banyak: <p><?php echo $items['qty'] ?></p>
                                    </div>
                                    <div style="font-size: 13px;color:black;font-weight:700;" class="quantity-subtotal">
                                        <div style="display: block;" class="text-content-subtotal">
                                            Subtotal:
                                            <p> <?php echo "Rp " . number_format($items['subtotal']); ?></p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div style="display: flex;gap:10px;justify-content:center; height:max-content;"
                                class="button-area">
                                <div style="margin: 0px 0px 10px 0px;width:90px;" class="quantity-subtotal">
                                    <?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'style' => 'height: 20px;border-radius:4px;text-align:center;', 'type' => 'number')); ?>
                                </div>
                                <div class="quantity-trash">
                                    <a class="bi bi-trash3-fill" style="color:red;font-size:25px;"
                                        href="<?php echo base_url() . 'cart/delete_cart/' . $items['rowid']; ?>"></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++; ?>
            <?php endforeach; ?>
    </div>
    <div style="display: flex;justify-content:center;margin-top:10px;" class="grand-total-content">
        <div style="display: block;text-align:center;" class="content-grand-total-sub">
            <p style="margin: 0;font-size:13px;">Total belanja anda:</p>
            <h4 style="text-align: center;">
                <?php echo "Rp " . number_format($this->cart->total()); ?>
            </h4>
        </div>
    </div>
    <br>


    <div style="display: flex;gap:10px;justify-content:center;" class="button-family">

        <button style="height: 40px;font-size:13px;font-weight:600;" class="btn btn-primary" type="submit">Update
            Keranjang</button>
        </form>



        <form method="POST" action="<?php echo base_url() . 'cart/check_out'  ?>">
            <?php $i = 1; ?>
            <?php foreach ($this->cart->contents() as $items) : ?>
            <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
            <input hidden name="quantity" value="<?php echo $items['qty'] ?>">
            <input hidden type="text" name="grand_total" value="<?php echo $items['subtotal']; ?>">
            <?php $i++; ?>

            <?php endforeach; ?>
            <input type="text" hidden name="status_id" value="<?php echo $id_status; ?>">
            <button style="width:120px;height:40px;padding:5px;font-size:15px;font-weight:600;border-radius:5px;
                            background:#DC143C;color:white; cursor:pointer;border:none;" type="submit">Pesan</button>

        </form>

        <!-- <form action="#">
            <input style="width: 140px; height:30px;" type="text" placeholder="Gunakan voucher">
            <button>Pakai</button>
        </form> -->
    </div>

</body>

<script>
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


<?php
    if ($this->session->flashdata('success_message')) : ?>

Swal.fire({
    text: '<?= $this->session->flashdata('success_message') ?>',
    icon: 'success',
    position: 'bottom-end',
    toast: true,
    showConfirmButton: false,
    timer: 3000
});
<?php endif; ?>
</script>

</html>