<!DOCTYPE html>
<html>
<head>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div id="loading">
            <img id="loading-image" src="<?php echo base_url() . 'assets/image/tenor.gif?t='.time() ?>" alt="Loading..." />
        </div>
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white baratas">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
            </ul>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="https://sman3ptk.sch.id/" target="_blank" class="nav-link">
                    <h4 style="color:#28a730"><b style="color:#28a745">SMA Negeri 3 Pontianak</b></h4>
                </a>
            </li>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <?php if($this->session->userdata('akses')=='0' || $this->session->userdata('akses')=='1'):?>
                        <img src="<?php echo base_url('assets/image/admin2.png') ?>"
                            class="user-image img-circle elevation-2" alt="User Image">
                        <?php else:?>
                        <img id="img2" src="<?php echo base_url('assets/image/foto_profil/'.$this->session->userdata('ses_foto')) ?>"
                            class="user-image img-circle elevation-2" alt="User Image">
                        <?php endif;?>
                        <span class="d-none d-md-inline"><?php echo $this->session->userdata('ses_nama') ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <?php if (!empty($information)) : foreach ($information as $row) : ?>
                        <?php if($this->session->userdata('akses')=='2'):?>
                            <li class="user-header bg-success">
                                <img src="<?php echo base_url('assets/image/foto_profil/'.$row['foto_profil']) ?>"
                                    class="img-circle elevation-2" alt="User Image">
                                <?php endif;?>
                                <p>
                                    <?php echo $row['nama_lengkap']; ?> - <?php echo $row['status']; ?>
                                    <small>Tahun Kelulusan <?php echo $row['angkatan']; ?></small>
                                </p>
                            </li>
                        <?php endforeach;else : ?>
                        <?php endif; ?>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <a href="<?php echo base_url(); ?>index.php/page">Kembali Ke-Menu Awal</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <?php if ($this->session->userdata('akses') == '0') : ?>
                            <a href="<?php echo base_url(); ?>index.php/Admin/toAdmin"
                                class="btn btn-primary btn-flat">Edit Admin</a>
                            <?php elseif ($this->session->userdata('akses') == '2'):?>
                            <a href="<?php echo base_url(); ?>index.php/page/toProfile"
                                class="btn btn-primary btn-flat">Profile</a>
                            <?php endif;?>
                            <a href="#" class="btn btn-danger btn-flat float-right" data-toggle="modal"
                                data-target="#myModal">Sign out</a>
                        </li>
                    </ul>
                </li>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
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
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
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
                                        <p>Broadcast</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url() ?>index.php/Lowongan/toLowongan"
                                        title="Halaman Lowongan Pekerjaan"><i class="nav-icon fab fa-stack-overflow"
                                            aria-hidden="true"></i>
                                        <p>Lowongan Pekerjaan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/page/alumni" title="Halaman Data Almuni"><i class=" nav-icon fas fa-id-card"
                                            aria-hidden="true"></i>
                                        <p>Data Alumni</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php if($this->session->userdata('akses')=='2'):?>
                        <br>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/page/toProfile" class="nav-link active">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                    Profil Saya
                                    <span class="right badge badge-success">GAS!</span>
                                </p>
                            </a>
                        </li>
                        <?php endif;?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>404 Error Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">404 Error Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

          <p>
            Kami tidak dapat menemukan halaman yang anda maksud, mungkin link tersebut tidak ada atau salah.
            Anda boleh <a href="<?php echo base_url(); ?>index.php/page/toProfile">Kembali Ke Profil Anda</a> atau kembali ke <a href="<?php echo base_url(); ?>index.php/page">Menu Awal</a> .
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
</body>
</html>
<script>
    $(window).on('load', function(){
        $('#loading').fadeOut("slow");
    });
</script>
