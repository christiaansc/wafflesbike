<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaDetalle extends Model
{
    protected $fillable = [
        'fecha_venta',           
        'precio',             
        'cantidad', 
        'descuento',                        
        'venta_id',             
        'waffle_id',             
    ];

 
    public function waffle()
    {
        return $this->belongsTo(Waffle::class);
    }
    

}
