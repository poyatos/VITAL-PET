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

    if (isset($_POST['despedirContrato'])) {
        $conexion->finalizarContrato($_POST['id_usuario']);
        header("Location: ../VISTA/DIRECTOR/vistaGestionEmpleados.php");
    } elseif (isset($_POST['renovarContrato'])) {
        $conexion->renovarContrato($_POST['id_contratado'], $_POST['fecini'], $_POST['fecfin'], $_POST['sueldo'], $_POST['diasvac'], $_POST['horario']);
        header("Location: ../VISTA/DIRECTOR/vistaGestionEmpleados.php");
    }

    /*---------CONTROLADOR CONTRATAR-------*/
    elseif (isset($_POST['contratar'])) {
        $conexion->registrarUsuario($_POST['nombre'], $_POST['apellidos'], $_POST['dni'], $_POST['telefono'], $_POST['correo'], $_POST['fecna'], $_POST['direccion'], $_POST['profesion'], $_POST['pass']);
        $empleadoContratado = $conexion->visualizarUsuarioDni($_POST['dni']);
        $idContratado = $empleadoContratado['id_usuario'];
        $conexion->contratarUsuario($_POST['fecini'], $_POST['fecfin'], $_POST['sueldo'], $_POST['diasvac'], $_POST['horario'], 'Activo', $idContratado);
        header("Location: ../VISTA/DIRECTOR/vistaGestionEmpleados.php");
    }

    /*---------CONTROLADOR EDITAR EMPLEADO-------*/
    elseif (isset($_POST['editarEmpleado'])) {
        $conexion->modificarUsuario($_POST['id_usuario'], $_POST['nombre'], $_POST['apellidos'], $_POST['dni'], $_POST['telefono'], $_POST['correo'], $_POST['fecna'], $_POST['direccion'], $_POST['profesion']);
        header("Location: ../VISTA/DIRECTOR/vistaGestionEmpleados.php");
    }

    /*---------CONTROLADOR EDITAR CONTRATO-------*/
    elseif (isset($_POST['editarContrato'])) {
        $conexion->modificarContrato($_POST['id_contratado'], $_POST['fecini'], $_POST['fecfin'], $_POST['sueldo'], $_POST['diasvac'], $_POST['horario']);
        header("Location: ../VISTA/DIRECTOR/vistaGestionEmpleados.php");
    } else {
        ("Location: ../VISTA/DIRECTOR");
    }
} else {
    header("Location: ../VISTA/DIRECTOR");
}

$conexion->desconectar();
?>