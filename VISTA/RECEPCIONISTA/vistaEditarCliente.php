<?php
  require_once '../../BBDD/model.php';
  require_once '../../BBDD/config.php';
  session_start();

  if(!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])){
    header("Location: ../../index.php");
  } else {
    if($_SESSION['rol'] != 'Recepcionista'){
      header("Location: ../".$_SESSION['rol']);
    }
  }

  
  $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

  $cliente = $conexion->visualizarUsuarioId($_POST['id_cliente']);

  $conexion->desconectar();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vital-Pet / Registro Cliente</title>
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
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-left">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>REGISTRO DE CLIENTE</h2>
                    </div>

                    
                    <form class="formulario" action='../../CONTROLADOR/controladorRecepcionista.php' method='post'>
                        
                        <div class="form-group col-12 col-sm-12 col-md-12  col-lg-12">
                            <h3>INFORMACIÓN</h3>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="inputNombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control" id="inputNombre" value ="<?= $cliente['nombre_usuario']?>" required>
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6  col-lg-6">
                                <label for="inputApellidos">Apellidos</label>
                                <input type="text" name="apellidos" class="form-control" id="inputApellidos" value ="<?= $cliente['apellidos_usuario']?>" required>
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="inputDni">DNI</label>
                                <input type="text" name="dni" class="form-control" id="inputDni" value ="<?= $cliente['dni_usuario']?>" required>
                            </div>
                        </div>
                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                            <label for="inputCorreo">Correo</label>
                            <input type="text" name="correo" class="form-control" id="inputCorreo" value ="<?= $cliente['correo_usuario']?>" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="inputDireccion">Direccion</label>
                                <input type="text" name="direccion" class="form-control" id="calle" value ="<?= $cliente['direccion_usuario']?>" required>
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="inputTelefono">Telefono</label>
                                <input type="text" name="telefono" class="form-control" id="telefono" value ="<?= $cliente['telefono_usuario']?>" required>
                            </div>
                        </div>
                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="inputFecha">Fecha de nacimiento</label>
                            <input type="date" name="fecna" class="form-control" id="fecha" value ="<?= $cliente['fecna_usuario'] ?>" required>
                        </div>
                        <br />
                        <input type='hidden' name='id_cliente' value="<?= $cliente['id_usuario']?>"/>
                        <input type="submit"  class="btn btn-lg" name="editarCliente" value="Editar">
                    </form>
                </div>
                <button class="btn btn-info"><a class="h4" href="<?= $_SERVER['HTTP_REFERER'] ?>"><span class="glyphicon glyphicon-arrow-left"></span> Volver</a></button>
            </div>
            </div>
        </div>


  




</body>

</html>