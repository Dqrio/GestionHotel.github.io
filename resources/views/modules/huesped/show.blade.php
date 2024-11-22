@extends('layouts.app')

@section('content')
<h1>Detalles del Huésped</h1>
<p><strong>ID:</strong> {{ $huesped->id }}</p>
<p><strong>Nombre:</strong> {{ $huesped->nombre_huesped }}</p>
<p><strong>Documento:</strong> {{ $huesped->numero_documento }}</p>
<p><strong>Dirección:</strong> {{ $huesped->direccion }}</p>
<p><strong>Teléfono:</strong> {{ $huesped->telefono_contacto }}</p>
<p><strong>Email:</strong> {{ $huesped->email_contacto }}</p>
<p><strong>Fecha Entrada:</strong> {{ $huesped->fecha_entrada }}</p>
<p><strong>Fecha Salida:</strong> {{ $huesped->fecha_salida }}</p>
<p><strong>Número de Huéspedes:</strong> {{ $huesped->numero_huespedes }}</p>
<p><strong>Niños:</strong> {{ $huesped->ninos }}</p>
<p><strong>Tipo de Habitación:</strong> {{ $huesped->tipo_habitacion }}</p>
<p><strong>Método de Pago:</strong> {{ $huesped->metodo_pago }}</p>
<p><strong>Monto Total:</strong> {{ $huesped->monto_total }}</p>
<p><strong>Estado:</strong> {{ $huesped->estado }}</p>

<a href="{{ route('huesped.index') }}">Volver a la lista</a>
@endsection
