<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    /** @use HasFactory<\Database\Factories\AutorFactory> */
    use HasFactory;

    protected $fillable = ['codigo', 'nombre'];

    protected $table = 'autores';

    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}
