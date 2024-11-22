<?php

namespace App\Http\Controllers;

use App\Models\Reservas;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HuespedController extends Controller
{
    public function index(Request $request)
    {
        // Base query to fetch reservas excluding 'Cancelada' state and with a future 'fecha_salida'
        $filtro = Reservas::select('reservas.*')
            ->where('reservas.estado', '!=', 'Cancelada')
            ->where('reservas.fecha_salida', '>=', Carbon::now())  // Only future reservations
            ->orderBy('reservas.fecha_entrada', 'desc');  // Order by entry date (desc)
    
        // Verificar si hay contenido en el campo 'query'
        if ($request->has('query') && $request->get('query') != '') {
            $query = $request->get('query');
    
            // Si el contenido es numérico, busca por número de documento
            if (is_numeric($query)) {
                $filtro->where('reservas.numero_documento', '=', $query);
            } else { // Si no es numérico, busca por nombre
                $filtro->where('reservas.nombre_huesped', 'like', '%' . $query . '%');
            }
        }
    
        // Execute the query and get the filtered results
        $reservas = $filtro->paginate(10);  // Paginate to show 10 results per page
    
        // Return the view with the filtered results
        return view('modules.huesped.index', compact('reservas'));
    }
    





    //      public function create()
    // {
    //     return view('reservas.create');
    // }

    

    // public function edit(Reservas $reserva)
    // {
    //     return view('reservas.edit', compact('reserva'));
    // }

    // public function update(Request $request, Reservas $reserva)
    // {
    //     $validatedData = $request->validate([
    //         'nombre_huesped' => 'required|string|max:255',
    //         'numero_documento' => 'required|integer',
    //         'direccion' => 'required|string|max:255',
    //         'fecha_entrada' => 'required|date',
    //         'fecha_salida' => 'required|date|after:fecha_entrada',
    //         'numero_huespedes' => 'required|integer|min:1',
    //         'ninos' => 'nullable|integer|min:0',
    //         'tipo_habitacion' => 'required|in:individual,doble,suite',
    //         'telefono_contacto' => 'required|string',
    //         'email_contacto' => 'required|email',
    //         'metodo_pago' => 'required|in:efectivo,tarjeta,transferencia',
    //         'monto_total' => 'required|integer|min:0',
    //         'estado' => 'nullable|in:Pendiente,Activa,Cancelada'
    //     ]);

    //     $reserva->update($validatedData);

    //     return redirect()->route('modules.reservas.index')
    //         ->with('success', 'Reserva actualizada exitosamente');
    // }

    // public function destroy(Reservas $reserva)
    // {
    //     $reserva->delete();

    //     return redirect()->route('modules.reservas.index')
    //         ->with('success', 'Reserva eliminada exitosamente');
    // }
}