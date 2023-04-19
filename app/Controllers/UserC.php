<?php

class UserC extends Controller
{
    public function index($name='') {
        $data = [
            'title' => 'Home',
        ];
        $this->view('Template/inc.NavTS', $data).
        $this->view('Home').
        $this->view('Template/inc.Footer');
    }

    public function showProfile($userId=0){


        $user = User::where('id', $userId)->first();
            //TODO: Add a page here to indicate an error if the user was not found or just make the check before you come to here.
        
            if(isset($_GET['num_etudiant'])){
                $userID= $_GET['num_etudiant'];
    
                $user = User::where('id', $userID)->first();
                $data = [
                    'title' => 'Profile',
                    'user' => $user,
                ];
    
                echo $this->view('Template/inc.NavTS', ['title'=>'Fiche utilisateur']).
                $this->view('userFile',$data).
                $this->view('Template/inc.Footer');
            }else{
                $user = User::where('id', $userId)->first();
                $data = [
                    'title' => 'Profile',
                    'user' => $user,
                ];
        
                echo $this->view('Template/inc.NavTS', ['title'=>'Fiche utilisateur']).
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
}