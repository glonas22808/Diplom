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

    //Купленны билеты
    public function checkthebilet(object $request) : object{
        $SeanceId = $request->get('seance');
        $ticket = DB::table('seance_zal')
            ->where('status_place' , '=', '1')
            ->where('Seance_id' , '=' , $SeanceId)
            ->get();
        return $ticket;
    }
}
