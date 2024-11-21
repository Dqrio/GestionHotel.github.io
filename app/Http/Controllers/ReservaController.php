<?php

namespace App\Http\Controllers;

use App\Models\Reservas;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reservas::latest()->paginate(10);
        return view('modules.reservas.index', compact('reservas'));
    }


    public function create( Request $request )
    {
        $tiposHabitacion = Reservas::TIPOS_HABITACION;
        $metodosPago = Reservas::METODOS_PAGO;
        
        return view('modules.reservas.create', compact( 'tiposHabitacion', 'metodosPago'));
    }

    public function store(Request $request)
    {
        $reserva = new Reservas;
        $reserva->nombre_huesped = $request->nombre_huesped;
        $reserva->numero_documento = $request->numero_documento;
        $reserva->direccion = $request->direccion;
        $reserva->fecha_entrada = $request->fecha_entrada;
        $reserva->fecha_salida = $request->fecha_salida;
        $reserva->numero_huespedes = $request->numero_huespedes;
        $reserva->ninos = $request->ninos;
        $reserva->tipo_habitacion = $request->tipo_habitacion ?? 'individual';
        $reserva->telefono_contacto = $request->telefono_contacto;
        $reserva->email_contacto = $request->email_contacto;
        $reserva->metodo_pago = $request->metodo_pago;
        $reserva->monto_total = $request->monto_total;
        $reserva->estado = $request->estado ?? 'Pendiente';
        $reserva->save();

        return redirect()->route('modules.reservas.index')->with('success', 'Reserva creada exitosamente');
    }    

    public function show(reservas $reserva, string $id)
    {
        $reserva = Reservas::find($id);
        return view('modules.reservas.show', compact('reserva'));
    }

    public function edit(reservas $reserva, string $id)
    {
        $reserva = Reservas::find($id);
        return view('modules.reservas.edit', compact('reserva'));
    }
    public function update(Request $request, reservas $reserva, string $id)
    {
        $reserva = Reservas::find($id);
        $reserva->nombre_huesped = $request->nombre_huesped;
        $reserva->numero_documento = $request->numero_documento;
        $reserva->direccion = $request->direccion;
        $reserva->fecha_entrada = $request->fecha_entrada;
        $reserva->fecha_salida = $request->fecha_salida;
        $reserva->numero_huespedes = $request->numero_huespedes;
        $reserva->ninos = $request->ninos;
        $reserva->tipo_habitacion = $request->tipo_habitacion;
        $reserva->telefono_contacto = $request->telefono_contacto;
        $reserva->email_contacto = $request->email_contacto;
        $reserva->metodo_pago = $request->metodo_pago;
        $reserva->monto_total = $request->monto_total;
        $reserva->estado = $request->estado;
        $reserva->save();
        return to_route('modules.reservas.index');
    }
    public function destroy(reservas $reserva, string $id)
    {
        $reserva = Reservas::find($id);
        $reserva->delete();
        return to_route('modules.reservas.index');
    }
}

