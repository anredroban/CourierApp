<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGuia extends Model
{
    public $table = "usuario_has_guia";
   
    protected $fillable = ['usuario_id','asignacion_id','visible','fecha'];
    public $timestamps = false;
}
