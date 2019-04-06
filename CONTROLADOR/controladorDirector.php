<?php

require_once "../BBDD/model.php";
require_once "../BBDD/config.php";

session_start();

if(!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])){
    header("Location: ../index.php");
} else {
    if($_SESSION['rol'] != 'Director'){
        header("Location: ../VISTA/".$_SESSION['rol']);
    }
}

$conexion = new Model (Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

if ($_POST) {
    /*---------CONTROLADOR VISTA GESTION EMPLEADOS-------*/

    if (isset($_POST['vistaEditarContrato'])) {
        header("Location: ../VISTA/DIRECTOR/vistaEditarContrato.php?idUsuario=".$_POST['idUsuario']);
    } elseif (isset($_POST['despedirContrato'])) {
        $conexion->finalizarContrato($_POST['idUsuario']);
        header("Location: ../VISTA/DIRECTOR/vistaGestionEmpleados.php");
    } elseif (isset($_POST['vistaEditarEmpleado'])) {
        header("Location: ../VISTA/DIRECTOR/vistaEditarEmpleado.php?idUsuario=".$_POST['idUsuario']);
    }

    /*---------CONTROLADOR CONTRATAR-------*/
    if (isset($_POST['contratar'])) {
        $conexion->registrarUsuario($_POST['nombre'], $_POST['apellidos'], $_POST['dni'], $_POST['telefono'], $_POST['correo'], $_POST['fecna'], $_POST['direccion'], $_POST['profesion'], $_POST['pass']);
        $empleadoContratado = $conexion->visualizarUsuarioDni($_POST['dni']);
        $idContratado = $empleadoContratado['id_usuario'];
        $conexion->contratarUsuario($_POST['fecini'], $_POST['fecfin'], $_POST['sueldo'], $_POST['diasvac'], $_POST['horario'], 'Activo', $idContratado);
        header("Location: ../VISTA/DIRECTOR/vistaGestionEmpleados.php");
    }

    /*---------CONTROLADOR EDITAR EMPLEADO-------*/
    if (isset($_POST['editarEmpleado'])) {
        $conexion->modificarUsuario($_POST['idUsuario'], $_POST['nombre'], $_POST['apellidos'], $_POST['dni'], $_POST['telefono'], $_POST['correo'], $_POST['fecna'], $_POST['direccion'], $_POST['profesion'], $_POST['pass']);
        header("Location: ../VISTA/DIRECTOR/vistaGestionEmpleados.php");
    }

    /*---------CONTROLADOR EDITAR CONTRATO-------*/
    if (isset($_POST['editarContrato'])) {
        $conexion->editarContrato($_POST['idUsuario'], $_POST['fecini'], $_POST['fecfin'], $_POST['sueldo'], $_POST['diasvac'], $_POST['horario'], 'Activo', $idContratado);
        header("Location: ../VISTA/DIRECTOR/vistaGestionEmpleados.php");
    }
} else {
    header("Location: ../VISTA/DIRECTOR");
}

$conexion->desconectar();
?>