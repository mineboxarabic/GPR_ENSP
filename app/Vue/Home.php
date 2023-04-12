<body>
<script type="module" src="/GPR_ENSP/public/assets/js/costomJS.js"></script>
    <h1><?php //User::find(3);
        //echo the name of the user with id 3
        $user = User::find(264);
        echo $user->first_name;
    ?></h1>
    <div class="row">

        <a href="emprunt.php">
            <div class="col-xs-3 col-sm-3 col-lg-3 hvr-float box-responsive">
                <div class="color-box m-lightgreen">
                    <span class="color">EMPRUNT</span>

                </div>
            </div>
        </a>

        <a href="reservations.php">
            <div class="col-xs-3 col-sm-3 col-lg-3 hvr-float box-responsive">
                <div class="color-box m-purple">
                    <span class="color">RÉSERVATIONS</span>

                </div>
            </div>
        </a>

        <a href="retour_rapide.php">
            <div class="col-xs-3 col-sm-3 col-lg-3 hvr-float box-responsive">
                <div class="color-box m-pink">
                    <span class="color">RETOUR</span>
                </div>
            </div>
        </a>

        <a href="retour_rapide.php">
            <div class="col-xs-3 col-sm-3 col-lg-3 hvr-float box-responsive">
                <div class="color-box m-deeporange">
                    <span class="color">RETOUR DE LOT</span>
                </div>
            </div>
        </a>

    </div>








    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <i class="zmdi zmdi-notifications-active"></i> Recherche utilisateur
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form class="indexUser" id="indexUser" action="fiche_utilsateur.php">

                    <div class="col-md-9">
                        <div class="list-group">
                            <input class="form-control" id="num_etudiant" name="num_etudiant" placeholder="Scanner la carte utilisateur" autofocus="">

                        </div>
                    </div>
                    <!-- /.list-group -->
                    <div class="col-md-3">
                        <input type="submit" class="btn btn-success btn-block legitRipple" value="Valider">
                    </div>



                </form>
                <br>
                <div class="col-md-12">
                    <div class="input_container">
                        <input type="text" class="form-control" id="user_id"
                            placeholder="Chercher par nom d'utilisateur"
                            autocomplete="off">
                        <ul id="user_list_id"></ul>
                    </div>
                </div>

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
                        <input type="text" class="form-control" id="stage_id"
                            placeholder="Chercher les materiels par mots clés" onkeyup="autocompletIndex()"
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
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Matériel</th>
                            <th>Utilisateur</th>
                            <th>début</th>
                            <th>fin</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=838">
                                    838 -
                                    Hasselblad
                                    LOT H1 H3D 39mp</a>
                            </td>
                            <td>Loisa&nbsp;GATTO</td>
                            <td>12/04/2023</td>
                            <td>19/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">2</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=1023">
                                    1023 -
                                    Profoto
                                    Grid kit OCF</a>
                            </td>
                            <td>Paul&nbsp;SUDRON</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">3</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=2407">
                                    2407 -
                                    PROFOTO
                                    ACCESOIRES AIR REMOTE PROFOTO EMETTEUR</a>
                            </td>
                            <td>Paul&nbsp;SUDRON</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">4</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=975">
                                    975 -
                                    FUJI
                                    FUJI GW670III</a>
                            </td>
                            <td>Amy-Casilda&nbsp;BARTOLI</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">5</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=1019">
                                    1019 -
                                    Profoto
                                    OCF Snoot</a>
                            </td>
                            <td>Paul&nbsp;SUDRON</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">6</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=1003">
                                    1003 -
                                    METZ
                                    FLASH METZ 45 CL-4 (Pour MF ARGENTIQUE)</a>
                            </td>
                            <td>Charlotte&nbsp;VAN DE WALLE</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">7</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=2375">
                                    2375 -
                                    ZOOM
                                    Enregistreur audio Zoom H5 (6) + micro directionnel </a>
                            </td>
                            <td>Yan&nbsp;LEANDRI</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">8</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=1345">
                                    1345 -
                                    PROFOTO
                                    SOFTBOX RFI 2x2' </a>
                            </td>
                            <td>Paul&nbsp;SUDRON</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">9</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=1022">
                                    1022 -
                                    Profoto
                                    Speedring OCF</a>
                            </td>
                            <td>Paul&nbsp;SUDRON</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">10</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=2171">
                                    2171 -
                                    Mamiya
                                    Mamiya 645 PRO + 80mm ff2.8 + 150mm f3.5</a>
                            </td>
                            <td>Arina&nbsp;STARYKH</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">11</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=1042">
                                    1042 -
                                    Profoto
                                    OCF RFI SOFTGRID 2X2</a>
                            </td>
                            <td>Paul&nbsp;SUDRON</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">12</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=292">
                                    292 -
                                    FUJI
                                    FUJI GW690III</a>
                            </td>
                            <td>Romain&nbsp;PETON</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">13</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=894">
                                    894 -
                                    F64
                                    Sac Extra Large (4x5)</a>
                            </td>
                            <td>Léa&nbsp;DEVENELLE</td>
                            <td>12/04/2023</td>
                            <td>24/04/2023</td>
                        </tr>

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
                <table class="table table-striped table-hover">
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


                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=l680">
                                    #680 -
                                    L HASSELBLAD H4D50 50/80</a>
                            </td>
                            <td>Samuel&nbsp;VORMS</td>
                            <td>12/04/2023</td>
                            <td>20/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">2</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=l510">
                                    #510 -
                                    L MAMIYA RZ67 50/110</a>
                            </td>
                            <td>Paul&nbsp;SUDRON</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">3</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=l727">
                                    #727 -
                                    L LEICA M11 NUM 28mm f2 + 75mm f2</a>
                            </td>
                            <td>Salome&nbsp;GAETA</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">4</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=l515">
                                    #515 -
                                    L HASSELBLAD 500CM 50/80/150</a>
                            </td>
                            <td>Charlotte&nbsp;VAN DE WALLE</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">5</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=l154">
                                    #154 -
                                    L MAMIYA RZ 67 PRO II 90/180</a>
                            </td>
                            <td>Aida&nbsp;LECHUGO</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">6</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=l688">
                                    #688 -
                                    L FLASH PRO-B2 DEUX TORCHES</a>
                            </td>
                            <td>Paul&nbsp;SUDRON</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">7</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=l695">
                                    #695 -
                                    L MAMIYA 7II 80mm</a>
                            </td>
                            <td>Chloé&nbsp;AUBERT</td>
                            <td>12/04/2023</td>
                            <td>27/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">8</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=l520">
                                    #520 -
                                    L MAMIYA C330s 80mm</a>
                            </td>
                            <td>Salome&nbsp;GAETA</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">9</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=l714">
                                    #714 -
                                    L SONY ALPHA 7SII + 24-70mm</a>
                            </td>
                            <td>Gaspard&nbsp;LABASTIE COAYREHOURCQ</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">10</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=l749">
                                    #749 -
                                    L FUJI GFX100 50mm f:3.5 + 80mm f:1.7</a>
                            </td>
                            <td>Bastien&nbsp;GLACIAL</td>
                            <td>12/04/2023</td>
                            <td>19/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">11</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=l748">
                                    #748 -
                                    L FUJI GFX 50R 30mm f:3.5 + 63mm f:2.8</a>
                            </td>
                            <td>Adrien&nbsp;LIMOUSIN</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">12</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=l717">
                                    #717 -
                                    L LUMIX S5 24-105mm </a>
                            </td>
                            <td>Yan&nbsp;LEANDRI</td>
                            <td>12/04/2023</td>
                            <td>26/04/2023</td>
                        </tr>

                        <tr>
                            <th scope="row">13</th>
                            <td>
                                <a href="fiche_materiel.php?num_materiel=l519">
                                    #519 -
                                    L HASSELBLAD 501CM 50/80/150</a>
                            </td>
                            <td>Lila&nbsp;NIEL</td>
                            <td>12/04/2023</td>
                            <td>19/04/2023</td>
                        </tr>

                    </tbody>
                </table>
            </div>


        </div>
    </div>

</body>