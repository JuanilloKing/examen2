<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ce extends Model
{
    /** @use HasFactory<\Database\Factories\CeFactory> */
    use HasFactory;

    protected $table = 'ccee';

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }
}
