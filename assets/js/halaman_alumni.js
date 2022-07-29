
    function hiddenFunction(nis) {
        var x = document.getElementById("img" + nis);

        if (x.style.display === "none") {
            $("#tampilkanKts" + nis).html("Sembunyikan");
            x.style.display = "block";
            y.style.display = "block";
        } else {
            $("#tampilkanKts" + nis).html("Tampilkan");
            x.style.display = "none";
            y.style.display = "none";
        }
    }

    function test(element) {
        var newTab = window.open();
        setTimeout(function() {
            newTab.document.body.innerHTML = element.innerHTML;
        }, 500);
        return false;
    }

    function updActive(nis) {
        var checkBox = document.getElementById("checkActive" + nis);
        var u = 0;
        var n = nis;
        if (checkBox.checked == true) {
            u = 1;
        }
        console.log(checkBox);
        $.ajax({
            url: "<?php echo base_url() ?>index.php/Login/updateActive", //enter the login controller URL here
            type: "POST",
            dataType: "json",
            data: {
                active: u,
                nis: n
            },
            success: function(data) {
                if (u == 1){
                    Swal.fire(
                            'Akun Aktif',
                            'Akun baru saja diaktifkan, akun dapat login dan mengakses sistem',
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
            }
        });
        // stop the form from submitting the normal way and refreshing the page
        return false;
    };

    $(document).ready(function() {
        $('#detailModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body #profilDetail').attr('src', "<?php echo base_url(); ?>/assets/image/foto_profil/" + button.data('foto_profil'));
            modal.find('.modal-body #namalengkap').html(button.data('namalengkap'));
            modal.find('.modal-body #status').html(button.data('status') + " : " + button.data(
                'keterangan'));
            modal.find('.modal-body #email').html(button.data('email'));
            modal.find('.modal-body #agama').html(button.data('agama'));
            modal.find('.modal-body #notelepon').html(button.data('no_telepon'));
            modal.find('.modal-body #alamatasal').html(button.data('alamat_asal'));
            modal.find('.modal-body #domisili').html(button.data('kota'));
            modal.find('.modal-body #alamatsekarang').html(button.data('alamat_sekarang'));
            modal.find('.modal-body #pass').html(button.data('pass'));
            modal.find('.modal-body #deleteAlumninis').attr('value', button.data('nis'));
        })

        $('#deleteAlumninis').click(function() {
            $('#konfirmasiDel').modal({
                show: true
            })
        });

        $('#konfirmasiDel').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var modal = $(this);
            modal.find('.modal-footer #delAlumni').attr('value', document.getElementById(
                "deleteAlumninis").value);
        })
    });

    function filterFunction() {
        var table, rows, switching, i, x, y, shouldSwitch;

        var x = document.getElementById("filterAngkatan");
        var y = document.getElementById("filterKota");

        table = document.getElementById("dataAlumni");
        switching = true;
        if (document.getElementById('urutkanBerdasarkan').value == "Angkatan") {
            if (x.style.display === "none") {
                x.style.display = "block";
                y.style.display = "none";
            } else {
                x.style.display = "none";
            }
        } else if (document.getElementById('urutkanBerdasarkan').value == "Domisili") {
            if (y.style.display === "none") {
                y.style.display = "block";
                x.style.display = "none";
            } else {
                y.style.display = "none";
            }
        }
    }
    function myFunction() {
        var x = document.getElementById("filterAngkatan_item").options[0].text;
        var a = document.getElementById("keywords");
        var b = document.getElementById("keywords2");
        var c = document.getElementById("keywords3");
        if (document.getElementById('filterAngkatan_item').value == x) {
            if (b.style.display === "none") {
                a.style.display = "none";
                b.style.display = "block";
                c.style.display = "none";
            } else {
                b.style.display = "none";
            }
        }
    }
    function myFunction2() {
        var y = document.getElementById("filterKota_item").options[0].text;
        var a = document.getElementById("keywords");
        var b = document.getElementById("keywords2");
        var c = document.getElementById("keywords3");
        if (document.getElementById('filterKota_item').value == y) {
            if (c.style.display === "none") {
                a.style.display = "none";
                b.style.display = "none";
                c.style.display = "block";
            } else {
                c.style.display = "none";
            }
        }
    }   
    // function filterAngkatan() {
    //     var input, filter, table, tr, td, i, txtValue;
    //     input = document.getElementById("filterAngkatan_item");
    //     filter = input.value.toUpperCase();
    //     table = document.getElementById("dataAlumni");
    //     tr = table.getElementsByTagName("tr");

    //     for (i = 0; i < tr.length; i++) {
    //         td = tr[i].getElementsByTagName("td")[2];
    //         if (td) {
    //             txtValue = td.textContent || td.innerText;
    //             if (txtValue.toUpperCase().indexOf(filter) > -1) {
    //                 tr[i].style.display = "";
    //             } else {
    //                 tr[i].style.display = "none";
    //             }
    //         }
    //     }
    // }
    function filterAngkatan(page_num) {
            page_num = page_num ? page_num : 0;
            var angkatan = $('#filterAngkatan_item').val();
            var keywords2 = $('#keywords2').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>index.php/Login/ajaxPaginationData/' + page_num,
                data: 'page=' + page_num + '&filterAngkatan_item=' + angkatan + '&keywords2=' + keywords2,
                beforeSend: function() {
                    $('.loading').show();
                },
                success: function(html) {
                    $('#postList').html(html);
                    $('.loading').fadeOut("slow");
                }
            });
        }
        function filterKota(page_num) {
            page_num = page_num ? page_num : 0;
            var kota = $('#filterKota_item').val();
            var keywords3 = $('#keywords3').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>index.php/Login/ajaxPaginationData/' + page_num,
                data: 'page=' + page_num + '&filterKota_item=' + kota + '&keywords3=' + keywords3,
                beforeSend: function() {
                    $('.loading').show();
                },
                success: function(html) {
                    $('#postList').html(html);
                    $('.loading').fadeOut("slow");
                }
            });
        }

    // function filterKota() {
    //     var input, filter, table, tr, td, i, txtValue;
    //     input = document.getElementById("filterKota_item");
    //     filter = input.value.toUpperCase();
    //     table = document.getElementById("dataAlumni");
    //     tr = table.getElementsByTagName("tr");

    //     for (i = 0; i < tr.length; i++) {
    //         td = tr[i].getElementsByTagName("td")[3];
    //         if (td) {
    //             txtValue = td.textContent || td.innerText;
    //             if (txtValue.toUpperCase().indexOf(filter) > -1) {
    //                 tr[i].style.display = "";
    //             } else {
    //                 tr[i].style.display = "none";
    //             }
    //         }
    //     }
    // }
    // $('#btn-reset').click(function(){ //button reset event click
    //     $('#form-filter')[0].reset();
    //     table.ajax.reload(null,false);  //just reload table
    // });

    function resetFilter() {
        $("#urutkanBerdasarkan").val(0);
        var input, filter, table, tr, td, i, txtValue;
        input = "";
        filter = input.toUpperCase();
        table = document.getElementById("dataAlumni");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        var x = document.getElementById("filterAngkatan");
        var y = document.getElementById("filterKota");
        var a = document.getElementById("keywords");
        var b = document.getElementById("keywords2");
        var c = document.getElementById("keywords3");

        x.style.display = "none";
        y.style.display = "none";
        a.style.display = "block";
        b.style.display = "none";
        c.style.display = "none";
    }