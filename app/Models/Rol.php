<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    public $table = "roles";
    protected $fillable = ['name','guard_name'];
}
