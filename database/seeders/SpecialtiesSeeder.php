<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialty;

class SpecialtiesSeeder extends Seeder
{
    public function run(): void
    {
        $specialties = [
            ['name' => 'Pediatría', 'description' => 'Especialidad que se ocupa de la salud de los niños y adolescentes, desde el nacimiento hasta los 18 años aproximadamente.'],
            ['name' => 'Cardiología', 'description' => 'Especialidad dedicada al estudio y tratamiento de las enfermedades del corazón y del sistema circulatorio.'],
            ['name' => 'Dermatología', 'description' => 'Especialidad que trata enfermedades de la piel, uñas y cabello, así como problemas estéticos relacionados.'],
            ['name' => 'Neurología', 'description' => 'Estudio y tratamiento de las enfermedades del sistema nervioso, tanto central como periférico.'],
            ['name' => 'Oftalmología', 'description' => 'Especialidad centrada en el cuidado y tratamiento de las enfermedades de los ojos y problemas de visión.'],
            ['name' => 'Ginecología', 'description' => 'Atención de la salud femenina, incluyendo el sistema reproductor y problemas hormonales en mujeres.'],
            ['name' => 'Psiquiatría', 'description' => 'Estudio y tratamiento de los trastornos mentales y del comportamiento, incluyendo ansiedad y depresión.'],
            ['name' => 'Oncología', 'description' => 'Especialidad que se ocupa del diagnóstico y tratamiento de todos los tipos de cáncer.'],
            ['name' => 'Nefrología', 'description' => 'Estudio y tratamiento de las enfermedades de los riñones y del sistema urinario.'],
            ['name' => 'Traumatología', 'description' => 'Especialidad dedicada a las lesiones del aparato locomotor, incluyendo huesos, articulaciones y músculos.'],
            ['name' => 'Otorrinolaringología', 'description' => 'Cuidado y tratamiento de enfermedades de oídos, nariz y garganta, así como el sistema respiratorio superior.'],
            ['name' => 'Reumatología', 'description' => 'Atención de enfermedades reumáticas, especialmente las que afectan articulaciones y tejidos conectivos.'],
            ['name' => 'Endocrinología', 'description' => 'Especialidad que trata trastornos hormonales y enfermedades de las glándulas endocrinas.'],
            ['name' => 'Neumología', 'description' => 'Estudio y tratamiento de enfermedades del sistema respiratorio, como asma y EPOC.'],
            ['name' => 'Infectología', 'description' => 'Especialidad centrada en el estudio y tratamiento de enfermedades infecciosas causadas por bacterias, virus y parásitos.']
        ];

        foreach ($specialties as $specialty) {
            Specialty::create($specialty);
        }
    }
}
