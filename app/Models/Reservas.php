<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'reservas';

    /**
     * Los atributos que se pueden asignar de forma masiva.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre_huesped',
        'direccion',
        'numero_documento',
        'fecha_entrada',
        'fecha_salida',
        'numero_huespedes',
        'ninos',
        'tipo_habitacion',
        'telefono_contacto',
        'email_contacto',
        'metodo_pago',
        'monto_total',
        'esta_confirmada'
    ];

    /**
     * Los atributos que deben ser convertidos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha_entrada' => 'date',
        'fecha_salida' => 'date',
        'monto_total' => 'integer',
        'numero_huespedes' => 'integer',
        'ninos' => 'integer',
        'esta_confirmada' => 'boolean',
    ];

    /**
     * Validación de los tipos de habitación permitidos
     */
    public const TIPOS_HABITACION = ['individual', 'doble', 'suite'];

    /**
     * Validación de los métodos de pago permitidos
     */
    public const METODOS_PAGO = ['efectivo', 'tarjeta', 'transferencia'];

    /**
     * Calcula la duración de la estancia en días
     *
     * @return int
     */
    public function getDuracionEstancia(): int
    {
        return $this->fecha_entrada->diffInDays($this->fecha_salida);
    }
}
