<?php


class EmpruntC extends Controller
{
    public function addEmpruntMateriel($idUser, $num_material)
    {
        //if(isset($_GET['num_materiel']))
        //    $num_material = $_GET['num_materiel'];
        if (Materiel::isMaterialExist($num_material) == false) {
            http_response_code(400);
            die("Le matériel n'existe pas");

        }
        $materiel = Materiel::where('id_materiel', $num_material)->first();


        //1- Check if the user is not already borrowing the material
        //if(Materiel::isMaterialBorrowed($num_material) == false)
        //    die("Le matériel est déjà emprunté");
        //2- Check if the material is not already borrowed
        //3- Check if the material is not already reserved
        if (Materiel::isMaterialReserved($num_material) == false) {
            http_response_code(400);
            die("Le matériel est déjà réservé");
        }
        if (Materiel::isMaterialInLot($num_material) == false) {
            http_response_code(400);
            die("Le matériel est déjà dans un lot");
        }

        //4- Check if the material is not already in the corbeille
        if ($materiel->corbeille == 1) {
            http_response_code(400);
            die("Le matériel est dans la corbeille");

        }



        $emprunt = new Emprunt();
        $emprunt->id_user = $idUser;
        $emprunt->id_materiel = $num_material;
        $emprunt->date_debut = date('Y-m-d');
        $emprunt->date_retour = date('Y-m-d', strtotime('+1 week'));
        $emprunt->lot = $materiel->num_lot;
        $emprunt->id_lot = 0;
        $emprunt->observation = "";
        $emprunt->emprunteur = "";
        $emprunt->emprunteur_retour = "";

        $emprunt->save();


        //update the material
        $user = User::where('id', $idUser)->first();
        $user = $user ? $user->first_name : "Inconnu";
        Materiel::where('id_materiel', $num_material)->update([
            'pret' => 1
            ,
            'dispo' => 0,
            'dispo_pret' => 1,
            'modif_user' => $user,
            //TODO:edit the user attribute in the material table

        ]);
        //TODO: Add the added emprunt into the history table
    }

    public function removeEmpruntMateriel($idMat)
    {
        if (Materiel::isMaterialExist($idMat) == false) {
            http_response_code(400);
            die("Le matériel n'existe pas");

        }

        Emprunt::where('id_materiel', $idMat)->delete();

        Materiel::where('id_materiel', $idMat)->update([
            'pret' => 0
            ,
            'dispo' => 1,
            'dispo_pret' => 0,
            'modif_user' => '',
            //TODO:edit the user attribute in the material table

        ]);

        //TODO: Change the History of the emprunt to e returned
        //go back to the previous page
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


    public function Emprunts(){

        echo $this->view('Template/inc.NavTS', ['title'=>'Fiche utilisateur','bigTitle'=>"Fiche utilisateur"]).
        $this->view('Template/inc.navFunc').
        $this->view('Emprunts').
        $this->view('Template/inc.Footer');    
    }

    

}