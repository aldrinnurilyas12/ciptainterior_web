<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Cipta Interior | Jual berbagai macam kebutuhan interior</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css" />
    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/css/responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/build/css/products_show.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/build/css/home.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/build/css/testi.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div style="margin-bottom: 30px;" class="hero_area">
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
                                <div style="display: flex;justify-content:space-between;"
                                    class="btn-btn-register-login">
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


                <div style="display: flex; justify-content:center; width:100%;height:max-content;padding-top:8px;"
                    class="form-search-box">
                    <form style="display: flex; gap:5px;width:100%;align-items:center;"
                        action="<?= base_url('search') ?>" method="get">
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

        <div class="hero_area">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    <?php
                    $first = true;
                    foreach ($banner->result() as $row) {
                    ?>
                    <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
                        <img class="d-block w-100" src="<?php echo base_url() . '/banner/' . $row->foto; ?>"
                            alt="Slide">
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

        </div>


        <div style="width: 100%; padding:0px 10px 0px 10px;margin-top:40px; margin-bottom:40px;"
            class="container-content">
            <!-- why section -->
            <section style="padding-top: 25px;" class="why_section layout_padding">
                <div class="container">
                    <div class="heading_container heading_center">
                        <h1 style="font-size: 35px;font-family:'Inter', sans-serif;font-weight:bold;">
                            Kenapa harus kami?
                        </h1>
                    </div>
                    <div style="font-family:'Inter', sans-serif;" class="row">
                        <div class="col-md-4">
                            <div style="background-color: white;color:black; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;"
                                class="box ">
                                <div class="img-box">
                                    <svg style="fill: black;" version="1.1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                        xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M476.158,231.363l-13.259-53.035c3.625-0.77,6.345-3.986,6.345-7.839v-8.551c0-18.566-15.105-33.67-33.67-33.67h-60.392
                                    V110.63c0-9.136-7.432-16.568-16.568-16.568H50.772c-9.136,0-16.568,7.432-16.568,16.568V256c0,4.427,3.589,8.017,8.017,8.017
                                    c4.427,0,8.017-3.589,8.017-8.017V110.63c0-0.295,0.239-0.534,0.534-0.534h307.841c0.295,0,0.534,0.239,0.534,0.534v145.372
                                    c0,4.427,3.589,8.017,8.017,8.017c4.427,0,8.017-3.589,8.017-8.017v-9.088h94.569c0.008,0,0.014,0.002,0.021,0.002
                                    c0.008,0,0.015-0.001,0.022-0.001c11.637,0.008,21.518,7.646,24.912,18.171h-24.928c-4.427,0-8.017,3.589-8.017,8.017v17.102
                                    c0,13.851,11.268,25.119,25.119,25.119h9.086v35.273h-20.962c-6.886-19.883-25.787-34.205-47.982-34.205
                                    s-41.097,14.322-47.982,34.205h-3.86v-60.393c0-4.427-3.589-8.017-8.017-8.017c-4.427,0-8.017,3.589-8.017,8.017v60.391H192.817
                                    c-6.886-19.883-25.787-34.205-47.982-34.205s-41.097,14.322-47.982,34.205H50.772c-0.295,0-0.534-0.239-0.534-0.534v-17.637
                                    h34.739c4.427,0,8.017-3.589,8.017-8.017s-3.589-8.017-8.017-8.017H8.017c-4.427,0-8.017,3.589-8.017,8.017
                                    s3.589,8.017,8.017,8.017h26.188v17.637c0,9.136,7.432,16.568,16.568,16.568h43.304c-0.002,0.178-0.014,0.355-0.014,0.534
                                    c0,27.996,22.777,50.772,50.772,50.772s50.772-22.776,50.772-50.772c0-0.18-0.012-0.356-0.014-0.534h180.67
                                    c-0.002,0.178-0.014,0.355-0.014,0.534c0,27.996,22.777,50.772,50.772,50.772c27.995,0,50.772-22.776,50.772-50.772
                                    c0-0.18-0.012-0.356-0.014-0.534h26.203c4.427,0,8.017-3.589,8.017-8.017v-85.511C512,251.989,496.423,234.448,476.158,231.363z
                                    M375.182,144.301h60.392c9.725,0,17.637,7.912,17.637,17.637v0.534h-78.029V144.301z M375.182,230.881v-52.376h71.235
                                    l13.094,52.376H375.182z M144.835,401.904c-19.155,0-34.739-15.583-34.739-34.739s15.584-34.739,34.739-34.739
                                    c19.155,0,34.739,15.583,34.739,34.739S163.99,401.904,144.835,401.904z M427.023,401.904c-19.155,0-34.739-15.583-34.739-34.739
                                    s15.584-34.739,34.739-34.739c19.155,0,34.739,15.583,34.739,34.739S446.178,401.904,427.023,401.904z M495.967,299.29h-9.086
                                    c-5.01,0-9.086-4.076-9.086-9.086v-9.086h18.171V299.29z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path
                                                    d="M144.835,350.597c-9.136,0-16.568,7.432-16.568,16.568c0,9.136,7.432,16.568,16.568,16.568
                                    c9.136,0,16.568-7.432,16.568-16.568C161.403,358.029,153.971,350.597,144.835,350.597z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path
                                                    d="M427.023,350.597c-9.136,0-16.568,7.432-16.568,16.568c0,9.136,7.432,16.568,16.568,16.568
                                    c9.136,0,16.568-7.432,16.568-16.568C443.591,358.029,436.159,350.597,427.023,350.597z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M332.96,316.393H213.244c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017H332.96
                                    c4.427,0,8.017-3.589,8.017-8.017S337.388,316.393,332.96,316.393z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M127.733,282.188H25.119c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017h102.614
                                    c4.427,0,8.017-3.589,8.017-8.017S132.16,282.188,127.733,282.188z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M278.771,173.37c-3.13-3.13-8.207-3.13-11.337,0.001l-71.292,71.291l-37.087-37.087c-3.131-3.131-8.207-3.131-11.337,0
                                    c-3.131,3.131-3.131,8.206,0,11.337l42.756,42.756c1.565,1.566,3.617,2.348,5.668,2.348s4.104-0.782,5.668-2.348l76.96-76.96
                                    C281.901,181.576,281.901,176.501,278.771,173.37z" />
                                            </g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        Pengantaran Terjamin
                                    </h5>
                                    <p>
                                        Pengiriman barang cepat, terjamin dan biaya ongkir yang terjangkau
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background-color: white;color:black; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;"
                                class="box ">
                                <div class="img-box">
                                    <svg style="fill: black;" version="1.1" id="Capa_1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        x="0px" y="0px" viewBox="0 0 490.667 490.667"
                                        style="enable-background:new 0 0 490.667 490.667;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M138.667,192H96c-5.888,0-10.667,4.779-10.667,10.667V288c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.667-10.667
                                    v-74.667h32c5.888,0,10.667-4.779,10.667-10.667S144.555,192,138.667,192z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M117.333,234.667H96c-5.888,0-10.667,4.779-10.667,10.667S90.112,256,96,256h21.333c5.888,0,10.667-4.779,10.667-10.667
                                    S123.221,234.667,117.333,234.667z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M245.333,0C110.059,0,0,110.059,0,245.333s110.059,245.333,245.333,245.333s245.333-110.059,245.333-245.333
                                    S380.608,0,245.333,0z M245.333,469.333c-123.52,0-224-100.48-224-224s100.48-224,224-224s224,100.48,224,224
                                    S368.853,469.333,245.333,469.333z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M386.752,131.989C352.085,88.789,300.544,64,245.333,64s-106.752,24.789-141.419,67.989
                                    c-3.691,4.587-2.965,11.307,1.643,14.997c4.587,3.691,11.307,2.965,14.976-1.643c30.613-38.144,76.096-60.011,124.8-60.011
                                    s94.187,21.867,124.779,60.011c2.112,2.624,5.205,3.989,8.32,3.989c2.368,0,4.715-0.768,6.677-2.347
                                    C389.717,143.296,390.443,136.576,386.752,131.989z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path
                                                    d="M376.405,354.923c-4.224-4.032-11.008-3.861-15.061,0.405c-30.613,32.235-71.808,50.005-116.011,50.005
                                    s-85.397-17.771-115.989-50.005c-4.032-4.309-10.816-4.437-15.061-0.405c-4.309,4.053-4.459,10.816-0.405,15.083
                                    c34.667,36.544,81.344,56.661,131.456,56.661s96.789-20.117,131.477-56.661C380.864,365.739,380.693,358.976,376.405,354.923z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M206.805,255.723c15.701-2.027,27.861-15.488,27.861-31.723c0-17.643-14.357-32-32-32h-21.333
                                    c-5.888,0-10.667,4.779-10.667,10.667v42.581c0,0.043,0,0.107,0,0.149V288c0,5.888,4.779,10.667,10.667,10.667
                                    S192,293.888,192,288v-16.917l24.448,24.469c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.136
                                    c4.16-4.16,4.16-10.923,0-15.083L206.805,255.723z M192,234.667v-21.333h10.667c5.867,0,10.667,4.779,10.667,10.667
                                    s-4.8,10.667-10.667,10.667H192z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M309.333,277.333h-32v-64h32c5.888,0,10.667-4.779,10.667-10.667S315.221,192,309.333,192h-42.667
                                    c-5.888,0-10.667,4.779-10.667,10.667V288c0,5.888,4.779,10.667,10.667,10.667h42.667c5.888,0,10.667-4.779,10.667-10.667
                                    S315.221,277.333,309.333,277.333z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M288,234.667h-21.333c-5.888,0-10.667,4.779-10.667,10.667S260.779,256,266.667,256H288
                                    c5.888,0,10.667-4.779,10.667-10.667S293.888,234.667,288,234.667z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M394.667,277.333h-32v-64h32c5.888,0,10.667-4.779,10.667-10.667S400.555,192,394.667,192H352
                                    c-5.888,0-10.667,4.779-10.667,10.667V288c0,5.888,4.779,10.667,10.667,10.667h42.667c5.888,0,10.667-4.779,10.667-10.667
                                    S400.555,277.333,394.667,277.333z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M373.333,234.667H352c-5.888,0-10.667,4.779-10.667,10.667S346.112,256,352,256h21.333
                                    c5.888,0,10.667-4.779,10.667-10.667S379.221,234.667,373.333,234.667z" />
                                            </g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        Bebas Konsultasi
                                    </h5>
                                    <p>
                                        Konsultasi gratis untuk kebutuhan interior anda
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background-color: white;color:black; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;"
                                class="box ">
                                <div class="img-box">
                                    <svg style="fill: black;" id="_30_Premium" height="512" viewBox="0 0 512 512"
                                        width="512" xmlns="http://www.w3.org/2000/svg" data-name="30_Premium">
                                        <g id="filled">
                                            <path
                                                d="m252.92 300h3.08a124.245 124.245 0 1 0 -4.49-.09c.075.009.15.023.226.03.394.039.789.06 1.184.06zm-96.92-124a100 100 0 1 1 100 100 100.113 100.113 0 0 1 -100-100z" />
                                            <path
                                                d="m447.445 387.635-80.4-80.4a171.682 171.682 0 0 0 60.955-131.235c0-94.841-77.159-172-172-172s-172 77.159-172 172c0 73.747 46.657 136.794 112 161.2v158.8c-.3 9.289 11.094 15.384 18.656 9.984l41.344-27.562 41.344 27.562c7.574 5.4 18.949-.7 18.656-9.984v-70.109l46.6 46.594c6.395 6.789 18.712 3.025 20.253-6.132l9.74-48.724 48.725-9.742c9.163-1.531 12.904-13.893 6.127-20.252zm-339.445-211.635c0-81.607 66.393-148 148-148s148 66.393 148 148-66.393 148-148 148-148-66.393-148-148zm154.656 278.016a12 12 0 0 0 -13.312 0l-29.344 19.562v-129.378a172.338 172.338 0 0 0 72 0v129.38zm117.381-58.353a12 12 0 0 0 -9.415 9.415l-6.913 34.58-47.709-47.709v-54.749a171.469 171.469 0 0 0 31.467-15.6l67.151 67.152z" />
                                            <path
                                                d="m287.62 236.985c8.349 4.694 19.251-3.212 17.367-12.618l-5.841-35.145 25.384-25c7.049-6.5 2.89-19.3-6.634-20.415l-35.23-5.306-15.933-31.867c-4.009-8.713-17.457-8.711-21.466 0l-15.933 31.866-35.23 5.306c-9.526 1.119-13.681 13.911-6.634 20.415l25.384 25-5.841 35.145c-1.879 9.406 9 17.31 17.367 12.618l31.62-16.414zm-53-32.359 2.928-17.615a12 12 0 0 0 -3.417-10.516l-12.721-12.531 17.658-2.66a12 12 0 0 0 8.947-6.5l7.985-15.971 7.985 15.972a12 12 0 0 0 8.947 6.5l17.658 2.66-12.723 12.535a12 12 0 0 0 -3.417 10.516l2.928 17.615-15.849-8.231a12 12 0 0 0 -11.058 0z" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        Kualitas Terbaik
                                    </h5>
                                    <p>
                                        Semua produk kami menggunakan bahan-bahan yang berkualitas
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end why section -->

            <!-- product section -->
            <section
                style="padding-top: 25px;padding-bottom:25px;margin-top: 40px;margin-bottom:40px; padding:0px 10px 0px 10px;"
                id="products" class="product_section layout_padding">
                <div class="heading_container heading_center">
                    <h1 style="font-size: 35px;font-family:'Inter', sans-serif;font-weight:bold;">
                        Produk Kami
                    </h1>
                    <p>Produk unggulan kami seperti sofa, vertical blind, dan Gordyn.</p>
                </div>
                <div style="display:flex; justify-content:center;" class="flex-container">
                    <div style="width:max-content;column-gap:5px;display:flex; justify-content:center;flex-wrap:wrap;font-family:'Inter', sans-serif;"
                        class="containera">
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


                                    <h4><a
                                            href="<?php echo base_url('products/view/' . $product->id_produk); ?>"><?php echo $product->nama_produk; ?></a>
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
        <section style="padding: 22px; background-image:linear-gradient(to left, #00c6fb, #005bea);" id="testimonial"
            class="product_section layout_padding">
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
                                <img src="<?php echo base_url() ?>assets/dist/icons/ratingicons.png" width="15"
                                    height="15" alt="">
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
                        <p style="color: black;margin-bottom:15px;">Ikuti blog Cipta Interior untuk mendapatkan berita
                            dan tips-tips
                            bermanfaat</p>
                    </div>
                </div>

                <div class="container-box-card">

                    <?php foreach ($blog->result() as $blg) : ?>
                    <div style="height:max-content;box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 8px; " class="card-blog">
                        <a style="text-decoration:none;color:black;"
                            href="<?php echo base_url('blog/content-view/' . $blg->id); ?>">
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
                            <img style="width: 100%; height:250px;"
                                src="<?php echo base_url() . '/blog_media/' . $blg->foto; ?>" alt="">
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

    <footer>
        <div id="kontak" class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="full">
                        <div class="logo_footer">
                            <a href="#"><img width="100" src="<?php echo base_url() ?>assets/dist/img/logo.png"
                                    alt="#" /></a>
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<!-- jQery -->
<script src="<?php echo base_url() ?>assets/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
<!-- custom js -->
<script src="<?php echo base_url() ?>assets/js/custom.js"></script>



</html>