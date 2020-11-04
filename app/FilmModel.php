<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmModel extends Model
{
    protected $table = 'Film';
    protected $fillable = [
        'name',
        'description',
        'img',
        'video'
    ];
    public function getFilmById($id){
        return $this->where('id',$id)->get();
    }
}
