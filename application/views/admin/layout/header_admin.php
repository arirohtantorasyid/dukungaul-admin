<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title ?? 'Admin Panel'; ?> - Dukun Gaul Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/adminlte/bower_components/Ionicons/css/ionicons.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/adminlte/dist/css/AdminLTE.min.css'); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/adminlte/dist/css/skins/_all-skins.min.css'); ?>">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">  <!-- WRAPPER - CONTAINER UTAMA ADMINLTE -->

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url('admin/dashboard'); ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>DG</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Dukun</b>Gaul Admin</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url('public/assets/adminlte/dist/img/user2-160x160.jpg'); ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $this->session->userdata('admin_nama'); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo base_url('public/assets/adminlte/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $this->session->userdata('admin_nama'); ?> - <?php echo ucfirst($this->session->userdata('admin_role')); ?>
                                    <small>Member since <?php echo date('M. Y', strtotime($this->session->userdata('admin_created_at'))); ?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="<?php echo base_url('admin/authadmin/logout'); ?>" class="btn btn-default btn-flat">Sign out</a> <!-- Tambahkan link logout admin -->
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar"> <!-- MAIN SIDEBAR - MENU SAMPING ADMINLTE -->
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url('public/assets/adminlte/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $this->session->userdata('admin_nama'); ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="<?php echo base_url('admin/dashboard'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url('admin/admindukun'); ?>">
                        <i class="fa fa-user-md"></i> <span>Manajemen Dukun</span>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url('admin/adminarticle'); ?>">
                        <i class="fa fa-file-text"></i> <span>Manajemen Artikel</span>
                    </a>
                </li>
                 <!-- Tambahkan Menu Fitur Beranda -->
                 <li class="treeview">
                    <a href="#"><i class="fa fa-magic"></i> <span>Fitur Beranda</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('admin/feature_card') ?>"><i class="fa fa-circle-o"></i> Fitur Cards</a></li>
                        <li><a href="<?= base_url('admin/banner_slider') ?>"><i class="fa fa-circle-o"></i> Banner Sliders</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="<?php echo base_url('admin/adminsystemconfig'); ?>">
                        <i class="fa fa-cogs"></i> <span>Konfigurasi Sistem</span>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url('admin/adminuser'); ?>">
                        <i class="fa fa-user"></i> <span>Manajemen Users</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-share"></i> <span>Multi Level</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o"></i> Level One
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                                <li>
                                    <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    </ul>
                </li>
                <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
                <li class="header">LABELS</li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper"> <!-- CONTENT WRAPPER - AREA KONTEN UTAMA ADMIN -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo $title ?? 'Dashboard'; ?>
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><?php echo $title ?? 'Dashboard'; ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content"> <!-- MAIN CONTENT - AREA ISI HALAMAN ADMIN -->
            <!-- KONTEN UTAMA ADMIN AKAN DI-LOAD DI SINI -->