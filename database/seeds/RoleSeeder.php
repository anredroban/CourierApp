<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol = Role::create(['name' => 'Administrador']);
        $rol2 = Role::create(['name' => 'Digitador']);
        $rol3 = Role::create(['name' => 'Motorizado']);

        //gestion de Usuarios
        Permission::create(['name' => 'registroGestion'])->syncRoles([$rol,$rol2]);
        Permission::create(['name' => 'gestionUser'])->syncRoles([$rol]);
        Permission::create(['name' => 'newUser'])->syncRoles([$rol]);
        Permission::create(['name' => 'formUser'])->syncRoles([$rol]);
        
        //Descarga Reporte
        Permission::create(['name' => 'vistaReporte'])->syncRoles([$rol]);
        Permission::create(['name' => 'dbDescarga'])->syncRoles([$rol]);
        Permission::create(['name' => 'dbCarga'])->syncRoles([$rol]);
        //vista mostrar Imaganes
        Permission::create(['name' => 'indexImagenes'])->syncRoles([$rol,$rol2,$rol3]);
        //vista gestion de Motorizado
        Permission::create(['name' => 'registroMotorizado'])->syncRoles([$rol,$rol3]);
        //vista asignar base        
        Permission::create(['name' => 'asignarBaseHome'])->syncRoles([$rol,$rol2]);
        //vistadistribucion
        Permission::create(['name' => 'indexDistribucion'])->syncRoles([$rol,$rol2]);
        //vistaIndexHistorico
        Permission::create(['name' => 'indexHistorico'])->syncRoles([$rol,$rol2]);                

    }
}
