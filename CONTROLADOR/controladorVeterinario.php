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
    /*---------CONTROLADOR VISTAS-------*/
    if (isset($_POST['vistaAnadirPrueba'])) {
        header("Location: ../VISTA/VETERINARIO/vistaAnadirPrueba.php?id_cita=".$_POST['id_cita']);
    } elseif (isset($_POST['vistaEditarPrueba'])) {
        header("Location: ../VISTA/VETERINARIO/vistaEditarPrueba.php?id_prueba=".$_POST['id_prueba']);
    }

    /*---------CONTROLADOR ACCIONES-------*/

    if (isset($_POST['anadirPrueba'])) {
        $conexion->registrarPrueba($_POST['tipo_prueba'], $_POST['mascota'], null, $_POST['observaciones'], $_POST['cita']);
        header("Location: ../VISTA/COMUN/vistaGestionPrueba.php");
    } elseif (isset($_POST['anadirTipoPrueba'])) {
        $conexion->registrarTipoPrueba($_POST['nombre'], $_POST['precio']);
        header("Location: ../VISTA/COMUN/vistaGestionTipoPrueba.php");
    } elseif (isset($_POST['editarPrueba'])) {
        $conexion->modificarPrueba($_POST['id_prueba']);
        header("Location: ../VISTA/COMUN/vistaGestionPrueba.php");
    } elseif (isset($_POST['borrarPrueba'])) {
        $conexion->borrarPrueba($_POST['id_prueba']);
        header("Location: ../VISTA/COMUN/vistaGestionPrueba.php");
    }
} else {
    header("Location: ../VISTA/VETERINARIO");
}

$conexion->desconectar();
?>