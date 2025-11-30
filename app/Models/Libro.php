<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo', 'autor_id', 'categoria_id', 'isbn', 'fecha_publicacion',
        'precio', 'stock', 'editorial', 'descripcion', 'imagen'
    ];

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor_id', 'id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }
}
