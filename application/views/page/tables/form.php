<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>


    <style>
    form {

        margin-top: 30px;
        display: grid;
        width: 100%;
        align-items: center;
        justify-content: center;

    }
    </style>

    <form action="<?php echo site_url('editproduk/ubah'); ?>" method="post" enctype="multipart/form-data">
        <center>FORM UPDATE DATA</center>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>ID Produk</label>
                <input type="text" class="form-control" name="id_produk" value="<?php echo $id_produk; ?>>
            </div>
            <div class=" form-group col-md-6">
                <label>Nama Produk</label>
                <input style="width:300px;" type="text" class="form-control" name="nama_produk value="
                    <?php echo $nama_produk; ?>" placeholder="Masukan Nama Produk">
            </div>
        </div>
        <div class="form-group">
            <label>Harga Produk</label>
            <input style="width: 340px;" type="text" class="form-control" name="harga" value="<?php echo $harga; ?>>
        </div>
        <div class=" form-group">
            <label>Foto</label>
            <td><img src="<?php echo base_url() . '/uploads/' . $foto; ?>" width="100"></td>
            <input type="file" class="form-control" name="filefoto"
                value="<?php echo base_url() . '/uploads/' . $foto; ?>" placeholder="Foto">

        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" value="<?php echo $deskripsi; ?>"
                placeholder="Deskripsi Produk">
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="text" class="form-control" name="stok" value="<?php echo $stok; ?>" placeholder="Stok Produk">
        </div>
        <div class="form-group">
            <label>Status Produk</label>
            <input type="text" class="form-control" name="status_produk" value="<?php echo $status_produk; ?>"
                placeholder="Stok Produk">
        </div>
        <div class="form-group">
            <label>Waktu Pengerjaan</label>
            <input type="text" class="form-control" name="waktu_pengerjaan" value="<?php echo $waktu_pengerjaan; ?>">
        </div>

        <div class="form-group">
            <label>Tanggal Masuk</label>
            <input type="date" class="form-control" name="tgl_masuk" value="<?php echo $tgl_masuk; ?>"
                placeholder="Tanggal Masuk">
        </div>


        <input type="hidden" name="id_produk" value="<?php echo $id_produk ?>">
        <button type="submit" class="btn btn-primary">Update</button>

    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>