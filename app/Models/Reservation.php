<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class Reservation extends Eloquent
{
    protected $id_reservation;
    protected $id_materiel;
    protected $lot;
    protected $id_lot;
    protected $id_user;
    protected $date_debut;
    protected $date_retour;


    protected $table = 'reservations';

    
    public function __construct()
    {
        parent::__construct();
    }

    public function getReservation($id)
    {
        $reservation = Reservation::where('id_reservation', $id)->first();
        return $reservation;
    }


}