<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Cipta Interior | <?php echo $nama_lengkap ?>
    </title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <?php
    $transaksi = $orders_total->row_array();
    $payment = $total_payment->row_array();
    $kritik_saran = $total_kritik->row_array();
    $testimonial = $total_testimonial->row_array();
    ?>
    <div class="container-content-first">
        <main id="main" class="main">
            <section class="section profile">
                <div style="font-family: Inter, sans-serif;display: flex;justify-content:center;padding:20px;"
                    class="row">
                    <div style="font-family: Inter, sans-serif;width:100%" class="w3-container">
                        <div class="w3-menu-bar-profile">
                            <div class="menu-btn">
                                <button class="w3-bar-item w3-button-tab tablink w3-tab"
                                    onclick="openCity(event,'profile')">Profil</button>
                                <button class="w3-bar-item w3-button-tab tablink"
                                    onclick="openCity(event,'update-profile')">Ubah
                                    Profil</button>
                            </div>

                        </div>

                        <div id="profile" class="w3-container-content city">
                            <div style="font-family: Inter, sans-serif;padding: 0;" class="container">
                                <div style="font-family: Inter, sans-serif;padding: 0;padding-top:15px;"
                                    class="main-body">
                                    <div class="row gutters-sm">
                                        <div class="col-md-4 mb-3">

                                            <!-- Profile Image -->
                                            <div class="card card-primary card-outline">
                                                <div class="card-body box-profile">
                                                    <div class="text-center">
                                                        <?php
                                                        foreach ($image->result_array() as $foto) {
                                                            echo '<img src="' . base_url() . '/profile_picture/' . $foto['image'] .
                                                                '" class="rounded-circle" height="150" width="150">';
                                                        } ?>
                                                    </div>

                                                    <h3 class="profile-username text-center">
                                                        <?php echo $nama_lengkap; ?></h4>
                                                    </h3>

                                                    <p class="text-muted text-center"><?php echo $alamat; ?></p>

                                                    <ul class="list-group list-group-unbordered mb-3">
                                                        <li class="list-group-item">
                                                            <b>Transaksi</b> <a class="float-right"><?php
                                                                                                    if (empty($transaksi['totals'])) {
                                                                                                        echo "Belum ada transaksi";
                                                                                                    } else {
                                                                                                        echo $transaksi['totals'];
                                                                                                    } ?></a>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <b>Pembayaran</b> <a class="float-right"> <?php
                                                                                                        if (empty($payment['total_payment'])) {
                                                                                                            echo "Belum ada pembayaran";
                                                                                                        } else {
                                                                                                            echo $payment['total_payment'];
                                                                                                        } ?></a>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <b>Kritik & Saran</b> <a class="float-right"><?php
                                                                                                            if (empty($kritik_saran['total_kritik'])) {
                                                                                                                echo "Belum ada kritik & saran";
                                                                                                            } else {
                                                                                                                echo $kritik_saran['total_kritik'];
                                                                                                            } ?></a>
                                                        </li>

                                                        <li class="list-group-item">
                                                            <b>Testimonial</b> <a class="float-right"><?php
                                                                                                        if (empty($testimonial['total_testimonial'])) {
                                                                                                            echo "Belum ada testimonial";
                                                                                                        } else {
                                                                                                            echo $testimonial['total_testimonial'];
                                                                                                        } ?></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>

                                        <div class="col-md-8">
                                            <div class="card mb-3">
                                                <div class="card card-primary card-outline">
                                                    <div class="card-body">
                                                        <p style="font-family: Inter, sans-serif;font-weight: bold;">
                                                            Profil
                                                        </p>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <h6 style="font-family:Inter, sans-serif;margin: 0;font-family: Inter , sans-serif;"
                                                                    class="mb-0">Nama</h6>
                                                            </div>
                                                            <div class="col-sm-9 text-secondary">
                                                                <?php echo $nama_lengkap; ?>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <h6 style="font-family:Inter, sans-serif;margin: 0;"
                                                                    class="mb-0">Email</h6>
                                                            </div>
                                                            <div class="col-sm-9 text-secondary">
                                                                <?php echo $email; ?>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <h6 style="font-family:Inter, sans-serif;margin: 0;"
                                                                    class="mb-0">Phone</h6>
                                                            </div>
                                                            <div class="col-sm-9 text-secondary">
                                                                <?php echo $telepon; ?>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <h6 style="font-family:Inter, sans-serif;margin: 0;"
                                                                    class="mb-0">Alamat</h6>
                                                            </div>
                                                            <div class="col-sm-9 text-secondary">
                                                                <?php echo $alamat; ?>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <h6 style="font-family:Inter, sans-serif;margin: 0;"
                                                                    class="mb-0">Bergabung</h6>
                                                            </div>
                                                            <div class="col-sm-9 text-secondary">
                                                                <?php $date = new DateTime($register_date);
                                                                $registDate = $date->format('d F Y h:i:s A ');
                                                                echo $registDate; ?>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SECTION UPDATE PROFILE -->

                        <div id="update-profile" class="w3-container-content city"
                            style="font-family: Inter, sans-serif;display:none">
                            <div class="main-body">
                                <div class="row gutters-sm">
                                    <div class="col-md-6">
                                        <div class="card card-primary card-outline">
                                            <div class="card-body">
                                                <p style="font-family: Inter, sans-serif;font-weight: bold;">Ubah
                                                    Profil
                                                </p>
                                                <hr>
                                                <form action="<?php echo base_url(); ?>user/update_profile/"
                                                    method="post" enctype="multipart/form-data" novalidate>

                                                    <div class="d-flex flex-column align-items-center text-center">

                                                        <?php
                                                        foreach ($image->result_array() as $foto) {
                                                            echo '<img src="' . base_url() . '/profile_picture/' . $foto['image'] .
                                                                '" class="rounded-circle" height="150" width="150">';
                                                        } ?>
                                                        <input style="width: 400px;" type="file" class="form-control"
                                                            name="filefoto"
                                                            value="<?php echo base_url() . '/profile_picture/' . $foto['image']; ?>"
                                                            placeholder="Foto">
                                                    </div>


                                                    <div class="col-sm-9 text-secondary">
                                                        <input class="input-user" hidden name="id_customer"
                                                            value="<?php echo $id_customer ?>" type="text">
                                                    </div>
                                                    <div style="font-family: Inter, sans-serif;margin-top: 15px;"
                                                        class="row">
                                                        <div class="col-sm-3">
                                                            <h6 style="font-family: Inter, sans-serif;margin: 0;"
                                                                class="mb-0">Nama</h6>
                                                        </div>

                                                        <div class="col-sm-9 text-secondary">
                                                            <input class="input-user" name="nama_lengkap"
                                                                value="<?php echo $nama_lengkap ?>" type="text">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 style="font-family: Inter, sans-serif;margin: 0;"
                                                                class="mb-0">Alamat</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input class="input-user" name="alamat"
                                                                value="<?php echo $alamat ?>" type="text">
                                                            <p
                                                                style="color: gray;font-size:12px; color:red;font-style:italic;">
                                                                *alamat digunakan sebagai alamat tujuan pengiriman
                                                            </p>

                                                        </div>
                                                    </div>

                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 style="font-family: Inter, sans-serif;margin: 0;"
                                                                class="mb-0">Email</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input class="input-user" name="email"
                                                                value="<?php echo $email ?>" type="text">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 style="font-family: Inter, sans-serif;margin: 0;"
                                                                class="mb-0">Phone</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input class="input-user" name="telepon"
                                                                value="<?php echo $telepon ?>" type="text">

                                                        </div>
                                                    </div>
                                                    <hr>

                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 style="font-family: Inter, sans-serif;margin: 0;"
                                                                class="mb-0">Username</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input class="input-user" name="username"
                                                                value="<?php echo $username; ?>" type="text">

                                                        </div>

                                                    </div>
                                                    <hr>
                                                    <p>Terakhir diperbarui :
                                                        <?php $date = new DateTime($update_at);
                                                        $updateDate = $date->format('d F Y h:i:s A ');
                                                        echo $updateDate; ?>
                                                    </p>
                                                    <hr>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary">Ubah
                                                            Data</button>
                                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>


                                    </div>

                                    <!-- change the password -->
                                    <div class="col-md-5 mb-3">
                                        <div class="card mb-3">
                                            <div class="card card-primary card-outline">
                                                <div class="card-body">
                                                    <p style="font-family: Inter, sans-serif;font-weight: bold;">Ubah
                                                        Password
                                                    </p>
                                                    <hr>
                                                    <form action="<?php echo base_url(); ?>user/reset_password/"
                                                        method="post" enctype="multipart/form-data" novalidate>

                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <h6 style="font-family: Inter, sans-serif;margin: 0;"
                                                                    class="mb-0">Password baru</h6>
                                                            </div>
                                                            <div class="col-sm-9 text-secondary">
                                                                <input class="input-user" name="password"
                                                                    placeholder="password baru anda" type="password">
                                                            </div>

                                                        </div>
                                                        <hr>
                                                        <p>Terakhir diperbarui :
                                                            <?php $date = new DateTime($create_at);
                                                            $passwordDate = $date->format('d F Y h:i:s A ');
                                                            echo $passwordDate; ?>
                                                        </p>
                                                        <hr>
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary">Ubah
                                                                Password</button>
                                                            <button type="reset"
                                                                class="btn btn-secondary">Reset</button>
                                                        </div>
                                                    </form>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>



                    </div>
                </div>

            </section>

        </main>
    </div>
</body>


<script>
<?php if ($this->session->flashdata('success_message')) : ?>
Swal.fire({
    text: '<?= $this->session->flashdata('success_message') ?>',
    icon: 'success',
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 2000
});
<?php endif; ?>


$(document).ready(function() {
    $('#resetForm').submit(function(e) {
        e.preventDefault();
        var password = $('input[name="password"]').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('user/reset_password'); ?>',
            data: {
                password: password
            },
            success: function(response) {
                swal("Password berhasil diubah!");
                // Redirect to user-profile page after success
                window.location.href = '<?php echo base_url('user-profile'); ?>';
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Display an error message if something went wrong
                swal("Oops!", "Something went wrong. Please try again later.", "error");
            }
        });
    });
});

function openCity(evt, cityName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-tab", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " w3-tab";
}
</script>


</html>