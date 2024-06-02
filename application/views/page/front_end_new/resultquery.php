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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div style="padding:10px; width:100%;" class="container-content">
        <div style="justify-content: center;" class="row">

            <?php

            if ($data) {
            } else {
                echo "Tidak ada hasil untuk produk &nbsp;   <span style=\"font-weight:bold;\"> $q</span> &nbsp;";
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
                                <h4><a href="<?php echo base_url('products/view/' . $product['id_produk']); ?>"><?php echo $product['nama_produk'] ?></a>
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