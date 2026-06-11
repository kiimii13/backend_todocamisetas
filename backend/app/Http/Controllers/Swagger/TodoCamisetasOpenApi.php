<?php

namespace App\Http\Controllers\Swagger;

use OpenApi\Attributes as OA;

#[OA\Tag(
    name: "Clientes",
    description: "Gestión de clientes B2B"
)]
#[OA\Tag(
    name: "Camisetas",
    description: "Gestión de camisetas disponibles"
)]
#[OA\Tag(
    name: "Tallas",
    description: "Gestión de tallas"
)]

#[OA\Get(
    path: "/v1/clientes",
    tags: ["Clientes"],
    summary: "Listar clientes",
    responses: [
        new OA\Response(
            response: 200,
            description: "Listado de clientes obtenido correctamente"
        )
    ]
)]
#[OA\Post(
    path: "/v1/clientes",
    tags: ["Clientes"],
    summary: "Crear cliente",
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: "nombre", type: "string", example: "90minutos"),
                new OA\Property(property: "tipo_cliente", type: "string", example: "Preferencial"),
                new OA\Property(property: "activo", type: "boolean", example: true)
            ]
        )
    ),
    responses: [
        new OA\Response(response: 201, description: "Cliente creado correctamente"),
        new OA\Response(response: 422, description: "Error de validación")
    ]
)]
#[OA\Get(
    path: "/v1/clientes/{cliente}",
    tags: ["Clientes"],
    summary: "Mostrar cliente por ID",
    parameters: [
        new OA\Parameter(
            name: "cliente",
            in: "path",
            required: true,
            schema: new OA\Schema(type: "integer"),
            example: 1
        )
    ],
    responses: [
        new OA\Response(response: 200, description: "Cliente encontrado"),
        new OA\Response(response: 404, description: "Cliente no encontrado")
    ]
)]
#[OA\Put(
    path: "/v1/clientes/{cliente}",
    tags: ["Clientes"],
    summary: "Actualizar cliente",
    parameters: [
        new OA\Parameter(
            name: "cliente",
            in: "path",
            required: true,
            schema: new OA\Schema(type: "integer"),
            example: 1
        )
    ],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: "nombre", type: "string", example: "90minutos"),
                new OA\Property(property: "tipo_cliente", type: "string", example: "Preferencial"),
                new OA\Property(property: "activo", type: "boolean", example: true)
            ]
        )
    ),
    responses: [
        new OA\Response(response: 200, description: "Cliente actualizado correctamente"),
        new OA\Response(response: 422, description: "Error de validación")
    ]
)]
#[OA\Delete(
    path: "/v1/clientes/{cliente}",
    tags: ["Clientes"],
    summary: "Eliminar cliente",
    parameters: [
        new OA\Parameter(
            name: "cliente",
            in: "path",
            required: true,
            schema: new OA\Schema(type: "integer"),
            example: 1
        )
    ],
    responses: [
        new OA\Response(response: 200, description: "Cliente eliminado correctamente")
    ]
)]

#[OA\Get(
    path: "/v1/camisetas",
    tags: ["Camisetas"],
    summary: "Listar camisetas",
    parameters: [
        new OA\Parameter(
            name: "cliente_id",
            in: "query",
            required: false,
            description: "ID del cliente para calcular precio final",
            schema: new OA\Schema(type: "integer"),
            example: 1
        )
    ],
    responses: [
        new OA\Response(response: 200, description: "Listado de camisetas obtenido correctamente")
    ]
)]
#[OA\Post(
    path: "/v1/camisetas",
    tags: ["Camisetas"],
    summary: "Crear camiseta",
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: "nombre", type: "string", example: "Camiseta titular"),
                new OA\Property(property: "precio", type: "integer", example: 45000),
                new OA\Property(property: "activo", type: "boolean", example: true),
                new OA\Property(
                    property: "tallas",
                    type: "array",
                    items: new OA\Items(type: "integer"),
                    example: [1, 2, 3]
                )
            ]
        )
    ),
    responses: [
        new OA\Response(response: 201, description: "Camiseta creada correctamente"),
        new OA\Response(response: 422, description: "Error de validación")
    ]
)]
#[OA\Get(
    path: "/v1/camisetas/{camiseta}",
    tags: ["Camisetas"],
    summary: "Mostrar camiseta por ID",
    parameters: [
        new OA\Parameter(
            name: "camiseta",
            in: "path",
            required: true,
            schema: new OA\Schema(type: "integer"),
            example: 1
        ),
        new OA\Parameter(
            name: "cliente_id",
            in: "query",
            required: false,
            description: "ID del cliente para calcular precio final",
            schema: new OA\Schema(type: "integer"),
            example: 1
        )
    ],
    responses: [
        new OA\Response(response: 200, description: "Camiseta encontrada"),
        new OA\Response(response: 404, description: "Camiseta no encontrada")
    ]
)]
#[OA\Put(
    path: "/v1/camisetas/{camiseta}",
    tags: ["Camisetas"],
    summary: "Actualizar camiseta",
    parameters: [
        new OA\Parameter(
            name: "camiseta",
            in: "path",
            required: true,
            schema: new OA\Schema(type: "integer"),
            example: 1
        )
    ],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: "nombre", type: "string", example: "Camiseta titular"),
                new OA\Property(property: "precio", type: "integer", example: 45000),
                new OA\Property(property: "activo", type: "boolean", example: true),
                new OA\Property(
                    property: "tallas",
                    type: "array",
                    items: new OA\Items(type: "integer"),
                    example: [1, 2, 3]
                )
            ]
        )
    ),
    responses: [
        new OA\Response(response: 200, description: "Camiseta actualizada correctamente"),
        new OA\Response(response: 422, description: "Error de validación")
    ]
)]
#[OA\Delete(
    path: "/v1/camisetas/{camiseta}",
    tags: ["Camisetas"],
    summary: "Eliminar camiseta",
    parameters: [
        new OA\Parameter(
            name: "camiseta",
            in: "path",
            required: true,
            schema: new OA\Schema(type: "integer"),
            example: 1
        )
    ],
    responses: [
        new OA\Response(response: 200, description: "Camiseta eliminada correctamente")
    ]
)]

#[OA\Get(
    path: "/v1/tallas",
    tags: ["Tallas"],
    summary: "Listar tallas",
    responses: [
        new OA\Response(response: 200, description: "Listado de tallas obtenido correctamente")
    ]
)]
#[OA\Post(
    path: "/v1/tallas",
    tags: ["Tallas"],
    summary: "Crear talla",
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: "nombre", type: "string", example: "M"),
                new OA\Property(property: "activo", type: "boolean", example: true)
            ]
        )
    ),
    responses: [
        new OA\Response(response: 201, description: "Talla creada correctamente"),
        new OA\Response(response: 422, description: "Error de validación")
    ]
)]
#[OA\Get(
    path: "/v1/tallas/{talla}",
    tags: ["Tallas"],
    summary: "Mostrar talla por ID",
    parameters: [
        new OA\Parameter(
            name: "talla",
            in: "path",
            required: true,
            schema: new OA\Schema(type: "integer"),
            example: 1
        )
    ],
    responses: [
        new OA\Response(response: 200, description: "Talla encontrada"),
        new OA\Response(response: 404, description: "Talla no encontrada")
    ]
)]
#[OA\Put(
    path: "/v1/tallas/{talla}",
    tags: ["Tallas"],
    summary: "Actualizar talla",
    parameters: [
        new OA\Parameter(
            name: "talla",
            in: "path",
            required: true,
            schema: new OA\Schema(type: "integer"),
            example: 1
        )
    ],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: "nombre", type: "string", example: "M"),
                new OA\Property(property: "activo", type: "boolean", example: true)
            ]
        )
    ),
    responses: [
        new OA\Response(response: 200, description: "Talla actualizada correctamente"),
        new OA\Response(response: 422, description: "Error de validación")
    ]
)]
#[OA\Delete(
    path: "/v1/tallas/{talla}",
    tags: ["Tallas"],
    summary: "Eliminar talla",
    parameters: [
        new OA\Parameter(
            name: "talla",
            in: "path",
            required: true,
            schema: new OA\Schema(type: "integer"),
            example: 1
        )
    ],
    responses: [
        new OA\Response(response: 200, description: "Talla eliminada correctamente")
    ]
)]
class TodoCamisetasOpenApi
{
}
