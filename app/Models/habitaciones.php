<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitaciones extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar de forma masiva.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'capacidad',
        'disponibilidad',
    ];

    /**
     * Los atributos que deben permanecer ocultos para la serialización.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // Agrega aquí atributos si es necesario ocultarlos
    ];

    /**
     * Los atributos que deberían ser convertidos a un tipo de dato específico.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'precio' => 'integer',
            'disponibilidad' => 'boolean',
        ];
    }
}
