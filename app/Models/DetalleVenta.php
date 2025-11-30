<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
        protected $primaryKey = 'id_detalle';
    protected $fillable = ['id_venta','id_libro','cantidad','precio_unitario'];

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'id_libro');
    }
}
