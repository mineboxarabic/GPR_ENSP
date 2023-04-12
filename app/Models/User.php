<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
class User  extends Eloquent
{
    protected $id;
    protected $last_name;

    protected $first_name;
    protected $fonction;
    protected $ine;
    protected $erasmus;
    protected $member_password;
    protected $member_admin;
    protected $member_forgot;
    protected $member_redirect;
    protected $member_status;

    protected $passwort;
    protected $rang;
    protected $an;
    protected $ss;
    protected $mutuelle;
    protected $boursier;
    protected $paiementScolarite;
    protected $paiementSecu;
    protected $paiementCesure;
    protected $vads_trans_id;
    protected $date_naissance;
    protected $lieu_naissance;
    protected $adresse;
    protected $telephone;
    protected $portable;
    protected $email;
    protected $email_perso;
    protected $actif;
    protected $ville;
    protected $cp;
    protected $url;
    protected $url_activ;
    protected $register_date;
    protected $num_etudiant;
    protected $lien_conv;
    protected $lien_attest;
    protected $conv;
    protected $attest;
    protected $adminScolarite;
    protected $adminGPR;
    protected $adminGIP;
    protected $adminGestion;
    protected $num_projet;
    protected $avertissement;
    protected $retard;
    protected $bloque;
    protected $message_bloque;
    protected $envoie_mail;
    protected $observation;
    protected $oauth_provider;
    protected $oauth_uid;
    protected $picture;
    protected $created;
    protected $modified;
    protected $vote_crpve_tech;
    protected $vote_ca_ens;
    protected $vote_ca_etu;
    protected $vote_crpve_ens;
    protected $vote_crpve_etu;
    protected $numeria_matricule;
    protected $numeria_code;

    protected $table = 'membres';


    public function __construct()
    {
        parent::__construct();
    }

    public function getById($id){
        return $this->where('id', $id)->first();
    }
}