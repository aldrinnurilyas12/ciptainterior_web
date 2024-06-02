<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cipta Interior | Jual berbagai macam kebutuhan interior</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/build/css/testi.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="<?php echo base_url() ?>assets/build/css/beranda.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/css/responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/build/css/order_products.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>


    <section id="products" class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2 style="font-size: 25px;font-family:'Inter', sans-serif;">
                    Testimonial Pelanggan
                </h2>
                <p>Pendapat mereka tentang produk dan layanan kami</p>

            </div>
            <br>

            <div class="content-testimonial">
                <?php foreach ($testimonial_customer as $testi) : ?>
                <div class="content-card">

                    <div class="content-name-person">

                        <h4><?php echo $testi->nm_customer; ?></h4>

                        <p><?php echo $testi->pesan_testimonial; ?></p>

                        <div class="rating-class">
                            <div style="display: flex;gap:4px;" class="img-rating">
                                <img src="<?php echo base_url() ?>assets/dist/icons/ratingicons.png" width="15"
                                    height="15" alt="">
                                <p><?php echo $testi->rating ?></p>
                            </div>
                            <p><?php
                                    $date = new DateTime($testi->tgl_testimonial);
                                    $testidate = $date->format('d F y H:i:s ');
                                    echo $testidate; ?></p>
                        </div>

                    </div>

                </div>
                <?php endforeach; ?>
            </div>

            <div class="btn-box">

            </div>

        </div>

    </section>
</body>

<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300,400);
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css);

.snip1533 {
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
    color: #9e9e9e;
    display: inline-block;
    font-family: 'Roboto', Arial, sans-serif;
    font-size: 16px;
    margin: 35px 10px 10px;
    max-width: 310px;
    min-width: 250px;
    position: relative;
    text-align: center;
    width: 100%;
    background-color: #ffffff;
    border-radius: 5px;
    border-top: 5px solid #DC143C;
}

.snip1533 *,
.snip1533 *:before {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-transition: all 0.1s ease-out;
    transition: all 0.1s ease-out;
}

.snip1533 figcaption {
    padding: 12% 5% 5%;

}

.snip1533 figcaption:before {
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    background-color: #fff;
    border-radius: 50%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
    color: #DC143C;
    content: "\f10e";
    font-family: 'FontAwesome';
    font-size: 20px;
    font-style: normal;
    left: 50%;
    line-height: 60px;
    position: absolute;
    top: -30px;
    width: 50px;
    height: 50px;
}

.snip1533 h3 {
    color: black;
    font-size: 20px;
    font-weight: bold;
    line-height: 24px;
    margin: 10px 0 5px;
}

.snip1533 h4 {
    font-weight: 700;
    margin: 0;
    opacity: 0.5;
}

.snip1533 h5 {
    color: #DC143C;
    font-weight: 700;

}

.snip1533 blockquote {
    font-style: italic;
    font-weight: 200;
    font-size: 13px;
    color: black;
    margin: 0 0 20px;
}
</style>

</html>