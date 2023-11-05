<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Genre extends Model
{
    protected $fillable = ['name_genre','slug_genre'];
    protected $table = 'genre';
    protected $primaryKey = 'id_genre';
    public function movie_genre(): HasMany
    {
        return $this->hasMany(Movie_Genre::class,'id_genre');
    }
}
