<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Libro extends Model
{
    protected $table = 'libros';

    protected $fillable = [
        'titulo',
        'resumen',
        'portada',
        'autor_id'
    ];

    public function autor(): BelongsTo
    {
        return $this->belongsTo(Autor::class);
    }
}