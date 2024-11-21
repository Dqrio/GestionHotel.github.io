<?php

namespace App\Http\Controllers;

use App\Models\habitaciones;
use Illuminate\Http\Request;

class HabitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $habitaciones = Habitaciones::paginate(3);
        return view('modules.habitaciones.index', compact('habitaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.habitaciones.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $habitacion = new Habitaciones();
    $habitacion->numero_habitacion = $request->numero_habitacion;
    $habitacion->tipo_habitacion = $request->tipo_habitacion;
    $habitacion->precio = $request->precio;
    $habitacion->estado = $request->estado;
    $habitacion->capacidad = $request->capacidad;
    $habitacion->caracteristicas = $request->caracteristicas;
    $habitacion->save();

return to_route('habitaciones.index');
}


    /**
     * Display the specified resource.
     */
    public function show(habitaciones $habitaciones , string $id)
    {
        $habitaciones = Habitaciones::find($id);
        return view('modules.habitaciones.show', compact('habitaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(habitaciones $habitaciones, string $id)
    {
        $habitaciones = Habitaciones::find($id);
        return view('modules.habitaciones.edit', compact('habitaciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, habitaciones $habitaciones, string $id)
    {
        $habitaciones = Habitaciones::find($id);	
        $habitaciones->numero_habitacion = $request->numero_habitacion;
        $habitaciones->tipo_habitacion = $request->tipo_habitacion;
        $habitaciones->precio = $request->precio;
        $habitaciones->estado = $request->estado;
        $habitaciones->capacidad = $request->capacidad;
        $habitaciones->caracteristicas = $request->caracteristicas;
        $habitaciones->save();
        return to_route('habitaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(habitaciones $habitaciones, string $id)
    {
        $habitaciones = Habitaciones::find($id);
        $habitaciones->delete();
        return to_route('modules.habitaciones.index');
    }
    public function obtenerHabitacionesDisponibles( )
    {
        // Obtener el número de habitaciones disponibles
        $habitacionesDisponibles = Habitaciones::where('estado', 'Disponible')->count();
        // Pasar la variable a la vista
        return view('welcome', compact('habitacionesDisponibles'));
    }
}
