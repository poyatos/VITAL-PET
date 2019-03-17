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
      include "../../INCLUDE/menuVet.inc"
      ?>
      </div>


      <!-- CONTENIDO-->
      <div class="col-sm-7 text-left">
      <div class="col-sm-9 text-left">

<div class="panel panel-default">
  <div class="panel-heading">
    <h2>EDITAR PRUEBA / AÑADIR RESULTADO </h2>
  </div>
  <form class="formulario">
    <div class="form-group col-md-6">
      <label for="inputCliente">PRUEBA:</label>
      <br/>
      <!-- Aqui se añade el tipo de prueba recogido previamente en añadirprueba.php-->
      <input type="text" name="cliente" id="cliente_id">
      </select>
    </div>
      <!-- Aqui se elige el resultado de la prueba-->
    <div class="form-group col-md-6">
      <label for="inputPrueba">Resultado</label>
      <select id="inputPrueba_id" class="form-control">
        <option selected>Positivo</option>
        <option selected>Positivo Leve</option>
        <option selected>Negativo Medio</option>
        <option>Negativo</option>
      </select>
    </div> 
    <div class="form-group col-md-12">
            <label for="inputObservacion">Observaciones:</label>
            <textarea rows="4" cols="100"></textarea>
    </div>  
   
      <input type="submit" class="btn btn-lg" value="Editar">
  </form>
</div>
</div>
</div>


      </div>
</div>



</body>

</html>