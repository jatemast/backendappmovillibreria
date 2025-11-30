<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::with(['autor', 'categoria'])->get();
        return response()->json([
            'status' => true,
            'libros' => $libros
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:200',
            'autor_id' => 'required|exists:autores,id',
            'categoria_id' => 'required|exists:categorias,id',
            'isbn' => 'nullable|string|max:255|unique:libros,isbn',
            'editorial' => 'nullable|string|max:150',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'fecha_publicacion' => 'nullable|date',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|string', // Considerar validación para URL o base64 si es el caso
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 400);
        }

        $libro = Libro::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Libro creado exitosamente',
            'libro' => $libro
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $libro = Libro::with(['autor', 'categoria'])->find($id);

        if (!$libro) {
            return response()->json([
                'status' => false,
                'message' => 'Libro no encontrado'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'libro' => $libro
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $libro = Libro::find($id);

        if (!$libro) {
            return response()->json([
                'status' => false,
                'message' => 'Libro no encontrado'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'titulo' => 'sometimes|required|string|max:200',
            'autor_id' => 'sometimes|required|exists:autores,id',
            'categoria_id' => 'sometimes|required|exists:categorias,id',
            'isbn' => 'nullable|string|max:255|unique:libros,isbn,' . $id,
            'editorial' => 'nullable|string|max:150',
            'precio' => 'sometimes|required|numeric|min:0',
            'stock' => 'sometimes|required|integer|min:0',
            'fecha_publicacion' => 'nullable|date',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 400);
        }

        $libro->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Libro actualizado exitosamente',
            'libro' => $libro
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $libro = Libro::find($id);

        if (!$libro) {
            return response()->json([
                'status' => false,
                'message' => 'Libro no encontrado'
            ], 404);
        }

        $libro->delete();

        return response()->json([
            'status' => true,
            'message' => 'Libro eliminado exitosamente'
        ], 200);
    }
}
