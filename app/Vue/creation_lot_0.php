<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Informations générales 
                      </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                               <form method="POST" name="myForm" onsubmit="return validateForm()">

                                    <div class="form-group">
                                        <label>Nom du lot</label>
                                        <input class="form-control" id="nom_lot" placeholder="Entrer un nom" value="">
                                    </div>
                                    <button type="button" class="btn btn-primary legitRipple" name="action" id="submit_btn" value="modifier">Enregistrer</button>
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

        <script defer type="module">

            $('#submit_btn').on('click', function(){
                let input =document.querySelector('#nom_lot');
            let inputValue = input.value;
                $.ajax({
                    url : '<?= $_SESSION["__DIR__"].'LotC/create_lot/'?>' + inputValue,
                    type : 'POST',
                    success : function(data){
                        console.log(data);
                        
                        if(data == 'notsuccess'){
                            $.notify(
                                {
                                    message: 'Erreur lors de la création du lot'
                                },
                                {
                                    type: 'danger',
                                    delay: 1000,
                                    timer: 1000,
                                    placement: {
                                        from: "top",
                                        align: "center"
                                    }
                                }
                            )
                        }
                        else{
                            $.notify(
                                {
                                    message: 'Lot créé avec succès'
                                },
                                {
                                    type: 'success',
                                    delay: 1000,
                                    timer: 1000,
                                    placement: {
                                        from: "top",
                                        align: "center"
                                    }
                                }
                            )
                            window.location.href = '<?= $_SESSION["__DIR__"].'LotC/consulter_lot/'?>' + data;
                        }
                    }
                })
            })
        </script>