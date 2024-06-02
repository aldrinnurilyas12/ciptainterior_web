<div id="done" class="w3-container w3-border city">
    <div style="font-family: Inter, sans-serif;padding: 0;" class="container">
        <div style="font-family: Inter, sans-serif;padding: 0;padding-top:15px;" class="main-body">
            <div class="row gutters-sm">

                <div class="card">

                    <div class="card-body">
                        <h3 style="font-size:25px;font-weight:bold;" class="card-title">
                            Data Pemesanan
                            Selesai
                        </h3>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:60px ;">Id Pemesanan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Banyak</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Tanggal Pesan</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($order_complete->result()  as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row->id_pemesanan; ?></td>
                                        <td><?php echo $row->nama_lengkap; ?></td>
                                        <td><?php echo $row->alamat; ?>
                                            <?php echo $row->telepon; ?></td>
                                        <td><?php echo $row->nama_produk ?></td>
                                        <td style="font-size: 14px;">
                                            <?php echo "Rp "; ?><?php echo number_format($row->total_harga); ?>
                                        </td>
                                        <td><?php echo $row->quantity; ?></td>
                                        <td><?php echo "Rp "; ?><?php echo number_format($row->grand_total); ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $row->status_code == '0' ? '<p style="width:90px;color:red;font-weight:bold; font-size:14px;">Menunggu Konfirmasi</p>'
                                                : ($row->status_code == '1'
                                                    ? '<p style="width:90px;color:purple;font-weight:bold; font-size:14px;" >Sudah dikonfirmasi</p>'
                                                    : '<p style="width:90px;color:green;font-weight:bold; font-size:14px;" >Selesai</p>');
                                            ?>
                                        </td>

                                        <td><?php echo $row->tgl_pesan; ?></td>


                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


<!-- Confirmed section -->
<div id="confirmed" class="w3-container w3-border city" style="display: none;">
    <div style="font-family: Inter, sans-serif;padding: 0;" class="container">
        <div style="font-family: Inter, sans-serif;padding: 0;padding-top:15px;" class="main-body">
            <div class="row gutters-sm">
                <div class="card">

                    <div class="card-body">
                        <h3 style="font-size:25px;font-weight:bold;" class="card-title">
                            Pemesanan
                            Sudah Konfirmasi
                        </h3>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:60px ;">Id Pemesanan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Banyak</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($comfirmed->result()  as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row->id_pemesanan; ?></td>
                                        <td><?php echo $row->nama_lengkap; ?></td>
                                        <td><?php echo $row->alamat; ?>
                                            <?php echo $row->telepon; ?></td>
                                        <td><?php echo $row->nama_produk; ?></td>
                                        <td style="font-size: 14px;">
                                            <?php echo "Rp "; ?><?php echo number_format($row->total_harga); ?>
                                        </td>
                                        <td><?php echo $row->quantity; ?></td>
                                        <td><?php echo "Rp "; ?><?php echo number_format($row->grand_total); ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $row->status_code == '0' ? '<p style="width:90px;color:red;font-weight:bold; font-size:14px;">Menunggu Konfirmasi</p>'
                                                : ($row->status_code == '1'
                                                    ? '<p style="width:90px;color:purple;font-weight:bold; font-size:14px;" >Sudah dikonfirmasi</p>'
                                                    : '<p style="width:90px;color:green;font-weight:bold; font-size:14px;" >Selesai</p>');
                                            ?>
                                        </td>

                                        <td><?php echo $row->tgl_pesan; ?></td>
                                        <td>
                                            <a href="<?= site_url('master_data_services/datapemesanan/change_status/' . $row->id_pemesanan) ?>" style="width:110px;font-size:15px; font-weight:bold;" class="btn btn-outline-primary btn-block btn-active active">
                                                Ubah status</a>
                                            <a style="color:red;" class="fa fa-trash fa-1x">
                                            </a>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>



                </div>

            </div>

        </div>
    </div>


</div>

<!-- NOT CONFIRMED SECTION -->
<div id="not-confirmed" class="w3-container w3-border city" style="display:none">
    <div style="font-family: Inter, sans-serif;padding: 0;" class="container">
        <div style="font-family: Inter, sans-serif;padding: 0;padding-top:15px;" class="main-body">
            <div class="row gutters-sm">
                <div class="card">

                    <div class="card-body">
                        <h3 style="font-size:25px;font-weight:bold;" class="card-title">
                            Data Pemesanan
                            Belum Konfirmasi
                        </h3>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:60px ;">Id Pemesanan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Banyak</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($not_complete->result()  as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row->id_pemesanan; ?></td>
                                        <td><?php echo $row->nama_lengkap; ?></td>
                                        <td><?php echo $row->alamat; ?>
                                            <?php echo $row->telepon; ?></td>
                                        <td><?php echo $row->nama_produk; ?></td>

                                        <td style="font-size: 14px;">
                                            <?php echo "Rp "; ?><?php echo number_format($row->total_harga); ?>
                                        </td>
                                        <td><?php echo $row->quantity; ?></td>
                                        <td><?php echo "Rp "; ?><?php echo number_format($row->grand_total); ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $row->status_code == '0' ? '<p style="width:90px;color:red;font-weight:bold; font-size:14px;">Menunggu Konfirmasi</p>'
                                                : ($row->status_code == '1'
                                                    ? '<p style="width:90px;color:purple;font-weight:bold; font-size:14px;" >Sudah dikonfirmasi</p>'
                                                    : '<p style="width:90px;color:green;font-weight:bold; font-size:14px;" >Selesai</p>');
                                            ?>
                                        </td>

                                        <td><?php echo $row->tgl_pesan; ?></td>
                                        <td>
                                            <a href="<?= site_url('master_data_services/datapemesanan/change_status/' . $row->id_pemesanan) ?>" style="width:110px;font-size:15px; font-weight:bold;" class="btn btn-outline-primary btn-block btn-active active">
                                                Ubah status</a>


                                            <a style="background-color: yellow;color:black; border:none;font-weight:bold;" href="<?= site_url('master_data_services/datapembayaran') ?>" style="width:110px;font-size:15px; font-weight:bold;" class="btn btn-outline-primary btn-block btn-active active">
                                                Konfirmasi</a>

                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>