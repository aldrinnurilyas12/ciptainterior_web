<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <style>
        body {
            justify-content: center;
            align-items: center;
        }

        .button-joinus {
            justify-content: center;
            background-image: linear-gradient(to right, #8BC6EC, #9599E2);
            border: none;
            border-radius: 50px;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            align-items: center;
            cursor: pointer;
        }

        .btn-riwayat {
            justify-content: center;

            margin-top: 10px;

            color: green;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            align-items: center;
            cursor: pointer;
        }

        .sukses {
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>

    <div class="sukses">


        <img style="width:300px ;" src="<?php echo base_url(); ?>assets/dist/img/sukses.png">
        <div class="btn-pembayaran">
            <center>
                <p style="font-size: 20px;">Silahkan melakukan Pembayaran produk</p>
            </center>
            <a class="button-joinus" href="<?php echo base_url(); ?>pembayaran">Pembayaran</a><br>
            <a class="btn-riwayat" href="<?php echo base_url(); ?>historypemesanan">Riwayat
                Pemesanan</a>
        </div>
    </div>




</body>

</html>