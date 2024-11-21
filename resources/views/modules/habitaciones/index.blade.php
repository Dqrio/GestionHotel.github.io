@extends('layouts.main')
@section('title', 'CRUD - Habitaciones | Index')
@section('contenido')

            <!-- Main content -->
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Gestión de Habitaciones</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="{{ route('modules.habitaciones.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i>Crear Nueva Habitación
                        </a>
                    </div>
                </div>

                <!-- Tabla de Habitaciones -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered text-center">
                                <thead class="bg-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Número de Habitación</th>
                                        <th>Tipo de Habitación</th>
                                        <th>Precio</th>
                                        <th>Estado</th>
                                        <th>Capacidad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($habitaciones as $habitacion)
                                        <tr>
                                            <td>{{ $habitacion->id }}</td>
                                            <td>{{ $habitacion->numero_habitacion }}</td>
                                            <td>{{ $habitacion->tipo_habitacion }}</td>
                                            <td>{{ $habitacion->precio }}</td>
                                            <td>
                                                <span class="badge {{ $habitacion->estado == 'Disponible' ? 'bg-success' : 'bg-danger' }}">
                                                    {{ $habitacion->estado }}
                                                </span>
                                            </td>
                                            <td>{{ $habitacion->capacidad }}</td>
                                            <td>
                                                <form action="{{ route('habitaciones.destroy', $habitacion->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                
                                                    <a href="{{ route('habitaciones.show', $habitacion->id) }}" class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                
                                                    <a href="{{ route('habitaciones.edit', $habitacion->id) }}" class="btn btn-warning btn-sm">
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
                                            <td colspan="8" class="text-center">No hay habitaciones disponibles</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Paginación -->
                        <div class="d-flex justify-content-center mt-3">
                            {{ $habitaciones->links() }}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
@endsection