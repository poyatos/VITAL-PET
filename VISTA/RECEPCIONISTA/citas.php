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

            $arrayVeterinariosDisponibles = $conexion->visualizarVeterinariosDisponibles($_POST['fecha'], $hora);
            $salasHora = $conexion->visualizarCitasFechaHora($_POST['fecha'], $hora);
            if(!(empty($arrayVeterinariosDisponibles)) && count($arrayVeterinariosDisponibles) > 0){
                if (!(empty($salasHora)) && count($salasHora) > 0) {
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
                    if (!(empty($arraySalasDisponibles)) && count($arraySalasDisponibles) > 0) {
                        array_push($arrayHorasDisponibles, $hora);
                    }
                } else {
                    array_push($arrayHorasDisponibles, $hora);
                }
            }
        }

        $arrayHorasDisponiblesJSON = json_encode($arrayHorasDisponibles);
        echo($arrayHorasDisponiblesJSON);
    } elseif ($_POST['accion'] == 'comprobarSalas') {
        $arraySalasDisponibles = array();
        $salasHora = $conexion->visualizarCitasFechaHora($_POST['fecha'], $_POST['hora']);

        if (!(empty($salasHora)) && count($salasHora) > 0) {
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
        } else {
            $arraySalasDisponibles = array(1,2,3,4,5);
        }
        $arraySalasDisponiblesJSON = json_encode($arraySalasDisponibles);
        echo($arraySalasDisponiblesJSON);
    } elseif ($_POST['accion'] == 'comprobarVeterinarios') {
        $arrayVeterinariosDisponibles = $conexion->visualizarVeterinariosDisponibles($_POST['fecha'], $_POST['hora']);
        $arrayVeterinariosDisponiblesJSON = json_encode($arrayVeterinariosDisponibles);
        echo($arrayVeterinariosDisponiblesJSON);
    }

    $conexion->desconectar();
?>
