<?php
    require_once "../BBDD/model.php";
    require_once "../BBDD/config.php";

    session_start();

    if (!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])) {
        header("Location: ../index.php");
    } else {
        if ($_SESSION['rol'] != 'Recepcionista') {
            header("Location: ../VISTA/".$_SESSION['rol']);
        }
    }

    $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

    $arrayVeterinariosDisponibles = $conexion->visualizarVeterinariosDisponibles('2019-05-03', '11:00');
        $arrayVeterinariosDisponiblesJSON = json_encode($arrayVeterinariosDisponibles);
        echo($arrayVeterinariosDisponiblesJSON);
?>