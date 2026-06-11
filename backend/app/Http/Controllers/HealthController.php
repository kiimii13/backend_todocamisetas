<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class HealthController extends Controller
{
    #[OA\Get(
        path: "/health",
        summary: "Verificar estado de la API",
        description: "Endpoint de monitoreo para comprobar que la API se encuentra operativa.",
        tags: ["Health"],
        responses: [
            new OA\Response(
                response: 200,
                description: "API funcionando correctamente"
            )
        ]
    )]
    public function index(): JsonResponse
    {
        return response()->json([
            'status' => 'online',
            'service' => 'TodoCamisetas API',
            'version' => '1.0.0'
        ]);
    }
}
