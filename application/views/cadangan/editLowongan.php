<!DOCTYPE html>
<html>

<head>
    <style>
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
    <!-- Site wrapper -->
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
                        <span class="d-none d-md-inline"><?php echo $this->session->userdata('ses_id').' ' ?><i class="fas fa-caret-down"></i></span>
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
                                    <a class="nav-link" href="<?php echo base_url() ?>index.php/Broadcast/toBroadcast"
                                        title="Halaman Broadcast"><i class="nav-icon fas fa-bullhorn"
                                            aria-hidden="true"></i>
                                        <p>Broadcast</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active"
                                        href="<?php if ($this->session->userdata('akses') != 2){
                                                    echo base_url().'index.php/Lowongan/toLowongan2';
                                                }
                                                else {
                                                    echo base_url().'index.php/Lowongan/toLowongan';
                                                }?>"><i
                                            class="nav-icon fab fa-stack-overflow" aria-hidden="true"></i>
                                        <p>Lowongan P. <span class="right badge badge-info">Editing...</span></p>
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
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit Lowongan Pekerjaan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Lowongan</a></li>
                                <li class="breadcrumb-item active">Edit Lowongan Pekerjaan</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <?php if (!empty($posts)) : foreach ($posts as $row) : ?>
                <?php echo form_open('Lowongan/Edit', array('id' => 'form_lowongan', 'role' => 'form','enctype' => "multipart/form-data"));?>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Informasi Lowongan Pekerjaan</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group" hidden>
                                        <label for="nisPass" class="col-sm-4 col-form-label"></label>
                                        <div class="col-sm-8">
                                            <input type="text" id="nisPass" class="form-control" name="nisPass"
                                                value="<?php echo $row['id_lowongan_pekerjaan']; ?>"
                                                title="enter your password.">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="judul">JUDUL</label>
                                        <input type="text" class="form-control" name="judul" id="judul"
                                            placeholder="Judul" title="enter your first name if any."
                                            value="<?php echo $row['judul']; ?>">
                                        <div class="print-error-msg 1" style="display:none"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>MINIMAL PENDIDIKAN</label>
                                        <select id="dropDown2" name="angkatan" class="form-control bg-white  border-md">
                                            <?php echo "<option disabled selected>Silahkan Pilih Pendidikan</option>";
                    foreach ($information as $row2) { ?>
                                            <option value='<?php echo $row2['id_pendidikan']; ?>' <?php
                        if ($row['pend'] == $row2['pendidikan']) {
                            echo "selected";
                        } ?>>
                                                <?php echo $row2['pendidikan'];?>
                                            </option>;
                                            <?php } ?>
                                        </select>
                                        <div class="print-error-msg 2" style="display:none"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">POSTER</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <label id = "gambar "class="custom-file-label"
                                                    for="exampleInputFile"><?php echo $row['gambar']; ?></label>
                                                <input name="gambar" type="file" accept='image/*' id="inputFile"
                                                    class="custom-file-input" id="exampleInputFile">
                                            </div>
                                        </div>
                                        <div class="print-error-msg 3" style="display:none"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>PREVIEW</label>
                                        <a target="_blank" href="#" onclick="test(this)">
                                            <img id="image_upload_preview"
                                                src="<?php echo base_url('assets/image/lowongan/'.$row['gambar']) ?>?t=<?php echo time();?>"
                                                style="width:200px;height:300px" alt="your image" />
                                        </a>
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
                                                            <input type="checkbox" id="nomorHp" name="nomorHp"
                                                                data-name="nomorHpnya" class="my-features" <?php if(!empty($row['no_telepon'])){
                                                                                    echo 'checked';
                                                                                }; ?>>
                                                            <label for="nomorHp">Nomor Whatsapp</label><br>
                                                            <input id="nomorHpnya" name="nomornya" type="text"
                                                                class="form-control" placeholder="Contoh : 08963333333"
                                                                value="<?php echo $row['no_telepon']; ?>" style="<?php if(!empty($row['no_telepon'])){
                                                                                    echo 'display: block;';
                                                                                }
                                                                                else {
                                                                                    echo 'display: none;';
                                                                                }; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- radio -->
                                                    <div class="form-group clearfix">
                                                        <div class="icheck-info d-inline">
                                                            <input type="checkbox" id="twitter" name="twitter"
                                                                data-name="twitternya" class="my-features" <?php if(!empty($row['twitter'])){
                                                                                    echo 'checked';
                                                                                }; ?>>
                                                            <label for="twitter">Twitter</label><br>
                                                            <input id="twitternya" name="twitternya" type="text"
                                                                class="form-control" placeholder="Contoh : @smanta_ptk"
                                                                value="<?php echo $row['twitter']; ?>" style="<?php if(!empty($row['twitter'])){
                                                                                    echo 'display: block;';
                                                                                }
                                                                                else {
                                                                                    echo 'display: none;';
                                                                                }; ?>">
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
                                                            <input type="checkbox" id="instagram" name="instagram"
                                                                data-name="instagramnya" class="my-features" <?php if(!empty($row['instagram'])){
                                                                                    echo 'checked';
                                                                                }; ?>>
                                                            <label for="instagram">Instagram</label><br>
                                                            <input id="instagramnya" name="instagramnya" type="text"
                                                                class="form-control"
                                                                placeholder="Contoh : smanta.pontianak"
                                                                value="<?php echo $row['instagram']; ?>" style="<?php if(!empty($row['instagram'])){
                                                                                    echo 'display: block;';
                                                                                }
                                                                                else {
                                                                                    echo 'display: none;';
                                                                                }; ?>">
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
                                                        <h3 class="card-title">Tanggal Berlaku/Deadline</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <!-- Minimal style -->
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <?php $date = date ('Y-m-d\TH:i:s', strtotime($row['expired']));?>
                                                                <!-- checkbox -->
                                                                        <input id="deadline" name="deadline"
                                                                            type="datetime-local" class="form-control"
                                                                            placeholder="" value="<?php echo $date;?>">
                                                            </div>
                                                            <div class="print-error-msg 4" style="display:none"></div>
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
                                                                <button type="button" class="btn btn-tool btn-sm"
                                                                    data-card-widget="collapse" data-toggle="tooltip"
                                                                    title="Collapse">
                                                                    <i class="fas fa-minus"></i></button>
                                                                <button type="button" class="btn btn-tool btn-sm"
                                                                    data-card-widget="remove" data-toggle="tooltip"
                                                                    title="Remove">
                                                                    <i class="fas fa-times"></i></button>
                                                            </div>
                                                            <!-- /. tools -->
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body pad">
                                                            <div class="mb-3">
                                                                <textarea name="deskripsi" class="form-control" rows="3"
                                                                    value ="<?php echo $row['deskripsi']; ?>" placeholder="Deskripsi"> <?php echo $row['deskripsi']; ?></textarea>
                                                            </div>
                                                            <div class="print-error-msg 5" style="display:none"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                </div>
                                <?php if ($this->session->userdata('akses')!='2') : ?>
                                <div class="card-footer">
                                        <table style="table-layout: fixed;" class="table table-bordered table-striped table-responsive-md">
                                             <tbody>
                                                 <tr>
                                                     <th>Status Lowongan :  </th>
                                                     <th>
                                                        <?php
                                                                        if ($row['active'] == '0') {
                                                                            echo '<label class="switch">
                                                                                <input type="checkbox" name="cobaye" id="checkActive' . $row['id_lowongan_pekerjaan'] . '" data-id="' . $row['id_lowongan_pekerjaan'] . '">
                                                                                <span class="slider round"></span>
                                                                                </label>';
                                                                        } else {
                                                                            echo '<label class="switch">
                                                                                <input type="checkbox" name="cobaye" id="checkActive' . $row['id_lowongan_pekerjaan'] . '" data-id="' . $row['id_lowongan_pekerjaan'] . '" checked>
                                                                                <span class="slider round"></span>
                                                                            </label>';
                                                                        }
                                                                        ?></th>
                                                    <th><?php
                                                                        if ($row['active'] == '0') {
                                                                            echo '<b id ="kondisi" class="btn bg-warning" style="pointer-events: none;">Lowongan Belum Dipublikasikan/Aktif</b>';
                                                                        } else {
                                                                            echo '<b id ="kondisi" class="btn bg-info" style="pointer-events: none;">Lowongan Sudah Aktif</b>';
                                                                        }
                                                                        ?></th>
                                                </tr>
                                             </tbody>
                                        </table>    
                                </div>
                                <?php endif; ?>
                                <div class="card-footer">
                                    <div class="col-12">
                                        <input type="reset" value="Cancel" class="btn btn-secondary">
                                        <button type="submit" id="save" class="btn btn-success float-right">Simpan</button>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div id="dataBantuan" class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Butuh bantuan?</h4>
                                    <img src="<?php echo base_url(); ?>/assets/bootstrap/img/helpdesk.png"
                                        style="width: 100%">
                                    <p>helpdesk: <a
                                            href="mailto:smanegeri3ptk@gmail.com?subject=Helpdesk_PASMANTAP">smanegeri3ptk@gmail.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php endforeach; else : ?>
                <?php endif; ?>
            </section>
            <!-- /.content -->
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
                        <form id="ubahPassword" name="ubahPassword" action="<?php echo base_url(); ?>index.php/Page/ubahPasswordAdmin" method="POST">
                            <!-- form with an ID so we can identify it, now includes both the textbox and the button within it -->
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="modalpass" class="col-form-label">Password Lama:</label>
                                    <input type="password" id ="modalpass" name="modalpass" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="modalpass" class="col-form-label">Password Baru:</label>
                                    <input type="password" id ="modalpass2" name="modalpass2" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="modalpass" class="col-form-label">Password Baru (Konfirmasi):</label>
                                    <input type="password" id ="modalpass3" name="modalpass3" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button id = "siapUbah" name="siapUbah" type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer float-right text-sm">
            <strong>Copyright &copy; 2021 <a href="https://sman3ptk.sch.id/" target="_blank" style="color: #28a745"> SMA
                    Negeri 3 Pontianak </a>&<a href="https://www.instagram.com/egyijaa_/" target="_blank"
                    style="color: #28a745"> Egy Ijaa</a> | Theme by : <a href="https://adminlte.io/" target="_blank"
                    style="color: #28a745">AdminLTE</a></strong>. All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
</body>

</html>
<script>
        $(document).ready(function () {
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
                        if (!$('select[name="angkatan"]').val()) {
                            $('select[name="angkatan"]').focus();
                            Swal.fire(
                                'Pendidikan Belum Dipilih',
                                'Harap masukkan Rekomendasi Minimal Pendidikan dari lowongan pekerjaan Anda!',
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
                            url: "<?php echo site_url('Lowongan/Edit');?>",
                            data: formdata,
                            dataType: "json",
                            processData: false,
                            contentType: false,
                            success: function (data) {
                                if ($.isEmptyObject(data.error) || data.message == "success") {
                                    spinner.hide();
                                    Swal.fire(
                                        'DATA TERSIMPAN!',
                                        'Lowongan berhasil diubah',
                                        'success'
                                    )
                                    $(".print-error-msg").css('display',
                                        'none');
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
            })

            $('#deleteAlumninis').click(function () {
                $('#konfirmasiDel').modal({
                    show: true
                })
            });
            $('#konfirmasiDel').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var modal = $(this);
                var a = $('#deleteAlumninis').val();
                if (a != null) {
                    modal.find('.modal-footer #delLowongan').attr('value', document.getElementById(
                        "deleteAlumninis").value);
                } else {
                    modal.find('.modal-footer #delLowongan').attr('value', document.getElementById(
                        "baru").value);
                }
                Swal.fire(
                    'Penting!',
                    'Jika Lowongan dihapus, maka informasi lowongan yang akan dihapus dan tersimpan di database akan dihapus semua!',
                    'warning'
                )
            })
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
                                            $("#ubahPassword")[0].reset();
                                        ;
                                    }
                                }
                            });
                    } else {
                        Swal.fire('Data Belum Disimpan', '', 'info')
                        return false;
                    }
                })
            })
    $('.my-features').on('click', function () {
        var checkbox = $(this);
        var div = checkbox.data('name');
        if (checkbox.is(':checked')) {

            $('#' + div).show();
        } else {
            $('#' + div).hide();
            if ($('#' + div).val() != '') {
                $('#' + div).attr('value', '');
            }
        }
    })
    $(window).on('load', function() {
            $(".loading2").fadeOut("slow", function() {
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
    CKEDITOR.replace( 'deskripsi', {
        toolbar: [
            { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo' ] },
            { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
            '/',
            { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
            { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
            { name: 'others', items: [ '-' ] },
            { name: 'about', items: [ 'About' ] }
        ],
        uiColor: '#28a745',
        disallowedContent: 'a'
    });
</script>
<?php if ($this->session->userdata('akses')!='2') : ?>
<script>
$(document).ready(function () {
    $('input[name="cobaye"]').click(function () {
        var id = $(this).data('id');

        updActive(id);

    })
    function updActive(id) {
        var spinner = $('#loader');
        console.log(id);
        var checkBox = document.getElementById("checkActive" + id);
        var u = 0;
        var n = id;
        if (checkBox.checked == true) {
            u = 1;
        }
        spinner.show();
        $.ajax({
            url: "<?php echo base_url() ?>index.php/Lowongan/updateActive", //enter the login controller URL here
            type: "POST",
            dataType: "json",
            data: {
                active: u,
                username: n,
                nisPass: $('#nisPass').val()
            },
            success: function (data) {
                spinner.hide();
                if (u == 1) {
                    Swal.fire(
                        'Lowongan Aktif',
                        '<div class="btn btn-outline-success btn-sm ml-2" style="pointer-events: none;"> Lowongan pekerjaan sudah aktif dan dapat diakses oleh semua alumni </div>',
                        'info'
                    )
                    document.getElementById("kondisi").className = "btn bg-info";
                    document.getElementById("kondisi").innerHTML = "Lowongan Sudah Aktif";
                }
                if (u == 0) {
                    Swal.fire(
                        'Lowongan non-aktif',
                        '<div class="btn btn-outline-warning btn-sm ml-2" style="pointer-events: none;"> Lowongan pekerjaan di-nonaktifkan dan tidak dapat diakses oleh semua alumni </div>',
                        'info'
                    )
                    document.getElementById("kondisi").className = "btn bg-warning";
                    document.getElementById("kondisi").innerHTML = "Lowongan Belum Dipublikasikan/Aktif";
                }
            },
            error: function (data) {
                spinner.hide();
                Swal.fire(
                        'Error',
                        '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;"> Terjadi Kesalahan saat meng-aktifkan lowongan, harap coba kembali/hubungi developer anda </div>',
                        'error'
                    )
                console.log(data);
            }
        });
        return false;
    }
});
</script>
<?php endif; ?>