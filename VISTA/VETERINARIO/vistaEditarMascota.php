<?php
  require_once '../../BBDD/model.php';
  require_once '../../BBDD/config.php';
  session_start();
  
  if(!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])){
    header("Location: ../../index.php");
  } else {
    if($_SESSION['rol'] != 'Veterinario'){
      header("Location: ../".$_SESSION['rol']);
    }
  }

  $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

  $mascota = $conexion->visualizarMascotaId($_POST['id_mascota']);

  $conexion->desconectar();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Vital-Pet / Editar mascota</title>
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

            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>EDITAR MASCOTA</h2>
                    </div>

                    <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                    <form class="formulario" action='../../CONTROLADOR/controladorVeterinario.php' method='POST'>
                            <h3>INFORMACIÓN</h3>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputNombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control" id="inputNombre" value = "<?= $mascota['nombre_mascota'] ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputTip">Tipo</label>
                                <input type="text" name="tipo" class="form-control" id="inputTip" value = "<?= $mascota['tipo_mascota'] ?>" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputRaz">Raza</label>
                                <input type="text" name="raza" class="form-control" id="inputRaz" value = "<?= $mascota['raza_mascota'] ?>"  required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputSex">Elige el sexo</label>
                                <select name="sexo" id="inputSex" class="form-control" required>
                                <?php
                                 if($mascota['sexo_mascota'] == "Macho"){
                                    echo " <option value='Macho' selected>Macho</option>
                                    <option value='Hembra'>Hembra</option>";
                                    }else{
                                        echo " <option value='Macho' >Macho</option>
                                        <option value='Hembra' selected >Hembra</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputfecna">Fecha de nacimiento</label>
                                <input type="date" name="fecna" class="form-control" id="inputfecna" value = "<?= date("d/m/Y", strtotime($mascota['fecna_mascota'])) ?>"  required>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPeso">peso</label>
                            <input type="number" name="peso" class="form-control" id="inputPeso" step="0.01" value = "<?= $mascota['peso_mascota'] ?>" required>
                        </div>
                        <div class="form-row">
                        <br />
                        <input type ="hidden" name="id_mascota" value = "<?= $mascota['id_mascota'] ?>">
                        <input type="submit" name ="editarMascota" class="btn btn-lg" value="Editar">
                    </form>
                </div>
                <button class="btn btn-info"><a class="h4" href="<?= $_SERVER['HTTP_REFERER'] ?>"><span class="glyphicon glyphicon-arrow-left"></span> Volver</a></button>
            </div>
            </div>
        </div>


</body>

</html>