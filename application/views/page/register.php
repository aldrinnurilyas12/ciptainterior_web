<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/build/css/daftar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php echo validation_errors(); ?>

    <div style="height:max-content;" class="formdaftar">

        <div style="margin-bottom: 20px;" class="regist-user">

            <?php
            $id_customer = $this->uri->segment(3);
            $kode_customer = $this->auth->kodecust($id_customer);
            $kode_customer;
            ?>
            <form enctype="multipart/form-data" action="<?php echo site_url('register_account/regaccount_process'); ?>"
                method="POST" class="registerakun">
                <p style="font-family: 'Inter',sans-serif;padding:0;margin:10px;" class="regist-text">Daftar akun</p>
                <input class="forminput" type="hidden" name="id_customer" value="<?= $kode_customer; ?>">


                <div class="input">
                    <input style="font-weight: 600;" autocomplete="off" class="forminput" type="text"
                        placeholder="Nama Lengkap" name="nama_lengkap">
                </div>


                <div class="input">
                    <input style="font-weight: 600;" autocomplete="off" class="forminput" type="text"
                        placeholder="Alamat" name="alamat">
                </div>


                <div class="inputemail">
                    <input style="font-weight: 600;" autocomplete="off" class="forminputemail" type="email"
                        placeholder="Email" name="email">
                </div>

                <div class="input">
                    <input style="font-weight: 600;" autocomplete="off" class="forminput" type="text"
                        placeholder="telepon" name="telepon">
                </div>

                <div class="input">
                    <input style="font-weight: 600;" autocomplete="off" class="forminput" type="text"
                        placeholder="Nama Pengguna" name="username">
                </div>


                <div class="inputpassword">
                    <input style="font-weight: 600;" class="forminputpass" type="password" placeholder="Buat Kata Sandi"
                        name="password">
                </div>

                <div class="input">
                    <input style="font-weight: 600;" class="forminput" type="file" name="filefoto">
                </div>


                <div class="input">
                    <button name="submit" type="submit" class="btn-simpan">Daftar Akun</button>

                </div>
                <div class="linklogin">
                    <a href="login">Login</a>
                </div>


            </form>
        </div>

    </div>



</body>
<script>
<?php if ($this->session->flashdata('gagal_register')) : ?>
Swal.fire({
    text: '<?= $this->session->flashdata('gagal_register') ?>',
    icon: 'error',
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 5000
});
<?php endif; ?>
</script>

</html>