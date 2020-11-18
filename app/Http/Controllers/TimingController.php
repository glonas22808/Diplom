<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\FilmModel;

class TimingController extends Controller
{
    public function __construct(FilmModel $film)
    {
        $this->$film = $film;
    }
    public function index()
    {
        $film = new FilmModel();
        $filmList = $this->$film->Allfilm();
        return view('timing', compact('filmList'));
    }
    public function showFilm($id){
        $film = new FilmModel();
        $filmShow = $this->$film->getFilmById($id);
        return view('filmpage', compact('filmShow'));
    }
}
