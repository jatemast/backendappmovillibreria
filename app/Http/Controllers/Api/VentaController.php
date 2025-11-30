<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = \App\Models\Venta::with('user')->get();
        return response()->json($ventas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total' => 'required|numeric|min:0',
            'fecha' => 'required|date',
        ]);

        $venta = \App\Models\Venta::create($request->all());
        return response()->json(['message' => 'Venta creada exitosamente', 'venta' => $venta], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $venta = \App\Models\Venta::with('user')->find($id);
        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }
        return response()->json($venta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $venta = \App\Models\Venta::find($id);
        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total' => 'required|numeric|min:0',
            'fecha' => 'required|date',
        ]);

        $venta->update($request->all());
        return response()->json(['message' => 'Venta actualizada exitosamente', 'venta' => $venta]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $venta = \App\Models\Venta::find($id);
        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }

        $venta->delete();
        return response()->json(['message' => 'Venta eliminada exitosamente'], 204);
    }
}
