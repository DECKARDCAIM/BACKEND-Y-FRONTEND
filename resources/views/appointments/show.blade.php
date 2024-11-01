@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <h3 class="mb-0">Historial de Consultas de {{ $patient->name }}</h3>
    </div>
    <div class="card-body">
        @if($appointments->isEmpty())
            <p>No hay consultas registradas para este paciente.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Doctor</th>
                        <th>Especialidad</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>{{ $appointment->doctor->name ?? 'No asignado' }}</td>
                            <td>{{ $appointment->doctor->specialty ?? 'Sin especialidad' }}</td>
                            <td>{{ $appointment->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
