<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class Model_cheque extends Authenticatable
{
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $table = 'registro_cheque'; 

    protected $fillable = [
        'hoja_ruta_Rectorado',
        'hoja_ruta_DAF',
        'figura',
        'fecha_ingreso_tesoreria',
        'numero_tipo',
        'tipo',
        'resumen',
        'numero_cheque',
        'nombre_beneficiario',
        'monto_cheque',
        'comprobante',
        'cuenta',
        'n_verde_DAF',
        'fecha_despacho_para_firmas',
        'fecha_reingreso',
        'fecha_entrega_beneficiario',
        'fecha_remision_archivo_contable',
        'observacion',
        'estado',
        'revision'
    ];
    
    
    
}



