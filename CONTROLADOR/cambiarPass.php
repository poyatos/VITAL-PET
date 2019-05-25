<?php
    require_once "../BBDD/config.php";
    require_once "../BBDD/model.php";

    session_start();

    $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

    if(isset($_POST['btnPass'])){
        if($conexion->modificarPass($_SESSION['id_usuario'], $_POST['pass'])){
            header('Location: ../VISTA/'.$_SESSION['rol']);
        } else {
            echo 'Error al cambiar contraseña.';
        }
    }

    $conexion->desconectar();
?>