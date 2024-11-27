<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\TipoConcepto;
use Illuminate\Support\Facades\DB;

class TipoConceptoSeeder extends Seeder
{
    public function run()
    {
        TipoConcepto::create([
            'descripcion' => 'MATRICULACIÓN',
            'uuid' => (string) Str::uuid(),
        ]);
        TipoConcepto::create([
            'descripcion' => 'CERTIFICACIÓN DE DOCUMENTOS',
            'uuid' => (string) Str::uuid(),
        ]);
        TipoConcepto::create([
            'descripcion' => 'TÍTULOS Y DIPLOMAS',
            'uuid' => (string) Str::uuid(),
        ]);
        TipoConcepto::create([
            'descripcion' => 'LEGALIZACIÓN',
            'uuid' => (string) Str::uuid(),
        ]);
        TipoConcepto::create([
            'descripcion' => 'IDIOMAS',
            'uuid' => (string) Str::uuid(),
        ]);
        TipoConcepto::create([
            'descripcion' => 'ADMISIÓN PREUNIVERSITARIA/EXAMEN DE DISPENSACIÓN',
            'uuid' => (string) Str::uuid(),
        ]);
    }
}