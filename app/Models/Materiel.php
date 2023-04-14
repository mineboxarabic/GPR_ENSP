<?php 


use Illuminate\Database\Eloquent\Model as Eloquent;

class Materiel extends Eloquent
{
    protected $id_materiel;
    protected $propriete;
    protected $categorie;
    protected $designation;
    protected $marque;
    protected $modele;
    protected $observation;
    protected $num_serie;
    protected $num_inventaire;
    protected $fournisseur;
    protected $date_achat;
    protected $prix_achat;
    protected $etat;
    protected $pret;
    protected $dispo;
    protected $num_lot;
    protected $nbr_jour;
    protected $type_1;
    protected $lieu;
    protected $os_1;
    protected $version_1;
    protected $user;
    protected $fabricant_1;
    protected $creation;
    protected $creat_user;
    protected $modification;
    protected $modif_user;
    protected $num_projet;
    protected $dispo_pret;
    protected $corbeille;

    protected $table = 'materiel';

    
    public function __construct()
    {
        parent::__construct();
    }
}