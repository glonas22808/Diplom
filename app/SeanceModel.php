<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeanceModel extends Model
{
    protected $table = 'seance';
    protected $fillable = [
        'Seance_data',
        'Seance_time',
        'film_id',
        'zal_id',
        'cost'
    ];
    //Вывод существующего сеанса по фильму
    public function Seanceshow(string $id ) : object{
        $mytime = \Carbon\Carbon::now();
        $seance = DB::table('seance')
            ->select(  'Seance.Seance_data', 'Zal.zal_name' ,'Seance.cost' ,'Seance.zal_id' , 'Seance.seance_id' , 'seance.film_id' )
            ->join('film', 'Seance.film_id', '=', 'film.film_id')
            ->join('zal', 'Seance.zal_id', '=', 'zal.zal_id')
            ->where('film.film_id' ,$id)
            ->where('Seance.Seance_data' ,'>' ,  $mytime)
            ->get();
        return $seance;
    }


}
