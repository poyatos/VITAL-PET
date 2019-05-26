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
        if($conexion->finalizarContrato($_POST['id_usuario'])){
            $_SESSION['exito'] = true;           
        } else {
            $_SESSION['exito'] = false;
            $_SESSION['mensaje'] = '<h2>Error al finalizar contrato.</h2>';
        }
        $_SESSION['url'] = '../DIRECTOR/vistaGestionEmpleados.php';
    } elseif (isset($_POST['renovarContrato'])) {
        if($conexion->renovarContrato($_POST['id_contratado'], $_POST['fecini'], $_POST['fecfin'], $_POST['sueldo'], $_POST['diasvac'], $_POST['horario'])){
            $_SESSION['exito'] = true;
        } else {
            $_SESSION['exito'] = false;
            $_SESSION['mensaje'] = '<h2>Error al renovar contrato.</h2>';
        }
        $_SESSION['url'] = '../DIRECTOR/vistaGestionEmpleados.php';
    }

    /*---------CONTROLADOR CONTRATAR-------*/
    elseif (isset($_POST['contratar'])) {
        $exito = false;
        if($conexion->registrarUsuario($_POST['nombre'], $_POST['apellidos'], $_POST['dni'], $_POST['telefono'], $_POST['correo'], $_POST['fecna'], $_POST['direccion'], $_POST['profesion'], $_POST['pass'])){
            $exito = true;
        } else {
            $exito = false;
        }
        $empleadoContratado = $conexion->visualizarUsuarioDni($_POST['dni']);
        $idContratado = $empleadoContratado['id_usuario'];
        if($conexion->contratarUsuario($_POST['fecini'], $_POST['fecfin'], $_POST['sueldo'], $_POST['diasvac'], $_POST['horario'], 'Activo', $idContratado)){
            $exito = true;
        } else {
            $exito = false;
        }
        if($exito){
            $_SESSION['exito'] = true;
            $_SESSION['url'] = '../DIRECTOR/vistaGestionEmpleados.php';
        } else {
            $_SESSION['exito'] = false;
            $_SESSION['mensaje'] = '<h2>Error al contratar empleado.</h2>';
            $_SESSION['url'] = '../DIRECTOR/vistaContratar.php';
        }
    }

    /*---------CONTROLADOR EDITAR EMPLEADO-------*/
    elseif (isset($_POST['editarEmpleado'])) {
        if($conexion->modificarUsuario($_POST['id_usuario'], $_POST['nombre'], $_POST['apellidos'], $_POST['dni'], $_POST['telefono'], $_POST['correo'], $_POST['fecna'], $_POST['direccion'])){
            $_SESSION['exito'] = true;
        } else {
            $_SESSION['exito'] = false;
            $_SESSION['mensaje'] = '<h2>Error al editar empleado.</h2>';
        }
        $_SESSION['url'] = '../DIRECTOR/vistaGestionEmpleados.php';
    }

    /*---------CONTROLADOR EDITAR CONTRATO-------*/
    elseif (isset($_POST['editarContrato'])) {
        if($conexion->modificarContrato($_POST['id_contratado'], $_POST['fecini'], $_POST['fecfin'], $_POST['sueldo'], $_POST['diasvac'], $_POST['horario'])){
            $_SESSION['exito'] = true;
        } else {
            $_SESSION['exito'] = false;
            $_SESSION['mensaje'] = '<h2>Error al editar contrato.</h2>';
        }
        $_SESSION['url'] = '../DIRECTOR/vistaGestionEmpleados.php';
    } else {
        header("Location: ../VISTA/DIRECTOR");
    }
    header('Location: ../VISTA/COMUN/vistaAviso.php');
} else {
    header("Location: ../VISTA/DIRECTOR");
}

$conexion->desconectar();
?>