<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <title>@yield('title', 'CRUD Hotel')</title>

    <style>
        /* Estilos generales */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        /* Navbar personalizado */
        .navbar {
            background: linear-gradient(90deg, #343a40, #495057);
            color: white;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #f8f9fa;
        }

        .navbar-brand i {
            color: #ffd700;
        }

        .navbar .nav-link {
            color: #f8f9fa;
            transition: color 0.3s ease;
        }

        .navbar .nav-link:hover {
            color: #ffd700;
        }

        /* Sidebar moderno */
        #sidebar {
            background: #495057;
            color: white;
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: -250px;
            transition: all 0.4s ease-in-out;
            z-index: 1050;
        }

        #sidebar.active {
            left: 0;
        }

        #sidebar ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        #sidebar ul li {
            margin: 10px 0;
        }

        #sidebar ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        #sidebar ul li a:hover {
            background-color: #343a40;
            color: #ffd700;
        }

        /* Icono del toggle */
        #sidebarToggle {
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Contenido principal */
        .main-content {
            margin-left: 0;
            transition: margin-left 0.4s ease-in-out;
        }

        .main-content.sidebar-active {
            margin-left: 250px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <span id="sidebarToggle"><i class="fas fa-bars"></i></span>
            <a class="navbar-brand ms-3" href="#">
                <i class="fas fa-hotel"></i> Hotel Bolivar
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user"></i> Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div id="sidebar">
        <ul>
            <li><a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('habitaciones.index') }}"><i class="fas fa-bed"></i> Habitaciones</a></li>
            <li><a href="{{ route('modules.reservas.index') }}"><i class="fas fa-calendar-check"></i> Reservaciones</a></li>
            <li><a href="{{ route('modules.huesped.index') }}"><i class="fas fa-users"></i> Huéspedes</a></li>
            <li><a href="#"><i class="fas fa-concierge-bell"></i> Servicios</a></li>
            <li><a href="#"><i class="fas fa-user-tie"></i> Personal</a></li>
            <li><a href="#"><i class="fas fa-chart-bar"></i> Reportes</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Configuración</a></li>
        </ul>
    </div>

    <!-- Contenido principal -->
    <div class="main-content container mt-5 pt-5">
        <h1>Bienvenido a Hotel Bolivar</h1>
        <p>Aquí va el contenido principal.</p>
        @yield('contenido')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para sidebar -->
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('.main-content');
            sidebar.classList.toggle('active');
            mainContent.classList.toggle('sidebar-active');
        });
    </script>
</body>

</html>

