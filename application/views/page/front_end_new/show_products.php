<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk kami</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="<?php echo base_url() ?>assets/css/responsive.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo base_url() ?>assets/build/css/products_show.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
</head>

<body>

    <?php
    $tot_other = $total_other->row_array();
    $tot_products = $total_produk->row_array();
    $tot_gordyn = $total_gordyn->row_array();
    $tot_promos = $total_promo->row_array();
    $tot_vinyls = $total_vinyl->row_array();
    $tot_sofa = $total_sofa->row_array();
    $tot_blinds = $total_blind->row_array();
    ?>
    <div class="container-content-first">
        <!-- product section -->
        <section style="padding-top: 80px;" id="products" class="product_section layout_padding">
            <div style="margin: 0;" class="heading_container heading_center">
                <h1 style="font-size: 25px;font-family:'Inter', sans-serif;color:black; font-weight:bold;">
                    Produk Kami
                </h1>
            </div>

            <div style="position: sticky;position: -webkit-sticky; top: 0;z-index:99999;background:white; padding:10px;"
                class="content-tab">
                <ul style="display: flex; justify-content:center;gap:10px;font-family:Inter, sans-serif;"
                    class="nav nav-tabs mb-3" id="myTab0" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button style="border-radius:5px; padding:5px;font-size:12px;border:none;" data-mdb-tab-init
                            class="nav-link-new active" id="home-all" data-mdb-target="#all-product" type="button"
                            role="tab" aria-controls="all" aria-selected="true">
                            Semua Produk (<?php echo $tot_products['total_produk'] ?>)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button style="border-radius:5px; padding:5px;font-size:12px;border:none;" data-mdb-tab-init
                            class="nav-link-new" id="home-tab0" data-mdb-target="#promo" type="button" role="tab"
                            aria-controls="home" aria-selected="false">
                            Promo (<?php echo $tot_promos['total_promo'] ?>)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button style="border-radius:5px; padding:5px;font-size:12px;border:none;" data-mdb-tab-init
                            class="nav-link-new" id="profile-tab0" data-mdb-target="#sofa" type="button" role="tab"
                            aria-controls="profile" aria-selected="false">
                            Sofa (<?php echo $tot_sofa['total_sofa'] ?>)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button style="border-radius:5px; padding:5px;font-size:12px;border:none;" data-mdb-tab-init
                            class="nav-link-new" id="contact-tab0" data-mdb-target="#gordyn" type="button" role="tab"
                            aria-controls="gordyn" aria-selected="false">
                            Gordyn (<?php if ($tot_gordyn['total_gordyn'] == null) {
                                        echo "0";
                                    } else {
                                        echo $tot_gordyn['total_gordyn'];
                                    }
                                    ?>


                            )
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button style="border-radius:5px; padding:5px;font-size:12px;border:none;" data-mdb-tab-init
                            class="nav-link-new" id="contact-tab01" data-mdb-target="#blind" type="button" role="tab"
                            aria-controls="blind" aria-selected="false">
                            Blind (<?php echo $tot_blinds['total_blind'] ?>)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button style="border-radius:5px; padding:5px;font-size:12px;border:none;" data-mdb-tab-init
                            class="nav-link-new" id="contact-tab02" data-mdb-target="#vinyl" type="button" role="tab"
                            aria-controls="contact" aria-selected="false">
                            Vinyl (<?php echo $tot_vinyls['total_vinyl'] ?>)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button style="border-radius:5px; padding:5px;font-size:12px;border:none;" data-mdb-tab-init
                            class="nav-link-new" id="contact-tab04" data-mdb-target="#lainnya" type="button" role="tab"
                            aria-controls="contact" aria-selected="false">
                            Lainnya (<?php echo $tot_other['total_other'] ?>)
                        </button>
                    </li>
                </ul>
            </div>


            <div class="tab-content" id="myTabContent0">

                <!-- ALL product -->
                <div style="height: max-content; padding:10px;" class="tab-pane fade show active" id="all-product"
                    role="tabpanel" aria-labelledby="home-all">
                    <div style="display:flex; justify-content:center;" class="flex-container">
                        <div style="width:max-content;column-gap:5px;display:flex; justify-content:center;flex-wrap:wrap;font-family:Inter, sans-serif;"
                            class="containera">
                            <?php
                            foreach ($products as $all_product) : ?>

                            <a href="<?= site_url('products/view/' . $all_product->id_produk); ?>">
                                <div class="product-card">
                                    <?php
                                        if (empty($all_product->diskon)) {
                                            echo "";
                                        } else {
                                            echo '<div class="badge-discount">' . "-" . $all_product->diskon . "%" . '</div>';
                                        }
                                        ?>
                                    <div class="product-tumb">
                                        <img src="<?php echo base_url() . '/uploads/' . $all_product->foto; ?>" alt="">
                                    </div>

                                    <div class="product-details">

                                        <h4><a
                                                href="<?= site_url('products/view/' . $all_product->id_produk); ?>"><?php echo $all_product->nama_produk; ?></a>
                                        </h4>

                                        <div class="product-bottom-details">
                                            <div class="product-price">

                                                <?php echo "Rp" . number_format($all_product->total_harga) ?>
                                                &nbsp;
                                                <small style="position: relative;">
                                                    <?php if ($all_product->diskon == 0) {
                                                            echo "";
                                                        } else {
                                                            echo "Rp " . number_format($all_product->harga);
                                                        }
                                                        ?>

                                                </small>
                                            </div>

                                            <!--RATING  -->
                                            <div class="rating-solds">
                                                <p>

                                                    <i style="color: #E4A11B;" class="fa fa-star"></i>

                                                    <?php if (empty($all_product->avgRating)) {
                                                            echo "0";
                                                        } else {
                                                            echo number_format($all_product->avgRating, 1);
                                                        } ?>
                                                    <span>(<?php echo $all_product->totalRating ?>)</span>
                                                </p>
                                                <p>|</p>

                                                <p><?php if (empty($all_product->totalSold)) {
                                                            echo "0";
                                                        } else {
                                                            echo $all_product->totalSold;
                                                        } ?> Terjual</p>

                                            </div>


                                        </div>


                                    </div>
                                </div>
                            </a>

                            <?php endforeach; ?>
                        </div>
                    </div>

                    <?php $links ?>
                </div>
                <!-- END ALL PRODUCT -->

                <!-- PROMOS -->
                <div style="height: max-content; padding:10px;" class="tab-pane fade show" id="promo" role="tabpanel"
                    aria-labelledby="home-tab0">
                    <div style="display:flex; justify-content:center;" class="flex-container">
                        <div style="width:max-content;column-gap:5px;display:flex; justify-content:center;flex-wrap:wrap;font-family:Inter, sans-serif;"
                            class="containera">
                            <?php
                            foreach ($promo as $promos) : ?>

                            <a href="<?= site_url('products/view/' . $promos->id_produk); ?>">
                                <div class="product-card">
                                    <div class="badge-discount"><?php echo "-" . $promos->diskon . "%"; ?></div>
                                    <div class="product-tumb">
                                        <img src="<?php echo base_url() . '/uploads/' . $promos->foto; ?>" alt="">
                                    </div>

                                    <div class="product-details">

                                        <h4><a
                                                href="<?= site_url('products/view/' . $promos->id_produk); ?>"><?php echo $promos->nama_produk; ?></a>
                                        </h4>

                                        <div class="product-bottom-details">
                                            <div class="product-price">
                                                <?php echo "Rp" . number_format($promos->total_harga) ?>
                                                &nbsp;
                                                <small style="position: relative;">
                                                    <?php if ($promos->diskon == 0) {
                                                            echo "";
                                                        } else {
                                                            echo "Rp " . number_format($promos->harga);
                                                        }
                                                        ?>

                                                </small>
                                            </div>

                                            <!--RATING  -->
                                            <div class="rating-solds">
                                                <p>

                                                    <i style="color: #E4A11B;" class="fa fa-star"></i>

                                                    <?php if (empty($promos->avgRating)) {
                                                            echo "0";
                                                        } else {
                                                            echo number_format($promos->avgRating, 1);
                                                        } ?>
                                                    <span>(<?php echo $promos->totalRating ?>)</span>
                                                </p>

                                                <p>|</p>

                                                <p><?php if (empty($promos->totalSold)) {
                                                            echo "0";
                                                        } else {
                                                            echo $promos->totalSold;
                                                        } ?> Terjual</p>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>

                            <?php endforeach; ?>
                        </div>
                    </div>

                    <?php $links ?>
                </div>
                <!-- END PROMOS -->

                <!-- SOFA CATEGORY -->
                <div class="tab-pane fade" id="sofa" role="tabpanel" aria-labelledby="profile-tab0">
                    <div style="display:flex; justify-content:center;" class="flex-container">
                        <div style="width:max-content;column-gap:5px;display:flex; justify-content:center;flex-wrap:wrap;font-family:Inter, sans-serif;"
                            class="containera">
                            <?php
                            foreach ($sofa as $sofas) : ?>

                            <a href="<?= site_url('products/view/' . $sofas->id_produk); ?>">
                                <div class="product-card">
                                    <?php
                                        if (empty($sofas->diskon)) {
                                            echo "";
                                        } else {
                                            echo '<div class="badge-discount">' . "-" . $sofas->diskon . "%" . '</div>';
                                        }
                                        ?>
                                    <div class="product-tumb">
                                        <img src="<?php echo base_url() . '/uploads/' . $sofas->foto; ?>" alt="">
                                    </div>

                                    <div class="product-details">


                                        <h4><a
                                                href="<?= site_url('products/view/' . $sofas->id_produk); ?>"><?php echo $sofas->nama_produk; ?></a>
                                        </h4>

                                        <div class="product-bottom-details">
                                            <div style="height: max-content;" class="product-price">
                                                <?php echo "Rp" . number_format($sofas->total_harga) ?>
                                                &nbsp;
                                                <small style="position: relative;">
                                                    <?php if ($sofas->diskon == 0) {
                                                            echo "";
                                                        } else {
                                                            echo "Rp " . number_format($sofas->harga);
                                                        }
                                                        ?>

                                                </small>

                                            </div>

                                            <!--RATING  -->
                                            <div class="rating-solds">
                                                <p>

                                                    <i style="color: #E4A11B;" class="fa fa-star"></i>

                                                    <?php if (empty($sofas->avgRating)) {
                                                            echo "0";
                                                        } else {
                                                            echo number_format($sofas->avgRating, 1);
                                                        } ?>
                                                    <span>(<?php echo $sofas->totalRating ?>)</span>
                                                </p>
                                                <p>|</p>

                                                <p><?php if (empty($sofas->totalSold)) {
                                                            echo "0";
                                                        } else {
                                                            echo $sofas->totalSold;
                                                        } ?> Terjual</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <?php $links ?>
                </div>
                <!-- END SOFA -->

                <!-- gordyn -->
                <div class="tab-pane fade" id="gordyn" role="tabpanel" aria-labelledby="contact-tab0">
                    <div style="display:flex; justify-content:center;" class="flex-container">
                        <div style="width:max-content;column-gap:5px;display:flex; justify-content:center;flex-wrap:wrap;font-family:Inter, sans-serif;"
                            class="containera">
                            <?php
                            if ($gordyn == null) {
                                echo "Kosong";
                            } else {
                                foreach ($gordyn as $gordyns) : ?>

                            <a href="<?= site_url('products/view/' . $gordyns->id_produk); ?>">
                                <div class="product-card">
                                    <?php
                                            if (empty($gordyns->diskon)) {
                                                echo "";
                                            } else {
                                                echo '<div class="badge-discount">' . "-" . $gordyns->diskon . "%" . '</div>';
                                            }
                                            ?>
                                    <div class="product-tumb">
                                        <img src="<?php echo base_url() . '/uploads/' . $gordyns->foto; ?>" alt="">
                                    </div>

                                    <div class="product-details">
                                        <h4><a
                                                href="<?= site_url('products/view/' . $gordyns->id_produk); ?>"><?php echo $gordyns->nama_produk; ?></a>
                                        </h4>

                                        <div class="product-bottom-details">
                                            <div style="height: max-content;" class="product-price">
                                                <?php echo "Rp" . number_format($gordyns->total_harga) ?>
                                                &nbsp;
                                                <small style="position: relative;">
                                                    <?php if ($gordyns->diskon == 0) {
                                                                echo "";
                                                            } else {
                                                                echo "Rp " . number_format($gordyns->harga);
                                                            }
                                                            ?>

                                                </small>
                                            </div>

                                            <div class="rating-solds">
                                                <p>

                                                    <i style="color: #E4A11B;" class="fa fa-star"></i>

                                                    <?php if (empty($gordyns->avgRating)) {
                                                                echo "0";
                                                            } else {
                                                                echo number_format($gordyns->avgRating, 1);
                                                            } ?>
                                                    <span>(<?php echo $gordyns->totalRating ?>)</span>
                                                </p>
                                                <p>|</p>

                                                <p><?php if (empty($gordyns->totalSold)) {
                                                                echo "0";
                                                            } else {
                                                                echo $gordyns->totalSold;
                                                            } ?> Terjual</p>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>


                            <?php endforeach;
                            }
                            ?>

                        </div>
                    </div>

                    <?php $links ?>
                </div>
                <!-- END gordyn -->

                <!-- Blind -->

                <div class="tab-pane fade" id="blind" role="tabpanel2" aria-labelledby="contact-tab01">
                    <div style="display:flex; justify-content:center;" class="flex-container">
                        <div style="width:max-content;column-gap:5px;display:flex; justify-content:center;flex-wrap:wrap;font-family:Inter, sans-serif;"
                            class="containera">
                            <?php
                            foreach ($blind as $blinds) : ?>

                            <a href="<?= site_url('products/view/' . $blinds->id_produk); ?>">
                                <div class="product-card">
                                    <?php
                                        if (empty($blinds->diskon)) {
                                            echo "";
                                        } else {
                                            echo '<div class="badge-discount">' . "-" . $blinds->diskon . "%" . '</div>';
                                        }
                                        ?>
                                    <div class="product-tumb">
                                        <img src="<?php echo base_url() . '/uploads/' . $blinds->foto; ?>" alt="">
                                    </div>

                                    <div class="product-details">
                                        <h4><a
                                                href="<?= site_url('products/view/' . $blinds->id_produk); ?>"><?php echo $blinds->nama_produk; ?></a>
                                        </h4>

                                        <div class="product-bottom-details">
                                            <div style="height: max-content;" class="product-price">
                                                <?php echo "Rp" . number_format($blinds->total_harga) ?>
                                                &nbsp;
                                                <small style="position: relative;">
                                                    <?php if ($blinds->diskon == 0) {
                                                            echo "";
                                                        } else {
                                                            echo "Rp " . number_format($blinds->harga);
                                                        }
                                                        ?>

                                                </small>
                                            </div>

                                            <div class="rating-solds">
                                                <p>

                                                    <i style="color: #E4A11B;" class="fa fa-star"></i>

                                                    <?php if (empty($blinds->avgRating)) {
                                                            echo "0";
                                                        } else {
                                                            echo number_format($blinds->avgRating, 1);
                                                        } ?>

                                                    <span>(<?php echo $blinds->totalRating ?>)</span>
                                                </p>
                                                <p>|</p>

                                                <p><?php if (empty($blinds->totalSold)) {
                                                            echo "0";
                                                        } else {
                                                            echo $blinds->totalSold;
                                                        } ?> Terjual</p>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>


                            <?php endforeach; ?>

                        </div>
                    </div>

                    <?php $links ?>
                </div>
                <!-- END blinds -->

                <!-- Vinyl -->
                <div class="tab-pane fade" id="vinyl" role="tabpanel2" aria-labelledby="contact-tab01">
                    <div style="display:flex; justify-content:center;" class="flex-container">
                        <div style="width:max-content;column-gap:5px;display:flex; justify-content:center;flex-wrap:wrap;font-family:Inter, sans-serif;"
                            class="containera">
                            <?php
                            foreach ($vinyls  as $vinyl) : ?>

                            <a href="<?= site_url('products/view/' . $vinyl->id_produk); ?>">
                                <div class="product-card">
                                    <?php
                                        if (empty($vinyl->diskon)) {
                                            echo "";
                                        } else {
                                            echo '<div class="badge-discount">' . "-" . $vinyl->diskon . "%" . '</div>';
                                        }
                                        ?>
                                    <div class="product-tumb">
                                        <img src="<?php echo base_url() . '/uploads/' . $vinyl->foto; ?>" alt="">
                                    </div>

                                    <div class="product-details">
                                        <h4><a
                                                href="<?= site_url('products/view/' . $vinyl->id_produk); ?>"><?php echo $vinyl->nama_produk; ?></a>
                                        </h4>

                                        <div class="product-bottom-details">
                                            <div style="height: max-content;" class="product-price">
                                                <?php echo "Rp" . number_format($vinyl->total_harga) ?>
                                                &nbsp;
                                                <small style="position: relative;">
                                                    <?php if ($vinyl->diskon == 0) {
                                                            echo "";
                                                        } else {
                                                            echo "Rp " . number_format($vinyl->harga);
                                                        }
                                                        ?>

                                                </small>
                                            </div>

                                            <div class="rating-solds">
                                                <p>

                                                    <i style="color: #E4A11B;" class="fa fa-star"></i>

                                                    <?php if (empty($vinyl->avgRating)) {
                                                            echo "0";
                                                        } else {
                                                            echo number_format($vinyl->avgRating, 1);
                                                        } ?>
                                                    <span>(<?php echo $vinyl->totalRating ?>)</span>
                                                </p>
                                                <p>|</p>

                                                <p><?php if (empty($vinyl->totalSold)) {
                                                            echo "0";
                                                        } else {
                                                            echo $vinyl->totalSold;
                                                        } ?> Terjual</p>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>


                            <?php endforeach; ?>

                        </div>
                    </div>

                    <?php $links ?>
                </div>
                <!-- END vinyls -->

                <!-- others -->
                <div class="tab-pane fade" id="lainnya" role="tabpanel2" aria-labelledby="contact-tab01">
                    <div style="display:flex; justify-content:center;" class="flex-container">
                        <div style="width:max-content;column-gap:5px;display:flex; justify-content:center;flex-wrap:wrap;font-family:Inter, sans-serif;"
                            class="containera">
                            <?php
                            foreach ($others as $other) : ?>

                            <a href="<?= site_url('products/view/' . $other->id_produk); ?>">
                                <div class="product-card">
                                    <?php
                                        if (empty($other->diskon)) {
                                            echo "";
                                        } else {
                                            echo '<div class="badge-discount">' . "-" . $other->diskon . "%" . '</div>';
                                        }
                                        ?>
                                    <div class="product-tumb">
                                        <img src="<?php echo base_url() . '/uploads/' . $other->foto; ?>" alt="">
                                    </div>

                                    <div class="product-details">


                                        <h4><a
                                                href="<?= site_url('products/view/' . $other->id_produk); ?>"><?php echo $other->nama_produk; ?></a>
                                        </h4>

                                        <div class="product-bottom-details">
                                            <div style="height: max-content;" class="product-price">
                                                <?php echo "Rp" . number_format($other->total_harga) ?>
                                                &nbsp;
                                                <small style="position: relative;">
                                                    <?php if ($other->diskon == 0) {
                                                            echo "";
                                                        } else {
                                                            echo "Rp " . number_format($other->harga);
                                                        }
                                                        ?>

                                                </small>

                                            </div>

                                            <div class="rating-solds">
                                                <p>

                                                    <i style="color: #E4A11B;" class="fa fa-star"></i>

                                                    <?php if (empty($other->avgRating)) {
                                                            echo "0";
                                                        } else {
                                                            echo number_format($other->avgRating, 1);
                                                        } ?>
                                                    <span>(<?php echo $other->totalRating ?>)</span>
                                                </p>
                                                <p>|</p>

                                                <p><?php if (empty($other->totalSold)) {
                                                            echo "0";
                                                        } else {
                                                            echo $other->totalSold;
                                                        } ?> Terjual</p>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <?php $links ?>
                </div>

            </div>

        </section>
    </div>
    <!-- end product section -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

<script>
import {
    Tab,
    initMDB
} from "mdb-ui-kit";

initMDB({
    Tab
});
</script>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>


<!-- jQery -->
<script src="<?php echo base_url() ?>assets/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
<!-- custom js -->
<script src="<?php echo base_url() ?>assets/js/custom.js"></script>


</html>