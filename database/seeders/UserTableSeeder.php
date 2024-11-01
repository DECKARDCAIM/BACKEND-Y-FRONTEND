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
        User::create([
            'name' => 'Cristoffer Falla',
            'email' => 'falla3235@hotmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'dpi' => '3051507150201',
            'address' => 'Guatemala, Guastatoya, El Progreso',
            'phone' => '502 33029117',
            'role' => 'admin',
            ]);

        User::factory()
            ->count(50)
            ->create();
    }
}
