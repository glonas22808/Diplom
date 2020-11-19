<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketModel extends Model
{
    protected $table = '';
    protected $fillable = [
        'film_name',
        'film_discription',
        'film_img',
        'film_video',
        'film_time'
    ];
    public
}
