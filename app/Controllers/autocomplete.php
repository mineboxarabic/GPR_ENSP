<?php 

class autocomplete extends Controller{
    public function getData($keyword=''){
        $user = User::where('first_name', 'like', '%'.$keyword.'%')->orWhere('last_name', 'like', '%'.$keyword.'%')->get();
        echo '<ul class="list-group">';
        foreach($user as $user){

            //$sympole = (!$user->isFilesExist()) ? '<i class="zmdi zmdi-close-circle-o zmdi-hc-lg" style="color:#ea6153;"> </i>' : '<i class="zmdi zmdi-check zmdi-hc-lg" style="color:#40d47e;"></i>';

            //if the user is not late and the files exist
            if(User::isLate($user->id) == false && User::isFilesExist($user->id) == true){
                $sympole = '<i class="zmdi zmdi-check zmdi-hc-lg" style="color:#40d47e;"></i>';
            }else{
                $sympole = '<i class="zmdi zmdi-close-circle-o zmdi-hc-lg" style="color:#ea6153;"> </i>';
            }
            echo '<li class="list-group-item"><a href="'.$_SESSION['__DIR__'].'userFile/'.$user->id.'">'.$user->first_name.' '.$user->last_name.''.$sympole.'</a></li>';

        }
        echo '</ul>';
    }

    public function emprunts($keyword=''){
        $materiels = Materiel::where('designation', 'like', '%'.$keyword.'%')->where('num_lot', '=', '0')->get();
        echo '<ul class="list-group">';
        foreach($materiels as $materiel){

            //$sympole = (!$user->isFilesExist()) ? '<i class="zmdi zmdi-close-circle-o zmdi-hc-lg" style="color:#ea6153;"> </i>' : '<i class="zmdi zmdi-check zmdi-hc-lg" style="color:#40d47e;"></i>';

            //if the user is not late and the files exist
            if(Materiel::isDisponible($materiel->id_materiel) == true && !Materiel::isMaterialInLot($materiel->id_materiel)){
                $sympole = '<i class="zmdi zmdi-check zmdi-hc-lg" style="color:#40d47e;"></i>';
            }else{
                $sympole = '<i class="zmdi zmdi-close-circle-o zmdi-hc-lg" style="color:#ea6153;"> </i>';
            }
            echo '<li class="list-group-item"><a href="'.$_SESSION['__DIR__'].'MatFile/'.$materiel->id_materiel.'">'.'#'.$materiel->id_materiel.' '.$materiel->designation.' '.$sympole.'  <span class="glyphicon glyphicon-tags " style="color:#2e8ece;"> </span>'.'</a></li>';

        }
        echo '</ul>';
    }
    public function empruntsLot($keyword=''){
        //set a 10 elements limit
        $materiels = Materiel::where('designation', 'like', '%'.$keyword.'%')->where('num_lot', '!=', '0')->get();
        echo '<ul class="list-group">';
        foreach($materiels as $materiel){

            //$sympole = (!$user->isFilesExist()) ? '<i class="zmdi zmdi-close-circle-o zmdi-hc-lg" style="color:#ea6153;"> </i>' : '<i class="zmdi zmdi-check zmdi-hc-lg" style="color:#40d47e;"></i>';

            //if the user is not late and the files exist
            if(Materiel::isDisponibleNoLot($materiel->id_materiel) == true && Materiel::isMaterialInLot($materiel->id_materiel))
            {
                $sympole = '<i class="zmdi zmdi-check zmdi-hc-lg" style="color:#40d47e;"></i>';
            }else
            {
                $sympole = '<i class="zmdi zmdi-close-circle-o zmdi-hc-lg" style="color:#ea6153;"> </i>';
            }
            echo '<li class="list-group-item"><a href="'.$_SESSION['__DIR__'].'MatFile/'.$materiel->id_materiel.'">'.'#'.$materiel->id_materiel.' '.$materiel->designation.' '.$sympole.'  <span class="glyphicon glyphicon-tags " style="color:#2e8ece;"> </span>'.'</a></li>';

        }
        echo '</ul>';
    }
}