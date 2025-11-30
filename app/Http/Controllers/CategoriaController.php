<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index() { return Categoria::all(); }
    public function show($id) { return Categoria::findOrFail($id); }
    public function store(Request $r){ return Categoria::create($r->all()); }
    public function update(Request $r,$id){
        $cat = Categoria::findOrFail($id);
        $cat->update($r->all());
        return $cat;
    }
    public function destroy($id){
        Categoria::destroy($id);
        return ['message'=>'Categoría eliminada'];
    }
}
