<?php
use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar médico</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/medicos') }}" class="btn btn-sm btn-success"><i class="fas fa-chevron-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Por favor! </strong>{{ $error }}
                    </div>
                @endforeach
            @endif
            <form action="{{ url('/medicos/'.$doctor->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nombre del médico</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $doctor->name) }}" required>
                </div>

                <!-- Campo de Especialidad -->
                <div class="form-group">
                    <label for="specialty">Especialidad</label>
                    <select name="specialty" id="specialty" class="form-control" required>
                        <option value="">Seleccione una especialidad</option>
                        @foreach ($specialties as $specialty)
                            <option value="{{ $specialty->name }}" 
                                {{ old('specialty', $doctor->specialty) == $specialty->name ? 'selected' : '' }}>
                                {{ $specialty->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $doctor->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="dpi">DPI</label>
                    <input type="text" name="dpi" id="dpi" class="form-control" value="{{ old('dpi', $doctor->dpi) }}" required>
                </div>

                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $doctor->address) }}" required>
                </div>

                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $doctor->phone) }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="text" name="password" id="password" class="form-control">
                    <small class="text-warning">Solo llena el campo si deseas cambiar la contraseña</small>
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Guardar médico</button>
            </form>
        </div>
    </div>
@endsection
