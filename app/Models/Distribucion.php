<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distribucion extends Model
{
    //
    public $table='distribucions';

    protected $fillable = [
            'codigo_general_tramite',
            'fecha',
            'provincia_ruta',
            'punto_distribucion',
            'traking',
            'persona',            
            'rutaImagen'];
}
