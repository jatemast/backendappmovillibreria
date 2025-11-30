<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = \App\Models\Libro::with(['autor', 'categoria'])->get();
        return response()->json($libros);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|exists:autores,id',
            'categoria_id' => 'required|exists:categorias,id',
            'isbn' => 'nullable|string|max:255|unique:libros',
            'editorial' => 'nullable|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'fecha_publicacion' => 'required|date',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|string|max:255',
        ]);

        $libro = \App\Models\Libro::create($request->all());

        return response()->json([
            'message' => 'Libro creado exitosamente',
            'libro' => $libro
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $libro = \App\Models\Libro::with(['autor', 'categoria'])->find($id);
        if (!$libro) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }
        return response()->json($libro);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $libro = \App\Models\Libro::find($id);
        if (!$libro) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }

        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|exists:autores,id',
            'categoria_id' => 'required|exists:categorias,id',
            'isbn' => 'nullable|string|max:255|unique:libros,isbn,' . $id,
            'editorial' => 'nullable|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'fecha_publicacion' => 'required|date',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|string|max:255',
        ]);

        $libro->update($request->all());
        return response()->json(['message' => 'Libro actualizado exitosamente', 'libro' => $libro]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $libro = \App\Models\Libro::find($id);
        if (!$libro) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }

        $libro->delete();
        return response()->json(['message' => 'Libro eliminado exitosamente'], 204);
    }
}
