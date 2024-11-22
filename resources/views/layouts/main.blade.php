<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    

    <title>@yield('title', 'CRUD Hotel')</title>

    <style>
        /* Estilos personalizados para navegación */
        .navbar {
            transition: all 0.3s ease;
        }
        
        .navbar.navbar-scrolled {
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        /* Resaltado de enlaces activos */
        .nav-link.active {
            color: var(--bs-primary) !important;
            font-weight: bold;
        }

        /* Sidebar responsivo */
        @media (max-width: 768px) {
            #sidebar {
                position: fixed;
                top: 56px;
                left: -250px;
                width: 250px;
                height: calc(100vh - 56px);
                transition: left 0.3s ease;
                z-index: 1000;
            }

            #sidebar.show {
                left: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="main-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <i class="fas fa-hotel me-2"></i>
                Hotel Bolivar
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user me-2"></i>Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" id="sidebar">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt me-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('habitaciones.index') }}">
                                <i class="fas fa-bed me-2"></i>
                                Habitaciones
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('modules.reservas.index') }}">
                                <i class="fas fa-calendar-check me-2"></i>
                                Reservaciones
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{  route('modules.huesped.index') }}">
                                <i class="fas fa-users me-2"></i>
                                Huéspedes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-concierge-bell me-2"></i>
                                Servicios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-user-tie me-2"></i>
                                Personal
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-chart-bar me-2"></i>
                                Reportes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-cog me-2"></i>
                                Configuración
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Contenido Principal -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5">
                @yield('contenido')
            </main>
        </div>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Función para añadir sombra al navbar al desplazarse
        const handleNavbarScroll = () => {
            const navbar = document.getElementById('main-navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        };

        // Función para resaltar el enlace activo en la barra de navegación y sidebar
        const highlightActiveLink = () => {
            const currentLocation = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-link');
            
            navLinks.forEach(link => {
                // Eliminar clases activas
                link.classList.remove('active');
                
                // Verificar si la ubicación coincide con el enlace
                const href = link.getAttribute('href');
                if (href && href !== '#' && currentLocation.includes(href)) {
                    link.classList.add('active');
                }
            });
        };

        // Función para alternar la visibilidad del sidebar
        const toggleSidebar = () => {
            const navbarToggler = document.querySelector('.navbar-toggler');
            const sidebar = document.getElementById('sidebar');
            
            navbarToggler.addEventListener('click', function() {
                sidebar.classList.toggle('show');
            });
        };

        // Función para navegación suave
        const enableSmoothNavigation = () => {
            const navLinks = document.querySelectorAll('.nav-link');
            
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    
                    // Si es un enlace interno y no es '#'
                    if (href && href !== '#') {
                        // Navegación suave
                        window.location.href = href;
                    }
                    
                    // Desplazamiento suave a la parte superior
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            });
        };

        // Inicializar funciones
        handleNavbarScroll();
        highlightActiveLink();
        toggleSidebar();
        enableSmoothNavigation();

        // Evento de desplazamiento para efecto de sombra
        window.addEventListener('scroll', handleNavbarScroll);
        window.addEventListener('load', highlightActiveLink);
    });
    </script>
</body>
</html>
