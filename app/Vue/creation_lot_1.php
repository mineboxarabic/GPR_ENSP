<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Informations générales - Test - #753
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="POST" action="modif_lots.php" name="myForm" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label for="Select">Catégorie</label>
                                <select name="lot_cat" id="Select" class="form-control">
                                    <option value=""> - Selectionner - </option>
                                    <option value="1">Éclairage</option>
                                    <option value="2">GF</option>
                                    <option value="9">Informatique</option>
                                    <option value="3">MF argentique</option>
                                    <option value="4">MF numérique</option>
                                    <option value="5">PF argentique</option>
                                    <option value="6">PF numérique</option>
                                    <option value="7">Son</option>
                                    <option value="8">Vidéo</option>
                                </select>
                                <br>
                                <label>Nom du lot</label>
                                <input class="form-control" name="nom_lot" placeholder="Entrer un nom" value="<?=$Lot->nom_lot?>">
                                <br>
                                <label>Observations</label>

                                <textarea class="form-control" rows="3" name="lot_obs"></textarea>

                                <br>
                                <label>Accessoires</label>

                                <textarea class="form-control" rows="3" name="lot_acc"></textarea>


                            </div>




                            <input type="hidden" name="id_lot" value="753">
                            <button type="submit" class="btn btn-primary legitRipple" name="action" id="submit_btn"
                                value="modifier">Mettre à jour</button>
                        </form>

                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->


            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Composition du lot
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Bootstrap CSS -->

                        <link rel="stylesheet" type="text/css" href="assets/css/multi-select.css">

                        <!-- jQuery -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
                        <!-- Bootstrap JavaScript -->
                        <script
                            src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js">
                        </script>
                        <script src="assets/js/jquery.multi-select.js"></script>
                        <script src="assets/js/jquery.quicksearch.js" type="text/javascript"></script>
                        <script type="text/javascript">
                        // run callbacks
                        $('#callbacks').multiSelect({
                            afterSelect: function(values) {
                                alert("Select value: " + values);
                            },
                            afterDeselect: function(values) {
                                alert("Deselect value: " + values);
                            }
                        });


                        $('.searchable').multiSelect({
                            selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='Rechercher'>",
                            selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='Rechercher'>",
                            afterInit: function(ms) {
                                var that = this,
                                    $selectableSearch = that.$selectableUl.prev(),
                                    $selectionSearch = that.$selectionUl.prev(),
                                    selectableSearchString = '#' + that.$container.attr('id') +
                                    ' .ms-elem-selectable:not(.ms-selected)',
                                    selectionSearchString = '#' + that.$container.attr('id') +
                                    ' .ms-elem-selection.ms-selected';

                                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                                    .on('keydown', function(e) {
                                        if (e.which === 40) {
                                            that.$selectableUl.focus();
                                            return false;
                                        }
                                    });

                                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                                    .on('keydown', function(e) {
                                        if (e.which == 40) {
                                            that.$selectionUl.focus();
                                            return false;
                                        }
                                    });
                            },
                            afterSelect: function() {
                                this.qs1.cache();
                                this.qs2.cache();
                            },
                            afterDeselect: function() {
                                this.qs1.cache();
                                this.qs2.cache();
                            },
                            afterSelect: function(values) {
                                // alert("Select value gauche: "+values);
                                var num_lot = 753;
                                var data = 'id_materiel=' + values + '&id_lot=' + num_lot;
                                //alert(data);
                                $.ajax({
                                    type: "POST",
                                    url: "ajax_ajout_lot.php",
                                    datatype: "html",
                                    data: data,

                                    success: function(data) {
                                        $.notify({
                                            message: 'AJOUT realisé avec succès'
                                        }, {
                                            type: 'success'
                                        });
                                    }
                                });

                                return false;
                            },

                            afterDeselect: function(values) {
                                var num_lot = 753;
                                var data = 'id_materiel=' + values + '&id_lot=' + num_lot;
                                //alert(data);
                                $.ajax({
                                    type: "POST",
                                    url: "ajax_delete_lot.php",
                                    datatype: "html",
                                    data: data,

                                    success: function(data) {
                                        $.notify({
                                            message: 'SUPPRESSION realisée avec succès'
                                        }, {
                                            type: 'success'
                                        });
                                    }
                                });

                                return false;
                            }



                        });
                        </script>


                        <br>

                    </div>




                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->


            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>