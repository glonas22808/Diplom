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
    public function getFilmById($id){
       $film = DB::table('film_genre')
           ->select('film.film_name',   'film.film_discription','film.film_img','film.film_video','film.film_time' ,DB::raw('group_concat(genre.genre_type) as genre'))
           ->join('film', 'film_genre.film_id', '=', 'film.film_id')
            ->join('genre', 'film_genre.genre_id', '=', 'genre.genre_id')
            ->where('film.film_id' ,$id)
           ->groupBy('film.film_name',  'film.film_discription','film.film_img','film.film_video','film.film_time' )
            ->get();
       return $film;
    }
    public function AllFilm(){
        $film =  DB::table('film_genre' )
            ->select('film.film_name','film.film_id' ,'film.film_discription','film.film_img','film.film_video','film.film_time',DB::raw('group_concat(genre.genre_type) as genre') )
            ->join('film', 'film_genre.film_id', '=', 'film.film_id')
            ->join('genre', 'film_genre.genre_id', '=', 'genre.genre_id')
//            ->join ('Seance', 'film.film_id' , '=' , 'Seance.seance_data')
            ->groupBy('film.film_name', 'film.film_discription', 'film.film_id' ,'film.film_img','film.film_video','film.film_time')
            ->get();
        return $film;
    }
}
