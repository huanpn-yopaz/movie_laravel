<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    protected $fillable = ['name_movie', 'img_movie', 'video_movie', 'people_movie', 'point', 'time', 'slug_movie', 'status_movie', 'id_cate', 'id_genre', 'tags_movie', 'desc_movie'];

    protected $table = 'movie';

    protected $primaryKey = 'id_movie';

    public function movie_genre(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'movie_genre', 'id_movie', 'id_genre');
    }

    public function cate(): BelongsTo
    {
        return $this->belongsTo(Cate::class, 'id_cate');
    }
}
