<?php

class MaterielC extends Controller
{
    public function showMaterielDetails($id_mat){
        $materiel = Materiel::where('id_materiel', $id_mat)->first();
        $data = [
            'title' => '<h1>Materiel Details</h1>',
            'Mat' => $materiel,
        ];
        $etat = $materiel->etat == '' || $materiel->etat == ' '  ?  '--' : $materiel->etat;
        $dataNav =[
            'title' => 'Fiche materiel:#' .$id_mat.' - '. $materiel->designation . ' <span class="label label-primary">Etat : '.$etat.'</span> <button class="btn btn-warning btn-sm legitRipple" name="etat" type="button" id="mettre-hors-service-btn">Materiel Hors service</button>',
            'bigTitle'=>'Fiche materiel'
        ];
        echo $this->view('Template/inc.NavTS', $dataNav).
        $this->view('MatFile',$data).
        $this->view('Template/inc.Footer');
    }

    public function metHorsService($id_mat){
        //TODO:make the materiel unavailable not only with the dispo (Look for the another attributes to change);
        $mat = Materiel::where('id_materiel', $id_mat)->update(['dispo' => 0]);
    }

    public function getEmprunts($id_mat){
        $emprunts = Emprunt::where('id_materiel', $id_mat)->get();
        $data = array();


        foreach($emprunts as $emprunt){
            $user = User::where('id', $emprunt->id_user)->first();
            $isLate = $emprunt->date_retour < date('Y-m-d') ? 1 : 0;
            $data[] = array(
                "id_emprunt" => $emprunt->id_emprunt,
                "User" => $user->first_name . ' '. $user->last_name,
                "date_debut" => $emprunt->date_debut,
                "date_retour" => $emprunt->date_retour,
                "statut" => $isLate,
            );


        }
            $response = array(
                "recordsTotal" => count($data),
                "recordsFiltered" => count($data),
                "data" => $data
            );
            echo json_encode($response);
        
    }

    public function getReservations($id_mat){
        $reservations = Reservation::where('id_materiel', $id_mat)->get();
        $data = array();


        foreach($reservations as $reservation){
            $user = User::where('id', $reservation->id_user)->first();
            $username = 'Inconnu';
            if($user){
                $username = $user->first_name . ' '. $user->last_name;
            }
            $data[] = array(
                "id_reservation" => $reservation->id_reservation,
                "User" => $username,
                "date_debut" => $reservation->date_debut,
                "date_fin" => $reservation->date_retour,
            );


        }
            $response = array(
                "recordsTotal" => count($data),
                "recordsFiltered" => count($data),
                "data" => $data
            );
            echo json_encode($response);
    }
}