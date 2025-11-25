@extends('layouts.app')

{{-- Esta es la sección para el contenido principal de la página --}}
@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4" style="border-radius: 16px;">
        <h3 class="text-primary fw-bold mb-3">🚗 Nueva Reserva</h3>

        <form action="{{ route('guardar_reserva') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-6 col-12">
                    <label class="form-label fw-semibold">Parqueadero</label>
                    <select id="parqueadero_id" name="parqueadero_id" class="form-select" required>
                        <option value="">Seleccione un parqueadero</option>
                        @foreach($parqueaderos as $p)
                            <option value="{{ $p->id }}"
                                {{ isset($parqueaderoSeleccionado) && $parqueaderoSeleccionado == $p->id ? 'selected' : '' }}>
                                {{ $p->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 col-12">
                    <label class="form-label fw-semibold">Espacio</label>
                    <select id="espacio_id" name="espacio_id" class="form-select" required>
                        <option value="">Seleccione un parqueadero primero</option>
                    </select>
                </div>

                <div class="col-md-6 col-12">
                    <label class="form-label fw-semibold">Fecha Inicio</label>
                    <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" class="form-control" required>
                </div>

                <div class="col-md-6 col-12">
                    <label class="form-label fw-semibold">Fecha Fin</label>
                    <input type="datetime-local" id="fecha_fin" name="fecha_fin" class="form-control" required>
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Placa del Vehículo</label>
                    <input type="text" id="placa_vehiculo" name="placa_vehiculo" class="form-control"
                           placeholder="ABC123" required>
                </div>
            </div>

            <div class="mt-4 d-flex gap-2 flex-wrap">
                <button type="submit" class="btn btn-primary px-4">Guardar Reserva</button>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection

{{-- Esta es la sección para los scripts de JavaScript --}}
@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {

    const parqueaderoSelect = document.getElementById('parqueadero_id');
    const espacioSelect     = document.getElementById('espacio_id');
    const fechaInicioInput  = document.getElementById('fecha_inicio');
    const fechaFinInput     = document.getElementById('fecha_fin');

    function cargarEspacios(parqueaderoId) {

        espacioSelect.innerHTML = '<option value="">Cargando espacios...</option>';

        if (!parqueaderoId) {
            espacioSelect.innerHTML = '<option value="">Seleccione un parqueadero primero</option>';
            return;
        }

        const params = new URLSearchParams();

        if (fechaInicioInput.value) params.append('fecha_inicio', fechaInicioInput.value);
        if (fechaFinInput.value)    params.append('fecha_fin', fechaFinInput.value);

        fetch(`/parqueaderos/${parqueaderoId}/espacios?${params.toString()}`)
            .then(res => res.json())
            .then(data => {

                espacioSelect.innerHTML = '<option value="">Seleccione un espacio</option>';

                if (!data.length) {
                    espacioSelect.innerHTML = '<option value="">No hay espacios disponibles</option>';
                    return;
                }

                data.forEach(espacio => {
                    const opt = document.createElement('option');
                    opt.value = espacio.id;
                    opt.textContent = `Espacio ${espacio.numero}`;
                    espacioSelect.appendChild(opt);
                });
            })
            .catch(() => {
                espacioSelect.innerHTML = '<option value="">Error al cargar</option>';
            });
    }

    parqueaderoSelect.addEventListener('change', () => cargarEspacios(parqueaderoSelect.value));
    fechaInicioInput.addEventListener('change', () => cargarEspacios(parqueaderoSelect.value));
    fechaFinInput.addEventListener('change', () => cargarEspacios(parqueaderoSelect.value));

    // Si viene preseleccionado desde el mapa
    window.seleccionarParqueaderoDesdeMapa = function(id) {
        parqueaderoSelect.value = id;
        parqueaderoSelect.dispatchEvent(new Event('change'));
    };

    if (parqueaderoSelect.value !== "") {
        cargarEspacios(parqueaderoSelect.value);
    }

});
</script>
@endsection