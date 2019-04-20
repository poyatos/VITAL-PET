<?php
    require_once "../BBDD/model.php";
    require_once "../BBDD/config.php";

    session_start();

    if(!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])){
        header("Location: ../index.php");
    } else {
        if($_SESSION['rol'] != 'Recepcionista'){
            header("Location: ../VISTA/".$_SESSION['rol']);
        }
    }

    $conexion = new Model (Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

    if($_POST){
        /*---------CONTROLADOR VISTA AÑADIR CITA-------*/
        if(isset($_POST['anadirCita'])){
            $conexion->anadirCita($_POST['fecha'], $_POST['hora'], $_POST['consulta'], $_POST['id_mascota'], $_POST['id_cliente']);
        }

        /*---------CONTROLADOR VISTA AÑADIR CLIENTE-------*/
        if(isset($_POST['anadirCliente'])){
            $conexion->registrarUsuario($_POST['nombre'], $_POST['apellidos'], $_POST['dni'], $_POST['telefono'], $_POST['correo'], $_POST['fecna'], $_POST['direccion'], 'Cliente', $_POST['pass']);
        }

        /*---------CONTROLADOR VISTA AÑADIR MASCOTA-------*/
        if(isset($_POST['anadirMascota'])){
            $conexion->registrarMascota($_POST['id_cliente'], $_POST['nombre'], $_POST['tipo'], $_POST['raza'], $_POST['sexo'], $_POST['fecna'], $_POST['peso']);
        }
    }
?>