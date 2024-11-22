@extends('layouts.main')

@section('title', 'Gestión de Reservas')

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Título principal -->
            <h1 class="mb-4">Gestión de Reservas</h1>

            <!-- Mensaje de éxito, si existe -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tarjeta de la lista de reservas -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- Título de la tarjeta -->
                    <h5 class="card-title mb-0">Lista de Reservas</h5>
                    <!-- Botón para nueva reserva -->
                    <a href="{{ route('modules.reservas.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Nueva Reserva
                    </a>
                </div>

                <!-- Formulario de búsqueda -->
                <form action="{{ route('modules.huesped.index') }}" method="GET" class="d-flex mb-4">
                    <input type="text" name="query" class="form-control me-2" placeholder="Buscar por nombre o número de documento" value="{{ request('query') }}">
                    <button type="submit" class="btn btn-outline-primary">Buscar</button>
                </form>
                
                
                <!-- Tabla de reservas -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombres del Huésped</th>
                                <th>Número de Documento</th>
                                <th>Dirección</th>
                                <th>Fecha de Entrada</th>
                                <th>Fecha de Salida</th>
                                <th>N° Huéspedes</th>
                                <th>Niños</th>
                                <th>Habitación</th>
                                <th>Precio</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Verificar si existen reservas -->
                            @forelse($reservas as $reserva)
                                <tr>
                                    <td>{{ $reserva->id }}</td>
                                    <td>{{ $reserva->nombre_huesped }}</td>
                                    <td>{{ $reserva->numero_documento }}</td>
                                    <td>{{ $reserva->direccion }}</td>
                                    <td>{{ \Carbon\Carbon::parse($reserva->fecha_entrada)->format('d F, Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($reserva->fecha_salida)->locale('es')->format('d F, Y') }}</td>
                                    <td>{{ $reserva->numero_huespedes }}</td>
                                    <td>{{ $reserva->ninos }}</td>
                                    <td>{{ $reserva->tipo_habitacion }}</td>
                                    <td>${{ number_format($reserva->monto_total, 0, ',', '.') }}</td>
                                    <td>{{ $reserva->estado }}</td>
                                </tr>
                            @empty
                                <!-- Si no hay reservas, mostrar mensaje -->
                                <tr>
                                    <td colspan="11" class="text-center">No se encontro ninguna reserva</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Paginación de resultados -->
                {{ $reservas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
