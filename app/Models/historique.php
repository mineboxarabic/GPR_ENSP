<?php 

/**
 CREATE TABLE `historique` (
  `id_histo` int(255) NOT NULL,
  `id_emprunt` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_mat` int(255) NOT NULL,
  `lot` tinyint(1) NOT NULL,
  `id_lot` int(255) NOT NULL,
  `date_emprunt` datetime NOT NULL,
  `date_retour` datetime NOT NULL,
  `rendu` int(11) NOT NULL DEFAULT '0',
  `emprunteur` varchar(255) NOT NULL,
  `emprunteur_retour` varchar(255) NOT NULL,
  `num_projet` int(11) DEFAULT NULL,
  `id_projet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 */
use Illuminate\Database\Eloquent\Model as Eloquent;

class Historique extends Eloquent
{
    protected $id_histo;
    protected $id_emprunt;
    protected $id_user;
    protected $id_mat;
    protected $lot;
    protected $id_lot;
    protected $date_emprunt;
    protected $date_retour;
    protected $rendu;
    protected $emprunteur;
    protected $emprunteur_retour;
    protected $num_projet;
    protected $id_projet;

    protected $table = 'historique';

    
    public function __construct()
    {
        parent::__construct();
    }
}