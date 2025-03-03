<html>
    <body> 
        <!-- Contenedor del encabezado con flexbox -->
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <tr>
                <!-- Columna izquierda (Escudo) -->
                <td style="width: 20%; text-align: left; vertical-align: middle;">
                <img src="{{ public_path('assets/images/logoUpea.png') }}" alt="Escudo" width="100">
                </td>
        
                <!-- Columna central (Texto centrado) -->
                <td style="width: 60%; text-align: center; vertical-align: middle;">
                    <h4>Universidad Pública de El Alto</h4>
                    <h5>DIRECCIÓN ADMINISTRATIVA FINANCIERA</h5>
                    <h5>UNIDAD DE TESORERÍA Y CRÉDITO PÚBLICO</h5>
                    <h5>SOLICITUD DE VALORES</h5>
                </td>
        
                <!-- Columna derecha (Fecha en cuadro) -->
                <td style="width: 20%; text-align: right; vertical-align: middle;">
                    <p style="text-align: center; font-weight: bold;">FECHA</p>
                    <table border="1" style="border-collapse: collapse; width: 100%;">
                        <tr>
                            <th style="padding: 5px; text-align: center;">Día</th>
                            <th style="padding: 5px; text-align: center;">Mes</th>
                            <th style="padding: 5px; text-align: center;">Año</th>
                        </tr>
                        <tr>
                            @php
                                $fecha = \Carbon\Carbon::now();
                            @endphp
                            <td style="padding: 5px; text-align: center;">{{ $fecha->format('d') }}</td>
                            <td style="padding: 5px; text-align: center;">{{ $fecha->format('m') }}</td>
                            <td style="padding: 5px; text-align: center;">{{ $fecha->format('Y') }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>        
        
        <div>
            <h4><strong>DATOS SOLICITANTE:</strong></h4>
            <p><strong>Nombre(s) y Apellido(s) (Remitente):</strong> {{ $solicitante->name }}</p>
            <p style="display: flex; justify-content: space-between; align-items: center;">
                <span><strong>Cargo:</strong> <span style="margin-left: 5px;">{{ $solicitante->cargo }}</span></span>
                <span style="margin-left: 100px;"><strong>Unidad:</strong> <span style="margin-left: 5px;">{{ $solicitante->unidad }}</span></span>
            </p>
        </div>    

        <!-- Tabla de contenido -->
        <table border="1" style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="text-align: center; padding: 8px;">#</th>
                    <th style="text-align: center; padding: 8px;">Cantidad Solicitada</th>
                    <th style="text-align: center; padding: 8px;">Descripción</th>
                    <th style="text-align: center; padding: 8px;">Cantidad Entregada</th>
                    <th colspan="2" style="text-align: center; padding: 8px; background-color: #f0f0f0; font-weight: bold;">IMPORTE Bs</th> 
                    <th style="text-align: center; padding: 8px;">Observaciones (Correlativo)</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style="text-align: center; padding: 8px; background-color: #f9f9f9; font-weight: bold;">UNITARIO Bs</th>
                    <th style="text-align: center; padding: 8px; background-color: #f9f9f9; font-weight: bold;">TOTAL Bs</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $key => $item)
                <tr>
                    <td style="text-align: center; padding: 8px;">{{ $key + 1 }}</td>
                    <td style="text-align: center; padding: 8px;">{{ $item['cantidad_solicitada'] }}</td>
                    <td style="text-align: left; padding: 8px;">{{ $item['descripcion'] }}</td>
                    <td style="text-align: center; padding: 8px;">{{ $item['cantidad_entregada'] }}</td>
                    <td style="text-align: center; padding: 8px;">{{ $item['precio_unitario'] }}</td>
                    <td style="text-align: center; padding: 8px;">{{ $item['total'] }}</td>
                    <td style="text-align: center; padding: 8px;">{{ $item['correlativo_inicial'] }} - {{ $item['correlativo_final'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pie de pagina -->
        <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
            <tr>
                <!-- Columna izquierda -->
                <td style="width: 50%; text-align: left; vertical-align: top;">
                    <h4><strong>Entregado por:</strong></h4>
                    <p><strong>Firma:</strong> __________________</p>
                    <p><strong>Nombre y Apellidos:</strong> __________________</p>
                    <p><strong>Cargo:</strong> __________________</p>
                </td>
        
                <!-- Columna derecha -->
                <td style="width: 50%; text-align: right; vertical-align: top;">
                    <h4><strong>Recibido por:</strong></h4>
                    <p><strong>Firma:</strong> __________________</p>
                    <p><strong>Nombre y Apellidos:</strong> _________________</p>
                    <p><strong>Cargo:</strong> __________________</p>
                    <p style="font-weight: bold; margin-top: 10px;">RECIBÍ CONFORME</p>
                </td>
            </tr>
        </table>
                                          
           

    </body>
</html>
