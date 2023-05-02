<?php 

/*
CREATE TABLE `emprunt` (
  `id_emprunt` int(255) NOT NULL,
  `id_materiel` int(255) NOT NULL,
  `lot` tinyint(1) NOT NULL,
  `id_lot` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_retour` datetime NOT NULL,
  `observation` text NOT NULL,
  `emprunteur` varchar(255) NOT NULL,
  `emprunteur_retour` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1; */
use Illuminate\Database\Eloquent\Model as Eloquent;

class Emprunt extends Eloquent
{
    protected $id_emprunt;
    protected $id_materiel;
    protected $lot;
    protected $id_lot;
    protected $id_user;
    protected $date_debut;
    protected $date_retour;
    protected $observation;
    protected $emprunteur;
    protected $emprunteur_retour;

    protected $table = 'emprunt';
    public $timestamps = false;
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getEmprunt($id)
    {
        $emprunt = Emprunt::where('id_emprunt', $id)->first();
        return $emprunt;
    }
    public function getEmpruntsByUser($userId){
        $emprunts = Emprunt::where('id_user', $userId)->get();
        return $emprunts;
    }

    public static function isLate($idUser,$idMat){
        $emprunt = Emprunt::where('id_user', $idUser)->where('id_materiel', $idMat)->where('date_retour', '<', date('Y-m-d H:i:s'))->first();
        if($emprunt){
            return true;
        }else{
            return false;
        }
    }

    public static function isLateLot($idUser, $idLot){
        $emprunt = Emprunt::where('id_user', $idUser)->where('id_lot', $idLot)->where('date_retour', '<', date('Y-m-d H:i:s'))->first();
        if($emprunt){
            return true;
        }else{
            return false;
        }
    }
}