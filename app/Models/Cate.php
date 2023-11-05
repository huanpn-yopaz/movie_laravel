<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cate extends Model
{
    protected $fillable = ['name_cate','slug_cate'];
    protected $table = 'cate';
    protected $primaryKey = 'id_cate';
    public function movie(): HasMany
    {
        return $this->hasMany(Movie::class,'id_cate');
    }
}
