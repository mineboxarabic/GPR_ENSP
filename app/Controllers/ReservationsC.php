<?php 

class ReservationsC extends Controller
{
    public function getTodayRes(){
                //{"id_reservation":2773,"id_materiel":0,"lot":1,"id_lot":725,"id_user":29,"date_debut":"2021-04-09","date_retour":"2021-04-16"}
                // id_reservation Materiel Utilisateur debut fin
                
        $reservations = Reservation::getTodayReservations();
        $data = array();

        foreach($reservations as $reservation){
            if($reservation->lot == 0){

                
                $Materiel = Materiel::where('id_materiel', $reservation->id_materiel)->first();
                $Materiel = $Materiel ? $Materiel->designation : "Materiel non trouvé" ;
                $Utilisateur = User::where('id', $reservation->id_user)->first();
                $Utilisateur = $Utilisateur ? $Utilisateur->name : "Utilisateur non trouvé" ;

                $data[] = array(
                    "id_reservation" => $reservation->id_reservation,
                    "Materiel" => $Materiel,
                    "Utilisateur" => $Utilisateur,
                    "debut" => $reservation->date_debut,
                    "fin" => $reservation->date_retour
                    ,
                    "commande"=> 1
                );
            }
        }




        $response = array(
            "data" => $data,
            "status" => "success"
        );
        
        echo json_encode($response);
    }


    public function getReservationsByUser($id_user){
        $reservations = Reservation::where('id_user', $id_user)->get();
        $data = array();

        foreach($reservations as $reservation){
            $Materiel = Materiel::where('id_materiel', $reservation->id_materiel)->first();
            $Materiel = $Materiel ? $Materiel->designation : "Materiel non trouvé" ;
            $Utilisateur = User::where('id', $reservation->id_user)->first();
            $Utilisateur = $Utilisateur ? $Utilisateur->name : "Utilisateur non trouvé" ;

            $data[] = array(
                "id_reservation" => $reservation->id_reservation,
                "Materiel" => $Materiel,
                "Utilisateur" => $Utilisateur,
                "debut" => $reservation->date_debut,
                "fin" => $reservation->date_retour
            );
        }

        $response = array(
            "data" => $data,
            "status" => "success"
        );

        echo json_encode($response);
    }


    public function getTodayResLot(){
                    //{"id_reservation":2773,"id_materiel":0,"lot":1,"id_lot":725,"id_user":29,"date_debut":"2021-04-09","date_retour":"2021-04-16"}
                // id_reservation Materiel Utilisateur debut fin
                
                $reservations = Reservation::getTodayReservations();
                $data = array();
        
                foreach($reservations as $reservation){
                    if($reservation->lot != 0){
                        $Materiel = Materiel::where('id_materiel', $reservation->id_materiel)->first();
                        $Materiel = $Materiel ? $Materiel->designation : "Materiel non trouvé" ;
                        $Utilisateur = User::where('id', $reservation->id_user)->first();
                        $Utilisateur = $Utilisateur ? $Utilisateur->name : "Utilisateur non trouvé" ;
                        $lot = Lot::where('id_lot', $reservation->id_lot)->first();
                        $data[] = array(
                            "id_reservation" => $reservation->id_reservation,
                            "Lot" => $lot ? $lot->nom_lot : 'Lot non trouvé',
                            "Utilisateur" => $Utilisateur,
                            "debut" => $reservation->date_debut,
                            "fin" => $reservation->date_retour
                            ,
                            "commande"=> 1
                        );
                    }
            
            
            
                }
                $response = array(
                    "data" => $data,
                    "status" => "success"
                );
                
                echo json_encode($response);
                    
                    
    }
}