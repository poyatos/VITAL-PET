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
                        <h2>AÑADIR CITA</h2>
                    </div>
                    <form class="formulario" action='../../CONTROLADOR/controladorRecepcionista.php' method='post'>
                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                            <h3>INFORMACIÓN</h3>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="inputFecha">Fecha</label>
                                <input type="date" name="fecha" class="form-control" id="inputFecha">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                            <label for="inputHora">Hora</label>
                                <select id="inputHora_id" class="form-control">
                                     <option selected>08:00</option>
                                     <option selected>09:00</option>
                                     <option selected>10:00</option>
                                     <option selected>11:00</option>
                                     <option selected>12:00</option>
                                     <option selected>13:00</option>
                                     <option selected>14:00</option>
                                     <option selected>15:00</option>
                                     <option selected>16:00</option>
                                     <option selected>17:00</option>
                                     <option selected>18:00</option>
                                     <option selected>19:00</option>
                                     <option selected>20:00</option>
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="inputPrueba">Sala</label>
                            <select id="inputSala_id" class="form-control">
                                     <option selected>1</option>
                                     <option selected>2</option>
                                     <option selected>3</option>
                                     <option selected>4</option>
                                     <option selected>5</option>
                                </select>
                            </div>
                        <div class="form-row">   
                        <br/>
                        <input type="hidden" name="dni" value="dni" id="dni_id">
                        <input type="hidden" name="id_mascota" value="id_mascota" id="id_mascota_id">
                        <input type="submit"  class="btn btn-lg" value="Añadir cita">
                    </form>
                </div>
            </div>
        </div>


  




</body>

</html>