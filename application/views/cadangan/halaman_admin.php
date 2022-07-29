<head>

    <script>
        function searchFilter(page_num) {
            page_num = page_num ? page_num : 0;
            var keywords = $('#keywords').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>index.php/Admin/ajaxPaginationData/' + page_num,
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

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
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
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <?php if($this->session->userdata('akses')=='0' || $this->session->userdata('akses')=='1'):?>
                        <img src="<?php echo base_url('assets/image/admin2.png') ?>"
                            class="user-image img-circle elevation-2" alt="User Image">
                        <?php else:?>
                        <img id="img2"
                            src="<?php echo base_url('assets/image/foto_profil/'.$this->session->userdata('ses_foto')) ?>"
                            class="user-image img-circle elevation-2" alt="User Image">
                        <?php endif;?>
                        <span class="d-none d-md-inline"><?php echo $this->session->userdata('ses_id').' ' ?><i class="fas fa-caret-down"></i></span>
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
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <?php if ($this->session->userdata('akses') == '0') : ?>
                            <a href="<?php echo base_url(); ?>index.php/Admin/toAdmin"
                                class="btn btn-primary btn-flat">Edit Admin</a>
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
                                <p class="text"><?php date_default_timezone_set("Asia/Bangkok"); echo date("d-M-Y", time());?></p>
                            </a>
                        </li>
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
                                    <a class="nav-link" href="<?php if ($this->session->userdata('akses') != 2){
                                                    echo base_url().'index.php/Lowongan/toLowongan2';
                                                }
                                                else {
                                                    echo base_url().'index.php/Lowongan/toLowongan';
                                                }?>"
                                        title="Halaman Lowongan Pekerjaan"><i class="nav-icon fab fa-stack-overflow"
                                            aria-hidden="true"></i>
                                        <p>Lowongan Pekerjaan</p>
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
                        <li class="nav-item">
                            <a href=#" class="nav-link active bg-warning">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                    Daftar Admin
                                    <span class="right badge badge-danger">Atur Admin!</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item noHover" style="margin : 80% 0 0 0;">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-laptop-code text-danger"></i>
                                <p class="text text-warning">Beta Version</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
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
                                                <th>NIP</th>
                                                <th>Nama Admin</th>
                                                <th>Password</th>
                                                <?php if ($this->session->userdata('akses') == '0') : ?>
                                                    <th>Active</th>
                                                    <th>Musnahkan</th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($posts)) : foreach ($posts as $row) : ?>
                                                    <tr>
                                                        <td><?php echo $row['NIP']; ?></td>
                                                        <td><?php echo $row['NAMA']; ?></td>
                                                        <td><?php echo $row['PASS']; ?></td>
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
                                        <form id = "form_lowongan" class = "form" action="<?php echo base_url() ?>index.php/Admin/adminBaru" enctype="multipart/form-data" method="POST" >
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
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
    <!-- /.control-sidebar -->
    
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
                    <form action="<?php echo base_url(); ?>index.php/Admin/delAdmin" method="POST">
                        <button id="delAdmin" name="delAdmin" class="btn btn-danger" value="">Ya</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="loading">
            <img id="loading-image" src="<?php echo base_url() . 'assets/image/tenor.gif?t='.time() ?>" alt="Loading..." />
        </div>
        <footer class="main-footer float-right text-sm">
            <strong>Copyright &copy; 2021 <a href="https://sman3ptk.sch.id/" target="_blank" style="color: #28a745"> SMA
                    Negeri 3 Pontianak </a>&<a href="https://www.instagram.com/egyijaa_/" target="_blank"
                    style="color: #28a745"> Egy Ijaa</a> | Theme by : <a href="https://adminlte.io/" target="_blank"
                    style="color: #28a745">AdminLTE</a></strong>. All rights
            reserved.
        </footer>    
</body>




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
            url: "<?php echo base_url() ?>index.php/Admin/updateActive", //enter the login controller URL here
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
    $(window).on('load', function(){
        $('#loading').fadeOut("slow");
    });
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
                                url: "<?php echo base_url() ?>index.php/Admin/adminBaru",
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