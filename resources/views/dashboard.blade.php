@extends('layouts.main')

@section('title', 'Dashboard')

@section('contenido')
    <!-- Section: Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            <i class="fas fa-tachometer-alt me-2 text-primary"></i>Dashboard
        </h1>
    </div>

    <!-- Section: Stats Cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 dashboard-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Habitaciones Disponibles
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $habitacionesDisponibles }}</div> 
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bed fa-2x text-primary-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 dashboard-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Reservas Hoy
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $reservasHoy }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-check fa-2x text-success-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2 dashboard-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Ocupación
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $ocupacion > 0 ? $ocupacion . '%' : 'No hay datos de ocupación' }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-percentage fa-2x text-info-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 dashboard-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Reservas Actuales
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $reservasActuales }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-warning-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section: Recent Bookings Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-list-ul me-2"></i>Reservas Recientes
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Huésped</th>
                            <th>Numero de Documento</th>
                            <th>Fecha de Entrada</th>
                            <th>Fecha de Salida</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservasRecientes as $reserva)
                            <tr>
                                <td>{{ $reserva->id }}</td>
                                <td>{{ $reserva->nombre_huesped }}</td>
                                <td>{{ $reserva->numero_documento }}</td>
                                <td>{{ $reserva->fecha_entrada }}</td>
                                <td>{{ $reserva->fecha_salida }}</td>
                                <td>{{$reserva->estado}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Acciones reserva" style="display: flex; gap: 10px;">
                                        <!-- Botón Editar con borde redondeado a la izquierda -->
                                        <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-info" data-bs-toggle="tooltip" title="Editar" style="border-radius: 10px 0 0 10px;">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <!-- Botón Eliminar con borde redondeado a la derecha -->
                                        <form action="{{ route('reservas.destroy', $reserva->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" title="Eliminar" style="border-radius: 0 10px 10px 0;">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Paginación -->
                {{ $reservasRecientes->links() }}
            </div>
        </div>
    </div>
@endsection
