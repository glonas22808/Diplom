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
    public function checkthebilet(object $request) : object{
        $row = $request->get('place');
        $spot = $request->get('spot');
        $status = $request->get('status');
        $place =DB::table('place')
            ->where('zal_id' , '=' , '0' )
            ->Where('row' , '=' , $row)
            ->Where('spot' , '=' , $spot);
        $ticket = DB::table('seance_zal')
            ->where('status_place' , '=', $status);

    }
}
