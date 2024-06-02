    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Site Metas -->
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="shortcut icon" href="images/favicon.png" type="">
        <title>Cipta Interior | Jual berbagai macam kebutuhan interior</title>
        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
        <!-- font awesome style -->
        <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />


        <!-- responsive style -->
        <link href="<?php echo base_url() ?>assets/css/responsive.css" rel="stylesheet" />

    </head>

    <?php

    $total = $notif_total->row_array();

    ?>


    <header style="position: sticky; padding:10px; z-index:999; background:white;top:0;" class="header_section">
        <div style="display: block;" class="container">

            <div class="navbar-main-content">
                <div style="font-size: 13px;font-family:Inter;padding-left:0; padding-right:0;" class="navbar navbar-expand-lg custom_nav-container ">


                    <div style="display: flex;align-items:center;" class="img-searchbox">
                        <img width="100" height="70" src="<?php echo base_url() ?>assets/dist/img/logo.png" alt="ini logo" />

                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul style="font-size:13px;" class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo base_url() ?>beranda">Home <span class="sr-only">(current)</span></a>
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
                                <a style="color: black;" href="<?php echo base_url() ?>shopping-cart">
                                    <i class="fa fa-shopping-bag" aria-hidden="true"><span style="width: 20px;height:20px;background:#DC143C;color:white;
                                margin-top:-12px;position:absolute;border-radius:50px;font-size:11px;align-content:center;text-align:center;
                                font-weight:bold;font-family:Inter,sans-serif;"> <?= $this->cart->total_items(); ?>
                                        </span></i></a>
                            </li>


                            &nbsp;&nbsp;&nbsp;
                            <!-- Notifications Dropdown Menu -->
                            <li style="width:30px;height:30px;background:whitesmoke;font-size:20px;padding:5px; border-radius:50px; 
                                align-items:center;display:flex;justify-content:center;margin-left:10px;" class="nav-item dropdown">
                                <a class="nav-link" href="<?php echo base_url() ?>notifikasi">
                                    <i style="font-size: 15px;" class="far fa-bell"></i>
                                    <span style="width:max-content;height:max-content;background:#DC143C;color:white;
                                margin-top:-12px;position:absolute;border-radius:50px;font-size:11px;align-content:center;text-align:center;
                                font-weight:bold;font-family:Inter,sans-serif;padding:4px;">
                                        <?php echo $total['total_notif']; ?>
                                    </span>
                                </a>
                                <div style="height:300px;overflow-y:auto;" class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                                </div>
                            </li>


                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                            <li class="nav-item dropdown">
                                <a style="background:#191919;color:white; padding:5px; border-radius:50px;" class="nav-link dropdown-toggle" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                    <span class="nav-label">

                                        <?php
                                        if ($this->session->userdata('is_login')) {
                                            foreach ($image->result_array() as $foto) {
                                                echo '<img src="' . base_url() . '/profile_picture/' . $foto['image'] .
                                                    '" class="rounded-circle" height="30" width="30">';
                                            } ?>
                                            &nbsp;
                                        <?php echo $this->session->userdata('username');
                                        } else {
                                            echo "";
                                        } ?>

                                        <span class="caret"></span></a>
                                <?php foreach ($customers->result_array() as $user) {
                                    $username = $user['username'];
                                ?>
                                    <ul style="height: 200px;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;border:none;" class="dropdown-menu">
                                        <li> <a href="<?php echo base_url('user-profile') ?>">Profil</a>
                                        </li>
                                        <li> <a href="<?php echo base_url('order-history'); ?>">Transaksi</a>
                                        </li>
                                        <li> <a href="<?php echo base_url('saved-items'); ?>">Item tersimpan</a>
                                        </li>
                                        <li> <a href="<?php echo base_url('testimonial'); ?>">Beri Testimonial</a>
                                        </li>
                                        <li><a href="<?php echo base_url('sign-out'); ?>">Keluar</a></li>
                                    </ul>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div style="display: flex; justify-content:center; width:100%;height:max-content;padding-top:8px;" class="form-search-box">
                <form style="display: flex; gap:5px;width:100%;align-items:center;" action="<?= base_url('find') ?>" method="get">
                    <input name="q" style="width:100%; height:40px; border-radius:5px;border:1px solid gray;font-weight:bold;margin:0;text-align:left;" type="text" placeholder="Cari produk disini...">
                    <span class="input-group-btn">
                        <button style="padding: 2.8px;height:40px; width:45px;" class="btn btn-primary" type="submit">Cari</button>
                    </span>

                </form>


            </div>




        </div>
    </header>

    <style>
        .dropdown-menu-show {
            width: 450px;

        }

        @media only screen and (max-width:460px) {

            .dropdown-menu-show {
                width: max-content;

            }
        }
    </style>

    <!-- jQery -->
    <script src="<?php echo base_url() ?>assets/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="<?php echo base_url() ?>assets/js/custom.js"></script>