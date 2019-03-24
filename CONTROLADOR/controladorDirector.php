<?php

require_once "../BBDD/model.php";
require_once "../BBDD/config.php";

session_start();


/*---------CONTROLADOR VISTA_CONSULTAR_EMPLEADOS-------*/

if(isset($_POST['renovarContrato'])){
    header("Location: ../VISTA/DIRECTOR/vistaEditarContrato.php?idContrato=".$_POST["idContrato"]);

}else if(isset($_POST['despedirContrato'])){
    $conexion = new Model (Config::$host, Config::$user, Config::$pass, Config::$nombreBase);
    finalizarContrato();
 }else if (isset($_POST['modificarEmpleado'])){
    header("Location: ../VISTA/DIRECTOR/vistaEditarEmpleado.php?idUsuario=".$_POST["idUsuario"]);
 }
 /*---------CONTROLADOR GESTIONAR_CITAS-------*/
  /*---------CONTROLADOR EDITAR_CONTRATO-------*/
  


?>