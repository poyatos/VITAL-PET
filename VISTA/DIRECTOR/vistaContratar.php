<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
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
  <?php
      include "../../INCLUDE/menuPrincipal.inc"
      ?>

  <div class="row">

    <!-- MENU LATERAL -->
    <div class="col-sm-4">
      <?php
      include "../../INCLUDE/menuDir.inc"
  ?>
    </div>


    <!-- CONTENIDO-->
    <div class="col-sm-7 text-left">

      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>CONTRATAR</h2>
        </div>
        <form class="formulario">
          <div class="form-group col-md-12">
            <h3>INFORMACIÓN</h3>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputNombre">Nombre</label>
              <input type="text" class="form-control" id="inputNombre" placeholder="Nombre">
            </div>
            <div class="form-group col-md-6">
              <label for="inputApellidos">Apellidos</label>
              <input type="text" class="form-control" id="inputApellidos" placeholder="Apellidos">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword">Contraseña</label>
              <input type="password" class="form-control" id="inputPassword" placeholder="Password">
            </div>
            <div class="form-group col-md-6">
              <label for="inputDni">DNI</label>
              <input type="text" class="form-control" id="inputDni" placeholder="492039494E">
            </div>
          </div>
          <div class="form-group col-md-12">
            <label for="inputCorreo">Correo</label>
            <input type="text" class="form-control" id="inputCorreo" placeholder="ejemplo@ejemplo.ejemplo">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputDireccion">Direccion</label>
              <input type="text" class="form-control" id="calle de ejemplo numero 3">
            </div>
            <div class="form-group col-md-6">
              <label for="inputTelefono">Telefono</label>
              <input type="text" class="form-control" id="916652654">
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="inputFecha">Fecha</label>
            <input type="date" class="form-control" id="fecha">
          </div>

          <div class="form-group col-md-6">
            <label for="inputJob">Elije la profesión</label>
            <select id="inputJob" class="form-control">
              <option selected>Veterinario</option>
              <option>Recepcionista</option>
            </select>
          </div>
          <br />
          <div class="form-group col-md-12">
            <h3>CONTRATO</h3>
          </div>
          <div class="form-group col-md-6">
            <label for="inputFInicio">Fecha Inicio</label>
            <input type="date" class="form-control" id="fecha">
          </div>
          <div class="form-group col-md-6">
            <label for="inputFFin">Fecha Fin</label>
            <input type="date" class="form-control" id="fecha">
          </div>
          <div class="form-group col-md-6">
            <label for="inputSueldo">Sueldo</label>
            <input type="number" class="form-control" id="1000">
          </div>

          <div class="form-group col-md-6">
            <label for="inputJob">Elije el horario</label>
            <select id="inputJob" class="form-control">
              <option selected>Vespertino</option>
              <option>Matutino</option>
            </select>
          </div>
       
            <input type="submit" class="btn btn-lg" value="Contratar">
         

        </form>
      </div>
    </div>
</div>

</body>

</html>