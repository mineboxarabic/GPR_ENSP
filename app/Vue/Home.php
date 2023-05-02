<body>

<script defer type="module" src="/GPR_ENSP/public/assets/js/costomScripts/Home.js"></script>
<script defer type="module" src="/GPR_ENSP/public/assets/js/costomJS.js"></script>

<link rel="stylesheet" href="/GPR_ENSP/public/assets/css/costomCss/Home.css">
    <h1><?php //User::find(3);
        //echo the name of the user with id 3
        $user = User::find(264);
        echo $user->first_name;
    ?></h1>









    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <i class="zmdi zmdi-notifications-active"></i> Recherche utilisateur
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                 <!-- Input search -->
                 <div class="col-md-12">
                    <div class="input_container">
                        <input type="text" class="form-control" id="user_id"
                            placeholder="Chercher par nom d'utilisateur"
                            autocomplete="off">
                        <ul id="user_list_id"></ul>
                    </div>
                </div>
                <!-- /Input search -->
                <br>

                <form class="indexUser" id="indexUser" action="<?php echo $_SESSION['__DIR__'].'userFile'; ?>">

                    <div class="col-md-9">
                        <div class="list-group">
                            <input class="form-control inputIndexSearch" id="num_etudiant" name="num_etudiant" placeholder="Scanner la carte utilisateur" autofocus="">
                            
                        </div>
                    </div>
                    <!-- /.list-group -->
                    <div class="col-md-3">
                        <input type="submit" class="btn btn-success btn-block legitRipple" value="Valider">
                    </div>



                </form>
                
               

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <i class="zmdi zmdi-notifications-active"></i> Recherche article
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form class="indexMateriel" id="indexMateriel" action="fiche_materiel.php" method="GET">
                    <div class="col-md-9">
                        <div class="list-group">
                            <input class="form-control" id="num_materiel" name="num_materiel"
                                placeholder="Scanner le code barre de l'article">

                        </div>
                    </div>
                    <!-- /.list-group -->
                    <div class="col-md-3"> <input type="submit" class="btn btn-success btn-block legitRipple"
                            value="Valider"></div>
                </form>
                <br>
                <div class="col-md-6">
                    <div class="input_container">
                        <input type="text" class="form-control" id="stage_id" placeholder="Chercher les materiels par mots clés" onkeyup="autocompletIndex()"
                            autocomplete="off">
                        <ul id="stage_list_id"></ul>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="input_container">
                        <input type="text" class="form-control" id="stage_id_lot"
                            placeholder="Chercher les lots par mots clés" onkeyup="autocompletIndexLot()"
                            autocomplete="off">
                        <ul id="stage_list_id_lot"></ul>
                    </div>



                </div>


            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>






    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel panel-primary">
                <div class="panel-heading ">
                    <h3 class="panel-title"><i class="zmdi zmdi-chart"></i> Réservations de matériels aujourd'hui</h3>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-hover TableReservations" id="TableReservations">
                    <thead>
                        <tr>
                            <th>#</th> <!-- id_reservation Materiel Utilisateur debut fin-->
                            <th>Matériel</th>
                            <th>Utilisateur</th>
                            <th>début</th>
                            <th>fin</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>




        </div>
    </div>



    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-chart"></i> Réservations de lots aujourd'hui </h3>
                </div>
            </div>


            <div class="panel-body">
                <table class="table table-striped table-hover" id="tableReservationLot">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Lot</th>
                            <th>Utilisateur</th>
                            <th>début</th>
                            <th>fin</th>
                        </tr>
                    </thead>
                    <tbody>

                   //TODO: Add lot reservation
                   
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <script defer type="module">
        //check if DataTable exist on the table .TableReservations
    /* $region //_here is the filling of the reservations of the day */
        if ($.fn.DataTable.isDataTable('.TableReservations')) {
            $('.TableReservations').DataTable().destroy();
        }
        $('.TableReservations').DataTable({
            "processing": true,
            "serverSide": true,
            "serverMethod": "post",
            "ajax": "<?=$_SESSION['__DIR__'].'ReservationsC/getTodayRes' ?>",
            paging: false,
            searching: false,
            ordering: false,
            info: false,
            "columns": [
                { "data": "id_reservation" },
                { "data": "Materiel" },
                { "data": "Utilisateur" },
                { "data": "debut" },
                { "data": "fin" }
            ]
        }
        );
    /* $endregion */



    /* $region //_here is the filling of the reservations of the day */
            if ($.fn.DataTable.isDataTable('#tableReservationLot')) {
                $('#tableReservationLot').DataTable().destroy();
            }
            $('#tableReservationLot').DataTable({
                "processing": true,
                "serverSide": true,
                "serverMethod": "post",
                "ajax": "<?=$_SESSION['__DIR__'].'ReservationsC/getTodayResLot' ?>",
                paging: false,
                searching: false,
                ordering: false,
                info: false,
                "columns": [
                    { "data": "id_reservation" },
                    { "data": "Lot" },
                    { "data": "Utilisateur" },
                    { "data": "debut" },
                    { "data": "fin" }
                ]
            }
            );
    /* $endregion */
</script>
</body>