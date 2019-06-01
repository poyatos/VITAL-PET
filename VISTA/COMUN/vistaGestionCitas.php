<?php
    session_start();
    if (!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])) {
        header("Location: ../index.php");
    }

    if (isset($_GET["fecha"]) && isset($_GET["dni"]) && isset($_GET["estado"])) {
        $fecha = $_GET["fecha"];
        $dni = $_GET["dni"];
        $estado = $_GET["estado"];
    } else {
        $fecha = "";
        $dni = "";
        $estado = "";
    }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
      <title>Vital-Pet / Gestión citas</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <?php
          if ($_SESSION['rol'] == 'Cliente') {
              echo"<link rel='stylesheet' type='text/css' href='../../CSS/estiloClienteIndex.css'>";
          }else{
            echo'<link rel="stylesheet" type="text/css" href="../../CSS/estilo.css">';
          }
        ?> 
  </head>
  <body>
      <!-- MENU PRINCIPAL -->
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12  col-lg-12">
            <?php
              if ($_SESSION['rol'] == 'Cliente') {
                  include "../../INCLUDE/menuCli.inc";
                  echo"<button type='button' class='btn btn-primary btn-block'><a href='../CLIENTE/index.php'><h1>INICIO</h1></a></button>";
              } else {
                  include "../../INCLUDE/menuPrincipal.inc";
              }
            ?>
        </div>
      <!-- MENU LATERAL -->
      <?php
          if ($_SESSION['rol'] != 'Cliente') {
              echo"<div class='col-12 col-sm-5 col-md-4  col-lg-4'>";
          }
          if ($_SESSION['rol'] == 'Director') {
              include "../../INCLUDE/menuDir.inc";
          } elseif ($_SESSION['rol'] == 'Recepcionista') {
              include "../../INCLUDE/menuRec.inc";
          } elseif ($_SESSION['rol'] == 'Veterinario') {
              include "../../INCLUDE/menuVet.inc";
          }
      ?>
          </div>
    <!-- CONTENIDO-->
    <!-- filtro y busqueda-->
      <?php
          if ($_SESSION['rol'] != 'Cliente') {
              echo "<div class='logotipo col-12 col-sm-7 col-md-7 col-lg-7'>";
          } else {
              echo "<div class='logotipo col-12 col-sm-12 col-md-12 col-lg-12'>";
          }
      ?>
      <div class="form-group row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
          <h1>LISTADO CITAS</h1>
        </div>
    <?php
        if ($_SESSION['rol'] != 'Cliente') {
            echo '<form class="formulario" action="vistaGestionCitas.php" method="GET">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                      <label name="busquedaFecha_lb" id="id_busqueda_Nombre">Fecha:
                      <input class="form-control" name="fecha" id="myInput" type="date" value="'.$fecha.'">
                      </label>
                </div>
                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                      <label name="busquedaDni_lb" id="id_busqueda_nombre">NIE / NIF:
                      <input class="form-control" name="dni" id="myInput" type="text" value="'.$dni.'" placeholder="Busqueda...">
                      </label>
                </div>
                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                      <label name="busquedaCita_lb" id="id_busqueda_Nombre">Estado de cita:
                        <select name="estado">
                            <option value=""';
                            if($estado == 'Todas'){
                                echo 'selected';
                            } 
                            echo '>Todas</option>
                            <option value="Pendiente"';
                            if($estado == 'Pendiente'){
                                echo 'selected';
                            } 
                            echo '>Pendiente</option>
                            <option value="Finalizado"';
                            if($estado == 'Finalizado'){
                                echo 'selected';
                            } 
                            echo '>Finalizado</option>
                        </select>
                      </label>
                </div>
                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                      <input type="submit" class="btn btn-info botonsitobb" value="Buscar" name="busqueda">
                </div>
                      
                </form>';
        }
    ?> 
    <!-- TABLA-->
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID cita</th>
            <th>NIE / NIF</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Estado de la cita</th>
            <th>ID mascota</th>
            <th>Consulta nº</th>
            <?php
              if ($_SESSION['rol'] == 'Veterinario' || $_SESSION['rol'] == 'Recepcionista') {
                  echo '<th>Editar</th>';
              }
            ?>
          </tr>
        </thead>
        <tbody id="myTable">
        <?php
            require_once '../../BBDD/model.php';
            require_once '../../BBDD/config.php';
            $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);
            $fechaActual = date("Y-m-d");

            if ($_SESSION['rol'] == 'Veterinario') {
                $resultado = $conexion->visualizarCitasVeterinarioFiltrado($_SESSION['id_usuario'], $fecha, $dni, $estado);
            } elseif ($_SESSION['rol'] == 'Cliente') {
                $resultado = $conexion->visualizarCitasCliente($_SESSION['id_usuario']);
            } else {
                $resultado = $conexion->visualizarCitasFiltrado($fecha, $dni, $estado);
            }
            if (!empty($resultado)) {
                $total_registros = count($resultado);

                $tamano_pagina = 5;
                $pagina = false;

                if (isset($_GET["pagina"])) {
                    $pagina = $_GET["pagina"];
                }
                if (!$pagina) {
                    $inicio = 0;
                    $pagina = 1;
                } else {
                    $inicio = ($pagina - 1) * $tamano_pagina;
                }
                $total_paginas = ceil($total_registros / $tamano_pagina);
                
                if ($_SESSION['rol'] == 'Veterinario') {
                    $resultadoPaginacion = $conexion->visualizarCitasVeterinarioFiltradoPaginacion($_SESSION['id_usuario'], $fecha, $dni, $estado, $inicio, $tamano_pagina);
                } elseif ($_SESSION['rol'] == 'Cliente') {
                    $resultadoPaginacion = $conexion->visualizarCitasClientePaginacion($_SESSION['id_usuario'], $inicio, $tamano_pagina);
                } else {
                    $resultadoPaginacion = $conexion->visualizarCitasFiltradoPaginacion($fecha, $dni, $estado, $inicio, $tamano_pagina);
                }
                foreach ($resultadoPaginacion as $citas) {
                    echo(" <tr>
                    <td><a href='vistaDetalleCitas.php?id=".$citas['id_cita']."'>".$citas['id_cita']."</a></td>
                    <td>".$citas['dni_usuario']."</td>
                    <td>".date("d/m/Y", strtotime($citas['fecha_cita']))."</td>
                    <td>".$citas['hora_cita']."</td>
                    <td>".$citas['estado_cita']."</td>
                    <td>".$citas['id_mascota']."</td>
                    <td>".$citas['num_consulta']."</td>");
                    if ($_SESSION['rol'] == 'Veterinario') {
                        echo('<td>');
                        if ($citas['fecha_cita'] <=  $fechaActual) {
                            echo('<form action="../VETERINARIO/vistaAnadirPrueba.php" method="POST"> 
                            <input type="hidden" value="'.$citas['id_mascota'].'" name="id_mascota">
                            <input type="hidden" value="'.$citas['id_cita'].'" name="id_cita">
                            <input class="btn btn-primary" type="submit" value="Añadir prueba">
                            </form>');
                        }
                        echo('</td>');
                    } elseif ($_SESSION['rol'] == 'Recepcionista') {
                        echo('<td>');
                        if ($citas['estado_cita'] != 'Finalizado') {
                            echo('<form action="../../CONTROLADOR/controladorRecepcionista.php" method="POST"> 
                            <input type="hidden" value="'.$citas['id_cita'].'" name="id_cita">
                            <input class="btn btn-primary" type="submit" value="Borrar" name="borrarCita">
                            </form>');
                            if ($citas['fecha_cita'] <=  $fechaActual) {
                                echo('<form action="../RECEPCIONISTA/vistaRealizarPago.php" method="POST">
                                <input type="hidden" value="'.$citas['id_cita'].'" name="id_cita">
                                <input class="btn btn-primary" type="submit" value="Finalizar cita">
                                </form>');
                            }
                        }
                        echo('</td>');
                    }
                    echo("</tr>");
                } ?>
        </tbody>
      </table>
    </div>
    <!--PAGINACIÓN-->
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
    <?php
        $busqueda = "&fecha=".$fecha."&dni=".$dni."&estado=".$estado;
                include '../../INCLUDE/piePaginacion.php';
            } else {
                echo("<p>No se han encontrado resultados.</p>");
            }
      $conexion->desconectar();
      ?>
    </div>
    </div>
    </div>
    </div>
    </body>
  </head>
</html>