<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialty;

class SpecialtyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }

    public function create()
    {
        return view('specialties.create');
    }

    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }

    public function sendData(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|min:5'
        ];

        $messages = [
            'name.required' => 'El campo nombre es obligatorio',
            'name.min' => 'El campo nombre debe tener al menos 3 caracteres',
            'description.required' => 'El campo descripción es obligatorio',
            'description.min' => 'El campo descripción debe tener al menos 5 caracteres'
        ];
        $this->validate($request, $rules, $messages);

        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialtyName = $specialty->name;
        $specialty->save();
        $notification = 'La especialidad '. $specialtyName .' se ha registrado correctamente.';
        return redirect('/especialidades')->with(compact('notification'));
    }

    public function update(Request $request, Specialty $specialty)
    {
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|min:5'
        ];

        $messages = [
            'name.required' => 'El campo nombre es obligatorio',
            'name.min' => 'El campo nombre debe tener al menos 3 caracteres',
            'description.required' => 'El campo descripción es obligatorio',
            'description.min' => 'El campo descripción debe tener al menos 5 caracteres'
        ];
        $this->validate($request, $rules, $messages);

        $updateName = $specialty->name;
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();
        $notification = 'La especialidad '. $updateName .' se ha actualizado correctamente.';
        return redirect('/especialidades')->with(compact('notification'));
    }

    public function destroy(Specialty $specialty)
    {
        $deletedName = $specialty->name;
        $specialty->delete();
        $notification = 'La especialidad '. $deletedName .' se ha eliminado correctamente.';
        return redirect('/especialidades')->with(compact('notification'));
    }
}
