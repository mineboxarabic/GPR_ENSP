<?php

class UserC extends Controller
{
    public function index($name='') {
        $data = [
            'title' => 'Home',
            'bigTitle'=>"Home",
        ];
        $this->view('Template/inc.NavTS', $data).
        $this->view('Home').
        $this->view('Template/inc.Footer');
    }

    public function showProfile($userId=0){


        $user = User::where('id', $userId)->first();
            //TODO: Add a page here to indicate an error if the user was not found or just make the check before you come to here.
            $_SESSION['current_user'] = $userId;
            if(isset($_GET['num_etudiant'])){
                $userID= $_GET['num_etudiant'];
    
                $user = User::where('id', $userID)->first();
                $data = [
                    'title' => 'Profile',
                    'bigTitle'=>'Profile',
                    'user' => $user,
                ];
    
                echo $this->view('Template/inc.NavTS', ['title'=>'Fiche utilisateur', 'bigTitle'=>"Fiche utilisateur"]).
                $this->view('userFile',$data).
                $this->view('Template/inc.Footer');
            }else{
                $user = User::where('id', $userId)->first();
                $data = [
                    'title' => 'Profile',
                    'bigTitle'=>"Profile",
                    'user' => $user,
                ];
        
                echo $this->view('Template/inc.NavTS', ['title'=>'Fiche utilisateur','bigTitle'=>"Fiche utilisateur"]).
                $this->view('userFile',$data).
                $this->view('Template/inc.Footer');
            }


        
        
    }

    public function sendEmail(){
        //TODO:Create this function to send an email to the user.
        //send and email to the user

        /*
        $to = "mineboxarabic@gmail.com";
        $subject = "Confirmation d'inscription";
        $message = "Bonjour, vous avez été inscrit sur le site de la bibliothèque de l'ENSAE. Veuillez vous connecter pour accéder à votre compte.";
        $headers = "From:mineboxarabic@gmail.com";

        mail($to,$subject,$message,$headers);
        */

    }

    public function getEmprunts($id_user){
        $Emprunts = Emprunt::where('id_user',$id_user)->where('id_lot', 0)->get();
        //#	Materiel	empruntéLe	àRendreLe Statut
        //return data for DataTables
        $data = array();

        


        foreach ($Emprunts as $Emprunt) {

            $retard = $Emprunt->date_retour < date('Y-m-d') ? 1 : 0;
            $data[] = array(
                "id_emprunt" => $Emprunt->id_emprunt,
                "id_mat"=>$Emprunt->id_materiel,
                "date_debut"=>$Emprunt->date_debut,
                "date_retour"=>$Emprunt->date_retour,
                "statut"=>$retard,
            );
        }

        $output = array(
            "data" => $data,
        );        

        echo json_encode($output);

    }

    public function getReservations($id_user){
        $reservations = Reservation::where('id_user', $id_user)->where('lot', 0)->get();
        //#	Materiel	empruntéLe	àRendreLe Statut
        //return data for DataTables
        $data = array();

        foreach($reservations as $reservation){
            $materiel = Materiel::where('id_materiel', $reservation->id_materiel)->first();
            if($materiel){
                $data[] = array(
                    "id_reservation" => $reservation->id_reservation,
                    "materiel" => $materiel->nom_materiel,
                    "data_debut" => $reservation->date_debut,
                    "date_fin" => $reservation->date_retour,
                    "command" => 1
                );
            }
        }

        $output = array(
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function getLots($id_user){
        $emprunts = Emprunt::where('id_user', $id_user)->get();
        //#	Materiel	empruntéLe	àRendreLe Statut
        //return data for DataTables
        $data = array();

        foreach($emprunts as $emprunt){
            $Lot = Lot::where('id_lot', $emprunt->id_lot)->first();
            if($Lot){
                $data[] = array(
                    "id_emprunt" => $Lot->id_lot,
                    "lot" => $Lot->nom_lot,
                    "data_debut" => $emprunt->date_debut,
                    "date_fin" => $emprunt->date_retour,
                    "statu" => Emprunt::isLateLot($id_user, $Lot->id_lot)
                );
                    
            }
        }

        $output = array(
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function getReservationLots($id_user){
        $reservations = Reservation::where('id_user', $id_user)->get();
        //#	Materiel	empruntéLe	àRendreLe Statut
        //return data for DataTables
        $data = array();

        foreach($reservations as $reservation){
            $Lot = Lot::where('id_lot', $reservation->id_lot)->first();
            if($Lot){
                $data[] = array(
                    "id_reservation" => $reservation->id_reservation,
                    "lotx" => $Lot->nom_lot,
                    "data_debut" => $reservation->date_debut,
                    "date_fin" => $reservation->date_retour,
                    "commande" => 1
                );
                    
            }
        }

        $output = array(
            "data" => $data,
        );

        echo json_encode($output);
    }
}