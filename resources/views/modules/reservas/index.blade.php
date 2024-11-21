<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Admin - Gestión de Reservas</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('welcome') }}">
                <i class="fas fa-hotel me-2"></i>
                Hotel Admin
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
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
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="min-height: calc(100vh - 56px);">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcome') }}">
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
                            <a class="nav-link active" href="{{ route('modules.reservas.index') }}">
                                <i class="fas fa-calendar-check me-2"></i>
                                Reservaciones
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
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

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Gestión de Reservas</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="{{ route('modules.reservas.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i>Nueva Reserva
                        </a>
                    </div>
                </div>

                <!-- Tabla de Reservas -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered text-center">
                                <thead class="bg-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre Huésped</th>
                                        <th>Número de Documento</th>
                                        <th>Dirección</th>
                                        <th>Fecha Entrada</th>
                                        <th>Fecha Salida</th>
                                        <th>N° Huéspedes</th>
                                        <th>Más</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($reservas as $reserva)
                                        <tr>
                                            <td>{{ $reserva->id }}</td>
                                            <td>{{ $reserva->nombre_huesped }}</td>
                                            <td>{{ $reserva->numero_documento }}</td>
                                            <td>{{ $reserva->direccion }}</td>
                                            <td>{{ date('d/m/Y', strtotime($reserva->fecha_entrada)) }}</td>
                                            <td>{{ date('d/m/Y', strtotime($reserva->fecha_salida)) }}</td>
                                            <td>{{ $reserva->numero_huespedes }}</td>
                                            <td class="text-center">
                                                <i class="fas fa-chevron-right"></i>
                                            </td>
                                            <td>
                                                <form action="{{ route('reservas.destroy', $reserva->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                
                                                    <a href="{{ route('reservas.show', $reserva->id) }}" class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                
                                                    <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">No hay reservas registradas</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Paginación -->
                        <div class="d-flex justify-content-center mt-3">
                            {{ $reservas->links() }}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>