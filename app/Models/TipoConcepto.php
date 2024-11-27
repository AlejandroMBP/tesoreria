<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class TipoConcepto extends Model
{
    use HasFactory;

    protected $table = 'tipo_concepto';

    protected $fillable = [
        'descripcion',
        'uuid',
    ];

    // Indicar que el campo uuid es único
    public $incrementing = false;
    protected $keyType = 'string';

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