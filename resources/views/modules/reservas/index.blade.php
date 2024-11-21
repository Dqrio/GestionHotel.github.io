@extends('layouts.main')
@section('title', 'CRUD - Reservas | Index')
@section('contenido')

    <h1 class="h2">Gestión de Reservas</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('modules.reservas.create') }}" class="btn btn-primary">
            <i class="fa fa-plus me-2"></i>Nueva Reserva
        </a>
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

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
