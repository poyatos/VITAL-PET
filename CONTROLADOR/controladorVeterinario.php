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
        if($conexion->registrarPrueba($_POST['id_tipo_prueba'], $_POST['id_mascota'], $_POST['resultado'], $_POST['observaciones'], $_POST['id_cita'])){
            $_SESSION['exito'] = true;
            $_SESSION['url'] = 'vistaGestionPrueba.php';
        } else {
            $_SESSION['exito'] = false;
            $_SESSION['mensaje'] = '<h2>Error al registrar la prueba. Intentelo de nuevo.</h2>';
            $_SESSION['url'] = 'vistaGestionCitas.php';
        } 
    } elseif (isset($_POST['editarPrueba'])) {
        if($conexion->modificarPrueba($_POST['id_prueba'], $_POST['resultado'], $_POST['observaciones'])){
            $_SESSION['exito'] = true;
        } else {
            $_SESSION['exito'] = false;
            $_SESSION['mensaje'] = '<h2>Error al modificar la prueba. Intentelo de nuevo.</h2>';
        }
        $_SESSION['url'] = 'vistaGestionPrueba.php';
    } elseif (isset($_POST['borrarPrueba'])) {
        if($conexion->borrarPrueba($_POST['id_prueba'])){
            $_SESSION['exito'] = true;
        } else {
            $_SESSION['exito'] = false;
            $_SESSION['mensaje'] = '<h2>Error al borrar la prueba. Intentelo de nuevo.</h2>';
        }
        $_SESSION['url'] = 'vistaGestionPrueba.php';
    }

    /*---------CONTROLADOR VISTA GESTION TIPO PRUEBA-------*/
    elseif (isset($_POST['anadirTipoPrueba'])) {
        if($conexion->registrarTipoPrueba($_POST['nombre'], $_POST['precio'])){
            $_SESSION['exito'] = true;
            $_SESSION['url'] = 'vistaGestionTipoPrueba.php';
        } else {
            $_SESSION['exito'] = false;
            $_SESSION['mensaje'] = '<h2>Error al crear el tipo de prueba. Intentelo de nuevo.</h2>';
            $_SESSION['url'] = '../VETERINARIO/vistaAnadirTipoPrueba.php';
        }
    } elseif (isset($_POST['editarTipoPrueba'])){
        if($conexion->modificarTipoPrueba($_POST['id_tipo_prueba'], $_POST['nombre'], $_POST['precio'])){
            $_SESSION['exito'] = true;
        } else {
            $_SESSION['exito'] = false;
            $_SESSION['mensaje'] = '<h2>Error al modificar el tipo de prueba. Intentelo de nuevo.</h2>';
        }
        $_SESSION['url'] = 'vistaGestionTipoPrueba.php';
    }

    /*---------CONTROLADOR VISTA GESTION MASCOTAS-------*/
    elseif (isset($_POST['editarMascota'])){
        if($conexion->modificarMascota($_POST['id_mascota'], $_POST['nombre'], $_POST['tipo'], $_POST['raza'], $_POST['sexo'], $_POST['fecna'], $_POST['peso'])){
            $_SESSION['exito'] = true;
        } else {
            $_SESSION['exito'] = false;
            $_SESSION['mensaje'] = '<h2>Error al modificar la mascota. Intentelo de nuevo.</h2>';
        }
        $_SESSION['url'] = 'vistaGestionMascotas.php';
    } else {
        header("Location: ../VISTA/VETERINARIO");
    }
    header('Location: ../VISTA/COMUN/vistaAviso.php');
} else {
    header("Location: ../VISTA/VETERINARIO");
}

$conexion->desconectar();
?>