<head>
    <style>
        @media only screen and (min-width: 768px) and (max-width: 995px) {
            .hmT {
                font-size:13px;
            }
            .dikit {
                width: 50%;
            }
        }

        /* penggunaan media query pada mobile layout */
        @media only screen and (min-width: 480px) and (max-width: 767px) {
            .dikit {
                width: 100%;
            }
            .hmT {
                font-size:11.5px;
            }
        }

        @media only screen and (min-width: 180px) and (max-width: 479px) {
            .hmT {
                font-size:11px;
            }
        }

        /* penggunaan media query pada default monitor layout */
        @media only screen and (min-width: 996px) {
            .hmT {
                font-size:16px;
            }
            .dikit {
                width: 50%;
            }
        }
    </style>
</head>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Akun baru Alumni</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active" style="color:#32CD32">Dashboard</li>
                        <li class="breadcrumb-item" style="color:#28a745">Tambah Alumni</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo form_open('Admin/save', array('class' => 'col-lg-12 hmT', 'name' => 'formAlumni', 'id' => 'formAlumni', 'role' => 'form'));?>
                                        <!-- Buat tombol untuk menabah form data -->
                                        <button type="button" id="btn-tambah-form" class="btn bg-gradient-primary">Tambah Data Form</button>
                                        <button type="button" id="btn-reset-form" class="btn bg-gradient-danger">Hapus Semua Data Form</button><br><br>
                                        <div class="print-error-msg border border-primary pt-2 pb-2 pr-1" style="display:none">
                                            <div class="1"></div>
                                            <div class="2"></div>
                                            <div class="3"></div>
                                            <div class="4"></div>
                                            <div class="5"></div>
                                        </div>
                                        <div class="row">
                                            <div class="dikit" id='div_1'>
                                                <b>Data ke 1 :</b>
                                                <table class='table table-bordered table-responsive-md'>
                                                <tbody>
                                                    <tr>
                                                        <td>Username</td>
                                                        <td class='form-inline'><select id="kelas" name="kelas"
                                                            class="bg-white border-dark col-3">
                                                            <?php

                                                                echo "<option disabled selected>Kelas</option>";
                                                                foreach ($kelas as $row) { ?>

                                                            <option value='<?php echo $row['kelas']; ?>'>
                                                                <?php echo $row['kelas']; ?>
                                                            </option>;
                                                            <?php }
                                                                ?>
                                                            </select><input type="text" id="pertama" name="username[]" class='bg-grey border-dark noSpace col-9 border-left-0 kke' placeholder='Username' readonly required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama</td>
                                                        <td><input type="text" name="nama[]" class='bg-white border-dark noSpace col-12' placeholder='Nama Lengkap' required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Roles</td>
                                                        <td><select id="roles" name="roles"
                                                            class="bg-white border-dark col-6">
                                                            <option disabled selected>Pilih Roles</option>
                                                            <option value='alumni' name="alumni">
                                                                Alumni
                                                            </option>;
                                                            <option value='siswa' name="siswa">
                                                                Siswa
                                                            </option>;
                                                            </select></td>
                                                    </tr>
                                                    <tr hidden id='hilang'>
                                                        <td>Kelulusan</td>
                                                        <td><select id="angkatan" name="angkatan"
                                                            class="bg-white border-dark col-6">
                                                            <?php

                                                                echo "<option disabled selected>Pilih Tahun Kelulusan</option>";
                                                                foreach ($angkatan as $row) { ?>

                                                            <option value='<?php echo $row['ID_ANGKATAN']; ?>' name="<?php echo $row['angkatan']; ?>">
                                                                <?php echo $row['angkatan']; ?>
                                                            </option>;
                                                            <?php }
                                                                ?>
                                                            </select></td>
                                                    </tr>
                                                                </tbody>
                                                </table>
                                            </div>
                                            <div id="insert-form" class="col-12 row">

                                            </div>
                                        </div>
                                        <hr>
                                        <input type="submit" class="btn bg-gradient-success" value="Simpan" id="simpan" name="simpan">
                                    </form>
                                    <!-- Kita buat textbox untuk menampung jumlah data form -->
                                    <input type="hidden" id="jumlah-form" value="1">
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>
<!-- /.content -->
<div class="loading" style="display: none;">
    <div class="content"><img src="<?php echo base_url() . 'assets/image/loading.gif?t='.time() ?>" /></div>
</div>

<footer class="main-footer float-right text-sm">
    <strong>Copyright &copy; 2021 <a href="https://sman3ptk.sch.id/" target="_blank" style="color: #28a745"> SMA
            Negeri 3 Pontianak </a>&<a href="https://www.instagram.com/egyijaa_/" target="_blank"
            style="color: #28a745"> Egy Ijaa</a> | Theme by : <a href="https://adminlte.io/" target="_blank"
            style="color: #28a745">AdminLTE</a></strong>. All rights
    reserved.
</footer>

<script>
    $(document).ready(function () { // Ketika halaman sudah diload dan siap
        $("#angkatan").change(function(){
            $(".lulus").html('Kelulusan: '+$('#angkatan :selected').text());
        });
        var prev_val;

    $('#roles').focus(function() {
        prev_val = $(this).val();
        }).change(function() {
            if ($("#jumlah-form").val() > 1){
                $(this).blur() // Firefox fix as suggested by AgDude
                Swal.fire({
                    title: 'Ingin mengubah Roles akun?',
                    html: "Apabila roles anda ganti maka <span class='badge badge-danger'>data yang telah anda isikan akan hilang</span>, dan harus mengisi ulang dari awal!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    allowOutsideClick: false,
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
                        $("#jumlah-form").val(1); // Ubah kembali value jumlah form menjadi 1
                        if ($('#roles :selected').val() == 'alumni'){
                            $("#hilang").attr('hidden', true);
                        }
                        else {
                            $("#hilang").attr('hidden', true);
                        }
                    }
                    else {
                        $(this).val(prev_val);
                        return false;
                    }
                })
            }
            else {
                $(".rolesnya").html('Roles: '+$('#roles :selected').text());
                if ($('#roles :selected').val() == 'alumni'){
                    $("#hilang").attr('hidden', false);
                }
                else {
                    $("#hilang").attr('hidden', true);
                }
            }
    });
        $("#pertama").on('click', function(event){
            if ($(this).prop('readonly')){
                Swal.fire(
                    'Input Disabled',
                    'Harap pilih kelas terlebih dahulu sebelum mengisi username',
                    'warning'
                )
            }
        });
        $("#kelas").change(function(){
            $("#pertama").attr('readonly', false);
            $(".kke").val($("#kelas").val()+'_');
            $(".kke1").val($("#kelas").val()+'_');
            var readOnlyLength = $('input[name="username[]"]').val().length;
            $('#output').text(readOnlyLength);
            $('input[name="username[]"]').on('keypress, keydown', function(event) {
                var $field = $(this);
                $('#output').text(event.which + '-' + this.selectionStart);
                if ((event.which != 37 && (event.which != 39))
                    && ((this.selectionStart < readOnlyLength)
                    || ((this.selectionStart == readOnlyLength) && (event.which == 8)))) {
                    return false;
                }
            });
        });
        $("#btn-tambah-form").click(function () { // Ketika tombol Tambah Data Form di klik
            var total_element = $(".dikit").length;
 
            // last <div> with element class id
            var lastid = $(".dikit:last").attr("id");
            var split_id = lastid.split("_");
            var nextindex = Number(split_id[1]) + 1;

            var kelas = $("#kelas").val()+'_';
            if (!$('#angkatan :selected').text()){
                var kelulusan = $('#angkatan :selected').text();
            }
            else {
                var kelulusan = ' Belum Lulus/Siswa Aktif';
            }
            var roles = $('#roles :selected').text();
            if (!$("#hilang").is(":hidden")){
                if (!$('select[name="kelas"]').val() || !$('select[name="angkatan"]').val() || !$('select[name="roles"]').val()) {
                    Swal.fire(
                        'Empty Field',
                        'Harap pilih kelas, roles, dan angkatan telebih dahulu sebelum menambah form',
                        'warning'

                    )
                    return false;
                }
            }
            else {
                if (!$('select[name="kelas"]').val() || !$('select[name="roles"]').val()) {
                    Swal.fire(
                        'Empty Field',
                        'Harap pilih kelas dan roles telebih dahulu sebelum menambah form',
                        'warning'

                    )
                    return false;
                }
            }
            var jumlah = parseInt($("#jumlah-form")
                .val()); // Ambil jumlah data form pada textbox jumlah-form
            var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

            // Kita akan menambahkan form dengan menggunakan append
            // pada sebuah tag div yg kita beri id insert-form
            $("#insert-form").append("<div class='dikit' id='div_"+ nextindex +"'><b>Data ke " + nextform + " :</b>" +
                "<table class='table table-bordered table-striped table-responsive-md'>" +
                "<tr>" +
                "<td>Username</td>" +
                "<td class='form-inline'><input type='text' name='username[]' class='form-control bg-white border-md noSpace col-12 kke1' required></td>" +
                "</tr>" +
                "<tr>" +
                "<td>Nama</td>" +
                "<td><input type='text' name='nama[]' class='form-control bg-white border-md noSpace' required></td>" +
                "</tr>" +
                "<tr>" +
                "<td colspan='2' class='rolesnya'>Roles :"+roles+"</td>" +
                "</tr>" + 
                "<tr>" +
                "<td class='lulus'>Roles :"+roles+"</td>" + "<td class='lulus'>Kelulusan :"+kelulusan+"</td>" +
                "</tr>" +
                "<tr>" +
                "<td colspan='2' class='lulus'><span id='remove_" + nextindex + "' class='remove btn bg-gradient-warning'>Hapus Form</span></td>" +
                "</tr>" +
                "</table></div>");

            $(".kke1").val($("#kelas").val()+'_');
            var readOnlyLength2 = $('.kke1').val().length;
            $('#output2').text(readOnlyLength2);
            $('.kke1').on('keypress, keydown', function(event) {
                var $field = $(this);
                $('#output2').text(event.which + '-' + this.selectionStart);
                if ((event.which != 37 && (event.which != 39))
                    && ((this.selectionStart < readOnlyLength2)
                    || ((this.selectionStart == readOnlyLength2) && (event.which == 8)))) {
                    return false;
                }
            });
            $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
        });

        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form").click(function () {
            Swal.fire({
                    title: 'Ingin menghabus semua form?',
                    html: "Apabila form anda hapus maka <span class='badge badge-danger'>data yang telah anda isikan akan hilang</span>, dan harus mengisi ulang dari awal!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    allowOutsideClick: false,
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
                        $("#jumlah-form").val(1); // Ubah kembali value jumlah form menjadi 1
                        $('#formAlumni')[0].reset();
                        Swal.fire(
                            'Dihapus!',
                            'Form telah dihapus!',
                            'success'
                        )
                    }
                    else {
                        return false;
                    }
                })
        });
        $('.container').on('click','.remove',function(){
            var id = this.id;
            var split_id = id.split("_");
            var deleteindex = split_id[1];

            // Remove <div> with id
            $("#div_" + deleteindex).remove();
            $("#jumlah-form").val($(".dikit").length);

        }); 
    });
</script>

<script>
    $(document).on('click', '#simpan', function (event) {
        event.preventDefault();
        var jumlah = parseInt($("#jumlah-form")
                .val()); // Ambil jumlah data form pada textbox jumlah-form
        var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
        var emptyInputs = $(this).parent().find('input[name="username[]"]').filter(function() { return $(this).val() == ""; });
        var emptyInputs2 = $(this).parent().find('input[name="nama[]"]').filter(function() { return $(this).val() == ""; });
        if (!$('select[name="kelas"]').val()) {
            Swal.fire(
                'Kelas Kosong!',
                'Harap dipilih terlebih dahulu kelas dari akun yang akan dibuat!',
                'warning'
            )
            return false;
        }
        if (emptyInputs.length) {
            Swal.fire(
                    'Username Kosong!',
                    'Harap masukkan Username akun!',
                    'warning'
                )
                return false;
        }
        if (emptyInputs2.length) {
            Swal.fire(
                'Nama Kosong!',
                'Harap masukkan Nama Lengkap akun!',
                'warning'
            )
            return false;
        }
        if (!$('select[name="roles"]').val()) {
                Swal.fire(
                    'Roles Kosong',
                    'Roles akun belum dipilih! harap pilih terlebih dahulu',
                    'warning'
                )
                return false;
        }
        if (!$("#hilang").is(":hidden")){
            if (!$('select[name="angkatan"]').val()) {
                Swal.fire(
                    'Kelulusan Kosong',
                    'Angkatan Kelulusan belum dipilih! harap pilih terlebih dahulu',
                    'warning'
                )
                return false;
            }
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
                    var values = $('input[name="username[]"]').map(function(){return $(this).val();}).get();
                    function checkIfArrayIsUnique(myArray) {
                        return myArray.length === new Set(myArray).size;
                    
                    }
                    if (values.some(checkUser) == true){
                        Swal.fire(
                                    'Username Kosong',
                                    'Terdapat username yang belum dilengkapi (masih nama kelas), periksa kembali!',
                                    'warning'
                                )
                        return false;
                    }
                    function checkUser(age) {
                        return age == $("#kelas").val()+'_';
                    }
                    if (checkIfArrayIsUnique(values)==false){
                        Swal.fire(
                                    'Username Sama',
                                    'Terdapat username yang sama satu dengan yang lain dalam masukkan/inputan anda, periksa kembali!',
                                    'warning'
                                )
                    console.log(values)
                        return false;
                    }
                    // spinner.show();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('Admin/save');?>",
                        data: $("#formAlumni").serialize(),
                        dataType: "json",
                        success: function (data) {
                            // spinner.hide();
                            if ($.isEmptyObject(data.error) || data.message == "success") {
                                Swal.fire(
                                    'DATA TERSIMPAN!',
                                    'Akun berhasil ditambahkan ke dalam sistem, dan akun dapat langsung login. <b>PASSWORD sama dengan Username</b>',
                                    'success'
                                )
                                    $("#formAlumni")[0].reset();
                                    $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
                                    $("#jumlah-form").val("1");
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