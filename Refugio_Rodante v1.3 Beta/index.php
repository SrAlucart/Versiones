<?php
require_once "controlador/plantilla.controlador.php";
require_once "modelo/formulario.modelo.php";
require_once "modelo/conexion.php";
require_once "controlador/controlador.formulario.php";


$conexion = conexion::conectar();
$plantilla = new controladorPlantilla();
$plantilla -> ctrtraerplantilla();

?>

