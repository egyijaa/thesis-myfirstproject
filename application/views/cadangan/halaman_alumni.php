<head>
    <script>
        function searchFilter(page_num) {
            page_num = page_num ? page_num : 0;
            var keywords = $('#keywords').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>index.php/page/ajaxPaginationData/' + page_num,
                data: 'page=' + page_num + '&keywords=' + keywords,
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
    <style>
        .testing:hover {
            transform: scale(1.3);
        }
        table.dataTable tbody tr.selected {
            color: whitesmoke !important;
            background-color: #343a40 !important;
        }
        .belakang {
            background-color: rgba(255, 255, 255, 0.5);
        }
        .pagination .page-item.active .page-link { background-color: #28a745; }
        .pagination > li > a, .pagination > li > span{color:#28a745}
        .pagination .page-item .page-link:hover {
            background-color: #28a780;
        }
        #loader {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  background: rgba(255,255,255,0.75) url('<?php echo base_url(); ?>/assets/image/tenor.gif?t=<?php echo time();?>') no-repeat center center;
  z-index: 10000;
}
    </style>
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/dist/css/bgye.min.css?t=<?php echo time();?>">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-select/css/select.bootstrap4.min.css">
</head>
<div id="loader"></div>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed loading1">
    <div class="bg1"></div>
    <div class="bg1 bg2"></div>
    <div class="bg1 bg3"></div>
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
                        <?php if (!empty($information)) : foreach ($information as $row) : ?>
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
                                    <?php date_default_timezone_set("Asia/Bangkok"); date_default_timezone_set("Asia/Bangkok"); echo date("d-M-Y",time());?>
                                </p>
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
                                    <a class="nav-link" href="<?php if ($this->session->userdata('akses') != 2){
                                                    echo base_url().'index.php/Lowongan/toLowongan2';
                                                }
                                                else {
                                                    echo base_url().'index.php/Lowongan/toLowongan';
                                                }?>"
                                        title="Halaman Lowongan Pekerjaan"><i class="nav-icon fab fa-stack-overflow"
                                            aria-hidden="true"></i>
                                        <p>Lowongan Pekerjaan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#"><i class=" nav-icon fas fa-id-card"
                                            aria-hidden="true"></i>
                                        <span id="masuk" class="right badge badge-info" hidden>Searching...</span></p>
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
            <div class="loading" style="display: none;">
                <div class="content"><img src="<?php echo base_url() . 'assets/image/loading.gif?t='.time() ?>" /></div>
            </div>
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <?php if ($this->session->userdata('akses')=='0' || $this->session->userdata('akses') == '1') : ?>
                            <h1 class="m-0 text-dark">Daftar Alumni SMA Negeri 3 Pontianak</h1>
                            <?php else : ?>
                            <h1 class="m-0 text-dark">Hai
                                <?php echo $this->session->userdata('ses_nama') ?>! Ayo Cari Temanmu!</h1>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Terakhir Diperbaharui</li>
                                <li class="breadcrumb-item active"><?php if (!empty($terakhir)) { foreach ($terakhir as $list) {
                                   $date = date("d-m-Y H:i:s", strtotime($list['latest'])); 
                                   echo $date;}} ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">

                <!-- Default box -->
                <div class="card belakang">
                    <div class="card-body pb-0">
                        <div class="row d-flex align-items-stretch">
                            <div
                                class="col-12 col-sm-12 col-md-5 align-items-stretch">
                                <div class="card belakang">
                                    <div class="card-header border-bottom-0 text-success">
                                        <strong>Filter</strong>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <select id="urutkanBerdasarkan" name="urutkanBerdasarkan"
                                                    class="form-control belakang" onchange="filterFunction()">
                                                    <option value="0" disabled selected>Silahkan pilih</option>
                                                    <option>Angkatan</option>
                                                    <option>Domisili</option>
                                                    <option>Status Pekerjaan</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12" id="filterAngkatan"
                                                style="margin-top: 15px;display: none;">
                                                <select id="filterAngkatan_item" name="urutkanBerdasarkan"
                                                    class="form-control belakang" onchange="filterAngkatan()"
                                                    onclick="myFunction()">
                                                    <?php

                                                echo "<option disabled selected>Pilih Angkatan (Kelulusan)</option>";
                                                foreach ($angkatan as $row) { ?>

                                                    <option value='<?php echo $row['angkatan']; ?>'>
                                                        <?php echo $row['angkatan']; ?>
                                                    </option>;
                                                    <?php }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-md-12" id="filterKota"
                                                style="margin-top: 15px;display: none;">
                                                <select id="filterKota_item" name="urutkanBerdasarkan belakang"
                                                    class="form-control" onchange="filterKota()"
                                                    onclick="myFunction2()">
                                                    <?php

                                                echo "<option disabled selected>Pilih Kota</option>";
                                                foreach ($kota as $row) { ?>

                                                    <option value='<?php echo $row['KOTA']; ?>'>
                                                        <?php echo $row['KOTA']; ?>
                                                    </option>;
                                                    <?php }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-md-12" id="filterStatus"
                                                style="margin-top: 15px;display: none;">
                                                <select id="filterStatus_item" name="urutkanBerdasarkan belakang"
                                                    class="form-control" onchange="filterStatus()" onclick="myFunction3()">
                                                    <?php

                                                echo "<option disabled selected>Pilih Status</option>";
                                                foreach ($setatus as $row) { ?>

                                                    <option value='<?php echo $row['ID_STATUS']; ?>'>
                                                        <?php echo $row['STATUS']; ?>
                                                    </option>;
                                                    <?php }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-md-12" style="margin-top: 15px;">
                                                <a href="#" id="btn-reset" style="margin-top: 15px;"
                                                    onclick="resetFilter()"><i class="fas fa-sync-alt"></i>Reset
                                                    Filter <span class="fa fa-refresh"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if($this->session->userdata('akses')!='2') :?>
                            <div class="col-12 col-sm-12 col-md-7">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- /.card -->
                                        <!-- DONUT CHART -->
                                        <div id="ygSatu" class="card card-danger belakang">
                                            <div class="card-header">
                                                <h3 class="card-title">Donut Chart</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="remove">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <?php if (!empty($setatusTotal)) : foreach ($setatusTotal as $row) : ?>
                                            <div class="card-body" >
                                                <canvas id="donutChart" data-satu="<?php echo $row['pertama']; ?>"
                                                    data-dua="<?php echo $row['kedua']; ?>"
                                                    data-tiga="<?php echo $row['ketiga']; ?>"
                                                    data-empat="<?php echo $row['keempat']; ?>"
                                                    data-lima="<?php echo $row['kelima']; ?>"
                                                    data-enam="<?php echo $row['keenam']; ?>"
                                                    data-tujuh="<?php echo $row['ketujuh']; ?>"
                                                    data-delapan="<?php echo $row['kedelapan']; ?>"
                                                    data-sembilan="<?php echo $row['kesembilan']; ?>"
                                                    data-sepuluh="<?php echo $row['kesepuluh']; ?>"
                                                    data-sebelas="<?php echo $row['kesebelas']; ?>"
                                                    data-duabelas="<?php echo $row['keduabelas']; ?>"
                                                    style="min-height: 150px; height: 300px; max-height: 350px; max-width: 100%;"></canvas>
                                            </div>
                                            <?php endforeach;?>
                                            <?php endif; ?>
                                            <!-- /.card-body -->
                                        </div>
                                        <div class="post-list2" id="postList2">
                                            <div id="ygLain" class="card card-success" style=" display:none;">
                                                <div class="card-header">
                                                    <h3 class="card-title">Bar Data (Tentukan Status Pekerjaan terlebih Dahulu)</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="remove">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="chart">
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.col (RIGHT) -->
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card belakang">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-group" style="visibility: hidden;">
                                            <div class="input-group mb-0">
                                                <input id="keywords" name="cari" type="text"
                                                    class="form-control belakang"
                                                    placeholder="Username / Nama / Angkatan / Domisili"
                                                    onkeyup="searchFilter()"">
                                                <input style=" display:none;" id="keywords2" name="cari" type="text"
                                                    class="form-control belakang"
                                                    placeholder="Cari Nama Alumni (Berdasarkan FIlter Angkatan)"
                                                    onkeyup="filterAngkatan()"">
                                                <input style=" display:none;" id="keywords3" name="cari" type="text"
                                                    class="form-control belakang"
                                                    placeholder="Cari Nama Alumni (Berdasarkan FIlter Domisili)"
                                                    onkeyup="filterKota()"">
                                                <input style=" display:none;" id="keywords4" name="cari" type="text"
                                                    class="form-control belakang"
                                                    placeholder="Cari Nama Alumni (Berdasarkan Filter Status Pekerjaan)"
                                                    onkeyup="filterStatus()"">
                                                <div class=" input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fa fa-search"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if($this->session->flashdata('pesanHapus')){echo $this->session->flashdata('pesanHapus');};?>
                                <div class="post-list" id="postList">
                                    <div class="card-body">
                                        <table id="dataAlumni"
                                            class="table table-bordered table-striped table-responsive-md">
                                            <thead>
                                                <tr style="color:#28a745">
                                                    <th>Username</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Angkatan <br> Kelulusan</th>
                                                    <th>Domisili</th>
                                                    <?php if ($this->session->userdata('akses')=='0' || $this->session->userdata('akses') == '1') : ?>
                                                    <th>Active</th>
                                                    <?php endif; ?>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($posts)) : foreach ($posts as $row) : ?>
                                                <tr>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td><?php echo $row['nama_lengkap']; ?></td>
                                                    <td><?php echo $row['angkatan']; ?></td>
                                                    <td><?php if (!empty($row['kota'])) {
                                                        echo '<span class =" badge badge-success ">'.$row['kota'].'<span> ';} else {
                                                            echo '<span class =" badge badge-warning ">Belum Diatur<span> ';
                                                        } ?></td>
                                                    <?php if ($this->session->userdata('akses')=='0' || $this->session->userdata('akses') == '1') : ?>
                                                    <td>
                                                        <?php
                                                                    if ($row['active'] == '0') {
                                                                        echo '<label class="switch zoomPilih">
                                                                            <input  name="cobaye" type="checkbox" id="checkActive' . $row['username'] . '" data-id="' . $row['username'] . '">
                                                                            <span class="slider round"></span>
                                                                            </label>';
                                                                    } else {
                                                                        echo '<label class="switch zoomPilih">
                                                                            <input name="cobaye" type="checkbox" id="checkActive' . $row['username'] . '" data-id="' . $row['username'] . '" checked>
                                                                            <span class="slider round"></span>
                                                                        </label>';
                                                                    }
                                                                    ?>
                                                    </td>
                                                    <?php endif; ?>
    
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" title="Detail" data-toggle="modal"
                                                                data-target="#detailModal" name="detil"
                                                                data-ses="<?php $this->session->userdata('ses_id') ?>"
                                                                data-username="<?php echo $row['username']; ?>"
                                                                data-namalengkap="<?php echo $row['nama_lengkap']; ?>"
                                                                data-foto_profil="<?php if (isset($row['foto_profil'])) {
                                                                                                                                                                                                                                                        echo $row['foto_profil'];
                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                        echo "blank.png";
                                                                                                                                                                                                                                                    } ?>"
                                                                data-email="<?php echo $row['email']; ?>"
                                                                data-password="<?php echo $row['pass']; ?>"
                                                                data-angkatan="<?php echo $row['angkatan']; ?>"
                                                                data-ig="<?php echo $row['instagram']; ?>"
                                                                data-twitter="<?php echo $row['twitter']; ?>"
                                                                data-alamat_sekarang="<?php echo $row['alamat_sekarang']; ?>"
                                                                data-no_telepon="<?php echo $row['no_telepon']; ?>"
                                                                data-status="<?php echo $row['status']; ?>"
                                                                data-keterangan="<?php echo $row['keterangan']; ?>"
                                                                class="btn btn-info zoomPilih" href="#detailModal"
                                                                value="<?php echo $row['username']; ?>"><i
                                                                    class="fas fa-info-circle"></i></button>
                                                            <?php if($this->session->userdata('akses')=='0' || $this->session->userdata('akses')=='1'):?>
                                                            <button data-target="#konfirmasiDel" name="detil"
                                                                data-id="<?php echo $row['username']; ?>"
                                                                data-toggle="modal" class="btn btn-danger zoomPilih"
                                                                href="#detailModal"
                                                                value="<?php echo $row['username']; ?>"><i
                                                                    class="fas fa-user-slash"></i></button>
                                                            <?php endif;?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach;
                                                else : ?>
                                                <tr>
                                                    <td colspan="6"><?php echo $this->session->flashdata('#error-Alumni');?>
                                                    </td>
                                                </tr>
                                                <?php endif; ?>
    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <div class="input-group mb-3">
                                        <form action="#" method="POST">
                                                <button id="download" name="download" class="btn btn-success" value="">Download Data Alumni (Excel)</a>
                                        </form>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <footer class="main-footer float-right text-sm text-dark">
            <strong>Copyright &copy; 2021 <a href="https://sman3ptk.sch.id/" target="_blank" style="color: #28a745"> SMA
                    Negeri 3 Pontianak </a>&<a href="https://www.instagram.com/egyijaa_/" target="_blank"
                    style="color: #28a745"> Egy Ijaa</a> | Theme by : <a href="https://adminlte.io/" target="_blank"
                    style="color: #28a745">AdminLTE</a></strong>. All rights
            reserved.
        </footer>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->
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
                        <button id="siapUbah" name="siapUbah" type="submit" class="btn btn-danger">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="detailModal" class="modal fade show">
        <div class="modal-dialog" style="max-width: 500px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">DATA ALUMNI</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img id="profilDetail" src=""
                                        class="profile-user-img img-fluid img-circle zoomPilih testing"
                                        alt="Belum diatur" style="width:150px;height:150px;object-fit:cover">
                                </div>
                                <h3 id="namalengkap" class="profile-username text-center"></h3>
                                <p id="status" class="text-muted text-center"></p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item fas fa-envelope">
                                        <a id="email" class="float-right"></a>
                                    </li>
                                    <?php if ($this->session->userdata('akses')=='0' || $this->session->userdata('akses') == '1') : ?>
                                    <li id="noHp" class="list-group-item fas fa-phone-square-alt" value="0" ;>
                                        <a id="notelepon" class="float-right"></a>
                                    </li>
                                    <li id="resetP" class="list-group-item fas fa-unlock-alt">
                                        <button href="#detailModal" data-toggle="modal" data-target="#konfirmasiDel3"
                                            id="resetPassword" class="btn btn-warning float-right"></button>
                                    </li>
                                    <?php else : ?>
                                    <?php endif; ?>
                                    <li class="list-group-item fab fa-instagram">
                                        <a id="instagram" class="float-right"></a>
                                    </li>
                                    <li class="list-group-item fab fa-twitter">
                                        <a id="twitter" class="float-right"></a>
                                    </li>
                                    <?php if ($this->session->userdata('akses')=='2') : ?>
                                    <div class="text-center">
                                        <form action="<?php echo base_url(); ?>index.php/Page/toProfile" method="POST">
                                            <div id="tampil" name="tampil">
                                            </div>
                                        </form>
                                    </div>
                                    <?php endif; ?>
                                    <div class="text-center">
                                        <form action="<?php echo base_url(); ?>index.php/page/toProfilebyOther"
                                            method="POST">
                                            <button id="lihatProfil" name="lihatProfil"
                                                class="btn btn-info btn-block zoomPilih effect01" value=""><span>Lihat
                                                    Profil</span></a>
                                        </form>
                                    </div>
                                </ul>
                                <div class="text-center">
                                    <button id="tutup" name="tutup" type="button"
                                        class="btn btn-success btn-block zoomPilih effect01"
                                        data-dismiss="modal"><span>Tutup</span>
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
                <div class="modal-header bg-warning">
                    <h4 class="modal-title">Konfirmasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus user ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                    <form action="<?php echo base_url(); ?>index.php/page/delAlumni" method="POST">
                        <button id="delAlumni" name="delAlumni" class="btn btn-danger" value="">Ya</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="konfirmasiDel2" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title">Konfirmasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus semua user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                    <form action="<?php echo base_url(); ?>index.php/page/delAll" method="POST">
                        <button id="delAll" name="delAll" class="btn btn-danger" value="">Ya</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="konfirmasiDel3" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title">Konfirmasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin mereset password dari user ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                    <form action="<?php echo base_url(); ?>index.php/page/resetPassword" method="POST">
                        <button id="delPass" name="delPass" class="btn btn-danger" value="">Ya</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="loading2">
        <img id="loading-image" src="<?php echo base_url() . 'assets/image/tenor.gif?t='.time() ?>" alt="Loading..." />
    </div>
</body>
<script>
  $(document).ready(function() {
      var akses = "<?php echo $this->session->userdata('akses') ?>";
      if (akses != '2') {
          $("#dataAlumni").DataTable({
              "autoWidth": false,
              select: true,
              "oLanguage": {
                "sSearch": "<i class='fas fa-search'></i> Cari: ",
                "oPaginate": {
                    "sPrevious": "<i class='fas fa-chevron-circle-left'></i>",
                    "sNext": "<i class='fas fa-chevron-circle-right'></i>"
                },
                "sZeroRecords" : '<div class="alert alert-warning" align="center"><h4><i class="fas fa-exclamation-circle"></i> Data Tidak Ditemukan! <i class="fas fa-exclamation-circle"></i></h4></div>',
                "sInfo": "Showing <strong class='text-success'>_START_</strong> to <strong class='text-success'>_END_</strong> of <strong class='text-primary'>_TOTAL_</strong> entries"
                },
              "buttons": [{
                  extend: 'copy',
                  text: '<i class="fas fa-copy"></i> Copy',
                  className: 'bg-light text-dark'
              }, {
                  extend: 'excel',
                  text: '<i class="fas fa-file-excel"></i> Excel',
                  className: 'bg-success'
              }, {
                  extend: 'pdf',
                  text: '<i class="fas fa-file-pdf"></i> PDF',
                  className: 'bg-danger'
              }, {
                  extend: 'print',
                  text: '<i class="fas fa-print"></i> Print',
                  className: 'bg-info'
              }, {
                  extend: 'colvis',
                  text: '<i class="fas fa-eye"></i> Lihat Kolom',
                  className: 'bg-dark'
              }]
          }).buttons().container().appendTo('#dataAlumni_wrapper .col-md-6:eq(0)');
        //   $("input").attr('name', 'search1');
          
      } else {
          $("#dataAlumni").DataTable({
              "responsive": true,
              "lengthChange": false,
              "autoWidth": false,
              //"iDisplayLength": 10, (Default)
              "oLanguage": {
                "sSearch": "<i class='fas fa-search'></i> Cari: ",
                "oPaginate": {
                    "sPrevious": "<i class='fas fa-chevron-circle-left'></i>",
                    "sNext": "<i class='fas fa-chevron-circle-right'></i>"
                },
                "sZeroRecords" : '<div class="alert alert-warning" align="center"><h4><i class="fas fa-exclamation-circle"></i> Data Tidak Ditemukan! <i class="fas fa-exclamation-circle"></i></h4></div>',
                "sInfo": "Showing <strong class='text-success'>_START_</strong> to <strong class='text-success'>_END_</strong> of <strong class='text-primary'>_TOTAL_</strong> entries"
                },
          });
      }
  });
</script>
<script>
        $('input[name="cobaye"]').click(function () {
            var id = $(this).data('id');
            updActive(id);

        })

        function updActive(username) {
            var spinner = $('#loader');
            spinner.show();
            var checkBox = document.getElementById("checkActive" + username);
            var u = 0;
            var n = username;
            if (checkBox.checked == true) {
                u = 1;
            }
            console.log(checkBox);
            $.ajax({
                url: "<?php echo base_url() ?>index.php/page/updateActive", //enter the login controller URL here
                type: "POST",
                dataType: "json",
                data: {
                    active: u,
                    username: n
                },
                success: function (data) {
                    spinner.hide();
                    if (u == 1) {
                        Swal.fire(
                            'Akun Aktif',
                            'Akun baru saja diaktifkan, akun dapat login dan mengakses sistem',
                            'info'
                        )
                    }
                    if (u == 0) {
                        Swal.fire(
                            'Akun non-aktif',
                            'Akun baru saja di-nonAktifkan, akun tidak dapat login dan mengakses sistem',
                            'info'
                        )
                    }
                },
                error: function (data) {
                    spinner.hide();
                    alert("Terjadi kesalahan");
                    console.log(data);
                }
            });
            return false;
        }
</script>
<script>
    $(document).ready(function () {
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
        $('#detailModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var phone1 = button.data('no_telepon');
            var ig = button.data('ig');
            var twitter = button.data('twitter');
            var fb = button.data('fb');
            var ses = "<?php echo $_SESSION['ses_id'] ?>";
            var a = button.data('username');
            phone = phone1.toString().slice(0, -5) + "xxxxx";
            var modal = $(this);
            modal.find('.modal-body #profilDetail').attr('src',
                "<?php echo base_url(); ?>/assets/image/foto_profil/" + button.data('foto_profil'));
            modal.find('.modal-body #namalengkap').html(button.data('namalengkap'));
            modal.find('.modal-body #status').html(button.data('status') + " : " + button.data(
                'keterangan'));
            modal.find('.modal-body #email').html(button.data('email'));
            modal.find('.modal-body #agama').html(button.data('agama'));
            modal.find('.modal-body #notelepon').html(phone);
            modal.find('.modal-body #resetPassword').html('Reset Password');
            modal.find('.modal-body #resetPassword').attr('value', button.data('username'));
            if (ig != '') {
                modal.find('.modal-body #instagram').html(ig);
            } else {
                modal.find('.modal-body #instagram').html('Tidak Ada');
            }
            if (twitter != '') {
                modal.find('.modal-body #twitter').html(twitter);
            } else {
                modal.find('.modal-body #twitter').html('Tidak Ada');
            }
            if (fb != '') {
                modal.find('.modal-body #fb').html(fb);
            } else {
                modal.find('.modal-body #fb').html('Tidak Ada');
            }
            modal.find('.modal-body #alamatasal').html(button.data('alamat_asal'));
            modal.find('.modal-body #domisili').html(button.data('kota'));
            modal.find('.modal-body #alamatsekarang').html(button.data('alamat_sekarang'));
            if (a == ses) {
                var para = document.createElement("BUTTON");
                para.id = 'baru';
                para.className = 'btn btn-info btn-block zoomPilih'; // Create a <p> element
                para.innerHTML = "<b>Update Profil</b>"; // Insert text
                document.getElementById("tampil").appendChild(para);
                $("#lihatProfil").attr('hidden', true);
            }
            $('#detailModal').on('hidden.bs.modal', function () {
                var myobj = document.getElementById("baru");
                if (myobj != null) {
                    myobj.remove();
                }
                $("#lihatProfil").attr('hidden', false);
            })
            modal.find('.modal-body #lihatProfil').attr('value', button.data('username'));
            $('#noHp').click(function () {
                phone = button.data('no_telepon');
                modal.find('.modal-body #notelepon').html(phone);
            })
        })
        $('#konfirmasiDel3').on('show.bs.modal', function (event) {
            var modal = $(this);
            modal.find('.modal-footer #delPass').attr('value', $('#resetPassword').val());
        })
        $('#delPass').click(function () {
            Swal.fire({
                title: '<strong><i class="fa fa-thumbs-up"></i> PASSWORD DIRESET!</strong>',
                icon: 'info',
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Mengerti!',
                confirmButtonAriaLabel: 'Thumbs up, Mengerti!',
            })
        })
        $('#delAlumni').click(function () {
            Swal.fire({
                title: '<strong><i class="fa fa-thumbs-up"></i> Akun Berhasil Dihapus</strong>',
                icon: 'info',
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Mengerti!',
                confirmButtonAriaLabel: 'Thumbs up, Mengerti!',
            })
        })
        $('#konfirmasiDel').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var modal = $(this);
            modal.find('.modal-footer #delAlumni').attr('value', button.data('id'));
            Swal.fire({
                title: '<strong>PENTING, MOHON DIBACA!</strong>',
                icon: 'info',
                html: 'Jika akun Alumni dihapus maka segala hal yang berkaitan dengan akun tersebut juga terhapus<br><br>' +
                    'Seperi<b> LOWONGAN PEKERJAAN</b>, yang pernah diunggah/upload oleh akun tersebut!<br><br>' +
                    'Harap Pastikan<b> LOWONGAN PEKERJAAN</b> dari akun yang akan dihapus sudah tidak dibutuhkan!',
                focusConfirm: false,
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Mengerti!',
                confirmButtonAriaLabel: 'Thumbs up, Mengerti!',
            })
        })
        $('#konfirmasiDel2').on('show.bs.modal', function (event) {
            Swal.fire({
                title: '<strong>PENTING, MOHON DIBACA!</strong>',
                icon: 'info',
                html: 'Jika akun Alumni dihapus maka segala hal yang berkaitan dengan akun tersebut juga terhapus<br><br>' +
                    'Seperi<b> LOWONGAN PEKERJAAN</b>, yang pernah diunggah/upload oleh akun tersebut!<br><br>' +
                    'Harap Pastikan<b> LOWONGAN PEKERJAAN</b> dari akun yang akan dihapus sudah tidak dibutuhkan!',
                focusConfirm: false,
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Mengerti!',
                confirmButtonAriaLabel: 'Thumbs up, Mengerti!',
            })
        })
    });
</script>
<script>
    $(document).on('click', '#siapUbah', function (e) {
        e.preventDefault();
        var form = $(this).parents('form');
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
    var e = document.getElementById("ygSatu");
    var f = document.getElementById("ygLain");

    function filterFunction() {
        var table, rows, switching, i, x, y, shouldSwitch;
        var x = document.getElementById("filterAngkatan");
        var y = document.getElementById("filterKota");
        var z = document.getElementById("filterStatus");
        var p = document.getElementById("postList2");
        table = document.getElementById("dataAlumni");
        switching = true;
        if (document.getElementById('urutkanBerdasarkan').value == "Angkatan") {
            if (x.style.display === "none") {
                x.style.display = "block";
                y.style.display = "none";
                z.style.display = "none";
                e.style.display = "block";
                f.style.display = "none";
                p.style.display = "none";
            } else {
                x.style.display = "none";
            }
        } else if (document.getElementById('urutkanBerdasarkan').value == "Domisili") {
            if (y.style.display === "none") {
                y.style.display = "block";
                x.style.display = "none";
                z.style.display = "none";
                e.style.display = "block";
                f.style.display = "none";
                p.style.display = "none";
            } else {
                y.style.display = "none";
            }
        } else if (document.getElementById('urutkanBerdasarkan').value == "Status Pekerjaan") {
            if (z.style.display === "none") {
                z.style.display = "block";
                y.style.display = "none";
                x.style.display = "none";
                e.style.display = "none";
                f.style.display = "block";
                p.style.display = "block";
            } else {
                z.style.display = "none";
                e.style.display = "block";
                f.style.display = "none";
            }
        }
    }
    var a = document.getElementById("keywords");
    var b = document.getElementById("keywords2");
    var c = document.getElementById("keywords3");
    var d = document.getElementById("keywords4");

    function myFunction() {
        var x = document.getElementById("filterAngkatan_item").options[0].text;
        if (document.getElementById('filterAngkatan_item').value == x) {
            if (b.style.display === "none") {
                a.style.display = "none";
                b.style.display = "block";
                c.style.display = "none";
                d.style.display = "none";
            } else {
                b.style.display = "none";
            }
        }
    }

    function myFunction2() {
        var y = document.getElementById("filterKota_item").options[0].text;
        if (document.getElementById('filterKota_item').value == y) {
            if (c.style.display === "none") {
                a.style.display = "none";
                b.style.display = "none";
                c.style.display = "block";
                d.style.display = "none";
            } else {
                c.style.display = "none";
            }
        }
    }

    function myFunction3() {
        var y = document.getElementById("filterStatus_item").options[0].text;
        if (document.getElementById('filterStatus_item').value == y) {
            if (d.style.display === "none") {
                a.style.display = "none";
                b.style.display = "none";
                c.style.display = "none";
                d.style.display = "block";
                $(document).on('change', 'select', function () {
                    // Does some stuff and logs the event to the console
                    var kota = $('#filterStatus_item').val();
                    var sel = document.getElementById("filterStatus_item");
                    var kota2= sel.options[sel.selectedIndex].text;
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url(); ?>index.php/page/ajaxPaginationData2',
                        data: 'filterStatus_item=' + kota + '&filterStatus_item2=' + kota2,
                        beforeSend: function () {
                            $('.loading').show();
                        },
                        success: function (html) {
                            $('#postList2').html(html);
                            $('.loading').fadeOut("slow");
                        }
                    });
                });
            } else {
                d.style.display = "none";
            }
        }
    }

    function filterAngkatan(page_num) {
        page_num = page_num ? page_num : 0;
        var angkatan = $('#filterAngkatan_item').val();
        var keywords2 = $('#keywords2').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>index.php/page/ajaxPaginationData/' + page_num,
            data: 'page=' + page_num + '&filterAngkatan_item=' + angkatan + '&keywords2=' + keywords2,
            beforeSend: function () {
                $('.loading').show();
            },
            success: function (html) {
                $('#postList').html(html);
                $('.loading').fadeOut("slow");
            }
        });
    }

    function filterKota(page_num) {
        page_num = page_num ? page_num : 0;
        var kota = $('#filterKota_item').val();
        var keywords3 = $('#keywords3').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>index.php/page/ajaxPaginationData/' + page_num,
            data: 'page=' + page_num + '&filterKota_item=' + kota + '&keywords3=' + keywords3,
            beforeSend: function () {
                $('.loading').show();
            },
            success: function (html) {
                $('#postList').html(html);
                $('.loading').fadeOut("slow");
            }
        });
    }

    function filterStatus(page_num) {
        page_num = page_num ? page_num : 0;
        var sel = document.getElementById("filterStatus_item");
        var kota= sel.options[sel.selectedIndex].text;
        var keywords4 = $('#keywords4').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>index.php/page/ajaxPaginationData/' + page_num,
            data: 'page=' + page_num + '&filterStatus_item=' + kota + '&keywords4=' + keywords4,
            beforeSend: function () {
                $('.loading').show();
            },
            success: function (html) {
                $('#postList').html(html);
                $('.loading').fadeOut("slow");
            }
        });
    }

    function resetFilter() {
        $("#urutkanBerdasarkan").val(0);
        var x = document.getElementById("filterAngkatan");
        var y = document.getElementById("filterKota");
        var z = document.getElementById("filterStatus");
        if (x.style.display == "block" || y.style.display == "block" || z.style.display == "block") {
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "none";
        }
        searchFilter();
    }
    $(window).on('load', function () {
        $(".loading2").fadeOut("slow", function () {
            $('body').removeClass('loading1');
        });
    });
</script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>/assets/adminLte/plugins/chart.js/Chart.min.js?t=<?php echo time();?>"></script>
<!-- Page specific script -->
<script>
    $(function () {
        var satu = $("#donutChart").data("satu");
        var dua = $("#donutChart").data("dua");
        var tiga = $("#donutChart").data("tiga");
        var empat = $("#donutChart").data("empat");
        var lima = $("#donutChart").data("lima");
        var enam = $("#donutChart").data("enam");
        var tujuh = $("#donutChart").data("tujuh");
        var delapan = $("#donutChart").data("delapan");
        var sembilan = $("#donutChart").data("sembilan");
        var sepuluh = $("#donutChart").data("sepuluh");
        var sebelas = $("#donutChart").data("sebelas");
        var duabelas = $("#donutChart").data("duabelas");
        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: [
                'Anggota Aparat/Militer',
                'Belum/Tidak Bekerja',
                'Juru Masak',
                'Kedokteran/Kesehatan',
                'Kuasa Hukum',
                'Mengurus Rumah Tangga',
                'Pegawai (PNS/BUMN/Swasta)',
                'Pejabat Negara/Daerah',
                'Pelajar/Mahasiswa',
                'Pengusaha/Wiraswasta',
                'Pensiunan',
                'Tenaga Pengajar/Pendidik',
            ],
            datasets: [{
                data: [empat, satu, sepuluh, sebelas, duabelas, dua, tujuh, delapan, tiga, enam,
                    sembilan, lima
                ],
                backgroundColor: ['#4b6584', '#000000', '#eb3b5a', '#d2d6de', '#3c8dbc', '#a55eea',
                    '#fed330', '#fa8231', '#20bf6b', '#C0392B', '#7f8fa6', '#2f3640'
                ],
            }],
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })
    })
</script>