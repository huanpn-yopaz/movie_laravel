<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cate extends Model
{
    use SoftDeletes;

    protected $fillable = ['name_cate', 'slug_cate'];

    protected $table = 'cate';

    protected $primaryKey = 'id_cate';

    public function movie(): HasMany
    {
        return $this->hasMany(Movie::class, 'id_cate');
    }
}
