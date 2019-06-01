<?php
    session_start();
    if(isset($_SESSION['rol'])){
        $rol = $_SESSION['rol'];
    } else {
        $rol = '';
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <?php
        if($rol == 'Cliente'){
            echo '<link rel="stylesheet" type="text/css" href="../../CSS/estiloClienteIndex.css">';
        }else{
            echo' <link rel="stylesheet" type="text/css" href="../../CSS/estilo.css">';
        }
      ?>
  </head>
  <body>
        <!-- MENU PRINCIPAL -->
        <div class="row">
            <div class="col-12">
                <?php
                if (isset($_SESSION['rol'])) {
                    if ($rol == 'Cliente') {
                        include "../../INCLUDE/menuCli.inc";
                        echo"<button type='button' class='btn btn-primary btn-block'><a href='../CLIENTE/index.php'><h1>INICIO</h1></a></button>";
                    } else {
                        include "../../INCLUDE/menuPrincipal.inc";
                    }
                }
                ?>
            </div>
        <!-- MENU LATERAL -->
        <?php
                if ($rol != '') {
                    if ($rol != 'Cliente') {
                        echo "<div class='col-12 col-sm-5 col-md-4  col-lg-4'>";
                    }
                    if ($rol == 'Director') {
                        include "../../INCLUDE/menuDir.inc";
                    } elseif ($rol == 'Recepcionista') {
                        include "../../INCLUDE/menuRec.inc";
                    } elseif ($rol == 'Veterinario') {
                        include "../../INCLUDE/menuVet.inc";
                    }
                }
        ?>
        </div>
            <?php
                if ($rol != 'Cliente') {
                    echo "<div class='logotipo col-12'>";
                } else {
                    echo "<div class='logotipo col-12'>";
                }
            ?>
        <div class="form-group row">
            <div class="col-12">  
                <?php 
                    if($_SESSION['exito']){
                        echo '<h1><span class="glyphicon glyphicon-ok text-success"></span></h1>';
                        echo '<h2>Operación realizada correctamente.</h2>';
                    } else {
                        echo '<h1><span class="glyphicon glyphicon-alert text-danger"></span></h1>';
                        echo ($_SESSION['mensaje']);
                    }
                    /*if(isset($_SESSION['parametros'])){
                        echo "<form class='formulario' action='".$_SESSION['url']."' method='POST'>";
                        foreach($_SESSION['parametros'] as $nombre => $valor){
                            echo "<input type='hidden' name='$nombre' value='$valor'>";
                        }
                        echo '<input type="submit" name="btnVolver" value="Volver" class="btn btn-primary">
                        </form>';
                    } else {
                        echo "<a href=".$_SESSION['url']." class='btn btn-primary'>Volver</a>";
                    }*/

                    echo "<a href=".$_SESSION['url']." class='btn btn-primary'>Volver</a>";

                    unset($_SESSION['exito']);
                    unset($_SESSION['mensaje']);
                    /*unset($_SESSION['parametros']);*/
                    unset($_SESSION['url']);
                ?>    
            </div>
        </div>
    </div>
 </body>
</html>