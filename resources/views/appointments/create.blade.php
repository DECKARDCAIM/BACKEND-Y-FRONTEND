@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <h3 class="mb-0">Nueva Consulta para {{ $patient->name }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('consultas.store') }}" method="POST">
            @csrf
            <!-- Campo oculto para enviar el ID del paciente -->
            <input type="hidden" name="patient_id" value="{{ $patient->id }}">

            <div class="form-group">
                <label for="doctor_id">Doctor</label>
                <select name="doctor_id" id="doctor_id" class="form-control" required>
                    @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }} ({{ $doctor->specialty ?? 'Sin especialidad' }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="appointment_date">Fecha de Consulta</label>
                <input type="date" name="appointment_date" id="appointment_date" class="form-control" value="{{ now()->format('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Consulta</button>
        </form>
    </div>
</div>
@endsection
