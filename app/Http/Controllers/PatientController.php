<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PatientController extends Controller
{
    public function index()
    {
        $patients = User::patients()->paginate(10);
        return view('patients.index', compact('patients'));
    }

   
    public function create()
    {
        return view('patients.create');
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
        ];
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'dpi' => 'required|min:13',
            'address' => 'required',
            'phone' => 'required',
        ];
        $this->validate($request, $rules, $messages);

        $user = User::create(
            $request->only('name', 'email', 'dpi', 'address', 'phone')
            + [
                'role' => 'paciente',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $patientName = $user->name;
        $notification = 'El paciente '. $patientName .' se ha registrado correctamente.';
        return redirect('/pacientes')->with (compact('notification'));
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
        $patient = User::patients()->findOrFail($id);
        return view('patients.edit', compact('patient'));
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
        ];
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dpi' => 'required|min:13',
            'address' => 'required',
            'phone' => 'required',
        ];
        $this->validate($request, $rules, $messages);
        $user = User::patients()->findOrFail($id);

        $data = $request->only('name', 'email', 'dpi', 'address', 'phone');
        $password = $request->input('password');
        if ($password)
            $data['password'] = bcrypt($password);
        $user->fill($data);
        $user->save();
        $patientName = $user->name;

        $notification = 'La informacion del paciente '. $patientName .' se ha actualizado correctamente.';
        return redirect('/pacientes')->with (compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::patients()->findOrFail($id);
        $patientName = $user->name;
        $user->delete();
        $notification = 'El paciente '. $patientName .' se ha eliminado correctamente.';
        return redirect('/pacientes')->with (compact('notification'));
    }
}
