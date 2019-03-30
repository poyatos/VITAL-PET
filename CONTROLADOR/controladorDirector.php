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

/*---------CONTROLADOR VISTA_CONSULTAR_EMPLEADOS-------*/

if(isset($_POST['renovarContrato'])){
    header("Location: ../VISTA/DIRECTOR/vistaEditarContrato.php?idUsuario=".$_POST['idUsuario']);
} else if(isset($_POST['despedirContrato'])){
    $conexion->finalizarContrato($_POST['idUsuario']);
    header("Location: ../VISTA/DIRECTOR/vistaGestionEmpleados.php");
} else if (isset($_POST['modificarEmpleado'])){
    header("Location: ../VISTA/DIRECTOR/vistaEditarEmpleado.php?idUsuario=".$_POST['idUsuario']);
}

/*---------CONTROLADOR CONTRATAR-------*/
if(isset($_POST['contratar'])){
    $conexion->registrarUsuario($_POST['nombre'], $_POST['apellidos'], $_POST['dni'], $_POST['telefono'], $_POST['correo'], $_POST['fecna'], $_POST['direccion'], $_POST['profesion'], $_POST['pass']);
    $idContratado = $conexion->visualizarUsuarioDni($_POST['dni']);
    $conexion->contratarUsuario($_POST['fecini'], $_POST['fecfin'], $_POST['sueldo'], $_POST['diasvac'], $_POST['horario'], 'Activo', $idContratado);
}

/*---------CONTROLADOR EDITAR EMPLEADO-------*/
if(isset($_POST['editarEmpleado'])){
    $conexion->modificarUsuario($_POST['idUsuario'], $_POST['nombre'], $_POST['apellidos'], $_POST['dni'], $_POST['telefono'], $_POST['correo'], $_POST['fecna'], $_POST['direccion'], $_POST['profesion'], $_POST['pass']);
    header("Location: ../VISTA/DIRECTOR/vistaGestionEmpleados.php");
}

/*---------CONTROLADOR GESTIONAR_CITAS-------*/


$conexion->desconectar();
  


?>