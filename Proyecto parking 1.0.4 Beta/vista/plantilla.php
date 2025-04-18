<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn.sstatic.net/Sites/es/img/favicon.ico?v=a8def514be8a">
</head>
<body>
    



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
$_GET["pagina"]=="termino-y-condiciones"||
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