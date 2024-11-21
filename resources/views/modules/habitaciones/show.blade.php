@extends('layouts.main')
@section('title', 'CRUD - Habitaciones | Show')

<div class="container -mt-4 mb-4">
    <h2 name="titulo" class="text-center" style="color: white; font-size: 2rem;">Detalle de la Habitación</h2>
    <div class="row">
        <div class="col-md-12"> 
            <div class="div">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover table-bordered text-center table table-sm">
                            <thead>
                                <tr>
                                    <th>Número de Habitación</th>
                                    <th>Tipo de Habitación</th>
                                    <th>Precio</th>
                                    <th>Estado</th>
                                    <th>Capacidad</th>
                                    <th>Caracteristicas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $habitaciones->numero_habitacion }}</td>
                                    <td>{{ $habitaciones->tipo_habitacion }}</td>
                                    <td>{{ $habitaciones->precio }}</td>
                                    <td>{{ $habitaciones->estado }}</td>
                                    <td>{{ $habitaciones->capacidad }}</td>
                                    <td>{{ $habitaciones->caracteristicas }}</td>
                                </tr>
                            </tbody>

                        </table>
                        <a href="{{ route('habitaciones.index') }}" class="btn btn-secondary mt-2">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>