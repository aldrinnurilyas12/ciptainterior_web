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

    <?php
    $status_id = $payments->row_array();

    ?>


    <form action="<?php echo site_url('user/updatestatus_order'); ?>" method="post">

        <div class="container bg-white">
            <!-- Trigger the modal with a button -->
            <button type="button" style="display: none;" class="btn btn-info btn-lg" data-toggle="modal"
                data-target="#myModal">Open Modal</button>
            <!-- Modal -->
            <div class="modal show" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Data Pemesanan</h4>
                        </div>
                        <div style="display:flex; justify-content:center;align-items:center;gap:10px;"
                            class="modal-body">

                            <input hidden style="height: 35px;border-radius:5px;margin-top:5px;font-size: 
                            12px;font-weight:600;padding-top:0; padding-bottom:0;font-family:Inter,sans-serif;"
                                name="status_code" id="">
                            <?php
                            foreach ($data_category->result() as $ctg) { ?>
                            <input style="width:30px; height:30px;" value="<?php echo $ctg->id == '3' ?>"
                                type="checkbox">
                            <?php echo $ctg->status_category_name ?>
                            <?php } ?>
                            <input type="text" value="<?php echo $status_id['status_id'] ?>" hidden name="status_id">
                        </div>
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary">Ubah data</button>
                            <a href="<?php echo base_url("datapemesanan"); ?>" type="button" class="btn btn-default"
                                data-dismiss="modal">Close</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>

</body>

</html>