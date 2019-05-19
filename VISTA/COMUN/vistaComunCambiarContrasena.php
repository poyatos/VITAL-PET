<?php
    session_start();
    if (!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])) {
        header("Location: ../index.php");
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
      <link rel="stylesheet" type="text/css" href="../../CSS/estilo.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <?php
          if ($_SESSION['rol'] == 'Cliente') {
              echo"<link rel='stylesheet' type='text/css' href='../../CSS/estiloClienteIndex.css'>";
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

          <?php
          if ($_SESSION['rol'] != 'Cliente') {
              echo "<div class='logotipo col-12 col-sm-7 col-md-7 col-lg-7'>";
          } else {
              echo "<div class='logotipo col-12 col-sm-12 col-md-12 col-lg-12'>";
          }
      ?>
      <div class="form-group row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            
            <h1>¿Deseas cambiar la contraseña?</h1>
            <form class="formulario" action="controladorComun.php" method="POST">
                      <label name="contrasena" id="id_contrasena">Nueva Contraseña:
                      <input class="form-control" name="contrasena" id="id_contrasena" type="password">
                      </label><br/>
                      <label name="contrasena2" id="id_contrasena2">Repite la contraseña:
                      <input class="form-control" name="contrasena2" id="id_contrasena2" type="password">
                      </label><br/>
                <input type="submit" name="btnContrasena" >
            </form>
        </div>
    </div>
</div>
        </body>
        </html>
               