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
  <title>Vital-Pet / Contratar empleados</title>
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
    <form class="formulario" action="../../CONTROLADOR/controladorDirector.php" method="POST">
      <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>CONTRATAR</h2>
        </div>
          <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
          
          <div class="form-row">
            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
              <label for="inputNombre">Nombre</label>
              <input type="text" name="nombre" class="form-control" id="inputNombre" placeholder="Nombre" required>
            </div>

            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
              <label for="inputApellidos">Apellidos</label>
              <input type="text"  name="apellidos" class="form-control" id="inputApellidos" placeholder="Apellidos" required>
            </div>

            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
              <label for="inputPassword">Contraseña</label>
              <input type="password"  name="pass"  class="form-control" id="inputPassword" placeholder="Contraseña" required>
            </div>

            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
              <label for="inputRePassword">Repite la contraseña</label>
              <input type="password"  name="rePass"  class="form-control" id="inputRePassword" placeholder="Repite la contraseña" required>
            </div>

            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
              <label for="inputDni">DNI</label>
              <input type="text"  name="dni"  class="form-control" id="inputDni" placeholder="492039494E" required>
            </div>
          </div>

          <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
            <label for="inputCorreo">Correo</label>
            <input type="text"  name="correo"  class="form-control" id="inputCorreo" placeholder="ejemplo@ejemplo.ejemplo" required>
          </div>

          <div class="form-row">
            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
              <label for="inputDireccion">Direccion</label>
              <input type="text"  name="direccion"  class="form-control" id="calle de ejemplo numero 3" required>
            </div>

            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
              <label for="inputTelefono">Telefono</label>
              <input type="text"  name="telefono"  class="form-control" id="916652654" required>
            </div>
          </div>

          <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
            <label for="inputFecha">Fecha de nacimiento</label>
            <input type="date"  name="fecna"  class="form-control" id="fecha" required>
          </div>

          <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
            <label for="inputJob">Elige la profesión</label>
            <select  name="profesion"  id="inputJob" class="form-control" required>
              <option value="veterinario" selected>Veterinario</option>
              <option value ="recepcionista">Recepcionista</option>
            </select>
          </div>

          <br/>

          <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
            <h3>CONTRATO</h3>
          </div>

          <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
            <label for="inputFInicio">Fecha Inicio</label>
            <input type="date"  name="fecini"  class="form-control" id="fecha" required>
          </div>

          <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
            <label for="inputFFin">Fecha Fin</label>
            <input type="date"  name="fecfin"  class="form-control" id="fecha" required>
          </div>

          <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
            <label for="inputSueldo">Sueldo</label>
            <input type="number"  name="sueldo"  class="form-control" id="1000" required>
          </div>

          <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
            <label for="inputJob">Elige el horario</label>
            <select  name="horario"  id="inputJob" class="form-control" required>
              <option value="matutino" selected>Vespertino</option>
              <option value="vespertino">Matutino</option>
            </select>
          </div>

          <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
            <label for="inputfevac">Fecha Vacaciones</label>
            <input type="date"  name="diasvac"  class="form-control" id="fechavac" required>
          </div>

          <input type="submit" class="btn btn-lg" value="contratar"/>


        
        </div>
      </div>
    </div>
</div>
</form>
  </div>

</body>

</html>