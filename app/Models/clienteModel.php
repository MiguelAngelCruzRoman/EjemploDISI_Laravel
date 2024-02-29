<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clienteModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'idCliente';
    protected $foreignKey = 'idProducto';

    protected $table = 'clientes';
    protected $fillable = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'rfc',
        'telefono',
        'correo',
        'direccion',
        'idProducto',
    ];
}
