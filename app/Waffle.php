<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waffle extends Model
{

    protected $fillable = [     
        'nombre',
        'codigo',
        'stock',
        'image',
        'descripcion',
        'precio',
        'stado',
        'categoria_id',
        'prover_id',
        ];

    public function prover()
    {
        return $this->belongsTo(Prover::class);
    }
        
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}
