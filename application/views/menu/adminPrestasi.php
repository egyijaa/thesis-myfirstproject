
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestasi Alumni</title>
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/dist/css/bgye.min.css?t=<?php echo time();?>">
    <style>
        .content-wrapper{
            background-color: rgba(255,255,255,0);
        }
        .belakang {
            background-color: rgba(255,255,255,0.4); 
        }
    </style>
</head>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Prestasi Alumni Smanta</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Kontak</li>
                                <li class="breadcrumb-item active">3 Akun Admin</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
            <div class="content">
            <div class="container-fluid">
                <button id="tampilkanTambah" class="btn btn-primary mb-3"
                    onclick="showTambah()"><span>Tambah Prestasi</span></button>
                <div class="row">
                    <div id="dataTambah" class="col-lg-8" style="display:none;">
                        <div class="card">
                            <?php echo form_open('Page/TambahPrestasi', array('id' => 'form_prestasi', 'role' => 'form','enctype' => "multipart/form-data"));?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>JUDUL</label>
                                    <?php echo form_input('judul', '', array('class' => 'form-control', 'placeholder' => 'Judul', 'id' => 'judul'));?>
                                    <div class="print-error-msg 1" style="display:none">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Prestasi</label>
                                    <select id="angkatan" name="angkatan" class="form-control" required>
                                        <option disabled selected value="">Silahkan Pilih
                                        </option>
                                        <?php
                                                                    foreach ($information as $row) { ?>

                                        <option value='<?php echo $row['id_prestasi']; ?>'>
                                            <?php echo $row['prestasi']; ?>
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
                                            <label id="gambar" class="custom-file-label" for="exampleInputFile">Pilih
                                                Gambar</label>
                                            <input name="gambar" type="file" accept='image/*' id="inputFile"
                                                class="custom-file-input" id="exampleInputFile" required>
                                        </div>
                                    </div>
                                    <div class="print-error-msg 3" style="display:none">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>PREVIEW</label>
                                    <img id="image_upload_preview" src="http://placehold.jp/300x400.png"
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
                                                        <input type="checkbox" id="nomorHp" name="nomorHp"
                                                            data-name="nomorHpnya" class="my-features">
                                                        <label for="nomorHp">Nomor
                                                            Whatsapp</label><br>
                                                        <input id="nomorHpnya" name="nomornya" type="text"
                                                            class="form-control" placeholder="Contoh : 08963333333"
                                                            style="display:none;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- radio -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-info d-inline">
                                                        <input type="checkbox" id="twitter" name="twitter"
                                                            data-name="twitternya" class="my-features">
                                                        <label for="twitter">Twitter</label><br>
                                                        <input id="twitternya" name="twitternya" type="text"
                                                            class="form-control" placeholder="Contoh : @smanta_ptk"
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
                                                        <input type="checkbox" id="instagram" name="instagram"
                                                            data-name="instagramnya" class="my-features">
                                                        <label for="instagram">Instagram</label><br>
                                                        <input id="instagramnya" name="instagramnya" type="text"
                                                            class="form-control" placeholder="Contoh : smanta.pontianak"
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
                                                <input id="deadline" name="deadline" type="datetime-local"
                                                    class="form-control" placeholder="">
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
                                                    data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                    <i class="fas fa-minus"></i></button>
                                                <button type="button" class="btn btn-tool btn-sm"
                                                    data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                                    <i class="fas fa-times"></i></button>
                                            </div>
                                            <!-- /. tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body pad">
                                            <div class="mb-3">
                                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"
                                                    placeholder="Deskripsi" required></textarea>
                                            </div>
                                            <div class="print-error-msg 5" style="display:none"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button id="save" type="submit" class="btn btn-success">Submit</button>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <div class="post-list" id="postList">
                                <table id="dataLowongan" style="table-layout: fixed;  margin-top:15px"
                                    class="table table-bordered table-striped table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th>Publisher</th>
                                            <th>Judul</th>
                                            <th>Minimal<br>Pendidikan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($posts)) : foreach ($posts as $row) : ?>
                                        <tr>
                                            <td><?php echo $row['NAMA']; ?><?php if (empty($row['username'])){
                                                            echo ' (Admin)';
                                                        } ?></td>
                                            <td><?php echo $row['judul']; ?></td>
                                            <td><?php echo $row['ang']; ?></td>
                                            <?php $date = strtotime($row['expired']) - time();?>
                                            <td><?php 
                                                        if ($row['active'] == 1){
                                                            echo '<span class =" badge badge-success ">Tervalidasi</span>';
                                                        }
                                                        else {
                                                            echo '<span class =" badge badge-warning ">Belum Divalidasi</span> ';
                                                        } ?> +
                                                <?php
                                                        if ( $date > 259200 ){
                                                            echo '<span class =" badge badge-success ">On Going</span> ';
                                                        }
                                                        else if ($date > 0 && $date < 259200){
                                                            echo '<span class =" badge badge-warning ">Almost Expired</span> ';
                                                        } 
                                                        else {
                                                            echo '<span class =" badge badge-danger ">Expired</span> ';
                                                        }?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" title="Detail" class="btn btn-info zoomPilih"
                                                        data-toggle="modal" data-target="#detailModal" name="detil"
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
                                                        href="#detailModal" value="<?php echo $row['PUBLISHER']; ?>"><i
                                                            class="fas fa-info-circle"></i></button>
                                                    <?php if ($this->session->userdata('akses')!='2' || $this->session->userdata('ses_id') == $row['username']):?>
                                                    <button type="button" data-target="#konfirmasiDel"
                                                        data-toggle="modal"
                                                        data-id="<?php echo $row['id_lowongan_pekerjaan']; ?>"
                                                        class="btn btn-danger zoomPilih" value=><i
                                                            class="fas fa-trash"></i></button>
                                                    <?php endif; ?>
                                                    <?php if ($this->session->userdata('akses')!='2' || $this->session->userdata('ses_id') == $row['username']){
                                                                                echo '<form
                                                                                            action="'.base_url(); ?><?php echo 'Lowongan/toEditLowongan"
                                                                                            method="POST" enctype="multipart/form-data">
                                                                                            <button name="deleteAlumninis2" value="'.$row['id_lowongan_pekerjaan'].'"
                                                                                                class="btn btn-secondary zoomPilih" ><i
                                                                                                    class="fas fa-edit" ></i></button>
                                                                                        </form>';
                                                                        }?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach;
                                            else : ?>
                                        <tr>
                                            <td colspan="6">
                                                <?php echo $this->session->flashdata('#error-Lowongan');?>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <?php echo $this->ajax_pagination->create_links(0,1,2); ?>
                            </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <div class="loading2">
            <img id="loading-image" src="<?php echo base_url() . 'assets/image/tenor.gif?t='.time() ?>"
                alt="Loading..." />
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
                        action="<?php echo base_url(); ?>Page/ubahPasswordAdmin" method="POST">
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
        <footer class="main-footer float-right text-sm text-dark">
            <strong>Copyright &copy; 2021 <a href="https://sman3ptk.sch.id/" target="_blank" style="color: #28a745"> SMA
                    Negeri 3 Pontianak </a>&<a href="https://www.instagram.com/egyijaa_/" target="_blank"
                    style="color: #28a745"> Egy Ijaa</a> | Theme by : <a href="https://adminlte.io/" target="_blank"
                    style="color: #28a745">AdminLTE</a></strong>. All rights
            reserved.
        </footer>
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
</script>