<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar si el usuario admin ya existe
        if (!User::where('email', 'falla3235@hotmail.com')->exists()) {
            User::create([
                'name' => 'Cristoffer Falla',
                'email' => 'falla3235@hotmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('CAllofduty123@%'),
                'dpi' => '3051507150201',
                'address' => 'Guatemala, Guastatoya, El Progreso',
                'phone' => '502 33029117',
                'role' => 'admin',
            ]);
        }

        // Crear otros 50 usuarios con datos generados aleatoriamente
        User::factory()->count(50)->create();
    }

}
