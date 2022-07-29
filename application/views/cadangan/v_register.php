<head>
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/dist/css/bgye.min.css?t=<?php echo time();?>">
    <!-- <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/bs-stepper/css/bs-stepper.min.css?t=<?php echo time();?>"> -->
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

        @media only screen and (min-width: 768px) and (max-width: 995px) {}

        /* penggunaan media query pada mobile layout */
        @media only screen and (min-width: 480px) and (max-width: 767px) {
            .tek1 {
                font-size: 14px;
            }

            .tek2 {
                font-size: 14px;
            }

            .J1 {
                font-size: 18px;
            }

            .L1 {
                font-size: 14px;
            }

            .I1 {
                font-size: 14px;
            }

            .B1 {
                font-size: 14px;
            }
        }

        @media only screen and (min-width: 180px) and (max-width: 479px) {
            .tek1 {
                font-size: 9px;
            }

            .tek2 {
                font-size: 9px;
            }

            .J1 {
                font-size: 15px;
            }

            .L1 {
                font-size: 11px;
            }

            .I1 {
                font-size: 11px;
            }

            .B1 {
                font-size: 11px;
            }
        }

        /* penggunaan media query pada default monitor layout */
        @media only screen and (min-width: 996px) {}
    </style>
</head>
<div id="loader"></div>

<body class="hold-transition loading1">
    <!-- Navbar-->
    <div class="bg1"></div>
    <div class="bg1 bg2"></div>
    <div class="bg1 bg3"></div>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light py-3 bg-gradient-dark">
            <div class="container">
                <!-- Navbar Brand -->
                <a href="<?php echo base_url() ?>index.php/login/index">
                    <h3 class="text-success shine-me">PA<b>SMANTA</b>P</h3>
                </a>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row py-5 mt-4 align-items-center">
            <!-- For Demo Purpose -->
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                <center> <img id="img_hover" src="<?php echo base_url(); ?>/assets/image/gambar_web/logoSmanta.png"
                        alt="" class="img-fluid mb-3 d-none d-md-block">
                    <h1 class="shine-me">Registrasi Alumni Smanta</h1>
                    <p class="font-italic text-muted mb-0">Selamat Datang SMANTA MANIA. Kamu akan mengunjungi website
                        khusus
                        Pendataan Alumni SMA Negeri 3 Pontianak (PASMANTAP), ayo daftarkan dirimu segera!.</p>
                </center>
            </div>

            <!-- Registeration Form -->
            <div class="col-md-7 col-lg-6 ml-auto">
                <!-- array('id'=>'form_register','method'=>'post') -->
                <?php echo form_open('login/alumniBaru2', array('id' => 'form', 'role' => 'form'));?>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <div class="input-group col-lg-12 mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-md border-right-0">
                                    <i class="fas fa-user-friends fa-xs text-muted"></i>
                                </span>
                            </div>
                            <?php echo form_input('NIS', '', array('class' => 'form-control bg-white border-left-0 border-right-0 border-md noSpace', 'placeholder' => 'Username', 'id' => 'NIS'));?>
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-md border-left-0 logo lo1">
                                </span>
                            </div>
                        </div>
                        <div class="print-error-msg 1" style="display:none"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <div class="input-group col-lg-12 mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-md border-right-0">
                                    <i class="far fa-id-card fa-xs text-muted"></i>
                                </span>
                            </div>
                            <?php echo form_input('NAMA', '', array('class' => 'form-control bg-white border-left-0 border-right-0 border-md', 'placeholder' => 'Nama Lengkap', 'id' => 'NAMA'));?>
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-md border-left-0 logo lo3">
                                </span>
                            </div>
                        </div>
                        <div class="print-error-msg 3" style="display:none"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <div class="input-group col-lg-12 mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-md border-right-0">
                                    <i class="fa fa-envelope fa-sm text-muted"></i>
                                </span>
                            </div>
                            <?php echo form_input('EMAIL', '', array('class' => 'form-control bg-white border-left-0 border-right-0 border-md noSpace', 'placeholder' => 'Email', 'id' => 'EMAIL'));?>
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-md border-left-0 logo lo2">
                                </span>
                            </div>
                        </div>
                        <div class="print-error-msg 2" style="display:none"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <div class="input-group col-lg-12 mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-md border-right-0">
                                    <i class="fa fa-book text-muted"></i>
                                </span>
                            </div>
                            <select id="agama" name="AGAMA" value="<?php echo set_value('AGAMA'); ?>"
                                class="form-control custom-select bg-white border-left-0 border-right-0 border-md">
                                <?php

                                                echo "<option disabled selected>Agama (Kepercayaan)</option>";
                                                foreach ($agama as $row) { ?>
                                <option value='<?php echo $row['id_agama']; ?>'>
                                    <?php echo $row['agama']; ?>
                                </option>;
                                <?php }
                                                ?>
                            </select>
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-md border-left-0 logo lo5">
                                </span>
                            </div>
                        </div>
                        <div class="print-error-msg 5" style="display:none"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <div class="input-group col-lg-12 mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-md border-right-0">
                                    <i class="fab fa-black-tie text-muted"></i>
                                </span>
                            </div>
                            <select id="job" name="ANGKATAN" value="<?php echo set_value('ANGKATAN'); ?>"
                                class="form-control custom-select bg-white border-left-0 border-right-0 border-md">
                                <?php

                                                echo "<option disabled selected>Pilih Angkatan (Tahun Kelulusan)</option>";
                                                foreach ($angkatan as $row) { ?>
                                <option value='<?php echo $row['ID_ANGKATAN']; ?>'>
                                    <?php echo $row['angkatan']; ?>
                                </option>;
                                <?php }
                                                ?>
                            </select>
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-md border-left-0 logo lo6">
                                </span>
                            </div>
                        </div>
                        <div class="print-error-msg 6" style="display:none"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6">
                        <div class="input-group col-lg-12 mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <?php echo form_password('PASS', '', array('class' => 'form-control bg-white border-left-0 border-right-0 border-md noSpace', 'placeholder' => 'Password', 'id' => 'PASS'));?>
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-md border-left-0 logo lo7">
                                </span>
                            </div>
                        </div>
                        <div class="print-error-msg 7" style="display:none"></div>
                    </div>
                    <div class="form-group col-lg-6">
                        <div class="input-group col-lg-12 mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <?php echo form_password('passwordConfirmation', '', array('class' => 'form-control bg-white border-left-0 border-right-0 border-md noSpace', 'placeholder' => 'Konfirmasi Password', 'id' => 'passwordConfirmation'));?>
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-md border-left-0 logo lo8">
                                </span>
                            </div>
                        </div>
                        <div class="print-error-msg 8" style="display:none"></div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group col-lg-12 mx-auto mb-0 mt-3 effect01">
                    <input id="form-submit-button" type="submit" name="save" value="Konfirmasi"
                        class="btn btn-success btn-block py-2 zoomPilih">
                </div>
                <div class="text-center w-100">
                    <p class="text-muted font-weight-bold zoomPilih">Sudah Punya Akun? <a
                            href="<?php echo base_url().'index.php/login/toLogin'?>" class="text-primary ml-2">Login</a>
                    </p>
                </div>


                <?php echo form_close();?>
            </div>
        </div>
        <!-- <div class="mb-5 p-4 bg-white shadow-sm">
            <h3 class="J1">Linear stepper</h3>
            <div id="stepper1" class="bs-stepper">
                <div class="bs-stepper-header col-12" role="tablist">
                    <div class="step col-3" data-target="#test-l-1">
                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger1"
                            aria-controls="test-l-1">
                            <span class="bs-stepper-circle tek1">1</span>
                            <span class="bs-stepper-label tek2">Pertanyaan 1</span>
                        </button>
                    </div>
                    <div class="step col-3" data-target="#test-l-2">
                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger2"
                            aria-controls="test-l-2">
                            <span class="bs-stepper-circle tek1">2</span>
                            <span class="bs-stepper-label tek2">Pertanyaan 2</span>
                        </button>
                    </div>
                    <div class="step col-3" data-target="#test-l-3">
                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger3"
                            aria-controls="test-l-3">
                            <span class="bs-stepper-circle tek1">3</span>
                            <span class="bs-stepper-label tek2">Pertanyaan 3</span>
                        </button>
                    </div>
                    <div class="step col-3" data-target="#test-l-4">
                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger4"
                            aria-controls="test-l-4">
                            <span class="bs-stepper-circle tek1">4</span>
                            <span class="bs-stepper-label tek2">Validate</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <form onSubmit="return false" class="needs-validation" action="#" novalidate>
                        <div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="L1">Email address</label>
                                <input type="email" class="form-control I1" id="exampleInputEmail1" name="P1"
                                    placeholder="Enter email">
                            </div>
                            <button class="btn btn-primary B1" onclick="stepper1.next()">Next</button>
                        </div>
                        <div id="test-l-2" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger2">
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="L1">Password</label>
                                <input type="password" class="form-control I1" id="exampleInputPassword1" name="P2"
                                    placeholder="Password">
                            </div>
                            <button class="btn btn-primary B1" onclick="stepper1.previous()">Previous</button>
                            <button class="btn btn-primary B1" onclick="stepper1.next()">Next</button>
                        </div>
                        <div id="test-l-3" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger3">
                            <h5 class="J1">lima ditambah sepuluh sama dengan brapa hayoo??</h5>
                                <div class="form-check">
                                    <div class="d-flex flex-row">
                                        <input class=" " type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Sepuluh
                                        </label>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <input class="" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Sembilan Belas
                                        </label>
                                    </div>
                                    <div class="d-flex flex-row ">
                                        <input class="" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault13">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Lima Belas
                                        </label>
                                    </div>
                                </div>
                            <div class="form-group">
                                <input name="pilih" type="radio" class="form-control I1" id="exampleInputPassword0"
                                    placeholder="Password" value="Pilihan1">
                                <label for="exampleInputPassword0" class="L1">Pilihan Pertama</label>
                                <input name="pilih" type="radio" class="form-control I1" id="exampleInputPassword2"
                                    placeholder="Password" value="Pilihan2">
                                <label for="exampleInputPassword2" class="L1">Pilihan Kedua</label>
                                <input name="pilih" type="radio" class="form-control I1" id="exampleInputPassword3"
                                    placeholder="Password" value="Pilihan3">
                                <label for="exampleInputPassword3" class="L1">Pilihan Ketiga</label>
                            </div>
                            <button class="btn btn-primary" onclick="stepper1.previous()">Previous</button>
                            <button class="btn btn-primary" onclick="stepper1.next()">Next</button>
                        </div>
                        <div id="test-l-4" role="tabpanel" class="bs-stepper-pane text-center"
                            aria-labelledby="stepper1trigger4">
                            <button class="btn btn-primary mt-5 B1" onclick="stepper1.previous()">Previous</button>
                            <button type="submit" id="wizardId" class="btn btn-primary mt-5 B1">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
        <footer class="main-footer float-right text-sm text-dark">
            <strong>Copyright &copy; 2021 <a href="https://sman3ptk.sch.id/" target="_blank" style="color: #28a745"> SMA
                    Negeri 3 Pontianak </a>&<a href="https://www.instagram.com/egyijaa_/" target="_blank"
                    style="color: #28a745"> Egy Ijaa</a> | Theme by : <a href="https://adminlte.io/" target="_blank"
                    style="color: #28a745">AdminLTE</a></strong>. All rights
            reserved.
        </footer>
    </div>
    <div class="loading2">
        <img id="loading-image" src="<?php echo base_url() . 'assets/image/tenor.gif?t='.time() ?>" alt="Loading..." />
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- <script src="<?php echo base_url(); ?>assets/adminLte/plugins/bs-stepper/js/bs-stepper.min.js?t=<?php echo time();?>">
</script>
<script src="<?php echo base_url(); ?>assets/adminLte/dist/js/main.js?t=<?php echo time();?>"></script> -->

<script type="text/javascript">
    $(window).on('load', function () {
        $(".loading2").fadeOut("slow", function () {
            $('body').removeClass('loading1');
        });
    });
    $(document).ready(function () {
        $('#form-submit-button').on('click', function (e) {
            e.preventDefault();
            var spinner = $('#loader');
            Swal.fire({
                icon: 'question',
                title: 'Apakah sudah mengisi dengan Benar?',
                text: 'PENTING! khusus Username, ANGKATAN(Kelulusan) dan AGAMA harap anda isi dengan benar, karena tidak dapat diubah!',
                showCancelButton: true,
                confirmButtonText: `Submit/Sudah Benar`,
                cancelButtonText: `Batal/Periksa Kembali`,
                confirmButtonColor: `#28a745`,
                cancelButtonColor: '#dc3545',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    if (!$('input[name="NIS"]').val() || !$('input[name="NAMA"]').val() || !$(
                            'input[name="EMAIL"]').val() || !$('select[name="AGAMA"]').val() ||
                        !$('select[name="ANGKATAN"]')
                        .val() || !$('input[name="PASS"]').val()) {
                        Swal.fire(
                            'Empty Field',
                            'Harap isi semua field yang kosong!',
                            'warning'

                        )
                        return false;
                    }

                    if ($('input[name="NIS"]').val().length < 5 || $('input[name="NIS"]').val()
                        .length > 20) {
                        Swal.fire(
                            'Username Salah',
                            'Minimal 5 karakter dan maksimal 20 karakter',
                            'warning'

                        )
                        return false;
                    }
                    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                    var emailaddressVal = $("#EMAIL").val();
                    if (!emailReg.test(emailaddressVal)) {
                        Swal.fire(
                            'Format Email Salah!',
                            'Harap isi dengan format Email yang Benar!',
                            'warning'
                        )
                        return false;
                    }
                    if ($('input[name="PASS"]').val().length < 6) {
                        Swal.fire(
                            'Password tidak memenuhi syarat',
                            'Password kurang dari 6 Karakter! Minimal menggunakan 6 karakter',
                            'warning'

                        )
                        return false;
                    }
                    spinner.show();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('login/alumniBaru2');?>",
                        data: $("#form").serialize(),
                        dataType: "json",
                        success: function (data) {
                            spinner.hide();
                            if ($.isEmptyObject(data.error)) {
                                if (data.message == "success") {
                                    Swal.fire(
                                        'DATA TERSIMPAN!',
                                        'Akun bisa login jika sudah aktif, jika belum harap konfimasi kepada pihak sekolah dan tunggu maksimal 2x24 jam!.',
                                        'success'
                                    )
                                    $(".print-error-msg").css('display', 'none');
                                    $(".logo").html("");
                                    $("#form")[0].reset();
                                } else {
                                    Swal.fire(
                                        'DATA GAGAL DISIMPAN!',
                                        data.error,
                                        'error'
                                    );
                                }
                            } else {
                                $(".print-error-msg").css('display', 'block');
                                $(".logo").html(
                                    "<i class='fas fa-window-close text-danger'></i>"
                                );
                                if (data.error.NIS) {
                                    $(".1").html(data.error.NIS);
                                } else {
                                    $(".lo1").html(
                                        "<i class='fas fa-check-circle text-success'></i>"
                                    );
                                    $(".1").html(data.success.NIS);
                                }
                                if (data.error.EMAIL) {
                                    $(".2").html(data.error.EMAIL);
                                } else {
                                    $(".lo2").html(
                                        "<i class='fas fa-check-circle text-success'></i>"
                                    );
                                    $(".2").html(data.success.EMAIL);
                                }
                                if (data.error.NAMA) {
                                    $(".3").css('display', 'block');
                                    $(".3").html(data.error.NAMA);
                                } else {
                                    $(".lo3").html(
                                        "<i class='fas fa-check-circle text-success'></i>"
                                    );
                                    $(".3").css('display', 'none');
                                }
                                if (data.error.AGAMA) {
                                    $(".5").css('display', 'block');
                                    $(".5").html(data.error.AGAMA);
                                } else {
                                    $(".lo5").html(
                                        "<i class='fas fa-check-circle text-success'></i>"
                                    );
                                    $(".5").css('display', 'none');
                                }
                                if (data.error.ANGKATAN) {
                                    $(".6").css('display', 'block');
                                    $(".6").html(data.error.ANGKATAN);
                                } else {
                                    $(".lo6").html(
                                        "<i class='fas fa-check-circle text-success'></i>"
                                    );
                                    $(".6").css('display', 'none');
                                }
                                if (data.error.PASS) {
                                    $(".7").html(data.error.PASS);
                                } else {
                                    $(".lo7").html(
                                        "<i class='fas fa-check-circle text-success'></i>"
                                    );
                                    $(".7").html(data.success.PASS);
                                }
                                if (data.error.passwordConfirmation) {
                                    $(".8").html(data.error.passwordConfirmation);
                                } else {
                                    $(".lo8").html(
                                        "<i class='fas fa-check-circle text-success'></i>"
                                    );
                                    $(".8").html(data.success.passwordConfirmation);
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
    });
</script>
<script>
    $(function () {
        $('input, select').on('focus', function () {
            $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
        });
        $('input, select').on('blur', function () {
            $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
        });
    });
    $("#NIS").one("click", function () {
        Swal.fire({
            title: '<strong>PENTING, MOHON DIBACA!</strong>',
            icon: 'info',
            html: 'Untuk Angkatan kelulusan <b>2020 Kebawah</b>, Harap membuat username baru yang mudah dikenali!.<br><br>' +
                'Khusus Angkatan yang akan lulus (Kelas XII), Harap Gunakan format username yang sudah berikan oleh wali kelas masing-masing!, Jika Lupa Harap Hubungi Pihak Sekolah/Admin Dahulu<br>',
            focusConfirm: false,
            confirmButtonText: '<i class="fa fa-thumbs-up"></i> Mengerti!',
            confirmButtonAriaLabel: 'Thumbs up, Mengerti!',
            confirmButtonColor: `#28a745`,
        })
    })
    $("#agama").one("click", function () {
        Swal.fire({
            title: '<strong>PENTING, MOHON DIBACA!</strong>',
            icon: 'info',
            html: 'Data lebih lanjut dapat diubah/update setelah Login Kedalam Sistem<br><br>' +
                'Khusus Data <b>USERNAME, ANGKATAN(Kelulusan), dan AGAMA</b>, Tidak Dapat diubah!<br><br>' +
                'Harap masukkan <b>USERNAME, ANGKATAN(Kelulusan), dan AGAMA</b> dengan <b>BENAR</b>',
            focusConfirm: false,
            confirmButtonText: '<i class="fa fa-thumbs-up"></i> Mengerti!',
            confirmButtonAriaLabel: 'Thumbs up, Mengerti!',
            confirmButtonColor: `#28a745`,
        })
    })
    $("#job").one("click", function () {
        Swal.fire({
            title: '<strong>PENTING, MOHON DIBACA!</strong>',
            icon: 'info',
            html: 'Data lebih lanjut dapat diubah/update setelah Login Kedalam Sistem<br><br>' +
                'Khusus Data <b>USERNAME, ANGKATAN(Kelulusan), dan AGAMA</b>, Tidak Dapat diubah!<br><br>' +
                'Harap masukkan <b>USERNAME, ANGKATAN(Kelulusan), dan AGAMA</b> dengan <b>BENAR</b>',
            focusConfirm: false,
            confirmButtonText: '<i class="fa fa-thumbs-up"></i> Mengerti!',
            confirmButtonAriaLabel: 'Thumbs up, Mengerti!',
            confirmButtonColor: `#28a745`,
        })
    })
    $(document).ready(function () {
        // do not allow users to enter spaces:
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
    });
</script>