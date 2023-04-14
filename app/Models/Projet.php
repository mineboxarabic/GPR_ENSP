<?php 

/*
CREATE TABLE `projet` (
  `id_projet` int(255) NOT NULL,
  `nom_projet` varchar(255) NOT NULL,
  `id_representant` int(255) NOT NULL,
  `description_projet` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_retour` date NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1; */
use Illuminate\Database\Eloquent\Model as Eloquent;

class Projet extends Eloquent
{
    protected $id_projet;
    protected $nom_projet;
    protected $id_representant;
    protected $description_projet;
    protected $date_debut;
    protected $date_retour;
    protected $state;

    protected $table = 'projet';

    
    public function __construct()
    {
        parent::__construct();
    }
}