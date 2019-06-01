<?php
    session_start();

    if(!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])){
        header("Location: ../../index.php");
    } else {
      if($_SESSION['rol'] != 'Cliente'){
        header("Location: ../".$_SESSION['rol']);
      }
    }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
      <!-- Theme Made By www.w3schools.com - No Copyright -->
      <title>index cliente</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="../../CSS/estiloClienteIndex.css">
      <link rel="stylesheet" type="text/css" href="../../CSS/estiloVistaCliente.css">
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
    <?php
      include "../../INCLUDE/menuCli.inc";
      echo"<button type='button' class='btn btn-primary btn-block botondesktop'><a href='../CLIENTE/index.php'><h1>INICIO</h1></a></button>";
    ?>
<div class="row papaMascota">
    <?php
        require_once '../../BBDD/model.php';
        require_once '../../BBDD/config.php';
          
        $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);
        $cliente = $conexion->visualizarMascotasClientes($_SESSION["id_usuario"]);

        
    ?>
        <div class='col-12 col-xs-12 col-md-4 clienteMascota'>
          <ul class='list-group'>
            <div class='row margen'>
                <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
                        <li class='list-group-item list-group-item-action list-group-item-info'>Nombre: <?= $cliente[0]['nombre_usuario']?></li>
                </div>
                <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
                      <li class='list-group-item list-group-item-action list-group-item-info'>Apellidos: <?= $cliente[0]['apellidos_usuario']?></li>
                </div>
                <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
                        <li class='list-group-item list-group-item-action list-group-item-info'>Fecha de nacimiento: <?= date("d/m/Y", strtotime($cliente[0]['fecna_usuario']))?></li>
                </div>
                <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
                      <li class='list-group-item list-group-item-action list-group-item-info'>NIE / NIF: <?= $cliente[0]['dni_usuario']?></li>
                </div> 
                <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
                      <li class='list-group-item list-group-item-action list-group-item-info'>Correo electrónico: <?= $cliente[0]['correo_usuario']?></li>
                </div>
                <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
                      <li class='list-group-item list-group-item-action list-group-item-info'>Teléfono: <?= $cliente[0]['telefono_usuario']?></li>
                </div>
                <div class='col-12 col-sm-12 col-md-12  col-lg-12'>
                      <li class='list-group-item list-group-item-action list-group-item-info'>Dirección: <?= $cliente[0]['direccion_usuario']?></li>
                </div>
              </div>
            </ul>
          </div>
          <div class='col-12 col-xs-12 col-md-4 clienteMascotas'>
            <center>
              <div class="row">
                <div class='col-md-12 imgMascota'>
                    <img src="../../IMAGENES/vistac2.jpg" style="width:70%; height:auto;">
                </div>
                <div class='col-md-12 imgMascota'>
                     <img src="../../IMAGENES/vistac11.jpg" style="width:70%; height:auto;">
                </div>
              </div>
            </center>
          </div>
          <?php
             echo"<div class='col-12 col-xs-12 col-md-4 clienteMascota'>
             <table class = 'table table-bordered table-dark'>
               <thead>
                 <tr class='warning'>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Raza</th>
                    <th>Sexo</th>
                    <th>Fecha de nacimiento</th>
                    <th>Peso</th>
                  </tr>";
                       foreach($cliente as $mascotas){
                          echo "
                          <tr class='info'>
                            <td>".$mascotas["nombre_mascota"]."</td>
                            <td>".$mascotas["tipo_mascota"]."</td>
                            <td>".$mascotas["raza_mascota"]."</td>
                            <td>".$mascotas["sexo_mascota"]."</td>
                            <td>".date("d/m/Y", strtotime($mascotas["fecna_mascota"]))."</td>
                            <td>".$mascotas["peso_mascota"]."</td>
                          </tr>";}
            ?> 
                 </table>    
              </div>
            </div>
        </div>
        <button type='button' class='btn btn-primary btn-block botonmobile'><a href='../CLIENTE/index.php'><h1>INICIO</h1></a></button>
           <?php
              $conexion->desconectar();
            ?>
    </div>
  </body>
</html>