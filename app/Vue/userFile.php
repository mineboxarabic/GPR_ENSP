<body>

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
                            echo "<script>console.log('".$user['lien_attest']."')</script>";
                            if($user['lien_attest'] == null) $isAttest = true;
                            if($user['lien_conv'] == null) $isConv = true;
                        ?>


                        <!--//? if Attest file existe we show them more info -->
                        <?php if($isAttest) {?>
                        <tr>s
                            <th>Attestation d'assurance</th>

                            <th>
                                <form id="uploadattest"
                                    action="<?= $_SESSION['__DIR__'].'FilesC/uploadFile/'.'attest/'.$user->id?>"
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
                        <?php }else{ ?>
                        <tr>
                            <th>Attestation d'assurancexx</th>
                            <th>
                                <a href="<?= $_SESSION['__DIR__'].'uploads/'.$user['id'].'/'.$user['lien_attest']?>"
                                    target="_blank"><img src="<?=$_SESSION['__DIR__'].'/assets/'?>img/preview.png"></a>
                                <a class="del_fichier"
                                    href="<?= $_SESSION['__DIR__'].'FilesC/deleteFile/'.'attest/'.$user->id?>"
                                    id="attest_306.pdf" num="306"><img
                                        src="<?=$_SESSION['__DIR__'].'/assets/'?>img/trash.png"></a>
                            </th>
                            <td><span class="label label-success">Valide</span></td>
                        </tr>
                        <?php } ?>


                        <!--//? if Conv file existe we show them more info -->
                        <?php if($isConv) {?>
                        <tr>
                            <th>Convention de prêt</th>
                            <th>
                                <form id="uploadconv"
                                    action="<?= $_SESSION['__DIR__'].'FilesC/uploadFile/'.'conv/'.$user->id?>"
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
                        <?php }else{ ?>
                        <tr>
                            <th>Convention de prêt</th>
                            <th>
                                <a href="<?= $_SESSION['__DIR__'].'uploads/'.$user['id'].'/'.$user['lien_conv']?>"
                                    target="_blank"><img src="<?=$_SESSION['__DIR__'].'/assets/'?>img/preview.png"></a>
                                <a class="del_fichier"
                                    href="<?= $_SESSION['__DIR__'].'FilesC/deleteFile/'.'conv/'.$user->id?>"
                                    id="conv_<?=$user->id?>.pdf" num="<?=$user->id?>"><img
                                        src="<?=$_SESSION['__DIR__'].'/assets/'?>img/trash.png"></a>
                            </th>
                            <td><span class="label label-success">Valide</span></td>
                        </tr>
                        <?php } ?>

                    </tbody>

                </table>
                <img src="<?=$_SESSION['__DIR__'].'assets/img/user.jpg' ?>" width="150px;" align="left"
                    style="margin-right: 20px;">






                <!-------------------------------------------------DEBUT DU DEV DES RETARDS ----------------------------------------------------->






                <!----------------------------------------------------PARTIE CARTE UTILISATEUR ------------------------------------------------------>

                <?php if(!User::isLate($user->id) && User::isFilesExist($user->id)){ ?>
                    
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-inverse card-info text-xs-center">
                            <div class="card-block">
                                <blockquote class="card-blockquote">
                                    <p><strong><?= $user->first_name .' '. $user->last_name ?></strong> -
                                        <i><?= $user->telephone ?></i>
                                    </p>
                                    <p><?= $user->email ?></p>
                                    <hr>
                                    Compte valide
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="col-md-4">
                    <div class="card card-inverse card-danger text-xs-center">
                        <div class="card-block">
                            <blockquote class="card-blockquote">
                                <p><strong>Benoit MARTINEZ</strong> - <i>04 84 76 94 11</i></p>
                                <p>b.martinez@ensp-arles.fr</p>
                                <hr>

                                <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Compte
                                bloqué.<br>Raison : vos documents ne sont pas complets
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
                    <form class="empruntMateriel" id="empruntMateriel" action="#">
                        <div class="list-group">
                            <input class="form-control" name="num_materiel" id="num_materiel"
                                placeholder="Scanner l'article" autofocus="">
                        </div>
                        <!-- /.list-group -->
                        <input type="submit" class="btn btn-success btn-block legitRipple" value="Valider">
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
                            <input class="form-control" name="num_materiel_retour" id="num_materiel_retour" placeholder="Scanner l'article">
                        </form>
                    </div>
                    <!-- /.list-group -->
                    <input type="submit" class="btn btn-success btn-block legitRipple" value="Valider">
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

                        <table class="table table-striped table-hover">
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
                                <?php 
                                // Emprunts des matériels en cours
                                        $emprunts = Emprunt::where('id_user', $user->id)->get();
                                        
                                        if($emprunts){
                                            foreach($emprunts as $emprunt){
                                                $materiel = Materiel::where('id_materiel', $emprunt->id_materiel)->first();
                                                //$statut = Statut::getStatutById($emprunt->id_statut);
                                                $date_emprunt = date('d/m/Y', strtotime($emprunt->date_debut));
                                                $date_retour = date('d/m/Y', strtotime($emprunt->date_retour));
                                                $isLate = Emprunt::isLate($user->id, $materiel->id_materiel);
                                                $statu = !$isLate ? "":  '<span class="label label-danger">Retard</span>&nbsp;&nbsp;<a href="#" id="envoi_mail"><img src="'.$_SESSION['__DIR__'].'assets/img/mail.png"></a>&nbsp;&nbsp;<a href="#" id="envoi_sms"><img src="'.$_SESSION['__DIR__'].'assets/img/phone_3.png"></a>';
                                                echo '<tr class="gradeX"><td>'.$materiel->id_materiel.'</td><td>'.$materiel->nom.'</td><td>'.$date_emprunt.'</td><td>'.$date_retour.'</td><td>'.$statu.'</td></tr>';
                                            }
                                        }else{
                                    ?>
                                <tr class="gradeX">
                                    <td colspan="5">Aucun emprunt pour le moment</td>
                                </tr>
                                <?php } ?>
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
                        // FONCTION CHANGEMENT DE DATE TABLEAU DES EMPRUNTS 


                        function saveToDatabase(editableObj, column, id) {
                            $(editableObj).css("background", "#FFF url(loaderIcon.gif) no-repeat right");
                            data: 'editval=' + editableObj.innerHTML + '&id=' + id;

                            $.ajax({
                                url: "saveedit.php",
                                type: "POST",
                                data: 'editval=' + editableObj.innerHTML + '&id=' + id,
                                success: function(data) {
                                    $(editableObj).css("background", "#FDFDFD");


                                    setTimeout(function() {
                                        location.reload(true);
                                    }, 500);

                                }
                            });
                        }

                        function showEdit(editableObj) {
                            $(editableObj).css("background", "#FFF");

                        }

                        $("#envoi_mail").click(function() {
                            var data = 'num_etudiant=' + 820;

                            $.ajax({
                                type: "POST",
                                url: "send_mail.php",
                                datatype: "html",
                                data: data,

                                success: function(data) {
                                    $.notify({
                                        message: 'ENVOI MAIL realisé avec succès '
                                    }, {
                                        type: 'success'
                                    });

                                }
                            });

                            return false;


                        });
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

                        <table class="table table-striped table-hover">
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
                                <?php

                                $reservations = Reservation::where('id_user', $user->id)->get();

                                if ($reservations) {
                                    foreach ($reservations as $reservation) {
                                        $materiel = Materiel::where('id_materiel', $reservation->id_materiel)->first();
                                        $date_emprunt = date('d/m/Y', strtotime($reservation->date_debut));
                                        $date_retour = date('d/m/Y', strtotime($reservation->date_retour));
                                        echo '<tr class="gradeX"><td>' . $materiel->id_materiel . '</td><td>' . $materiel->nom . '</td><td>' . $date_emprunt . '</td><td>' . $date_retour . '</td><td> <input type="hidden" name="idMat" id="idMat" value="1102"> <input type="hidden" name="idRes" id="idRes" value="3875"> <input type="hidden" name="idUser" id="idUser" value="337"> <button type="button" class="btn btn-outline btn-success btn-xs " id="validationRes"><span class="glyphicon glyphicon-ok "> </span></button> <a href="edition_reservation.php?editionres=3875 &amp;id_user=337 &amp;id_materiel=1102" class="glyphicon glyphicon-pencil " aria-hidden="true" style="    text-decoration: none; margin-right: 20px; margin-left:20px;"> </a> <button class="btn btn-outline btn-danger btn-xs delete " id="3875"><span class="glyphicon glyphicon-trash "> </span></button> </td></tr>';
                                    }
                                } else {
                                ?>

                                <tr class="gradeX">
                                    <td colspan="5">Aucune reservation de materiel pour le moment</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>


                        <script>
                        $(".delete").click(function() {

                            var id_reservation = $(this).attr('id');
                            var data = 'num_reservation=' + id_reservation;

                            $.ajax({
                                type: "POST",
                                url: "annulation_reservation.php",
                                datatype: "html",
                                data: data,

                                success: function(data) {
                                    window.location.href = 'fiche_utilsateur.php?num_etudiant=820';

                                }
                            });
                            return false;

                        });
                        </script>

                        <script>
                        //VALIDER LA RESERVATION MATERIEL 
                        $("#validationRes").click(function() {
                            var idRes = $("#idRes").val();
                            var idUser = $("#idUser").val();
                            var materiel = $("#idMat").val();
                            //alert(materiel);
                            var data = 'id_resa=' + idRes + '&id_user=' + idUser + '&num_materiel=' + materiel;
                            //alert(data);	

                            $.ajax({
                                type: "POST",
                                url: "ajax_valid_resa.php",
                                datatype: "html",
                                data: data,

                                success: function(data) {
                                    $.notify({
                                        message: 'EMPRUNT realisé avec succès'
                                    }, {
                                        type: 'success'
                                    });
                                    setTimeout(function() {
                                        location.reload(true);
                                    }, 500);
                                }
                            });

                            return false;



                        });
                        </script>


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

                        <script>
                        $(".delete").click(function() {

                            var id_reservation = $(this).attr('id');
                            var data = 'num_reservation=' + id_reservation;

                            $.ajax({
                                type: "POST",
                                url: "annulation_reservation.php",
                                datatype: "html",
                                data: data,

                                success: function(data) {
                                    window.location.href = 'fiche_utilsateur.php?num_etudiant=820';

                                }
                            });
                            return false;

                        });
                        </script>


                        <script>
                        //VALIDER LA RESERVATION MATERIEL 
                        $("#validationRes_lot").click(function() {
                            var idRes_lot = $("#idRes_lot").val();
                            var idUser_lot = $("#idUser_lot").val();
                            var lot = $("#idMat_lot").val();

                            var data = 'id_resa_lot=' + idRes_lot + '&id_user_lot=' + idUser_lot + '&num_lot=' +
                                lot;
                            //alert(data);	

                            $.ajax({
                                type: "POST",
                                url: "ajax_valid_resa_lot.php",
                                datatype: "html",
                                data: data,

                                success: function(data) {
                                    $.notify({
                                        message: 'EMPRUNT du lot realisé avec succès'
                                    }, {
                                        type: 'success'
                                    });
                                    setTimeout(function() {
                                        location.reload(true);
                                    }, 500);
                                }
                            });

                            return false;




                        });
                        </script>


                        <script src="./assets/js/scripts/init.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>