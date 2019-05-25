<?php
    require_once "../BBDD/config.php";
    require_once "../BBDD/model.php";

    session_start();

    unset($_SESSION['usuario']);
    unset($_SESSION['rol']);

    $dni = $_POST['dni'];
    $pass = $_POST['pwd'];

    $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

    $conexion->iniciarSesionUsuario($dni,$pass);

    $conexion->desconectar();
?>