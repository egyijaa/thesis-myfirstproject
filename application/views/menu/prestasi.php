<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestasi Alumni</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/adminLte/dist/css/bgye.min.css?t=<?php echo time(); ?>">
    <style>
        .content-wrapper {
            background-color: rgba(255, 255, 255, 0);
        }

        .belakang {
            background-color: rgba(255, 255, 255, 0.4);
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
                <button id="tampilkanTambah" class="btn btn-primary mb-3" onclick="showTambah()"><span>Tambah Prestasi</span></button>
                <div class="row">
                    <div id="dataTambah" class="col-lg-10" style="display:none;">
                        <div class="card">
                            <?php echo form_open('Page/TambahPrestasi', array('id' => 'form_prestasi', 'role' => 'form', 'enctype' => "multipart/form-data")); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Jenis Prestasi</label>
                                    <select id="jenisPrestasi" name="jenisPrestasi" class="form-control" required>
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
                                <div class="form-group sembunyi" hidden>
                                    <label>Highlight</label>
                                    <?php echo form_input('judul', '', array('class' => 'form-control', 'placeholder' => 'co: Juara Umum Kampung Budaya UB 2019', 'id' => 'judul', 'disabled' => 'disabled')); ?>
                                    <div class="print-error-msg 1" style="display:none" disabled>
                                    </div>
                                </div>
                                <div class="form-group sembunyi" hidden>
                                    <label>Data Alumni</label>
                                    <table class="table table-bordered" id="dynamicTable">
                                        <tr>
                                            <th>Tahun Kelulusan</th>
                                            <th>Nama Alumni</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select id="nomor0" name="addmore[0][qty] chekT[]" placeholder="Enter your Qty" class="form-control" />
                                                <option disabled selected value="">Silahkan Pilih
                                                </option>
                                                <?php
                                                foreach ($angkatan as $row) { ?>

                                                    <option value='<?php echo $row['id_angkatan']; ?>'>
                                                        <?php echo $row['angkatan']; ?>
                                                    </option>;
                                                <?php }
                                                ?>
                                            </td>
                                            <td><select id="nama0" name="addmore[0][name] chekN[]" placeholder="Enter your Name" class="form-control cekLok" /></td>
                                            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group sembunyi" hidden>
                                    <label for="exampleInputFile">POSTER</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <label id="gambar" class="custom-file-label" for="exampleInputFile">Pilih
                                                Gambar (Klik Disini)</label>
                                            <input name="gambar" type="file" accept='image/*' id="inputFile" class="custom-file-input" id="exampleInputFile" required>
                                        </div>
                                    </div>
                                    <div class="print-error-msg 3" style="display:none">
                                    </div>
                                </div>

                                <div class="form-group sembunyi" hidden>
                                    <label>PREVIEW</label>
                                    <img id="image_upload_preview" src="http://placehold.jp/300x400.png" style="width:300px;height:400px" alt="your image" />
                                </div>
                                <div class="card card-info sembunyi" hidden>
                                    <div class="card-header">
                                        <h3 class="card-title">Bulan dan Tahun Prestasi
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Minimal style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <input id="deadline" name="deadline" type="month" class="form-control" placeholder="">
                                            </div>
                                            <div class="print-error-msg 4" style="display:none"></div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <div class="form-group sembunyi" hidden>
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                DESKRIPSI
                                            </h3>
                                            <!-- tools box -->
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                    <i class="fas fa-minus"></i></button>
                                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                                    <i class="fas fa-times"></i></button>
                                            </div>
                                            <!-- /. tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body pad">
                                            <div class="mb-3">
                                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" placeholder="Deskripsi" required></textarea>
                                            </div>
                                            <div class="print-error-msg 5" style="display:none"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input disabled type="submit" class="btn bg-gradient-success" value="Simpan" id="simpan" name="simpan">
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Default box -->
        <div class="card belakang">
            <div class="card-body pb-0">
                <div class="row d-flex align-items-stretch">
                    <?php if (!empty($information2)) :
                        $skipIndex = array();
                        foreach ($information2 as $key => $row) :
                            if (array_search($key, $skipIndex)) {
                                continue;
                            }
                            $isExist = false;
                            $count = 0;
                            $listSiswa = array();
                            foreach ($information2 as $keySiswa => $rowSiswa) {
                                if ($row['judul'] == $rowSiswa['judul']) {
                                    $count++;
                                    array_push($listSiswa, array($rowSiswa['nama'] => $rowSiswa['angkatan']));
                                    array_push($skipIndex, $keySiswa);
                                }
                                if ($count > 1) {
                                    $isExist = true;
                                }
                            }
                            if ($row['id_prestasi'] == 1) {
                                $fas = '<i class="fas fa-user-tie"></i> ';
                            }
                            elseif ($row['id_prestasi'] == 2) {
                                $fas = '<i class="fas fa-user-graduate"></i> ';
                            }
                            elseif ($row['id_prestasi'] == 3) {
                                $fas = '<i class="fas fa-trophy"></i> ';
                            }
                            elseif ($row['id_prestasi'] == 4) {
                                $fas = '<i class="fas fa-star"></i> ';
                            }
                            elseif ($row['id_prestasi'] == 5) {
                                $fas = '<i class="fab fa-envira"></i> ';
                            }
                            if ($isExist) {
                    ?>
                                <div class="col-12 col-md-6 d-flex align-items-stretch">
                                    <div class="card belakang">
                                        <div class="card-header text-muted border-bottom-0">
                                            <?php echo $row['prestasi']; ?>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="lead"><b><?php echo $fas.$row['judul']; ?></b></h2>
                                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                                        <?php
                                                        foreach ($listSiswa as $valueSiswa) {
                                                            foreach ($valueSiswa as $keyData => $valueData) {
                                                        ?>
                                                                <li class="text-danger"><span class="fa-li"><i class="fas fa-user-secret"></i></span> <?php echo $keyData; ?></li>                                                             
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <?php
                                                            echo "<li class='text-dark'>Angkatan ";
                                                        foreach ($listSiswa as $valueSiswa) {
                                                            foreach ($valueSiswa as $keyData2 => $valueData2) {
                                                                ?>
                                                                        <?php echo $valueData2 . ", "; ?>                                                             
                                                                <?php
                                                                    }
                                                                }
                                                                echo "</li>";
                                                        ?>
                                                        <li class="text-success"><span class="text-dark">Dicapai Pada: </span><?php echo date('F Y', strtotime($row['tanggal'])); ?></li>
                                                    </ul>
                                                </div>
                                                <div class="col-5 text-center">
                                                    <img src="https://www.earlygame.com/uploads/images/_body/415899/valorant-champions_2021-11-04-100901_ukvk.jpg" alt="user-avatar" class="img-circle img-fluid" style="max-height: 200px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="col-12 col-md-6 d-flex align-items-stretch">
                                    <div class="card belakang">
                                        <div class="card-header text-muted border-bottom-0">
                                            <?php echo $row['prestasi']; ?>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="lead"><b><?php echo $fas.$row['judul']; ?></b></h2>
                                                    <ul class="ml-4 mb-0 fa-ul text-muted">

                                                        <li class="text-danger"><span class="fa-li"><i class="fas fa-user-secret"></i></span> <?php echo $row['nama']; ?></li>
                                                        <li class="text-success"><span class="fa-li"><i class="fas fa-graduation-cap"></i></span><span class="text-dark">Kelulusan SMA: </span><?php echo $row['angkatan']; ?></li>
                                                        <li class="text-success"><span class="text-dark">Dicapai Pada: </span><?php echo date('F Y', strtotime($row['tanggal'])); ?></li>
                                                    </ul>
                                                </div>
                                                <div class="col-5 text-center">
                                                    <img src="https://www.earlygame.com/uploads/images/_body/415899/valorant-champions_2021-11-04-100901_ukvk.jpg" alt="user-avatar" class="img-circle img-fluid" style="max-height: 200px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                    <?php endforeach;
                    endif; ?>
                </div>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer">
                        <nav aria-label="Contacts Page Navigation">
                            <ul class="pagination justify-content-center m-0">
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item"><a class="page-link" href="#">7</a></li>
                                <li class="page-item"><a class="page-link" href="#">8</a></li>
                            </ul>
                        </nav>
                    </div> -->
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="loading2">
    <img id="loading-image" src="<?php echo base_url() . 'assets/image/tenor.gif?t=' . time() ?>" alt="Loading..." />
</div>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
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
            Negeri 3 Pontianak </a>&<a href="https://www.instagram.com/egyijaa_/" target="_blank" style="color: #28a745"> Egy Ijaa</a> | Theme by : <a href="https://adminlte.io/" target="_blank" style="color: #28a745">AdminLTE</a></strong>. All rights
    reserved.
</footer>
<script>
    $(document).on('click', '#siapUbah', function(e) {
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
                    success: function(response) {
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
            $("#tampilkanTambah").html("Tambah Prestasi");
            x.style.display = "none";
            y.style.display = "none";
        }
    }

    function getUrl(path) {
        var url = window.location.origin + path;
        if (window.location.host == "localhost") {
            url = window.location.origin + "/pasmantap" + path;
        }
        return url;
    }

    $(document).ready(function() {
        $('select').change(function(e) {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            if ($(".sembunyi").is(":hidden")) {
                $(".sembunyi").attr('hidden', false)
                $('#judul').prop("disabled", false);
            }
            if (valueSelected == null || valueSelected == '') {
                $('#judul').attr("placeholder", "Type your answer here");
            } else if (valueSelected == 1) {
                $('#judul').attr("placeholder", "Contoh: Letnan Jendral TNI");
            } else if (valueSelected == 2) {
                $('#judul').attr("placeholder", "Contoh: Graduate of Havard University");
            } else if (valueSelected == 3) {
                $('#judul').attr("placeholder", "Contoh: Champions of World Cup Qatar 2022");
            } else if (valueSelected == 4) {
                $('#judul').attr("placeholder", "Contoh: Juara Umum Kampung Budaya UB 2019");
            } else if (valueSelected == 5) {
                $('#judul').attr("placeholder", "Contoh: Duta Reboisasi 2020");
            }
        });
    });

    $('.bisaTulis').selectize({
        sortField: 'text'
    });

    $('#nomor0').change(function() {
        var periksaID = $(this).val();
        if (periksaID != '') {
            var url = getUrl("/Page/fetch_state");
            $('#nama0').hide();
            $.ajax({
                url: url,
                method: "POST",
                data: {
                    periksaID: periksaID
                },
                success: function(data) {
                    $('#nama0').html(data);
                }
            });
            $('#nama0').show();
        } else {
            $('#nama0').html('<option value="">Pilih Nama</option>');
        }
    });
    var i = 0;
    $(document).on('click', '.remove-tr', function() {
        if (i > 0) {
            i--;
            $('#nomor' + i + '').removeAttr('disabled');
            $('#nama' + i + '').removeAttr('disabled');
        }
        $(this).parents('tr').remove();
    });
    var angkatan = "<?php foreach ($angkatan as $row) { ?> <option value='<?php echo $row['id_angkatan']; ?>'> <?php echo $row['angkatan']; ?> </option>;<?php } ?>";


    $("#add").click(function() {
        if (!$('#nama' + i + '').val()) {
            Swal.fire(
                'Empty Field',
                'Harap Pilih Nama Alumni Dahulu!',
                'warning'
            )
        } else {
            $('#nomor' + i + '').attr('disabled', 'disabled');
            $('#nama' + i + '').attr('disabled', 'disabled');
            ++i;
            $("#dynamicTable").append('<tr><td><select id ="nomor' + i + '" name="addmore[' + i + '][qty] chekT[]" placeholder="pilih angkatan kelulusan" class="form-control"><option disabled selected value="">Silahkan Pilih</option>' + angkatan + '</select></td><td><select id ="nama' + i + '" name="addmore[' + i + '][name] chekN[]" placeholder="Pilih Nama" class="form-control cekLok" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
            $('#nomor' + i + '').change(function() {
                var periksaID = $(this).val();
                var url = getUrl("/Page/fetch_state");
                if (periksaID != '') {
                    $.ajax({
                        url: url,
                        method: "POST",
                        data: {
                            periksaID: periksaID
                        },
                        success: function(data) {
                            $('#nama' + i + '').html(data);
                        }
                    });
                } else {
                    $('#nama' + i + '').html('<option value="">Pilih Nama</option>');
                }
            });
        }
    });

    $('#jenisPrestasi').change(function() {
        $('#simpan').prop('disabled', false);
    });
    $(document).on('click', '#simpan', function(event) {
        event.preventDefault();
        if (!$('#judul').val()) {
            Swal.fire(
                'Highlight Kosong!',
                'Harap Isi Dulu Highlight atau judul prestasi!',
                'warning'
            )
            return false;
        }
        var windeId = $('.cekLok').map(function() {
            return this.value;
        }).get();
        if (windeId == '') {
            Swal.fire(
                'Nama Alumni Kosong',
                'Terdapat nama alumni yang belum dipilih, periksa kembali!',
                'warning'
            )
            return false;
        }
        const dateInput = document.getElementById('deadline');
        if (!dateInput.value) {
            Swal.fire(
                'Bulan dan Tahun Kosong!',
                'Harap Isi Dulu Bulan dan Tahun dari prestasi yang dicapai!',
                'warning'
            )
            return false;
        }
        if (!$('#deskripsi').val()) {
            Swal.fire(
                'Deskripsi Kosong!',
                'Harap Isi Dulu Highlight atau judul prestasi!',
                'warning'
            )
            return false;
        }
        swal.fire({
            title: "Apakah Data Sudah Benar?",
            text: "Harap perhatikan kembali data yang anda isikan!",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: `Simpan`,
            cancelButtonText: `Batal`,
            confirmButtonColor: `#28a745`,
            cancelButtonColor: '#dc3545',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                // spinner.show();
                var url = getUrl("/Page/TambahPrestasi");
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#form_prestasi").serialize(),
                    dataType: "json",
                    success: function(data) {
                        // spinner.hide();
                        if ($.isEmptyObject(data.error) || data.message == "success") {
                            Swal.fire(
                                'DATA TERSIMPAN!',
                                'Akun berhasil ditambahkan ke dalam sistem, dan akun dapat langsung login. <b>PASSWORD sama dengan Username</b>',
                                'success'
                            )
                            $("#form_prestasi")[0].reset();
                        } else {
                            $(".print-error-msg").css('display', 'block');
                            if (data.error.kelas) {
                                $(".1").html(data.error.kelas);
                            } else {
                                $(".1").css('display', 'none');
                            }
                            if (data.error.username) {
                                $(".2").html(data.error.username);
                            } else {
                                $(".2").html(data.success.username);
                            }
                            if (data.error.nama) {
                                $(".3").html(data.error.nama);
                            } else {
                                $(".3").css('display', 'none');
                            }
                            if (data.error.angkatan) {
                                $(".4").html(data.error.angkatan);
                            } else {
                                $(".4").css('display', 'none');
                            }
                            if (data.error.roles) {
                                $(".5").html(data.error.roles);
                            } else {
                                $(".5").css('display', 'none');
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
    });
</script>