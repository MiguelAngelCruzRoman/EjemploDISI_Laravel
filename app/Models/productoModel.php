<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productoModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'idProducto';
    protected $foreignKey = 'idProveedor';
    protected $table = 'productos';
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'expiracion',
        'stock',
        'idProveedor',
    ];
}
