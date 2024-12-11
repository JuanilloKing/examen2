<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    /** @use HasFactory<\Database\Factories\NotaFactory> */
    use HasFactory;

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

    public function ce()
    {
        return $this->belongsto(Ce::class);
    }
}
