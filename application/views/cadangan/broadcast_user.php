
<head>
<link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/dist/css/bgye.min.css?t=<?php echo time();?>">
    <script>
        function searchFilter(page_num) {
            page_num = page_num ? page_num : 0;
            var keywords = $('#keywords').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>index.php/Broadcast/ajaxPaginationData/' + page_num,
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
    <style>
        /* .belakang {
            width: auto !important;
            background-position: center center;
            background-size: cover;
            backface-visibility: hidden;
            animation: slideBg 50s ease-out infinite;
            background-image: url('<?php echo base_url() . 'assets/image/foto1.jpg?t='.time() ?>');
            border-radius: 3% 3% 20% 20%;
            box-shadow: 0px 0px 0px 8px rgba(0,255,0,0.5);  
        }
        @keyframes slideBg {
            0% {
                background-image: url('<?php echo base_url() . 'assets/image/foto2.jpg?t='.time() ?>');
            }

            25% {
                background-image: url('<?php echo base_url() . 'assets/image/foto3.jpg?t='.time() ?>');
            }

            50% {
                background-image: url('<?php echo base_url() . 'assets/image/foto4.jpg?t='.time() ?>');
            }

            75% {
                background-image: url('<?php echo base_url() . 'assets/image/foto5.jpg?t='.time() ?>');
            }

            100% {
                background-image: url('<?php echo base_url() . 'assets/image/foto6.jpg?t='.time() ?>');
            }
        } */
        .belakang {
            background-color: rgba(255,255,255,0.3); 
        }
        .hehe {
            border-radius: 5% 5% 10% 10%;
            box-shadow: 0px 0px 0px 5px rgba(0,0,0,0.7); 
        }
         
        @media only screen and (min-width: 768px) and (max-width: 995px) {
            .testDulu {
                width: auto !important;
                height: 490px;
            }
            .gambarNi {
                width: auto !important;
                height: 270px;
            }
        }

        /* penggunaan media query pada mobile layout */
        @media only screen and (min-width: 480px) and (max-width: 767px) {
            .dikit {
                width: 50%;
            }
            .testDulu {
                width: auto !important;
                height: 450px;
            }
            .gambarNi {
                width: auto !important;
                height: 250px;
            }
            .card-title{
                font-size: 16px;
            }
            .card-text{
                font-size: 12px;
            }
            .card-title1{
                font-size: 12px;
            }
            .checkL{
                font-size: 12px;
            }
        }

        @media only screen and (min-width: 180px) and (max-width: 479px) {
            .dikit {
                width: 70%;
                margin: auto;
            }
            .testDulu {
                width: auto !important;
                height: 370px;
            }
            .card-title{
                font-size: 12px;
            }
            .card-text{
                font-size: 10px;
            }
            .card-title1{
                font-size: 12px;
            }
            .checkL{
                font-size: 10px;
            }
            .gambarNi {
                width: auto !important;
                height: 200px;
            }
        }

        /* penggunaan media query pada default monitor layout */
        @media only screen and (min-width: 996px) {
            .testDulu {
                max-width: 100%;
                max-height: 100%;
                width: auto !important;
                height: 600px;
            }
            .gambarNi {
                max-width: 100%;
                max-height: 100%;
                width: auto !important;
                height: 400px;
            }
        }
    </style>
</head>
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
                        <span class="d-none d-md-inline"><?php echo $this->session->userdata('ses_id').' ' ?><i class="fas fa-caret-down"></i></span>
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
                                        data-id="<?php echo $this->session->userdata('ses_id')?>"
                                        data-toggle="modal" class="btn btn-flat btn-outline-danger zoomPilih"
                                        href="#loginModal"
                                value="<?php echo $this->session->userdata('ses_id').' ' ?>"><i class="fas fa-lock"></i> Ubah Password</button>
                            <?php elseif ($this->session->userdata('akses') == '2'):?>
                            <a href="<?php echo base_url(); ?>index.php/page/toProfile"
                                class="btn btn-flat btn-outline-primary zoomPilih"><i class="fas fa-id-card"></i> Profile</a>
                            <?php endif;?>
                            <a href="#" class="btn btn-flat btn-outline-danger float-right zoomPilih" data-toggle="modal"
                                data-target="#myModal"><i class="fas fa-sign-out-alt"></i> Sign out</a>
                        </li>
                    </ul>
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
                                <p class="text"><?php date_default_timezone_set("Asia/Bangkok"); echo date("d-M-Y",time());?></p>
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
                                    <a class="nav-link active" href="#" title="Halaman Broadcast"><i
                                            class="nav-icon fas fa-bullhorn" aria-hidden="true"></i>
                                        <p>Broadcast <span id="masuk" class="right badge badge-info" hidden>Inputing...</span></p>
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
                        <li class="nav-item noHover" style="<?php if($this->session->userdata('akses')=='1') {echo 'margin : 60% 0 0 0';} else {echo 'margin : 40% 0 0 0';} ?>">
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
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Broadcast/Pengumuman</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Terakhir Diperbaharui</li>
                                <li class="breadcrumb-item active"><?php if (!empty($terakhir)) { foreach ($terakhir as $list) {
                                    $date = date("d-m-Y H:i:s", strtotime($list['published'])); 
                                    echo $date;}} ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card belakang">
                                <div class="card-body">
                                    <div class="col-md-10 mx-auto">
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <?php $p = 1;?>
                                                <?php if (!empty($gambar)) : foreach ($gambar as $list) : ?>
                                                    <li data-target="#carouselExampleControls" data-slide-to="<?php echo $p; ?>" class="<?php if($p == 1){echo ' active';} ?>"></li>
                                                <?php $p++;?>
                                                <?php endforeach;?>
                                                <?php endif; ?>
                                            </ol>
                                            <div class="carousel-inner">
                                                <?php $i = 1;?>
                                                <?php if (!empty($gambar)) : foreach ($gambar as $row) : ?>
                                                    <div class="<?php if($i != 1) {
                                                        echo 'carousel-item';
                                                        }
                                                        else {
                                                            echo 'carousel-item active';
                                                        };?>">
                                                        <img class="d-block mx-auto w-100 hehe"
                                                            src="<?php echo base_url('assets/image/broadcast/'.$row['gambar']) ?>"
                                                            alt="1 slide">
                                                            <div class="carousel-caption">
                                                                <h3 class="shine-me"><?php echo $row['judul'];?></h3>
                                                                <?php if(!empty($row['expired'])) :?>
                                                                    <?php $date = strtotime($row['expired']) - time();?>
                                                                    <p class="bg-gradient-cyan">Berlangsung Pada Tanggal : <?php $date = date("d-m-Y H:i:s", strtotime($row['expired'])); echo $date;?></p>
                                                                <?php else :?>
                                                                    <p class=" bg-gradient-fuchsia">Dipublikasikan pada: <?php $date = date("d-m-Y H:i:s", strtotime($row['published'])); echo $date;?></p>
                                                                <?php endif; ?>
                                                            </div>
                                                    </div>
                                                <?php $i++;?>
                                                <?php endforeach;?>
                                                <?php endif; ?>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                                data-slide="prev">
                                                <span class="bg-dark carousel-control-prev-icon rounded-circle p-3"
                                                    aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                                data-slide="next">
                                                <span class="bg-dark carousel-control-next-icon rounded-circle p-3"
                                                    aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label id="cari" style="color:#28a745;">Cari Broadcast</label>
                                        <div id="cari2" class="input-group mb-3">
                                            <input id="keywords" name="cari" type="text" class="form-control"
                                                placeholder="Judul Pengumuman" onkeyup="searchFilter()">
                                            <div class=" input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fa fa-search"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-list" id="postList" >
                                            <div class="row" id="dataBroadcast" >
                                                <?php if (!empty($posts)) : foreach ($posts as $row) : ?>
                                                <div class="col-md-4 mb-3 dikit">
                                                    <div class="card testDulu">
                                                        <div class="position-absolute px-3 py-2 text-white"
                                                            style="background-color: rgba(0, 0, 0, 0.5)">
                                                            <?php if(!empty($row['expired'])) :?>
                                                            <?php $date = strtotime($row['expired']) - time();?>
                                                            <?php if ( $date > 0 ){
                                                                    echo '<span class =" badge badge-success waktu">UPCOMING!<span> ';
                                                                }
                                                                else if ($date < 0 && $date > -54000){
                                                                    echo '<span class =" badge badge-warning waktu2">SEDANG BERLANGSUNG!<span> ';
                                                                } 
                                                                else {
                                                                    echo '<span class =" badge badge-danger ">EXPIRED<span> ';
                                                                }?>
                                                            <?php else :?>
                                                                <span class =" badge badge-success">INFORMASI<span>
                                                            <?php endif;;?>    
                                                            </div>
                                                        <img src="<?php echo base_url('assets/image/broadcast/'.$row['gambar']) ?>?t=<?php echo time();?>"
                                                            class="card-img-top gambarNi" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?php echo $row['judul']; ?></h5>
                                                            <p class="card-text">
                                                                <small class="text-muted">
                                                                    By. <?php echo $row['nama'].' (Admin)'; ?>
                                                                </small>
                                                                <br>
                                                                <?php if($row['expired'] != null) : ?>
                                                                    <small class="text-muted">
                                                                    Berlangsung Pada : <?php echo $row['expired']; ?>
                                                                    </small>
                                                                <?php endif; ?>
                                                                <br>
                                                                <!-- <small class="text-muted"> Minimal Pendidikan :
                                                                    <?php $date = date("d-m-Y H:i:s", strtotime($row['published'])); echo $date;?>
                                                                </small> -->
                                                            </p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="btn-group">
                                                                <button type="button" title="Detail" data-toggle="modal" data-target="#detailModal"
                                                                name="detil"
                                                                data-id_broadcast="<?php echo $row['id_broadcast']; ?>"
                                                                data-nip="<?php echo $row['nip']; ?>"
                                                                data-namalengkap="<?php echo $row['nama']; ?>"
                                                                data-gambar="<?php if (isset($row['gambar'])) {
                                                                                                                                                                                                                                                    echo $row['gambar'];
                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                    echo "blank.png";
                                                                                                                                                                                                                                                } ?>"
                                                                data-konten="<?php echo $row['konten']; ?>"
                                                                data-judul="<?php echo $row['judul']; ?>"
                                                                class="btn btn-info zoomPilih launch-modal checkL" href="#detailModal"
                                                                value="<?php echo $row['nip']; ?>"><i class="fas fa-info-circle"></i> Read more...</button>
                                                                <?php if($this->session->userdata('akses')=='0' || $this->session->userdata('akses')=='1'):?>
                                                                <button data-target="#konfirmasiDel" name="detil"
                                                                data-id="<?php echo $row['id_broadcast']; ?>"
                                                                data-toggle="modal" class="btn btn-danger zoomPilih checkL"
                                                                href="#detailModal"
                                                                value="<?php echo $row['id_broadcast']; ?>"><i class="fas fa-trash"></i></button>
                                                                <?php endif;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach;
                                                else : ?>
                                                <div class=" col-md-12 mb-3">
                                                    <?php echo $this->session->flashdata('#error-broadcast');?>
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
                                <!-- /.row -->
                            </div><!-- /.container-fluid -->
                            <div class="loading" style="display: none;">
                                <div class="content"><img
                                        src="<?php echo base_url() . 'assets/image/loading.gif?t='.time() ?>" /></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
            </div>

            <div id="detailModal" class="modal fade">
                <div class="modal-dialog modal-confirm modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 id="judul" class="modal-title"></h4> <h6 id="id_b" class="modal-title"></h6>
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
                                        <h3 id="judul" class="profile-username text-center"></h3>
                                        <p id="konten1" class="text-muted card-title1"></p>
                                        <div class="row">
                                            <div class="col-lg-12">
                                            <b><h4 id="comm_count" class="card-title1"><?php echo $this->Broadcast_model->Count_Comment()+$this->Broadcast_model->Count_replies(); ?> Comments </h4></b>
                                                <textarea class="form-control" rows="3" id="maincomment" required></textarea>
                                                <button class="btn btn-primary card-title1" id="addcomment" style="margin: 10px;">Add comment</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="usercomments">


                                                </div>
                                            </div>
                                        </div>
                                        <div class="row replyrow mr-3" style="display:none;">
                                            <div class="col-md-12" align="right">
                                                <textarea align="center" id="replycomment" class="form-control" placeholder="please add comment"
                                                    cols="30" rows="3" style="margin-top: 10px;"></textarea><br>
                                                <button class="btn-warning btn" onclick="$('.replyrow').hide();">tutup</button>
                                                <button class="btn-primary btn" onclick="isreply=true;" id="addreply">kirim</button>
                                            </div>
                                        </div>
                                        <ul class="list-group list-group-unbordered mb-3">
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
        <footer class="main-footer float-right text-sm text-dark">
            <strong>Copyright &copy; 2021 <a href="https://sman3ptk.sch.id/" target="_blank" style="color: #28a745"> SMA
                    Negeri 3 Pontianak </a>&<a href="https://www.instagram.com/egyijaa_/" target="_blank"
                    style="color: #28a745"> Egy Ijaa</a> | Theme by : <a href="https://adminlte.io/" target="_blank"
                    style="color: #28a745">AdminLTE</a></strong>. All rights
            reserved.
        </footer>
    </div>
</body>
        
<script type="text/javascript">
    $(document).ready(function () {
        let template = null;
        console.log($('#detailModal').hasClass('show'))
        $('#detailModal').on('show.bs.modal', function (event) {
            template = $(this).html();
            var button = $(event.relatedTarget);
            var modal = $(this);
            var gambar = button.data('gambar');
            modal.find('.modal-body #profilDetail').attr('src', "<?php echo base_url(); ?>/assets/image/broadcast/" + button.data('gambar'));
            modal.find('.modal-header #judul').html(button.data('judul'));
            modal.find('.modal-header #id_b').html(button.data('id_broadcast'));
            modal.find('.modal-body #judul').html(button.data('judul'));
            modal.find('.modal-body #konten1').html(button.data('konten'));
            
            var user_name = '<?php echo $this->session->userdata('ses_id') ?>';
		    var datetimenow="<?php echo date('Y-m-d'); ?>";
            console.log($('#detailModal').hasClass('show'))
		    var max= <?php echo $this->Broadcast_model->Count_Comment()+$this->Broadcast_model->Count_replies(); ?>; 
            $("#addcomment").on('click', function () {
                var mainComment = $("#maincomment").val();

                //if want show comment particular post and blog,declare post id and provide primary key 

                if (mainComment.length >= 1) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>index.php/Broadcast/addcomment",
                        method: 'POST',
                        datatype: 'text',
                        data: {
                            mainComment: mainComment,
                            user_name: user_name,
                            post_id: button.data('id_broadcast')
                        },
                        success: function (data) {
                            var result = JSON.parse(data);
                            $("#maincomment").val("");
                            max++;
                            $("#comm_count").text(max + " Comments");

                            $(".usercomments").prepend('<div class="comment border border-info mb-1 pb-2"><div class="user ml-2 text-danger mt-2"><span class="text-sm badge badge-success">' + user_name + ' </span><span class="text-muted text-xs"> ' + datetimenow + '</span></div><div class="usercomment card-title1 ml-4">' + mainComment + '</div><div class="replies text-xs float-right mr-3 ml-3 mb-2"></div><div class="reply ml-4 "><a href="javascript:void(0)" class="btn btn-primary card-title1" data-commentID="' + result.id + '" onclick="reply(this)">Balas</a></div> </div>');
                        },
                        error: function () {
                            alert('Data not inserted.');
                        }

                    });
                } else {
                    Swal.fire(
                        'Komentar Kosong!',
                        'Kolom komentar kosong, harap isi isi terlebih dahulu sebelum mengirim komentar',
                        'warning'
                    )
                }
            });
            
            $("#addreply").on('click', function () {
                // body...
                var replycomment = $("#replycomment").val();

                if (replycomment.length >= 1) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>index.php/Broadcast/addreply",
                        method: 'POST',
                        datatype: 'text',
                        data: {
                            replycomment: replycomment,
                            commentid: commentid,
                            user: user_name,
                        },
                        success: function (response) {
                            max++;
                            $("#comm_count").text(max + " Comments");
                            $("#replycomment").val("");

                            $(".replyrow").hide();

                            $(".replyrow").parent().next().append('<div class="row"><div class="col-4"></div><div class="comment card-title1 mb-1 col-8"><small class=" badge badge-secondary">&nbsp;' + user_name + '</small> ='+ replycomment + '&nbsp;<sup style="font-size: 8px;"class="badge badge-info">baru saja</sup></div></div>');
                        },
                        error: function () {
                            alert('Data not inserted');
                        }

                    });
                } else {
                    Swal.fire(
                        'Komentar Kosong!',
                        'Kolom komentar kosong, harap isi isi terlebih dahulu sebelum mengirim komentar',
                        'warning'
                    )
                }
            });
            getallComment(0, max);
            
            function getallComment(start, max) {
                if (start > max) {
                    return;
                }
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/Broadcast/allComment',
                    method: 'POST',
                    datatype: 'JSON',
                    data: {
                        start: start,
                        post_id2: button.data('id_broadcast')
                    },
                    success: function (response) {
                        // body...
                        var d = $.parseJSON(response);
                        $(".usercomments").append(d);
                        getallComment((start + 20), max);
                    },
                    error: function () {
                        // body...
                        alert('Data not found');
                    }
                });
            }
        })
        $('#detailModal').on('hidden.bs.modal', function(e) {
            $(this).html(template);
        });
    });
    function reply(caller) {
        commentid = $(caller).attr('data-commentID');
        $(".replyrow").insertAfter($(caller));
            $(".replyrow").show();
    }
    
</script>
<script>
        $(window).on('load', function () {
            $(".loading2").fadeOut("slow", function () {
                $('body').removeClass('loading1');
            });
        });

        function test(element) {
            var newTab = window.open();
            setTimeout(function () {
                newTab.document.body.innerHTML = element.innerHTML;
            }, 500);
            return false;
        }
</script>