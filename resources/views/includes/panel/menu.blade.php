<h6 class="navbar-heading text-muted">Gestion</h6>
<ul class="navbar-nav">

  <li class="nav-item  active ">
    <a class="nav-link  active " href="{{ url('home')}}">
      <i class="ni ni-tv-2"></i> Dashboard
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ url('/especialidades') }}">
      <i class="ni ni-briefcase-24 text-blue"></i> Especialidades
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ url('/medicos') }}">
      <i class="fas fa-stethoscope text-info"></i> Medicos
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ url('/pacientes') }}">
      <i class="fas fa-bed text-success"></i> Pacientes
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('logout') }}"
      onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
      <i class="fas fa-sign-in-alt text-danger"></i> Cerrar sesión
    </a>
    <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
      @csrf
    </form>
  </li>
</ul>

<hr class="my-3">
<h6 class="navbar-heading text-muted">DIAGNOSTICOS</h6>
<ul class="navbar-nav mb-md-3">
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/consultas')}}">
      <i class="ni ni-books text-default"></i> Mis diagnosticos
    </a>
  </li>
</ul>