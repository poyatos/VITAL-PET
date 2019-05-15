<?php
    require_once '../../BBDD/model.php';
    require_once '../../BBDD/config.php';

  session_start();

  if (!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])) {
      header("Location: ../../index.php");
  } else {
      if ($_SESSION['rol'] != 'Recepcionista') {
          header("Location: ../".$_SESSION['rol']);
      }
  }
  $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

  $veterinarios = $conexion->visualizarVeterinarios();

  $conexion->desconectar();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vital-Pet / Añadir Cita</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!-- prueba -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- prueba -->

    <!--AJAX -->
    <script src="citas.js" type="text/javascript"></script>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../CSS/estilo.css">

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
      include "../../INCLUDE/menuRec.inc"
       ?>
        </div>


        <!-- CONTENIDO-->
        <div class="logotipo col-12 col-sm-7 col-md-7 col-lg-7 text-left">
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>AÑADIR CITA</h2>
                    </div>
                    <form class="formulario" action='../../CONTROLADOR/controladorRecepcionista.php' method='POST'>
                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                            <h3>INFORMACIÓN</h3>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="inputFecha">Fecha</label>
                                <input type="date" name="fecha" class="form-control" id="inputFecha" required>
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                            <label for="inputHora">Hora</label>
                                <select name="hora" id="inputHora" class="form-control" required> 
                                     
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="inputSala">Sala</label>
                            <select name="consulta" id="inputSala" class="form-control" required>
                                    
                            </select>
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="inputVeterinario">Veterinario</label>
                            <select name="id_veterinario" id="inputVeterinario" class="form-control" required>

                            </select>
                            </div>
                        <div class="form-row">   
                        <br/>
                        <input type="hidden" name="id_cliente" value="<?= $_POST['id_cliente'] ?>" id="dni_id">
                        <input type="hidden" name="id_mascota" value="<?= $_POST['id_mascota'] ?>" id="id_mascota_id">
                        <input type="submit"  class="btn btn-lg" name="anadirCita" value="Añadir cita">
                    </form>
                </div>
            </div>
        </div>


  




</body>

</html>