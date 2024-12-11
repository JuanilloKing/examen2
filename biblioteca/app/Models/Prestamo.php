<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    /** @use HasFactory<\Database\Factories\PrestamoFactory> */
    use HasFactory;

    public function ejemplar()
    {
        return $this->belongsTo(Ejemplar::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
