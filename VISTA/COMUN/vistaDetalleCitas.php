<?php
    session_start();
    if (!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])) {
        header("Location: ../index.php");
    } else {
        if ($_SESSION['rol'] == 'Cliente') {
            header("Location: ../CLIENTE");
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Vital-Pet / Detalle Cliente</title>
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
  <link rel="stylesheet" type="text/css" href="../../CSS/vistaDetalle.css">
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
        require_once '../../BBDD/model.php';
        require_once '../../BBDD/config.php';
        $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);
        $resultado = $conexion->visualizarCitasPruebas($_GET["id"]);

        $existePruebas = false;
        if ($resultado) {
            $existePruebas = true;
            $cita = $resultado[0];
        } else {
            $resultado = $conexion->visualizarCitaId($_GET["id"]);
            $cita = $resultado;
        }
    ?>

 <div class='col-12 col-sm-12 col-md-7 col-lg-7'>
    <ul class='list-group'>
      <div class='row'>
                    <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
                      <h1>DATOS DE LA CITA</h1> 
                    </div>
                    <div class='col-12 col-sm-12 col-md-6  col-lg-6'>
                        <li class='list-group-item list-group-item-action list-group-item-info'><p class="d-flex flex-start">Fecha:</p><?= $cita['fecha_cita']?></li>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6  col-lg-6'>
                        <li class='list-group-item list-group-item-action list-group-item-info'><p class="d-flex flex-start">Hora:</p><?= $cita['hora_cita']?></li>
                    </div>
                    <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
                        <li class='list-group-item list-group-item-action list-group-item-info'><p class="d-flex flex-start">Consulta número:</p><?= $cita['num_consulta']?></li>
                    </div>
                    </ul>
                    <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
                    <?php
                    if ($existePruebas) {
                        echo"
                    <h1>PRUEBAS DE LA CITA</h1>
                    <table class = 'table table-bordered table-dark'>
                    <thead>
                      <tr class='warning'>
                        <th>Nombre</th>
                        <th>Resultado</th>
                        <th>Observaciones</th>
                        <th>Precio</th>
                      </tr>";
                        foreach ($resultado as $resul) {
                            echo "<tr class='info'>
                      <td>".$resul["nombre_tipo_prueba"]."</td>
                      <td>".$resul["resultado_prueba"]."</td>
                      <td>".$resul["observaciones_prueba"]."</td>
                      <td>".$resul["precio_tipo_prueba"]." €</td>
                      </tr>
                      </table>";
                        }
                    }
                    ?> 
                                     
                </div>
                <button class="btn btn-info"><a class="h4" href="<?= $_SERVER['HTTP_REFERER'] ?>"><span class="glyphicon glyphicon-arrow-left"></span> Volver</a></button>
            </div>
        
        </div>
        
        <?php
        $conexion->desconectar();
        ?>
</body>
</html>