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
}