<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
{
    // AQUI SE LISTAN LAS ESPACIALIDADES MEDICAS QUEMADAS
    $especialidades = [
        'Cardiología', 'Dermatología', 'Neurología', 'Ginecología', 'Pediatría', 
        'Oftalmología', 'Psiquiatría', 'Urología', 'Endocrinología', 'Oncología', 
        'Neumología', 'Gastroenterología', 'Otorrinolaringología', 'Reumatología', 
        'Nefrología'
    ];
    
    // AQUI SE GENERAN LOS SEEDERS TANTO DE DOCTORES Y PACIENTES CON SUS RESPECTIVOS CAMPOS
    $role = $this->faker->randomElement(['doctor', 'paciente']);

    return [
        'name' => $this->faker->name(),
        'lastname' => $this->faker->name(),
        'email' => $this->faker->unique()->safeEmail(),
        'email_verified_at' => now(),
        'password' => static::$password ??= Hash::make('password'),
        'remember_token' => Str::random(10),
        'dpi' => $this->faker->numberBetween(1000000000000, 9999999999999),
        'address' => $this->faker->address(),
        'phone' => $this->faker->tollFreePhoneNumber(),
        'role' => $role,

        // AQUI INGRESA AL CAMPO DE ESPECIALIDAD MEDICA SI ES DOCTOR O NULL SI ES PACIENTE
        'specialty' => $role === 'doctor' ? $this->faker->randomElement($especialidades) : null,
    ];
}

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
