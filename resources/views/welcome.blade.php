<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hospital de UISAU - Inicio</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="{{ asset('css/styles.css') }}?v={{ time() }}"
    />
  </head>
  <body>
    <div class="top-bar">
      <div class="container d-flex justify-content-between align-items-center">
        <!-- REDES SOCIALES DE ARRIBA -->
        <div class="header-social">
          <a href="https://www.facebook.com/" class="social-icon"
            ><i class="fab fa-facebook-f"></i
          ></a>
          <a href="https://www.twitter.com" class="social-icon"
            ><i class="fab fa-twitter"></i
          ></a>
          <a href="https://www.youtube.com/" class="social-icon"
            ><i class="fab fa-youtube"></i
          ></a>
          <a href="https://www.google.com" class="social-icon"
            ><i class="fab fa-google"></i
          ></a>
          <a href="https://www.pinterest.com" class="social-icon"
            ><i class="fab fa-pinterest"></i
          ></a>
        </div>
        <!-- MENSAJE DE BIENVENIDA ARRIBA -->
        <span class="welcome-text"
          >Bienvenidos a UISAU tu hospital de confianza
        </span>
        <!-- BOTON PARA IR AL DASHBOARD -->
        @if (Route::has('login'))
        <nav class="-mx-3 flex flex-1 justify-end">
          @auth
          <a
            href="{{ url('/dashboard') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
          >
            Dashboard
          </a>
          @else
          <a
            href="{{ route('login') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
          >
            Ingresar <i class="fas fa-caret-right"></i>
          </a>
          @endauth
        </nav>
        @endif
      </div>
    </div>

    <header class="main-header">
      <div class="container d-flex justify-content-between align-items-center">
        <!-- LOGOTIPO -->
        <div class="logo">
          <img
            src="{{ asset('img/logotipo.webp') }}"
            alt="Logotipo"
            width="150"
          />
          <!-- EL LEMA DEL HOSPITAL -->
          <span
            >La salud es importante, ¡cuidate!
            <small>Solo nosotros tenemos a los mejores Medicos</small></span
          >
        </div>
        <!-- BOTON DE MENU PARA TELEFONOS AUN SIN FUNCIONAMIENTO -->
        <nav class="navbar navbar-expand-lg">
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNav"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- MENU -->
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a
                  class="nav-link active"
                  href="#home"
                  onclick="setActive(this)"
                  >Inicio</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#nosotros" onclick="setActive(this)"
                  >Nosotros</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#gallery" onclick="setActive(this)"
                  >Servicios</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact" onclick="setActive(this)"
                  >Contactanos</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // FUNCION QUE ME PERMITE ACTIVAR EL LINK DE LA NAVEGACION
      document.querySelectorAll(".navbar-nav .nav-link").forEach((link) => {
        link.addEventListener("click", function () {
          document
            .querySelectorAll(".navbar-nav .nav-link")
            .forEach((item) => item.classList.remove("active"));
          this.classList.add("active");
        });
      });
    </script>

  </body>
</html>
