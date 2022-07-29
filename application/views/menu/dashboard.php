<head>
<link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/dist/css/bgye.min.css?t=<?php echo time();?>">
    <style>
        .card{
            background-color: rgba(255,255,255,0.7);
        }
        .se{
            background-color: rgba(40,167,69,0.7);
        }
        @media only screen and (min-width: 768px) and (max-width: 995px) {
            .dikit {
                width: 33.333333333%;
            }
            .card-title {
                font-size: 15px;
            }
            .card-text {
                font-size: 13px;
            }
            center {
                font-size: 13px;
            }
        }

        /* penggunaan media query pada mobile layout */
        @media only screen and (min-width: 480px) and (max-width: 767px) {
            .dikit {
                width: 33.333333333%;
            }
            .card-title {
                font-size: 13px;
            }
            .card-text {
                font-size: 11px;
            }
            center {
                font-size: 11px;
            }
            .content-header h1 {
                font-size: 1.4rem;
            }
        }

        @media only screen and (min-width: 180px) and (max-width: 479px) {
            .dikit {
                width: 50%;
            }
            .card-title {
                font-size: 12px;
            }
            .card-text {
                font-size: 10px;
            }
            center {
                font-size: 10px;
            }
            .content-header h1 {
                font-size: 1rem;
            }
        }
    </style>
</head>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Selamat Datang
                                <?php echo $this->session->userdata('ses_nama') ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active" style="color:#28a745">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 dikit">
                            <div class="card testDulu">
                                <div class="card-body zoomPilih">
                                    <a href="<?php echo base_url() ?>Broadcast/toBroadcast">
                                        <img id="img_hover" class="zoom-in-zoom-out"
                                            src="<?php echo base_url(); ?>/assets/bootstrap/img/broadcast.png"
                                            style="width: 100%">
                                        <center>PILIH GAMBAR</center>
                                    </a>
                                </div>
                            </div>

                            <div class="card text-white card-outline se testDulu1">
                                <div class="card-body shine-me">
                                    <?php if($this->session->userdata('akses')!='2' && $this->session->userdata('akses')!='3'):?>
                                    <h5 class="card-title">BROADCAST</h5>
                                    <p class="card-text">
                                        Tambah atau Hapus broadcast atau pengumuman
                                    </p>
                                    <?php else:?>
                                    <h5 class="card-title">PENGUMUMAN</h5>
                                    <p class="card-text">
                                        Seputar informasi dan berita terbaru tentang sekolah dan kegiatan-kegiatan
                                    </p>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 dikit">
                            <div class="card testDulu" style>
                                <div id="link2" class="card-body zoomPilih">
                                    <a href="<?php if ($this->session->userdata('akses') != 2 && $this->session->userdata('akses')!='3'){
                                                    echo base_url().'Lowongan/toLowongan2';
                                                }
                                                else {
                                                    echo base_url().'Lowongan/toLowongan';
                                                }?>">
                                        <img id="img_hover" class="zoom-in-zoom-out"
                                            src="<?php echo base_url(); ?>/assets/bootstrap/img/lowongan.png"
                                            style="width: 100%">
                                        <center>PILIH GAMBAR</center>
                                    </a>
                                </div>
                            </div>
                            <div class="card text-white card-outline se testDulu1">
                                <div class="card-body shine-me">
                                    <?php if($this->session->userdata('akses')!='2' && $this->session->userdata('akses')!='3'):?>
                                    <h5 class="card-title">LOWONGAN PEKERJAAN</h5>
                                    <p class="card-text">
                                        Tambah atau Hapus Lowongan Pekerjaan + Aktivasi
                                    </p>
                                    <?php else:?>
                                    <h5 class="card-title">INFO LOWKER</h5>
                                    <p class="card-text">
                                        Informasi Lowongan Pekerjaan, Ayo Tambahkan LOWKER dari Perusahaanmu!.
                                    </p>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 dikit">
                            <div id="link3" class="card testDulu">
                                <div class="card-body zoomPilih">
                                    <a class="" href="<?php echo base_url(); ?>page/alumni">
                                        <img id="img_hover" class="zoom-in-zoom-out"
                                            src="<?php echo base_url(); ?>/assets/bootstrap/img/alumni.png"
                                            style="width: 100%">
                                        <center>PILIH GAMBAR</center>
                                    </a>
                                </div>
                            </div>
                            <div class="card text-white card-outline se testDulu1">
                                <div class="card-body shine-me">
                                    <?php if($this->session->userdata('akses')!='2' && $this->session->userdata('akses')!='3'):?>
                                    <h5 class="card-title">DATA ALUMNI</h5>
                                    <p class="card-text">
                                        Tambah atau Hapus, Lihat Data, dan Aktivasi Alumni
                                    </p>
                                    <?php else:?>
                                    <h5 class="card-title">DATA ALUMNI SMANTA</h5>
                                    <p class="card-text">
                                        Cari dan temukan teman-teman kalian untuk kembali mempererat silaturahmi
                                    </p>
                                    <?php endif;?>
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