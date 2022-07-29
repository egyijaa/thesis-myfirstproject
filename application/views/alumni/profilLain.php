<head>
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
        <?php if (!empty($information2)) : foreach ($information2 as $list) : ?>
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
                            <?php if($this->session->userdata('akses') == 2 ):?>
                            <p class="text-muted text-center"><?php if(!empty($list['keterangan'])){
                                                                            echo $list['keterangan'];
                                                                        }
                                                                        else {
                                                                            echo 'Belum Diatur Bos, jadi tidak tahu status keterangannya apa sekarang';
                                                                        }; ?></p>
                            <?php endif;?>
                            <ul class="list-group list-group-unbordered mb-3">
                                <?php if($this->session->userdata('akses') == 2 ):?>
                                <li class="list-group-item">
                                    <b>Username</b> <a class="float-right"><?php echo $list['username']; ?></a>
                                </li>
                                <li class="list-group-item" id="tahunLulus">
                                    <b>Kelulusan</b>
                                    <a class="float-right" id="angkatanTampil"><?php echo $list['angkatan']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status</b> <a class="float-right"><?php if(!empty($list['status'])){
                                                                                    echo $list['status'];
                                                                                }
                                                                                else {
                                                                                    echo 'Belum Diatur';
                                                                                }; ?></a>
                                </li>
                                <?php else:?>
                                <li class="list-group-item">
                                    <b>Username</b> <a class="float-right"><?php echo $list['username']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status Akun</b> <a class="float-right">Siswa Aktif</a>
                                </li>
                                <?php endif;?>
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
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="timeline">
                                            <!-- The timeline -->
                                            <div class="timeline timeline-inverse">
                                                <!-- timeline time label -->
                                                <div class="card card-solid">
                                                    <div class="card-body pb-0">
                                                        <div class="row d-flex align-items-stretch">
                                                            <div
                                                                class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                                                <div class="card bg-light">
                                                                    <div class="card-header text-muted border-bottom-0">
                                                                        Whatsapp
                                                                    </div>
                                                                    <div class="card-body pt-0">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <a href="<?php if(!empty($list['whatsapp'])){
                                                                                    echo 'https://wa.me/62'.$list['wa']; 
                                                                                }
                                                                                else {
                                                                                    echo base_url().'page/notFound';
                                                                                }; ?>" target="_blank">
                                                                                    <img src="<?php echo base_url(); ?>/assets/image/sosial/wa1.png?t=<?php echo time();?>"
                                                                                        alt=""
                                                                                        class="img-circle img-fluid zoomPilih">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                                                <div class="card bg-light">
                                                                    <div class="card-header text-muted border-bottom-0">
                                                                        Instagram
                                                                    </div>
                                                                    <div class="card-body pt-0">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <a href="<?php if(!empty($list['instagram'])){
                                                                                    echo 'https://www.instagram.com/'.$list['instagram'];
                                                                                }
                                                                                else {
                                                                                    echo base_url().'page/notFound';
                                                                                }; ?>" target="_blank">
                                                                                    <img src="<?php echo base_url(); ?>/assets/image/sosial/ig.png?t=<?php echo time();?>"
                                                                                        alt=""
                                                                                        class="img-circle img-fluid zoomPilih">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                                                <div class="card bg-light">
                                                                    <div class="card-header text-muted border-bottom-0">
                                                                        Twitter
                                                                    </div>
                                                                    <div class="card-body pt-0">
                                                                        <div class="row">
                                                                            <div class="col-12 text-center">
                                                                                <a href="<?php if(!empty($list['twitter'])){
                                                                                    echo 'https://twitter.com/'.$list['twitter'];
                                                                                }
                                                                                else {
                                                                                    echo base_url().'page/notFound';
                                                                                }; ?>" target="_blank">
                                                                                    <img src="<?php echo base_url(); ?>/assets/image/sosial/twitter.png?t=<?php echo time();?>"
                                                                                        alt=""
                                                                                        class="img-circle img-fluid zoomPilih">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                                                <div class="card bg-light">
                                                                    <div class="card-header text-muted border-bottom-0">
                                                                        Line
                                                                    </div>
                                                                    <div class="card-body pt-0">
                                                                        <div class="row">
                                                                            <div class="col-12 text-center">
                                                                                <a href="<?php if(!empty($list['line'])){
                                                                                    echo 'http://line.me/ti/p/~'.$list['line'];
                                                                                }
                                                                                else {
                                                                                    echo base_url().'page/notFound';
                                                                                }; ?>" target="_blank">
                                                                                    <img src="<?php echo base_url(); ?>/assets/image/sosial/line.png?t=<?php echo time();?>"
                                                                                        alt=""
                                                                                        class="img-circle img-fluid zoomPilih">
                                                                                </a>
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
                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->

                                        <div class="active tab-pane" id="settings">
                                            <!-- Post -->
                                            <div class="card card-info">
                                                <div class="card-header bg-success">
                                                    <h3 class="card-title">Informasi Data Pribadi</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <!-- form start -->
                                                <form class="form"
                                                    action="<?php echo base_url() ?>Profil/updProfil"
                                                    method="post" id="form_profil" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="username" id="nis"
                                                            placeholder="first name" value="<?php echo $list['username']; ?>"
                                                            hidden disabled>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label for="namaLengkap"
                                                                class="col-sm-5 col-form-label">Nama Lengkap</label>
                                                            <div class="col-sm-12">
                                                                <label id="old_nama"
                                                                    hidden><?php echo $list['nama_lengkap']; ?></label>
                                                                <input type="text" class="form-control" name="nama"
                                                                    id="namaLengkap" placeholder="Nama Lengkap"
                                                                    title="enter your first name if any."
                                                                    value="<?php echo $list['nama_lengkap']; ?>"
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="email"
                                                                class="col-sm-5 col-form-label">Email</label>
                                                            <div class="col-sm-12">
                                                                <label id="old_email"
                                                                    hidden><?php echo $list['email']; ?></label>
                                                                <input type="email" class="form-control" name="email"
                                                                    id="email" placeholder="Belum Diatur"
                                                                    title="Email" value="<?php echo $list['email']; ?>"
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="tanggalLahir"
                                                                class="col-sm-5 col-form-label">Tanggal Lahir</label>
                                                            <div class="col-sm-12">
                                                                <input type="date" class="form-control"
                                                                    name="tanggal_lahir" id="tanggalLahir" value="<?php if(!empty($list['tanggal_lahir'])){
                                                                    echo $list['tanggal_lahir'];
                                                                } else {
                                                                    echo 'Belum di Setting';
                                                                }; ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <?php if($list['roles'] == 'alumni' ):?>
                                                        <div class="form-group row">
                                                            <label for="dropDown2"
                                                                class="col-sm-5 col-form-label">Domisili (Kota/Kabupaten)</label>
                                                            <div class="col-sm-12">
                                                                <input placeholder ="Belum Diatur" type="text" class="form-control" id="kota"
                                                                    value="<?php echo $list['kota']; ?>"
                                                                    title="Pilih kota domisili anda" disabled>
                                                                <select id="dropDown2" name="kota_sekarang"
                                                                    class="form-control bg-white  border-md"
                                                                    style="height:100%" hidden>
                                                                    <?php echo "<option disabled selected>Pilih Kota/Kabupaten Domisili </option>";
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
                                                            </div>
                                                        </div>
                                                        <div id="status" class="form-group row" hidden>
                                                            <label for="dropDown3"
                                                                class="col-sm-5 col-form-label">Status</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="statusInput"
                                                                    value="<?php echo $list['status']; ?>"
                                                                    title="Pilih Status Anda Saat Ini" disabled>
                                                                <select id="dropDown3" name="status"
                                                                    class="form-control bg-white  border-md"
                                                                    style="height:100%" hidden>
                                                                    <?php echo "<option disabled selected>Pilih Status </option>";
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
                                                            </div>
                                                        </div>
                                                        <div id="keterangan" class="form-group row" hidden>
                                                            <label for="ketnya"
                                                                class="col-sm-5 col-form-label">Keterangan dari
                                                                Status</label>
                                                            <div class="col-sm-12">
                                                                <label id="old_keterangan"
                                                                    hidden><?php echo $list['keterangan']; ?></label>
                                                                <input type="text" class="form-control"
                                                                    name="keterangan" id="ketnya"
                                                                    placeholder="Contoh = Kuliah di Universitas Brawijaya atau CEO di Google.com"
                                                                    value="<?php echo $list['keterangan']; ?>"
                                                                    title="Masukkan Keterangan dari Status Anda!"
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="input6" class="col-sm-5 col-form-label">Alamat
                                                                Asal</label>
                                                            <div class="col-sm-12">
                                                                <label id="old_address"
                                                                    hidden><?php echo $list['alamat_asal']; ?></label>
                                                                <input type="text" class="form-control"
                                                                    name="alamat_asal" id="input6"
                                                                    placeholder="Contoh = Jl. Budi Utomo Komplek Taman Anggrek Blog G.17"
                                                                    value="<?php if(!empty($list['alamat_asal'])){
                                                                            echo $list['alamat_asal'];
                                                                        }
                                                                        else {
                                                                            echo 'Belum Diatur';
                                                                        }; ?>" title="Masukkan Alamat Asal." disabled>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="input7" class="col-sm-5 col-form-label">Alamat
                                                                Domisili</label>
                                                            <div class="col-sm-12">
                                                                <label id="old_address2"
                                                                    hidden><?php echo $list['alamat_sekarang']; ?></label>
                                                                <input type="text" id="input7" class="form-control"
                                                                    name="alamat_sekarang"
                                                                    placeholder="Contoh = Jl. Candi Bajang Ratu I, Blimbing"
                                                                    value="<?php if(!empty($list['alamat_sekarang'])){
                                                                            echo $list['alamat_sekarang'];
                                                                        }
                                                                        else {
                                                                            echo 'Belum Diatur';
                                                                        }; ?>" title="Masukkan Alamat Domisili."
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                        <?php endif;?>
                                                        <!-- /.card-body -->
                                                        <?php if($this->session->userdata('akses') != '2' && $this->session->userdata('akses') != '3' ):?>
                                                        <div id="passwordC2" class="form-group row text-center">
                                                            <label for="password2"
                                                                class="col-sm-4 col-form-label">Status Akun : </label>
                                                            <div class="col-sm-8">
                                                                <?php
                                                                        if ($list['active'] == '0') {
                                                                            echo '<b id ="kondisi" class="form-control bg-warning">Akun Belum Aktif</b><br><label class="switch">
                                                                                <input type="checkbox" name="cobaye" id="checkActive' . $list['username'] . '" data-id="' . $list['username'] . '">
                                                                                <span class="slider round"></span>
                                                                                </label>';
                                                                        } else {
                                                                            echo '<b id ="kondisi" class="form-control bg-info">Akun Aktif</b><br><label class="switch">
                                                                                <input type="checkbox" name="cobaye" id="checkActive' . $list['username'] . '" data-id="' . $list['username'] . '" checked>
                                                                                <span class="slider round"></span>
                                                                            </label>';
                                                                        }
                                                                        ?>
                                                            </div>
                                                        </div>
                                                        <?php endif;?>
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
                        <form id="ubahPassword" name="ubahPassword" action="<?php echo base_url(); ?>Page/ubahPasswordAdmin" method="POST">
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
        <footer class="main-footer float-right text-sm">
            <strong>Copyright &copy; 2021 <a href="https://sman3ptk.sch.id/" target="_blank" style="color: #28a745"> SMA
                    Negeri 3 Pontianak </a>&<a href="https://www.instagram.com/egyijaa_/" target="_blank"
                    style="color: #28a745"> Egy Ijaa</a> | Theme by : <a href="https://adminlte.io/" target="_blank"
                    style="color: #28a745">AdminLTE</a></strong>. All rights
            reserved.
        </footer>
    <!-- ./wrapper -->
    <?php endforeach; else : ?>
    <?php endif; ?>
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
                                url: "<?php echo base_url() ?>Page/ubahPasswordAdmin",
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
</script>
<script>
$(document).ready(function () {
    $('input[name="cobaye"]').click(function () {
        var id = $(this).data('id');

        updActive(id);

    })
    function updActive(username) {
        var spinner = $('#loader');
        var checkBox = document.getElementById("checkActive" + username);
        var u = 0;
        var n = username;
        if (checkBox.checked == true) {
            u = 1;
        }
        spinner.show();
        $.ajax({
            url: "<?php echo base_url() ?>page/updateActive", //enter the login controller URL here
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
                    document.getElementById("kondisi").className = "form-control bg-info";
                    document.getElementById("kondisi").innerHTML = "Akun Aktif";
                }
                if (u == 0) {
                    Swal.fire(
                        'Akun non-aktif',
                        'Akun baru saja di-nonAktifkan, akun tidak dapat login dan mengakses sistem',
                        'info'
                    )
                    document.getElementById("kondisi").className = "form-control bg-warning";
                    document.getElementById("kondisi").innerHTML = "Akun Belum Aktif";
                }
            },
            error: function (data) {
                spinner.hide();
                alert("Terjadi kesalahan");
            }
        });
        return false;
    }
});
</script>