<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css" />
    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="<?php echo base_url() ?>assets/css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>


    <?php
    $pay_code = $this->pembayaran_model->pay_code();
    $pay_code;
    ?>


    <header style="position: sticky; padding:10px; z-index:99999; background:white;top:0;" class="header_section">
        <div style="display: block;" class="container">

            <div class="navbar-main-content">
                <nav style="font-size: 13px;font-family:Inter;padding-left:0; padding-right:0;"
                    class="navbar navbar-expand-lg custom_nav-container ">
                    <div style="display: flex;align-items:center;" class="img-searchbox">
                        <img width="100" height="70" src="<?php echo base_url() ?>assets/dist/img/logo.png"
                            alt="ini logo" />

                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul style="font-size:13px;" class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo base_url() ?>beranda">Home <span
                                        class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url() ?>beranda#products">Produk</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url() ?>beranda#testimonial">Testimonial</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url() ?>beranda#kontak">Kontak Kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url() ?>beranda#blog">Blog</a>
                            </li>

                            <li style="width:30px;height:30px;background:whitesmoke;font-size:20px;padding:5px; border-radius:50px; 
                    align-items:center;display:flex;justify-content:center;margin-left:10px;">
                                <a style="color: black;" href="<?php echo base_url() ?>cart/shopping_cart">
                                    <i class="fa fa-shopping-bag" aria-hidden="true"><span style="width: 20px;height:20px;background:#DC143C;color:white;
                                margin-top:-12px;position:absolute;border-radius:50px;font-size:11px;align-content:center;text-align:center;
                                font-weight:bold;font-family:Inter,sans-serif;"> <?= $this->cart->total_items(); ?>
                                        </span></i></a>
                            </li>


                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                            <li class="nav-item dropdown">
                                <a style="background:#191919;color:white; padding:5px; border-radius:50px; width:max-content;"
                                    class="nav-link dropdown-toggle" href="" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="true">
                                    <span class="nav-label">

                                        <?php
                                        if ($this->session->userdata('is_login')) {
                                            foreach ($image->result_array() as $foto) {
                                                echo '<img src="' . base_url() . '/profile_picture/' . $foto['image'] .
                                                    '" class="rounded-circle" height="30" width="30">';
                                            } ?>
                                        <?php } ?>

                                        <span class="caret"></span></a>
                                <?php foreach ($customers->result_array() as $user) {
                                    $username = $user['username'];
                                ?>
                                <ul style="height: 200px;" class="dropdown-menu">
                                    <li> <a href="<?php echo base_url('user-profile') ?>">Profil</a>
                                    </li>
                                    <li> <a href="<?php echo base_url('order-history'); ?>">Transaksi</a>
                                    </li>
                                    <li> <a href="<?php echo base_url('saved-items'); ?>">Item tersimpan</a>
                                    </li>
                                    <li> <a href="<?php echo base_url('kritiksaran'); ?>">Kritik dan Saran</a>
                                    </li>
                                    <li><a href="<?php echo base_url('sign-out'); ?>">Keluar</a></li>
                                </ul>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div style="display: flex; justify-content:center; width:100%;height:max-content;padding-top:8px;"
                class="form-search-box">
                <form style="display: flex; gap:5px;width:100%;align-items:center;" action="<?= base_url('find') ?>"
                    method="get">
                    <input name="q"
                        style="width:100%; height:40px; border-radius:5px;border:1px solid gray;font-weight:bold;margin:0;"
                        type="text" placeholder="Cari produk disini...">
                    <span class="input-group-btn">
                        <button style="padding: 2.8px;height:40px; width:45px;" class="btn btn-primary"
                            type="submit">Cari</button>
                    </span>

                </form>


            </div>
        </div>
    </header>


    <div style="width: 100%;padding:10px; display:flex; justify-content:center;" class="main-body">
        <div class="row gutters-sm">

            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <p style="font-family:Inter, sans-serif;font-weight: bold;">Pembayaran Pemesanan

                        </p>
                        <hr>
                        <form method="POST" enctype="multipart/form-data"
                            action="<?php echo site_url('pembayaran/send_payment'); ?>">

                            <div class="col-sm-9 text-secondary">
                                <input class="input-user" hidden type="hidden" name="id_customer"
                                    value="<?php echo $this->session->userdata('id_customer'); ?>" type="text">
                            </div>

                            <input type="text" name="payment_status" value="Sudah Bayar" hidden id="">

                            <div style="font-family:Inter,sans-serif; margin-top: 15px;" class="row">
                                <div class="col-sm-3">
                                    <h6 style="font-family:Inter, sans-serif;margin: 0;" class="mb-0">Order ID</h6>
                                </div>

                                <div class="col-sm-9 text-secondary">
                                    <input style="border: none;" class="input-user" name="id_pemesanan"
                                        value="<?php echo $id_pemesanan; ?>" type="text" readonly>
                                </div>
                            </div>
                            <hr>
                            <div style="font-family:Inter, sans-serif;margin-top: 15px;" class="row">
                                <div class="col-sm-3">
                                    <h6 style="font-family:Inter, sans-serif;margin: 0;" class="mb-0">Nama</h6>
                                </div>

                                <div class="col-sm-9 text-secondary">
                                    <input style="border: none;" class="input-user" name="nm_customer"
                                        value="<?php echo $this->session->userdata('nama_lengkap'); ?>" type="text"
                                        readonly>
                                </div>
                            </div>


                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 style="font-family:Inter, sans-serif;margin: 0;" class="mb-0">Banyak</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input style="border: none;" name="quantity"
                                        value="<?php echo $quantity . " Barang"; ?>" readonly class="input-user"
                                        type="text">
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 style="font-family:Inter, sans-serif;margin: 0;" class="mb-0">Total Bayar</h6>
                                </div>

                                <div style="display: flex; font-family:'Inter', sans-serif;font-size:12px; align-items:center;"
                                    class="col-sm-9 text-secondary">
                                    <span style="color: black;font-weight:bold;">Rp</span>
                                    <input style="border: none;" name="grand_total" value="<?php echo $grand_total; ?>"
                                        readonly class="input-user" type="text">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 style="font-family:Inter, sans-serif;margin: 0;" class="mb-0">Bank</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select style="margin-top: 10px; height:30px; font-size:12px;" name="bank"
                                        id="card_type" required>
                                        <option value="">--Pilih Bank--</option>
                                        <option style="font-weight:bold ;" value="Bank Mandiri">Bank Mandiri</option>
                                        <option style="font-weight:bold ;" value="Bank BCA">Bank BCA</option>
                                        <option style="font-weight:bold ;" value="Bank BRI">Bank BRI</option>
                                        <option style="font-weight:bold ;" value="Bank BNI">Bank BNI</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <input type="text" name="status_order" hidden value="0" id="">

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 style="font-family:Inter, sans-serif;margin: 0;" class="mb-0">Upload Bukti
                                    </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input class="forminput1" type="file" placeholder="Upload Bukti (Opsional)"
                                        name="filefoto">

                                </div>
                            </div>

                            <br>

                            <div>
                                <button data-modal-toggle="popup-modal" type="button"
                                    class="btn btn-primary">Bayar</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>


                            <!-- POP UP -->
                            <div id="popup-modal" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                            data-modal-toggle="popup-modal">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apa
                                                kamu ingin
                                                melakukan pembayaran ?</h3>
                                            <button data-modal-toggle="popup-modal" type="submit"
                                                class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Bayar Sekarang
                                            </button>
                                            <button data-modal-toggle="popup-modal" type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- END POP UP -->
                        </form>
                    </div>

                </div>
            </div>


        </div>


    </div>

    <!-- jQery -->
    <script src="<?php echo base_url() ?>assets/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="<?php echo base_url() ?>assets/js/custom.js"></script>
</body>

<style>
form input {
    height: 30px;
    font-size: 12px;
    border-radius: 10px;
}

.input-user {
    margin: 0;
    font-size: 12px;
    color: black;
    font-weight: bold;
}

.col-sm-3 h6 {
    font-size: 12px;
}

.row {
    align-items: center;
}
</style>


<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<style>
@import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');


body {
    font-family: "Inter", sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}



.card {
    width: 35rem;
    margin: auto;
    background: white;
    position: center;
    align-self: center;

    border-radius: 10px;
    box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 0px 8px;

    flex-direction: row;

}




.product {
    object-fit: cover;
    width: 20em;
    height: 20em;
    border-radius: 100%;
}

.rightside {
    background-color: #ffffff;
    width: 35rem;
    border-bottom-right-radius: 1.5rem;
    border-top-right-radius: 1.5rem;
    padding: 30px;
}

p {
    display: block;
    font-size: 1.1rem;
    font-weight: 400;
    margin: .8rem 0;
}

.inputbox {
    color: #030303;
    width: 100%;
    padding: 0.5rem;
    border: none;
    border-bottom: 1.5px solid #ccc;
    margin-bottom: 1rem;
    border-radius: 0.3rem;
    font-family: 'Roboto', sans-serif;
    color: #615a5a;
    font-size: 1.1rem;
    font-weight: 500;
    outline: none;
}

.expcvv {
    display: flex;
    justify-content: space-between;
    padding-top: 0.6rem;
}

.expcvv_text {
    padding-right: 1rem;
}

.expcvv_text2 {
    padding: 0 1rem;
}

.button {
    background-color: crimson;
    padding: 15px;
    border: none;
    border-radius: 50px;
    color: white;
    font-weight: 400;
    font-size: 17px;
    margin-top: 10px;
    width: 100%;
    letter-spacing: .11rem;
    outline: none;
}

.button:hover {
    transform: scale(1.05) translateY(-3px);
    box-shadow: 3px 3px 6px #38373785;
}

@media only screen and (max-width: 1000px) {
    .card {
        flex-direction: column;
        width: auto;

    }

    .leftside {
        width: 100%;
        border-top-right-radius: 0;
        border-bottom-left-radius: 0;
        border-top-right-radius: 0;
        border-radius: 0;
    }

    .rightside {
        width: auto;
        border-bottom-left-radius: 1.5rem;
        padding: 0.5rem 3rem 3rem 2rem;
        border-radius: 0;
    }
}
</style>



</html>