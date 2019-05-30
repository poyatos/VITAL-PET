<?php
  session_start();
  if(!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])){
    header("Location: ../../index.php");
  } else {
    if($_SESSION['rol'] != 'Recepcionista'){
      header("Location: ../".$_SESSION['rol']);
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vital-Pet / Registro mascota</title>
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
      <div class="col-12 col-sm-5 col-md-4  col-lg-4">
      <?php
      include "../../INCLUDE/menuRec.inc"
       ?>
      </div>
      <!-- CONTENIDO-->
      <div class="col-12 col-sm-7 col-md-7  col-lg-7 text-left">
      <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>REGISTRO DE MASCOTA</h2>
                        <p class='camposObligatorios'> (*) Campos obligatorios </p>
                    </div>

                    <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                    <form class="formulario" action='../../CONTROLADOR/controladorRecepcionista.php' method='POST'>
                            <h3>INFORMACIÓN</h3>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputNombre">Nombre (*)</label>
                                <input type="text" name="nombre" class="form-control" id="inputNombre" placeholder="Nombre" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputTip">Tipo (*)</label>
                                <input type="text" name="tipo" class="form-control" id="inputTip" placeholder="perro" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputRaz">Raza (*)</label>
                                <input type="text" name="raza" class="form-control" id="inputRaz" placeholder="labrador.." required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputSex">Elije el sexo (*)</label>
                                <select name="sexo" id="inputSex" class="form-control" required>          
                                    <option value="Macho" selected>Macho</option>
                                    <option value="Hembra">Hembra</option>     
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputfecna">Fecha nacimiento (*)</label>
                                <input type="date" name="fecna" class="form-control" id="inputfecna" required>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPeso">Peso (*)</label>
                            <input type="number" name="peso" class="form-control" id="inputPeso" placeholder="30kilos" required>
                        </div>
                        <div class="form-row">
                        <br />
                        <input type ="hidden" name="id_cliente" value = "<?= $_POST['id_cliente'] ?>">
                        <input type="submit" name ="anadirMascota" class="btn btn-lg" value="Dar de alta">
                    </form>
                </div>         
            </div>
            <button class="btn btn-info"><a class="h4" href="<?= $_SERVER['HTTP_REFERER'] ?>"><span class="glyphicon glyphicon-arrow-left"></span> Volver</a></button>
            </div>
        </div>
</body>
</html>