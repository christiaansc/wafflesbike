<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'proveedor_id', 'user_id','correo', 'total','estado','fecha_compra',  
    ];
    
    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }
    
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
    public function detallesCompra()
    {
        return $this->hasMany(DetallesCompra::class);
    }
}
