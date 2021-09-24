<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    
    public $table = "asignacions";
   
    protected $fillable = ['numero_guia','usuario_asignado','usuario_id','user_guia_id'];
   
}
