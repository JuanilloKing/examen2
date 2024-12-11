<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    /** @use HasFactory<\Database\Factories\LibroFactory> */
    use HasFactory;

    protected $fillable = ['codigo', 'titulo', 'autor_id'];

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    public function ejemplares()
    {
        return $this->hasMany(Ejemplar::class);
    }
}
