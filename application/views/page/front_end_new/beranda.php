<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Cipta Interior | Jual berbagai macam kebutuhan interior</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/build/css/beranda.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/build/css/products_show.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/build/css/testi.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/build/css/home.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="<?php echo base_url() ?>assets/css/responsive.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div style="width: 100%;" class="container-content">
        <div class="hero_area">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    <?php
                    $first = true;
                    foreach ($banner->result() as $row) {
                    ?>
                        <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
                            <img class="d-block w-100" src="<?php echo base_url() . '/banner/' . $row->foto; ?>" alt="Slide">
                        </div>
                    <?php
                        $first = false;
                    }
                    ?>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div style="width: 100%; padding:0px 10px 0px 10px;margin-top:40px; margin-bottom:40px;" class="container-content">

                <!-- product section -->
                <section style="padding-top: 25px;padding-bottom:25px;margin-top: 40px;margin-bottom:40px; padding:0px 10px 0px 10px;" id="products" class="product_section layout_padding">
                    <div class="heading_container heading_center">
                        <h1 style="font-size: 35px;font-family:'Inter', sans-serif;font-weight:bold;">
                            Produk Kami
                        </h1>
                        <p>Produk unggulan kami seperti sofa, vertical blind, dan Gordyn.</p>
                    </div>
                    <div style="display:flex; justify-content:center;" class="flex-container">
                        <div style="width:max-content;column-gap:5px;display:flex; justify-content:center;flex-wrap:wrap;font-family:'Inter', sans-serif;" class="containera">
                            <?php
                            foreach ($products as $product) : ?>

                                <a href="<?php echo base_url('products/view/' . $product->id_produk); ?>">

                                    <div class="product-card">
                                        <?php
                                        if (empty($product->diskon)) {
                                            echo "";
                                        } else {
                                            echo '<div class="badge-discount">' . "-" . $product->diskon . "%" . '</div>';
                                        }
                                        ?>
                                        <div class="product-tumb">
                                            <img src="<?php echo base_url() . '/uploads/' . $product->foto; ?>" alt="">
                                        </div>

                                        <div class="product-details">


                                            <h4><a href="<?php echo base_url('products/view/' . $product->id_produk); ?>"><?php echo $product->nama_produk; ?></a>
                                            </h4>

                                            <div class="product-bottom-details">
                                                <div class="product-price">
                                                    <?php echo "Rp" . number_format($product->total_harga) ?>
                                                    &nbsp;
                                                    <small style="position: relative;">
                                                        <?php if ($product->diskon == 0) {
                                                            echo "";
                                                        } else {
                                                            echo "Rp " . number_format($product->harga);
                                                        }
                                                        ?>

                                                    </small>
                                                </div>

                                                <!--RATING  -->
                                                <div class="rating-solds">
                                                    <p>

                                                        <i style="color: #E4A11B;" class="fa fa-star"></i>

                                                        <?php if (empty($product->avgRating)) {
                                                            echo "0";
                                                        } else {
                                                            echo number_format($product->avgRating, 1);
                                                        } ?>
                                                        <span>(<?php echo $product->totalRating ?>)</span>
                                                    </p>
                                                    <p>|</p>

                                                    <p><?php if (empty($product->totalSold)) {
                                                            echo "0";
                                                        } else {
                                                            echo $product->totalSold;
                                                        } ?> Terjual
                                                    </p>

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </a>

                            <?php endforeach; ?>

                        </div>
                    </div>

                    <div class="btn-box">
                        <a href="<?php echo base_url() ?>all-product">
                            Lihat semua produk
                        </a>
                    </div>
                </section>
                <!-- end product section -->
            </div>

            <!-- testimonial section -->
            <section style="padding: 22px; background-image:linear-gradient(to left, #00c6fb, #005bea);" id="testimonial" class="product_section layout_padding">
                <div class="heading_container heading_center">
                    <h1 style="font-size: 35px;font-family:'Inter', sans-serif;color:white;font-weight:bold;">
                        Testimonial Pelanggan
                    </h1>
                    <p style="color: white;">Pendapat mereka tentang produk dan layanan kami</p>

                </div>
                <div class="content-testimonial">
                    <?php foreach ($testimonial_customer->result() as $testi) : ?>
                        <div style="background:white" class="content-card">

                            <div class="content-name-person">

                                <h4><?php echo $testi->nm_customer; ?></h4>

                                <p><?php echo $testi->pesan_testimonial; ?></p>

                                <div class="rating-class">
                                    <div style="display: flex;gap:4px;" class="img-rating">
                                        <img src="<?php echo base_url() ?>assets/dist/icons/ratingicons.png" width="15" height="15" alt="">
                                        <p><?php echo $testi->rating ?></p>
                                    </div>
                                    <p style="color:gray;"><?php
                                                            $date = new DateTime($testi->tgl_testimonial);
                                                            $testiDate = $date->format('d F Y H:i A');
                                                            echo $testiDate; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="btn-box">
                    <a href="<?= site_url('testimonial/alltestimonial') ?>">
                        Semua testimonial
                    </a>
                </div>
            </section>

            <!-- SECTION BLOG -->

            <section id="blog" class="product_section layout_padding">
                <div style="width: 100%; height:max-content;padding:50px;background-color:white;" class="body-content-blog">
                    <div style="display: flex;flex-wrap:wrap;justify-content:center;" class="content-blog">
                        <div style="display: block; color:black; text-align:center;" class="title-content">
                            <h1 style="font-weight: bold;font-family: Inter, sans-serif;color:black;">Blog Kami</h1>
                            <p style="color: black;margin-bottom:15px;">Ikuti blog Cipta Interior untuk mendapatkan
                                berita
                                dan tips-tips
                                bermanfaat</p>
                        </div>
                    </div>

                    <div class="container-box-card">

                        <?php foreach ($blog->result() as $blg) : ?>
                            <div style="height:max-content;box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 8px; " class="card-blog">
                                <a style="text-decoration:none;color:black;" href="<?php echo base_url('blog/content-view/' . $blg->id); ?>">
                                    <div style="display: block;padding:15px;" class="text-article">
                                        <h3 style="font-size: 18px; font-weight:bold;">
                                            <?php echo $blg->nama_artikel; ?> </h3>

                                        <div style="display: flex; gap:6px;" class="date-content">
                                            <p style="font-size: 13px;color:black;margin-bottom:6px;">By Cipta Interior</p>
                                            <p style="font-size: 13px;color:gray;margin-bottom:5px;">
                                                <?php $date = new DateTime($blg->article_date);
                                                $article_date = $date->format('d F Y H:i A');
                                                echo $article_date; ?></p>
                                        </div>

                                    </div>
                                    <img style="width: 100%; height:250px;" src="<?php echo base_url() . '/blog_media/' . $blg->foto; ?>" alt="">
                                </a>
                            </div>



                        <?php endforeach; ?>
                    </div>
                    <div style="display: flex; justify-content:center;margin-top:30px;" class="btn-box">
                        <a href="<?= site_url('testimonial/alltestimonial') ?>">
                            Semua artikel
                        </a>
                    </div>
                </div>
            </section>

        </div>



    </div>

    <!-- end client section -->
    <!-- footer start -->
    <footer>
        <div id="kontak" class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="full">
                        <div class="logo_footer">
                            <a href="#"><img width="100" src="<?php echo base_url() ?>assets/dist/img/logo.png" alt="#" /></a>
                        </div>
                        <div class="information_f">
                            <p><strong>ADDRESS:</strong> Jl. Meruya Selatan No.7C, RT.1/RW.7, Meruya Sel., Kec.
                                Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11620, Indonesia.</p>
                            <p><strong>TELEPHONE:</strong> (021) 58904875</p>
                            <p><strong>EMAIL:</strong> ciptainterior@cipta.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="widget_menu">
                                        <h3>Menu</h3>
                                        <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">About</a></li>
                                            <li><a href="#">Services</a></li>
                                            <li><a href="#">Testimonial</a></li>
                                            <li><a href="#">Blog</a></li>
                                            <li><a href="#">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="widget_menu">
                                <h3>Newsletter</h3>
                                <div class="information_f">
                                    <p>Subscribe by our newsletter and get update protidin.</p>
                                </div>
                                <div class="form_sub">
                                    <form>
                                        <fieldset>
                                            <div class="field">
                                                <input type="email" placeholder="Enter Your Mail" name="email" />
                                                <input type="submit" value="Subscribe" />
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->
    <div class="cpy_">
        <p>© 2022 Cipta Interior &nbsp; <span>Beta Version 1.0</span></p>
    </div>

</body>


<script>
    <?php if ($this->session->flashdata('sukses_login')) : ?>
        Swal.fire({
            text: '<?= $this->session->flashdata('sukses_login') ?>',
            icon: 'success',
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 2000
        });
    <?php endif; ?>
</script>

</html>