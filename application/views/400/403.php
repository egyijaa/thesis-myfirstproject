
<head>
<link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/dist/css/bgye.min.css?t=<?php echo time();?>">
</head>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-danger"><strong>403</strong></h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Access to that resource is forbidden.</h3>

          <p>
            Anda tidak dapat mengakses halaman ini sebelum anda <strong>melengkapi data profil anda telebih dahulu</strong>, terima kasih!.
            Anda boleh <a href="<?php echo base_url(); ?>page/toProfile">Kembali Ke Profil Anda</a> atau kembali ke <a href="<?php echo base_url(); ?>page">Menu Awal</a> .
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>
