@extends('layouts.main')
@section('title', 'CRUD - Reservas | Show')
@section('contenido')

<div class="container -mt-4 mb-4">
    <h2 name="titulo" class="text-center" style="color: white; font-size: 2rem;">Detalles de Reserva</h2>
    <div class="row">
        <div class="col-md-12"> 
            <div class="div">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover table-bordered text-center table-sm">
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
                                    <td>${{ number_format($reserva->monto_total, 0, ',', '.') }}</td>                                    <td>{{ $reserva->estado }}</td>
                                    
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('modules.reservas.index') }}" class="btn btn-secondary mt-2">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection