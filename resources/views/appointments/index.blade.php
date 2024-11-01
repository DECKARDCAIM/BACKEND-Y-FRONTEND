@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Historial Clinico de Pacientes</h3>
            </div>
            <div class="col text-right">
                <form action="{{ route('consultas.index') }}" method="GET" class="form-inline">
                    <input type="text" name="query" value="{{ $query }}" class="form-control" placeholder="Buscar por nombre o DPI">
                    <button type="submit" class="btn btn-sm btn-primary ml-2">Buscar</button>
                </form>
            </div>
        </div>
        @if (session('notification'))
            <div class="alert alert-success mt-3" role="alert">
                <i class="fas fa-check-circle"></i>
                {{ session('notification') }}
            </div>
        @endif
    </div>

    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">DPI</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->email }}</td>
                        <td>{{ $patient->dpi }}</td>
                        <td>
                        <a href="{{ route('consultas.create', $patient->id) }}" class="btn btn-sm btn-primary">Nueva Consulta</a>
                        <a href="{{ route('consultas.show', $patient->id) }}" class="btn btn-sm btn-secondary">Ver Historial</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-body">
        {{ $patients->links() }}
    </div>
</div>
@endsection
