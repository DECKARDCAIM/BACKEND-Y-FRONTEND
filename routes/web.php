<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas para las especialidades
Route::get('/especialidades', [App\Http\Controllers\SpecialtyController::class, 'index']);

Route::get('/especialidades/create', [App\Http\Controllers\SpecialtyController::class, 'create']);
Route::get('/especialidades/{specialty}/edit', [App\Http\Controllers\SpecialtyController::class, 'edit']);
Route::post('/especialidades', [App\Http\Controllers\SpecialtyController::class, 'sendData']);

Route::put('/especialidades/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'update']);

Route::delete('/especialidades/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'destroy']);


//Rutas para los médicos
Route::resource('medicos', 'App\Http\Controllers\DoctorController');

//Rutas para los pacientes
Route::resource('pacientes', 'App\Http\Controllers\PatientController');

//Rutas para las consultas
Route::resource('consultas', 'App\Http\Controllers\AppointmentController');
Route::get('consultas/{patient}/create', [App\Http\Controllers\AppointmentController::class, 'create'])->name('consultas.create');
