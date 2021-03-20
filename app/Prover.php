<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prover extends Model
{
    protected $fillable = [
        'nombre', 'correo','ruc_number', 'direccion','telefono',
    ];
    public function waffles(){
        return $this->hasMany(Waffle::class);
    }
}
