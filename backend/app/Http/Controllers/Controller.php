<?php

namespace App\Http\Controllers;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: "1.0.0",
    title: "API TodoCamisetas",
    description: "API RESTful para la gestión de camisetas de fútbol, clientes B2B y tallas. Permite administrar inventario, clientes y calcular precios finales según las reglas de negocio definidas para clientes preferenciales."
)]

#[OA\Server(
    url: "http://localhost:8000/api",
    description: "Servidor local Docker"
)]

abstract class Controller
{
    //
}
