<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Model_concepto extends Model
{
    use HasFactory;

    protected $table = 'concepto';

    protected $fillable = [
        'concepto',
        'montoMinimo',
        'tipoNacionalidad',
        'estadoConcepto',
        'unidadMovimiento_id',
        'id_usuario',
        'id_tipo',
        'uuid',
    ];

    // Indicar que el campo uuid es único
    public $incrementing = true;

    // Relación con el modelo TipoConcepto
    public function tipoConcepto()
    {
        return $this->belongsTo(TipoConcepto::class, 'id_tipo');
    }

    // Generación automática del UUID
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->uuid) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }
}