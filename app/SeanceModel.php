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
    ];
    public function Seanceshow($id){
        $mytime = \Carbon\Carbon::now();
        $seance = DB::table('seance')
            ->select(  'Seance.Seance_data', 'Zal.zal_name' )
            ->join('film', 'Seance.film_id', '=', 'film.film_id')
            ->join('zal', 'Seance.zal_id', '=', 'zal.zal_id')
            ->where('film.film_id' ,$id)
            ->where('Seance.Seance_data' ,'>' ,  $mytime)
            ->get();
        return $seance;
    }
    public function filmonshow(){
        $mytime = \Carbon\Carbon::now();
        $seance = DB::table('seance')
            ->select('film.film_name','film.film_id' ,'film.film_discription','film.film_img','film.film_video','film.film_time' )
            ->join('film', 'Seance.film_id', '=', 'film.film_id')
            ->join('zal', 'Seance.zal_id', '=', 'zal.zal_id')
            ->where('Seance.Seance_data' ,'>' ,  $mytime)
            ->groupBy('film.film_name', 'film.film_discription', 'film.film_id' ,'film.film_img','film.film_video','film.film_time')
            ->get();
        return $seance;
    }

}
