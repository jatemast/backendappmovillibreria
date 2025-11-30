<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
       protected $primaryKey = 'id_autor';
    protected $fillable = ['nombre','apellido','pais'];

    public function libros()
    {
        return $this->hasMany(Libro::class, 'id_autor');
    }
}
