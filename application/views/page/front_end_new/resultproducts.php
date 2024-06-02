<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pencarian</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css" />
    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/css/responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/build/css/products_show.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/build/css/home.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/build/css/testi.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
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
                                <a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url() ?>#products">Produk</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url() ?>#testimonial">Testimonial</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url() ?>#kontak">Kontak Kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url() ?>#blog">Blog</a>
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
                            <div style="display: flex;justify-content:space-between;" class="btn-btn-register-login">
                                <a href="<?php echo base_url() ?>login">
                                    <button class="btn-login"> <span style="font-weight:700;font-size:13px;">Sign
                                            Up / Login</span>
                                    </button>
                                </a>
                            </div>
                        </ul>
                    </div>
                </nav>
            </div>
            <div style="display: flex; justify-content:center; width:100%;height:max-content;" class="form-search-box">
                <form style="display: flex; gap:5px;width:100%;align-items:center;" action="<?= base_url('search') ?>"
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


    <div style="padding:10px 90px 0px 90px; width:100%;" class="container-content">
        <div style="justify-content: center;" class="row">

            <?php

            if ($data) {
            } else {
                echo "Tidak ada hasil untuk produk &nbsp;   <span style=\"font-weight:bold;\"> $q</span> &nbsp; Coba lagi";
            }

            ?>
            <div style="display: flex;justify-content:center; flex-wrap:wrap; gap:5px;" class="containera">
                <?php
                foreach ($data as $product) : ?>

                <a href="<?php echo base_url('products/view/' . $product['id_produk']); ?>">

                    <div class="product-card">
                        <?php
                            if (empty($product['diskon'])) {
                                echo "";
                            } else {
                                echo '<div class="badge-discount">' . "-" . $product['diskon'] . "%" . '</div>';
                            }
                            ?>
                        <div class="product-tumb">
                            <img src="<?php echo base_url() . '/uploads/' . $product['foto']; ?>" alt="">
                        </div>

                        <div class="product-details">


                            <h4><a
                                    href="<?php echo base_url('products/view/' . $product['id_produk']); ?>"><?php echo $product['nama_produk'] ?></a>
                            </h4>

                            <div class="product-bottom-details">
                                <div class="product-price">
                                    <?php echo "Rp" . number_format($product['total_harga']); ?>
                                    &nbsp;
                                    <small style="position: relative;">
                                        <?php if ($product['diskon'] == 0) {
                                                echo "";
                                            } else {
                                                echo "Rp " . number_format($product['harga']);
                                            }
                                            ?>

                                    </small>
                                </div>

                                <!--RATING  -->
                                <div class="rating-solds">
                                    <p>

                                        <i style="color: #E4A11B;" class="fa fa-star"></i>

                                        <?php if (empty($product['avg_ratings'])) {
                                                echo "0";
                                            } else {
                                                echo number_format($product['avg_ratings, 1']);
                                            } ?>
                                    </p>
                                    <p>|</p>

                                    <p><?php if (empty($product['total_sold'])) {
                                                echo "0";
                                            } else {
                                                echo $product['total_sold'];
                                            } ?> Terjual</p>

                                </div>


                            </div>
                        </div>
                    </div>
                </a>

                <?php endforeach; ?>

            </div>


        </div>
    </div>
</body>

</html>