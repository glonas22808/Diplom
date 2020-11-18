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
            ->join('film', 'film_genre.film_id', '=', 'film.film_id')
            ->join('genre', 'film_genre.genre_id', '=', 'genre.genre_id')
           ->select('film.film_name', 'film.film_discription','film.film_img','film.film_video','film.film_time', 'genre.genre_type')
            ->where('film.film_id' ,$id)
            ->get();
       return $film;
    }
    public function AllFilm(){
        $film = DB::table('film_genre')
            ->join('film', 'film_genre.film_id', '=', 'film.film_id')
            ->join('genre', 'film_genre.genre_id', '=', 'genre.genre_id')
            ->select('film.film_name','film.film_id' ,'film.film_discription','film.film_img','film.film_video','film.film_time', 'genre.genre_type')
            ->get();
        return $film;
    }
}
