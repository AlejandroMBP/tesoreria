<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class Model_bodega extends Authenticatable
{
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $table = 'concepto_valores'; // Nombre de la tabla
    protected $fillable = ['nombre', 'precio_unitario', 'estado'];

    // Relación inversa con 'Model_stock'
    public function valoresStock()
    {
        return $this->hasMany(Model_stock::class, 'id_concepto_valor', 'id');
    }

    
    
}



