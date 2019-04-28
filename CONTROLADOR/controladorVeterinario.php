<?php

require_once "../BBDD/model.php";
require_once "../BBDD/config.php";

session_start();

if (!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])) {
    header("Location: ../index.php");
} else {
    if ($_SESSION['rol'] != 'Veterinario') {
        header("Location: ../VISTA/".$_SESSION['rol']);
    }
}

$conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

if (isset($_POST)) {
    /*---------CONTROLADOR VISTA GESTION PRUEBA-------*/
    if (isset($_POST['anadirPrueba'])) {
        $conexion->registrarPrueba($_POST['id_tipo_prueba'], $_POST['id_mascota'], $_POST['resultado'], $_POST['observaciones'], $_POST['id_cita']);
        header("Location: ../VISTA/COMUN/vistaGestionPrueba.php");
    } elseif (isset($_POST['editarPrueba'])) {
        $conexion->modificarPrueba($_POST['id_prueba'], $_POST['resultado'], $_POST['observaciones']);
        header("Location: ../VISTA/COMUN/vistaGestionPrueba.php");
    } elseif (isset($_POST['borrarPrueba'])) {
        $conexion->borrarPrueba($_POST['id_prueba']);
        header("Location: ../VISTA/COMUN/vistaGestionPrueba.php");
    }

    /*---------CONTROLADOR VISTA GESTION TIPO PRUEBA-------*/
    elseif (isset($_POST['anadirTipoPrueba'])) {
        $conexion->registrarTipoPrueba($_POST['nombre'], $_POST['precio']);
        header("Location: ../VISTA/COMUN/vistaGestionTipoPrueba.php");
    } elseif (isset($_POST['editarTipoPrueba'])){
        $conexion->modificarTipoPrueba($_POST['id_tipo_prueba'], $_POST['nombre'], $_POST['precio']);
        header("Location: ../VISTA/COMUN/vistaGestionTipoPrueba.php");
    } elseif (isset($_POST['borrarTipoPrueba'])){
        $conexion->borrarTipoPrueba($_POST['id_tipo_prueba']);
        header("Location: ../VISTA/COMUN/vistaGestionTipoPrueba.php");
    }

    /*---------CONTROLADOR VISTA GESTION MASCOTAS-------*/
    elseif (isset($_POST['editarMascota'])){
        $conexion->modificarMascota($_POST['id_mascota'], $_POST['nombre'], $_POST['tipo'], $_POST['raza'], $_POST['sexo'], $_POST['fecna'], $_POST['peso']);
        header("Location: ../VISTA/COMUN/vistaGestionMascotas.php");
    } elseif (isset($_POST['borrarMascota'])){
        $conexion->borrarMascota($_POST['id_mascota']);
        header("Location: ../VISTA/COMUN/vistaGestionMascotas.php");
    } else {
        header("Location: ../VISTA/VETERINARIO");
    }
} else {
    header("Location: ../VISTA/VETERINARIO");
}

$conexion->desconectar();
?>