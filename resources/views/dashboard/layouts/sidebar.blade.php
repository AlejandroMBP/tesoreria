<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="logo-icon">
            <img src="assets/images/logoUpea.png" class="logo-img" alt="">
        </div>
        <div class="logo-name flex-grow-1">
            <h7 class="mb-0" style="text-align: center;">Sistema de Administración de Tesoro Universitario</h7>
        </div>
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>
    <div class="sidebar-nav">
        <!--navigation-->
        <ul class="metismenu" id="sidenav">
            <li>
            <li>
                <a href="{{ route('metricas') }}" class="load-content">
                    <div class="parent-icon"><i class="material-icons-outlined">home</i>
                    </div>
                    <div class="menu-title">Inicio</div>
                </a>
            </li>
            <li>
                <a href="{{ route('admin_usuarios') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">manage_accounts</i>
                    </div>
                    <div class="menu-title">Administración de usuarios</div>
                </a>
            </li>
           
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">apps</i>
                    </div>
                    <div class="menu-title">Administración de bodega</div>
                </a>
                <ul>
                    <li><a href="{{ route('valores_universitarios') }}"><i class="material-icons-outlined">arrow_right</i>Valores universitarios</a>
                    </li>
                    <li><a href="{{ route('proveedores') }}"><i class="material-icons-outlined">arrow_right</i>Proveedores</a>
                    </li>
                    <li><a href="{{ route('stock') }}"><i class="material-icons-outlined">arrow_right</i>Stock</a>
                    </li>
                    <li><a href="{{ route('entrada_valores') }}"><i class="material-icons-outlined">arrow_right</i>Entrada de valores</a>
                    </li>
                    <li><a href="{{ route('salida_valores') }}"><i class="material-icons-outlined">arrow_right</i>Salida de valores</a>
                    </li>
                    <li><a href="{{ route('reporte_valores_bodega') }}"><i class="material-icons-outlined">arrow_right</i>Reporte de valores</a>
                    </li>
                </ul>
            </li>
        
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="material-icons-outlined">local_atm</i>
                    </div>
                    <div class="menu-title">Gestión de depósitos</div>
                </a>
                <ul>
                    <li><a href="{{ route('importar') }}"><i class="material-icons-outlined">arrow_right</i>Importar</a>
                    </li>
                    <li><a href="{{ route('movimientos') }}"><i class="material-icons-outlined">arrow_right</i>Movimientos</a>
                    </li>
                    <li><a href="{{ route('conceptos') }}"><i class="material-icons-outlined">arrow_right</i>Conceptos</a>
                    </li>
                    <li><a href="{{ route('multiboletas') }}"><i class="material-icons-outlined">arrow_right</i>Multiboletas</a>
                    </li>
                    <li><a href="{{ route('reportes') }}"><i class="material-icons-outlined">arrow_right</i>Reportes</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">store</i>
                    </div>
                    <div class="menu-title">Gestión de ventanilla de valores</div>
                </a>
                <ul>
                    <li><a href="{{ route('stock_ventanilla') }}"><i class="material-icons-outlined">arrow_right</i>Stock</a>
                    </li>
                    <li><a href="{{ route('solicitud_valores') }}"><i class="material-icons-outlined">arrow_right</i>Solicitud de valores</a>
                    </li>
                    <li><a href="{{ route('venta_valores') }}"><i class="material-icons-outlined">arrow_right</i>Venta de valores</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('cheque') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">view_agenda</i>
                    </div>
                    <div class="menu-title">Gestión de cheques</div>
                </a>
            </li>
            <li class="menu-label">Others</li>
            
            <li>
                <a href="javascrpt:;">
                    <div class="parent-icon"><i class="material-icons-outlined">description</i>
                    </div>
                    <div class="menu-title">Documentación</div>
                </a>
            </li>
            <li>
                <a href="javascrpt:;">
                    <div class="parent-icon"><i class="material-icons-outlined">support</i>
                    </div>
                    <div class="menu-title">Configuración</div>
                </a>
            </li>
        </ul>
        <!--end navigation-->
    </div>
</aside>






