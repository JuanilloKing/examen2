<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    /** @use HasFactory<\Database\Factories\ArticuloFactory> */
    use HasFactory;

    public function departamentos()
    {
        return $this->belongsToMany(Departamento::class);
    }
}
