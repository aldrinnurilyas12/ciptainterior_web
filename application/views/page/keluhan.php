<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/build/css/landingpage.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/build/css/keluhan.css">

    <title>Keluhan</title>
</head>


<html>


<body>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap');
    </style>







    <div class="navbar">

        <div class="logotoko">
            <img src="<?php echo base_url(); ?>assets/dist/img/logocipta.png">
        </div>

        <div class="isinavbar">
            <ul>
                <li><a href="<?php echo base_url(); ?>beranda">Beranda</a></li>
                <li><a href="<?php echo base_url(); ?>displayproducts">Katalog Produk</a></li>
                <li><a href="<?php echo base_url(); ?>keluhan">Keluhan</a></li>
                <li><a href="<?php echo base_url(); ?>testimonial">Testimonial</a></li>
            </ul>

        </div>
        <div class="hello">
            <button onclick="myFunction()" class="dropbtn">
                <?php
                if ($this->session->userdata('is_login')) {
                ?>
                <?php echo $this->session->userdata('nama_lengkap');
                } ?>
            </button>
            <div id="myDropdown" class="dropdown-content">
                <a href="<?php echo base_url('historypemesanan'); ?>">Pesanan saya</a>
                <a href="<?php echo base_url('pembayaran'); ?>">Pembayaran</a>
                <a href="<?php echo base_url('kritiksaran'); ?>">Kritik dan Saran</a>
                <a href="<?php echo base_url(); ?>logout/exit">Keluar</a>

            </div>
            <span>



        </div>





    </div>




</body>
<style>
    .dropbtn {
        width: 200px;
        height: 40px;
        margin-top: -10px;
        color: white;
        border-radius: 50px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        font-weight: bold;
        background-image: linear-gradient(to right, #FF416C, #FF4B2B);
    }


    .hello {

        color: white;
        font-weight: bold;
        font-family: 'Inter', sans-serif;
        position: relative;
        display: inline-block;
    }


    .dropdown-content {
        display: none;
        background-image: linear-gradient(to right, #FF416C, #FF4B2B);
        position: absolute;
        height: 160px;
        width: 200px;
        overflow: auto;

        box-shadow: 0px 3px 5px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: white;
        padding: 8px;
        text-decoration: none;
        display: block;
        font-weight: bold;
        font-family: 'Inter', sans-serif;
    }

    .dropdown a:hover {
        background-color: white;
    }

    .show {
        display: block;
    }
</style>


<script>
    /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>



</div>




<div style="justify-content:center;" class="form">

    <form style="height:670px; width:420px;padding:10px;margin:30px auto;" action="<?php echo site_url('keluhan/send_keluhan'); ?>" method="post" enctype="multipart/form-data" class="registerakun">
        <p class="regist-text">Keluhan Pelanggan</p>


        <div style="margin-top:10px; margin-left:10px;" class="input-testimoni">
            <div class="col-sm-10">
                <label style="position: absolute;font-weight:bold;">Id Pemesanan</label>

                <input style="margin-top: 25px;width:370px;" type="text" placeholder="Masukan Id Pemesanan" name="id_pemesanan" id="id_pemesanan" class="isi">
            </div>

            <div style="margin-top:10px ;" class="col-sm-10">
                <label style="position: absolute;font-weight:bold;">Tanggal Pemesanan</label>
                <input style="margin-top: 25px;width:370px;" type="text" name="tgl_pesan" class="isi" readonly>
            </div>

            <div class="col-sm-10">
                <label style="position: absolute;font-weight:bold;">Nama Produk</label>
                <input style="margin-top: 25px;width:370px;" type="text" name="nama_produk" class="isi" readonly>
            </div>

            <div class="input">
                <input class="isi" type="hidden" name="id_customer" value="<?php echo $this->session->userdata('id_customer'); ?>" required>
            </div>

            <div class="col-sm-10">
                <label style="position: absolute;font-weight:bold;">Nama Customer</label>
                <input style="margin-top: 25px;width:370px;" type="text" name="nm_customer" class="isi" readonly>
            </div>

            <div class="col-sm-10">
                <label style="position: absolute;font-weight:bold;">Email</label>

                <input style="margin-top: 30px;width:370px;" type="email" placeholder="Masukan Id Pemesanan" name="email" id="email" value="<?php echo $this->session->userdata('email'); ?>" class="isi">
            </div>

            <div class="col-sm-10">
                <label style="position: absolute;font-weight:bold;">Keluhan Anda</label>
                <textarea style="margin-top: 25px;width:370px;height:120px" class="forminput-keluhan" type="text" placeholder="Keluhan yang disampaikan" name="keluhan" required></textarea>
            </div>
        </div>

        <button style=" background-image: linear-gradient(to right, #FF416C, #FF4B2B);margin-top:10px;" type="submit" class="btn-keluhan">Kirim Keluhan</button>
    </form>
</div>

<table style=" margin-bottom:20px; margin-top:20px;" id="example1" class="table table-bordered table-striped">

    <h1 style="font-size:22px;margin-left:30px ;margin-top:140px;font-weight:bold;">Riwayat Keluhan</h1>

    <thead>
        <tr>
            <th scope="col">Id Keluhan</th>
            <th scope="col">Id Customer</th>
            <th scope="col">Nama Customer</th>
            <th scope="col">Id Pemesanan</th>
            <th scope="col">Tanggal Pesan</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Email</th>
            <th scope="col">Keluhan</th>
            <th scope="col">Balasan</th>
            <th scope="col">Tanggal Keluhan</th>
            <th scope="col">Aksi</th>

        </tr>

    </thead>
    <?php
    foreach ($keluhan_customer as $row) :
    ?>
        <tbody style="margin-left: 20px;">
            <tr>

                <td><?php echo $row->id_keluhan; ?></td>
                <td><?php echo $row->id_customer; ?></td>
                <td><?php echo $row->nm_customer; ?></td>
                <td><?php echo $row->id_pemesanan; ?></td>
                <td><?php echo $row->tgl_pesan; ?></td>
                <td><?php echo $row->nama_produk; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $row->keluhan; ?> </td>
                <td><?php echo $row->balasan; ?> </td>
                <td><?php echo $row->tgl_keluhan; ?> </td>

                <td> <a style="color:red;" class="fa fa-trash fa-2x" type="button" data-modal-toggle="popup-modal">

                    </a>

                    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div class="p-6 text-center">
                                    <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apa kamu ingin
                                        menghapus data keluhan ?</h3>
                                    <a href="<?= site_url('keluhan/delete/' . $row->id_keluhan); ?>" data-modal-toggle="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Ya , Hapus
                                    </a>
                                    <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">batal</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>

        </tbody>
    <?php endforeach; ?>
</table>

</body>
<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#id_pemesanan').on('input', function() {

            var id_pemesanan = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('keluhan/get_pemesananproduk') ?>",
                dataType: "JSON",
                data: {
                    id_pemesanan: id_pemesanan
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(id_pemesanan, tgl_pesan, nama_produk, nm_customer) {
                        $('[name="tgl_pesan"]').val(data.tgl_pesan);
                        $('[name="nama_produk"]').val(data.nama_produk);
                        $('[name="nm_customer"]').val(data.nm_customer);


                    });

                }
            });
            return false;
        });

    });
</script>

</html>