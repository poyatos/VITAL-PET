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
<div class="col-12 col-sm-7 col-md-7 col-lg-7 text-center">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12  col-lg-12">
        <ul class="list-group">
            <li class="list-group-item list-group-item-action list-group-item-success"><img src="../../IMAGENES/veterinario.png" class="img-thumbnail" alt="Empleado"></li>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                      <li class="list-group-item list-group-item-action list-group-item-success">Nombre</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-success">Apellidos</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                      <li class="list-group-item list-group-item-action list-group-item-success">Fecha de nacimiento</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-success">DNI</li>
                    </div> 
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-success">Correo Electrónico</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-success">Teléfono</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12  col-lg-12">
                    <li class="list-group-item list-group-item-action list-group-item-success">Dirección</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-info">Inicio del contrato</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-info">Fin del contrato</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-info">Horario</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-info">Sueldo</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-info">Dias de vacaciones</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-info">Estado del contrato</li>
                    </div>
                    </div>
                </div>
        </ul>
        </div>

<!-- SI EL EMPLEADO ES RECEPCIONISTA SE IMPRIME ESTE , LAS CLASES CAMBIAN Y LAS IMAGENES TAMBIEN POR ESO TENGO QUE REPETIR CÓDIGO (@miguel) -->
<div class="row">
        <div class="col-12 col-sm-12 col-md-12  col-lg-12">
        <ul class="list-group">
            <li class="list-group-item list-group-item-action list-group-item-warning"><img src="../../IMAGENES/recepcionista.png" class="img-thumbnail" alt="Empleado"></li>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                      <li class="list-group-item list-group-item-action list-group-item-warning">Nombre</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-warning">Apellidos</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                      <li class="list-group-item list-group-item-action list-group-item-warning">Fecha de nacimiento</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-warning">DNI</li>
                    </div> 
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-warning">Correo Electrónico</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-warning">Teléfono</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12  col-lg-12">
                    <li class="list-group-item list-group-item-action list-group-item-warning">Dirección</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-danger">Inicio del contrato</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-danger">Fin del contrato</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-danger">Horario</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-danger">Sueldo</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-danger">Dias de vacaciones</li>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6  col-lg-6">
                    <li class="list-group-item list-group-item-action list-group-item-danger">Estado del contrato</li>
                    </div>
                    </div>
                </div>
        </ul>
        </div>


      

        <?php
        $conexion->desconectar();
        ?>
 

</div>

</div>
</body>

</html>