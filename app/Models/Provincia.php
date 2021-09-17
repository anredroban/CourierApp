<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    //
    public $table= "provincias";
    protected $fillable = ['provincia','regional','is_active'];
}
