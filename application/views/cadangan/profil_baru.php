<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
        integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
        integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <style type="text/css">
        #loader {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.75) url('<?php echo base_url(); ?>/assets/image/tenor.gif?t=<?php echo time();?>') no-repeat center center;
            z-index: 10000;
        }
    </style>
</head>
<div id="loader"></div>

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed loading1">
    <div class="loading2">
        <img id="loading-image" src="<?php echo base_url() . 'assets/image/tenor.gif?t='.time() ?>" alt="Loading..." />
    </div>
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
            </ul>
            <li class="nav-item d-none d-sm-inline-block text-success">
                <h4><b>SMA Negeri 3 Pontianak</b></h4>
            </li>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                <li class="nav-item dropdown user-menu shine-me">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <?php if($this->session->userdata('akses')=='0' || $this->session->userdata('akses')=='1'):?>
                        <img src="<?php echo base_url('assets/image/admin2.png') ?>"
                            class="user-image img-circle elevation-2" alt="User Image">
                        <?php else:?>
                        <img id="img2"
                            src="<?php echo base_url('assets/image/foto_profil/'.$this->session->userdata('ses_foto')).'?t='.time(); ?>"
                            class="user-image img-circle elevation-2" alt="User Image">
                        <?php endif;?>
                        <span class="d-none d-md-inline"><?php echo $this->session->userdata('ses_id').' ' ?><i
                                class="fas fa-caret-down"></i></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <?php if (!empty($information)) : foreach ($information as $row) : ?>
                        <?php if($this->session->userdata('akses')=='2'):?>
                        <li class="user-header bg-success shine-me">
                            <img src="<?php echo base_url('assets/image/foto_profil/'.$row['foto_profil']).'?t='.time(); ?>"
                                class="img-circle elevation-2" alt="User Image">
                            <?php endif;?>
                            <p>
                                <?php echo $row['nama_lengkap']; ?>
                                <small>Tahun Kelulusan <?php echo $row['angkatan']; ?></small>
                            </p>
                        </li>
                        <?php endforeach;else : ?>
                        <?php endif; ?>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <?php if ($this->session->userdata('akses') == '0') : ?>
                            <a href="<?php echo base_url(); ?>index.php/Admin/toAdmin"
                                class="btn btn-primary btn-flat">Edit Admin</a>
                            <?php elseif ($this->session->userdata('akses') == '2'):?>
                            <a href="<?php echo base_url(); ?>index.php/page/toProfile"
                                class="btn btn-flat btn-outline-primary zoomPilih"><i class="fas fa-id-card"></i>
                                Profile</a>
                            <?php endif;?>
                            <a href="#" class="btn btn-flat btn-outline-danger float-right zoomPilih"
                                data-toggle="modal" data-target="#myModal"><i class="fas fa-sign-out-alt"></i> Sign
                                out</a>
                        </li>
                    </ul>
                </li>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-success elevation-4">
            <!-- Brand Logo -->
            <a href="<?php echo base_url(); ?>index.php/page" class="brand-link">
                <img src="<?php echo base_url(); ?>/assets/image/gambar_web/sma3.png?t=<?php echo time();?>"
                    alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
                        <li class="nav-item noHover" style="margin : 5% 0 10% 0;">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt text-success"></i>
                                <p class="text"><?php echo date("d-M-Y",time());?></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-info-circle"></i>
                                <p>
                                    MENU UTAMA
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url() ?>index.php/Broadcast/toBroadcast"
                                        title="Halaman Broadcast"><i class="nav-icon fas fa-bullhorn"
                                            aria-hidden="true"></i>
                                        <p>Broadcast <span id="masuk" class="right badge badge-info"
                                                hidden>Inputing...</span></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php if ($this->session->userdata('akses') != 2){
                                                    echo base_url().'index.php/Lowongan/toLowongan2';
                                                }
                                                else {
                                                    echo base_url().'index.php/Lowongan/toLowongan';
                                                }?>" title="Halaman Lowongan Pekerjaan"><i
                                            class="nav-icon fab fa-stack-overflow" aria-hidden="true"></i>
                                        <p>Lowongan Pekerjaan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/page/alumni"
                                        title="Halaman Data Almuni"><i class=" nav-icon fas fa-id-card"
                                            aria-hidden="true"></i>
                                        <p>Data Alumni</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <br>
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fa fa-info-circle"></i>
                                <p>
                                    INFO PROFIL
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <?php if($this->session->userdata('akses')=='0'):?>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>index.php/Admin/toAdmin" class="nav-link">
                                        <i class="nav-icon fa fa-user"></i>
                                        <p>
                                            Kelola Admin
                                            <span class="right badge badge-success">GAS!</span>
                                        </p>
                                    </a>
                                </li>
                                <?php endif;?>
                                <?php if($this->session->userdata('akses')=='2'):?>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>index.php/page/toProfile" class="nav-link active">
                                        <i class="nav-icon fa fa-user"></i>
                                        <p>
                                            Profil Saya
                                            <span class="right badge badge-danger">HAI!</span>
                                        </p>
                                    </a>
                                </li>
                                <?php endif;?>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>index.php/Page/toKontak" class="nav-link">
                                        <i class="nav-icon fas fa-users-cog"></i>
                                        <p> Kontak Admin <span class="right badge badge-warning">Lihat!</span>
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item noHover"
                            style="<?php if($this->session->userdata('akses')=='1') {echo 'margin : 65% 0 0 0';} else {echo 'margin : 40% 0 0 0';}?>">
                            <a href="#" class="nav-link shine-me">
                                <i class="nav-icon fas fa-laptop-code text-danger"></i>
                                <p class="text text-warning">Beta Version</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <?php if (!empty($information)) : foreach ($information as $list) : ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Terakhir Diubah</li>
                                <li class="breadcrumb-item active"><?php echo $list['latest']; ?></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img id="img" class="img-fluid img-circle img-thumbnail klikImg"
                                            src="<?php echo base_url('assets/image/foto_profil/'.$list['foto_profil']) ?>?t=<?php echo time();?>"
                                            alt="User profile picture">
                                    </div>
                                    <!-- <a href="#" class="btn btn-primary btn-block"><b>Ubah Foto</b></a> -->
                                    <h3 class="profile-username text-center"><?php echo $list['nama_lengkap']; ?></h3>

                                    <p class="text-muted text-center"><?php if(!empty($list['keterangan'])){
                                                                            echo $list['keterangan'];
                                                                        }
                                                                        else {
                                                                            echo 'Belum Diatur Bos, jadi tidak tahu status keterangannya apa sekarang';
                                                                        }; ?></p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Username</b> <a class="float-right"><?php echo $list['username']; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Kelulusan</b> <a class="float-right"><?php echo $list['angkatan']; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Agama</b> <a class="float-right"><?php echo $list['agama']; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Status</b> <a class="float-right"><?php if(!empty($list['status'])){
                                                                                    echo $list['status'];
                                                                                }
                                                                                else {
                                                                                    echo 'Belum Diatur';
                                                                                }; ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li id="link1" class="nav-item"><a class="nav-link active" href="#settings"
                                                data-toggle="tab">Info Pribadi</a></li>
                                        <li id="link2" class="nav-item"><a class="nav-link" href="#timeline"
                                                data-toggle="tab">Info Sosial Media/Kontak</a></li>
                                        <?php if($this->session->userdata('ses_id') == $list['username'] ):?>
                                        <li id="link3" class="nav-item"><a class="nav-link" href="#activity"
                                                data-toggle="tab">Ubah Password</a></li>
                                        <?php endif;?>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane" id="activity">
                                            <!-- Post -->
                                            <div class="card card-info">
                                                <div class="card-header bg-danger">
                                                    <h3 class="card-title">Ganti Password</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <!-- form start -->
                                                <form class="form-horizontal"
                                                    action="<?php echo base_url() ?>index.php/Profil/updPassword"
                                                    method="post" id="form_password" enctype="multipart/form-data">
                                                    <div class="card-body">
                                                        <div class="form-group row" hidden>
                                                            <label for="nisPass"
                                                                class="col-sm-4 col-form-label"></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" id="nisPass" class="form-control"
                                                                    name="nisPass"
                                                                    value="<?php echo $list['username']; ?>"
                                                                    title="enter your password.">
                                                            </div>
                                                        </div>
                                                        <?php echo $this->session->flashdata('msg');?>
                                                        <div class="form-group row">
                                                            <label for="inputpassswordLama"
                                                                class="col-sm-4 col-form-label">Password Lama</label>
                                                            <div class="col-sm-8">
                                                                <input type="password" id="inputpassswordLama"
                                                                    class="form-control" name="inputpasswordLama"
                                                                    placeholder="" title="enter your password.">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputpassswordBaru"
                                                                class="col-sm-4 col-form-label">Password Baru</label>
                                                            <div class="col-sm-8">
                                                                <input type="password" id="inputpassswordBaru"
                                                                    class="form-control" name="inputpasswordBaru"
                                                                    placeholder="" title="enter your new password.">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputpassswordKonfirmasi"
                                                                class="col-sm-4 col-form-label">Konfirmasi
                                                                Password</label>
                                                            <div class="col-sm-8">
                                                                <input type="password" id="inputpasswordKonfirmasi"
                                                                    class="form-control" name="inputpasswordKonfirmasi"
                                                                    placeholder="" title="enter your confirm password.">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                    <div class="card-footer">
                                                        <button type="submit" id="ganti"
                                                            class="btn btn-danger zoomPilih effect01 hitam"><i
                                                                class="fas fa-key"></i> <b>Submit</b></button>
                                                        <button type="reset" id="tidakganti"
                                                            class="btn btn-info float-right zoomPilih effect01"><i
                                                                class='fas fa-times'></i>
                                                            <span><b>Batal</b></span></button>
                                                    </div>
                                                    <!-- /.card-footer -->
                                                </form>
                                            </div>
                                            <!-- /.post -->
                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="timeline">
                                            <!-- The timeline -->
                                            <div class="timeline timeline-inverse">
                                                <!-- timeline time label -->
                                                <div class="card card-solid">
                                                    <!-- form start -->
                                                    <form class="form-horizontal"
                                                        action="<?php echo base_url() ?>index.php/Profil/updSosmed"
                                                        method="post" id="form_password2" name="form_password2"
                                                        enctype="multipart/form-data">
                                                        <?php if($this->session->userdata('ses_id') == $list['username'] ):?>
                                                        <div class="card-header text-sm">
                                                            <button id="Update2"
                                                                class="btn btn-lg btn-primary zoomPilih effect01"
                                                                type="button"><i class="fas fa-pen-square"></i><span>
                                                                    Update</span></button>
                                                            <button id="reset2"
                                                                class="btn btn-dark btn-lg zoomPilih effect01"
                                                                type="reset" hidden><i
                                                                    class="glyphicon glyphicon-repeat"></i>
                                                                <span> Reset</span></button>
                                                            <button id="save2"
                                                                class="btn btn-lg btn-success zoomPilih effect01"
                                                                type="submit" hidden><i class="fas fa-save"></i>
                                                                <span> Save</span></button>
                                                        </div>
                                                        <?php endif;?>
                                                        <div id="sosialTampil" class="card-body pb-0">
                                                            <div class="row d-flex align-items-stretch">
                                                                <div class="col-md-6 d-flex align-items-stretch">
                                                                    <div class="card bg-light">
                                                                        <div
                                                                            class="card-header text-muted border-bottom-0">
                                                                            Whatsapp
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <div class="row">
                                                                                <div class="col-7">
                                                                                    <h5 class="text-success"><b><?php if(!empty($list['whatsapp'])){
                                                                                    echo $list['whatsapp'];
                                                                                }
                                                                                else {
                                                                                    echo 'Belum Diatur';
                                                                                }; ?></b>
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="col-5 text-center">
                                                                                    <img src="<?php echo base_url(); ?>/assets/image/sosial/wa1.png?t=<?php echo time();?>"
                                                                                        alt=""
                                                                                        class="img-circle img-fluid">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 d-flex align-items-stretch">
                                                                    <div class="card bg-light">
                                                                        <div
                                                                            class="card-header text-muted border-bottom-0">
                                                                            Instagram
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <div class="row">
                                                                                <div class="col-7">
                                                                                    <h5 class="text-danger"><b><?php if(!empty($list['instagram'])){
                                                                                    echo $list['instagram'];
                                                                                }
                                                                                else {
                                                                                    echo 'Belum Diatur';
                                                                                }; ?></b>
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="col-5 text-center">
                                                                                    <img src="<?php echo base_url(); ?>/assets/image/sosial/ig.png?t=<?php echo time();?>"
                                                                                        alt=""
                                                                                        class="img-circle img-fluid">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 d-flex align-items-stretch">
                                                                    <div class="card bg-light">
                                                                        <div
                                                                            class="card-header text-muted border-bottom-0">
                                                                            Twitter
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <div class="row">
                                                                                <div class="col-7">
                                                                                    <h5 class="text-info"><b><?php if(!empty($list['twitter'])){
                                                                                    echo $list['twitter'];
                                                                                }
                                                                                else {
                                                                                    echo 'Belum Diatur';
                                                                                }; ?></b>
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="col-5 text-center">
                                                                                    <img src="<?php echo base_url(); ?>/assets/image/sosial/twitter.png?t=<?php echo time();?>"
                                                                                        alt=""
                                                                                        class="img-circle img-fluid">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 d-flex align-items-stretch">
                                                                    <div class="card bg-light">
                                                                        <div
                                                                            class="card-header text-muted border-bottom-0">
                                                                            Line
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <div class="row">
                                                                                <div class="col-7">
                                                                                    <h5 class="text-success"><b><?php if(!empty($list['line'])){
                                                                                    echo $list['line'];
                                                                                }
                                                                                else {
                                                                                    echo 'Belum Diatur';
                                                                                }; ?></b>
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="col-5 text-center">
                                                                                    <img src="<?php echo base_url(); ?>/assets/image/sosial/line.png?t=<?php echo time();?>"
                                                                                        alt=""
                                                                                        class="img-circle img-fluid">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->

                                                <div id="sosialEdit" class="card card-info" hidden>
                                                    <div class="card-header bg-info">
                                                        <h3 class="card-title">Update Sosial Media</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group row" hidden>
                                                            <label for="nisPass2"
                                                                class="col-sm-4 col-form-label"></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" id="nisPass2" class="form-control"
                                                                    name="nisPass2"
                                                                    value="<?php echo $list['username']; ?>"
                                                                    title="enter your password.">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" hidden>
                                                            <label for="passLama2"
                                                                class="col-sm-4 col-form-label"></label>
                                                            <div class="col-sm-8">
                                                                <input type="password" id="passLama2"
                                                                    class="form-control" name="passwordLama2"
                                                                    value="<?php echo $list['pass']; ?>"
                                                                    title="enter your password.">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row bg-success">
                                                            <label for="wa"
                                                                class="col-sm-5 col-form-label">Whatsapp</label>
                                                            <div class="col-sm-12">
                                                                <label id="old_wa"
                                                                    hidden><?php echo $list['whatsapp']; ?></label>
                                                                <input type="text" class="form-control noSpace noLetter"
                                                                    name="wa" id="wa"
                                                                    placeholder="Nomor Whatsapp, Contoh : 08xxxxxxxxx"
                                                                    value="<?php echo $list['whatsapp']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row bg-danger">
                                                            <label for="ig"
                                                                class="col-sm-5 col-form-label">Instagram</label>
                                                            <div class="col-sm-12">
                                                                <label id="old_ig"
                                                                    hidden><?php echo $list['instagram']; ?></label>
                                                                <input type="text" class="form-control noSpace"
                                                                    name="ig" id="ig" placeholder="id Instagram"
                                                                    value="<?php echo $list['instagram']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row bg-info">
                                                            <label for="twitter"
                                                                class="col-sm-5 col-form-label">Twitter</label>
                                                            <div class="col-sm-12">
                                                                <label id="old_twitter"
                                                                    hidden><?php echo $list['twitter']; ?></label>
                                                                <input type="text" class="form-control noSpace"
                                                                    name="twitter" id="twitter" placeholder="id twitter"
                                                                    value="<?php echo $list['twitter']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row bg-success">
                                                            <label for="line"
                                                                class="col-sm-5 col-form-label">Line</label>
                                                            <div class="col-sm-12">
                                                                <label id="old_line"
                                                                    hidden><?php echo $list['line']; ?></label>
                                                                <input type="text" class="form-control noSpace"
                                                                    name="line" id="line" placeholder="id Line"
                                                                    value="<?php echo $list['line']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputpasswordKonfirmasi2"
                                                                class="col-sm-4 col-form-label">Password</label>
                                                            <div class="col-sm-8">
                                                                <input type="password" id="inputpasswordKonfirmasi2"
                                                                    class="form-control" name="inputpasswordKonfirmasi2"
                                                                    placeholder="" title="enter your confirm password.">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->

                                        <div class="active tab-pane" id="settings">
                                            <!-- Post -->
                                            <div class="card card-info">
                                                <!-- /.card-header -->
                                                <!-- form start -->
                                                <?php echo form_open('Profil/updProfil', array('id' => 'form_profil', 'role' => 'form','enctype' => 'multipart/form-data'));?>
                                                <?php if($this->session->userdata('ses_id') == $list['username'] ):?>
                                                <div class="card-header text-sm" id="bottom">
                                                    <button name="Update" onclick="enable_disable()"
                                                        class="btn btn-lg btn-primary zoomPilih tombolUpdate effect01"
                                                        type="button"><i class="fas fa-pen-square"></i><span>
                                                            Update</span></button>
                                                    <button name="reset"
                                                        class="btn btn-lg btn-dark zoomPilih tombolReset effect01"
                                                        type="reset" hidden>
                                                        <span> Reset</span></button>
                                                    <button
                                                        class="btn btn-lg btn-success zoomPilih tombolSimpan effect01"
                                                        type="submit" hidden><i class="fas fa-save"></i>
                                                        <span> Save</span></button>
                                                </div>
                                                <?php endif;?>
                                                <div class="form-group pl-4 pt-4" id="foto" hidden>
                                                    <div class="col-xs-12">
                                                        <label>Ubah foto Profil
                                                        </label>
                                                        <div style="position:relative;">
                                                            <input type="file" name="profilePic" id="profilePic"
                                                                accept="image/*" onchange="previewImage();" hidden>
                                                            <!-- style="input[type='file'] {opacity:0};" -->
                                                            <span id='val'></span>
                                                        </div>
                                                        <br>
                                                        <div>
                                                            <span id="tombol" class="btn btn-lg btn-success effect01"><i
                                                                    class="text-sm fas fa-plus"></i> <i
                                                                    class="fas fa-file-image"></i></span>
                                                            <span id="tombol2" class="btn btn-lg btn-warning effect01"
                                                                hidden><span>Batal</span></span>
                                                            <?php if ($list['foto_profil'] != 'default.jpg' ) :?>
                                                            <span
                                                                class="btn btn-lg btn-danger remove_file effect01 hitam"
                                                                id="button-hapus-foto"
                                                                data-username="<?php echo $this->session->userdata('ses_id') ?>"
                                                                data-id="<?php echo 'assets/image/foto_profil/'.$list['foto_profil']; ?>"
                                                                name="remove_file"><i
                                                                    class="far fa-trash-alt"></i></span>
                                                            <?php endif ?>
                                                        </div>

                                                    </div>
                                                    <div class="print-error-msg 0" style="display:none"></div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="username"
                                                        id="username" placeholder="first name"
                                                        value="<?php echo $list['username']; ?>" hidden disabled>
                                                </div>
                                                <?php echo $this->session->flashdata('msg'); ?>
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="namaLengkap" class="col-sm-5 col-form-label">Nama
                                                            Lengkap</label>
                                                        <div class="input-group col-lg-12">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text border-md border-right-0">
                                                                    <i class="fas fa-id-badge fa-sm text-muted"></i>
                                                                </span>
                                                            </div>
                                                            <label id="old_nama"
                                                                hidden><?php echo $list['nama_lengkap']; ?></label>
                                                            <input type="text"
                                                                class="form-control border-left-0 border-right-0 border-md"
                                                                name="nama" id="namaLengkap" placeholder="Nama Lengkap"
                                                                title="enter your first name if any."
                                                                value="<?php echo $list['nama_lengkap']; ?>" disabled>
                                                            <div class="input-group-prepend">
                                                                <span
                                                                    class="input-group-text border-md border-left-0 logo lo1">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="print-error-msg 1" style="display:none"></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="no_telepon" class="col-sm-5 col-form-label">Nomor
                                                            Telepon</label>
                                                        <div class="input-group col-lg-12">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text border-md border-right-0">
                                                                    <i class="fa fa-phone-square text-muted"></i><span
                                                                        class="right badge badge-danger"
                                                                        id="errmsg"></span>
                                                                </span>
                                                            </div>
                                                            <label id="old_telepon"
                                                                hidden><?php echo $list['no_telepon']; ?></label>
                                                            <input type="text" class="form-control border-left-0 border-right-0 border-md noSpace noLetter"
                                                                name="no_telepon" id="no_telepon"
                                                                placeholder="Masukkan Nomor Telepon Aktif"
                                                                title="Nomor Telepon"
                                                                value="<?php echo $list['no_telepon']; ?>"
                                                                disabled><span class="right badge badge-danger"
                                                                id="errmsg"></span>
                                                            <div class="input-group-prepend">
                                                                <span
                                                                    class="input-group-text border-md border-left-0 logo lo2">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="print-error-msg 2" style="display:none"></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="email" class="col-sm-5 col-form-label">Email</label>
                                                        <div class="input-group col-lg-12">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text border-md border-right-0">
                                                                    <i class="fa fa-envelope fa-sm text-muted"></i>
                                                                </span>
                                                            </div>
                                                            <label id="old_email"
                                                                hidden><?php echo $list['email']; ?></label>
                                                            <input type="email" class="form-control border-left-0 border-right-0 border-md noSpace"
                                                                name="email" id="email"
                                                                placeholder="masukkan Email yang valid" title="Email"
                                                                value="<?php echo $list['email']; ?>" disabled>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text border-md border-left-0 logo lo3">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="print-error-msg 3" style="display:none"></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tanggalLahir"
                                                            class="col-sm-5 col-form-label">Tanggal Lahir</label>
                                                        <div class="input-group col-lg-12">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text border-md border-right-0">
                                                                    <i class="fas fa-calendar-day fa-sm text-muted"></i>
                                                                </span>
                                                            </div>
                                                            <input type="date" class="form-control border-left-0 border-right-0 border-md" name="tanggal_lahir"
                                                                id="tanggalLahir"
                                                                value="<?php echo $list['tanggal_lahir']; ?>" disabled>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text border-md border-left-0 logo lo4">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="print-error-msg 4" style="display:none"></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="dropDown2" class="col-sm-5 col-form-label">Domisili
                                                            (Kota/Kabupaten)</label>
                                                        <div class="input-group col-lg-12">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text border-md border-right-0">
                                                                    <i class="fas fa-city fa-sm text-muted"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" class="form-control border-left-0 border-right-0 border-md" id="kota"
                                                                value="<?php echo $list['kota']; ?>"
                                                                title="Pilih kota domisili anda" disabled>
                                                            <select id="dropDown2" name="kota_sekarang"
                                                                class="form-control border-left-0 border-right-0 border-md"
                                                                style="height:100%" hidden>
                                                                <?php
                                                                foreach ($kota as $row) { ?>
                                                                <option value='<?php echo $row['ID_KOTA']; ?>' <?php
                                                                        if ($list['kota'] == $row['KOTA']) {
                                                                            echo "selected";
                                                                        }
                                                                    ?>>
                                                                    <?php echo $row['KOTA'];?>
                                                                </option>;
                                                                <?php } ?>
                                                            </select>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text border-md border-left-0 logo lo5">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="print-error-msg 5" style="display:none"></div>
                                                    </div>
                                                    <div id="status" class="form-group row" hidden>
                                                        <label for="dropDown3" class="col-sm-5 col-form-label">Status
                                                            Pekerjaan</label>
                                                        <div class="input-group col-lg-12">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text border-md border-right-0">
                                                                    <i class="fas fa-briefcase fa-sm text-muted"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" class="form-control border-left-0 border-right-0 border-md" id="statusInput"
                                                                value="<?php echo $list['status']; ?>"
                                                                title="Pilih Status Anda Saat Ini" disabled>
                                                            <select id="dropDown3" name="status"
                                                                class="form-control border-left-0 border-right-0 border-md" style="height:100%"
                                                                hidden>
                                                                <?php echo "<option disabled selected>Pilih Status Pekerjaan </option>";
                                                                foreach ($status as $row) { ?>
                                                                <option value='<?php echo $row['ID_STATUS']; ?>' <?php
                                                                        if ($list['status'] == $row['STATUS']) {
                                                                            echo "selected";
                                                                        }
                                                                    ?>>
                                                                    <?php echo $row['STATUS']; ?>
                                                                </option>;
                                                                <?php } ?>
                                                            </select>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text border-md border-left-0 logo lo6">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="print-error-msg 6" style="display:none"></div>
                                                    </div>
                                                    <div id="keterangan" class="form-group row" hidden>
                                                        <label for="ketnya" class="col-sm-5 col-form-label">Keterangan
                                                            dari
                                                            Status Pekerjaan</label>
                                                        <div class="input-group col-lg-12">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text border-md border-right-0">
                                                                    <i class="fas fa-envelope-open-text fa-sm text-muted"></i>
                                                                </span>
                                                            </div>
                                                            <label id="old_keterangan"
                                                                hidden><?php echo $list['keterangan']; ?></label>
                                                            <input type="text" class="form-control border-left-0 border-right-0 border-md" name="keterangan"
                                                                id="ketnya"
                                                                placeholder="Contoh = Kuliah di Universitas Brawijaya atau CEO di Google.com"
                                                                value="<?php echo $list['keterangan']; ?>"
                                                                title="Masukkan Keterangan dari Status Anda!" disabled>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text border-md border-left-0 logo lo7">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="print-error-msg 7" style="display:none"></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="input6" class="col-sm-5 col-form-label">Alamat
                                                            Asal</label>
                                                        <div class="input-group col-lg-12">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text border-md border-right-0">
                                                                    <i class="fas fa-address-card fa-sm text-muted"></i>
                                                                </span>
                                                            </div>
                                                            <label id="old_address"
                                                                hidden><?php echo $list['alamat_asal']; ?></label>
                                                            <input type="text" class="form-control border-left-0 border-right-0 border-md" name="alamat_asal"
                                                                id="input6"
                                                                placeholder="Contoh = Jl. Budi Utomo Komplek Taman Anggrek Blog G.17"
                                                                value="<?php echo $list['alamat_asal']; ?>"
                                                                title="Masukkan Alamat Asal." disabled>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text border-md border-left-0 logo lo8">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="print-error-msg 8" style="display:none"></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="input7" class="col-sm-5 col-form-label">Alamat
                                                            Domisili</label>
                                                        <div class="input-group col-lg-12">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text border-md border-right-0">
                                                                    <i class="far fa-address-card fa-sm text-muted"></i>
                                                                </span>
                                                            </div>
                                                            <label id="old_address2"
                                                                hidden><?php echo $list['alamat_sekarang']; ?></label>
                                                            <input type="text" id="input7" class="form-control border-left-0 border-right-0 border-md"
                                                                name="alamat_sekarang"
                                                                placeholder="Contoh = Jl. Candi Bajang Ratu I, Blimbing"
                                                                value="<?php echo $list['alamat_sekarang']; ?>"
                                                                title="Masukkan Alamat Domisili." disabled>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text border-md border-left-0 logo lo9">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="print-error-msg 9" style="display:none"></div>
                                                    </div>
                                                    <div id="passkonfirmasi" class="form-group row" hidden>
                                                        <label for="inputpasswordKonfirmasi3"
                                                            class="col-sm-4 col-form-label">Password</label>
                                                        <div class="input-group col-sm-8">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text bg-white border-md border-right-0">
                                                                    <i class="fa fa-lock text-muted"></i>
                                                                </span>
                                                            </div>
                                                            <input type="password" id="inputpasswordKonfirmasi3"
                                                                class="form-control border-left-0 border-md" name="inputpasswordKonfirmasi3"
                                                                placeholder="" title="enter your confirm password.">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->

                                                </form>
                                            </div>
                                            <!-- /.post -->
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <footer class="main-footer float-right text-sm">
            <strong>Copyright &copy; 2021 <a href="https://sman3ptk.sch.id/" target="_blank" style="color: #28a745"> SMA
                    Negeri 3 Pontianak </a>&<a href="https://www.instagram.com/egyijaa_/" target="_blank"
                    style="color: #28a745"> Egy Ijaa</a> | Theme by : <a href="https://adminlte.io/" target="_blank"
                    style="color: #28a745">AdminLTE</a></strong>. All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
    <?php endforeach; else : ?>
    <?php endif; ?>
</body>
<script>
    $(window).on('load', function () {
        $(".loading2").fadeOut("slow", function () {
            $('body').removeClass('loading1');
        });
    });

    function previewImage() {
        document.getElementById("img");
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("profilePic").files[0]);
        oFReader.onload = function (oFREvent) {
            document.getElementById("img").src = oFREvent.target.result;
        };
    };
</script>
<script>
    $(document).ready(function () {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $(".selectize-control").attr('hidden', true);
        $(".tombolUpdate").click(function () {
            if ($(".tombolSimpan").is(":hidden") && $(".tombolReset").is(":hidden") && $("#status").is(
                    ":hidden") &&
                $("#keterangan").is(":hidden")) {
                $(".tombolSimpan").attr('hidden', false) && $(".tombolReset").attr('hidden', false) &&
                    $("#status")
                    .attr('hidden', false) && $("#keterangan").attr('hidden', false);
                $(this).html("<i class='fas fa-times'></i> <span> Batal</span>");
                $("#angkatan").attr('hidden', true);
                $("#foto").attr('hidden', false);
                $("#passkonfirmasi").attr('hidden', false);
                $('#img').removeClass('klikImg').addClass('not-clickable').off('click');
                $("#kota").attr('hidden', true);
                $("#statusInput").attr('hidden', true);
                $("#dropDown2").attr('hidden', false);
                $("#dropDown3").attr('hidden', false);
                $(".selectize-control").attr('hidden', false);
                //$('#mobile').inputmask('(+62)-999-9999-99999');
            } else {
                $(".print-error-msg").css('display', 'none');
                $(".logo").html("");
                $("input[name^=nama]").val($("#old_nama").html());
                $("input[name^=no_telepon]").val($("#old_telepon").html());
                $("input[name^=email]").val($("#old_email").html());
                $("input[name^=alamat_asal]").val($("#old_address").html());
                $("input[name^=alamat_sekarang]").val($("#old_address2").html());
                $("input[name^=keterangan]").val($("#old_keterangan").html());
                $(".tombolSimpan").attr('hidden', true) && $(".tombolReset").attr('hidden', true) && $(
                        "#status")
                    .attr('hidden', true) && $("#keterangan").attr('hidden', true);
                $(this).html("<i class='fas fa-pen-square'></i> <span> Update</span>");
                $("#barStatus").attr('hidden', false);
                $("#kota").attr('hidden', false);
                $("#statusInput").attr('hidden', false);
                $("#dropDown2").attr('hidden', true);
                $("#dropDown3").attr('hidden', true);
                $("#angkatan").attr('hidden', false);
                $("#foto").attr('hidden', true);
                $("#passkonfirmasi").attr('hidden', true);
                $("#tanggalLahir").attr('hidden', false);
                $('#val').text('');
                $("#profilePic").val('');
                $(".selectize-control").attr('hidden', true);
                //$("#img").attr("src", "<?php echo base_url('assets/image/foto_profil/'.$this->session->userdata('ses_foto')) ?>?t=<?php echo time();?>");
            }
        });
        $("#Update2").click(function () {
            if ($("#save2").is(":hidden") && $("#reset2").is(":hidden")) {
                $("#save2").attr('hidden', false) && $("#reset2").attr('hidden', false);
                $("#Update2").html("<i class='fas fa-times'></i> <span> Batal</span>");
                $("#sosialTampil").attr('hidden', true);
                $("#sosialEdit").attr('hidden', false);
            } else {
                $("input[name^=wa]").val($("#old_wa").html());
                $("input[name^=ig]").val($("#old_ig").html());
                $("input[name^=twitter]").val($("#old_twitter").html());
                $("input[name^=line]").val($("#old_line").html());
                $("#save2").attr('hidden', true) && $("#reset2").attr('hidden', true);
                $("#Update2").html("<i class='fas fa-pen-square'></i> <span> Update</span>");
                $("#sosialTampil").attr('hidden', false);
                $("#sosialEdit").attr('hidden', true);
            }
        });
        $(".klikImg").click(function () {
            $('button[name="Update"]').focus();
            Swal.fire(
                '',
                'harap Klik/lih Tombol Update (pada <b>info pribadi</b>) Terlebih dahulu',
                'warning'
            )
        });
        $(".noSpace").on({
            keydown: function (event) {
                if (event.which === 32)
                    return false;
            }
        });
        $(document).on('paste', ".noSpace", function (e) {
            e.preventDefault();
            // prevent copying action
            var withoutSpaces = e.originalEvent.clipboardData.getData('Text');
            withoutSpaces = withoutSpaces.replace(/\s+/g, '');
            $(this).val(withoutSpaces);
            // you need to use val() not text()
        });
        $(".noLetter").bind('paste', function (e) {
            var self = this;
            setTimeout(function (e) {
                var val = $(self).val();
                if (val != '0') {
                    var regx = new RegExp(/^[0-9]+$/);
                    if (!regx.test(val)) {
                        $(".noLetter").val("");
                    }
                    $(this).val(val);
                }
            }, 0);
        });
        $(function () {
            $('input, select').on('focus', function () {
                $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
            });
            $('input, select').on('blur', function () {
                $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
            });
            $(".noLetter").keypress(function (e) {
                //if the letter is not digit then display error and don't type anything
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    $("#errmsg").html("Hanya Angka!").show().fadeOut("slow");
                    return false;
                }
            });
            $('input:file').change(
                function (e) {
                    var files = e.originalEvent.target.files;
                    var validExtensions = ['jpg', 'gif', 'jpeg', 'png'];
                    for (var i = 0, len = files.length; i < len; i++) {
                        var n = files[i].name,
                            s = files[i].size,
                            t = files[i].type;
                        if (s > 2100000) {
                            Swal.fire(
                                'Oversize!',
                                'Gambar yang diunggah maksimal berukuran 2MB!, Gambar tidak akan disimpan jika data anda teruskan',
                                'warning'
                            )
                            $("#profilePic").val('');
                            return false;
                        }
                        if ($.inArray($(this).val().split('.').pop().toLowerCase(),
                                validExtensions) == -1) {
                            Swal.fire(
                                'Format Gambar Salah!',
                                'Format gambar yang bisa digunakan hanya :' + validExtensions
                                .join(', ') +
                                '. Gambar tidak akan disimpan jika data anda teruskan',
                                'warning'
                            )
                            $("#profilePic").val('');
                            return false;
                        } else {
                            function previewImage() {
                                document.getElementById("img");
                                var oFReader = new FileReader();
                                oFReader.readAsDataURL(document.getElementById("profilePic").files[
                                    0]);
                                oFReader.onload = function (oFREvent) {
                                    document.getElementById("img").src = oFREvent.target.result;
                                };
                            };
                        }
                    }
                })
            $('.tombolSimpan').on('click', function (e) {
                e.preventDefault();
                var spinner = $('#loader');
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                var emailaddressVal = $("#email").val();
                var panjang = $('input[name="alamat_sekarang"]').val().length;
                var panjang2 = $('input[name="alamat_asal"]').val().length;
                if (!$('input[name="nama"]').val() || !$('input[name="no_telepon"]').val()) {
                    Swal.fire(
                        'Empty Field',
                        'Harap isi semua field yang kosong!',
                        'warning'
                    )
                    return false;
                }
                if (panjang > 200 || panjang2 > 200) {
                    if (panjang > 200) {
                        $('input[name="alamat_sekarang"]').focus();
                    }
                    if (panjang2 > 200) {
                        $('input[name="alamat_asal"]').focus();
                    }
                    Swal.fire(
                        'Terlalu panjang',
                        'Harap masukkan alamat tidak melebihi 200 karakter!',
                        'warning'
                    )
                    return false;
                }
                if (!emailReg.test(emailaddressVal)) {
                    $('input[name="email"]').focus();
                    Swal.fire(
                        'Format Email Salah!',
                        'Harap isi dengan format Email yang Benar!',
                        'warning'
                    )
                    return false;
                }
                if (!$('input[name="inputpasswordKonfirmasi3"]').val()) {
                    Swal.fire(
                        'Verify Password!',
                        'Konfirmasi Password dibutuhkan untuk Menyimpan Data',
                        'warning'
                    )
                    return false;
                }
                var form = $('#form_profil').get(0);
                Swal.fire({
                    icon: 'question',
                    title: 'Apakah anda yakin untuk mengubah data?',
                    showCancelButton: true,
                    confirmButtonText: `Simpan`,
                    cancelButtonText: `Batal`,
                    confirmButtonColor: `#28a745`,
                    cancelButtonColor: '#dc3545',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        spinner.show();
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() ?>index.php/Profil/updProfil",
                            data: new FormData(form),
                            dataType: 'json',
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                spinner.hide();
                                if (response.message != "failed") {
                                    if ($.isEmptyObject(response.error)) {
                                        if (response.pesan == "success") {
                                            Swal.fire(
                                                'DATA TERSIMPAN!',
                                                '<div class="btn btn-outline-success btn-sm ml-2" style="pointer-events: none;"> Data Profil Berhasil Diubah! </div>',
                                                'success'
                                            )
                                            $(".print-error-msg").css('display', 'none');
                                            $(".logo").html("");
                                            setTimeout(function () {
                                                location.reload();
                                            }, 2000);
                                        } else {
                                            Swal.fire(
                                                'DATA GAGAL DISIMPAN!',
                                                '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">' +
                                                response.gagal +
                                                '</div>',
                                                'error'
                                            );
                                            if (response.kode == "1"){
                                                $(".3").css('display',
                                                'block');
                                                $(".2").css('display',
                                                'none');
                                                $(".3").html('<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">'+response.gagal+'</div>');
                                            } else {
                                                $(".2").css('display',
                                                'block');
                                                $(".3").css('display',
                                                'none');
                                                $(".2").html('<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">'+response.gagal+'</div>');
                                            }
                                        }
                                    } else {
                                        $(".print-error-msg").css('display',
                                            'block');
                                        $(".logo").html(
                                            "<i class='fas fa-window-close text-danger'></i>"
                                        );
                                        if (response.error.profilePic) {
                                            $(".0").html(response.error.profilePic);
                                        } else {
                                            $(".0").html(response.success.profilePic);
                                        }
                                        if (response.error.nama) {
                                            $(".1").html(response.error.nama);
                                        } else {
                                            $(".lo1").html(
                                                "<i class='fas fa-check-circle text-success'></i>"
                                            );
                                        }
                                        if (response.error.no_telepon) {
                                            $(".2").html(response.error
                                                .no_telepon);
                                        } else {
                                            $(".lo2").html(
                                                "<i class='fas fa-check-circle text-success'></i>"
                                            );
                                            $(".2").html(response.success
                                                .no_telepon);
                                        }
                                        if (response.error.email) {
                                            $(".3").html(response.error.email);
                                        } else {
                                            $(".lo3").html(
                                                "<i class='fas fa-check-circle text-success'></i>"
                                            );
                                            $(".3").html(response.success
                                                .email);
                                        }
                                        if (response.error.tanggal_lahir) {
                                            $(".4").css('display', 'block');
                                            $(".4").html(response.error.tanggal_lahir);
                                        } else {
                                            $(".lo4").html(
                                                "<i class='fas fa-check-circle text-success'></i>"
                                            );
                                            $(".4").css('display', 'none');
                                        }
                                        if (response.error.kota_sekarang) {
                                            $(".5").css('display', 'block');
                                            $(".5").html(response.error.kota_sekarang);
                                        } else {
                                            $(".lo5").html(
                                                "<i class='fas fa-check-circle text-success'></i>"
                                            );
                                            $(".5").css('display', 'none');
                                        }
                                        if (response.error.status) {
                                            $(".6").css('display', 'block');
                                            $(".6").html(response.error
                                                .status);
                                        } else {
                                            $(".lo6").html(
                                                "<i class='fas fa-check-circle text-success'></i>"
                                            );
                                            $(".6").css('display', 'none');
                                        }
                                        if (response.error.keterangan) {
                                            $(".7").html(response.error.keterangan);
                                        } else {
                                            $(".lo7").html(
                                                "<i class='fas fa-check-circle text-success'></i>"
                                            );
                                        }
                                        if (response.error
                                            .alamat_asal) {
                                            $(".8").html(response.error
                                                .alamat_asal);
                                        } else {
                                            $(".lo8").html(
                                                "<i class='fas fa-check-circle text-success'></i>"
                                            );
                                        }
                                        if (response.error
                                            .alamat_asal) {
                                            $(".9").html(response.error
                                                .alamat_sekarang);
                                        } else {
                                            $(".lo9").html(
                                                "<i class='fas fa-check-circle text-success'></i>"
                                            );
                                        }
                                        Swal.fire(
                                            'DATA GAGAL DISIMPAN!',
                                            '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">Terjadi kesalahan saat menyimpan data, harap perhatikan kembali!</div>',
                                            'error'
                                        )
                                    }
                                } else {
                                    Swal.fire(
                                        'DATA GAGAL DISIMPAN!',
                                        '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">' +
                                        response.error + '</div>',
                                        'error'
                                    );
                                }
                            },
                            error: function (data) {
                                spinner.hide();
                                Swal.fire(
                                    'Error',
                                    '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;"> Terjadi Kesalahan saat mengubah informasi profil, harap coba kembali/hubungi admin </div>',
                                    'error'
                                )
                            }
                        });
                    } else {
                        Swal.fire('Data Belum Disimpan', '', 'info')
                        return false;
                    }
                })
            })
            $('#save2').on('click', function (e) {
                e.preventDefault();
                var form = $(this).parents('form');
                if (!$('input[name="inputpasswordKonfirmasi2"]').val()) {
                    Swal.fire(
                        'Verify Password!',
                        'Konfirmasi Password dibutuhkan untuk Menyimpan Data',
                        'warning'
                    )
                    return false;
                }
                Swal.fire({
                    icon: 'question',
                    title: 'Apakah anda yakin untuk mengubah data?',
                    showCancelButton: true,
                    confirmButtonText: `Simpan`,
                    cancelButtonText: `Batal`,
                    confirmButtonColor: `#28a745`,
                    cancelButtonColor: '#dc3545',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() ?>index.php/Profil/updSosmed",
                            data: $("#form_password2").serialize(),
                            dataType: 'json',
                            success: function (response) {
                                console.log(response.message);
                                if (response.message == "success") {
                                    Swal.fire(
                                        'DATA TERSIMPAN!',
                                        'Orang yang berkunjung ke profil anda dapat menghubungi sosial media anda yang anda masukkan',
                                        'success'
                                    )
                                    setTimeout(function () {
                                        location.reload();
                                    }, 1400);
                                } else {
                                    Swal.fire(
                                        'DATA GAGAL DISIMPAN!',
                                        response.error,
                                        'error'
                                    );
                                }
                            }
                        });
                    } else {
                        Swal.fire('Data Belum Disimpan', '', 'info')
                        return false;
                    }
                })
            })
        });
        $(document).on('click', '#ganti', function (e) {
            e.preventDefault();
            var form = $(this).parents('form');
            console.log($('#nisPass').val());
            if (!$('input[name="inputpasswordLama"]').val() || !$('input[name="inputpasswordBaru"]')
                .val()) {
                Swal.fire(
                    'Empty Field',
                    'Harap isi semua field yang kosong!',
                    'warning'
                )
                return false;
            }
            if (!$('input[name="inputpasswordKonfirmasi"]').val()) {
                Swal.fire(
                    'Verify Password!',
                    'Konfirmasi Password dibutuhkan untuk menyimpan password baru!',
                    'warning'
                )
                return false;
            }
            if ($('input[name="inputpasswordBaru"]').val() != $('input[name="inputpasswordKonfirmasi"]')
                .val()) {
                Swal.fire(
                    'Konfirmasi Salah!',
                    'Password Konfirmasi yang anda masukkan salah/tidak sesuai dengan Password Baru',
                    'warning'
                )
                return false;
            }
            Swal.fire({
                icon: 'question',
                title: 'Apakah anda yakin untuk mengubah Password?',
                showCancelButton: true,
                confirmButtonText: `Ubah`,
                cancelButtonText: `Batal`,
                confirmButtonColor: `#28a745`,
                cancelButtonColor: '#dc3545',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url() ?>index.php/Profil/updPassword",
                        data: $(form).serialize(),
                        dataType: 'json',
                        success: function (response) {
                            console.log(response.message);
                            if (response.message == "success") {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Password berhasil diubah!'
                                })
                                setTimeout(location.reload.bind(location), 1800);
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: response.error
                                })
                                $("#form_password")[0].reset();;
                            }
                        }
                    });
                } else {
                    Swal.fire('Data Belum Disimpan', '', 'info')
                    return false;
                }
            })
        })

    });
    $('select').selectize({
        sortField: 'text'
    });
    $('#tombol').click(function () {
        $("input[type='file']").trigger('click');
        $("#tombol2").attr('hidden', false);
    })
    $('#tombol2').click(function () {
        //$('#img').remove();
        $("#img").attr("src",
            "<?php echo base_url('assets/image/foto_profil/'.$this->session->userdata('ses_foto')) ?>?t=<?php echo time();?>"
        );
        $("#tombol2").attr('hidden', true);
        $('#val').text('');
        $('input:file').val('');
    })
    $(document).on('click', '.remove_file', function () {
        //$('#img').remove();
        $("#img").attr("src",
            "<?php echo base_url('assets/image/foto_profil/default.jpg'); ?>?t=<?php echo time();?>");
        $("#img2").attr("src",
            "<?php echo base_url('assets/image/foto_profil/default.jpg'); ?>?t=<?php echo time();?>");
        var path = $(this).data("id");
        var nis = $(this).data("username");
        console.log(nis);
        var action = "remove_file";

        Swal.fire({
            icon: 'question',
            title: 'Apakah anda yakin untuk Menghapus gambar?',
            showCancelButton: true,
            confirmButtonText: `Hapus`,
            cancelButtonText: `Batal`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/Profil/delAvatar",
                    method: "POST",
                    data: {
                        path: path,
                        nis: nis,
                        action: action
                    },
                })
                console.log($("#username").val());
                Swal.fire('Disimpan!', '', 'success')
            } else {
                $("#img").attr("src",
                    "<?php echo base_url('assets/image/foto_profil/'.$this->session->userdata('ses_foto')) ?>?t=<?php echo time();?>"
                );
                $("#img2").attr("src",
                    "<?php echo base_url('assets/image/foto_profil/'.$this->session->userdata('ses_foto')) ?>?t=<?php echo time();?>"
                );
                Swal.fire('Gambar batal Dihapus', '', 'info')
                return false;
            }
        })
    })

    $("input[type='file']").change(function () {
        $('#val').text(this.value.replace(/C:\\fakepath\\/i, ''))
    })
    // Disable #x
    function enable_disable() {
        if ($("input").is(":disabled")) {
            $("input").prop('disabled', false);
        } else {
            $("input").prop('disabled', true);
            $("input[name='inputpasswordLama']").prop('disabled', false);
            $("input[name='inputpasswordBaru']").prop('disabled', false);
            $("input[name='inputpasswordKonfirmasi']").prop('disabled', false);
            $("input[name='inputpasswordKonfirmasi2']").prop('disabled', false);
            $("input[name='wa']").prop('disabled', false);
            $("input[name='ig']").prop('disabled', false);
            $("input[name='twitter']").prop('disabled', false);
            $("input[name='line']").prop('disabled', false);
        }

    };
</script>