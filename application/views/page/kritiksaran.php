<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="<?php echo base_url() ?>assets/css/responsive.css" rel="stylesheet" />


    <title>Cipta Interior</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap');
</style>





<body>

    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="index.html"><img width="120" height="90" src="<?php echo base_url() ?>assets/dist/img/logo.png" alt="ini logo" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a id="#products" class="nav-link" href="<?php echo base_url() ?>#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() ?>blog_list.php">Testimonial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() ?>contact.php">Contact</a>
                        </li>
                        &nbsp;

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">

                                    <?php
                                    if ($this->session->userdata('is_login')) {
                                    ?>
                                    <?php echo $this->session->userdata('nama_lengkap');
                                    } ?>
                                    <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li> <a href="<?php echo base_url('historypemesanan'); ?>">Pesanan
                                        saya</a></li>
                                <li> <a href="<?php echo base_url('kritiksaran'); ?>">Kritik dan Saran</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>logout/exit">Keluar</a></li>
                            </ul>
                        </li>


                    </ul>
                </div>
            </nav>
        </div>
    </header>




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


    form {
        width: 450px;
        height: 400px;
        padding-top: 30px;
        background: rgba(255, 255, 255, 0.861);
        box-shadow: rgba(55, 55, 55, 0.2) 0px 2px 8px 0px;

        justify-content: center;
        margin-top: 40px;
        border-radius: 6px;
        text-align: center;


    }

    .btn-kritik {


        cursor: pointer;
        width: 300px;
        height: 50px;
        background-image: linear-gradient(to right, #FF416C, #FF4B2B);
        color: white;
        font-size: 16px;
        border-radius: 5px;
        align-items: center;
        margin: 20px auto;
        border: none;
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


<div style="display: flex;justify-content:center;" class="container">


    <form style="height: 320px;" action="<?php echo base_url(); ?>kritiksaran/send_kritiksaran" method="post" enctype="multipart/form-data" class="formkritik">

        <h1 style="font-size:24px; font-weight:bold;">Berikan Kritik & Saran Anda</h1>

        <div class="input-kritik">
            <input class="isi" type="hidden" name="id_customer" value="<?php echo $this->session->userdata('id_customer'); ?>" placeholder="Masukan nama lengkap anda" required>
            <input class="isi" type="hidden" name="nm_customer" value="<?php echo $this->session->userdata('nama_lengkap'); ?>" placeholder="Masukan nama lengkap anda" required>
        </div>


        <div class="input-kritik">
            <textarea style="width: 350px;" class="isi-kritik" type="text" name="deskripsi" placeholder="Berikan Kritik dan saran anda" required></textarea>
        </div>


        <button class="btn-kritik" type="submit">Kirim Kritik dan Saran</button>



    </form>

</div>

<div id="riwayat" class="riwayat-pembayaran" style="overflow-x : auto;">
    <h1 style="font-size:22px;margin-left:30px ;font-weight:bold;">Riwayat Kritik dan Saran</h1>

    <table style=" margin-bottom:20px;" id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id Kritik Saran</th>
                <th>Id Customer</th>
                <th>Nama Customer</th>
                <th>Deskripsi</th>
                <th>Tanggal Kritik Saran</th>
                <th>Aksi</th>

            </tr>
        </thead>
        <?php
        foreach ($kritik_saran as $row) :
        ?>
            <tbody>

                <tr>
                    <td><?php echo $row->id_kritiksaran; ?></td>
                    <td><?php echo $row->id_customer; ?></td>
                    <td><?php echo $row->nm_customer; ?></td>
                    <td><?php echo $row->deskripsi; ?></td>
                    <td><?php echo $row->tgl_kritiksaran; ?></td>
                    <td>


                        <a style="color:red;" class="fa fa-trash fa-2x" type="button" data-modal-toggle="popup-modal1">

                        </a>


                        <div id="popup-modal1" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal1">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div class="p-6 text-center">
                                        <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                            Apa kamu ingin
                                            menghapus data kritik dan saran anda ?
                                        </h3>
                                        <p>Data akan terhapus permanent...</p>
                                        <a href="<?= site_url('kritiksaran/delete/' . $row->id_kritiksaran);  ?>" data-modal-toggle="popup-modal1" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            Ya , Hapus
                                        </a>
                                        <button data-modal-toggle="popup-modal1" type="button" class="text-gray-500 bg-green hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-green-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-green-300 dark:border-green-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </p3>
                    </td>




                </tr>
            <?php endforeach; ?>
            </tbody>


    </table>

</div>



<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

</body>
<script src="<?php echo base_url() ?>assets/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
<!-- custom js -->
<script src="<?php echo base_url() ?>assets/js/custom.js"></script>


</html>