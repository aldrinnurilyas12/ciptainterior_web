<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->




    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <a class="d-block">Admin Cipta Interior</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="<?php base_url() ?>dashboard" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>

                <li class="nav-header">Menu</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                            Master
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">



                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>master_data_services/produk" class="nav-link">
                                <i class="bi bi-boxes"></i> &nbsp;
                                <p>Data Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>master_data_services/datapelanggan" class="nav-link">
                                <i class="bi bi-people-fill"></i> &nbsp;
                                <p>Data Pelanggan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>master_data_services/banner" class="nav-link">
                                <i class="bi bi-truck"></i>&nbsp;
                                <p>Banner Konten</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>master_data_services/blog" class="nav-link">
                                <i class="bi bi-truck"></i>&nbsp;
                                <p>Blog</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>master_data_services/lappengiriman" class="nav-link">
                                <i class="bi bi-truck"></i>&nbsp;
                                <p>Data Pengiriman</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Email Marketing
                                    <i class="fas fa-angle-right right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>master_data_services/Email" class="nav-link">
                                        <i class="bi bi-send-fill"></i> &nbsp;
                                        <p>Kirim Email</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url() ?>analytics" class="nav-link">
                        <i class="bi bi-bar-chart-line-fill"></i>
                        <p>
                            Analytics
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-clipboard2-pulse-fill"></i>
                        <p>
                            Transaksi
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>master_data_services/datapemesanan" class="nav-link">
                                <i class="bi bi-bag-check-fill"></i> &nbsp;
                                <p>Data Pemesanan</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>master_data_services/datapembayaran" class="nav-link">
                                <i class="bi bi-cash-coin"></i></i> &nbsp;
                                <p>Data Pembayaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>master_data_services/datakeluhan" class="nav-link">
                                <i class="bi bi-clipboard2-data-fill"></i> &nbsp;
                                <p>Data Keluhan Pelanggan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>master_data_services/datatestimonial" class="nav-link">
                                <i class="bi bi-clipboard2-data-fill"></i> &nbsp;
                                <p>Data Testimonial Pelanggan</p>
                            </a>
                        </li>
                    </ul>
                </li>









        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->