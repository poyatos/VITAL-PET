<?php
    require_once "../../BBDD/model.php";
    require_once "../../BBDD/config.php";

    session_start();

    if (!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])) {
        header("Location: ../../index.php");
    } else {
        if ($_SESSION['rol'] != 'Recepcionista') {
            header("Location: ../".$_SESSION['rol']);
        }
    }

    $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

    if ($_POST['accion'] == 'comprobarHoras') {
        $arrayHorasDisponibles = array();
        $arraySalasDisponibles = array();

        for ($i = 8; $i <= 20; $i++) {
            $hora;
            if ($i < 10) {
                $hora = "0".$i.":00";
            } else {
                $hora = $i.":00";
            }

            $salasHora = $conexion->visualizarCitasFechaHora($_POST['fecha'], $hora);
            if ($salasHora) {
                foreach ($salasHora as $sala) {
                    $j = 1;
                    $salaDisponible = true;
                    while ($j <= 5 && $salaDisponible) {
                        if ($sala['num_consulta'] == $j) {
                            $salaDisponible = false;
                        }
                        $j++;
                    }

                    if ($salaDisponible) {
                        array_push($arraySalasDisponibles, $sala['num_consulta']);
                    }
                }
                if (!(empty($arraySalasDisponibles)) || count($arraySalasDisponibles) > 0) {
                    array_push($arrayHorasDisponibles, $hora);
                }
            } else {
                array_push($arrayHorasDisponibles, $hora);
            }
        }

        $arrayHorasDisponiblesJSON = json_encode($arrayHorasDisponibles);
        echo ($arrayHorasDisponiblesJSON);
    }
?>