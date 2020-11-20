<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PlaceModel extends Model
{
    protected $table = 'place';
    protected $fillable = [
        'zal_id ',
        'row',
        'spot'
    ];
    public function CheckPlace(object $request) : object{
        $row = $request->get('place');
        $spot = $request->get('spot');
    $place =DB::table('place')
        ->where('zal_id' , '=' , '0' )
        ->Where('row' , '=' , $row)
        ->Where('spot' , '=' , $spot)
        ->get();
    return $place;
    }
    public function ShowPlace(object $request) : object{ //Для разметки зала на стороне клиента
        $zal_id = $request->get('zal');
        $place =DB::table('place')
            ->where('zal_id', '=',$zal_id)
            ->get();
        return $place;
    }
}
