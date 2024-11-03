<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        // AQUI SE VALIDA SI EL USUARIO ADMINISTRADOR EXISTE
        if (!User::where('email', 'falla3235@hotmail.com')->exists()) {
            User::create([
                'name' => 'Cristoffer',
                'lastname' => 'Falla', 
                'email' => 'falla3235@hotmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('CAllofduty123@%'),
                'dpi' => '3051507150201',
                'address' => 'Guatemala, Guastatoya, El Progreso',
                'phone' => '502 33029117',
                'role' => 'admin',
            ]);
        }

        // AQUI SE INYECTAN 50 USUARIOS AL SISTEMA DE FORMA ALEATORIA
        User::factory()->count(50)->create();
        
    }

}
