<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class Model_stock extends Authenticatable
{
    use HasFactory;

    protected $table = 'b_valores_stock'; 
    protected $fillable = ['id', 'id_concepto_valor', 'cantidad'];

    public function conceptoValor()
    {
        return $this->belongsTo(Model_bodega::class, 'id_concepto_valor', 'id');
    }
}



