<head>
    <script>
        function searchFilter(page_num) {
            page_num = page_num ? page_num : 0;
            var keywords = $('#keywords').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>index.php/Lowongan/ajaxPaginationData/' + page_num,
                data: {
                    'page': page_num,
                    'keywords': keywords
                },
                beforeSend: function () {
                    $('.loading').show();
                },
                success: function (html) {
                    $('#postList').html(html);
                    $('.loading').fadeOut("slow");
                }
            });
        }
    </script>
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/dist/css/bgye.min.css?t=<?php echo time();?>">
    <style>
        .content-wrapper {
            background-color: rgba(255, 255, 255, 0);
        }

        .belakang {
            background-color: rgba(255, 255, 255, 0.5);
        }

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
        @media only screen and (min-width: 768px) and (max-width: 995px) {
            .testDulu {
                width: auto !important;
                height: 275px;
            }
            .judulnya{
                font-size: 22px;
            }
            .card-text {
                font-size: 12px;
            }
        }

        /* penggunaan media query pada mobile layout */
        @media only screen and (min-width: 480px) and (max-width: 767px) {
            .dikit {
                width: 50%;
            }
            .testDulu {
                width: auto !important;
                height: 260px;
            }
            .judulnya{
                font-size: 15.5px;
            }
            .card-text {
                font-size: 12.5px;
            }
        }

        @media only screen and (min-width: 180px) and (max-width: 479px) {
            .testDulu {
                width: auto !important;
                height: 265px;
            }
            .judulnya{
                font-size: 16px;
            }
            .card-text {
                font-size: 12px;
            }
        }

        /* penggunaan media query pada default monitor layout */
        @media only screen and (min-width: 996px) {
            .testDulu {
                width: auto !important;
                height: 300px;
            }
        }
    </style>
</head>
<div id="loader"></div>

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed loading1">
    <div class="bg1"></div>
    <div class="bg1 bg2"></div>
    <div class="bg1 bg3"></div>
    <div class="loading2">
        <img id="loading-image" class="loading-image"
            src="<?php echo base_url() . 'assets/image/tenor.gif?t='.time() ?>" alt="Loading..." />
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
                        <img src="<?php echo base_url('assets/image/foto_profil/'.$this->session->userdata('ses_foto')) ?>"
                            class="user-image img-circle elevation-2" alt="User Image">
                        <?php endif;?>
                        <span class="d-none d-md-inline"><?php echo $this->session->userdata('ses_id').' ' ?><i
                                class="fas fa-caret-down"></i></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <?php if (!empty($dataBar)) : foreach ($dataBar as $row) : ?>
                        <?php if($this->session->userdata('akses')=='2'):?>
                        <li class="user-header bg-success shine-me">
                            <img src="<?php echo base_url('assets/image/foto_profil/'.$row['foto_profil']) ?>"
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
                            <?php if ($this->session->userdata('akses') != '2') : ?>
                            <button data-target="#loginModal" name="detil"
                                data-id="<?php echo $this->session->userdata('ses_id')?>" data-toggle="modal"
                                class="btn btn-flat btn-outline-danger zoomPilih" href="#loginModal"
                                value="<?php echo $this->session->userdata('ses_id').' ' ?>"><i class="fas fa-lock"></i>
                                Ubah Password</button>
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
                                <p class="text">
                                    <?php date_default_timezone_set("Asia/Bangkok"); echo date("d-M-Y",time());?></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
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
                                        <p>Broadcast</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#"><i class="nav-icon fab fa-stack-overflow"
                                            aria-hidden="true"></i>
                                        <p>Lowongan Pekerjaan <span id="masuk" class="right badge badge-info"
                                                hidden>Inputing...</span></p>
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
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
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
                                    <a href="<?php echo base_url(); ?>index.php/page/toProfile" class="nav-link">
                                        <i class="nav-icon fa fa-user"></i>
                                        <p>
                                            Profil
                                            <span class="right badge badge-success">GAS!</span>
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
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4 class="m-0 text-dark">Lowongan Pekerjaan</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Terakhir Diperbaharui</li>
                                <li class="breadcrumb-item active"><?php if (!empty($terakhir)) { foreach ($terakhir as $list) {
                                   $date = date("d-m-Y H:i:s", strtotime($list['published'])); 
                                   echo $date;}} else {
                                    $date = date("d-m-Y H:i:s", time()); 
                                    echo $date;
                                   } ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card belakang">
                                <div class="card-body">
                                    <div class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <button id="tampilkanTambah" class="btn btn-success col-md-12 effect01"
                                                    onclick="showTambah()"><span>Tambah Lowongan</span></button>
                                                <div id="dataTambah" class="col-lg-8" style="display:none;">
                                                    <div class="card">
                                                        <?php echo form_open('Lowongan/Tambah', array('id' => 'form_lowongan', 'role' => 'form','enctype' => "multipart/form-data"));?>
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label>JUDUL</label>
                                                                <?php echo form_input('judul', '', array('class' => 'form-control', 'placeholder' => 'Judul', 'id' => 'judul'));?>
                                                                <div class="print-error-msg 1" style="display:none">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>MINIMAL PENDIDIKAN</label>
                                                                <select id="angkatan" name="angkatan"
                                                                    class="form-control" required>
                                                                    <option disabled selected value="">Silahkan
                                                                        pilih Pendidikan
                                                                    </option>
                                                                                    <?php
                                                                    foreach ($information as $row) { ?>

                                                                                    <option
                                                                                        value='<?php echo $row['id_pendidikan']; ?>'>
                                                                                        <?php echo $row['pendidikan']; ?>
                                                                                    </option>;
                                                                                    <?php }
                                                                    ?>

                                                                </select>
                                                                <div class="print-error-msg 2" style="display:none">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputFile">POSTER</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <label id="gambar" class="custom-file-label"
                                                                            for="exampleInputFile">Pilih
                                                                            Gambar</label>
                                                                        <input name="gambar" type="file"
                                                                            accept='image/*' id="inputFile"
                                                                            class="custom-file-input"
                                                                            id="exampleInputFile" required>
                                                                    </div>
                                                                </div>
                                                                <div class="print-error-msg 3" style="display:none">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>PREVIEW</label>
                                                                <img id="image_upload_preview"
                                                                    src="http://placehold.it/300x400"
                                                                    style="width:300px;height:400px" alt="your image" />
                                                            </div>
                                                            
                                                            <div class="card card-success">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Informasi Kontak</h3>
                                                                </div>
                                                                <div class="card-body">
                                                                    <!-- Minimal style -->
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <!-- checkbox -->
                                                                            <div class="form-group clearfix">
                                                                                <div class="icheck-success d-inline">
                                                                                    <input type="checkbox" id="nomorHp"
                                                                                        name="nomorHp"
                                                                                        data-name="nomorHpnya"
                                                                                        class="my-features">
                                                                                    <label for="nomorHp">Nomor
                                                                                        Whatsapp</label><br>
                                                                                    <input id="nomorHpnya"
                                                                                        name="nomornya" type="text"
                                                                                        class="form-control"
                                                                                        placeholder="Contoh : 08963333333"
                                                                                        style="display:none;">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <!-- radio -->
                                                                            <div class="form-group clearfix">
                                                                                <div class="icheck-info d-inline">
                                                                                    <input type="checkbox" id="twitter"
                                                                                        name="twitter"
                                                                                        data-name="twitternya"
                                                                                        class="my-features">
                                                                                    <label
                                                                                        for="twitter">Twitter</label><br>
                                                                                    <input id="twitternya"
                                                                                        name="twitternya" type="text"
                                                                                        class="form-control"
                                                                                        placeholder="Contoh : @smanta_ptk"
                                                                                        style="display:none;">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Minimal red style -->
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <!-- checkbox -->
                                                                            <div class="form-group clearfix">
                                                                                <div class="icheck-danger d-inline">
                                                                                    <input type="checkbox"
                                                                                        id="instagram" name="instagram"
                                                                                        data-name="instagramnya"
                                                                                        class="my-features">
                                                                                    <label
                                                                                        for="instagram">Instagram</label><br>
                                                                                    <input id="instagramnya"
                                                                                        name="instagramnya" type="text"
                                                                                        class="form-control"
                                                                                        placeholder="Contoh : smanta.pontianak"
                                                                                        style="display:none;">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Minimal red style -->
                                                                </div>
                                                                <!-- /.card-body -->
                                                            </div>
                                                            <div class="card card-info">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Tanggal Akhir
                                                                        Berlaku/Deadline
                                                                    </h3>
                                                                </div>
                                                                <div class="card-body">
                                                                    <!-- Minimal style -->
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <!-- checkbox -->
                                                                            <input id="deadline" name="deadline"
                                                                                type="datetime-local"
                                                                                class="form-control" placeholder="">
                                                                        </div>
                                                                        <div class="print-error-msg 4"
                                                                            style="display:none"></div>
                                                                    </div>
                                                                </div>
                                                                <!-- /.card-body -->
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="card card-outline card-info">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">
                                                                            DESKRIPSI
                                                                        </h3>
                                                                        <!-- tools box -->
                                                                        <div class="card-tools">
                                                                            <button type="button"
                                                                                class="btn btn-tool btn-sm"
                                                                                data-card-widget="collapse"
                                                                                data-toggle="tooltip" title="Collapse">
                                                                                <i class="fas fa-minus"></i></button>
                                                                            <button type="button"
                                                                                class="btn btn-tool btn-sm"
                                                                                data-card-widget="remove"
                                                                                data-toggle="tooltip" title="Remove">
                                                                                <i class="fas fa-times"></i></button>
                                                                        </div>
                                                                        <!-- /. tools -->
                                                                    </div>
                                                                    <!-- /.card-header -->
                                                                    <div class="card-body pad">
                                                                        <div class="mb-3">
                                                                            <textarea name="deskripsi" id="deskripsi"
                                                                                class="form-control" rows="3"
                                                                                placeholder="Deskripsi"
                                                                                required></textarea>
                                                                        </div>
                                                                        <div class="print-error-msg 5"
                                                                            style="display:none"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button id="save" type="submit"
                                                                class="btn btn-success">Submit</button>
                                                        </div>
                                                        <?= form_close() ?>
                                                    </div>
                                                </div>
                                                <div id="dataBantuan" class="col-lg-4" style="display:none;">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4>Butuh bantuan?</h4>
                                                            <img src="<?php echo base_url(); ?>/assets/bootstrap/img/helpdesk.png"
                                                                style="width: 100%">
                                                            <p>Hubungi helpdesk kami di : <a
                                                                    href="mailto:sman3ptk.co.id?subject=Helpdesk_SiPalu">sman3ptk.co.id</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.col-md-6 -->
                                            </div>
                                            <!-- /.row -->
                                        </div><!-- /.container-fluid -->
                                    </div>
                                    <div class="form-group mt-3">
                                        <label style="color:#28a745">Cari Lowongan</label>
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <input id="keywords" name="cari" type="text"
                                                    class="form-control belakang"
                                                    placeholder="Nama Publisher, Judul atau Minimal Pendidikan"
                                                    onkeyup="searchFilter()">
                                                <div class=" input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fa fa-search"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <a href="<?php echo base_url() ?>index.php/Lowongan/toLowongan2"
                                                    class="btn btn-dark float-right zoomPilih"><?php
                                                if ($this->session->userdata('akses') != 2){
                                                    echo 'Kelola Postingan Lowongan Pekerjaan';
                                                }
                                                else {
                                                    echo 'Postingan Saya';
                                                }
                                                ?></a>
                                            </div>
                                        </div>
                                        <div class="post-list" id="postList">
                                            <div class="row mb-2">
                                                <?php if (!empty($posts)) : foreach ($posts as $row) : ?>
                                                <?php if ($row['active'] == 1) : ?>
                                                <div class="col-md-4 dikit">
                                                    <div class="card testDulu flex-md-row mb-4 box-shadow h-md-250 belakang">
                                                        <div class="card-body d-flex flex-column align-items-start">
                                                            <strong
                                                                class="d-inline-block mb-2 text-success"><?php $date = strtotime($row['expired']) - time();?>
                                                                <?php if ( $date > 259200 ){
                                                                echo '<span class =" badge badge-success waktu">On Going<span> ';
                                                            }
                                                            else if ($date > 0 && $date < 259200){
                                                                echo '<span class =" badge badge-warning waktu2">Almost Expired<span> ';
                                                            } 
                                                            else {
                                                                echo '<span class =" badge badge-danger ">Expired<span> ';
                                                            }?></strong>
                                                            <h3 class="mb-0 judulnya">
                                                                <?php echo $row['judul']; ?>
                                                            </h3>
                                                            <div class="mb-1 text-muted judulnya">Nov 11</div>
                                                            <p class="card-text mb-auto mb-1"><small class="text-muted">
                                                                    By. <?php echo $row['NAMA']; ?><?php if (empty($row['username'])){
                                                                echo ' (Admin)';
                                                            } ?>
                                                                </small>
                                                                <br>
                                                                <small class="text-muted"> Minimal Pendidikan :
                                                                    <?php echo $row['ang']; ?>
                                                                </small>
                                                            </p>
                                                            <div class="btn-group">
                                                                <button type="button" title="Detail"
                                                                    class="btn btn-info zoomPilih" data-toggle="modal"
                                                                    data-target="#detailModal" name="detil"
                                                                    data-id_lowongan_pekerjaan="<?php echo $row['id_lowongan_pekerjaan']; ?>"
                                                                    data-username="<?php echo $row['PUBLISHER']; ?>"
                                                                    data-alumni="<?php echo $row['username']; ?>"
                                                                    data-namalengkap="<?php echo $row['NAMA']; ?>"
                                                                    data-gambar="<?php if (isset($row['gambar'])) {
                                                                                                                                                                                                                                                        echo $row['gambar'];
                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                        echo "blank.png";
                                                                                                                                                                                                                                                    } ?>"
                                                                    data-deskripsi="<?php echo $row['deskripsi']; ?>"
                                                                    data-judul="<?php echo $row['judul']; ?>"
                                                                    data-twitter="<?php echo $row['twitter']; ?>"
                                                                    data-ig="<?php echo $row['ig']; ?>"
                                                                    data-telepon="<?php echo $row['telepon']; ?>"
                                                                    data-wa="<?php echo $row['wa']; ?>"
                                                                    data-detik="<?php $date = strtotime($row['expired']) - time() ; echo  $date; ?>"
                                                                    href="#detailModal"
                                                                    value="<?php echo $row['PUBLISHER']; ?>"><i
                                                                        class="fas fa-info-circle"></i> Read
                                                                    More</button>
                                                                <?php if ($this->session->userdata('akses')!='2' || $this->session->userdata('ses_id') == $row['username']):?>
                                                                <button type="button" data-target="#konfirmasiDel"
                                                                    data-toggle="modal"
                                                                    data-id="<?php echo $row['id_lowongan_pekerjaan']; ?>"
                                                                    class="btn btn-danger zoomPilih" value=><i
                                                                        class="fas fa-trash"></i></button>
                                                                <?php endif; ?>
                                                                <?php if ($this->session->userdata('akses')!='2' || $this->session->userdata('ses_id') == $row['username']){
                                                                                    echo '<form
                                                                                                action="'.base_url(); ?><?php echo 'index.php/Lowongan/toEditLowongan"
                                                                                                method="POST" enctype="multipart/form-data">
                                                                                                <button name="deleteAlumninis2" value="'.$row['id_lowongan_pekerjaan'].'"
                                                                                                    class="btn btn-secondary zoomPilih" ><i
                                                                                                        class="fas fa-edit" ></i></button>
                                                                                            </form>';
                                                                            }?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                                <?php endforeach;
                                            else : ?>
                                                <div class=" col-md-12 mb-3">
                                                    <?php echo $this->session->flashdata('#error-Lowongan');?>
                                                </div>
                                                <?php endif; ?>
                                                <div class=" col-md-12 mb-3">
                                                    <?php if($this->session->userdata('akses')=='0' || $this->session->userdata('akses')=='1'):?>
                                                    <?php if (!empty($posts)) :?>
                                                    <button data-target="#konfirmasiDel2" name="detil2"
                                                        data-toggle="modal"
                                                        class="btn btn-danger col-md-12 zoomPilih effect01 hitam"
                                                        href="#detailModal"><i class="fa fa-database"
                                                            aria-hidden="true"></i> <i
                                                            class="fas fa-trash"></i></button>
                                                    <?php endif;?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <?php echo $this->ajax_pagination->create_links(0,1,2); ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-md-6 -->
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content -->
                </div>
                <div class="loading" style="display: none;">
                    <div class="content"><img src="<?php echo base_url() . 'assets/image/loading.gif?t='.time() ?>" />
                    </div>
                </div>
            </div>
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loginModalLabel">Ubah Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="ubahPassword" name="ubahPassword"
                            action="<?php echo base_url(); ?>index.php/Page/ubahPasswordAdmin" method="POST">
                            <!-- form with an ID so we can identify it, now includes both the textbox and the button within it -->
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="modalpass" class="col-form-label">Password Lama:</label>
                                    <input type="password" id="modalpass" name="modalpass" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="modalpass" class="col-form-label">Password Baru:</label>
                                    <input type="password" id="modalpass2" name="modalpass2" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="modalpass" class="col-form-label">Password Baru (Konfirmasi):</label>
                                    <input type="password" id="modalpass3" name="modalpass3" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button id="siapUbah" name="siapUbah" type="submit"
                                    class="btn btn-danger">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="detailModal" class="modal fade show">
                <div class="modal-dialog" style="max-width: 700px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 id="judul" class="modal-title"></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img id="profilDetail" class="profile-user-img img-fluid" alt="Belum diatur"
                                                style="width:100%;height:100%;object-fit:cover">
                                        </div>
                                        <!-- <h3 id="judul" class="profile-username text-center"></h3> -->
                                        <p id="deskripsi1" class="text-muted"></p>
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <a id="siniTampil" class="float-right"></a>
                                            </li>
                                            <li class="list-group-item">
                                                <a id="ig" class="text-center float-right col-sm-4 spasi"></a>
                                                <a id="twitterId" class="text-center float-right col-sm-4 spasi"></a>
                                                <a id="telepon" class="text-center float-right col-sm-4 spasi"></a>
                                            </li>
                                        </ul>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-success btn-block zoomPilih effect01"
                                                data-dismiss="modal"><span><b>Tutup</b></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="konfirmasiDel" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#FFA500">
                            <h4 class="modal-title">Konfirmasi</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin ingin menghapus lowongan ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                            <form action="<?php echo base_url(); ?>index.php/Lowongan/Hapus" method="POST">
                                <button id="delLowongan" name="delLowongan" class="btn btn-danger">Ya
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="konfirmasiDel2" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#FFA500">
                            <h4 class="modal-title">Konfirmasi</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin ingin menghapus semua lowongan ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                            <form action="<?php echo base_url(); ?>index.php/Lowongan/HapusAll" method="POST">
                                <button id="delAll" name="delAll" class="btn btn-danger">Ya
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="main-footer float-right text-sm text-dark">
            <strong>Copyright &copy; 2021 <a href="https://sman3ptk.sch.id/" target="_blank" style="color: #28a745"> SMA
                    Negeri 3 Pontianak </a>&<a href="https://www.instagram.com/egyijaa_/" target="_blank"
                    style="color: #28a745"> Egy Ijaa</a> | Theme by : <a href="https://adminlte.io/" target="_blank"
                    style="color: #28a745">AdminLTE</a></strong>. All rights
            reserved.
        </footer>
    </div>
</body>
<script>
    $(window).on('load', function () {
        $(".loading2").fadeOut("slow", function () {
            $('body').removeClass('loading1');
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#detailModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var modal = $(this);
            var ses2 = "<?php echo $_SESSION['akses'] ?>";
            var wa = button.data('wa');
            var telepon = button.data('telepon');
            var ig = button.data('ig');
            var twitter = button.data('twitter');
            modal.find('.modal-body #profilDetail').attr('src',
                "<?php echo base_url(); ?>/assets/image/lowongan/" + button.data('gambar'));
            modal.find('.modal-header #judul').html(button.data('judul'));
            modal.find('.modal-body #deskripsi1').html(button.data('deskripsi'));
            var initialTime = button.data('detik');
            console.log(initialTime);
            var seconds = initialTime;

            function timer() {
                var days = Math.floor(seconds / 24 / 60 / 60);
                var hoursLeft = Math.floor((seconds) - (days * 86400));
                var hours = Math.floor(hoursLeft / 3600);
                var minutesLeft = Math.floor((hoursLeft) - (hours * 3600));
                var minutes = Math.floor(minutesLeft / 60);
                var remainingSeconds = seconds % 60;
                if (remainingSeconds < 10) {
                    remainingSeconds = "0" + remainingSeconds;
                }
                modal.find('.modal-body #siniTampil').attr('class', 'btn btn-block waktu');
                modal.find('.modal-body #siniTampil').html('<i class="fas fa-history"></i> ' + days +
                    " Hari " + hours + " Jam " + minutes + " Menit " + remainingSeconds + " Detik");
                if (days < 3) {
                    modal.find('.modal-body #siniTampil').attr('class', 'btn btn-block waktu2');
                    modal.find('.modal-body #siniTampil').html(
                        '<i class="fas fa-exclamation-triangle"></i> ' + days + " Hari " + hours +
                        " Jam " + minutes + " Menit " + remainingSeconds +
                        " Detik <i class='fas fa-exclamation-triangle'></i>");
                    if (days <= 0) {
                        modal.find('.modal-body #siniTampil').html(
                            '<i class="fas fa-exclamation-triangle"></i> ' + hours + " Jam " +
                            minutes + " Menit " + remainingSeconds +
                            " Detik <i class='fas fa-exclamation-triangle'></i>");
                        if (hours <= 0) {
                            modal.find('.modal-body #siniTampil').html(
                                '<i class="fas fa-exclamation-triangle"></i> ' + minutes +
                                " Menit " + remainingSeconds +
                                " Detik <i class='fas fa-exclamation-triangle'></i>");
                            if (minutes <= 0) {
                                modal.find('.modal-body #siniTampil').html(
                                    '<i class="fas fa-exclamation-triangle"></i> ' +
                                    remainingSeconds +
                                    " Detik <i class='fas fa-exclamation-triangle'></i>");
                            }
                        }
                    }
                }
                if (seconds <= 0) {
                    clearInterval(countdownTimer);
                    modal.find('.modal-body #siniTampil').attr('class', 'btn btn-danger btn-block');
                    modal.find('.modal-body #siniTampil').html(
                        "<i class='fab fa-expeditedssl'></i> Expired <i class='fab fa-expeditedssl'></i>"
                        );
                } else {
                    seconds--;
                }
            }
            countdownTimer = setInterval(timer, 1000);
            if (telepon != '') {
                if (ses2 == '2') {
                    var tel = document.createElement("a");
                    tel.id = 'baruTel';
                    tel.href = 'https://api.whatsapp.com/send?phone=62' + wa +
                        '&text=Mohon Maaf, Izin bertanya apakah lowongan pekerjaan yang dipublikasikan di aplikasi alumni smanta masih tersedia? terima kasih';
                    tel.target = '_blank';
                    tel.className = 'btn btn-block btn-success zoomPilih effect01';
                    tel.innerHTML = "<i class='fab fa-whatsapp'></i><span><b id='hubungi'></b></span>";
                    document.getElementById("telepon").appendChild(tel);
                    modal.find('.modal-body #hubungi').html(' Hubungi');
                    if (seconds <= 0) {
                        tel.className = 'btn bg-gradient-success disabled btn-block';
                        tel.href = '#';
                        tel.target = '';
                    }
                } else {
                    var tel = document.createElement("p");
                    tel.id = 'baruTel';
                    tel.className = 'btn btn-block bg-gradient-success noHover';
                    tel.innerHTML = "<i class='fab fa-whatsapp'></i><b id='hubungi'></b>";
                    document.getElementById("telepon").appendChild(tel);
                    modal.find('.modal-body #hubungi').html(' ' + telepon);
                }
            } else {
                if (ses2 == '2') {
                    var tel = document.createElement("p");
                    tel.id = 'baruTel';
                    tel.className = 'zoomPilih';
                    document.getElementById("telepon").appendChild(tel);
                    modal.find('.modal-body #baruTel').html(
                    '<i class="fab fa-whatsapp"></i> Tidak Ada');
                } else {
                    var tel = document.createElement("p");
                    tel.id = 'baruTel';
                    document.getElementById("telepon").appendChild(tel);
                    modal.find('.modal-body #baruTel').html(
                    '<i class="fab fa-whatsapp"></i> Tidak Ada');
                }
            }
            if (ig != '') {
                if (ses2 == '2') {
                    var igk = document.createElement("a");
                    igk.id = 'baruIg';
                    igk.href = 'https://www.instagram.com/' + ig;
                    igk.target = '_blank';
                    igk.className = 'btn btn-block btn-danger zoomPilih effect01 hitam';
                    igk.innerHTML = "<i class='fab fa-instagram'></i><b id='lihatIg'></b>";
                    document.getElementById("ig").appendChild(igk);
                    modal.find('.modal-body #lihatIg').html(' Lihat');
                    if (seconds <= 0) {
                        igk.className = 'btn bg-gradient-danger disabled btn-block';
                        igk.href = '#';
                        igk.target = '';
                    }
                } else {
                    var igk = document.createElement("p");
                    igk.id = 'baruIg';
                    igk.className = 'btn btn-block bg-gradient-danger noHover';
                    igk.innerHTML = "<i class='fab fa-instagram'></i><b id='lihatIg'></b>";
                    document.getElementById("ig").appendChild(igk);
                    modal.find('.modal-body #lihatIg').html(' ' + ig);
                }
            } else {
                if (ses2 == '2') {
                    var igk = document.createElement("p");
                    igk.id = 'baruIg';
                    igk.className = 'zoomPilih';
                    document.getElementById("ig").appendChild(igk);
                    modal.find('.modal-body #baruIg').html(
                    '<i class="fab fa-instagram"></i> Tidak Ada');
                } else {
                    var igk = document.createElement("p");
                    igk.id = 'baruIg';
                    document.getElementById("ig").appendChild(igk);
                    modal.find('.modal-body #baruIg').html(
                    '<i class="fab fa-instagram"></i> Tidak Ada');
                }
            }
            if (twitter != '') {
                if (ses2 == '2') {
                    var twit = document.createElement("a");
                    twit.id = 'baruTwit';
                    twit.href = 'https://www.twitter.com/' + twitter;
                    twit.target = '_blank';
                    twit.className = 'btn btn-block btn-info zoomPilih effect01';
                    twit.innerHTML =
                    "<i class='fab fa-twitter'></i><span><b id='lihatTwit'></b></span>";
                    document.getElementById("twitterId").appendChild(twit);
                    modal.find('.modal-body #lihatTwit').html(' Lihat');
                    if (seconds <= 0) {
                        twit.className = 'btn bg-gradient-info disabled btn-block';
                        twit.href = '#';
                        twit.target = '';
                    }
                } else {
                    var twit = document.createElement("p");
                    twit.id = 'baruTwit';
                    twit.className = 'btn btn-block bg-gradient-info noHover';
                    twit.innerHTML = "<i class='fab fa-twitter'></i><b id='lihatTwit'></b>";
                    document.getElementById("twitterId").appendChild(twit);
                    modal.find('.modal-body #lihatTwit').html(' ' + twitter);
                }
            } else {
                if (ses2 == '2') {
                    var twit = document.createElement("p");
                    twit.id = 'baruTwit';
                    twit.className = 'zoomPilih';
                    document.getElementById("twitterId").appendChild(twit);
                    modal.find('.modal-body #baruTwit').html(
                    '<i class="fab fa-twitter"></i> Tidak Ada');
                } else {
                    var twit = document.createElement("p");
                    twit.id = 'baruTwit';
                    document.getElementById("twitterId").appendChild(twit);
                    modal.find('.modal-body #baruTwit').html(
                    '<i class="fab fa-twitter"></i> Tidak Ada');
                }
            }
            $('#detailModal').on('hidden.bs.modal', function () {
                var myobj2 = document.getElementById("baruTel");
                var myobj3 = document.getElementById("baruIg");
                var myobj4 = document.getElementById("baruTwit");
                if (myobj2 != null || myobj2 == 'Tidak Ada') {
                    myobj2.remove();
                }
                if (myobj3 != null || myobj3 == 'Tidak Ada') {
                    myobj3.remove();
                }
                if (myobj4 != null || myobj4 == 'Tidak Ada') {
                    myobj4.remove();
                }
                clearInterval(countdownTimer);
            })
        })
        $('.my-features').on('click', function () {
            var checkbox = $(this);
            var div = checkbox.data('name');
            if (checkbox.is(':checked')) {

                $('#' + div).show();
            } else {
                $('#' + div).hide();
                // $('#' + checkbox.attr('data-name')).hide();
            }
        })
        $(function () {
            $('input:file').change(function (e) {
                var files = e.originalEvent.target.files;
                var validExtensions = ['jpg', 'gif', 'jpeg', 'png'];
                for (var i = 0, len = files.length; i < len; i++) {
                    var n = files[i].name,
                        s = files[i].size,
                        t = files[i].type;
                    if (s > 3100000) {
                        Swal.fire(
                            'Oversize!',
                            'Gambar yang diunggah maksimal berukuran 3MB!',
                            'warning'
                        )
                        $(this).val('');
                        return false;
                    }
                    if ($.inArray($(this).val().split('.').pop().toLowerCase(), validExtensions) == -1) {
                        Swal.fire(
                            'Format Gambar Salah!',
                            'Format gambar yang bisa digunakan hanya : .jpg, .gif, .jpeg. Harap ganti gambar lain atau ubah format gambar tersebut',
                            'warning'
                        )
                        $(this).val('');
                        return false;
                    }
                }
            })
            $('#judul').on('focus', function (e) {
                $(this).removeClass("border-danger");
            })
            $('#angkatan').on('focus', function (e) {
                $(this).removeClass("border-danger");
            })
            $('#deadline').on('focus', function (e) {
                $(this).removeClass("border-danger");
            })
            $('#save').on('click', function (e) {
                event.preventDefault();
                var spinner = $('#loader');
                var formdata = new FormData($('#form_lowongan')[0]);
                formdata.append('deskripsi', CKEDITOR.instances['deskripsi'].getData());
                var desc = CKEDITOR.instances['deskripsi'].getData();
                var lowercase = desc.toLowerCase();
                var b = lowercase.search(/(?:https?|ftp):\/\/[\n\S]+/g);
                var panjang = $('input[name="judul"]').val().length;
                swal.fire({
                    title: "Apakah Data Sudah Benar?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: `Simpan/Sudah Benar`,
                    cancelButtonText: `Batal/Periksa Lagi`,
                    confirmButtonColor: `#28a745`,
                    cancelButtonColor: '#dc3545',
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (panjang > 50) {
                            $('input[name="judul"]').focus();
                            Swal.fire(
                                'Judul Terlalu Panjang',
                                'Harap masukkan Judul tidak melebihi 50 karakter!',
                                'warning'
                            )
                            return false;
                        }
                        if (!$('input[name="judul"]').val()) {
                            $('input[name="judul"]').focus();
                            Swal.fire(
                                'Judul Kosong',
                                'Harap masukkan Judul dari lowongan Anda!',
                                'warning'
                            )
                            return false;
                        }
                        if (!$('select[name="angkatan"]').val()) {
                            $('select[name="angkatan"]').focus();
                            Swal.fire(
                                'Pendidikan Belum Dipilih',
                                'Harap masukkan Rekomendasi Minimal Pendidikan dari lowongan pekerjaan Anda!',
                                'warning'
                            )
                            return false;
                        }
                        if (!$('input[name="gambar"]').val()) {
                            $('input[name="gambar"]').focus();
                            Swal.fire(
                                'Gambar Kosong',
                                'Harap masukkan Gambar dari lowongan Anda (Maksimal 3MB)!',
                                'warning'
                            )
                            return false;
                        }
                        if (!$('input[name="deadline"]').val()) {
                            $('input[name="deadline"]').focus();
                            Swal.fire(
                                'Tanggal kosong',
                                'Harap masukkan Tanggal berakhirnya lowongan pekerjaan!',
                                'warning'
                            )
                            return false;
                        }
                        if (b >= 0) {
                            Swal.fire(
                                'Tedapat Kesalahan',
                                'harap tidak memasukkan LINK atau URL...',
                                'warning'
                            )
                            return false;
                        }
                        spinner.show();
                        $.ajax({
                            type: "POST",
                            url: "<?php echo site_url('Lowongan/Tambah');?>",
                            data: formdata,
                            dataType: "json",
                            processData: false,
                            contentType: false,
                            success: function (data) {
                                if ($.isEmptyObject(data.error) || data.message == "success") {
                                    spinner.hide();
                                    Swal.fire(
                                        'DATA TERSIMPAN!',
                                        'Lowongan berhasil ditambahkan, tunggu konfirmasi dari admin untuk melakukan pengecekan lowongan pekerjaan',
                                        'success'
                                    )
                                    $(".print-error-msg").css('display',
                                        'none');
                                    $("#form_lowongan")[0].reset();
                                } else {
                                    spinner.hide();
                                    $(".print-error-msg").css('display',
                                        'block');
                                    if (data.error.judul) {
                                        $(".1").html(data.error.judul);
                                        $("#judul").addClass(
                                            "border-danger");
                                    } else {
                                        $(".1").html(data.success.judul);
                                        $("#judul").removeClass(
                                            "border-danger");
                                        $("#judul").addClass(
                                            "border-success");
                                    }
                                    if (data.error.angkatan) {
                                        $(".2").html(data.error.angkatan);
                                        $("#angkatan").addClass(
                                            "border-danger");
                                    } else {
                                        $(".2").css('display', 'none');
                                        $("#angkatan").removeClass(
                                            "border-danger");
                                        $("#angkatan").addClass(
                                            "border-success");
                                    }
                                    if (data.error.deadline) {
                                        $(".4").html(data.error.deadline);
                                        $("#deadline").addClass(
                                            "border-danger");
                                    } else {
                                        $(".4").css('display', 'none');
                                        $("#deadline").removeClass(
                                            "border-danger");
                                        $("#deadline").addClass(
                                            "border-success");
                                    }
                                    if (data.error.gambar) {
                                        $(".3").html(data.error.gambar);
                                        $("#gambar").addClass(
                                            "border-danger");
                                    } else {
                                        $(".3").css('display', 'none');
                                        $("#gambar").removeClass(
                                            "border-danger");
                                        $("#gambar").addClass(
                                            "border-success");
                                    }
                                    if (data.error.deskripsi) {
                                        $(".5").html(data.error.deskripsi);
                                        $("#deskripsi").addClass(
                                            "border-danger");
                                    } else {
                                        $(".5").css('display', 'none');
                                        $("#deskripsi").removeClass(
                                            "border-danger");
                                        $("#deskripsi").addClass(
                                            "border-success");
                                    }
                                    Swal.fire(
                                        'DATA GAGAL DISIMPAN!',
                                        '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">Terjadi kesalahan saat menyimpan data, harap perhatikan kembali!</div>',
                                        'error'
                                    )
                                }
                            }
                        });
                    } else {
                        Swal.fire('Data Belum Disimpan', '', 'info')
                        return false;
                    }
                })
            })
            $('#delLowongan').click(function () {
                Swal.fire({
                    icon: 'warning',
                    title: 'DATA DIHAPUS',
                    text: 'Lowongan telah berhasil dihapus dari database',
                })
            })
            $('#delAll').click(function () {
                Swal.fire({
                    icon: 'warning',
                    title: 'DATA DIHAPUS',
                    text: 'Semua Lowongan telah berhasil dihapus dari database',
                })
            })
        })

        $('#deleteAlumninis').click(function () {
            $('#konfirmasiDel').modal({
                show: true
            })
        });
        $('#konfirmasiDel').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var modal = $(this);
            modal.find('.modal-footer #delLowongan').attr('value', button.data('id'));
            Swal.fire(
                'Penting!',
                'Jika Lowongan dihapus, maka informasi lowongan yang akan dihapus dan tersimpan di database akan dihapus semua!',
                'warning'
            )
        })
        $('input').focus(function () {
            if ($("#masuk").is(":hidden")) {
                $("#masuk").attr('hidden', false);
            }
        })
        $('input').focusout(function () {
            if (!$("#masuk").is(":hidden")) {
                $("#masuk").attr('hidden', true);
            }
        })
        $('select').focus(function () {
            if ($("#masuk").is(":hidden")) {
                $("#masuk").attr('hidden', false);
            }
        })
        $('select').focusout(function () {
            if (!$("#masuk").is(":hidden")) {
                $("#masuk").attr('hidden', true);
            }
        })

        function showTambah() {
            var table, rows, switching, i, x, y, shouldSwitch;
            var x = document.getElementById("dataTambah");
            var y = document.getElementById("dataBantuan");
            if (x.style.display === "none") {
                $("#tampilkanTambah").html("Sembunyikan");
                x.style.display = "";
                y.style.display = "";
            } else {
                $("#tampilkanTambah").html("Tambah Lowongan");
                x.style.display = "none";
                y.style.display = "none";
            }
        }
    });
</script>
<script>
    $(document).on('click', '#siapUbah', function (e) {
        e.preventDefault();
        var form = $(this).parents('form');
        console.log($('#nisPass').val());
        if (!$('input[name="modalpass"]').val() || !$('input[name="modalpass2"]').val()) {
            Swal.fire(
                'Empty Field',
                'Harap isi semua field yang kosong!',
                'warning'
            )
            return false;
        }
        if (!$('input[name="modalpass3"]').val()) {
            Swal.fire(
                'Verify Password!',
                'Konfirmasi Password dibutuhkan untuk menyimpan password baru!',
                'warning'
            )
            return false;
        }
        if ($('input[name="modalpass2"]').val() != $('input[name="modalpass3"]').val()) {
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
                    url: "<?php echo base_url() ?>index.php/Page/ubahPasswordAdmin",
                    data: $(form).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        console.log(response.message);
                        if (response.message == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Password berhasil diubah!'
                            })
                            setTimeout(location.reload.bind(location), 1800);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: response.error
                            })
                            $("#ubahPassword")[0].reset();;
                        }
                    }
                });
            } else {
                Swal.fire('Data Belum Disimpan', '', 'info')
                return false;
            }
        })
    })
    CKEDITOR.replace('deskripsi', {
        toolbar: [{
                name: 'document',
                groups: ['mode', 'document', 'doctools'],
                items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates']
            },
            {
                name: 'clipboard',
                groups: ['clipboard', 'undo'],
                items: ['Cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo']
            },
            {
                name: 'editing',
                groups: ['find', 'selection', 'spellchecker'],
                items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt']
            },
            {
                name: 'basicstyles',
                groups: ['basicstyles', 'cleanup'],
                items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-',
                    'RemoveFormat'
                ]
            },
            {
                name: 'paragraph',
                groups: ['list', 'indent', 'blocks', 'align', 'bidi'],
                items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote',
                    'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock',
                    '-', 'BidiLtr', 'BidiRtl', 'Language'
                ]
            },
            '/',
            {
                name: 'styles',
                items: ['Styles', 'Format', 'Font', 'FontSize']
            },
            {
                name: 'colors',
                items: ['TextColor', 'BGColor']
            },
            {
                name: 'tools',
                items: ['Maximize', 'ShowBlocks']
            },
            {
                name: 'others',
                items: ['-']
            },
            {
                name: 'about',
                items: ['About']
            }
        ],
        uiColor: '#28a745',
        disallowedContent: 'a'
    });

    function showTambah() {
        var table, rows, switching, i, x, y, shouldSwitch;
        var x = document.getElementById("dataTambah");
        var y = document.getElementById("dataBantuan");
        if (x.style.display === "none") {
            $("#tampilkanTambah").html("<span>Sembunyikan</span>");
            x.style.display = "";
            y.style.display = "";
        } else {
            $("#tampilkanTambah").html("<span>Tambah Lowongan</span>");
            x.style.display = "none";
            y.style.display = "none";
        }
    }
</script>