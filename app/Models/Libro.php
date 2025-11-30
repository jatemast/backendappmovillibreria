<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
      protected $primaryKey = 'id_libro';
    protected $fillable = [
        'titulo','id_autor','id_categoria','editorial',
        'precio','stock','fecha_publicacion','descripcion','imagen'
    ];

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'id_autor');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
