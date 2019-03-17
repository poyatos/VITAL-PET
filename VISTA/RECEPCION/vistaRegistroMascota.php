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
      include "../../INCLUDE/menuRec.inc"
       ?>
      </div>


      <!-- CONTENIDO-->
      <div class="col-sm-8 text-left">
            <div class="col-sm-7 text-left">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>REGISTRO DE MASCOTA</h2>
                    </div>
                    <form class="formulario">
                        <div class="form-group col-md-12">
                            <h3>INFORMACIÓN</h3>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputNombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control" id="inputNombre" placeholder="Nombre">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputTip">Tipo</label>
                                <input type="text" name="tipo" class="form-control" id="inputTip" placeholder="perro">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputRaz">Raza</label>
                                <input type="text" name="raza" class="form-control" id="inputRaz" placeholder="labrador..">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputSex">Elije el sexo</label>
                                <select name="sexo" id="inputSex" class="form-control">
                                    <option value="macho" selected>Macho</option>
                                    <option value="hembra">Hembra</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputfecna">fecha nacimiento</label>
                                <input type="date" name="fecna" class="form-control" id="inputfecna">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPeso">peso</label>
                            <input type="text" name="peso" class="form-control" id="inputPeso"
                                placeholder="30kilos">
                        </div>
                        <div class="form-row">
                        <br />
                        <input type="submit" class="btn btn-lg" value="Dar de alta">
                    </form>
                </div>
            </div>
        </div>


</body>

</html>