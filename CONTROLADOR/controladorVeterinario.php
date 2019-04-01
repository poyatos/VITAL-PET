<?php

require_once "../BBDD/model.php";
require_once "../BBDD/config.php";

session_start();

if(!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])){
    header("Location: ../index.php");
} else {
    if($_SESSION['rol'] != 'Veterinario'){
        header("Location: ../VISTA/".$_SESSION['rol']);
    }
}

$conexion = new Model (Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

/*---------CONTROLADOR ANADIR PRUEBA-------*/
if(isset($_POST['anadirPrueba'])){
    $conexion->registrarPrueba($_POST['tipo_prueba'], $_POST['mascota']);
}

$conexion->desconectar();
  
?>