<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specialty;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = User::doctors()->paginate(10);
        return view('doctors.index', compact('doctors'));
    }

   
    public function create()
    {
        $specialties = Specialty::all();
        return view('doctors.create', compact('specialties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre.',
            'name.min' => 'El nombre debe tener al menos 3 caracteres.',
            'email.required' => 'Es necesario ingresar un email.',
            'email.email' => 'El email no es válido.',
            'email.unique' => 'El email ya se encuentra registrado.',
            'dpi.required' => 'Es necesario ingresar un DPI.',
            'dpi.min' => 'El DPI debe tener al menos 13 caracteres.',
            'address.required' => 'Es necesario ingresar una dirección.',
            'phone.required' => 'Es necesario ingresar un teléfono.',
            'specialty.required' => 'Es necesario seleccionar una especialidad.',
        ];
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'dpi' => 'required|min:13',
            'address' => 'required',
            'phone' => 'required',
            'specialty' => 'required',
        ];
        $this->validate($request, $rules, $messages);

        $user = User::create(
            $request->only('name', 'email', 'dpi', 'address', 'phone')
            + [
                'specialty' => $request->input('specialty'),
                'role' => 'doctor',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $doctorName = $user->name;
        $notification = 'El médico '. $doctorName .' se ha registrado correctamente.';
        return redirect('/medicos')->with (compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    // Cargar el doctor y todas las especialidades disponibles
    $doctor = User::doctors()->findOrFail($id);
    $specialties = Specialty::all(); // Asumiendo que tienes un modelo Specialty que contiene las especialidades

    return view('doctors.edit', compact('doctor', 'specialties'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $messages = [
        'name.required' => 'Es necesario ingresar un nombre.',
        'name.min' => 'El nombre debe tener al menos 3 caracteres.',
        'email.required' => 'Es necesario ingresar un email.',
        'email.email' => 'El email no es válido.',
        'email.unique' => 'El email ya se encuentra registrado.',
        'dpi.required' => 'Es necesario ingresar un DPI.',
        'dpi.min' => 'El DPI debe tener al menos 13 caracteres.',
        'address.required' => 'Es necesario ingresar una dirección.',
        'phone.required' => 'Es necesario ingresar un teléfono.',
        'specialty.required' => 'Es necesario seleccionar una especialidad.',
    ];

    $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'dpi' => 'required|min:13',
        'address' => 'required',
        'phone' => 'required',
        'specialty' => 'required|string', // Validación para el campo de especialidad
    ];

    $this->validate($request, $rules, $messages);

    $user = User::doctors()->findOrFail($id);

    // Obtener los datos del formulario y asignar la especialidad
    $data = $request->only('name', 'email', 'dpi', 'address', 'phone', 'specialty');

    // Si se proporciona una contraseña, la actualizamos
    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->input('password'));
    }

    $user->fill($data);
    $user->save();

    $doctorName = $user->name;
    $notification = 'La información del médico '. $doctorName .' se ha actualizado correctamente.';

    return redirect('/medicos')->with(compact('notification'));
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::doctors()->findOrFail($id);
        $doctorName = $user->name;
        $user->delete();
        $notification = 'El médico '. $doctorName .' se ha eliminado correctamente.';
        return redirect('/medicos')->with (compact('notification'));
    }
}
