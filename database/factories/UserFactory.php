<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    // Define las especialidades en un array
    $especialidades = [
        'Cardiología', 'Dermatología', 'Neurología', 'Ginecología', 'Pediatría', 
        'Oftalmología', 'Psiquiatría', 'Urología', 'Endocrinología', 'Oncología', 
        'Neumología', 'Gastroenterología', 'Otorrinolaringología', 'Reumatología', 
        'Nefrología'
    ];
    
    // Asigna el rol aleatorio (doctor o paciente)
    $role = $this->faker->randomElement(['doctor', 'paciente']);

    return [
        'name' => $this->faker->name(),
        'email' => $this->faker->unique()->safeEmail(),
        'email_verified_at' => now(),
        'password' => static::$password ??= Hash::make('password'),
        'remember_token' => Str::random(10),
        'dpi' => $this->faker->numberBetween(1000000000000, 9999999999999),
        'address' => $this->faker->address(),
        'phone' => $this->faker->tollFreePhoneNumber(),
        'role' => $role,
        // Si el rol es doctor, asigna una especialidad aleatoria
        'specialty' => $role === 'doctor' ? $this->faker->randomElement($especialidades) : null,
    ];
}


    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
