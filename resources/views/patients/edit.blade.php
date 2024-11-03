<?php
use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Editar paciente</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('/pacientes') }}" class="btn btn-sm btn-success"><i class="fas fa-chevron-left"></i>
          Regresar</a>
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
    <form action="{{ url('/pacientes/' . $patient->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Nombre del paciente</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $patient->name ?? '') }}"
          required>
      </div>

      <div class="form-group">
        <label for="apellido">Apellido del paciente</label>
        <input type="text" name="lastname" id="lastname" class="form-control"
          value="{{ old('lastname', $patient->lastname ?? '') }}" required>
      </div>

      <div class="form-group">
        <label for="description">Correo Electronico</label>
        <input type="text" name="email" id="description" class="form-control" value="{{ old('email', $patient->email)}}"
          required>
      </div>

      <div class="form-group">
        <label for="description">DPI</label>
        <input type="text" name="dpi" id="description" class="form-control" value="{{ old('dpi', $patient->dpi)}}"
          required>
      </div>

      <div class="form-group">
        <label for="description">Direccion</label>
        <input type="text" name="address" id="description" class="form-control"
          value="{{ old('address', $patient->address)}}" required>
      </div>

      <div class="form-group">
        <label for="description">Telefono</label>
        <input type="text" name="phone" id="description" class="form-control" value="{{ old('phone', $patient->phone)}}"
          required>
      </div>

      <div class="form-group">
        <label for="description">Contraseña</label>
        <input type="text" name="password" id="description" class="form-control">
        <small class="text-warning">Solo llena el campo si desea cambiar la contraseña</small>
      </div>

      <button type="submit" class="btn btn-sm btn-primary">Guardar cambios</button>
    </form>
  </div>
</div>
@endsection