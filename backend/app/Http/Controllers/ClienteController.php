<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Cliente::where('activo', true)->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_comercial' => 'required',
            'rut' => 'required|unique:clientes,rut',
            'direccion' => 'required',
            'categoria' => 'required',
            'contacto_nombre' => 'required',
            'contacto_email' => 'required|email'
        ]);

        $cliente = Cliente::create([
            ...$request->all(),
            'activo' => true
        ]);

        return response()->json([
            'success' => true,
            'data' => $cliente
        ], 201);
    }

    public function show(Cliente $cliente)
    {
        return response()->json([
            'success' => true,
            'data' => $cliente
        ]);
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre_comercial' => 'required',
            'rut' => 'required|unique:clientes,rut,' . $cliente->id,
            'direccion' => 'required',
            'categoria' => 'required',
            'contacto_nombre' => 'required',
            'contacto_email' => 'required|email'
        ]);

        $cliente->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $cliente
        ]);
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->activo = false;
        $cliente->save();

        return response()->json([
            'success' => true,
            'message' => 'Cliente desactivado correctamente'
        ]);
    }
}
