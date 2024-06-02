<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item tersimpan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="saved-items-body">
        <div style="width: 100%; height:max-content; justify-content:center; display:flex;" class="saved-list">
            <div style="width: 400px;" class="w-full max-w-md p-4 bg-white border border-gray-500 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Item Tersimpan</h5>

                </div>

                <?php
                if ($savedData->result() == null) {
                    echo "Tidak ada item";
                } else {
                    foreach ($savedData->result() as $saved) :
                ?>

                        <div class="card card-stepper" style="border-radius: 10px;margin-top:10px;margin-bottom:10px;font-size:12px; width:100%;">

                            <div style="padding: 15px;" class="card-bodynew">
                                <div style="padding: 0; gap:12px;" class="d-flex flex-row ">
                                    <div>
                                        <img style="width: 140px;height:120px;border-radius:10px;" src="<?php echo base_url() . '/uploads/' . $saved->foto; ?>">
                                    </div>
                                    <div class="flex-fill">

                                        <div style="display: flex; justify-content:space-between;" class="content-title-dlt-trash">
                                            <h5 style="font-weight: 600;font-family:Inter,sans-serif;margin-top:0;font-size:14px;" class="bold">
                                                <?php echo $saved->nama_produk ?>
                                            </h5>

                                        </div>

                                        <div style="display: block;" class="d-block-total">

                                            <p style="font-weight: 700;margin:0;margin-bottom:0px;" class="mb">
                                                <?php echo "Rp" . number_format($saved->price); ?>
                                            </p>
                                        </div>

                                        <div style="display: flex;justify-content:space-between; margin-top:20px;" class="delete-btn">
                                            <a style="width:max-content; border-radius:4px;padding:6px;background:#DC143C; color:white; text-decoration:none;
                                    text-align:center;font-weight:600;" href="<?php echo base_url('products/view/' . $saved->id_produk) ?>">Pesan
                                                Sekarang</a>

                                            <a class="bi bi-trash3-fill" style="color:red;font-size:20px;align-content:center;" href="<?php echo base_url('user/deleteitems/' . $saved->id_list) ?>"></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php } ?>
            </div>
        </div>
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
</script>

</html>