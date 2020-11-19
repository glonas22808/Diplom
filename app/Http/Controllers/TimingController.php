<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\FilmModel;
use App\SeanceModel;

class TimingController extends Controller
{
    public function __construct(FilmModel $film)
    {
        $this->$film = $film;
    }
    public function index()
    {
        //        $seance = new SeanceModel();
//        $filmList = $seance->filmonshow();
        $film = new FilmModel();
        $filmList = $this->$film->Allfilm();
        return view('timing', compact('filmList'));
    }
    public function showFilm($id){
        $film = new FilmModel();
        $seance = new SeanceModel();
        $filmShow = $film->getFilmById($id);
        $seanceshow = $seance->Seanceshow($id);
        return view('filmpage', compact('filmShow' , 'seanceshow'));
    }
}
