<head>
<link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/dist/css/bgye.min.css?t=<?php echo time();?>">
    <script>
        function searchFilter(page_num) {
            page_num = page_num ? page_num : 0;
            var keywords = $('#keywords').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>Admin/ajaxPaginationData/' + page_num,
                data: 'page=' + page_num + '&keywords=' + keywords,
                beforeSend: function() {
                    $('.loading').show();
                },
                success: function(html) {
                    $('#postList').html(html);
                    $('.loading').fadeOut("slow");
                }
            });
        }
    </script>
</head>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <?php if ($this->session->userdata('akses') == '1') : ?>
                                <h1 class="m-0 text-dark">Daftar Lengkap Admin</h1>
                            <?php else : ?>
                                <h1 class="m-0 text-dark">Hai
                                    <?php echo $this->session->userdata('ses_nama') ?>! Ayo Kelola Admin!</h1>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active" style="color:#32CD32">Dashboard</li>
                                <li class="breadcrumb-item" style="color:#28a745">Data Admin</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label style="color:#28a745">Cari Admin</label>
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <input id="keywords" name="cari" type="text" class="form-control" placeholder="Nomor Induk Siswa / Nama" onkeyup="searchFilter()"">
                                                <div class=" input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fa fa-search"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-list" id="postList">
                                    <table id="dataAdmin" class="table table-bordered table-striped table-responsive-md">
                                        <thead>
                                            <tr style="color:#28a745">
                                                <th>Username</th>
                                                <th>Nama Admin</th>
                                                <th>Password</th>
                                                <?php if ($this->session->userdata('akses') == '0') : ?>
                                                    <th>Active</th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($posts)) : foreach ($posts as $row) : ?>
                                                    <tr>
                                                        <td><?php echo $row['NIP']; ?></td>
                                                        <td><?php echo $row['NAMA']; ?></td>
                                                        <?php if ($this->session->userdata('akses') == '0') : ?>
                                                            <td>
                                                                <?php
                                                                    if ($row['active'] == '0') {
                                                                        echo '<label class="switch">
                                                                            <input type="checkbox" id="checkActive' . $row['NIP'] . '" onclick="updActive(' . $row['NIP'] . ')">
                                                                            <span class="slider round"></span>
                                                                            </label>';
                                                                    } else {
                                                                        echo '<label class="switch">
                                                                            <input type="checkbox" id="checkActive' . $row['NIP'] . '" onclick="updActive(' . $row['NIP'] . ')" checked>
                                                                            <span class="slider round"></span>
                                                                        </label>';
                                                                    }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <button data-target="#konfirmasiDel" name="detil"
                                                                        data-id="<?php echo $row['NIP']; ?>"
                                                                        data-toggle="modal" class="btn btn-danger col-md-12"
                                                                        href="#detailModal"
                                                                        value="<?php echo $row['NIP']; ?>">Hapus</button>
                                                                </td>
                                                        <?php endif; ?>
                                                    </tr>
                                                <?php endforeach;
                                            else : ?>
                                            <?php endif; ?>
                                            
                                        </tbody>
                                    </table>
                                        <div>
                                        <?php echo $this->ajax_pagination->create_links(0,1,2); ?>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
            <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <button id="tampilkanTambah" class="btn btn-success col-md-6"
                                            onclick="showTambah()">Tambah Admin</button>
                                <div id ="dataTambah" class="col-lg-6" style="display:none;">
                                    <div class="card ">
                                        <form id = "form_lowongan" class = "form" action="<?php echo base_url() ?>Admin/adminBaru" enctype="multipart/form-data" method="POST" >
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>NIP</label>
                                                    <input name="NIP" type="text" class="form-control" placeholder="NIP"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Admin</label>
                                                    <input name="NAMA" type="text" class="form-control" placeholder="Nama Admin"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Password Baru</label>
                                                    <input name="PASS" type="password" class="form-control" placeholder="Password"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Konfirmasi Password</label>
                                                    <input name="PASS2" type="password" class="form-control" placeholder="Password"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button id = "save" type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-6 -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
        </div>
        <!-- /.content -->
        <div class="loading" style="display: none;"><div class="content"><img src="<?php echo base_url() . 'assets/image/loading.gif?t='.time() ?>"/></div></div>
    
    <div id="konfirmasiDel" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#FFA500">
                    <h4 class="modal-title">Konfirmasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus akun Admin ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                    <form action="<?php echo base_url(); ?>Admin/delAdmin" method="POST">
                        <button id="delAdmin" name="delAdmin" class="btn btn-danger" value="">Ya</a>
                    </form>
                </div>
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




<script>

    function updActive(nip) {
        var checkBox = document.getElementById("checkActive" + nip);
        var u = 0;
        var n = nip;
        if (checkBox.checked == true) {
            u = 1;
        }
        console.log(checkBox);
        $.ajax({
            url: "<?php echo base_url() ?>Admin/updateActive", //enter the login controller URL here
            type: "POST",
            dataType: "json",
            data: {
                active: u,
                nip: n
            },
            success: function(data) {
                console.log(data);
                if (u == 1){
                    Swal.fire(
                            'Akun Aktif',
                            'Akun baru saja diaktifkan, akun dapat login dan mengakses sistem sebagai admin',
                            'info'
                        )
                }
                if (u == 0){
                    Swal.fire(
                            'Akun non-aktif',
                            'Akun baru saja di-nonAktifkan, akun tidak dapat login dan mengakses sistem',
                            'info'
                        )
                }
            },
            error: function(data) {
                alert("Terjadi kesalahan");
                console.log(data);
            }
        });
        // stop the form from submitting the normal way and refreshing the page
        return false;
    }
</script>

<script>
        $(document).ready(function() {
            $('#konfirmasiDel').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var modal = $(this);
                modal.find('.modal-footer #delAdmin').attr('value', button.data('id'));
                Swal.fire({
                    title: '<strong>PENTING, MOHON DIBACA!</strong>',
                    icon: 'info',
                    html:
                        'Jika akun admin dihapus maka segala hal yang berkaitan dengan akun tersebut juga terhapus<br><br>' +
                        'Seperi<b> BROADCAST dan LOWONGAN PEKERJAAN</b>, yang pernah diunggah/upload oleh akun tersebut!<br><br>' +
                        'Harap Pastikan<b> BROADCAST dan LOWONGAN PEKERJAAN</b> dari akun yang akan dihapus sudah tidak dibutuhkan!',
                    focusConfirm: false,
                    confirmButtonText:
                        '<i class="fa fa-thumbs-up"></i> Mengerti!',
                    confirmButtonAriaLabel: 'Thumbs up, Mengerti!',
                })
            })
        });
</script>

<script>
    function showTambah() {
            var table, rows, switching, i, x, y, shouldSwitch;
            var x = document.getElementById("dataTambah");
            if (x.style.display === "none") {
                $("#tampilkanTambah").html("Sembunyikan");
                x.style.display = "";
            } else {
                $("#tampilkanTambah").html("Tambah Admin");
                x.style.display = "none";
            }
    }
    $(document).on('click', '#save', function(event){
            event.preventDefault();
            if (!$('input[name="NIP"]').val()) {
                    Swal.fire(
                        'NIP Kosong!',
                        'Harap masukkan NIP akun!',
                        'warning'
                    )
                    return false;
            }
            if (!$('input[name="NAMA"]').val()) {
                    Swal.fire(
                        'NAMA Kosong!',
                        'Harap masukkan NAMA akun!',
                        'warning'
                    )
                    return false;
            }
            if (!$('input[name="PASS"]').val()) {
                    Swal.fire(
                        'PASSWORD Kosong!',
                        'Harap masukkan PASSWORD akun!',
                        'warning'
                    )
                    return false;
            }
            if (!$('input[name="PASS2"]').val()) {
                    Swal.fire(
                        'Verify Password!',
                        'Konfirmasi Password dibutuhkan untuk Menyimpan Data',
                        'warning'
                    )
                    return false;
                }
                if ($('input[name="PASS"]').val() != $('input[name="PASS2"]').val()) {
                    Swal.fire(
                        'Not Match',
                        'Password dan konfirmasi password tidak sama',
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
                        $.ajax({
                                type: "POST",
                                url: "<?php echo base_url() ?>Admin/adminBaru",
                                data: $("#form_lowongan").serialize(),
                                dataType: 'json',
                                success: function (response) {
                                    console.log(response.message);
                                    if (response.message == "success") {
                                        Swal.fire(
                                            'DATA TERSIMPAN!',
                                            'Akun bisa login jika sudah aktif.',
                                            'success'
                                        )
                                        $("#form_lowongan")[0].reset();
                                        location.reload();
                                    } else {
                                            Swal.fire(
                                                'DATA GAGAL DISIMPAN!',
                                                response.error,
                                                'error'
                                            )
                                        ;
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