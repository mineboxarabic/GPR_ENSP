
<link rel="stylesheet" href="/GPR_ENSP/public/assets/css/costomCss/Home.css">


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
               
                    <div class="col-md-10">
                        <div class="list-group">
                            <input class="form-control" id="num_materiel" name="num_materiel" placeholder="Scanner le code barre de l'article">

                        </div>
                    </div>
                    <!-- /.list-group -->
                    <div class="col-md-2"> <input type="button" class="btn btn-success btn-block legitRipple" id='btn-emprunt-materiele' value="Valider"></div>
                <br>
                <div class="col-md-6">
                    <div class="input_container">
                        <input type="text" class="form-control" id="stage_id"
                            placeholder="Chercher les materiels par mots clés" id="motCleInput"
                            autocomplete="off">
                        <ul id="stage_list_id"></ul>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="input_container">
                        <input type="text" class="form-control" id="stage_id_lot"
                            placeholder="Chercher les lots par mots clés" 
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


<script defer type="module">
        function isNumber(s) {
    return !isNaN(parseFloat(s)) && isFinite(s);
    }
/* #region //_Ajax conetion to add a new "emprunt" */
        $('#btn-emprunt-materiele').on('click', function () 
        {
            let input = document.querySelector('#num_materiel');
            let inputValue = input.value;
            console.log(inputValue);
            
            if(isNumber(inputValue)){
                let num = parseInt(inputValue);
                
                $.ajax({
                    url: "<?=$_SESSION['__DIR__'].'MatFile';?>/" + num,
                    method: "post",

                    success: function (data) {
                        console.log(data);
                        if(data == 'Materiel not found'){
                            $.notify("Le materiel n'existe pas", {
                                className: "danger",
                                type:'danger'
                            });
                        }else{
                            $.notify("Le materiel a été ajouté", {
                                className: "success",
                                type:'success'
                            });
                            window.location.href = "<?=$_SESSION['__DIR__'].'MatFile';?>/" + num;
                            
                        }
                        input.value = '';
                        
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



$('#stage_id').keyup(function () {
    let input = document.querySelector('#stage_id');
    let inputValue = input.value;
    if (inputValue.length > 0) {
        $.ajax({
            url: "<?=$_SESSION['__DIR__'].'autocomplete/emprunts';?>/" + inputValue,
            method: "post",
            success: function (data) {
                $('#stage_list_id').fadeIn();
                $('#stage_list_id').html(data);
            }
        });
    } else {
        $('#stage_list_id').fadeOut();
        $('#stage_list_id').html("");
    }

});

$('#stage_id_lot').keyup(function () {
    let input = document.querySelector('#stage_id_lot');
    let inputValue = input.value;
    if (inputValue.length > 0) {
        $.ajax({
        url: "<?=$_SESSION['__DIR__'].'autocomplete/empruntsLot';?>/" + inputValue,
            method: "post",
            success: function (data) {
                $('#stage_list_id_lot').fadeIn();
                $('#stage_list_id_lot').html(data);
            }
        });
    } else {
        $('#stage_list_id_lot').fadeOut();
        $('#stage_list_id_lot').html("");
    }

});

</script>