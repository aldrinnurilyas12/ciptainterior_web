<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

    <title>Keranjang Belanja</title>
    <link href="<?php echo base_url() . 'assets/img/logo.png' ?>" rel="shortcut icon" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'mobile/css/jquery.mmenu.all.css' ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'mobile/css/style.css' ?>" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-startup-image" href="img/apple-touch-startup-image.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

</head>

<body class="o-page" style="background-color:#fff;">

    <?php
    $id_status = $this->order_model->get_status_id();

    ?>


    <div style="display: flex;height:max-content;width:100%;position:sticky;" class="bannerPane banner-bg">
        <div style="display:block;height:max-content;padding:35px 0px 0px 35px;" class="s-banner-content">
            <h3 style="font-weight: bold;">Shopping Cart</h3>
            <p style="font-size: 15px;">
                <?php
                if ($this->cart->total_items()) {
                    echo $this->cart->total_items() . " Produk ada dikeranjang
                belanja anda";
                } else {
                    echo "Tidak ada produk dikeranjang anda";
                }   ?>
            </p>
        </div>

    </div>
    <div style="padding: 0px 30px 30px 30px;height:420px;overflow-y: scroll;" id="content">

        <?php echo form_open('cart/update/'); ?>

        <table cellpadding="6" cellspacing="1" style="width:100%" border="0">

            <tr>
                <th>QTY</th>
                <th>Item Description</th>
                <th style="text-align:right">Item Price</th>
                <th style="text-align:right">Sub-Total</th>
            </tr>

            <?php $i = 1; ?>

            <?php foreach ($this->cart->contents() as $items) : ?>

                <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>

                <tr>
                    <td><?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
                    </td>
                    <td>
                        <?php echo $items['name']; ?>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE) : ?>

                            <p>
                                <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value) : ?>

                                    <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                <?php endforeach; ?>
                            </p>

                        <?php endif; ?>

                    </td>
                    <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                    <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                </tr>

                <?php $i++; ?>

            <?php endforeach; ?>

            <tr>
                <td colspan="2"> </td>
                <td class="right"><strong>Total</strong></td>
                <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
            </tr>

        </table>

        <p><?php echo form_submit('', 'Update your Cart'); ?></p>
    </div>



    <!-- STYLING -->
    <style>
        span {
            cursor: pointer;
        }

        .number {
            display: flex;
            gap: 5px;
        }

        input.quantity {
            width: 50px;
            height: 16px;
            margin-bottom: 0;
            font-weight: bold;
        }

        .minus,
        .plus {
            width: 20px;
            height: 20px;
            background: #f2f2f2;
            border-radius: 4px;
            padding: 8px 5px 8px 5px;
            border: 1px solid #ddd;
            display: inline-block;
            vertical-align: middle;
            text-align: center;
            align-content: center;
        }

        input {
            height: 34px;
            width: 50px;
            text-align: center;
            font-size: 26px;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: inline-block;
            vertical-align: middle;

        }
    </style>

</body>


<script>
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
        $("#total").val(parseInt(total));
    }
</script>

</html>