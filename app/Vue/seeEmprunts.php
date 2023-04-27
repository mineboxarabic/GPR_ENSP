<!-- #region -->
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
<!-- #endregion -->



<!-- #region -->

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <i class="zmdi zmdi-notifications-active"></i> Recherche article
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form class="indexMateriel" id="indexMateriel" action="fiche_materiel.php" method="GET">
                    <div class="col-md-10">
                        <div class="list-group">
                            <input class="form-control" id="num_materiel" name="num_materiel"
                                placeholder="Scanner le code barre de l'article">

                        </div>
                    </div>
                    <!-- /.list-group -->
                    <div class="col-md-2"> <input type="submit" class="btn btn-success btn-block legitRipple"
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

<!-- #endregion -->