<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Huesped extends Model
{
    protected $table = 'huespedes';

    protected $fillable = [
        'nombre',
        'tipo_documento',
        'numero_documento',
        'telefono',
        'email',
        'direccion',
        'fecha_nacimiento',
        'nacionalidad'
    ];

    // Relaciones si son necesarias
    public function reservas()
    {
        return $this->hasMany(Reservas::class, 'numero_documento', 'numero_documento');
    }
}   