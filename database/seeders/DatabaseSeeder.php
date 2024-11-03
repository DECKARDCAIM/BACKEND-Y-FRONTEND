<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // AQUI SE LLAMAN LOS SEEDERS PARA SER INYECTADOS A LA BASE DE DATOS
    public function run(): void
    {
        $this->call(UserTableSeeder::class);
        $this->call(SpecialtiesSeeder::class);
        
    }
}
