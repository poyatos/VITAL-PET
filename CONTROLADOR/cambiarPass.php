<?php
    require_once "../BBDD/config.php";
    require_once "../BBDD/model.php";

    session_start();

    $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

    if (isset($_POST['btnPass'])) {
        if ($conexion->modificarPass($_SESSION['id_usuario'], $_POST['pass'])) {
            $_SESSION['exito'] = true;
            $_SESSION['url'] = 'vistaComunCambiarContrasena.php';
        } else {
            $_SESSION['exito'] = false;
            $_SESSION['mensaje'] = '<h2>Error al cambiar contraseña.</h2>';
            $_SESSION['url'] = 'vistaComunCambiarContrasena.php';
        }
        header('Location: ../VISTA/COMUN/vistaAviso.php');
    }

    $conexion->desconectar();
