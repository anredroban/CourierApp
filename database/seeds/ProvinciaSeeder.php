<?php

use Illuminate\Database\Seeder;
use App\Models\Provincia;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        Provincia::create(['provincia'=>'AZUAY','regional'=>'AUSTRO','is_active'=>true]);
        Provincia::create(['provincia'=>'CAÑAR','regional'=>'AUSTRO','is_active'=>true]);
        Provincia::create(['provincia'=>'LOJA','regional'=>'AUSTRO','is_active'=>true]);
        Provincia::create(['provincia'=>'MORONA SANTIAGO','regional'=>'AUSTRO','is_active'=>true]);
        Provincia::create(['provincia'=>'ZAMORA CHINCHIPE','regional'=>'AUSTRO','is_active'=>true]);
        Provincia::create(['provincia'=>'EL ORO','regional'=>'AUSTRO','is_active'=>true]);
        Provincia::create(['provincia'=>'GUAYAS','regional'=>'COSTA','is_active'=>true]);
        Provincia::create(['provincia'=>'LOS RIOS','regional'=>'COSTA','is_active'=>true]);
        Provincia::create(['provincia'=>'MANABI','regional'=>'COSTA','is_active'=>true]);
        Provincia::create(['provincia'=>'SANTA ELENA','regional'=>'COSTA','is_active'=>true]);
        Provincia::create(['provincia'=>'BOLIVAR','regional'=>'SIERRA','is_active'=>true]);
        Provincia::create(['provincia'=>'CARCHI','regional'=>'SIERRA','is_active'=>true]);
        Provincia::create(['provincia'=>'CHIMBORAZO','regional'=>'SIERRA','is_active'=>true]);
        Provincia::create(['provincia'=>'COTOPAXI','regional'=>'SIERRA','is_active'=>true]);
        Provincia::create(['provincia'=>'ESMERALDAS','regional'=>'SIERRA','is_active'=>true]);
        Provincia::create(['provincia'=>'IMBABURA','regional'=>'SIERRA','is_active'=>true]);
        Provincia::create(['provincia'=>'NAPO','regional'=>'SIERRA','is_active'=>true]);
        Provincia::create(['provincia'=>'ORELLANA','regional'=>'SIERRA','is_active'=>true]);
        Provincia::create(['provincia'=>'PASTAZA','regional'=>'SIERRA','is_active'=>true]);
        Provincia::create(['provincia'=>'PICHINCHA','regional'=>'SIERRA','is_active'=>true]);
        Provincia::create(['provincia'=>'SANTO DOMINGO','regional'=>'SIERRA','is_active'=>true]);
        Provincia::create(['provincia'=>'SUCUMBIOS','regional'=>'SIERRA','is_active'=>true]);

        
    }
}
