<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nama_produk; ?></title>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/build/css/products_show.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body style="font-family: Inter, sans-serif;">

    <?php
    $id_order = $this->order_model->get_id_order();
    $id_order;
    $total_revavg = $total_rev_avg->row_array();
    $sold = $total_sold->row_array();


    $id_status = $this->order_model->get_status_id();
    ?>

    <!-- content main products -->
    <section class="py-5">
        <div class="container">
            <div class="row gx-5">

                <aside class="col-lg-6">
                    <div style=" position: -webkit-sticky; top: 0;position: sticky;"
                        class="rounded-4 mb-3 d-flex justify-content-center">
                        <img class="img-products" src="<?php echo base_url() . '/uploads/' . $foto; ?>">
                    </div>
                </aside>


                <main class="col-lg-6">
                    <div class="ps-lg-3">
                        <h4 style="font-weight: bold;" class="title text-dark">
                            <?php echo $nama_produk; ?>
                        </h4>
                        <div style="font-size: 12px;" class="d-flex flex-row my-3">
                            <div style="display: flex;align-items:center;" class="text-warning mb-1 me-2">

                                <span style="font-size: 12px;color:black;" class="text">
                                    <i class="fas fa-shopping-basket fa-sm mx-1"></i>
                                    <?php if (empty($sold['total_sold'])) {
                                        echo "Belum";
                                    } else {
                                        echo $sold['total_sold'];
                                    } ?>
                                    Terjual</span>

                                &nbsp;
                                &nbsp;
                                &nbsp;
                                <i class="fa fa-star"></i>
                                <span class="ms-1">
                                    <?php if (empty($total_revavg['avg_ratings'])) {
                                        echo "Belum ada review";
                                    } else {
                                        echo number_format($total_revavg['avg_ratings'], 1);
                                    } ?>
                                </span>
                                &nbsp;
                                <span style="color: black;" class="ms-1">
                                    <?php if (empty($total_revavg['total_reviews'])) {
                                        echo "(0 Ulasan)";
                                    } else {
                                        echo "(" . $total_revavg['total_reviews'] . " Ulasan)";
                                    } ?>
                                </span>
                                &nbsp;
                                &nbsp;
                                <span class="ms-1">
                                    <form action="<?php echo base_url('user/saved_items/' . $id_produk) ?>"
                                        method="post" enctype="multipart/form-data">
                                        <input name="id_produk" hidden value="<?php echo $id_produk; ?>">
                                        <button class="save-items" title="Simpan"
                                            style="width:max-content; padding:7px; background-color:none;color:black;text-decoration:underline;
                                          text-transform:none;display:flex;gap:8px;align-items:baseline;font-weight:bold;border-radius:4px;" type="submit">
                                            <i class="fa fa-bookmark" aria-hidden="true"></i>Simpan</button>
                                    </form>
                                </span>
                            </div>
                        </div>


                        <input class="forminput" type="hidden" name="id_pemesanan" value="<?php echo $id_order; ?>">

                        <input class=" forminput" type="hidden" name="id_customer"
                            value="<?php echo $this->session->userdata('id_customer'); ?>">
                        <input name="id_produk" hidden value="<?php echo $id_produk; ?>">
                        <input type="text" name="status_id" hidden value="<?php echo $id_status; ?>">

                        <div style="display: flex;gap:10px;" class="mb-3">
                            <span style="font-size: 16px;color:black;font-weight:700;"
                                class="h5"><?php echo "Rp" . number_format($total_harga) ?>
                            </span>
                            <span style="text-decoration: line-through;font-size:12px;" class="text-muted">
                                <?php if (empty($harga)) {
                                    echo "";
                                } else {
                                    echo "Rp" . number_format($harga);
                                } ?>
                            </span>
                            &nbsp;
                            <span>
                                <?php if (empty($diskon)) {
                                    echo "";
                                } else {
                                    echo ' <span
                                style="font-size: 12px;color:white; padding:5px; border-radius:3px;background:#DC143C;">';
                                    echo "Save " . $diskon . "%";
                                } ?>
                            </span>


                        </div>
                        <hr style="border: 0.1px solid grey; margin:5px;">
                        <div style="padding-left: 10px;" class="row">
                            <table style="width: 400px; border:none;" class="table  mt-3 mb-2">

                                <tr>
                                    <th style="border:none;padding-left: 10px;font-size:12px;" class="py-2">
                                        Status Produk:
                                    </th>
                                    <td style="border: none;font-size:12px;font-weight:bold;" class="py-2">
                                        <?php echo $status_produk ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="border:none;padding-left: 10px;font-size:12px;" class="py-2">
                                        Kategori:
                                    </th>
                                    <td style="border: none;font-size:12px;font-weight:bold;" class="py-2">
                                        <?php echo $category_name ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="border:none;padding-left: 10px;font-size:12px;" class="py-2">Min
                                        Pembelian</th>
                                    <td style="border: none;font-size:12px;font-weight:bold;" class="py-2">
                                        <?php
                                        if (empty($min_order)) {
                                            echo "-";
                                        } else {
                                            echo $min_order . " unit";
                                        }

                                        ?></td>
                                </tr>
                                <tr>
                                    <th style="border:none;padding-left: 10px;font-size:12px;" class="py-2">Dimensi
                                    </th>
                                    <td style="border: none;font-size:12px;font-weight:bold;" class="py-2">
                                        <?php
                                        if (empty($dimensional)) {
                                            echo "-";
                                        } else {
                                            echo $dimensional;
                                        }
                                        ?></td>
                                </tr>
                                <tr>
                                    <th style="border:none;padding-left: 10px;font-size:12px;" class="py-2">Berat
                                    </th>
                                    <td style="border: none;font-size:12px;font-weight:bold;" class="py-2">
                                        <?php
                                        if (empty($size_height)) {
                                            echo "-";
                                        } else {
                                            echo $size_height . " gram";
                                        }
                                        ?></td>
                                </tr>

                            </table>

                        </div>
                        <div style="margin:0;" class="row">
                            <div class="col-md-4 col-6">

                                <?php
                                if (
                                    empty($product_material) ||
                                    (empty($product_material[0]->material_satu) &&
                                        empty($product_material[0]->material_dua) &&
                                        empty($product_material[0]->material_tiga) &&
                                        empty($product_material[0]->material_empat) &&
                                        empty($product_material[0]->material_lima))
                                ) {
                                    echo "";
                                } else {
                                    foreach ($product_material as $mtr) : ?>
                                <div class="dropdown-materials">
                                    <select
                                        style="height: 35px;border-radius:5px;margin-top:5px;font-size: 12px;font-weight:600;padding-top:0; padding-bottom:0;font-family:Inter,sans-serif;"
                                        name="material" id="">
                                        <option value="">--Pilih Bahan--</option>
                                        <?php if (!empty($mtr->material_satu)) : ?>
                                        <option value="<?php echo $mtr->material_satu ?>">
                                            <?php echo $mtr->material_satu ?></option>
                                        <?php endif; ?>
                                        <?php if (!empty($mtr->material_dua)) : ?>
                                        <option value="<?php echo $mtr->material_dua ?>">
                                            <?php echo $mtr->material_dua ?></option>
                                        <?php endif; ?>
                                        <?php if (!empty($mtr->material_tiga)) : ?>
                                        <option value="<?php echo $mtr->material_tiga ?>">
                                            <?php echo $mtr->material_tiga ?></option>
                                        <?php endif; ?>
                                        <?php if (!empty($mtr->material_empat)) : ?>
                                        <option value="<?php echo $mtr->material_empat ?>">
                                            <?php echo $mtr->material_empat ?></option>
                                        <?php endif; ?>
                                        <?php if (!empty($mtr->material_lima)) : ?>
                                        <option value="<?php echo $mtr->material_lima ?>">
                                            <?php echo $mtr->material_lima ?></option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <?php endforeach;
                                } ?>


                            </div>

                            <!-- order detail -->
                            <div style="display: block; padding-top:15px; padding-bottom:15px;"
                                class="content-container-delivery-total">
                                <div style="display: block;box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px; padding:10px;border-radius:3px;"
                                    class="container-total-price">


                                    <div style="display: flex; justify-content:space-between; height:max-content;font-size:12px;"
                                        class="grand-total">
                                        <div style="padding: 0;color:gray;font-size: 12px;font-weight:500;font-family:Inter,sans-serif;"
                                            class="text4">
                                            Subtotal:
                                        </div>

                                        <div class="input">
                                            <input
                                                style="width:max-content;margin: 0;font-size:12px; color:black;font-weight:600; border:none;text-align:right;padding:0;font-family:Inter,sans-serif;"
                                                name="total_harga" type="text" id="price"
                                                value="<?php echo $total_harga; ?>">

                                        </div>

                                    </div>

                                    <div style="display: flex; justify-content:space-between; height:max-content;font-size:12px;font-family:Inter,sans-serif;"
                                        class="grand-total">
                                        <div style="padding: 0;color:gray;font-size: 12px;font-weight:500;font-family:Inter,sans-serif;"
                                            class="text4">
                                            Discount
                                        </div>

                                        <p
                                            style="margin: 0;font-size:12px; color:black; font-weight:600;font-family:Inter,sans-serif;">
                                            <?php

                                            if ($diskon == 0) {
                                                echo "0";
                                            } else {
                                                echo "-" . $diskon . "%";
                                            }
                                            ?></p>
                                    </div>

                                    <div style="display: flex; justify-content:space-between; height:max-content;"
                                        class="grand-total">
                                        <div style="padding: 0;color:gray;font-size: 12px;font-weight:500;font-family:Inter,sans-serif;"
                                            class="text4">
                                            Qty:
                                        </div>
                                        <input name="quantity"
                                            style="width:max-content;margin: 0;color:black; font-weight:600;font-size:12px; border:none;text-align:right;padding:0;font-family:Inter,sans-serif;"
                                            type="text" id="quantity2" value="1" readonly>

                                    </div>

                                    <div style="display: flex; justify-content:space-between; height:40px;"
                                        class="grand-total">
                                        <div style="padding: 0;color:gray;font-size: 12px;font-weight:500;margin-top: 12px;"
                                            class="text4">
                                            <h5
                                                style="font-size: 16px; color:black;font-weight:bold;font-family:Inter,sans-serif;">
                                                Total harga:</h5>
                                        </div>

                                        <form method="POST"
                                            action="<?php echo base_url('cart/order_to_detail/' . $id_produk) ?>">
                                            <input name="grand_total"
                                                style="width:max-content;margin: 0;font-size:14px; color:#DC143C; 
                                    border:none;text-align:right;padding:0;font-weight:700;font-family:Inter,sans-serif;" type="text"
                                                id="total" readonly>

                                    </div>
                                </div>

                            </div>



                            <!-- col.// -->
                            <div style="display: block;" class="col-md-4 col-6 mb-3">
                                <label style="color: black;font-weight:600;text-transform:none;font-size:13px;"
                                    class="mb-2 d-block">Quantity</label>
                                <div class="input-group mb-3" style="width: 170px;">
                                    <button class="btn btn-white border border-secondary px-3" type="button" id="minus"
                                        data-mdb-ripple-color="dark">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input name="quantity" id="quantity" value="1" type="text"
                                        class="form-control text-center border border-secondary"
                                        aria-label="Example text with button addon" aria-describedby="button-addon1" />
                                    <button class="btn btn-white border border-secondary px-3" type="button" id="plus"
                                        data-mdb-ripple-color="dark">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>
                    <input hidden type="text" name="status_id" value="<?php echo $id_status; ?>">

                    <input hidden type="text" name="height" value="<?php echo $size_height; ?>">
                    <button
                        style="background-color: #DC143C; border:none;text-transform:none;font-weight:bold;font-size:13px;"
                        class="btn btn-primary" data-modal-toggle="popup-modal" type="button">Pesan
                        Sekarang </button>
                    <a style="background-color: white;border:1.5px solid #DC143C ;text-transform:none;font-size:13px;color:#DC143C;"
                        href="<?php echo base_url() . 'cart/add_cart/' . $id_produk; ?>"
                        class="btn btn-warning shadow-0"> <i class="me-1 fa fa-shopping-basket"></i>
                        Keranjang
                    </a>

            </div>
            </main>


            <!-- MODAL CONTENT -->
            <div id="popup-modal" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type=""
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-toggle="popup-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div class="p-6 text-center">
                            <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apa
                                kamu
                                ingin
                                Pesan produk ini ?</h3>
                            <div style="display: block;" class="btn-btn">

                                <button type="submit" style="background-color: #DC143C;text-transform:none;
                                    font-size:13px;color:white;" class="btn btn-warning shadow-0">
                                    Pesan
                                </button>
                                </form>



                                <button style="background-color: white;color:black;padding:10px;border-radius:10px;"
                                    data-modal-toggle="popup-modal" type="button">Batal</button>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>
    <!-- content -->

    <section class="bg-light border-top py-4">
        <div class="container">
            <div class="row gx-4">
                <div class="col-lg-8 mb-4">
                    <div style="background-color: white;" class="px-0 border rounded-2 shadow-0">
                        <div class="w3-bar w3-black">
                            <button class="w3-bar-item w3-button tablink w3-red"
                                onclick="openCity(event,'description')">Deskripsi</button>
                            <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'review')">Ulasan
                            </button>
                        </div>

                        <!-- DESCRIPTION SEGMENT -->
                        <div style="padding: 10px;" id="description" class="w3-container w3-border city">

                            <p><?php echo $deskripsi; ?></p>

                            <div style="overflow-x: hidden;">
                                <section style="height: 100%; overflow-x: hidden;" class="gradient-custom">
                                </section>
                            </div>
                        </div>

                        <!-- REVIEW SEGMENT -->
                        <div style="padding: 10px; display:none;" id="review" class="w3-container w3-border city">
                            <h4 style="font-size: 14px; font-weight:700;margin-bottom:8px; color:black;">
                                (<?php echo $total_revavg['total_reviews']; ?>)Ulasan Pelanggan</h4>
                            <?php
                            if (
                                empty($reviews) ||
                                (empty($reviews[0]->nama_lengkap) &&
                                    empty($reviews[0]->review) &&
                                    empty($reviews[0]->rating) &&
                                    empty($reviews[0]->review_date) &&
                                    empty($reviews[0]->foto)
                                )

                            ) {
                                echo "belum ada ulasan";
                            } else {
                                foreach ($reviews as $rvw) :
                            ?>
                            <div style="display: block;" class="content-review">
                                <div style="display: flex;gap:6px;" class="foto-name">
                                    <img src="<?php echo base_url() . '/profile_picture/' . $rvw->foto ?>"
                                        class="rounded-circle" height="30" width="30">
                                    <h4 style="font-size: 12px; font-weight:700;margin-bottom:5px;color:black;">
                                        <?php if (!empty($rvw->nama_lengkap)) : ?>
                                        <?php echo $rvw->nama_lengkap;  ?></h4>
                                    <?php endif; ?>
                                </div>

                                <p style="font-size: 12px;color:gray; margin-bottom:5px; width:350px;">
                                    <?php if (!empty($rvw->review)) : ?>
                                    <?php echo $rvw->review;  ?></h4>
                                    <?php endif; ?>
                                </p>
                                <div class="rating" style="display: flex;align-items:center;">
                                    <div class="text-warning mb-1 me-2">
                                        <i style="display: flex;" class="fa fa-star">
                                        </i>
                                    </div>
                                    <p style="font-size: 12px;color:black; margin:0;">
                                        <?php if (!empty($rvw->rating)) : ?>
                                        <?php echo $rvw->rating;  ?></h4>
                                        <?php endif; ?>
                                    </p>
                                    &nbsp;
                                    &nbsp;
                                    <p style="font-size: 12px;color:gray;margin:0;">
                                        <?php if (!empty($rvw->review_date)) : ?>
                                        <?php echo $rvw->review_date;  ?></h4>
                                        <?php endif; ?>
                                    </p>
                                </div>

                            </div>
                            <hr style="border: 0.5px solid #cab3b3; margin:8px;">
                            <?php endforeach;  ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>


                <!-- other products -->
                <div class="col-lg-4">
                    <div class="px-0 border rounded-2 shadow-0">
                        <div class="card">
                            <div class="card-body">
                                <div style="display: flex;justify-content:space-between ;margin-bottom:10px; align-items:center;"
                                    class="title">
                                    <h5 style="color: black;font-family:'Inter',sans-serif; font-size:13px;font-weight:bold;"
                                        class="card-title">Produk
                                        lainnya</h5>
                                    <a style="color: black;font-family:'Inter',sans-serif; font-size:13px; color:#DC143C; text-decoration:underline;"
                                        href="<?php echo base_url(); ?>all-product"> semua produk</a>

                                </div>


                                <?php foreach ($product->result() as $prd) { ?>
                                <div class="d-flex mb-3">
                                    <a href="<?php echo base_url('products/view/' . $prd->id_produk); ?>" class="me-3">
                                        <img src="<?php echo base_url() . '/uploads/' . $prd->foto; ?>"
                                            style="width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                    </a>
                                    <div class="info">
                                        <a href="<?php echo base_url('products/view/' . $prd->id_produk); ?>"
                                            class="nav-link mb-1">
                                            <?php echo $prd->nama_produk; ?>
                                        </a>
                                        <strong class="text-dark">
                                            <?php echo "Rp" . number_format($prd->total_harga); ?></strong>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

<style>
button.save-items:hover {
    background-color: #f2f2f2;
}
</style>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
<script>
<?php
    if ($this->session->flashdata('error_message')) : ?>

Swal.fire({

    text: '<?= $this->session->flashdata('error_message') ?>',
    icon: 'error',
    position: 'bottom-end',
    toast: true,
    showConfirmButton: false,
    timer: 3000
});
<?php endif; ?>
</script>
<script>
function openCity(evt, cityName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " w3-red";
}


$(document).ready(function() {
    // Initial calculations
    calculateTotal();

    // Button click events
    $("#plus").click(function() {
        incrementQuantity();
    });

    $("#minus").click(function() {
        decrementQuantity();
    });
});

function incrementQuantity() {
    var quantity = parseInt($("#quantity").val());
    $("#quantity").val(quantity + 1);
    calculateTotal();

    var quantity2 = parseInt($("#quantity2").val());
    $("#quantity2").val(quantity2 + 1);
    calculateTotal();
}

function decrementQuantity() {
    var quantity = parseInt($("#quantity").val());
    if (quantity > 1) {
        $("#quantity").val(quantity - 1);
        calculateTotal();
    }

    var quantity2 = parseInt($("#quantity2").val());
    if (quantity2 > 1) {
        $("#quantity2").val(quantity2 - 1);
        calculateTotal();
    }
}

function calculateTotal() {
    var quantity = parseInt($("#quantity").val());
    var price = parseFloat($("#price").val());
    var total = quantity * price;
    $("#total").val(parseFloat(total));
}
</script>

</html>