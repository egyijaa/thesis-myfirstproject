<div class="card-body">
                                <table id="dataAlumni" class="table table-bordered table-striped table-responsive-md">
                                    <thead>
                                        <tr style="color:#28a745">
                                            <?php if ($this->session->userdata('akses')=='2' || $this->session->userdata('akses') == '3') : ?>
                                            <th>Username</th>
                                            <?php endif; ?>
                                            <th>Nama Lengkap</th>
                                            <th>Angkatan <br> Kelulusan</th>
                                            <th>Domisili</th>
                                            <?php if ($this->session->userdata('akses')=='0' || $this->session->userdata('akses') == '1') : ?>
                                            <th>Active</th>
                                            <th>Status</th>
                                            <?php endif; ?>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($posts)) : foreach ($posts as $row) : ?>
                                        <tr>
                                            <?php if ($this->session->userdata('akses')=='2' || $this->session->userdata('akses') == '3') : ?>
                                            <td><?php echo $row['username']; ?></td>
                                            <?php endif; ?>
                                            <td><?php echo $row['nama_lengkap']; ?></td>
                                            <td><?php echo $row['angkatan']; ?></td>
                                            <td><?php if (!empty($row['kota'])) {
                                                        echo '<span class =" badge badge-success ">'.$row['kota'].'<span> ';} else {
                                                            echo '<span class =" badge badge-warning ">Belum Diatur<span> ';
                                                        } ?></td>
                                            <?php if ($this->session->userdata('akses')=='0' || $this->session->userdata('akses') == '1') : ?>
                                            <td>
                                                <?php
                                                                    if ($row['active'] == '0') {
                                                                        echo '<label class="switch zoomPilih">
                                                                            <input  name="cobaye" type="checkbox" id="checkActive' . $row['username'] . '" data-id="' . $row['username'] . '">
                                                                            <span class="slider round"></span>
                                                                            </label>';
                                                                    } else {
                                                                        echo '<label class="switch zoomPilih">
                                                                            <input name="cobaye" type="checkbox" id="checkActive' . $row['username'] . '" data-id="' . $row['username'] . '" checked>
                                                                            <span class="slider round"></span>
                                                                        </label>';
                                                                    }
                                                                    ?>
                                            </td>
                                            <td>
                                                <?php
                                                                    if ($row['roles'] == 'siswa') {
                                                                        echo '<label class="switch zoomPilih">
                                                                            <input  name="cobaye2" type="checkbox" id="checkActive2' . $row['username'] . '" data-id="' . $row['username'] . '">
                                                                            <span class="slider round"></span>
                                                                            </label>';
                                                                    } else {
                                                                        echo '<label class="switch zoomPilih">
                                                                            <input name="cobaye2" type="checkbox" id="checkActive2' . $row['username'] . '" data-id="' . $row['username'] . '" checked>
                                                                            <span class="slider round"></span>
                                                                        </label>';
                                                                    }
                                                                    ?>
                                            </td>
                                            <?php endif; ?>

                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" title="Detail" data-toggle="modal"
                                                        data-target="#detailModal" name="detil"
                                                        data-ses="<?php $this->session->userdata('ses_id') ?>"
                                                        data-username="<?php echo $row['username']; ?>"
                                                        data-namalengkap="<?php echo $row['nama_lengkap']; ?>"
                                                        data-foto_profil="<?php if (isset($row['foto_profil'])) {
                                                                                                                                                                                                                                                        echo $row['foto_profil'];
                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                        echo "blank.png";
                                                                                                                                                                                                                                                    } ?>"
                                                        data-email="<?php echo $row['email']; ?>"
                                                        data-password="<?php echo $row['pass']; ?>"
                                                        data-angkatan="<?php echo $row['angkatan']; ?>"
                                                        data-ig="<?php echo $row['instagram']; ?>"
                                                        data-twitter="<?php echo $row['twitter']; ?>"
                                                        data-alamat_sekarang="<?php echo $row['alamat_sekarang']; ?>"
                                                        data-no_telepon="<?php echo $row['no_telepon']; ?>"
                                                        data-status="<?php echo $row['status']; ?>"
                                                        data-keterangan="<?php echo $row['keterangan']; ?>"
                                                        class="btn btn-info zoomPilih" href="#detailModal"
                                                        value="<?php echo $row['username']; ?>"><i
                                                            class="fas fa-info-circle"></i></button>
                                                    <?php if($this->session->userdata('akses')=='0' || $this->session->userdata('akses')=='1'):?>
                                                    <button data-target="#konfirmasiDel" name="detil"
                                                        data-id="<?php echo $row['username']; ?>" data-toggle="modal"
                                                        class="btn btn-danger zoomPilih" href="#detailModal"
                                                        value="<?php echo $row['username']; ?>"><i
                                                            class="fas fa-user-slash"></i></button>
                                                    <?php endif;?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach;
                                                else : ?>
                                        <tr>
                                            <td colspan="6"><?php echo $this->session->flashdata('#error-Alumni');?>
                                            </td>
                                        </tr>
                                        <?php endif; ?>

                                    </tbody>
                                </table>
                            </div>
                                    <script>
  $(document).ready(function () {
        var akses = "<?php echo $this->session->userdata('akses') ?>";
        if (akses != '2' && akses != '3') {
            $("#dataAlumni").DataTable({
                "autoWidth": false,
                select: true,
                "oLanguage": {
                    "sSearch": "<i class='fas fa-search'></i> Cari: ",
                    "oPaginate": {
                        "sPrevious": "<i class='fas fa-chevron-circle-left'></i>",
                        "sNext": "<i class='fas fa-chevron-circle-right'></i>"
                    },
                    "sZeroRecords": '<div class="alert alert-warning" align="center"><h4><i class="fas fa-exclamation-circle"></i> Data Tidak Ditemukan! <i class="fas fa-exclamation-circle"></i></h4></div>',
                    "sInfo": "Showing <strong class='text-success'>_START_</strong> to <strong class='text-success'>_END_</strong> of <strong class='text-primary'>_TOTAL_</strong> entries"
                },
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
            }).buttons().container().appendTo('#dataAlumni_wrapper .col-md-6:eq(0)');
            //   $("input").attr('name', 'search1');

        } else {
            $("#dataAlumni").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                //"iDisplayLength": 10, (Default)
                "oLanguage": {
                    "sSearch": "<i class='fas fa-search'></i> Cari: ",
                    "oPaginate": {
                        "sPrevious": "<i class='fas fa-chevron-circle-left'></i>",
                        "sNext": "<i class='fas fa-chevron-circle-right'></i>"
                    },
                    "sZeroRecords": '<div class="alert alert-warning" align="center"><h4><i class="fas fa-exclamation-circle"></i> Data Tidak Ditemukan! <i class="fas fa-exclamation-circle"></i></h4></div>',
                    "sInfo": "Showing <strong class='text-success'>_START_</strong> to <strong class='text-success'>_END_</strong> of <strong class='text-primary'>_TOTAL_</strong> entries"
                },
            });
        }
    });
</script>
<script>
    $(document).ready(function () {
        $('input[name="cobaye"]').click(function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Aktifkan/non-aktifkan akun?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                allowOutsideClick: false,
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        updActive(id);
                }
                    else {
                        return false;
                }
        })

        })

        function updActive(username) {
            var spinner = $('#loader');
            var checkBox = document.getElementById("checkActive" + username);
            var u = 0;
            var n = username;
            if (checkBox.checked == true) {
                u = 1;
            }
            console.log(checkBox);
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
                    }
                    if (u == 0) {
                        Swal.fire(
                            'Akun non-aktif',
                            'Akun baru saja di-nonAktifkan, akun tidak dapat login dan mengakses sistem',
                            'info'
                        )
                    }
                },
                error: function (data) {
                    spinner.hide();
                    alert("Terjadi kesalahan");
                }
            });
            return false;
        }

        $('input[name="cobaye2"]').click(function (e) {
        var id = $(this).data('id');
        Swal.fire({
                title: 'Aktifkan/non-aktifkan akun?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                allowOutsideClick: false,
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        updActive2(id);
                }
                    else {
                        return false;
                }
        })
    })

    function updActive2(username) {
        var spinner = $('#loader');
        spinner.show();
        var checkBox = document.getElementById("checkActive2" + username);
        var u = 'siswa';
        var n = username;
        if (checkBox.checked == true) {
            u = 'alumni';
        }
        $.ajax({
            url: "<?php echo base_url() ?>Page/updateStatus", //enter the login controller URL here
            type: "POST",
            cache: false,
            data: {
                roles: u,
                username: n
            },
            success: function (data) {
                spinner.hide();
                if (u == 'alumni') {
                    Swal.fire(
                        'Akun Menjadi Alumni',
                        'Akun baru saja diubha menjadi roles alumni, akun dapat mengakses sistem sebagai alumni',
                        'info'
                    )
                }
                if (u == 'siswa') {
                    Swal.fire(
                        'Akun siswa',
                        'Akun menjadi siswa aktif sekolah, akun hanya dapat mengakses sistem sebagai siswa aktif',
                        'info'
                    )
                }
            },
            error: function (data) {
                spinner.hide();
                alert("Terjadi kesalahan");
                console.log(data);
            }
        });
    }
    });
</script>