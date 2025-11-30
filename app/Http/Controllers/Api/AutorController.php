<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autores = \App\Models\Autor::all();
        return response()->json($autores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'pais' => 'nullable|string|max:255',
        ]);

        $autor = \App\Models\Autor::create($request->all());
        return response()->json(['message' => 'Autor creado exitosamente', 'autor' => $autor], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $autor = \App\Models\Autor::find($id);
        if (!$autor) {
            return response()->json(['message' => 'Autor no encontrado'], 404);
        }
        return response()->json($autor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $autor = \App\Models\Autor::find($id);
        if (!$autor) {
            return response()->json(['message' => 'Autor no encontrado'], 404);
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'pais' => 'nullable|string|max:255',
        ]);

        $autor->update($request->all());
        return response()->json(['message' => 'Autor actualizado exitosamente', 'autor' => $autor]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $autor = \App\Models\Autor::find($id);
        if (!$autor) {
            return response()->json(['message' => 'Autor no encontrado'], 404);
        }

        $autor->delete();
        return response()->json(['message' => 'Autor eliminado exitosamente'], 204);
    }
}
