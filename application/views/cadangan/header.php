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
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/fontawesome-free/css/all.min.css?t=<?php echo time();?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/dist/css/adminlte.min.css?t=<?php echo time();?>">
     <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/sweetalert2/sweetalert2.min.css?t=<?php echo time();?>">
    <!-- Toastr -->
    <link rel="stylesheet" hhref="<?php echo base_url(); ?>/assets/adminLte/plugins/toastr/toastr.min.css?t=<?php echo time();?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css?t=<?php echo time();?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css?t=<?php echo time();?>">
    
    <!-- Awal, Login,  -->
    <?php if($this->uri->uri_string() != 'login/toLogin' && $this->uri->uri_string() != 'login/toRegister' && $this->uri->uri_string() != 'page' && ($this->uri->uri_string() == 'Broadcast/toBroadcast' && $this->session->userdata('akses')!='2')) : ?>
        <!-- Bootstrap Color Picker -->
        <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css?t=<?php echo time();?>"> -->
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css?t=<?php echo time();?>">
        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/select2/css/select2.min.css?t=<?php echo time();?>">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css?t=<?php echo time();?>">
        <!-- Bootstrap4 Duallistbox -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css?t=<?php echo time();?>">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css?t=<?php echo time();?>">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css?t=<?php echo time();?>">
        <!-- JQVMap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/jqvmap/jqvmap.min.css?t=<?php echo time();?>">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/daterangepicker/daterangepicker.css?t=<?php echo time();?>">
    <?php endif; ?>

    <?php if($this->uri->uri_string() == 'Lowongan/toLowongan' || $this->uri->uri_string() == 'Lowongan/toLowongan2' || ($this->uri->uri_string() == 'Broadcast/toBroadcast' && $this->session->userdata('akses')!='2')) : ?>
        <!-- daterange picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/daterangepicker/daterangepicker.css?t=<?php echo time();?>">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css?t=<?php echo time();?>">
    <?php endif; ?>

    <!-- pagination -->
    <?php if($this->uri->uri_string() == 'page/alumni' || $this->uri->uri_string() == 'Broadcast/toBroadcast' || $this->uri->uri_string() == 'Lowongan/toLowongan' || $this->uri->uri_string() == 'Lowongan/toLowongan2') : ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bootstrap/css/pagination.css?t=<?php echo time();?>">
    <?php endif; ?>
    
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="<?php echo base_url(); ?>/assets/bootstrap/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <?php if($this->uri->uri_string() == 'Lowongan/toLowongan' || $this->uri->uri_string() == 'Lowongan/toLowongan2' || $this->uri->uri_string() == 'Lowongan/toEditLowongan' || $this->uri->uri_string() == 'Lowongan/toEditLowongan/'.$this->uri->segment(3) || ($this->uri->uri_string() == 'Broadcast/toBroadcast' && $this->session->userdata('akses')!='2')) : ?>
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

        /* penggunaan media query pada default monitor layout */
        @media only screen and (min-width: 996px) {

        }
        #img_hover:hover {
        transform: scale(1.25);
    }

    .table td,
    th {
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