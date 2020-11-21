<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TicketModel extends Model
{
    protected $table = 'seance_zal';
    protected $fillable = [
        'zal_id ',
        'seance_id ',
        ' place_id ',
        'status_place ',
        'film_id',
        'cost'
    ];
    public function checkthebilet(object $request) : object{ //Купленны билеты
        $place_id = $request->get('place_id');
        $Seance_id = $request->get('Seance_id');
        $ticket = DB::table('seance_zal')
            ->where('status_place' , '=', '1')
            ->where('place_id' , '=' , $place_id)
            ->where('Seance_id' , '=' , $Seance_id)
            ->get();
        return $ticket;
    }
}
