<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;
    protected $table = 'empleados';
    public $timestamps = false;
    protected $fillable = [
        'codigo',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'tipo_contrato',
        'estado',
        'estatus',
    ];

    public static function getEmpleados()
    {
        return Empleados::where('estatus',1)->get();
    }
}
