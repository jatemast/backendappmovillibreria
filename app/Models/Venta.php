<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
   protected $primaryKey = 'id_venta';
    protected $fillable = ['fecha','total'];

    public function detalle()
    {
        return $this->hasMany(DetalleVenta::class, 'id_venta');
    }
}
