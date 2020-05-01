<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create(['nombre'=>'admin']);
        Rol::create(['nombre'=>'desarrollador']);
        Rol::create(['nombre'=>'usuario']);
    }
}
