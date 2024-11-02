@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-md-12 mb-4">
    <div class="card">
      <div class="card-header">{{ __('Bienvenido') }}</div>

      <div class="card-body">
        @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif

        {{ __('Ahora mismo tú ya te encuentras logueado!') }}
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card shadow h-100 py-2 bg-primary text-white">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase mb-1">Pacientes</div>
            <div class="h5 mb-0 font-weight-bold">{{ $totalPatients }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user-injured fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card shadow h-100 py-2 bg-success text-white">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase mb-1">Doctores</div>
            <div class="h5 mb-0 font-weight-bold">{{ $totalDoctors }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user-md fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card shadow h-100 py-2 bg-info text-white">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase mb-1">Consultas</div>
            <div class="h5 mb-0 font-weight-bold">{{ $totalAppointments }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-notes-medical fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Estadísticas Generales</h6>
    </div>
    <div class="card-body">
        <div class="chart-pie pt-4 pb-2" style="height: 300px;">
            <canvas id="myPieChart"></canvas>
        </div>
        <div class="mt-4 text-center small">
            <span class="mr-2">
                <i class="fas fa-circle text-primary"></i> Pacientes
            </span>
            <span class="mr-2">
                <i class="fas fa-circle text-success"></i> Doctores
            </span>
            <span class="mr-2">
                <i class="fas fa-circle text-info"></i> Consultas
            </span>
        </div>
    </div>
</div>

<!-- Carga de Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ["Pacientes", "Doctores", "Consultas"],
      datasets: [{
        data: [{{ $totalPatients }}, {{ $totalDoctors }}, {{ $totalAppointments }}],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
        display: false
      },
    }
  });
</script>
@endsection