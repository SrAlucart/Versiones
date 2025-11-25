<!DOCTYPE html>
<html>
<head>
    <title>Mapa de Parqueaderos</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map { 
            height: 600px; 
            width: 100%; 
            border-radius: 12px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
@extends('layouts.app')

<h2 style="text-align: center; margin-top: 20px;">Parqueaderos disponibles</h2>

<div id="map"></div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    // Crear mapa centrado en Medellín
    const map = L.map('map').setView([6.2442, -75.5812], 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // ======================================================
    // RECORRER PARQUEADEROS Y CREAR MARCADORES
    // ======================================================
    @foreach ($parkings as $p)
        @if($p->latitud && $p->longitud)
            L.marker([{{ $p->latitud }}, {{ $p->longitud }}], {
                parkingId: {{ $p->id }} // ← guardamos el ID en el marker
            })
            .addTo(map)
            .bindPopup(`
                <strong>{{ $p->nombre }}</strong><br>
                {{ $p->direccion }}<br>
                Espacios disponibles: {{ $p->espacios_disponibles }}<br><br>

                <button onclick="reservar({{ $p->id }})"
                    style="background:#0d6efd;color:white;padding:6px 12px;border:none;border-radius:6px;cursor:pointer;">
                    Reservar aquí
                </button>
            `)
            .on("click", function(e) {
                // Cuando el usuario hace clic en el marcador:
                console.log("Marcador seleccionado:", this.options.parkingId);

                // Llamamos la función global del formulario para asignar el parqueadero automáticamente
                if (typeof seleccionarParqueaderoDesdeMapa === "function") {
                    seleccionarParqueaderoDesdeMapa(this.options.parkingId);
                }
            });
        @endif
    @endforeach

    // Ir a la vista de reserva
    function reservar(id) {
        window.location.href = "/usuario/reserva/nueva?parqueadero_id=" + id;
    }
</script>

</body>
</html>
