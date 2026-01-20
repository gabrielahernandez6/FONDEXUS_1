<?php

namespace App\Models\Juridica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PublicacionSecop extends Model
{
    use HasFactory;

    protected $table = 'publicaciones_secop';

    protected $fillable = [
        'proceso_juridico_id',
        'secop_id',
        'fuente',
        'titulo',
        'url',
        'fecha_publicacion',
        'valor',
        'entidad',
        'estado',
        'payload',
    ];

    protected $casts = [
        'fecha_publicacion' => 'date',
        'valor' => 'decimal:2',
        'payload' => 'array',
    ];

    public function procesoJuridico(): BelongsTo
    {
        return $this->belongsTo(ProcesoJuridico::class, 'proceso_juridico_id');
    }
}
