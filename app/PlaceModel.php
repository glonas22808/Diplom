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

    //Для разметки зала на стороне клиента
    public function ShowPlaceSit(object $request) : object{
        $zalId = $request->get('hall');
        $place =DB::table('place')
            ->where('zal_id', '=',$zalId)
            ->get();
        return $place;

    }
}
