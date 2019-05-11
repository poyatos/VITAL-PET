<?php
  session_start();

  if(!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])){
    header("Location: ../../index.php");
    } else {
        if($_SESSION['rol'] != 'Director'){
            header("Location: ../".$_SESSION['rol']);
        }
  }
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>Vital-Pet / Gestión empleados</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!-- prueba -->
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- prueba -->

  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="../../CSS/estilo.css">
  <link rel="stylesheet" type="text/css" href="../../CSS/vistaDetalle.css">
  

</head>

<body>
  <!-- MENU PRINCIPAL -->
  <div class="row">
  <div class="col-12 col-sm-12 col-md-12  col-lg-12">
      <?php
      include "../../INCLUDE/menuPrincipal.inc"
      ?>
  </div>


  <!-- MENU LATERAL -->
  <div class="col-12 col-sm-5  col-md-4  col-lg-4">
  <?php
      include "../../INCLUDE/menuDir.inc"
  ?>
      </div>


<!-- CONTENIDO-->

<!-- SI EL EMPLEADO ES VETERINARIO SE IMPRIME ESTE -->
<!-- CONTENIDO-->

<!-- SI EL EMPLEADO ES VETERINARIO SE IMPRIME ESTE -->
<div class="col-12 col-sm-7 col-md-7 col-lg-7 text-center">
    <div class="row">

    <?php
        require_once '../../BBDD/model.php';
        require_once '../../BBDD/config.php';
      
        $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);
        $resultado = $conexion->visualizarContratoClientes($_GET["id"]);
    ?>
      

        
        <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
        <ul class='list-group'>

        <?php

        if( $resultado['rol_usuario'] == 'Veterinario'){
        echo'<li class="list-group-item list-group-item-action list-group-item-success"><img src="../../IMAGENES/veterinario.png" class="img-thumbnail" alt="Empleado"></li>';
        }else if ($resultado['rol_usuario'] == 'Recepcionista'){
        echo '<li class="list-group-item list-group-item-action list-group-item-success"><img src="../../IMAGENES/recepcionista.png" class="img-thumbnail" alt="Empleado"></li>';
        }
        ?>
              <div class='row'>
                    <div class='col-12 col-sm-12 col-md-6  col-lg-6'>
                      <li class='list-group-item list-group-item-action list-group-item-info'><p class="d-flex flex-start">Nombre:</p><?= $resultado['nombre_usuario']?></li>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6  col-lg-6'>
                    <li class='list-group-item list-group-item-action list-group-item-info'><p class="d-flex flex-start">Apellidos:</p><?= $resultado['apellidos_usuario']?></li>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6  col-lg-6'>
                      <li class='list-group-item list-group-item-action list-group-item-info'><p class="d-flex flex-start">Fecha de nacimiento:</p><?= $resultado['fecna_usuario']?></li>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6  col-lg-6'>
                    <li class='list-group-item list-group-item-action list-group-item-info'><p class="d-flex flex-start">Dni:</p><?= $resultado['dni_usuario']?></li>
                    </div> 
                    <div class='col-12 col-sm-12 col-md-6  col-lg-6'>
                    <li class='list-group-item list-group-item-action list-group-item-info'><p class="d-flex flex-start">Correo:</p><?= $resultado['correo_usuario']?></li>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6  col-lg-6'>
                    <li class='list-group-item list-group-item-action list-group-item-info'><p class="d-flex flex-start">Teléfono:</p><?= $resultado['telefono_usuario']?></li>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6  col-lg-6'>
                    <li class='list-group-item list-group-item-action list-group-item-info'><p class="d-flex flex-start">Dirección:</p><?= $resultado['direccion_usuario']?></li>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6  col-lg-6'>
                    <li class='list-group-item list-group-item-action list-group-item-info'><p class="d-flex flex-start">Empleo:</p><?= $resultado['rol_usuario']?></li>
                    </div>
                    <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
                    <li class='list-group-item list-group-item-action list-group-item-success'>CONTRATO</li>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6  col-lg-6'>
                    <li class='list-group-item list-group-item-action list-group-item-info'><p class="d-flex flex-start">Inicio del contrato:</p><?= $resultado['fecini_contrato']?></li>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6  col-lg-6'>
                    <li class='list-group-item list-group-item-action list-group-item-info'><p class="d-flex flex-start">Fin del contrato:</p><?= $resultado['fecfin_contrato']?></li>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6  col-lg-6'>
                    <li class='list-group-item list-group-item-action list-group-item-info'><p class="d-flex flex-start">Horario:</p><?= $resultado['horario_contrato']?></li>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6  col-lg-6'>
                    <li class='list-group-item list-group-item-action list-group-item-info'><p class="d-flex flex-start">Sueldo:</p><?= $resultado['sueldo_contrato']?></li>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6  col-lg-6'>
                    <li class='list-group-item list-group-item-action list-group-item-info'><p class="d-flex flex-start">Vacaciones:</p><?= $resultado['diasvac_contrato']?></li>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6  col-lg-6'>
                    <li class='list-group-item list-group-item-action list-group-item-info'><p class="d-flex flex-start">Estado:</p><?= $resultado['estado_contrato']?></li>
                    </div>
                   
                </div>
            </div>
        </ul>
        </div>


        <?php
        $conexion->desconectar();
        ?>
 
</body>

</html>