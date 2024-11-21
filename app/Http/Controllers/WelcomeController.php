<?php

namespace App\Http\Controllers;

use App\Models\Reservas;  // Asegúrate de importar el modelo de Reservas
use App\Models\Habitaciones;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    // Función principal que se llama en la vista
    public function index()
    {
        // Obtener habitaciones disponibles
        $habitacionesDisponibles = $this->habitacionesDisponibles();

        // Obtener reservas de hoy
        $reservasHoy = $this->reservasHoy();

        // Obtener reservas actuales
        $reservasActuales = $this->reservasActuales();

        // Calcular ocupación
        $ocupacion = $this->calcularOcupacion();

        // Obtener reservas recientes (últimos 7 días)
        $reservasRecientes = $this->reservasRecientes();

        // Pasar todas las variables a la vista
        return view('welcome', compact(
            'habitacionesDisponibles',
            'reservasHoy',
            'reservasActuales',
            'ocupacion',
            'reservasRecientes'
        ));
    }

    // Función para contar las habitaciones disponibles
    private function habitacionesDisponibles()
    {
        $count = Habitaciones::where('estado', 'Disponible')->count();
        return $count > 0 ? $count : 'No hay habitaciones disponibles';
    }

    // Función para contar las reservas de hoy
    private function reservasHoy()
    {
        $fechaHoy = now()->toDateString();
        $count = Reservas::whereDate('fecha_entrada', '<=', $fechaHoy)
                         ->whereDate('fecha_salida', '>=', $fechaHoy)
                         ->count();
        return $count > 0 ? $count : 'No hay reservas para hoy';
    }

    // Función para contar las reservas actuales
    private function reservasActuales()
    {
        $fechaHoy = now()->toDateString();
        $count = Reservas::whereDate('fecha_entrada', '<=', $fechaHoy)
                         ->whereDate('fecha_salida', '>=', $fechaHoy)
                         ->where('estado', 'Activa')
                         ->count();
        return $count > 0 ? $count : 'No hay reservas actuales';
    }

    // Función para calcular la ocupación
    private function calcularOcupacion()
    {
        $fechaHoy = now()->toDateString(); // Fecha actual

        // Contar habitaciones ocupadas actualmente
        $habitacionesOcupadas = Reservas::whereDate('fecha_entrada', '<=', $fechaHoy)
                                        ->whereDate('fecha_salida', '>=', $fechaHoy)
                                        ->where('estado', 'Activa')
                                        ->count();

        // Contar el total de habitaciones
        $totalHabitaciones = Habitaciones::count();

        // Calcular ocupación
        return $totalHabitaciones > 0 
               ? round(($habitacionesOcupadas / $totalHabitaciones) * 100, 2)
               : 0; // Evitar división por 0
    }

    // Función para obtener las reservas recientes (últimos 7 días)
    private function reservasRecientes()
    {
        $fechaHoy = now()->toDateString(); // Fecha actual
        return Reservas::where('estado', 'Activa')  // O el estado que sea pertinente
                       ->where('fecha_entrada', '>=', now()->subDays(1))  // Reservas de los últimos 7 días
                       ->orderBy('fecha_entrada', 'desc')  // Ordenar por fecha de entrada
                       ->take(1)  // Tomar las 5 más recientes
                          ->paginate();
    }
}
