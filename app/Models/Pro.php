<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pro extends Model
{
    protected $fillable = ['name_pro','img_pro'];
    protected $table = 'pro';
    protected $primaryKey = 'id_pro';
}
