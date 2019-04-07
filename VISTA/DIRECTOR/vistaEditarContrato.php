<?php
  session_start();

  if(!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])){
    header("Location: ../../index.php");
  } else {
    if($_SESSION['rol'] != 'Director'){
      header("Location: ../".$_SESSION['rol']);
    }
  }

  $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

  $contrato = $conexion->visualizarContrato($_REQUEST['id_contratado']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>Vital-Pet / Editar contrato</title>
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
    <div class="logotipo col-12 col-sm-7 col-md-7 col-lg-7 text-left">

      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>CONTRATO</h2>
        </div>
        <form class="formulario" action="../../CONTROLADOR/controladorDirector.php" method="POST">
          <div class="form-row">
          <div class="form-group col-md-12">
            <h3>EDITAR CONTRATO</h3>
          </div>
          <div class="form-group col-md-6">
            <label for="inputFInicio">Fecha Inicio</label>
            <input type="date"  name="fecini"  class="form-control" id="fecha" value="<?= $contrato['fecini_contrato']?>" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputFFin">Fecha Fin</label>
            <input type="date"  name="fecfin"  class="form-control" id="fecha" value="<?= $contrato['fecfin_contrato']?>" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputSueldo">Sueldo</label>
            <input type="number"  name="sueldo"  class="form-control" id="1000" value="<?= $contrato['sueldo_contrato']?>" required>
          </div>

          <div class="form-group col-md-6">
            <label for="inputJob">Elije el horario</label>
            <select  name="horario"  id="inputJob" class="form-control" required>
            <?php
            if($contrato['horario_contrato'] == "Vespertino"){
             echo " <option value='Vespertino' selected>Vespertino</option>
              <option value='matutino'>Matutino</option>";
            }else{
              echo"<option value='Vespertino'>Vespertino</option>
              <option value='matutino' selected>Matutino</option>";
            }
              ?>
            </select>
          </div>

          <div class="form-group col-md-12">
            <label for="inputfevac">Fecha Vacaciones</label>
            <input type="date"  name="diasvac"  class="form-control" id="fechavac" value="<?= $contrato['diasvac_contrato']?>" required>
          </div>

          <input type="hidden" name="id_usuario" value="<?= $contrato['id_contratado']?>"/>

          <input type="submit" name="editarContrato" class="btn btn-lg" value="Editar contrato">


        </form>
      </div>
    </div>
  </div>

</body>

</html>