<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">

<table id="retourRapid">
    <thead>
        <tr>
            <th>#</th>
            <th>Materiel</th>
            <th>Utilisateur</th>
            <th>debut</th>
            <th>par</th>
            <th>fin</th>
            <th>Rendre</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>


<script type="module" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js">
</script>
<script type="module" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js">
</script>
<script type="module" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
</script>
<script type="module" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js">
</script>
<script type="module" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js">
</script>
<script type="module" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js">
</script>
<script type="module" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js">
</script>
<script type="module" language="javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.colVis.min.js">
</script>
</script>




<script defer type="module">
//check if DataTable exist on the table .TableReservations
/* $region //_here is the filling of the materiel of the day */
if ($.fn.DataTable.isDataTable('#retourRapid')) {
    $('#retourRapid').DataTable().destroy();
}
$('#retourRapid').DataTable({
    "processing": true,
    "serverSide": true,
    "serverMethod": "post",
    "ajax": "<?=$_SESSION['__DIR__'].'MaterielC/getMats' ?>",

    "columns": [{
            "data": "id_mat"
        },
        {
            "data": "mat"
        },
        {
            "data": "user"
        },
        {
            "data": "debut"
        },
        {
            "data": "par"
        },
        {
            "data": "fin"
        },
        {
            "data": "retour"
        }
    ],


    "columnDefs": [{
        "targets": 6,
        "data": "retour",
        "render": function(data, type, row, meta) {
        
            return '<a class="btn btn-success" href="<?= $_SESSION['__DIR__'].'EmpruntC/removeEmpruntMateriel/'?>' +
                row.id_mat + '" id="btn-retour-rapide" data-id="' + row.id_mat + '">' +
                '<i class="zmdi zmdi-long-arrow-left"></i>' + '</a>';
        }
    }],


    dom: 'Bfrtip',
    buttons: [{
            extend: 'copyHtml5',
            text: 'Copier',
            exportOptions: {
                columns: [0, ':visible']
            }
        },
        {
            extend: 'excelHtml5',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'pdfHtml5',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'csvHtml5',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'print',
            text: 'Imprimer',
            exportOptions: {
                columns: ':visible'
            }
        },

    ],
});
/* $endregion */
</script>