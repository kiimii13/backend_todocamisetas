<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Camiseta extends Model
{
    protected $table = 'camisetas';

    protected $fillable = [
        'titulo',
        'club',
        'pais',
        'tipo',
        'color',
        'precio',
        'precio_oferta',
        'detalles',
        'sku',
        'activo'
    ];

    public function tallas()
    {
        return $this->belongsToMany(
            Talla::class,
            'camiseta_talla'
        );
    }
}
