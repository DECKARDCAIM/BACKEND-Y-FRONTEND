<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalPatients = User::where('role', 'paciente')->count();
        $totalDoctors = User::where('role', 'doctor')->count();
        $totalAppointments = Appointment::count();

        // Consultas por mes
        $monthlyAppointments = Appointment::selectRaw('MONTH(appointment_date) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $appointmentsData = [];
        for ($i = 1; $i <= 12; $i++) {
            $appointmentsData[] = $monthlyAppointments[$i] ?? 0;
        }

        return view('home', compact('totalPatients', 'totalDoctors', 'totalAppointments', 'appointmentsData'));
    }
}
