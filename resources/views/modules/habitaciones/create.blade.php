@extends('layouts.main')
@section('title', 'CRUD - Habitaciones | Create')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('modules.habitaciones.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <label for="numero_habitacion">Número de Habitación</label>
                        <input type="text" name="numero_habitacion" id="numero_habitacion" class="form-control" required>

                        <label for="tipo_habitacion">Tipo de Habitación</label>
                        <select name="tipo_habitacion" id="tipo_habitacion" class="form-control" required>
                            <option value="">Seleccionar</option>
                            <option value="individual">Individual</option>
                            <option value="doble">Doble</option>
                            <option value="suite">Suite</option>
                        </select>

                        
                        <label for="precio">Precio</label>
                        <input type="number" name="precio" id="precio" class="form-control" required>

                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option value="1">Disponible</option>
                            <option value="2">Ocupada</option>
                            <option value="3">Reservada</option>
                            <option value="4">Mantenimiento</option>
                            <option value="5">Fuera de Servicio</option>
                        </select>

                        <label for="capacidad">Capacidad</label>
                        <input type="number" name="capacidad" id="capacidad" class="form-control" required>
                        
                        <label for="caracteristicas">Caracteristicas</label>
                        <textarea name="caracteristicas" id="caracteristicas" class="form-control"></textarea>

                        <button type="submit" class="btn btn-primary mt-2">Crear</button>
                        <a href="{{ route('habitaciones.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
