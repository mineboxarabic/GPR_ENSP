<div class="row">
    <div class="col-lg-12">
        <?php if (Materiel::isDisponible($Mat->id_materiel)) { ?>
            <div class="notice notice-success">
                <!-- //TODO: Do the ATTENTION : Ce matériel appartient au lot : numLOT -->
                <!-- //TODO: Do the  est disponible.T ou n'ai pas disponible-->

                <strong>Information : </strong> Ce matériel (<strong>
                    <?= $Mat->id_materiel . ' - ' . $Mat->designation ?>
                </strong>) est disponible.
            </div>
        <?php } else { ?>
            <div class="notice notice-danger">
                <strong>Information : </strong> Ce matériel (<strong>
                    <?= $Mat->id_materiel . ' - ' . $Mat->designation ?>
                </strong>) n'est pas disponible.
            </div>
        <?php } ?>

        <?php if (Materiel::isMaterialInLot($Mat->id_materiel)) { ?>
            <div class="notice notice-info">
                <strong>Information : </strong> Ce matériel appartient au lot : <strong>
                    <?= $Mat->num_lot ?>
                </strong>
            </div>
        <?php } ?>

    </div>
</div>


<div class="row">
    <!-- .col-md-6 -->
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="zmdi zmdi-notifications-active"></i> EMPRUNT
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

                <div class="list-group">
                    <?php
                    $isEmpruntAble = Materiel::isDisponible($Mat->id_materiel) ? '' : 'disabled';
                    ?>
                    <input id="num_user" type="text" value="<?php echo $_SESSION['current_user'] ?>" name="num_user" class="form-control"
                        placeholder="Scanner la carte utilisateur" <?= $isEmpruntAble ?>>
                </div>
                <!-- /.list-group -->
                <input type="submit" class="btn btn-success btn-block legitRipple" id="num_user_btn" value="Valider"
                    <?= $isEmpruntAble ?>>

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->


    </div>
    <!-- /.col-md-6 -->

    <!-- .col-md-6 -->
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="zmdi zmdi-notifications-active"></i> RETOUR
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">


                <!-- /.list-group -->
                <input type="submit" class="btn btn-success btn-block legitRipple" id="num_user_retour_btn"
                    value="Valider" <?= $isEmpruntAble ?>>

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-md-6 -->



</div>

<div class="row">

    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="zmdi zmdi-chart"></i> Emprunts en cours</h3>
            </div>
            <div class="panel-body">
                <div id="data">

                    <table class="table table-striped table-hover" id="Emprunt_En_Cours">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Utilisateurs</th>
                                <th>Date d'emprunt</th>
                                <th>Date de retour</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="gradeX">
                                <td colspan="5">Aucun emprunt pour le moment</td>
                            </tr>
                        </tbody>
                    </table>

                    <script>

                    </script>

                </div>
                <?php
                    if(Materiel::isMaterialReserved($Mat->id_materiel)){
                ?>
                <p class="text-danger">Attention ! Ce matériel est actuellement réservé par :
                    <?php
                        $res = Reservation::where('id_materiel', $Mat->id_materiel)->first();
                        
                        if($res){
                            $user = User::where('id', $res->id_user)->first();
                            if($user)
                                echo $user->first_name . ' ' . $user->last_name;
                            else
                                echo 'Utilisateur inconnu';

                        }
                    ?>
                    </p>
                    
                <p>
                    Voulez vous : <br>
                    <button type="button" class="btn btn-outline btn-warning legitRipple" id="annulResa"> Annuler cette
                        réservation </button>
                    <em> ou </em>
                    <button type="button" class="btn btn-outline btn-success legitRipple" id="validResa"> Créer un
                        emprunt pour cet utilisateur</button> ?
                </p>
                <?php } ?>
            </div>



        </div>
    </div>



    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="zmdi zmdi-chart"></i> Réservations
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="reservations.php?num_materiel=1221"
                        class="btn btn-outline btn-info btn-xs legitRipple" id="">Faire une réservation</a> </h3>

            </div>
            <div class="panel-body">
                <table class="table table-striped table-hover" id="reservations_en_cours">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Utilisateur</th>
                            <th>date d'emprunt</th>
                            <th>date de retour</th>
                        </tr>
                    </thead>
                    <tbody>

                


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!---------------------------------------------------------------PARTIE HISTORIQUE ------------------------------------->

    <div class="col-lg-12">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Historique des emprunts
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table style="width:100%" class="table table-striped table-bordered table-hover"
                            id="historyTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Utilisateur</th>
                                    <th>materiel</th>
                                    <th>emprunté le par</th>
                                    <th>rendu le par</th>
                                    <th>Dispo </th>
                                </tr>
                            </thead>
                            <tbody>



                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        
        

        

    </div>
    <!-- /.row -->




    <!-------- DEBUT LOT --------------->







    <script defer type="module">
        /* #region //_Helper iNumber function */
        function isNumber(s) {
            return !isNaN(parseFloat(s)) && isFinite(s);
        }
        /* #endregion */

        /* #region  //_EN: Button to make the current material unavailable */
            //_FR: Bouton pour mettre le matériel courant indisponible 
            $('#mettre-hors-service-btn').on('click', function () {
                $.ajax({
                    url: "<?= $_SESSION['__DIR__'] . 'MaterielC/metHorsService/' . $Mat->id_materiel ?>",
                    type: "POST",

                    success: function (data) {
                        console.log(data);
                        if (data == 0) {
                            //alert('Materiel mis hors service');
                            window.location.reload();
                        } else {
                            // alert('Erreur lors de la mise hors service');
                        }
                    }

                })
            })
        /* #endregion */

        /* #region  //_EN: Validate the borowing of the matiral*/
        //_FR: Valider l'emprunt du matériel 
        $('#num_user_btn').on('click', function () {
            let userId = document.querySelector('#num_user').value;
            $.ajax({
                url: "<?= $_SESSION['__DIR__'] . 'EmpruntC/addEmpruntMateriel/' ?>" + userId + '/' + <?= $Mat->id_materiel ?>,
                type: "POST",

                success: function (a) {
                    //TODO: Translate this
                    //TODO: ADD the name of the article in here using the php database shit
                    $.notify("Le " + <?= $Mat->id_materiel ?> + " a ete emprunte", {
                        className: "success",
                        type: 'success'
                    });
                },
                error: function (xhr, status, error) {
                    console.log(xhr);

                    $.notify(xhr.responseText, {
                        className: "danger",
                        type: 'danger'
                    });
                }
            })
        })
        /* #endregion */


        /* #region //_Ajax conection to remove the "emprunt". */
            $('#num_user_retour_btn').on('click', function () {
                let input = document.querySelector('#num_user_retour');
                let inputValue = input.value;
                //! Ask about the need to put the number of the user in to be able to return the item
                if (isNumber(inputValue)) {
                    let num = parseInt(inputValue);
                    $.ajax({
                        url: "<?= $_SESSION['__DIR__'] . 'EmpruntC/removeEmpruntMateriel' ?>/" + <?= $Mat->id_materiel?>,
                        method: "post",
                        success: function (a) {
                            //TODO: Translate this
                            //TODO: ADD the name of the article in here using the php database shit
                            $.notify('Le materiel a ete retourne', {
                                className: "success",
                                type: 'success'
                            });
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr);

                            $.notify(xhr.responseText, {
                                className: "danger",
                                type: 'danger'
                            });
                        }
                    })

                } else {
                    //TODO: Translate this
                    $.notify("Vous devez mettre un que des chifre", {
                        className: "danger",
                        type: 'danger'
                    });

                }
            })
        /* #endregion */

        /* #region //_Filling the table with the "Emprunts" of the user */
            if ($.fn.DataTable.isDataTable('#Emprunt_En_Cours')) {
                $('#Emprunt_En_Cours').DataTable().destroy();
            }

            $('#Emprunt_En_Cours').DataTable({
                "processing": true,
                "serverSide": true,
                "serverMethod": "post",
                "ajax": "<?=$_SESSION['__DIR__'].'MaterielC/getEmprunts/'.$Mat->id_materiel ?>",
                paging: false,
                searching: false,
                ordering: false,
                info: false,
                "columns": [
                    { "data": "id_emprunt" },
                    { "data": "User" },
                    { "data": "date_debut" },
                    { "data": "date_retour" },
                    { "data": "statut" }
                
                ],
                //make last column a link 
                "columnDefs": [
                    {
                        "targets": -1,
                        "data": null,
                        "defaultContent": "<button>Return</button>",
                        "render": function (data, type, row, meta) {
                            console.log(data);
                            if(data == 1){
                                return `
                                    <?php 
                                        echo "<div>";
                                            echo '<span class="label label-danger">Retard</span>';
                                            echo '<a href="#" id="envoi_mail"><img src="'.$_SESSION["__DIR__"].'assets/'.'img/mail.png"></a>';
                                            echo '<a href="#" id="envoi_sms"><img src="'.$_SESSION["__DIR__"].'assets/'.'img/phone_3.png"></a>';
                                        echo '</div>';
                                    ?>
                            `;
                            }
                            return '';
                            
                        }
                    }
                ]
            }
            );
        /* #endregion */
        

        /* #region //_Filling the table with the "Reservations" of the user */
            if ($.fn.DataTable.isDataTable('#reservations_en_cours')) {
                    $('#reservations_en_cours').DataTable().destroy();
                }

                $('#reservations_en_cours').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "serverMethod": "post",
                    "ajax": "<?=$_SESSION['__DIR__'].'MaterielC/getReservations/'.$Mat->id_materiel ?>",
                    paging: false,
                    searching: false,
                    ordering: false,
                    info: false,
                    "columns": [
                        { "data": "id_reservation" },
                        { "data": "User" },
                        { "data": "date_debut" },
                        { "data": "date_fin" }
                    
                    ]
                    
                }
                );
        /* #endregion */


                /* #region //_Filling the table with the "Reservations" of the user */
                if ($.fn.DataTable.isDataTable('#historyTable')) {
                    $('#historyTable').DataTable().destroy();
                }
                //TODO:fill this table
                $('#historyTable').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "serverMethod": "post",
                    "ajax": "<?=$_SESSION['__DIR__'].'MaterielC/getHistory/'.$Mat->id_materiel ?>",
                    paging: false,
                    searching: false,
                    ordering: false,
                    info: false,
                    "columns": [
                        { "data": "id_historique" },
                        { "data": "User" },
                        {"data": "mat"},
                        { "data": "date_debut" },
                        { "data": "date_fin" },
                        { "data": "dispo" }
                    
                    ],
                    columnDefs: [
                        {
                                    targets: 2,
                                        render: function ( data, type, row, meta ) {
                                            let ret = "<a href='<?= $_SESSION['__DIR__'] . 'MatFile/' ?>" + data + "'>" + data + "</a>";
                                            return ret;
                                        }
                                    
                            },
                            {
                                    targets: 5,
                                        render: function ( data, type, row, meta ) {
                                            let ret = data == 1 ? '<span class="glyphicon glyphicon-ok" style="color:#2ecc71;"> </span>' : '<span class="glyphicon glyphicon-remove" style="color:#ea6153;"> </span>';
                                            return ret;
                                        }
                                    
                            }
            ],
                    
                }
                );
        /* #endregion */
    </script>

    <!-- /EMPRUNT MATERIEL -->



</div>