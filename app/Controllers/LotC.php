<?php

class LotC extends Controller{


    public function getEmprunts($id_lot){
        $emprunts = Emprunt::where('id_lot', $id_lot)->get();

        $data = array();

        foreach($emprunts as $emprunt){

            $data[] = array(
                "id_emprunt" => $emprunt->id_emprunt,
                "lot" => $emprunt->id_lot,
                "data_debut" => $emprunt->date_debut,
                "date_fin" => $emprunt->date_fin,
                "statu" => Lot::isLate($id_lot)    
            );
        }

        $response = array(
            "recordsTotal" => count($data),
            "recordsFiltered" => count($data),
            "data" => $data
        );
        echo json_encode($response);
    }


    public function creation_lot(){
       
            echo $this->view('Template/inc.NavTS', ['title'=>'Reservatxxion','bigTitle'=>"Reservation"]).
            $this->view('creation_lot_0').
            $this->view('Template/inc.Footer');
        
    }

    function isNumber($s){
        for($i=0; $i<strlen($s); $i++){
            if($s[$i] < '0' || $s[$i] > '9')
                return false;
        }
        return true;
    }
    public function create_lot($name_of_new_lot){
        if($this->isNumber($name_of_new_lot)){
            //echo "Le nom du lot ne peut pas être un nombre";
            echo "notsuccess";
            return;
        }

        if(Lot::where('nom_lot', $name_of_new_lot)->first() != null){
            //echo "Le nom du lot existe déjà";
            $lot = Lot::where('nom_lot', $name_of_new_lot)->first();
            //change the uri to the lot
            echo $lot->id_lot;
            return;
        }


        $lot = new Lot();
        $lot->nom_lot = $name_of_new_lot;
        $lot->save();
        $lot = Lot::where('nom_lot', $name_of_new_lot)->first();
        echo $lot->id_lot;
        return;
    }
    public function consulter_lot($id_lot){

        $lot = Lot::where('id_lot', $id_lot)->first();

        $this->view('Template/inc.NavTS', ['title'=>'Reservatxxion','bigTitle'=>"Reservation"]).
        $this->view('creation_lot_1', ['Lot'=>$lot]).
        $this->view('Template/inc.Footer');
    }
}