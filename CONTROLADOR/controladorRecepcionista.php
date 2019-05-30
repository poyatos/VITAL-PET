<?php
    require_once "../BBDD/model.php";
    require_once "../BBDD/config.php";
    require_once '../FACTURAS/FPDF/fpdf.php';
    require_once '../FACTURAS/PHPMailer/PHPMailer.php';

    session_start();

    if (!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])) {
        header("Location: ../index.php");
    } else {
        if ($_SESSION['rol'] != 'Recepcionista') {
            header("Location: ../VISTA/".$_SESSION['rol']);
        }
    }

    $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

    if ($_POST) {
        /*---------CONTROLADOR VISTA AÑADIR CITA-------*/
        if (isset($_POST['anadirCita'])) {
            if ($conexion->anadirCita($_POST['fecha'], $_POST['hora'], $_POST['consulta'], $_POST['id_mascota'], $_POST['id_cliente'], $_POST['id_veterinario'])) {
                $_SESSION['exito'] = true;
                $_SESSION['url'] = 'vistaGestionCitas.php';
            } else {
                $_SESSION['exito'] = false;
                $_SESSION['mensaje'] = '<h2>Error al crear la cita. Intentelo de nuevo.</h2>';
                $_SESSION['url'] = 'vistaGestionMascotas.php';
            }
        }

        /*---------CONTROLADOR VISTA EDITAR CITA-------*/
        elseif (isset($_POST['editarCita'])) {
            if ($conexion->modificarCita($_POST['id_cita'], $_POST['fecha'], $_POST['hora'], $_POST['consulta'])) {
                $_SESSION['exito'] = true;
            } else {
                $_SESSION['exito'] = false;
                $_SESSION['mensaje'] = '<h2>Error al modificar la cita. Intentelo de nuevo.</h2>';
            }
            $_SESSION['url'] = 'vistaGestionCitas.php';
        }

        /*---------CONTROLADOR VISTA GESTION CITAS-------*/
        elseif (isset($_POST['borrarCita'])) {
            if ($conexion->borrarCita($_POST['id_cita'])) {
                $_SESSION['exito'] = true;
            } else {
                $_SESSION['exito'] = false;
                $_SESSION['mensaje'] = '<h2>Error al borrar la cita. Intentelo de nuevo.</h2>';
            }
            $_SESSION['url'] = 'vistaGestionCitas.php';
        } elseif (isset($_POST['finalizarCita'])) {
            $exito = false;
            if ($conexion->insertarPago($_POST['id_cliente'], $_POST['total'], $_POST['fecha'], $_POST['id_cita'])) {
                $exito = true;
            } else {
                $exito = false;
            }
            if ($conexion->finalizarCita($_POST['id_cita'])) {
                $exito = true;
            } else {
                $exito = false;
            }
            $datos = $conexion->visualizarDatosPago($_POST['id_cita']);
            if ($exito) {
                include '../FACTURAS/controladorPDF.php';
                include '../FACTURAS/envioFactura.php';
                $_SESSION['exito'] = true;
            } else {
                $_SESSION['exito'] = false;
                $_SESSION['mensaje'] = '<h2>Error al finalizar y pagar cita. Intentelo de nuevo.</h2>';
            }
            $_SESSION['url'] = 'vistaGestionCitas.php';
        }

        /*---------CONTROLADOR VISTA AÑADIR CLIENTE-------*/
        elseif (isset($_POST['anadirCliente'])) {
            if ($conexion->registrarUsuario($_POST['nombre'], $_POST['apellidos'], $_POST['dni'], $_POST['telefono'], $_POST['correo'], $_POST['fecna'], $_POST['direccion'], 'Cliente', $_POST['pass'])) {
                $_SESSION['exito'] = true;
                $_SESSION['url'] = 'vistaGestionCliente.php';
            } else {
                $_SESSION['exito'] = false;
                $_SESSION['mensaje'] = '<h2>Error al registrar el cliente. Intentelo de nuevo.</h2>';
                $_SESSION['url'] = '../RECEPCIONISTA/vistaRegistroCliente.php';
            }
        }

        /*---------CONTROLADOR VISTA AÑADIR MASCOTA-------*/
        elseif (isset($_POST['anadirMascota'])) {
            if($conexion->registrarMascota($_POST['id_cliente'], $_POST['nombre'], $_POST['tipo'], $_POST['raza'], $_POST['sexo'], $_POST['fecna'], $_POST['peso'])){
                $_SESSION['exito'] = true;
                $_SESSION['url'] = 'vistaGestionMascotas.php';
            } else {
                $_SESSION['exito'] = false;
                $_SESSION['mensaje'] = '<h2>Error al registrar la mascota. Intentelo de nuevo.</h2>';
                $_SESSION['url'] = 'vistaGestionCliente.php';
            }
        }

        /*---------CONTROLADOR VISTA EDITAR CLIENTE-------*/
        elseif (isset($_POST['editarCliente'])) {
            if($conexion->modificarUsuario($_POST['id_cliente'], $_POST['nombre'], $_POST['apellidos'], $_POST['dni'], $_POST['telefono'], $_POST['correo'], $_POST['fecna'], $_POST['direccion'])){
                $_SESSION['exito'] = true;
            } else {
                $_SESSION['exito'] = false;
                $_SESSION['mensaje'] = '<h2>Error al modificar el cliente. Intentelo de nuevo.</h2>';
            }
            $_SESSION['url'] = 'vistaGestionCliente.php';
        } else {
            header("Location: ../VISTA/RECEPCIONISTA");
        }
        header('Location: ../VISTA/COMUN/vistaAviso.php');
    } else {
        header("Location: ../VISTA/RECEPCIONISTA");
    }

    $conexion->desconectar();
