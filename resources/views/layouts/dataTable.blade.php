<link href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css" rel="stylesheet" />
<link
    href="https://cdn.datatables.net/v/ju/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/fc-4.2.2/fh-3.3.2/datatables.min.css"
    rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script
    src="https://cdn.datatables.net/v/ju/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/fc-4.2.2/fh-3.3.2/datatables.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>


<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
        $('#dataTableWithExportButton').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'collection',
                text: 'Export',
                buttons: [{
                        extend: 'excel',
                        exportOptions: {
                            columns: ':not(:last-child)' // Mengekspor semua kecuali kolom terakhir
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':not(:last-child)' // Mengekspor semua kecuali kolom terakhir
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':not(:last-child)' // Mengekspor semua kecuali kolom terakhir
                        }
                    }
                ]
            }]
        });

    });
</script>
