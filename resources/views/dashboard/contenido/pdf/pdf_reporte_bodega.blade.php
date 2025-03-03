<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Bodega</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }
        table, th, td {
            border: px solid black;
        }
        th, td {
            padding: 4px;
            text-align: center;
            font-size: 10px; 
        }
        .table-title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
        }
        .sub-title {
            text-align: center;
            font-size: 13px;
            font-weight: bold;
            padding: 5px;
            white-space: normal;      /* Permite que el texto ocupe varias líneas si es necesario */
            word-wrap: break-word;    /* Rompe las palabras largas para que se ajusten */
            overflow: hidden;         /* Oculta el contenido que se desborda */
            text-overflow: ellipsis;  /* Muestra '...' si el contenido es demasiado largo */
        }

        .section-title {
            text-align: center;
            font-size: 10px;
            font-weight: bold;
        }
        .no-wrap {
            white-space: nowrap;
        }
      

    </style>
</head>
<body>
<img src="{{ public_path('assets/images/logoUpea.png') }}" alt="Escudo" width="100">


    <h1 style="text-align: center;">Reporte de Control de Valores Universitarios</h1>
    <table>
        <thead>
            <tr>
                <th colspan="13" class="table-title">UNIVERSIDAD PUBLICA DE EL ALTO</th>
            </tr>
            <tr>
                <th class="sub-title">Nro.</th>
                <th colspan="2" class="sub-title">CONTROL DE VALORES - UNIDAD DE TESORERÍA</th>
                <th colspan="3" class="sub-title">ENTRADA</th>
                <th colspan="3" class="sub-title">SALIDA</th>
                <th class="sub-title">COSTO</th>
                <th colspan="2" class="sub-title">SALDO</th>
                <th class="sub-title">OBSERVACIÓN</th>
            </tr>
            <tr>
                <th>#</th>
                <th>TIPO DOCUMENTO</th>
                <th>PRECIO C/U</th>
                <th>CANTIDAD (ENTRADA)</th>
                <th>CORRELATIVO INICIAL (ENTRADA)</th>
                <th>CORRELATIVO FINAL (ENTRADA)</th>
                <th>CANTIDAD (SALIDA)</th>
                <th>CORRELATIVO INICIAL (SALIDA)</th>
                <th>CORRELATIVO FINAL (SALIDA)</th>
                <th>COSTO</th>
                <th>MONTO</th>
                <th>CANTIDAD</th>
                <th>OBSERVACIÓN</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consulta as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row->tipo_documento }}</td>
                    <td>{{ $row->precio_unitario }}</td>
                    <td>{{ $row->cantidad_entrada ?? 'NULL' }}</td>
                    <td>{{ $row->correlativo_ini_entrada ?? 'NULL' }}</td>
                    <td>{{ $row->correlativo_fin_entrada ?? 'NULL' }}</td>
                    <td>{{ $row->cantidad_salida ?? 'NULL' }}</td>
                    <td>{{ $row->correlativo_ini_salida ?? 'NULL' }}</td>
                    <td>{{ $row->correlativo_fin_salida ?? 'NULL' }}</td>
                    <td>{{ $row->costo }}</td>
                    <td>{{ $row->monto ?? 'NULL' }}</td>
                    <td>{{ $row->cantidad_entrada ?? $row->cantidad_salida }}</td>
                    <td>{{ $row->observacion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
