<body>
    <script type="module" src="/GPR_ENSP/public/assets/js/costomScripts/User.js"></script>
    <link rel="stylesheet" href="/GPR_ENSP/public/assets/css/costomCss/userFile.css">

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-block">
                <table class="" style="float:right">
                    <thead>
                        <tr>
                            <th width="200px;">Documents</th>
                            <th>Action</th>
                            <th>Statut</th>
                        </tr>
                    </thead>






                    <tbody>
                        <?php
                        //$user = User::find($user->id);
                        $isAttest = false;
                        $isConv = false;
                        echo "<script>console.log('" . $user['lien_attest'] . "')</script>";
                        if ($user['lien_attest'] == null)
                            $isAttest = true;
                        if ($user['lien_conv'] == null)
                            $isConv = true;
                        ?>


                        <!--//? if Attest file existe we show them more info -->
                        <?php if ($isAttest) { ?>
                            <tr>s
                                <th>Attestation d'assurance</th>

                                <th>
                                    <form id="uploadattest"
                                        action="<?= $_SESSION['__DIR__'] . 'FilesC/uploadFile/' . 'attest/' . $user->id ?>"
                                        method="post" enctype="multipart/form-data" style="margin: 0px; padding: 0px;">
                                        <input type="hidden" name="id_user" value="337">
                                        <div id="selectImage">
                                            <input type="file" name="file" id="file" required=""
                                                style="display: inline"><input type="submit" value="Upload" class="submit"
                                                style="display: inline">
                                        </div>
                                    </form>
                                </th>
                                <td><span class="label label-danger">Manquante</span></td>


                            </tr>
                        <?php } else { ?>
                            <tr>
                                <th>Attestation d'assurancexx</th>
                                <th>
                                    <a href="<?= $_SESSION['__DIR__'] . 'uploads/' . $user['id'] . '/' . $user['lien_attest'] ?>"
                                        target="_blank"><img src="<?= $_SESSION['__DIR__'] . '/assets/' ?>img/preview.png"></a>
                                    <a class="del_fichier"
                                        href="<?= $_SESSION['__DIR__'] . 'FilesC/deleteFile/' . 'attest/' . $user->id ?>"
                                        id="attest_306.pdf" num="306"><img
                                            src="<?= $_SESSION['__DIR__'] . '/assets/' ?>img/trash.png"></a>
                                </th>
                                <td><span class="label label-success">Valide</span></td>
                            </tr>
                        <?php } ?>


                        <!--//? if Conv file existe we show them more info -->
                        <?php if ($isConv) { ?>
                            <tr>
                                <th>Convention de prêt</th>
                                <th>
                                    <form id="uploadconv"
                                        action="<?= $_SESSION['__DIR__'] . 'FilesC/uploadFile/' . 'conv/' . $user->id ?>"
                                        method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_user" value="337">
                                        <div id="selectImage">
                                            <input type="file" name="file" id="file" required=""
                                                style="display: inline"><input type="submit" value="Upload" class="submit"
                                                style="display: inline">
                                        </div>
                                    </form>
                                </th>
                                <td><span class="label label-danger">Manquante</span></td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <th>Convention de prêt</th>
                                <th>
                                    <a href="<?= $_SESSION['__DIR__'] . 'uploads/' . $user['id'] . '/' . $user['lien_conv'] ?>"
                                        target="_blank"><img src="<?= $_SESSION['__DIR__'] . '/assets/' ?>img/preview.png"></a>
                                    <a class="del_fichier"
                                        href="<?= $_SESSION['__DIR__'] . 'FilesC/deleteFile/' . 'conv/' . $user->id ?>"
                                        id="conv_<?= $user->id ?>.pdf" num="<?= $user->id ?>"><img
                                            src="<?= $_SESSION['__DIR__'] . '/assets/' ?>img/trash.png"></a>
                                </th>
                                <td><span class="label label-success">Valide</span></td>
                            </tr>
                        <?php } ?>

                    </tbody>

                </table>
                <img src="<?= $_SESSION['__DIR__'] . 'assets/img/user.jpg' ?>" width="150px;" align="left"
                    style="margin-right: 20px;">






                <!-------------------------------------------------DEBUT DU DEV DES RETARDS ----------------------------------------------------->






                <!----------------------------------------------------PARTIE CARTE UTILISATEUR ------------------------------------------------------>

                <?php if (!User::isLate($user->id) && User::isFilesExist($user->id)) { ?>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-inverse card-info text-xs-center">
                                <div class="card-block">
                                    <blockquote class="card-blockquote">
                                        <p><strong>
                                                <?= $user->first_name . ' ' . $user->last_name ?>
                                            </strong> -
                                            <i>
                                                <?= $user->telephone ?>
                                            </i>
                                        </p>
                                        <p>
                                            <?= $user->email ?>
                                        </p>
                                        <hr>
                                        Compte valide
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-md-4">
                        <div class="card card-inverse card-danger text-xs-center">
                            <div class="card-block">
                                <blockquote class="card-blockquote">
                                    <p><strong><?= $user->first_name .' '. $user->last_name?></strong> - <i><?= $user->telephone?></i></p>
                                    <p><?= $user->email?></p>
                                    <hr>
                                    <?php if(User::isLate($user->id) && !User::isFilesExist($user->id)){ ?>
                                    <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Compte
                                    bloqué.<br>Raison : vos documents ne sont pas complets et vous avez des retards
                                    <?php }else if(User::isLate($user->id) ){ ?>
                                    <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Compte
                                    bloqué.<br>Raison : vous avez des retards
                                    <?php }else if(!User::isFilesExist($user->id)){ ?>
                                    <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Compte
                                    bloqué.<br>Raison : vos documents ne sont pas complets
                                    <?php } ?>

                                </blockquote>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!------------------------------------------------- FIN CARTE UTILISATEUR -------------------------------------------------------->
                <div id="message"></div>


            </div>
        </div>
    </div>

    <div class="row">



        <!-- .col-md-6 -->
        <div class="col-md-6 notfinished">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="zmdi zmdi-notifications-active"></i> EMPRUNT
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!--action="// $_SESSION['__DIR__'].'EmpruntC/addEmpruntMateriel/'.$user->id" -->
                    <form class="empruntMateriel" id="empruntMateriel">
                        <div class="list-group">
                            <input class="form-control" id="num_materiel" placeholder="Scanner l'article" autofocus="">
                        </div>
                        <!-- /.list-group -->
                        <input type="button" class="btn btn-success btn-block legitRipple" id="btn-emprunt-materiele" value="Valider">
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-md-6 -->

        <!-- .col-md-6 -->
        <div class="col-md-6 notfinished">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="zmdi zmdi-notifications-active"></i> RETOUR
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="list-group">
                        <form id="retourMateriel" action="#" class="retourMateriel">
                            <input class="form-control" name="num_materiel_retour" id="num_materiel_retour"
                                placeholder="Scanner l'article">
                        </form>
                    </div>
                    <!-- /.list-group -->
                    <input type="submit" class="btn btn-success btn-block legitRipple" id="btn-retour-materiel" value="Valider">
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-md-6 -->



    </div>

    <div class="row">

        <div class="col-lg-6 notfinished">
            <div class="panel panel-default">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="zmdi zmdi-chart"></i> Emprunts des matériels en cours</h3>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="dataEmpruntUser">

                        <table class="table table-striped table-hover" id="tableEmprunt">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Materiel</th>
                                    <th>emprunté le</th>
                                    <th>à rendre le</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="zmdi zmdi-chart"></i> Emprunts des lots en cours
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Lot</th>
                                    <th>emprunté le </th>
                                    <th>à rendre le</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td colspan="5">Aucun lot sorti pour le moment.</td>
                                </tr>
                            </tbody>
                        </table>

                        <script>





                        </script>












                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 notfinished">
            <div class="panel panel-default">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="zmdi zmdi-chart"></i> Réservations des matériels</h3>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="dataResaUser">

                        <!----------------------------------------- Partie des Materiels---------------------------------------------------->

                        <table class="table table-striped table-hover" id="tableReservations">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Materiel</th>
                                    <th>Date d'emprunt</th>
                                    <th>Date de retour</th>
                                    <th> Commandes </th>
                                </tr>

                            </thead>

                            <tbody>

                            </tbody>
                        </table>




                        <!----------------------------------------- Partie des LOTS---------------------------------------------------->
                        <div class="row">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="zmdi zmdi-chart"></i> Reservations des lots</h3>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Lot</th>
                                    <th>Date d'emprunt</th>
                                    <th>Date de retour</th>
                                    <th> Commandes </th>
                                </tr>

                            </thead>

                            <tbody>
                                <tr class="gradeX">
                                    <td colspan="5">Aucune reservation de lot pour le moment</td>
                                </tr>


                            </tbody>
                        </table>




                        <script defer type="module">
                            function isNumber(s) {
                            return !isNaN(parseFloat(s)) && isFinite(s);
                            }

                                
                            /* #region //_Ajax conetion to add a new "emprunt" */
                                $('#btn-emprunt-materiele').on('click', function () 
                                {
                                    let input = document.querySelector('#num_materiel');
                                    let inputValue = input.value;
                                    
                                    if(isNumber(inputValue)){
                                        let num = parseInt(inputValue);
                                        $.ajax({
                                            url: "<?=$_SESSION['__DIR__'].'EmpruntC/addEmpruntMateriel/'.$user->id;?>/" + num,
                                            method: "post",
                                            success:function(a){
                                                //TODO: Translate this
                                                //TODO: ADD the name of the article in here using the php database shit
                                                $.notify("Le "+num+" a ete emprunte", {
                                                    className: "success",
                                                    type:'success'
                                                });  
                                            },
                                            error:function (xhr, status, error){
                                                console.log(xhr);
                                                
                                                $.notify(xhr.responseText, {
                                                    className: "danger",
                                                    type:'danger'
                                                });  
                                            }
                                        })

                                    }else{
                                        //TODO: Translate this
                                        $.notify("Vous devez mettre un que des chifre", {
                                            className: "danger",
                                            type:'danger'
                                        });
                                        
                                    }
                                })
                                /* #endregion */
        
                            /* #region //_Ajax conection to remove the "emprunt". */
                                $('#btn-retour-materiel').on('click',function(){
                                    let input = document.querySelector('#num_materiel_retour');
                                    let inputValue = input.value;
                                    
                                    if(isNumber(inputValue)){
                                        let num = parseInt(inputValue);
                                        $.ajax({
                                            url: "<?=$_SESSION['__DIR__'].'EmpruntC/removeEmpruntMateriel'?>/" + num,
                                            method: "post",
                                            success:function(a){
                                                //TODO: Translate this
                                                //TODO: ADD the name of the article in here using the php database shit
                                                $.notify('Le materiel a ete retourne', {
                                                    className: "success",
                                                    type:'success'
                                                });  
                                            },
                                            error:function (xhr, status, error){
                                                console.log(xhr);
                                                
                                                $.notify(xhr.responseText, {
                                                    className: "danger",
                                                    type:'danger'
                                                });  
                                            }
                                        })

                                    }else{
                                        //TODO: Translate this
                                        $.notify("Vous devez mettre un que des chifre", {
                                            className: "danger",
                                            type:'danger'
                                        });
                                        
                                    }
                                })
                            /* #endregion */

                        </script>

                        <script defer type="module">

                            /* #region //_Filling the table with the "Emprunts" of the user */
                                if ($.fn.DataTable.isDataTable('#tableEmprunt')) {
                                    $('#tableEmprunt').DataTable().destroy();
                                }

                                $('#tableEmprunt').DataTable({
                                    "processing": true,
                                    "serverSide": true,
                                    "serverMethod": "post",
                                    "ajax": "<?=$_SESSION['__DIR__'].'UserC/getEmprunts/'.$user->id ?>",
                                    paging: false,
                                    searching: false,
                                    ordering: false,
                                    info: false,
                                    "columns": [
                                        { "data": "id_emprunt" },
                                        { "data": "id_mat" },
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
                                        },
                                        {
                                            "targets": 1,
                                            "data": null,
                                            "defaultContent": "#",
                                            "render": function (data, type, row, meta) {
                                                return `<a href="<?= $_SESSION['__DIR__'].'MatFile/'?>${data}">${data}</a>`;
                                            }
                                        }
                                    ]
                                }
                                );
                            /* #endregion */
                        

                            /* #region //_Filling the table with the "Reservations" of the user */
                                if ($.fn.DataTable.isDataTable('#tableReservations')) {
                                    $('#tableReservations').DataTable().destroy();
                                }

                                $('#tableReservations').DataTable({
                                    "processing": true,
                                    "serverSide": true,
                                    "serverMethod": "post",
                                    "ajax": "<?=$_SESSION['__DIR__'].'ReservationsC/getReservationsByUser/'.$user->id ?>",
                                    paging: false,
                                    searching: false,
                                    ordering: false,
                                    info: false,
                                    "columns": [
                                        { "data": "id_reservation" },
                                        { "data": "Materiel" },
                                        { "data": "debut" },
                                        { "data": "fin" },
                                        { "data" : "commande"}
                                    
                                    ],
                                    "columnDefs": [
                                        {
                                            "targets": -1,
                                            "data": null,
                                            "defaultContent": "<button>Return</button>",
                                            "render": function (data, type, row, meta) {
                                                return `
                                                    <div>
                                                    <button type="button" class="btn btn-outline btn-success btn-xs " id="validationRes_lot"><span class="glyphicon glyphicon-ok "> </span></button>
                                                    <a href="edition_reservation_lot.php?editionreslot=3892 &amp;id_user=928 &amp;id_lot=653" class="glyphicon glyphicon-pencil " aria-hidden="true" style="    text-decoration: none; margin-right: 20px;margin-left: 20px;"> </a>
                                                    <button class="btn btn-outline btn-danger btn-xs delete " id="3892"><span class="glyphicon glyphicon-trash "> </span></button>
                                                    </div>
                                                `;
                                                
                                            }
                                        }
                                    ]
                                    
                                }
                                );
                            /* #endregion */
                        
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>