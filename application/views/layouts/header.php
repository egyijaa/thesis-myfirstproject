<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>pasmantap</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="icon" href="<?php echo base_url(); ?>/assets/image/gambar_web/logoSmanta.png?t=<?php echo time();?>">
    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/fontawesome-free/css/all.min.css?t=<?php echo time();?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/dist/css/adminlte.min.css?t=<?php echo time();?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/sweetalert2/sweetalert2.min.css?t=<?php echo time();?>">
    <!-- Toastr -->
    <link rel="stylesheet"
        hhref="<?php echo base_url(); ?>/assets/adminLte/plugins/toastr/toastr.min.css?t=<?php echo time();?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css?t=<?php echo time();?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css?t=<?php echo time();?>">

    <!-- Awal, Login,  -->
    <?php if($this->uri->uri_string() != 'login/toLogin' && $this->uri->uri_string() != 'login/toRegister' && $this->uri->uri_string() != 'page' && ($this->uri->uri_string() == 'Broadcast/toBroadcast' && $this->session->userdata('akses')!='2' && $this->session->userdata('akses')!='3')) : ?>
    <!-- Bootstrap Color Picker -->
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css?t=<?php echo time();?>"> -->
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css?t=<?php echo time();?>">
    <!-- Select2 -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/select2/css/select2.min.css?t=<?php echo time();?>">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css?t=<?php echo time();?>">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css?t=<?php echo time();?>">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css?t=<?php echo time();?>">
    <!-- iCheck -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css?t=<?php echo time();?>">
    <!-- JQVMap -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/jqvmap/jqvmap.min.css?t=<?php echo time();?>">
    <!-- Daterange picker -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/daterangepicker/daterangepicker.css?t=<?php echo time();?>">
    <?php endif; ?>

    <?php if($this->uri->uri_string() == 'Lowongan/toLowongan' || $this->uri->uri_string() == 'Lowongan/toLowongan2' || ($this->uri->uri_string() == 'Broadcast/toBroadcast' && $this->session->userdata('akses')!='2' && $this->session->userdata('akses')!='3')) : ?>
    <!-- daterange picker -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/daterangepicker/daterangepicker.css?t=<?php echo time();?>">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css?t=<?php echo time();?>">
    <?php endif; ?>

    <!-- pagination -->
    <?php if($this->uri->uri_string() == 'page/alumni' || $this->uri->uri_string() == 'Broadcast/toBroadcast' || $this->uri->uri_string() == 'Lowongan/toLowongan' || $this->uri->uri_string() == 'Lowongan/toLowongan2' || $this->uri->uri_string() == 'Admin/toAdmin') : ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bootstrap/css/pagination.css?t=<?php echo time();?>">
    <?php endif; ?>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="<?php echo base_url(); ?>/assets/bootstrap/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <?php if($this->uri->uri_string() == 'Lowongan/toLowongan' || $this->uri->uri_string() == 'Lowongan/toLowongan2' || $this->uri->uri_string() == 'Lowongan/toEditLowongan' || $this->uri->uri_string() == 'Lowongan/toEditLowongan/'.$this->uri->segment(3) || ($this->uri->uri_string() == 'Broadcast/toBroadcast' && $this->session->userdata('akses')!='2' && $this->session->userdata('akses')!='3')) : ?>
    <script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

    <?php endif; ?>


    <style>
        @media only screen and (min-width: 480px) and (max-width: 767px) {
            .card-text3 {
                font-size: 12px;
            }
        }

        @media only screen and (min-width: 180px) and (max-width: 479px) {
            .card-text3 {
                font-size: 8px;
            }
        }

        .table td,th {
            text-align: center;
        }

        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #FF4500;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #28a745;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .profile {
            margin: 20px 0;
        }

        /* Profile sidebar */
        .profile-sidebar {
            padding: 20px 0 10px 0;
            background: #fff;
        }

        .profile-userpic img {
            float: none;
            margin: 0 auto;
            width: 50%;
            height: 50%;
            -webkit-border-radius: 50% !important;
            -moz-border-radius: 50% !important;
            border-radius: 50% !important;
        }

        .profile-usertitle {
            text-align: center;
            margin-top: 20px;
        }

        .profile-usertitle-name {
            color: #5a7391;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .profile-usertitle-job {
            text-transform: uppercase;
            color: #5b9bd1;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .profile-userbuttons {
            text-align: center;
            margin-top: 10px;
        }

        .profile-userbuttons .btn {
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 600;
            padding: 6px 15px;
            margin-right: 5px;
        }

        .profile-userbuttons .btn:last-child {
            margin-right: 0px;
        }

        .profile-usermenu {
            margin-top: 30px;
        }

        .profile-usermenu ul li {
            border-bottom: 1px solid #f0f4f7;
        }

        .profile-usermenu ul li:last-child {
            border-bottom: none;
        }

        .profile-usermenu ul li a {
            color: #93a3b5;
            font-size: 14px;
            font-weight: 400;
        }

        .profile-usermenu ul li a i {
            margin-right: 8px;
            font-size: 14px;
        }

        .profile-usermenu ul li a:hover {
            background-color: #fafcfd;
            color: #5b9bd1;
        }

        .profile-usermenu ul li.active {
            border-bottom: none;
        }

        .profile-usermenu ul li.active a {
            color: #5b9bd1;
            background-color: #f6f9fb;
            border-left: 2px solid #5b9bd1;
            margin-left: -2px;
        }

        /* Profile Content */
        .profile-content {
            padding: 20px;
            background: #fff;
            min-height: 460px;
        }
    </style>
</head>

<?php if($this->session->userdata('masuk')==TRUE):?>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed loading1">
    <div class="bg1"></div>
    <div class="bg1 bg2"></div>
    <div class="bg1 bg3"></div>
    <div class="loading2">
        <img id="loading-image" src="<?php echo base_url() . 'assets/image/tenor.gif?t='.time() ?>" alt="Loading..." />
    </div>
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
            </ul>
            <li class="nav-item d-none d-sm-inline-block text-success">
                <h4><b>SMA Negeri 3 Pontianak</b></h4>
            </li>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu shine-me">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <?php if($this->session->userdata('akses')=='0' || $this->session->userdata('akses')=='1'):?>
                        <img src="<?php echo base_url('assets/image/admin2.png') ?>"
                            class="user-image img-circle elevation-2" alt="User Image">
                        <?php else:?>
                        <img src="<?php echo base_url('assets/image/foto_profil/'.$this->session->userdata('ses_foto')) ?>"
                            class="user-image img-circle elevation-2" alt="User Image">
                        <?php endif;?>
                        <span class="d-none d-md-inline"><?php echo $this->session->userdata('ses_id').' ' ?><i
                                class="fas fa-caret-down"></i></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <?php if($this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'):?>
                        <?php if (!empty($nav)) : foreach ($nav as $row) : ?>
                        <li class="user-header bg-success shine-me">
                            <img src="<?php echo base_url('assets/image/foto_profil/'.$row['foto_profil']) ?>"
                                class="img-circle elevation-2" alt="User Image">
                            <p>
                                <?php echo $row['nama_lengkap']; ?>
                                <small><?php if (!empty($row['angkatan'])) {echo 'Alumni Tahun Kelulusan: '.$row['angkatan'];}else{echo 'Siswa Aktif';} ?></small>
                            </p>
                        </li>
                        <?php endforeach;?>
                        <?php endif; ?>
                        <?php else:?>
                        <li class="user-header bg-gradient-gray-dark shine-me">
                            <img src="<?php echo base_url(); ?>/assets/image/gambar_web/logoSmanta.png?t=<?php echo time();?>"
                                class=" img-circle img-bordered" alt="User Image">
                            <a href="<?php if($this->uri->uri_string() == 'Admin/alumniBaru') { echo '#';}else{echo base_url().'Admin/alumniBaru';}?>" class="btn bg-gradient-cyan">Tambah Akun</a>
                        </li>
                        <?php endif;?>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <?php if ($this->session->userdata('akses') != '2' && $this->session->userdata('akses')!='3') : ?>
                            <button data-target="#loginModal" name="detil"
                                data-id="<?php echo $this->session->userdata('ses_id')?>" data-toggle="modal"
                                class="btn btn-flat btn-outline-danger zoomPilih" href="#loginModal"
                                value="<?php echo $this->session->userdata('ses_id').' ' ?>"><i class="fas fa-lock"></i>
                                Ubah Password</button>
                            <?php elseif ($this->session->userdata('akses') == '2' || $this->session->userdata('akses')=='3'):?>
                            <a href="<?php echo base_url(); ?>page/toProfile"
                                class="btn btn-flat btn-outline-primary zoomPilih"><i class="fas fa-id-card"></i>
                                Profile</a>
                            <?php endif;?>
                            <a href="#" class="btn btn-flat btn-outline-danger float-right zoomPilih"
                                data-toggle="modal" data-target="#myModal"><i class="fas fa-sign-out-alt"></i> Sign
                                out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-success elevation-4">
            <!-- Brand Logo -->
            <a href="<?php echo base_url(); ?>page" class="brand-link">
                <img src="<?php echo base_url(); ?>/assets/image/gambar_web/logoSmanta.png?t=<?php echo time();?>"
                    alt="AdminLTE Logo" class="brand-image mt-1">
                <span class="brand-text font-weight-light">
                    <h3 style="color:#28a730">PA<b style="color:#28a745">SMANTA</b>P</h3>
                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item noHover" style="margin : 5% 0 5% 0;">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt text-success"></i>
                                <p class="text">
                                    <?php date_default_timezone_set("Asia/Bangkok"); echo date('Y-m-d');?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php if($this->uri->uri_string() == 'page') { echo '#';}else{echo base_url().'page';}?>" class="nav-link  <?php if($this->uri->uri_string() == 'page') { echo 'active';}?>">
                                <i class="nav-icon fas fa-laptop-house"></i>
                                <p>
                                    DASHBOARD</p>
                            </a>
                        </li>
                        <?php
                            $page = basename($this->uri->uri_string());
                        ?>
                        <li class="nav-item has-treeview <?php if($this->uri->uri_string() == 'Lowongan/toEditLowongan/'.$page || $this->uri->uri_string() == 'Lowongan/toEditLowongan/'.$page || $this->uri->uri_string() == 'Lowongan/toEditLowongan' || $this->uri->uri_string() == 'Lowongan/toLowongan' || $this->uri->uri_string() == 'Lowongan/toLowongan2' || $this->uri->uri_string() == 'Broadcast/toBroadcast' || $this->uri->uri_string() == 'page/alumni' || $this->uri->uri_string() == 'page/siswa') { echo 'menu-open';}?>">
                        <?php if($this->uri->uri_string() == 'page/toProfilebyOther/'.$page || $this->uri->uri_string() == 'Lowongan/toEditLowongan/'.$page || $this->uri->uri_string() == 'Admin/toAdmin' || $this->uri->uri_string() == 'Admin/alumniBaru' || $this->uri->uri_string() == 'page/toProfile' || $this->uri->uri_string() == 'Page/toKontak' || $this->uri->uri_string() == 'Page/toPrestasi' || $this->uri->uri_string() == 'page/toProfilebyOther' || $this->uri->uri_string() == 'page/notFound' || $this->uri->uri_string() == 'Lowongan/toEditLowongan' || $this->uri->uri_string() == 'Lowongan/toLowongan' || $this->uri->uri_string() == 'Lowongan/toLowongan2' || $this->uri->uri_string() == 'Broadcast/toBroadcast' || $this->uri->uri_string() == 'page/alumni' || $this->uri->uri_string() == 'page/siswa') :?>
                            <a href="#" class="nav-link  <?php if($this->uri->uri_string() == 'Lowongan/toEditLowongan/'.$page || $this->uri->uri_string() == 'Lowongan/toEditLowongan' || $this->uri->uri_string() == 'Lowongan/toLowongan' || $this->uri->uri_string() == 'Lowongan/toLowongan2' || $this->uri->uri_string() == 'Broadcast/toBroadcast' || $this->uri->uri_string() == 'page/alumni') { echo 'active';}?>">
                                <i class="nav-icon fa fa-info-circle"></i>
                                <p>
                                    MENU UTAMA
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item zoomPilih">
                                    <a class="nav-link <?php if($this->uri->uri_string() == 'Broadcast/toBroadcast') { echo 'active';}?>" href="<?php if($this->uri->uri_string() == 'Broadcast/toBroadcast') { echo '#';}else{echo base_url().'Broadcast/toBroadcast';}?>" title="Halaman Broadcast"><i
                                            class="nav-icon fas fa-bullhorn" aria-hidden="true"></i>
                                        <p>Broadcast<span id="masuk" class="right badge badge-info"
                                                hidden>Inputing...</span></p>
                                    </a>
                                </li>
                                <li class="nav-item zoomPilih">
                                    <a class="nav-link <?php if($this->uri->uri_string() == 'Lowongan/toEditLowongan/'.$page || $this->uri->uri_string() == 'Lowongan/toEditLowongan' || $this->uri->uri_string() == 'Lowongan/toLowongan' || $this->uri->uri_string() == 'Lowongan/toLowongan2') { echo 'active';}?>" href="<?php if ($this->session->userdata('akses') != 2 && $this->session->userdata('akses')!='3'){
                                                    if($this->uri->uri_string() == 'Lowongan/toLowongan2') { echo '#';}
                                                    else {echo base_url().'Lowongan/toLowongan2';}
                                                }
                                                else {
                                                    if($this->uri->uri_string() == 'Lowongan/toLowongan') { echo '#';}
                                                    else{echo base_url().'Lowongan/toLowongan';}
                                                }?>" title="Halaman Lowongan Pekerjaan"><i
                                            class="nav-icon fab fa-stack-overflow" aria-hidden="true"></i>
                                            <?php if($this->uri->uri_string() == 'Lowongan/toEditLowongan/'.$page || $this->uri->uri_string() == 'Lowongan/toEditLowongan') :?>
                                            <p>Edit Lowongan<span id="masuk2" class="right badge badge-info"
                                                hidden>Inputing...</span></p>
                                            <?php else :?>
                                                <p>Lowongan Pekerjaan <span id="masuk2" class="right badge badge-info"
                                                hidden>Inputing...</span></p>
                                            <?php endif;?>
                                    </a>
                                </li>
                                <li class="nav-item zoomPilih">
                                    <a class="nav-link <?php if($this->uri->uri_string() == 'page/alumni') { echo 'active';}?>" href="<?php if($this->uri->uri_string() == 'page/alumni') { echo '#';}else{echo base_url().'page/alumni';}?>"
                                        title="Halaman Data Almuni"><i class=" nav-icon fas fa-id-card"
                                            aria-hidden="true"></i>
                                            <span id="masuk3" class="right badge badge-info" hidden>Searching...</span></p>
                                        <p>Data Alumni</p>
                                    </a>
                                </li>
                                <?php if ($this->session->userdata('akses') != '2' && $this->session->userdata('akses')!='3') : ?>
                                <li class="nav-item zoomPilih">
                                    <a class="nav-link <?php if($this->uri->uri_string() == 'page/siswa') { echo 'active';}?>" href="<?php if($this->uri->uri_string() == 'page/siswa') { echo '#';}else{echo base_url().'page/siswa';}?>"
                                        title="Halaman Data Almuni"><i class="nav-icon far fa-address-card" aria-hidden="true"></i>
                                            <span id="masuk4" class="right badge badge-info" hidden>Searching...</span></p>
                                        <p>Data Siswa</p>
                                    </a>
                                </li>
                                <?php endif;?>
                            </ul>
                        </li>
                        <br>
                        <?php endif;?>
                        <li class="nav-item has-treeview <?php if($this->uri->uri_string() == 'page/toProfilebyOther/'.$page || $this->uri->uri_string() == 'page/toProfile' || $this->uri->uri_string() == 'page/toProfilebyOther' || $this->uri->uri_string() == 'Page/toKontak' || $this->uri->uri_string() == 'Admin/toAdmin' || $this->uri->uri_string() == 'Page/toPrestasi') { echo 'menu-open';}?>">
                            <a href="#" class="nav-link <?php if($this->uri->uri_string() == 'page/toProfilebyOther/'.$page || $this->uri->uri_string() == 'page/toProfile' || $this->uri->uri_string() == 'page/toProfilebyOther' || $this->uri->uri_string() == 'Page/toKontak' || $this->uri->uri_string() == 'Admin/toAdmin' || $this->uri->uri_string() == 'Page/toPrestasi') { echo 'active';}?>">
                                <i class="nav-icon fa fa-info-circle"></i>
                                <p>
                                    INFO PROFIL
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <?php if($this->session->userdata('akses')=='0'):?>
                                <li class="nav-item  <?php if($this->uri->uri_string() != 'Admin/toAdmin') { echo 'zoomPilih';}?>">
                                    <a href="<?php if($this->uri->uri_string() == 'Admin/toAdmin') { echo '#';}else{echo base_url().'Admin/toAdmin';}?>" class="nav-link <?php if($this->uri->uri_string() == 'Admin/toAdmin') { echo 'active';}?>">
                                        <i class="nav-icon fa fa-user"></i>
                                        <p>
                                            Kelola Admin
                                            <span class="right badge badge-success">GAS!</span>
                                        </p>
                                    </a>
                                </li>
                                <?php endif;?>
                                <?php if($this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'):?>
                                <li class="nav-item <?php if($this->uri->uri_string() != 'page/toProfile') { echo 'zoomPilih';}?>">
                                    <a href="<?php if($this->uri->uri_string() == 'page/toProfile') { echo '#';}else{echo base_url().'page/toProfile';}?>" class="nav-link <?php if($this->uri->uri_string() == 'page/toProfilebyOther/'.$page || $this->uri->uri_string() == 'page/toProfile' || $this->uri->uri_string() == 'page/toProfilebyOther') { echo 'active';}?>">
                                        <i class="nav-icon fa fa-user"></i>
                                        <p>
                                            Profil
                                            <?php if ($this->uri->uri_string() == 'page/toProfile') : ?>
                                            <span class="right badge badge-danger">HAI!</span>
                                            <?php elseif ($this->uri->uri_string() == 'page/toProfilebyOther/'.$page || $this->uri->uri_string() == 'page/toProfilebyOther'):?>
                                            <span class="right badge badge-danger">Kepo Deh!</span>
                                            <?php else : ?>
                                            <span class="right badge badge-success">GAS!</span>
                                            <?php endif;?>
                                        </p>
                                    </a>
                                </li>
                                <?php endif;?>
                                <li class="nav-item <?php if($this->uri->uri_string() != 'Page/toPrestasi') { echo 'zoomPilih';}?>">
                                    <a href="<?php if($this->uri->uri_string() == 'Page/toPrestasi') { echo '#';}else{echo base_url().'Page/toPrestasi';}?>" class="nav-link <?php if($this->uri->uri_string() == 'Page/toPrestasi') { echo 'active';}?>">
                                        <i class="nav-icon fas fa-user-graduate"></i>
                                        <p> <span class="badge badge-primary">Alumni Berprestasi!</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($this->uri->uri_string() != 'Page/toKontak') { echo 'zoomPilih';}?>">
                                    <a href="<?php if($this->uri->uri_string() == 'Page/toKontak') { echo '#';}else{echo base_url().'Page/toKontak';}?>" class="nav-link <?php if($this->uri->uri_string() == 'Page/toKontak') { echo 'active';}?>">
                                        <i class="nav-icon fas fa-users-cog"></i>
                                        <p> Kontak Admin <span class="right badge badge-warning">Lihat!</span>
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php if ($this->session->userdata('akses') != '2' && $this->session->userdata('akses')!='3') : ?>
                        <li class="nav-item">
                            <a href="<?php if($this->uri->uri_string() == 'Admin/alumniBaru') { echo '#';}else{echo base_url().'Admin/alumniBaru';}?>" class="nav-link  <?php if($this->uri->uri_string() == 'Admin/alumniBaru') { echo 'active';}?>">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>Tambah Akun</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item noHover"
                            style="<?php if($this->session->userdata('akses')=='1') {echo 'margin : 60% 0 0 0';} else {echo 'margin : 40% 0 0 0';} ?>">
                            <a href="#" class="nav-link shine-me">
                                <i class="nav-icon fas fa-laptop-code text-danger"></i>
                                <p class="text text-warning ">Beta Version</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
<?php endif; ?>