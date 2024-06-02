<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/build/css/login.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/spinner.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="login-user">
        <form action="<?php echo base_url(); ?>login/proses" method="POST" class="login-email">
            <p style="font-family: 'Inter',sans-serif;" class="login-text">Login</p>
            <div style="font-family:inter, sans-serif;" class="input-group">
                <input style="font-weight: 600;" class="ketik" type="text" placeholder="Nama Pengguna" name="username" autocomplete="off" required>
            </div>
            <div class="input-group">
                <input style="font-weight: 600;" class="ketik" type="password" placeholder="Kata sandi" name="password" autocomplete="off" required>
            </div>
            <div class="input-group">
                <button style="font-family: 'Inter',sans-serif;margin-bottom:14px;" name='submit' class="btn-login">Login</button><br>
                <button id="redirectButton" hidden></button>
                <p1 style="font-family: 'Inter',sans-serif;" class="regis">Belum punya akun? <a href="register_account">Daftar</a></p1>
            </div>
        </form>
    </div>

    <div id="loadingOverlay" class="content-spinner">
        <div class="container-spinner">
            <div class="loader">
            </div>
        </div>

    </div>
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



    <?php if ($this->session->flashdata('sukses_register')) : ?>
        Swal.fire({
            text: '<?= $this->session->flashdata('sukses_register') ?>',
            icon: 'success',
            showConfirmButton: true,
            timer: 2000
        });
    <?php endif; ?>
</script>

</html>