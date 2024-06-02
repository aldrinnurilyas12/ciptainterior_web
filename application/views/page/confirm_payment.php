<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>


    <form action="<?php echo site_url('master_data_services/datapembayaran/update_payment'); ?>" method="post">

        <div class="container bg-white">
            <!-- Trigger the modal with a button -->
            <button type="button" style="display: none;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
            <!-- Modal -->
            <div class="modal show" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Konfirmasi Pembayaran <br>#<?php echo $id_payment ?></h4>

                            <h5>ID Pemesanan : <span style="font-weight: bold;"><?php echo $id_pemesanan; ?></span></h5>
                        </div>
                        <div class="modal-body">
                            <input hidden type="text" name="status" value="1">
                            <input hidden type="text" name="id_payment" value="<?php echo $id_payment; ?>">
                            <input hidden type="text" value="<?php echo $id_pemesanan; ?>" name="id_pemesanan">
                            <input hidden type="text" value="<?php echo $status_id; ?>" name="status_id">
                            <input hidden type="text" name="status_code" value="1">
                            <p>Konfirmasi data?</p>
                        </div>
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                            <a href="<?php echo base_url("datapembayaran"); ?>" type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>

</body>

</html>