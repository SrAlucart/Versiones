<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<!-- 
<header>
    <div class="left-side">
        <a href=""> <img src="" alt="Logo"> </a>
    </div>
    <div class="right-side">
        <div class="nav-link-wrapper"> <a href="index.php?pagina=inde">Inicio</a> </div>
        <div class="nav-link-wrapper"> <a href="index.php?pagina=masinfo">Mas información</a> </div>
        <!-- <div class="nav-link-wrapper"> <a href="index.php?pagina=login">Iniciar Sesión</a> </div>
    </div>
</header> --> 



<?php

if(isset($_GET["pagina"])){

if($_GET["pagina"]=="inde"||
$_GET["pagina"]=="parqueadero"||
$_GET["pagina"]=="login"||
$_GET["pagina"]=="admin"||
$_GET["pagina"]=="configuracion"||
$_GET["pagina"]=="reserva"||
$_GET["pagina"]=="usuario"||
$_GET["pagina"]=="informacion"||
$_GET["pagina"]=="cerrarsesion"||
$_GET["pagina"]=="quienessomos"||
$_GET["pagina"]=="tarifa"){

include "pagina/".$_GET["pagina"].".php";

}else{
    header('location: index.php'); 
}
}else{
    if (isset($_GET['parking'])) {
        header('location: index.php?pagina=parqueadero');
} else { 
    include "pagina/inde.php";
}
}

?>





</body>
</html>