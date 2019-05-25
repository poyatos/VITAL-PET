<?php
  require_once '../../BBDD/model.php';
  require_once '../../BBDD/config.php';

  session_start();

  if(!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])){
    header("Location: ../../index.php");
  } else {
    if($_SESSION['rol'] != 'Director'){
      header("Location: ../".$_SESSION['rol']);
    }
  }

  $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

  $contrato = $conexion->visualizarContratoId($_POST['id_usuario']);

  $conexion->desconectar();
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
        <div class="row">
            <div class="panel panel-default">
            <div class="panel-heading">
              <?php
              if(isset($_POST['editarContrato'])){

                 echo" <h2>EDITAR CONTRATO</h2>";

              } else {

                echo"<h2>RENOVAR CONTRATO</h2>";
            
              }
                ?>
            </div>
            <form class="formulario" action='../../CONTROLADOR/controladorDirector.php' method='post>
              <div class="form-row">


                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
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
            <label for="inputJob">Elige el horario</label>
            <select name="horario" id="inputJob" class="form-control" required>
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
            <label for="inputfevac">Dias de vacaciones</label>
            <input type="number"  name="diasvac"  class="form-control" id="fechavac" value="<?= $contrato['diasvac_contrato']?>" required>
          </div>

          <input type="hidden" name="id_contratado" value="<?= $contrato['id_contratado']?>"/>


          <?php
              if(isset($_POST['editarContrato'])){

                 echo"<input type='submit' name='editarContrato' class='btn btn-lg' value='Editar Contrato'>";

                }else{

                  echo"<input type='submit' name='renovarContrato' class='btn btn-lg' value='Renovar Contrato'>";
                  
                }
                ?>
          

          </div>
          </form>
        </div>
        <button class="btn btn-info"><a class="h4" href="<?= $_SERVER['HTTP_REFERER'] ?>"><span class="glyphicon glyphicon-arrow-left"></span> Volver</a></button>
      </div>
    </div>

  </div>

</body>

</html>