
<div class="row">
<script type="module" src="/GPR_ENSP/public/assets/js/costomScripts/History.js"></script>
<link rel="stylesheet" href="/GPR_ENSP/public/assets/css/costomCss/History.css">
    

<table style="width: 100%;" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">

</table>
<div class="row">
</div>
</div>

<script src="/GPR_ENSP/public/assets/js/jquery-2.2.4.min.js"></script>
<script>


    let data = <?php 
    $data = array();
    //TODO: add the lot conditions
    $historique = Historique::all();
        foreach ($historique as $key => $value) {
            $user = User::where('id', $value->id_user)->first();
            $userName = $user ? $user->first_name . ' '. $user->last_name : ' ';
            $userId = $user ? $user->id : 0;
            $mat = Materiel::where('id_materiel', $value->id_mat)->first();
            $matName = $mat ? $mat->designation : 'Materiel inconnu';
            $despoPre = $mat && $mat->dispo_pret == 0 ? 'Oui' : 'Non';
            $data[] = array(
                'id' => $userId,
                'nom' => $userName ,
                'dateEmp' => $value->date_emprunt,
                'material' => $matName,
                'dateRet' => $value->date_retour,
                'dispo' => $despoPre
            );
        }
        echo json_encode($data);
    ?>;
    $(document).ready(function () {
        console.log('ready');
        $('#dataTables-example').DataTable({
            data: data,
            columns: [
                { title: "ID", data: "id" },
                { title: "Nom", data: "nom" },
                { title: "Matériel", data: "material" },
                { title: "Date d'emprunt", data: "dateEmp" },
                { title: "Date de retour", data: "dateRet" },
                { title: "Disponibilité", data: "dispo" },
            ],
            columnDefs: [
               {
                     targets: 1,
                        render: function ( data, type, row, meta ) {
                            return '<h4 style="font-weight:bold;">'+ '<a href="/GPR_ENSP/public/userFile/'+row.id+'">'+data+'</a>' +'</h4>';
                        }
                    
               },
               {
                     targets: 5,
                        render: function ( data, type, row, meta ) {
                            let ret = data == 'Oui' ? '<span class="glyphicon glyphicon-ok" style="color:#2ecc71;"> </span>' : '<span class="glyphicon glyphicon-remove" style="color:#ea6153;"> </span>';
                            return ret;
                        }
                    
               }
            ],

        });
    });


</script>