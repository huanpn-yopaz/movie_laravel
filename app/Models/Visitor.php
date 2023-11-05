<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    public $timestamps = false;
    protected $fillable = ['ip_visitor','date_visitor'];
    protected $table = 'visitor';
    protected $primaryKey = 'id_visitor';
}
