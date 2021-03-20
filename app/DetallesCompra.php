<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallesCompra extends Model
{
    protected $fillable = [
        'compra_id', 'waffle_id','cantidad', 'total','descuento',    
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

}
