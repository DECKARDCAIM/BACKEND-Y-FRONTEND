<?php
use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('content')
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Nuevo medico</h3>
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
                        <strong>Por favor!  </strong>{{ $error }}
                        </div>
                    @endforeach
                @endif
                <form action="{{ url('/medicos') }}" method="POST">
                    @csrf
                    <div class="form-group">
                    <label for="name">Nombre del medico</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name')}}" required>
                    </div>

                    <div class="form-group">
    <label for="specialty">Especialidad</label>
    <select name="specialty" id="specialty" class="form-control" required>
        <option value="">Seleccione una especialidad</option>
        @foreach ($specialties as $specialty)
            <option value="{{ $specialty->name }}" {{ old('specialty') == $specialty->name ? 'selected' : '' }}>
                {{ $specialty->name }}
            </option>
        @endforeach
    </select>
</div>

                    <div class="form-group">
                    <label for="description">Correo Electronico</label>
                    <input type="text" name="email" id="description" class="form-control" value="{{ old('email')}}" required>
                    </div>

                    <div class="form-group">
                    <label for="description">DPI</label>
                    <input type="text" name="dpi" id="description" class="form-control" value="{{ old('dpi')}}" required>
                    </div>

                    <div class="form-group">
                    <label for="description">Direccion</label>
                    <input type="text" name="address" id="description" class="form-control" value="{{ old('address')}}" required>
                    </div>

                    <div class="form-group">
                    <label for="description">Telefono</label>
                    <input type="text" name="phone" id="description" class="form-control" value="{{ old('phone')}}" required>
                    </div>

                    <div class="form-group">
                    <label for="description">Contraseña</label>
                    <input type="text" name="password" id="description" class="form-control" value="{{ old('password', Str::random(8)) }}" required>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Crear medico</button>
                </form>
            </div>
          </div>
@endsection
