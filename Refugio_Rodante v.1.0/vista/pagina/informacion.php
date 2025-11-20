<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Más Información - Refugio Rodante</title>
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="vista/css/informacion.css">
    <link rel="stylesheet" href="vista/css/index.css">

 
</head>
<body>
<header>
    <div class="left-side">
        <a href=""> <img src="logo park.jfif" alt="Logo"> </a>
    </div>
    <div class="right-side">
        <div class="nav-link-wrapper"> <a href="index.php?pagina=inde">Inicio</a> </div>
        <div class="nav-link-wrapper"> <a href="index.php?pagina=informacion">Mas información</a> </div>
        <!-- <div class="nav-link-wrapper"> <a href="quienessomos.html">Quienes Somos</a> </div> -->
        <div class="nav-link-wrapper"> <a href="index.php?pagina=login">Iniciar Sesión</a> </div>
    </div>
</header>



<!-- Barra de navegación desplegable centrada -->
<div class="navbar">
    <div class="dropdown">
        <button class="dropbtn">Sobre nosotros
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="index.php?pagina=quienessomos">Quienes Somos</a>
            
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Tarifas
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="index.php?pagina=tarifa">Nuestras Tarifas</a>
            
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn"> Precios por vehiculos
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="#">Opción 4-1</a>
  
        </div>
     </div>
</div>
<main>
    <h1>Más Información</h1>
    <section class="about">
        <h2>Sobre Nosotros</h2>
        <p>Bienvenido a Refugio Rodante, donde gestionamos la reserva de estacionamiento de manera eficiente y rápida. Nuestro sistema permite a los clientes reservar su lugar de parking en pocos segundos.</p>
    </section>
    <section class="location">
        <h2>Ubicación Exacta</h2>
        <p>Nuestro parqueadero se encuentra en una ubicación estratégica en el centro de la ciudad, asegurando fácil acceso para todos nuestros clientes.</p>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.233982658896!2d-75.57522848423444!3d6.204793195272526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e4429fa84ffbe0b%3A0x6e77bbf4344f5b08!2sParque%20Lleras!5e0!3m2!1ses-419!2smx!4v1690384805054!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2024 Refugio Rodante. Todos los derechos reservados.</p>
</footer>
</body>
</html>
