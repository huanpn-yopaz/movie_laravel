<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie_Genre extends Model
{
    protected $fillable = ['id_movie', 'id_genre'];

    protected $table = 'movie_genre';

    protected $primaryKey = 'id_movie_genre';
}
