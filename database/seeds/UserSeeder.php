<?php
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Daniel Cahuatijo',
            'ci'=>'1725658437',
            'rol'=>'1',
            'user'=>'dc001',
            'location'=>'Guayaquil',
            'is_active'=>true,
            'password'=> bcrypt('admin123'),
            
  ])->assignRole('Administrador');
  User::create([
    'name'=>'Jefferson Cahuatijo',
    'ci'=>'1725658488',
    'rol'=>'2',
    'user'=>'dc002',
    'location'=>'Quito',
    'is_active'=>true,
    'password'=> bcrypt('admin123'),
    
])->assignRole('Digitador');
    }
}
