<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombre', 'descripcion',
    ];

    public function waffles()
    {
        return $this->hasMany(Waffle::class);
    }
}
