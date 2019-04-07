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
    if (isset($_POST['vistaEditarPrueba'])) {
        header("Location: ../VISTA/VETERINARIO/vistaEditarPrueba.php?id_prueba=".$_POST['id_prueba']);
    } elseif (isset($_POST['anadirPrueba'])) {
        $conexion->registrarPrueba($_POST['tipo_prueba'], $_POST['mascota'], $_POST['resultado'], $_POST['observaciones'], $_POST['cita']);
        header("Location: ../VISTA/COMUN/vistaGestionPrueba.php");
    } elseif (isset($_POST['editarPrueba'])) {
        $conexion->modificarPrueba($_POST['id_prueba'], $_POST['resultado'], $_POST['observaciones']);
        header("Location: ../VISTA/COMUN/vistaGestionPrueba.php");
    } elseif (isset($_POST['borrarPrueba'])) {
        $conexion->borrarPrueba($_POST['id_prueba']);
        header("Location: ../VISTA/COMUN/vistaGestionPrueba.php");
    }

    /*---------CONTROLADOR VISTA GESTION TIPO PRUEBA-------*/

    if (isset($_POST['vistaEditarTipoPrueba'])) {
        header("Location: ../VISTA/VETERINARIO/vistaEditarTipoPrueba.php?id_tipo_prueba=".$_POST['id_tipo_prueba']);
    } elseif (isset($_POST['anadirTipoPrueba'])) {
        $conexion->registrarTipoPrueba($_POST['nombre'], $_POST['precio']);
        header("Location: ../VISTA/COMUN/vistaGestionTipoPrueba.php");
    } elseif (isset($_POST['editarTipoPrueba'])){
        $conexion->modificarTipoPrueba($_POST['id_tipo_prueba'], $_POST['nombre'], $_POST['precio']);
        header("Location: ../VISTA/COMUN/vistaGestionTipoPrueba.php");
    } elseif (isset($_POST['borrarTipoPrueba'])){
        $conexion->borrarPrueba($_POST['id_tipo_prueba']);
        header("Location: ../VISTA/COMUN/vistaGestionTipoPrueba.php");
    }

    /*---------CONTROLADOR VISTA GESTION MASCOTAS-------*/
    if (isset($_POST['vistaEditarMascota'])) {
        header("Location: ../VISTA/VETERINARIO/vistaEditarMascota.php?id_mascota=".$_POST['id_mascota']);
    } elseif (isset($_POST['editarMascota'])){
        /* PENDIENTE */
        $conexion->modificarMascota();
        header("Location: ../VISTA/VETERINARIO/vistaGestionMascotas.php");
    } elseif (isset($_POST['borrarMascota'])){
        $conexion->borrarMascota($_POST['id_mascota']);
        header("Location: ../VISTA/VETERINARIO/vistaGestionMascotas.php");
    }

    /*---------CONTROLADOR VISTA GESTION CITAS-------*/
    if (isset($_POST['vistaAnadirPrueba'])) {
        header("Location: ../VISTA/VETERINARIO/vistaAnadirPrueba.php?id_cita=".$_POST['id_cita']);
    }
} else {
    header("Location: ../VISTA/VETERINARIO");
}

$conexion->desconectar();
?>