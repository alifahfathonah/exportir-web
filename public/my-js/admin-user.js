"use strict";

let editor, table, save_method; // use a global for the submit and return data rendering in the examples

jQuery(document).ready(function() {
    table = $('#table').DataTable({
        ajax: {
            url: base_url + "/admin/user_",
            type: "POST",
        },
        lengthMenu: [10, 20, 30, 40, 50, 60, 80, 100],
        responsive: true,
        serverSide: true,
        processing: true,
        pageLength: 30,
        order: [],
        columns: [{
                "data": 'no',
                "sortable": false,
            },
            { "data": "photo" },
            { "data": "nama" },
            { "data": "email" },
            { "data": "role" },
            { "data": "status" },
            { "data": "aksi" },
        ],
        columnDefs: [{
            targets: [0, 1, 4, 5, 6],
            className: "text-center"
        }, {
            targets: [0, 6],
            orderable: false,
            searchable: false,
        }],
    });

    $(document).on('change', '#propinsi', function() {
        $.ajax({
            url: base_url + "/get_kota/" + $(this).val(),
            type: "GET",
            success: function(isi) {
                $('#kota').html(isi);
            }
        });
    });

    $(document).on('click', '.add', function() {
        save_method = 'add';
        document.getElementById("row-display").style.display = "none";
        $('#form-user')[0].reset();
        $('#modal-default').modal('show');
        $('.modal-title').text('Tambah User');
    });

    $(document).on('click', '.edit', function() {
        save_method = 'update';
        $('#form-user')[0].reset();
        document.getElementById("row-display").style.display = "block";
        document.getElementById("output_image").src = $(this).data('photo');
        $('#modal-default').modal('show');
        $('.update').text('Update');
        $('.modal-title').text('Edit User');
        $('[name="id"]').val($(this).data('id'));
        $('[name="no_hp"]').val($(this).data('no_hp'));
        $('[name="nama"]').val($(this).data('nama'));
        $('[name="email"]').val($(this).data('email'));
        $('[name="role"]').val($(this).data('role'));
        $('[name="photo_"]').val($(this).data('photo'));
        $('[name="status"]').val($(this).data('status'));
        $('[name="propinsi"]').val($(this).data('propinsi'));
        $('[name="kota"]').val($(this).data('kota'));
        $('[name="alamat"]').val($(this).data('alamat'));
    });

    $(document).on('click', '.delete', function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        Swal.fire({
            title: 'Anda Yakin?',
            html: "User " + nama + "<br><br><b>Akan Dihapus!</b>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: base_url + "/admin/delete_user",
                    type: "POST",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $('#table').DataTable().ajax.reload();
                        Swal.fire({
                            title: data.title,
                            html: nama + '<br><br><b>' + data.status + "</b>",
                            icon: data.icon,
                            timer: 3000,
                            showCancelButton: false,
                            showConfirmButton: false,
                            buttons: false,
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error');
                    }
                });
            }
        })
    });


    $("#form-user").validate({
        errorClass: "is-invalid",
        // validClass: "is-valid",
        rules: {
            nama: {
                required: true
            },
            no_hp: {
                required: true
            },
            email: {
                required: true
            },
            password: {
                required: {
                    depends: function(element) {
                        return save_method != 'update';
                    },
                }
            },
            repassword: {
                required: {
                    depends: function(element) {
                        return save_method != 'update';
                    },
                },
                equalTo: "#password",
            },
            role: {
                required: true
            },
            status: {
                required: true
            },
        },
        submitHandler: function(form) {
            let url;
            if (save_method == 'update') {
                url = base_url + '/admin/update_user';
            } else {
                url = base_url + '/admin/create_user';
            }
            $.ajax({
                url: url,
                type: "POST",
                data: new FormData(document.getElementById("form-user")),
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data.result != true) {
                        Swal.fire({
                            title: 'Gagal',
                            html: "Gagal Tambah User",
                            icon: 'error',
                            timer: 3000,
                            showCancelButton: false,
                            showConfirmButton: false,
                            buttons: false,
                        });
                        table.ajax.reload();
                    } else {
                        Swal.fire({
                            title: 'Berhasil',
                            html: "User Berhasil Disimpan!",
                            icon: 'success',
                            timer: 3000,
                            showCancelButton: false,
                            showConfirmButton: false
                        });

                        $('#modal-default').modal('hide');
                        $('body').removeClass('modal-open');
                        table.ajax.reload();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                }
            });
        }
    });
});

function preview_image(event) {
    document.getElementById("row-display").style.display = "block";
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('output_image');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}