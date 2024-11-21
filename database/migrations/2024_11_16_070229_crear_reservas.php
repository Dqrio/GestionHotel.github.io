<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            // Campos base
            $table->id();
            $table->string('nombre_huesped');
            $table->integer('numero_documento') ;
            $table->string('direccion');
            // Información de la reserva
            $table->date('fecha_entrada');
            $table->date('fecha_salida');
            $table->integer('numero_huespedes');
            $table->integer('ninos')->default(0);
            $table->enum('tipo_habitacion', ['individual', 'doble', 'suite']) -> default('individual')->nullable();
            
            // Información de contacto
            $table->string('telefono_contacto');
            $table->string('email_contacto');
            
            // Información de pago
            $table->enum('metodo_pago', ['efectivo', 'tarjeta', 'transferencia']);
            $table->integer('monto_total');
            $table->enum('estado', ['Pendiente', 'Activa', 'Cancelada']) ->default('Pendiente')->nullable();
            
            $table->timestamps();
            
            // Índices
            $table->index('fecha_entrada');
            $table->index('fecha_salida');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};