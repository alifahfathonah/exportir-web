"use strict";

let editor, table, save_method; // use a global for the submit and return data rendering in the examples

jQuery(document).ready(function() {
    //Date range picker
    $('#date_transaction').daterangepicker()

    table = $('#table').DataTable({
        ajax: {
            url: base_url + "/reseller/berita_",
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
            { "data": "judul" },
            { "data": "nama_kategori" },
            { "data": "aksi" },
        ],
        columnDefs: [{
            targets: [0, -1],
            orderable: false,
            searchable: false,
            className: "text-center"
        }],
    });
});