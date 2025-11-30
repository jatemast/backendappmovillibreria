<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutorController extends Controller
{
     public function index() { return Autor::all(); }

    public function show($id) { return Autor::findOrFail($id); }

    public function store(Request $request) {
        return Autor::create($request->all());
    }

    public function update(Request $request, $id) {
        $autor = Autor::findOrFail($id);
        $autor->update($request->all());
        return $autor;
    }

    public function destroy($id) {
        Autor::destroy($id);
        return response()->json(['message'=>'Autor eliminado']);
    }
}
