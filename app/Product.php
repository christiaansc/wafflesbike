<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [     
    'nombre',
    'codigo',
    'stock',
    'image',
    'descripcion',
    'precio',
    'estado',
    'categoria_id',
    'proveedor_id',
    ];

    /**
     * Get the categoria that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function prover()
    {
        return $this->belongsTo(Prover::class);
    }

}
