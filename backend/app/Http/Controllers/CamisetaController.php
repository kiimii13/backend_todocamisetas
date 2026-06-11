<?php

namespace App\Http\Controllers;

use App\Models\Camiseta;
use App\Models\Cliente;
use Illuminate\Http\Request;

class CamisetaController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Camiseta::with('tallas')
                ->where('activo', true)
                ->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'club' => 'required',
            'pais' => 'required',
            'tipo' => 'required',
            'color' => 'required',
            'precio' => 'required|numeric',
            'sku' => 'required|unique:camisetas,sku'
        ]);

        $camiseta = Camiseta::create([
            ...$request->all(),
            'activo' => true
        ]);

        if ($request->has('tallas')) {
            $camiseta->tallas()->sync($request->tallas);
        }

        return response()->json([
            'success' => true,
            'data' => $camiseta
        ], 201);
    }

    public function show(Request $request, Camiseta $camiseta)
{
    $precioFinal = $camiseta->precio;

    if ($request->has('cliente_id')) {

        $cliente = Cliente::find($request->cliente_id);

        if (
            $cliente &&
            $cliente->categoria === 'Preferencial' &&
            $camiseta->precio_oferta
        ) {
            $precioFinal = $camiseta->precio_oferta;
        }
    }

    $camiseta->load('tallas');

    return response()->json([
        'success' => true,
        'data' => [
            'id' => $camiseta->id,
            'titulo' => $camiseta->titulo,
            'club' => $camiseta->club,
            'pais' => $camiseta->pais,
            'tipo' => $camiseta->tipo,
            'color' => $camiseta->color,
            'precio' => $camiseta->precio,
            'precio_oferta' => $camiseta->precio_oferta,
            'precio_final' => $precioFinal,
            'sku' => $camiseta->sku,
            'tallas' => $camiseta->tallas
        ]
    ]);
}


public function update(Request $request, Camiseta $camiseta)
{
    $request->validate([
        'titulo' => 'required',
        'club' => 'required',
        'pais' => 'required',
        'tipo' => 'required',
        'color' => 'required',
        'precio' => 'required|numeric'
    ]);

    $camiseta->update($request->all());

    if ($request->has('tallas')) {
        $camiseta->tallas()->sync($request->tallas);
    }

    return response()->json([
        'success' => true,
        'data' => $camiseta->load('tallas')
    ]);
}

    public function destroy(Camiseta $camiseta)
    {
        $camiseta->activo = false;
        $camiseta->save();

        return response()->json([
            'success' => true,
            'message' => 'Camiseta desactivada correctamente'
        ]);
    }
}
