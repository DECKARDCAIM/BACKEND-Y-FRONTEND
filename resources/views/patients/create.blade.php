@extends('layouts.panel')

@section('content')
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Nuevo paciente</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('/pacientes') }}" class="btn btn-sm btn-success"><i class="fas fa-chevron-left"></i> Regresar</a>
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
                <form action="{{ url('/pacientes') }}" method="POST">
                    @csrf
                    <div class="form-group">
                    <label for="name">Nombre del paciente</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name')}}" required>
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

                    <button type="submit" class="btn btn-sm btn-primary">Crear paciente</button>
                </form>
            </div>
          </div>
@endsection
