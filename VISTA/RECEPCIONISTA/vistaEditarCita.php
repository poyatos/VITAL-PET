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
  $citas = $conexion->visualizarCitasMascota($_POST['id_mascota']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vital-Pet / Añadir Cita</title>
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
        <div class="col-12 col-sm-5  col-md-4  col-lg-4"> 
            <?php
      include "../../INCLUDE/menuRec.inc"
       ?>
        </div>


        <!-- CONTENIDO-->
        <div class="logotipo col-12 col-sm-7 col-md-7 col-lg-7 text-left">
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>EDITAR CITA</h2>
                    </div>
                    <form class="formulario" action='../../CONTROLADOR/controladorRecepcionista.php' method='POST'>
                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                            <h3>INFORMACIÓN</h3>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="inputFecha">Fecha</label>
                                <input type="date" name="fecha" class="form-control" id="inputFecha"  value="<?= $citas['fecha_cita'] ?>" required>
                            </div>
                            
                            <!--POR HACER, SELECCIONAR SEGÚN LA FECHA: LAS HORAS DISPONIBLES, SALAS DISPONIBLES

                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                            <label for="inputHora">Hora</label>
                                <select id="inputHora_id" class="form-control" required> 
                                <?php
                                 if($citas['hora_cita'] == "08:00"){
                                    echo" <option value='08:00' selected>08:00</option>
                                     <option value='09:00' >09:00</option>
                                     <option value='10:00' >10:00</option>
                                     <option value='11:00' >11:00</option>
                                     <option value='12:00' >12:00</option>
                                     <option value='13:00' >13:00</option>
                                     <option value='14:00' >14:00</option>
                                     <option value='15:00' >15:00</option>
                                     <option value='16:00' >16:00</option>
                                     <option value='17:00' >17:00</option>
                                     <option value='18:00' >18:00</option>
                                     <option value='19:00' >19:00</option>
                                     <option value='20:00' >20:00</option>";
                                 }else if($citas['hora_cita'] == "09:00"){
                                    echo" <option value='08:00'>08:00</option>
                                     <option value='09:00' selected >09:00</option>
                                     <option value='10:00' >10:00</option>
                                     <option value='11:00' >11:00</option>
                                     <option value='12:00' >12:00</option>
                                     <option value='13:00' >13:00</option>
                                     <option value='14:00' >14:00</option>
                                     <option value='15:00' >15:00</option>
                                     <option value='16:00' >16:00</option>
                                     <option value='17:00' >17:00</option>
                                     <option value='18:00' >18:00</option>
                                     <option value='19:00' >19:00</option>
                                     <option value='20:00' >20:00</option>";
                                 }else if($citas['hora_cita'] == "10:00"){
                                    echo" <option value='08:00'>08:00</option>
                                     <option value='09:00'>09:00</option>
                                     <option value='10:00'selected>10:00</option>
                                     <option value='11:00' >11:00</option>
                                     <option value='12:00' >12:00</option>
                                     <option value='13:00' >13:00</option>
                                     <option value='14:00' >14:00</option>
                                     <option value='15:00' >15:00</option>
                                     <option value='16:00' >16:00</option>
                                     <option value='17:00' >17:00</option>
                                     <option value='18:00' >18:00</option>
                                     <option value='19:00' >19:00</option>
                                     <option value='20:00' >20:00</option>";
                                 }else if($citas['hora_cita'] == "11:00"){
                                    echo" <option value='08:00'>08:00</option>
                                     <option value='09:00'>09:00</option>
                                     <option value='10:00'>10:00</option>
                                     <option value='11:00'selected>11:00</option>
                                     <option value='12:00' >12:00</option>
                                     <option value='13:00' >13:00</option>
                                     <option value='14:00' >14:00</option>
                                     <option value='15:00' >15:00</option>
                                     <option value='16:00' >16:00</option>
                                     <option value='17:00' >17:00</option>
                                     <option value='18:00' >18:00</option>
                                     <option value='19:00' >19:00</option>
                                     <option value='20:00' >20:00</option>";
                                 }else if($citas['hora_cita'] == "12:00"){
                                    echo" <option value='08:00'>08:00</option>
                                     <option value='09:00'>09:00</option>
                                     <option value='10:00'>10:00</option>
                                     <option value='11:00'>11:00</option>
                                     <option value='12:00'selected>12:00</option>
                                     <option value='13:00' >13:00</option>
                                     <option value='14:00' >14:00</option>
                                     <option value='15:00' >15:00</option>
                                     <option value='16:00' >16:00</option>
                                     <option value='17:00' >17:00</option>
                                     <option value='18:00' >18:00</option>
                                     <option value='19:00' >19:00</option>
                                     <option value='20:00' >20:00</option>";
                                 }else if($citas['hora_cita'] == "13:00"){
                                    echo" <option value='08:00'>08:00</option>
                                     <option value='09:00'>09:00</option>
                                     <option value='10:00'>10:00</option>
                                     <option value='11:00'>11:00</option>
                                     <option value='12:00'>12:00</option>
                                     <option value='13:00'selected >13:00</option>
                                     <option value='14:00' >14:00</option>
                                     <option value='15:00' >15:00</option>
                                     <option value='16:00' >16:00</option>
                                     <option value='17:00' >17:00</option>
                                     <option value='18:00' >18:00</option>
                                     <option value='19:00' >19:00</option>
                                     <option value='20:00' >20:00</option>";
                                 } else if($citas['hora_cita'] == "14:00"){
                                    echo" <option value='08:00'>08:00</option>
                                     <option value='09:00'>09:00</option>
                                     <option value='10:00'>10:00</option>
                                     <option value='11:00'>11:00</option>
                                     <option value='12:00'>12:00</option>
                                     <option value='13:00' >13:00</option>
                                     <option value='14:00'selected >14:00</option>
                                     <option value='15:00' >15:00</option>
                                     <option value='16:00' >16:00</option>
                                     <option value='17:00' >17:00</option>
                                     <option value='18:00' >18:00</option>
                                     <option value='19:00' >19:00</option>
                                     <option value='20:00' >20:00</option>";
                                 }else if($citas['hora_cita'] == "15:00"){
                                    echo" <option value='08:00'>08:00</option>
                                     <option value='09:00'>09:00</option>
                                     <option value='10:00'>10:00</option>
                                     <option value='11:00'>11:00</option>
                                     <option value='12:00'>12:00</option>
                                     <option value='13:00' >13:00</option>
                                     <option value='14:00' >14:00</option>
                                     <option value='15:00' selected >15:00</option>
                                     <option value='16:00' >16:00</option>
                                     <option value='17:00' >17:00</option>
                                     <option value='18:00' >18:00</option>
                                     <option value='19:00' >19:00</option>
                                     <option value='20:00' >20:00</option>";
                                 }else if($citas['hora_cita'] == "16:00"){
                                    echo" <option value='08:00'>08:00</option>
                                     <option value='09:00'>09:00</option>
                                     <option value='10:00'>10:00</option>
                                     <option value='11:00'>11:00</option>
                                     <option value='12:00'>12:00</option>
                                     <option value='13:00' >13:00</option>
                                     <option value='14:00' >14:00</option>
                                     <option value='15:00' >15:00</option>
                                     <option value='16:00' selected>16:00</option>
                                     <option value='17:00' >17:00</option>
                                     <option value='18:00' >18:00</option>
                                     <option value='19:00' >19:00</option>
                                     <option value='20:00' >20:00</option>";
                                 }else if($citas['hora_cita'] == "17:00"){
                                    echo" <option value='08:00'>08:00</option>
                                     <option value='09:00'>09:00</option>
                                     <option value='10:00'>10:00</option>
                                     <option value='11:00'>11:00</option>
                                     <option value='12:00'>12:00</option>
                                     <option value='13:00' >13:00</option>
                                     <option value='14:00' >14:00</option>
                                     <option value='15:00' >15:00</option>
                                     <option value='16:00' >16:00</option>
                                     <option value='17:00' selected>17:00</option>
                                     <option value='18:00' >18:00</option>
                                     <option value='19:00' >19:00</option>
                                     <option value='20:00' >20:00</option>";
                                 }else if($citas['hora_cita'] == "18:00"){
                                    echo" <option value='08:00'>08:00</option>
                                     <option value='09:00'>09:00</option>
                                     <option value='10:00'>10:00</option>
                                     <option value='11:00'>11:00</option>
                                     <option value='12:00'>12:00</option>
                                     <option value='13:00' >13:00</option>
                                     <option value='14:00' >14:00</option>
                                     <option value='15:00' >15:00</option>
                                     <option value='16:00' >16:00</option>
                                     <option value='17:00' >17:00</option>
                                     <option value='18:00'selected >18:00</option>
                                     <option value='19:00' >19:00</option>
                                     <option value='20:00' >20:00</option>";
                                 }else if($citas['hora_cita'] == "19:00"){
                                    echo" <option value='08:00'>08:00</option>
                                     <option value='09:00'>09:00</option>
                                     <option value='10:00'>10:00</option>
                                     <option value='11:00'>11:00</option>
                                     <option value='12:00'>12:00</option>
                                     <option value='13:00' >13:00</option>
                                     <option value='14:00' >14:00</option>
                                     <option value='15:00' >15:00</option>
                                     <option value='16:00' >16:00</option>
                                     <option value='17:00' >17:00</option>
                                     <option value='18:00' >18:00</option>
                                     <option value='19:00'selected >19:00</option>
                                     <option value='20:00' >20:00</option>";
                                 } else{
                                    echo" <option value='08:00'>08:00</option>
                                    <option value='09:00'>09:00</option>
                                    <option value='10:00'>10:00</option>
                                    <option value='11:00'>11:00</option>
                                    <option value='12:00'>12:00</option>
                                    <option value='13:00' >13:00</option>
                                    <option value='14:00' >14:00</option>
                                    <option value='15:00' >15:00</option>
                                    <option value='16:00' >16:00</option>
                                    <option value='17:00' >17:00</option>
                                    <option value='18:00' >18:00</option>
                                    <option value='19:00'>19:00</option>
                                    <option value='20:00'selected  >20:00</option>";
                                 }
                                ?>
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="inputPrueba">Sala</label>
                            <select id="inputSala_id" class="form-control" required>
                                <?php
                                 if($citas['num_consulta'] == "1"){
                                    echo " <option value='1' selected>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                    <option value='5'>5</option>";
                                 }else if($citas['num_consulta'] == "2"){
                                    echo " <option value='1' selected>1</option>
                                    <option value='2' selected>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                    <option value='5'>5</option>";
                                 }else if($citas['num_consulta'] == "3"){
                                    echo " <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3' selected>3</option>
                                    <option value='4'>4</option>
                                    <option value='5'>5</option>";

                                 }else if($citas['num_consulta'] == "4"){
                                    echo " <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4' selected>4</option>
                                    <option value='5'>5</option>";
                                 }else{
                                    echo " <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                    <option value='5' selected>5</option>";
                                 }
                                ?>

                                </select>
                            </div>-->
                        <div class="form-row">   
                        <br/>
                        <!--EN LOS INPUT HIDDEN DEBEN RELLENARSE LOS VALUES CON LOS VALORES DEL CLIENTE Y LA MASCOTA -->
                        <input type="hidden" name="id_mascota" value="<?= $citas['id_mascota'] ?>" id="id_mascota_id">
                        <input type="hidden" name="id_cita" value="<?= $citas['id_cita'] ?>" id="id_cita_id">
                        <input type="submit"  class="btn btn-lg" name="editarCita" value="Editar cita">
                    </form>
                </div>
            </div>
        </div>


  




</body>

</html>