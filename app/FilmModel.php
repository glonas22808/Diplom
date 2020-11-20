<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FilmModel extends Model
{
    protected $table = 'film';
    protected $fillable = [
        'film_name',
        'film_discription',
        'film_img',
        'film_video',
        'film_time'
    ];
    public function getFilmById(string $id) : object{

       $film = DB::table('film_genre')
           ->select('film.film_name',   'film.film_discription','film.film_img','film.film_video','film.film_time' ,DB::raw('group_concat(genre.genre_type) as genre'))
           ->join('film', 'film_genre.film_id', '=', 'film.film_id')
            ->join('genre', 'film_genre.genre_id', '=', 'genre.genre_id')
            ->where('film.film_id' ,$id)
           ->groupBy('film.film_name',  'film.film_discription','film.film_img','film.film_video','film.film_time' )
            ->get();
       return $film;
    }
    public function AllFilm() : object{
        $mytime = \Carbon\Carbon::now();
        $film =  DB::table('film_genre' )
            ->select('film.film_name','film.film_id' ,'film.film_discription','film.film_img','film.film_video','film.film_time',DB::raw('group_concat(genre.genre_type) as genre') )
            ->join('film', 'film_genre.film_id', '=', 'film.film_id')
            ->join('genre', 'film_genre.genre_id', '=', 'genre.genre_id')
            ->groupBy('film.film_name', 'film.film_discription', 'film.film_id' ,'film.film_img','film.film_video','film.film_time');
        $users = DB::table('Seance')
            ->select('film.film_name', 'film.film_discription', 'film.film_id' ,'film.film_img','film.film_video','film.film_time' ,'genre')
            ->joinSub($film, 'film', function ($join) {
                $join->on('Seance.film_id', '=', 'film.film_id');
            })
            ->where('Seance.Seance_data' ,'>' ,  $mytime)
            ->distinct('film.film_name')
            ->get();

       return $users;

    }
}
