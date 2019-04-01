<?php
  session_start();

  if(!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])){
    header("Location: ../../index.php");
  } else {
    if($_SESSION['rol'] != 'Veterinario'){
      header("Location: ../".$_SESSION['rol']);
    }
  }
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>Vital-Pet / Añadir tipo de prueba</title>
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
      include "../../INCLUDE/menuVet.inc"
      ?>
      </div>

      <!-- CONTENIDO-->
      <div class="col-12 col-sm-7 col-md-7  col-lg-7 text-left">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-9  col-lg-9 text-left">

              <div class="panel panel-default">
              <div class="panel-heading">
                  <h2>AÑADIR TIPO PRUEBA</h2>
              </div>
                  <form class="formulario" action="../../CONTROLADOR/controladorVeterinario.php" method="POST">
                          <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                             <h3>Tipo de la prueba</h3>
                          </div>
                          <div class="form-group col-12 col-sm-12 col-md-6  col-lg-6">
                            <label for="inputCliente">Cliente</label>
                            <br/>
                            <!-- Aqui se envia por POST el cliente desde la tabla VISTACONSULTARPACIENTES-->
                            <input type="text" name="cliente" id="cliente_id">
                            </select>
                          </div>
                          <div class="form-group col-12 col-sm-12 col-md-6  col-lg-6">
                            <label for="inputPrueba">Escoja el tipo de prueba</label>
                            <select id="inputPrueba_id" class="form-control">
                            <?php
                                require_once '../../BBDD/model.php';
                                require_once '../../BBDD/config.php';
                                $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);
                                $resultado = $conexion->visualizarTiposPruebas();
                                foreach($visualizarTiposPruebas as $tipos){
                                    echo "<option value='id_tipo_prueba'>".$tipos['nombre_tipo_prueba']."</option>";
                                }
                            ?>
                            </select>
                          </div>

                          <div class="form-group col-12 col-sm-12 col-md-12  col-lg-12">
                          <label for="inputObservacion">Observaciones:</label>
                          <textarea class="form-control" rows="4" cols="100"></textarea>
                  </div>  
                    <input type="submit" class="btn btn-lg" value="Añadir">
                    <input type="hidden" name="dni" value="dni" id="dni_id">
                    <input type="hidden" name="id_mascota" value="id_mascota" id="id_mascota_id">
                </form>
              </div>
              </div>
            </div>
      </div>
</div>



</body>

</html>