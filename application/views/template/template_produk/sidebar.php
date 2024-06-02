 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">


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
                     <a href="<?php site_url() ?>dashboard" class=" nav-link active">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>

                 <li class="nav-header">Menu</li>

                 <li class="nav-item">
                     <a href="<?php site_url() ?>pemesanan" class="nav-link">
                         <i class="bi bi-cart-fill"></i>
                         <p>
                             Pemesanan
                             <i class="fas fa-angle-right right"></i>
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?php site_url() ?>produk" class="nav-link">
                         <i class="nav-icon fas fa-edit"></i>
                         <p>
                             Daftar Produk
                             <i class="fas fa-angle-right right"></i>
                         </p>
                     </a>

                 </li>

                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="bi bi-graph-up-arrow"></i>
                         <p>
                             Laporan
                             <i class="fas fa-angle-right right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="pages/mailbox/mailbox.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Laporan Penjualan</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/mailbox/mailbox.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Laporan Pendapatan</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?php echo base_url(); ?>datakeluhan" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Keluhan Pelanggan</p>
                             </a>
                         </li>


                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="fas fa-users"></i>
                         <p>
                             Customers
                             <i class="fas fa-angle-right right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?php echo base_url(); ?>datapelanggan" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Data Pelanggan</p>
                             </a>
                         </li>

                         <li class="nav-item">
                             <a href="<?php echo base_url(); ?>datakeluhan" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Keluhan Pelanggan</p>
                             </a>
                         </li>


                     </ul>
                 </li>



                 <li class="nav-header">Lainnya</li>

                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-envelope"></i>
                         <p>
                             Mailbox
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?php echo base_url(); ?>email" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Inbox</p>
                             </a>
                         </li>


                     </ul>


                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?php echo base_url(); ?>email" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Kotak Masuk</p>
                             </a>
                         </li>


                     </ul>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?php echo base_url(); ?>email" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Compose</p>
                             </a>
                         </li>


                     </ul>



                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-book"></i>
                         <p>
                             Pages
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="pages/examples/invoice.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Invoice</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/examples/profile.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Profile</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/examples/e-commerce.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>E-commerce</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/examples/projects.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Projects</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/examples/project-add.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Project Add</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/examples/project-edit.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Project Edit</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/examples/project-detail.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Project Detail</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/examples/contacts.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Contacts</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/examples/faq.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>FAQ</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/examples/contact-us.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Contact us</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-plus-square"></i>
                         <p>
                             Extras
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>
                                     Login & Register v1
                                     <i class="fas fa-angle-left right"></i>
                                 </p>
                             </a>
                             <ul class="nav nav-treeview">
                                 <li class="nav-item">
                                     <a href="pages/examples/login.html" class="nav-link">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Login v1</p>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="pages/examples/register.html" class="nav-link">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Register v1</p>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="pages/examples/forgot-password.html" class="nav-link">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Forgot Password v1</p>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="pages/examples/recover-password.html" class="nav-link">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Recover Password v1</p>
                                     </a>
                                 </li>
                             </ul>
                         </li>
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>
                                     Login & Register v2
                                     <i class="fas fa-angle-left right"></i>
                                 </p>
                             </a>
                             <ul class="nav nav-treeview">
                                 <li class="nav-item">
                                     <a href="pages/examples/login-v2.html" class="nav-link">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Login v2</p>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="pages/examples/register-v2.html" class="nav-link">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Register v2</p>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="pages/examples/forgot-password-v2.html" class="nav-link">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Forgot Password v2</p>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="pages/examples/recover-password-v2.html" class="nav-link">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Recover Password v2</p>
                                     </a>
                                 </li>
                             </ul>
                         </li>
                         <li class="nav-item">
                             <a href="pages/examples/lockscreen.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Lockscreen</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Legacy User Menu</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/examples/language-menu.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Language Menu</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/examples/404.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Error 404</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/examples/500.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Error 500</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/examples/pace.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Pace</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/examples/blank.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Blank Page</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="starter.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Starter Page</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-search"></i>
                         <p>
                             Search
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="pages/search/simple.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Simple Search</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/search/enhanced.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Enhanced</p>
                             </a>
                         </li>
                     </ul>
                 </li>



             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">



                 </div><!-- /.col -->

             </div><!-- /.row -->
         </div><!-- /.container-fluid -->
     </div>