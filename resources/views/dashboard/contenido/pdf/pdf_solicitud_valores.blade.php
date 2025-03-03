<!DOCTYPE html>
<html>
<head>
    <title>Solicitud de Valores</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            position: absolute;
            left: 0;
            height: 80px;
        }
        .header h1 {
            margin: 0;
            flex-grow: 1;
            text-align: center;
            font-size: 24px;
            color: #2c3e50;
        }
        h2 {
            text-align: center;
            color: #34495e;
            margin-bottom: 20px;
        }
        p {
            margin: 10px 0;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #34495e;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #777;
        }
        .footer p {
            margin: 5px 0;
        }
        .footer p:first-child {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="header">
    <img src="{{ public_path('assets/images/logoUpea.png') }}" alt="Escudo" width="100">
        <h1>UNIVERSIDAD PUBLICA DE EL ALTO</h1>
    </div>

    <h2>Solicitud de Valores</h2>
    
    <p><strong>Fecha de Solicitud:</strong> {{ $solicitud->fecha_solicitud }}</p>
    <p><strong>Cantidad Solicitada:</strong> {{ $solicitud->cantidad }}</p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Descripción</th>
                <th>Precio Unitario</th>
                <th>Cantidad Solicitada</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($conceptos as $index => $concepto)
                @php
                    $detalle = $detalles->where('id_concepto_valores', $concepto->id)->first();
                    $cantidad = $detalle ? $detalle->cantidad : 0;
                    $total = $cantidad * $concepto->precio_unitario;
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $concepto->nombre }}</td>
                    <td>{{ $concepto->precio_unitario }}</td>
                    <td>{{ $cantidad }}</td>
                    <td>{{ $total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">
        <p>_________________</p>
        <p>Firma Responsable</p>
    </div>
</body>
</html>