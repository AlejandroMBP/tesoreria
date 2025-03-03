<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Model_solicitud;
use App\Models\Model_solicitud_detalle;
use App\Models\Model_respuesta_solicitud;
use App\Models\Model_respuesta_solicitud_detalle;
use App\Models\Model_concepto_valores;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Carbon;

class PdfController extends Controller
{

    // PDF PARA LA SALIDA DE VALORES DE BODEGA
    public function generarSalidaValoresPDF($id_solicitud)
    {
        // Obtener la solicitud principal
        $solicitud = Model_solicitud::findOrFail($id_solicitud);

        // Obtener el solicitante (usuario remitente)
        $solicitante = User::findOrFail($solicitud->id_usuario_remitente);

        // Obtener el destinatario (usuario destinatario)
        $destinatario = User::findOrFail($solicitud->id_usuario_destinatario);

        // Obtener todos los conceptos, no solo los que están solicitados
        $conceptos = Model_concepto_valores::all();

        // Obtener los detalles de la solicitud (con los conceptos solicitados)
        $detalles = Model_solicitud_detalle::where('id_solicitud', $id_solicitud)->get();

        // Obtener la respuesta de la solicitud
        $respuesta = Model_respuesta_solicitud::where('id_solicitud', $id_solicitud)->first();
        $respuestaDetalles = Model_respuesta_solicitud_detalle::where('id_respuesta_solicitud', $respuesta->id ?? null)->get();

        // Preparar los items para la tabla
        $items = [];
        foreach ($conceptos as $concepto) {
            // Obtener el detalle relacionado, si existe
            $detalle = $detalles->where('id_concepto_valores', $concepto->id)->first();
            $cantidad_solicitada = $detalle ? $detalle->cantidad : 0;

            // Obtener cantidad entregada desde la respuesta
            $respuestaDetalle = $respuestaDetalles->where('id_concepto_valores', $concepto->id)->first();
            $cantidad_entregada = $respuestaDetalle ? $respuestaDetalle->cantidad : 0;

            // Calcular el total de la cantidad solicitada
            $total = $cantidad_entregada * $concepto->precio_unitario;

            // Obtener los correlativos
            $correlativo_inicial = $respuestaDetalle ? $respuestaDetalle->correlativo_inicial : 'N/A';
            $correlativo_final = $respuestaDetalle ? $respuestaDetalle->correlativo_final : 'N/A';

            $items[] = [
                'descripcion' => $concepto->nombre ?? 'Sin Nombre',
                'cantidad_solicitada' => $cantidad_solicitada,
                'cantidad_entregada' => $cantidad_entregada,
                'precio_unitario' => number_format($concepto->precio_unitario, 2),
                'total' => number_format($total, 2),
                'correlativo_inicial' => $correlativo_inicial,
                'correlativo_final' => $correlativo_final
            ];
        }

        $pdf = Pdf::loadView('dashboard.contenido.pdf.pdf_solicitud_valores', compact('solicitud', 'solicitante', 'destinatario', 'items'));

        return $pdf->stream('solicitud_valores.pdf');
    }

    // PDF PARA EL REPORTE GENERAL DE BODEGA
    public function generatePdf(Request $request)
    {

        //dd($request->all());

        $gestion = $request->input('gestion');
        $mes = $request->input('mes');
        $tipo_documento = $request->input('tipo_documento');

        $consulta = $this->getFilteredData($gestion, $mes, $tipo_documento);

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('dashboard.contenido.pdf.pdf_reporte_bodega', compact('consulta'))
        ->setPaper('a4', 'landscape');

        return $pdf->stream('reporte_bodega.pdf');
    }

    private function getFilteredData($gestion, $mes, $tipo_documento)
    {
        $consulta = DB::select('
        (
            SELECT 
                "ENTRADA" AS tipo_movimiento,
                cv.nombre AS tipo_documento,
                cv.precio_unitario,
                avd.cantidad AS cantidad_entrada,
                avd.correlativo_ini AS correlativo_ini_entrada,
                avd.correlativo_fin AS correlativo_fin_entrada,
                NULL AS cantidad_salida,
                NULL AS correlativo_ini_salida,
                NULL AS correlativo_fin_salida,
                avd.costo,
                avd.monto_saldo AS monto,
                avd.cantidad_saldo AS cantidad_saldos, -- 🔹 Forzamos el mismo alias aquí
                "Compra Gestión" AS observacion,
                avd.created_at AS fecha_creacion
            FROM adquisicion_valores_detalle avd
            INNER JOIN concepto_valores cv ON avd.id_concepto_valores = cv.id
        )
        UNION
        (
            SELECT 
                "SALIDA" AS tipo_movimiento,
                cv.nombre AS tipo_documento,
                cv.precio_unitario,
                NULL AS cantidad_entrada,
                NULL AS correlativo_ini_entrada,
                NULL AS correlativo_fin_entrada,
                rsd.cantidad AS cantidad_salida,
                rsd.correlativo_inicial AS correlativo_ini_salida,
                rsd.correlativo_final AS correlativo_fin_salida,
                rsd.costo,
                rsd.monto_saldo_salida AS monto,
                rsd.cantidad_saldo_salida AS cantidad_saldos, -- 🔹 Forzamos el mismo alias aquí
                "-" AS observacion,
                rsd.created_at AS fecha_creacion
            FROM respuesta_solicitud_detalle rsd
            INNER JOIN concepto_valores cv ON rsd.id_concepto_valores = cv.id
        )
        ORDER BY fecha_creacion DESC;
        ');

    $consulta = collect($consulta);

    // Aplicar filtros de manera independiente
    if ($gestion && $gestion !== 'ninguno') {
        $consulta = $consulta->filter(function ($item) use ($gestion) {
            return \Carbon\Carbon::parse($item->fecha_creacion)->year == $gestion;
        });
    }

    if ($mes && $mes !== 'ninguno') {
        $consulta = $consulta->filter(function ($item) use ($mes) {
            return \Carbon\Carbon::parse($item->fecha_creacion)->month == $mes;
        });
    }

    if ($tipo_documento && $tipo_documento !== 'ninguno') {
        $consulta = $consulta->filter(function ($item) use ($tipo_documento) {
            return $item->tipo_documento == $tipo_documento;
        });
    }

    return $consulta->values();
}

public function generarPdfSolicitud($id_solicitud)
    {
        // Obtener la solicitud
        $solicitud = Model_solicitud::find($id_solicitud);

        // Obtener los detalles de la solicitud
        $detalles = Model_solicitud_detalle::where('id_solicitud', $id_solicitud)->get();

        // Obtener todos los conceptos de valores
        $conceptos = Model_concepto_valores::all();

        // Preparar los datos para la vista
        $data = [
            'solicitud' => $solicitud,
            'detalles' => $detalles,
            'conceptos' => $conceptos,
        ];

        // Generar el PDF
        $pdf = PDF::loadView('dashboard.contenido.pdf.pdf_salida_valores', $data);

        // Descargar o mostrar el PDF
        return $pdf->stream('solicitud.pdf');
    }

    //PDF PARA REPORTES DE VENTANILLA
    public function Pdf_reporte_ventanilla(Request $request)
    {
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');
        $tipo_documento = $request->input('tipo_documento');

        $consulta = $this->getFilteredDataVen($fecha_inicio, $fecha_fin, $tipo_documento);

        $pdf = PDF::loadView('dashboard.contenido.pdf.pdf_reporte_ventanilla', compact('consulta'))
            ->setPaper('a4', 'landscape');

        return $pdf->stream('reporte_ventanilla.pdf');
    }

    private function getFilteredDataVen($fecha_inicio, $fecha_fin, $tipo_documento)
{
    $consulta = DB::select('
        (
            SELECT 
            "ENTRADA" AS tipo_movimiento,
            cv.nombre AS tipo_documento,
            cv.precio_unitario,
            vvd.cantidad AS cantidad_entrada,
            vvd.correlativo_inicial AS correlativo_ini_entrada,
            vvd.correlativo_final AS correlativo_fin_entrada,
            NULL AS cantidad_salida,
            NULL AS correlativo_ini_salida,
            NULL AS correlativo_fin_salida,
            vvd.costo,
            vvd.monto_saldo,
            vvd.cantidad_saldo,
            "ENTRADA" AS observacion, 
            vv.created_at AS fecha_creacion
        FROM venta_valores AS vv
        INNER JOIN venta_valores_detalle AS vvd ON vv.id = vvd.id_venta_valores
        INNER JOIN concepto_valores AS cv ON vvd.id_concepto_valores = cv.id
        WHERE vv.estado = 2
            ' . ($fecha_inicio && $fecha_fin ? " AND vvd.created_at BETWEEN '$fecha_inicio' AND '$fecha_fin'" : "") . '
            ' . ($tipo_documento ? " AND cv.nombre = '$tipo_documento'" : "") . '
        )
        UNION
        (
            SELECT 
            "SALIDA" AS tipo_movimiento,  -- Ahora se coloca "SALIDA" para las salidas
            cv.nombre AS tipo_documento,
            cv.precio_unitario,
            NULL AS cantidad_entrada,
            NULL AS correlativo_ini_entrada,
            NULL AS correlativo_fin_entrada,
            rsd.cantidad AS cantidad_salida,
            rsd.correlativo_inicial AS correlativo_ini_salida,
            rsd.correlativo_final AS correlativo_fin_salida,
            rsd.costo,
            rsd.monto_saldo_entrada,
            rsd.cantidad_saldo_entrada,
            NULL AS observacion,  -- Para SALIDA, observacion queda vacío
            rs.created_at AS fecha_creacion
        FROM respuesta_solicitud AS rs
        INNER JOIN respuesta_solicitud_detalle AS rsd ON rs.id = rsd.id_respuesta_solicitud
        INNER JOIN concepto_valores AS cv ON rsd.id_concepto_valores = cv.id
        WHERE rs.estado = 1
            ' . ($fecha_inicio && $fecha_fin ? " AND rsd.created_at BETWEEN '$fecha_inicio' AND '$fecha_fin'" : "") . '
            ' . ($tipo_documento ? " AND cv.nombre = '$tipo_documento'" : "") . '
        )
        ORDER BY fecha_creacion ASC
    ');

    return $consulta;
}
    
}


