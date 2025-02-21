<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class Model_adquisicion_detalle extends Authenticatable
{
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $table = 'adquisicion_valores_detalle';
    protected $fillable = ['id','id_adquisicion_valores','id_concepto_valores','cantidad','correlativo_ini','correlativo_fin','serie','costo','monto_saldo','cantidad_saldo','estado', 'uuid'];

    
    
    
}



