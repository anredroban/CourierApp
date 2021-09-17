<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    
    public $table = "asignacions";
    //protected $dateFormat = 'Y-m-d h:m:s';
    protected $fillable = ['codigo','nombre','subestado_id','detalle','fecha','is_active'];
    /* protected $dates = [       
        'fecha'
    ];
    protected $casts = [
        'fecha'     => 'date:Y-m-d'
    ];*/
}
