<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div style="display: flex;justify-content:center;margin:0 auto;
            transform: translate(0, 10%);" class="container-flex-ulas">
        <div style="display: block;" class="content-block">
            <h4 style="margin-bottom: 15px;">Ulas Produk Kami</h4>
            <div style="width: 400px;" class="content-products">
                <div style="display: flex;gap:8px;" class="content-images">
                    <img style="border-radius: 5px;" width="50" height="50" src="<?php echo base_url() . '/uploads/' . $foto; ?>" alt="">
                    <h1 style="font-size: 15px;"><?php echo $nama_produk ?></h1>

                </div>
            </div>
            <form action="<?php echo base_url() ?>ulasproducts/send_reviews" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">

                        <input value="<?php echo $id_produk ?>" hidden name="id_produk" type="text" class="form-control" id="inputEmail4" placeholder="Email">
                        <input value="<?php echo $this->session->userdata('id_customer'); ?>" hidden name="id_customer" type="text" class="form-control" id="inputPassword4" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <select style="width:max-content;" class="form-control" name="rating" id="card_type" required>
                        <option value="">--Rating--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>

                    <div style="padding: 0;margin-top:8px;" class="form-group col-md-6">
                        <label for="inputCity">Masukan ulasan</label>
                        <input name="review" style="height: 90px;" placeholder="Ulasan anda..." type="text" class="form-control" id="inputCity">
                    </div>
                </div>
                <button style="background-color: black; color:white;border:none;" type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>

    </div>



</body>



</html>