<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Concepto;
use App\Models\TipoConcepto;
class ConceptoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $tipoMatriculacion = TipoConcepto::where('descripcion', 'MATRICULACIÓN')->first();
        $tipoCertificacion = TipoConcepto::where('descripcion', 'CERTIFICACIÓN DE DOCUMENTOS')->first();
        $tipoTitulosDiplomas = TipoConcepto::where('descripcion', 'TÍTULOS Y DIPLOMAS')->first();
        $tipoLegalizacion = TipoConcepto::where('descripcion', 'LEGALIZACIÓN')->first();
        $tipoIdiomas = TipoConcepto::where('descripcion', 'IDIOMAS')->first();
        $tipoAdmision = TipoConcepto::where('descripcion', 'ADMISIÓN PREUNIVERSITARIA/EXAMEN DE DISPENSACIÓN')->first();

        Concepto::create([
            'concepto' => 'MATRICULACIÓN ANTIGUOS Y NUEVOS
(ADMISIÓN PREFACULTATIVO, ADMISIÓN EXAMEN, ADMISIÓN EXCELENCIA ACADÉMICA Y CARRERA PARALELA)',
            'montoMinimo' => '22',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 1,
            'id_usuario' => 1,
            'id_tipo' => $tipoMatriculacion->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'MATRICULACIÓN NUEVOS Y ANTIGUOS',
            'montoMinimo' => '150',
            'tipoNacionalidad' => 'extranjero',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 1,
            'id_usuario' => 1,
            'id_tipo' => $tipoMatriculacion->id,
            'uuid' => (string) Str::uuid(),
        ]);

        Concepto::create([
            'concepto' => 'MATRICULACIÓN NUEVOS Y ANTIGUOS - PROFESIONALES',
            'montoMinimo' => '180',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 2,
            'id_usuario' => 1,
            'id_tipo' => $tipoMatriculacion->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'MATRICULACIÓN REINCORPORACIÓN',
            'montoMinimo' => '44',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 2,
            'id_usuario' => 1,
            'id_tipo' => $tipoMatriculacion->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'MATRICULACIÓN REINCORPORACIÓN',
            'montoMinimo' => '150',
            'tipoNacionalidad' => 'extranjero',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 2,
            'id_usuario' => 1,
            'id_tipo' => $tipoMatriculacion->id,
            'uuid' => (string) Str::uuid(),
        ]);

        Concepto::create([
            'concepto' => 'CERTIFICACIÓN DE TENENCIA DE DOCUMENTOS',
            'montoMinimo' => '75',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoCertificacion->id,
            'uuid' => (string) Str::uuid(),
        ]);

        Concepto::create([
            'concepto' => 'TÍTULO PROFESIONAL',
            'montoMinimo' => '350',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoTitulosDiplomas->id,
            'uuid' => (string) Str::uuid(),
        ]);


        Concepto::create([
            'concepto' => 'DIPLOMA ACADÉMICO A NIVEL TÉCNICO UNIVERSITARIO SUERIOR, TÉCNICO UNIVERSITARIO MEDIO',
            'montoMinimo' => '215',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoTitulosDiplomas->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'DIPLOMA ACADÉMICO A NIVEL TÉCNICO UNIVERSITARIO SUERIOR, TÉCNICO UNIVERSITARIO MEDIO',
            'montoMinimo' => '1215',
            'tipoNacionalidad' => 'extranjero',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoTitulosDiplomas->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'DIPLOMA ACADÉMICO Y TITULO PROFESIONAL DE FORMA SIMULTANEA NIVEL LICENCIATURA, TÉCNICO UNIVERSITARIO SUPERIOR, NIVEL TÉCNICO UNIVERSITARIO MEDIO',
            'montoMinimo' => '600',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoTitulosDiplomas->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'DIPLOMA ACADÉMICO Y TITULO PROFESIONAL DE FORMA SIMULTANEA NIVEL LICENCIATURA, TÉCNICO UNIVERSITARIO SUPERIOR, NIVEL TÉCNICO UNIVERSITARIO MEDIO',
            'montoMinimo' => '2970',
            'tipoNacionalidad' => 'extranjero',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoTitulosDiplomas->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'DIPLOMA ACADÉMICO A NIVEL LICENCIATURA (AREA SALUD: MEDICINA, ODONTOLOGÍA, ENFERMERIA)',
            'montoMinimo' => '215',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoTitulosDiplomas->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'DIPLOMA ACADÉMICO A NIVEL LICENCIATURA (AREA SALUD: MEDICINA, ODONTOLOGÍA, ENFERMERIA)',
            'montoMinimo' => '1215',
            'tipoNacionalidad' => 'extranjero',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoTitulosDiplomas->id,
            'uuid' => (string) Str::uuid(),
        ]);

        Concepto::create([
            'concepto' => 'FOTOCOPIA LEGALIZADA DEL DIPLOMA ACADÉMICO',
            'montoMinimo' => '70',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoLegalizacion->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'FOTOCOPIA LEGALIZADA DEL DIPLOMA ACADÉMICO',
            'montoMinimo' => '70',
            'tipoNacionalidad' => 'extranjero',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoLegalizacion->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'FOTOCOPIA LEGALIZADA DEL TÍTULO PROFESIONAL',
            'montoMinimo' => '70',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoLegalizacion->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'FOTOCOPIA LEGALIZADA DEL TÍTULO PROFESIONAL',
            'montoMinimo' => '70',
            'tipoNacionalidad' => 'extranjero',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoLegalizacion->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'FOTOCOPIA LEGALIZADA DEL CERTIFICADO SUPLETORIO',
            'montoMinimo' => '70',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoLegalizacion->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'FOTOCOPIA LEGALIZADA DEL CERTIFICADO SUPLETORIO',
            'montoMinimo' => '70',
            'tipoNacionalidad' => 'extranjero',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoLegalizacion->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'FOTOCOPIA LEGALIZADA DEL DIPLOMA DE BACHILLER EXPEDIDO POR LA UPEA',
            'montoMinimo' => '70',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoLegalizacion->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'FOTOCOPIA LEGALIZADA DEL DIPLOMA DE BACHILLER EXPEDIDO POR LA UPEA',
            'montoMinimo' => '70',
            'tipoNacionalidad' => 'extranjero',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoLegalizacion->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'NIVEL POSTGRADO: MAESTRIA',
            'montoMinimo' => '80',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoLegalizacion->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'NIVEL POSTGRADO: MAESTRIA',
            'montoMinimo' => '80',
            'tipoNacionalidad' => 'extranjero',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoLegalizacion->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'NIVEL POSTGRADO: ESPECIALIDAD',
            'montoMinimo' => '80',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoLegalizacion->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'NIVEL POSTGRADO: ESPECIALIDAD',
            'montoMinimo' => '80',
            'tipoNacionalidad' => 'extranjero',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoLegalizacion->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'NIVEL POSTGRADO: DOCTORADO',
            'montoMinimo' => '80',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoLegalizacion->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'NIVEL POSTGRADO: DOCTORADO',
            'montoMinimo' => '80',
            'tipoNacionalidad' => 'extranjero',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoLegalizacion->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'NIVEL POSTGRADO: POSTDOCTORADO',
            'montoMinimo' => '80',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoLegalizacion->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'NIVEL POSTGRADO: POSTDOCTORADO',
            'montoMinimo' => '80',
            'tipoNacionalidad' => 'extranjero',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoLegalizacion->id,
            'uuid' => (string) Str::uuid(),
        ]);

        Concepto::create([
            'concepto' => 'CURSO REGULAR AUTOFINANCIADO: AYMARA, QUECHUA, INGLES, FRANCES',
            'montoMinimo' => '1000',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoIdiomas->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'CURSO REGULAR AUTOFINANCIADO: AYMARA, QUECHUA, INGLES, FRANCES',
            'montoMinimo' => '1000',
            'tipoNacionalidad' => 'extranjero',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoIdiomas->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'EXAMEN DE SUFICIENCIA',
            'montoMinimo' => '150',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoIdiomas->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'EXAMEN DE SUFICIENCIA',
            'montoMinimo' => '150',
            'tipoNacionalidad' => 'extranjero',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoIdiomas->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'PRUEBA DE SUFICIENCIA ACADÉMICA ',
            'montoMinimo' => '200',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoAdmision->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'PRUEBA DE SUFICIENCIA ACADÉMICA ',
            'montoMinimo' => '100',
            'tipoNacionalidad' => 'extranjero',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoAdmision->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'PRUEBA DE SUFICIENCIA ACADÉMICA ',
            'montoMinimo' => '300',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoAdmision->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'PRUEBA DE SUFICIENCIA ACADÉMICA ',
            'montoMinimo' => '100',
            'tipoNacionalidad' => 'extranjero',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoAdmision->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'CURSO PREUNIVERSITARIO',
            'montoMinimo' => '300',
            'tipoNacionalidad' => 'nacional',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoAdmision->id,
            'uuid' => (string) Str::uuid(),
        ]);
        Concepto::create([
            'concepto' => 'CURSO PREUNIVERSITARIO',
            'montoMinimo' => '100',
            'tipoNacionalidad' => 'extranjero',
            'estadoConcepto' => 1,
            'unidadMovimiento_id' => 3,
            'id_usuario' => 1,
            'id_tipo' => $tipoAdmision->id,
            'uuid' => (string) Str::uuid(),
        ]);
    }
}