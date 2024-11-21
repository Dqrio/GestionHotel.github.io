<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->id(); // Campo de ID
            $table->string('numero_habitacion')->unique(); // Número de la habitación
            $table->enum('tipo_habitacion',['individual','doble','suite'] ); // Tipo de habitación
            $table->integer('precio') ; // Precio de la habitación
            $table->enum('estado', ['Disponible', 'Ocupada', 'Reservada', 'Mantenimiento', 'Fuera De Servicio']); // Estado de la habitación
            $table->integer('capacidad'); // Capacidad de la habitación
            $table->text('caracteristicas')->nullable(); // Características de la habitación
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habitaciones');
    }
}
