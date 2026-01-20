<?php

namespace App\Models\Juridica;

use Database\Factories\LeyVigenteFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeyVigente extends Model
{
    use HasFactory;

    protected $table = 'leyes_vigentes';

    protected $fillable = [
        'codigo',
        'titulo',
        'descripcion',
        'fecha_publicacion',
        'url',
        'estado',
        'tags',
    ];

    protected $casts = [
        'fecha_publicacion' => 'date',
        'tags' => 'array',
    ];

    protected static function newFactory(): LeyVigenteFactory
    {
        return LeyVigenteFactory::new();
    }
}
