<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;

class AppointmentController extends Controller
{
    public function index(Request $request)
{
    $query = $request->input('query');

    // Busca en la tabla `users` solo aquellos con rol de 'paciente'
    $patients = User::where('role', 'paciente')
        ->when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('name', 'like', "%$query%")
                         ->orWhere('dpi', 'like', "%$query%");
        })
        ->paginate(10); // Paginación para el listado de pacientes

    return view('appointments.index', compact('patients', 'query'));
}




    // Muestra el formulario para crear una nueva consulta
    public function create($patient_id)
    {
        $patient = User::findOrFail($patient_id); // Obtén el paciente para mostrar en la vista
        $doctors = User::where('role', 'doctor')->get(); // Obtén los doctores sin la relación
        return view('appointments.create', compact('patient', 'doctors'));
    }
    



    // Guarda una nueva consulta en la base de datos
    public function store(Request $request)
{
    $request->validate([
        'patient_id' => 'required|exists:users,id',
        'doctor_id' => 'required|exists:users,id',
        'appointment_date' => 'required|date',
        'description' => 'required|string',
    ]);

    // Crear la consulta médica
    Appointment::create([
        'patient_id' => $request->input('patient_id'),
        'doctor_id' => $request->input('doctor_id'),
        'appointment_date' => $request->input('appointment_date'),
        'description' => $request->input('description'),
    ]);

    // Obtener el nombre del paciente para el mensaje
    $patient = User::find($request->input('patient_id'));
    $patientName = $patient->name;
    $notification = 'Se ha creado un nuevo historial clínico para el paciente ' . $patientName . ' correctamente.';

    // Redirigir con el mensaje de éxito
    return redirect()->route('consultas.index')->with(compact('notification'));
}



    // Muestra los detalles de una consulta específica
    public function show($patient_id)
{
    $patient = User::findOrFail($patient_id); // Encuentra al paciente
    $appointments = Appointment::where('patient_id', $patient_id)->get(); // Obtiene todas las consultas del paciente

    return view('appointments.show', compact('patient', 'appointments'));
}

    // Muestra el formulario para editar una consulta existente
    public function edit(Appointment $consulta)
    {
        $patients = User::where('role', 'paciente')->get();
        $doctors = User::where('role', 'doctor')->get();
        return view('appointments.edit', compact('consulta', 'patients', 'doctors'));
    }

    // Actualiza una consulta en la base de datos
    public function update(Request $request, Appointment $consulta)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date',
            'description' => 'required|string',
        ]);

        $consulta->update($request->all());

        return redirect()->route('consultas.index')->with('success', 'Consulta médica actualizada correctamente.');
    }

    // Elimina una consulta
    public function destroy(Appointment $consulta)
    {
        $consulta->delete();
        return redirect()->route('consultas.index')->with('success', 'Consulta médica eliminada correctamente.');
    }
}
