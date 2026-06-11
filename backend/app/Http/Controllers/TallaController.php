<?php

namespace App\Http\Controllers;

use App\Models\Talla;
use Illuminate\Http\Request;

class TallaController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Talla::where('activo', true)->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:tallas,nombre'
        ]);

        $talla = Talla::create([
            'nombre' => $request->nombre,
            'activo' => true
        ]);

        return response()->json([
            'success' => true,
            'data' => $talla
        ], 201);
    }

    public function show(Talla $talla)
    {
        return response()->json([
            'success' => true,
            'data' => $talla
        ]);
    }

    public function update(Request $request, Talla $talla)
    {
        $request->validate([
            'nombre' => 'required|unique:tallas,nombre,' . $talla->id
        ]);

        $talla->update([
            'nombre' => $request->nombre
        ]);

        return response()->json([
            'success' => true,
            'data' => $talla
        ]);
    }

    public function destroy(Talla $talla)
    {
        $talla->activo = false;
        $talla->save();

        return response()->json([
            'success' => true,
            'message' => 'Talla desactivada correctamente'
        ]);
    }
}
