@extends('layouts.main')
@section('title', 'CRUD - Reservas | Create')
@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Agregar Reserva</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('store') }}"enctype="multipart/form-data" novalidate method="POST">                        @csrf
                        @method('POST')
                        
                        <!-- Información básica del huésped -->
                        <h4 class="mb-3">Información del Huésped</h4>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nombre_huesped" class="form-label">Nombre Huésped *</label>
                                <input type="text" class="form-control" id="nombre_huesped" name="nombre_huesped" required>
                            </div>
                            <div class="col-md-6">
                                <label for="tipo_documento" class="form-label">Dirección *</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>

                        <!-- Número de documento (común para todos) -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="numero_documento" id="label_documento" class="form-label">Número de Documento *</label>
                                <input type="text" class="form-control" id="numero_documento" name="numero_documento" required>
                            </div>
                        </div>

                        <!-- Información de la reserva -->
                        <h4 class="mt-4">Detalles de la Reserva</h4>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="fecha_entrada" class="form-label"  required >Fecha de Entrada *</label>
                                <input type="date" class="form-control flatpickr" id="fecha_entrada" name="fecha_entrada" required>
                            </div>
                            <div class="col-md-6">
                                <label for="fecha_salida" class="form-label">Fecha de Salida *</label>
                                <input type="date" class="form-control flatpickr" id="fecha_salida" name="fecha_salida" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="numero_huespedes" class="form-label">Número de Huéspedes *</label>
                                <input type="number" class="form-control" id="numero_huespedes" name="numero_huespedes" required>
                            </div>
                            <div class="col-md-4">
                                <label for="ninos" class="form-label">Niños</label>
                                <input type="number" class="form-control" id="ninos" name="ninos" value="0">
                            </div>
                            <div class="col-md-4">
                                <label for="tipo_habitacion" class="form-label">Tipo de Habitación *</label>
                                <select class="form-select" id="tipo_habitacion" name="tipo_habitacion" required>
                                    <option value="">Seleccione tipo</option>
                                    <option value="individual">Individual</option>
                                    <option value="doble">Doble</option>
                                    <option value="suite">Suite</option>
                                </select>
                            </div>
                        </div>

                        <!-- Información de contacto -->
                        <h4 class="mt-4">Información de Contacto</h4>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="telefono_contacto" class="form-label">Teléfono de Contacto *</label>
                                <input type="tel" class="form-control" id="telefono_contacto" name="telefono_contacto" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email_contacto" class="form-label">Correo Electrónico de Contacto *</label>
                                <input type="email" class="form-control" id="email_contacto" name="email_contacto" required>
                            </div>
                        </div>

                        <!-- Información de pago -->
                        <h4 class="mt-4">Información de Pago</h4>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="metodo_pago" class="form-label">Método de Pago *</label>
                                <select class="form-select" id="metodo_pago" name="metodo_pago" required>
                                    <option value="">Seleccione método</option>
                                    <option value="efectivo">Efectivo</option>
                                    <option value="tarjeta">Tarjeta de Crédito/Débito</option>
                                    <option value="transferencia">Transferencia Bancaria</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="monto_total" class="form-label">Monto Total *</label>
                                <input type="text" name="monto_total" class="form-control" id="monto_total" required oninput="formatPrice(this)">
                            </div>
                            <div class="col-md-4">
                                <label for="esta_confirmada" class="form-label">Estado de Confirmación *</label>
                                <select class="form-select" id="estado" name="estado" required>
                                    <option value="">Seleccione estado</option>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Activa">Activa</option>
                                    <option value="Cancelada">Cancelada</option>
                                </select>
                            </div>
                        </div>

                        <!-- Botones de acción -->
                        <div class="mt-4">
                            <button class="btn btn-primary">Crear Reserva</button>
                            <a href="{{ route('modules.reservas.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// Inicializa flatpickr en los campos de fecha
// Inicializa flatpickr en los campos de fecha
document.addEventListener('DOMContentLoaded', function () {
    flatpickr('.flatpickr', {
        dateFormat: 'Y-m-d',  // Formato de fecha que se enviará al servidor
        altFormat: 'j F, Y',  // Formato que se mostrará en el campo (día completo, mes con letras, año)
        altInput: true,        // Utiliza un campo alternativo para mostrar la fecha en letras
        minDate: 'today',      // Limitar para que solo se pueda seleccionar una fecha futura
        disableMobile: true,   // Deshabilitar la vista móvil
        locale: 'es',          // Establece el idioma en español
    });
});

</script>


@endsection