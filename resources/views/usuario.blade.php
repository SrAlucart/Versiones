<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Usuario</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* --------------------------- ESTILO GLOBAL --------------------------- */

        body {
            background: #eef2f7;
            font-family: 'Inter', sans-serif;
        }

        /* --------------------------- HEADER --------------------------- */
        header {
            background: #121a24;
            padding: 12px 20px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.22);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        header h1 {
            font-size: 1.4rem;
            font-weight: 600;
            color: white;
            margin: 0;
        }

        header img {
            height: 42px;
        }

        .menu-toggle .bar {
            background: #fff;
        }

        

        /* --------------------------- CONTENEDOR PRINCIPAL --------------------------- */
        .dashboard-wrapper {
            max-width: 1100px;
            margin: 40px auto;
        }

        .card-dashboard {
            background: #ffffff;
            border-radius: 18px;
            padding: 25px 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .card-header-modern {
            background: linear-gradient(90deg, #0d6efd, #4e9eff);
            color: white;
            padding: 16px;
            border-radius: 14px;
            text-align: center;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 25px;
        }

        /* --------------------------- INFO BOX --------------------------- */
        .info-box {
            background: #f9fafe;
            padding: 20px;
            border-radius: 15px;
            border: 1px solid #dde3ee;
        }

        .info-box p {
            margin: 4px 0;
            font-size: 0.95rem;
        }

        .info-box strong {
            color: #0b5ed7;
        }

        /* --------------------------- BOTÓN PRINCIPAL --------------------------- */
        .btn-main {
            background: #ffbc00;
            border: none;
            width: 100%;
            padding: 12px 0;
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-main:hover {
            background: #e8a700;
        }

        /* --------------------------- TABLA --------------------------- */
        .table-modern thead {
            background: #0d6efd;
            color: white;
        }

        .table-modern {
            border-radius: 14px;
            overflow: hidden;
            font-size: 0.85rem;
        }

        .table-modern td, .table-modern th {
            padding: 12px;
        }

        .badge-status {
            padding: 6px 10px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.7rem;
        }

        .badge-pendiente { background: #f7d067; color: #7b5d00; }
        .badge-confirmada { background: #86e49d; color: #145c1f; }
        .badge-cancelada { background: #ff8a8a; color: #7e1111; }
        .badge-finalizada { background: #b6c7e3; color: #1b2b44; }

        /* Botones tabla */
        .btn-sm-modern {
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.75rem;
        }

        @media (max-width: 768px) {
            .card-dashboard {
                padding: 20px;
            }

            .table-modern {
                font-size: 0.72rem;
            }
        }
    </style>
</head>

<body>

    <!-- ✨ HEADER MODERNO -->
    <header class="d-flex justify-content-between align-items-center">
        <a href="/"><img src="{{ asset('img/refugiorodante2.png') }}" alt="Logo"></a>
        <h1>Refugio Rodante</h1>
        <a href="/logout" class="text-white text-decoration-none">Cerrar Sesión</a>
    </header>


    <!-- ✨ CONTENIDO -->
    <div class="dashboard-wrapper">
        <div class="card-dashboard">

            <!-- Título -->
            <div class="card-header-modern">Dashboard de Usuario</div>

            <!-- Info & Botón -->
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="info-box">
                        <p><strong>Nombre:</strong> {{ $usuario['username'] }}</p>
                        <p><strong>Email:</strong> {{ $usuario['email'] }}</p>
                        <p><strong>Rol:</strong> {{ ucfirst($usuario['rol']) }}</p>
                    </div>
                </div>

                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <a href="/mapa-parqueaderos" class="btn btn-main">
                        🚗 Hacer Nueva Reserva
                    </a>
                </div>
            </div>

            <!-- Reservas -->
            <h5 class="fw-bold mb-3">Mis Reservas Recientes</h5>

            <div class="table-responsive">
                <table class="table-modern table">
                    <thead>
                        <tr>
                            <th>Parqueadero</th>
                            <th>Espacio</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Estado</th>
                            <th>Placa</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($reservas as $reserva)
                        <tr>
                            <td>{{ $reserva->nombre_parqueadero }}</td>
                            <td>{{ $reserva->numero_espacio }}</td>
                            <td>{{ $reserva->fecha_inicio }}</td>
                            <td>{{ $reserva->fecha_fin }}</td>

                            <td>
                                <span class="badge-status badge-{{ $reserva->estado }}">
                                    {{ ucfirst($reserva->estado) }}
                                </span>
                            </td>

                            <td>{{ $reserva->placa_vehiculo }}</td>

                            <td class="text-nowrap"> 
                                @if(in_array($reserva->estado, ['pendiente', 'confirmada']))
                                <a href="{{ route('usuario.reserva.cancelar', $reserva->id) }}"
                                   class="btn btn-danger btn-sm-modern">Cancelar</a>
                                @endif

                                @if($reserva->estado == 'confirmada')
                                <a href="{{ route('usuario.reserva.finalizar', $reserva->id) }}"
                                   class="btn btn-secondary btn-sm-modern">Finalizar</a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center p-3">No tienes reservas actualmente</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>

</html>
