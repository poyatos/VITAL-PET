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
            $conexion->anadirCita($_POST['fecha'], $_POST['hora'], $_POST['consulta'], $_POST['id_mascota'], $_POST['id_cliente'], $_POST['id_veterinario']);
            header("Location: ../VISTA/COMUN/vistaGestionMascotas.php");
        }

        /*---------CONTROLADOR VISTA EDITAR CITA-------*/  
        elseif(isset($_POST['editarCita'])){
            $conexion->modificarCita($_POST['id_cita'], $_POST['fecha'], $_POST['hora'], $_POST['consulta']);
            header("Location: ../VISTA/COMUN/vistaGestionCitas.php");
        }      

        /*---------CONTROLADOR VISTA GESTION CITAS-------*/
        elseif(isset($_POST['borrarCita'])){
            $conexion->borrarCita($_POST['id_cita']);
            header("Location: ../VISTA/COMUN/vistaGestionCitas.php");
        } elseif(isset($_POST['finalizarCita'])){
            $conexion->insertarPago($_POST['id_cliente'], $_POST['total'], $_POST['fecha'], $_POST['id_cita']);
            $conexion->finalizarCita($_POST['id_cita']);
            header("Location: ../VISTA/COMUN/vistaGestionCitas.php");
        }

        /*---------CONTROLADOR VISTA AÑADIR CLIENTE-------*/
        elseif(isset($_POST['anadirCliente'])){
            $conexion->registrarUsuario($_POST['nombre'], $_POST['apellidos'], $_POST['dni'], $_POST['telefono'], $_POST['correo'], $_POST['fecna'], $_POST['direccion'], 'Cliente', $_POST['pass']);
            header("Location: ../VISTA/RECEPCIONISTA/vistaRegistroCliente.php");
        }

        /*---------CONTROLADOR VISTA AÑADIR MASCOTA-------*/
        elseif(isset($_POST['anadirMascota'])){
            $conexion->registrarMascota($_POST['id_cliente'], $_POST['nombre'], $_POST['tipo'], $_POST['raza'], $_POST['sexo'], $_POST['fecna'], $_POST['peso']);
            header("Location: ../VISTA/RECEPCIONISTA/vistaRegistroMascota.php");
        }

        /*---------CONTROLADOR VISTA EDITAR CLIENTE-------*/        
        elseif(isset($_POST['editarCliente'])){
            $conexion->modificarUsuario($_POST['id_cliente'], $_POST['nombre'], $_POST['apellidos'], $_POST['dni'], $_POST['telefono'], $_POST['correo'],  $_POST['fecna'],  $_POST['direccion']);
            header("Location: ../VISTA/COMUN/vistaGestionCliente.php");
        } 

        /*---------CONTROLADOR VISTA GESTION CLIENTE-------*/ 
        elseif(isset($_POST['borrarCliente'])){
            $conexion->borrarUsuario($_POST['id_cliente']);
            header("Location: ../VISTA/COMUN/vistaGestionCliente.php");
        }
    }
?>