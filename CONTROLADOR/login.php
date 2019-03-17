<?php
    require_once "../BBDD/config.php";
    require_once "../BBDD/model.php";

    session_start();

    unset($_SESSION['logeado']);

    $dni = $_POST['dni'];
    $pass = $_POST['pwd'];

    if(empty($dni) || empty($pass)){
        echo "<br/><h2>Alguno de los campos esta vacio.</h2><br />";
        echo "<a href='sesionFormulario.php'>Por favor rellene todos los campos.</a>";
    } else {
        $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

        $conexion->iniciarSesionUsuario($dni,$pass);
    }

    $conexion->desconectar();
?>