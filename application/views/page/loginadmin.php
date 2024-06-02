<!DOCTYPE html>
<html lang="">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login admin</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <form action="<?php echo base_url("loginadmin/login_proccess"); ?>" method='post'>

        <h1 class="judul">Login Admin Cipta Interior</h1>
        <p>Jl. Meruya Selatan No.7C,Meruya Selatan, Kec. Kembangan, Kota Jakarta Barat. </p>

        <div class="form-group">
            <label for="cari">Username</label>
            <input style="width:300px;" type="text" class="form-control" id="username" name="user">
        </div>
        <div class="form-group">
            <label for="cari">Password</label>
            <input style="width: 300px;" type="password" class="form-control" id="password" name="password">
        </div>
        <input class="btn btn-danger" type="submit" name="submit" value="submit">
    </form>



</body>


<script>
    <?php if ($this->session->flashdata('gagal_login')) : ?>
        Swal.fire({
            text: '<?= $this->session->flashdata('gagal_login') ?>',
            icon: 'error',
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 2000
        });
    <?php endif; ?>



    <?php if ($this->session->flashdata('error_login')) : ?>
        Swal.fire({
            text: '<?= $this->session->flashdata('error_login') ?>',
            icon: 'success',
            showConfirmButton: true,
            timer: 2000
        });
    <?php endif; ?>
</script>
<style>
    body {
        background-color: white;

        form {
            padding: 30px;
            justify-content: center;
            align-items: center;
            margin: 100px auto;
            width: 370px;
            color: black;
            background-color: #F5F5F5;
        }

        form .judul h1 {
            color: black;
        }
    }
</style>


</html>