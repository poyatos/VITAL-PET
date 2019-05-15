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
    <title>Vital-Pet / Realizar Pago</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
      include "../../INCLUDE/menuRec.inc"
       ?>
        </div>


      <!-- CONTENIDO-->
  
  <div class="col-12 col-sm-12 col-md-7 col-lg-7 ulele">
  <?php
  require_once '../../BBDD/model.php';
  require_once '../../BBDD/config.php';

  $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

  $resultado = $conexion->visualizarDatosFactura($_POST['id_cita']);
  $total = 0;

  echo "
  <br/>
  <h1>DATOS DEL PAGO</h1>
  <ul class='list-group'>
  <div class='row'>
  <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
  <li class='list-group-item list-group-item-action list-group-item-info'>Fecha de la cita: ".$resultado[0]['fecha_cita']."</li>
  </div>
  <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
  <li class='list-group-item list-group-item-action list-group-item-info'>Id: ".$resultado[0]['id_usuario']."</li>
  </div>
  <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
  <li class='list-group-item list-group-item-action list-group-item-info'>Nombre: ".$resultado[0]['nombre_usuario']."</li>
  </div>
  <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
  <li class='list-group-item list-group-item-action list-group-item-info'>Apellidos: ".$resultado[0]['apellidos_usuario']."</li>
  </div>
  <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
  <li class='list-group-item list-group-item-action list-group-item-info'>Dni: ".$resultado[0]['dni_usuario']."</li>
  </div>
  <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
  <li class='list-group-item list-group-item-action list-group-item-info'>Teléfono: ".$resultado[0]['telefono_usuario']."</li>
  </div>
  <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
  <li class='list-group-item list-group-item-action list-group-item-info'>Correo: ".$resultado[0]['correo_usuario']."</li>
  </div>
  <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
  <li class='list-group-item list-group-item-action list-group-item-info'>Dirección: ".$resultado[0]['direccion_usuario']."</li>
  </div>
  <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
  <li class='list-group-item list-group-item-action list-group-item-info'>Mascota: ".$resultado[0]['nombre_mascota']."</li>
  </div>
  <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
  <li class='list-group-item list-group-item-action list-group-item-info'>Tipo: ".$resultado[0]['tipo_mascota']."</li>
  </div>
  <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
  <li class='list-group-item list-group-item-action list-group-item-info'>Raza: ".$resultado[0]['raza_mascota']."</li></ul>
  ";
  ?>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Nombre prueba</th>
        <th>Precio de prueba</th>  
      </tr>
    </thead>
    <tbody id="myTable">
    <?php
            foreach($resultado as $pagos){
               echo ("<tr>
              <td>".$pagos['nombre_tipo_prueba']."</td>
              <td>".$pagos['precio_tipo_prueba']." €</td>
              </tr>");
              $total += $pagos['precio_tipo_prueba'];
            }
            $conexion->desconectar();
            ?>
    </tbody>
  </table>
  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
    <div class='row'>
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <p>TOTAL: <?= $total ?>€</p>
      </div>
      <form action="../../CONTROLADOR/controladorRecepcionista.php" method="POST">
        <input type="hidden" name="id_cliente" value="<?= $resultado[0]['id_usuario']?>">
        <input type="hidden" name="id_cita" value="<?= $_POST['id_cita']?>">
        <input type="hidden" name="fecha" value="<?= date('Y-m-d')?>">
        <input type="hidden" name="total" value="<?= $total ?>">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          <input class="btn btn-success h1" type="submit" value="PAGAR" name="finalizarCita">
        </div>
      </form>
    </div>
    <center>
    <button class="btn btn-info"><a class="h4" href="<?= $_SERVER['HTTP_REFERER'] ?>"><span class="glyphicon glyphicon-arrow-left"></span> Volver</a></button>
    </center>
  </div>

</div>

</div>

</div>

</div>
</body>

</html>