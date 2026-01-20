<?php

namespace App\Models\Juridica;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProcesoJuridico extends Model
{
    use HasFactory;

    protected $table = 'procesos_juridicos';

    protected $fillable = [
        'radicado',
        'titulo',
        'descripcion',
        'estado',
        'fecha_inicio',
        'fecha_fin',
        'entidad',
        'responsable_user_id',
        'documento_path',
        'documento_nombre',
        'documento_mime',
        'documento_size',
        'metadata',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'metadata' => 'array',
        'documento_size' => 'integer',
    ];

    public function responsable(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responsable_user_id');
    }

    public function publicacionesSecop(): HasMany
    {
        return $this->hasMany(PublicacionSecop::class, 'proceso_juridico_id');
    }
}
