<?php


class EmpruntC extends Controller
{
    public function addEmpruntMateriel($idUser){
        if(isset($_GET['num_materiel']))
            $num_material = $_GET['num_materiel'];
        if(Materiel::isMaterialExist($num_material) == false)
            die("Le matériel n'existe pas");
        $materiel = Materiel::where('id_materiel', $num_material)->first();
        //TODO: add Emprunt to the database

        //Conditions to check:
        //1- Check if the user is not already borrowing the material
        //2- Check if the material is not already borrowed
        //3- Check if the material is not already reserved
        //4- Check if the material is not already in the corbeille
        //5- Check if the material is not already in the stock
        
        //1- Check if the user is not already borrowing the material
        if(Materiel::isMaterialBorrowed($num_material) == true)
            die("Le matériel est déjà emprunté");
        //2- Check if the material is not already borrowed
        //3- Check if the material is not already reserved
        if(Materiel::isMaterialReserved($num_material) == true)
            die("Le matériel est déjà réservé");



        $emprunt = new Emprunt();
        $emprunt->id_user = $idUser;
        $emprunt->id_materiel = $num_material;
        $emprunt->date_debut = date('Y-m-d');
        $emprunt->date_retour = date('Y-m-d', strtotime('+1 week'));
        $emprunt->lot = $materiel->num_lot;
        $emprunt->id_lot = 0;
        $emprunt->save();
        //go back to the previous page
        //header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}