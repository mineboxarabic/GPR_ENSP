<?php 

use Illuminate\Database\Eloquent\Model as Eloquent;

class Lot extends Eloquent
{
    protected $id_lot;
    protected $nom_lot;
    protected $lot_obs;
    protected $lot_acc;
    protected $degat;
    protected $manquant;
    protected $lot_cat;
    protected $dispo;
    protected $num_projet;

    protected $table = 'lot';

    public $timestamps  = false;
    
    public function __construct()
    {
        parent::__construct();
    }

    public static function isLotExist($id_lot){
        $lot = Lot::where('id_lot', $id_lot)->first();
        if($lot != null)
            return true;
        else
            return false;
    }



}