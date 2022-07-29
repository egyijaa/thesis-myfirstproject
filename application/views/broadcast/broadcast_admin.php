<head>
<link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/dist/css/bgye.min.css?t=<?php echo time();?>">
    <script>
        function searchFilter(page_num) {
            page_num = page_num ? page_num : 0;
            var keywords = $('#keywords').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>Broadcast/ajaxPaginationData/' + page_num,
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
            background-color: rgba(255, 255, 255, 0.3);
        }

        .hehe {
            border-radius: 5% 5% 10% 10%;
            box-shadow: 0px 0px 0px 5px rgba(0, 0, 0, 0.7);
        }

        table.dataTable tbody tr.selected {
            color: whitesmoke !important;
            background-color: #343a40 !important;
        }
    </style>
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-select/css/select.bootstrap4.min.css">
</head>
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
                                        <li data-target="#carouselExampleControls" data-slide-to="<?php echo $p; ?>"
                                            class="<?php if($p == 1){echo ' active';} ?>"></li>
                                        <?php $p++;?>
                                        <?php endforeach;?>
                                        <?php endif; ?>
                                    </ol>
                                    <?php $i = 1;?>
                                    <?php if (!empty($gambar)) : ?>
                                    <div class="carousel-inner">
                                        <?php foreach ($gambar as $row) : ?>
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
                                                <p class="bg-gradient-cyan">Berlangsung Pada Tanggal :
                                                    <?php $date = date("d-m-Y H:i:s", strtotime($row['expired'])); echo $date;?>
                                                </p>
                                                <?php else :?>
                                                <p class=" bg-gradient-fuchsia">Dipublikasikan pada:
                                                    <?php $date = date("d-m-Y H:i:s", strtotime($row['published'])); echo $date;?>
                                                </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php $i++;?>
                                        <?php endforeach;?>
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
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div id="cari2" class="input-group mb-3" style="visibility: hidden;">
                                <input id="keywords" name="cari" type="text" class="form-control"
                                    placeholder="Judul Pengumuman" onkeyup="searchFilter()">
                                <div class=" input-group-append">
                                    <div class="input-group-text">
                                        <span class="fa fa-search"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="post-list" id="postList">
                                <div class="card-body">
                                    <table id="dataBroadcast" style="table-layout: fixed; margin-top:15px"
                                        class="table table-bordered table-striped table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th>Publisher</th>
                                                <th>Judul</th>
                                                <th>Waktu Publikasi</th>
                                                <th>Waktu Berlangsung</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($posts)) : foreach ($posts as $row) : ?>
                                            <tr>
                                                <td><?php echo $row['nama'].' (Admin)'; ?></td>
                                                <td><?php echo $row['judul']; ?></td>
                                                <td>
                                                    <p class=" bg-gradient-fuchsia">
                                                        <?php $date = date("d-F-Y", strtotime($row['published'])); echo $date;?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <?php if (!empty($row['expired'])) :?>
                                                    <p class="bg-gradient-cyan">
                                                        <?php $date = date("d-F-Y H:i", strtotime($row['expired'])); echo $date;?>
                                                    </p>
                                                    <?php else : ?>
                                                    <p class="bg-gradient-danger">Tidak Ada</p>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" title="Detail" data-toggle="modal"
                                                            data-target="#detailModal" name="detil"
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
                                                            class="btn btn-info zoomPilih" href="#detailModal"
                                                            value="<?php echo $row['nip']; ?>"><i
                                                                class="fas fa-info-circle"></i></button>
                                                        <?php if($this->session->userdata('akses')=='0' || $this->session->userdata('akses')=='1'):?>
                                                        <button data-target="#konfirmasiDel" name="detil"
                                                            data-id="<?php echo $row['id_broadcast']; ?>"
                                                            data-toggle="modal" class="btn btn-danger zoomPilih"
                                                            href="#detailModal"
                                                            value="<?php echo $row['id_broadcast']; ?>"><i
                                                                class="fas fa-trash"></i></button>
                                                        <?php endif;?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach;
                                                else : ?>
                                            <tr>
                                                <td colspan="6">
                                                    <?php echo $this->session->flashdata('#error-broadcast');?>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
                <div class="loading" style="display: none;">
                    <div class="content"><img src="<?php echo base_url() . 'assets/image/loading.gif?t='.time() ?>" />
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <?php if($this->session->userdata('akses')=='0' || $this->session->userdata('akses')=='1'):?>
                        <div id="dataTambah" class="col-lg-12">
                            <div class="card">
                                <form id="form_lowongan" class="form"
                                    action="<?php echo base_url() ?>Broadcast/Tambah"
                                    enctype="multipart/form-data" method="POST">
                                    <div class="card-body">
                                        <center><label>TAMBAH BROADCAST!</label></center>
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input id="judul" name="judul" type="text" class="form-control"
                                                placeholder="Judul" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Gambar (Jika ada)</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                    <input name="gambar" type="file" accept='image/*' id="inputFile"
                                                        class="custom-file-input" id="exampleInputFile">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Preview</label>
                                            <a target="_blank" href="#" onclick="test(this)">
                                                <img id="image_upload_preview"
                                                    src="<?php echo base_url(); ?>/assets/image/gambar_web/view.png"
                                                    style="width:200px;height:300px" alt="your image" />
                                            </a>
                                        </div>
                                        <div class="card card-info">
                                            <div class="card-header">
                                                <h3 class="card-title">Tanggal Acara (Jika Ada)</h3>
                                            </div>
                                            <div class="card-body">
                                                <!-- Minimal style -->
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- checkbox -->
                                                        <input id="deadline" name="deadline" type="datetime-local"
                                                            class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <div class="form-group">
                                            <div class="card card-outline card-info">
                                                <div class="card-header">
                                                    <h3 class="card-title">
                                                        DESKRIPSI
                                                        <small>(Boleh Kosong)</small>
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
                                                <div class="card-body pad" id="masuk2">
                                                    <div class="mb-3">
                                                        <textarea name="konten" class="textarea" rows="3"
                                                            placeholder="Konten" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button id="save" type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php else:?>
                        <?php endif;?>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
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

<div id="detailModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="judul" class="modal-title"></h4>
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
                            <p id="konten1" class="text-muted"></p>
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
<div id="konfirmasiDel" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#FFA500">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus broadcast ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                <form action="<?php echo base_url(); ?>Broadcast/Hapus" method="POST">
                    <button id="delBroadcast" name="delBroadcast" class="btn btn-danger" value="">Ya</a>
                </form>
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
<script>
    $(function () {
        var akses = "<?php echo $this->session->userdata('akses') ?>";
        console.log(akses)
        if (akses != '2' && akses != '3') {
            $("#dataBroadcast").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                select: true,
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
            }).buttons().container().appendTo('#dataBroadcast_wrapper .col-md-6:eq(0)');
        } else {
            $("#dataAlumni").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            });
        }
    });
</script>

<script>
    $(document).ready(function () {
        $(function () {
            $('input:file').change(function (e) {
                var files = e.originalEvent.target.files;
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
                }
            })
            $('#delBroadcast').click(function () {
                Swal.fire({
                    icon: 'warning',
                    title: 'DATA DIHAPUS',
                    text: 'Broadcast telah berhasil dihapus dari database',
                })
            })

            $('input').focus(function () {
                if ($("#masuk").is(":hidden")) {
                    $("#masuk").attr('hidden', false);
                    //$('#mobile').inputmask('(+62)-999-9999-99999');
                }
            })
            $('input').focusout(function () {
                if (!$("#masuk").is(":hidden")) {
                    $("#masuk").attr('hidden', true);
                    //$('#mobile').inputmask('(+62)-999-9999-99999');
                }
            })
        })
        $('#detailModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var modal = $(this);
            var gambar = button.data('gambar');
            modal.find('.modal-body #profilDetail').attr('src',
                "<?php echo base_url(); ?>/assets/image/broadcast/" + button.data('gambar'));
            modal.find('.modal-header #judul').html(button.data('judul'));
            modal.find('.modal-body #judul').html(button.data('judul'));
            modal.find('.modal-body #konten1').html(button.data('konten'));
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
    $(document).on('click', '#save', function (event) {
        event.preventDefault();
        if (!$('input[name="judul"]').val()) {
            Swal.fire(
                'Judul Kosong',
                'Harap masukkan Judul dari Broadcast!',
                'warning'
            )
            return false;
        }
        swal.fire({
            title: "Apakah Data Sudah Benar?",
            text: "Setelah disubmit, anda tidak akan bisa mengedit broadcast!",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: `Simpan`,
            cancelButtonText: `Batal`,
            confirmButtonColor: `#28a745`,
            cancelButtonColor: '#dc3545',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Disimpan!', 'Broadcast telah disimpan dan dapat dilihat oleh Alumni',
                    'success');
                $('#form_lowongan').submit();
            } else {
                Swal.fire('Data Belum Disimpan', '', 'info')
                return false;
            }
        })
    });
    $('#delBroadcast').click(function () {
        Swal.fire({
            icon: 'warning',
            title: 'DATA DIHAPUS',
            text: 'Broadcast telah berhasil dihapus dari database',
        })
    })

    function test(element) {
        var newTab = window.open();
        setTimeout(function () {
            newTab.document.body.innerHTML = element.innerHTML;
        }, 500);
        return false;
    }
</script>
<script>
    $(document).ready(function () {
        $('#konfirmasiDel').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var modal = $(this);
            modal.find('.modal-footer #delBroadcast').attr('value', button.data('id'));
            console.log(button.data('id'));
            Swal.fire(
                'Penting!',
                'Jika broadcast dihapus, maka broadcast yang akan dihapus dan tersimpan di database akan dihapus semua!',
                'warning'
            )
        })
    });
    $("#deadline").one("click", function (e) {
        e.preventDefault();
        Swal.fire({
            title: '<strong>PENTING, MOHON DIBACA!</strong>',
            icon: 'info',
            html: 'Jika hanya menyampaikan informasi dan <strong>tidak ditentukan tanggal</strong> maka jangan diisi form tanggalnya',
            focusConfirm: false,
            confirmButtonText: '<i class="fa fa-thumbs-up"></i> Mengerti!',
            confirmButtonAriaLabel: 'Thumbs up, Mengerti!',
            confirmButtonColor: `#28a745`,
        })
    })
</script>
<script>
    var ses2 = "<?php echo $_SESSION['akses'] ?>";
    if (ses2 != '2' && ses2 != '3') {
        CKEDITOR.replace('konten', {
            toolbar: [{
                    name: 'document',
                    groups: ['mode', 'document', 'doctools'],
                    items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates']
                },
                {
                    name: 'clipboard',
                    groups: ['clipboard', 'undo'],
                    items: ['Cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo']
                },
                {
                    name: 'editing',
                    groups: ['find', 'selection', 'spellchecker'],
                    items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt']
                },
                {
                    name: 'basicstyles',
                    groups: ['basicstyles', 'cleanup'],
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-',
                        'RemoveFormat'
                    ]
                },
                {
                    name: 'paragraph',
                    groups: ['list', 'indent', 'blocks', 'align', 'bidi'],
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote',
                        'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight',
                        'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language'
                    ]
                },
                '/',
                {
                    name: 'styles',
                    items: ['Styles', 'Format', 'Font', 'FontSize']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                },
                {
                    name: 'tools',
                    items: ['Maximize', 'ShowBlocks']
                },
                {
                    name: 'others',
                    items: ['-']
                },
                {
                    name: 'about',
                    items: ['About']
                }
            ],
            uiColor: '#28a745',
            disallowedContent: 'a'
        });
    }
</script>