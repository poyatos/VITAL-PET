<?php
    session_start();
    
    if (!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])) {
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
  
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<?php
include "../../INCLUDE/menuCli.inc";
?>



<!-- Container (TOUR Section) -->
<div id="tour" class="bg-1">
  <div class="container">
    <div class ="row">

      <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">PERFIL DEL CLIENTE</div>
        <div class="panel-body"><a href="../CLIENTE/vistaPerfilDelCliente.php"><img src="../../IMAGENES/expediente.png" class="img-responsive" style="width:100%" alt="Image"></a></div>
      </div>
      </div>
      <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">CONSULTAR CITAS</div>
        <div class="panel-body"><a href="../COMUN/vistaGestionCitas.php"><img src="../../IMAGENES/consultas.png" class="img-responsive" style="width:100%" alt="Image"></a></div>
    </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">CONSULTAR PRUEBAS</div>
        <div class="panel-body"><a href="../COMUN/vistaGestionPrueba.php"><img src="../../IMAGENES/pruebas.png" class="img-responsive" style="width:100%" alt="Image"></a></div>
      </div>
      </div>

    </div>
  </div>
  </div>

    <div class="container text-center">    
  <h3>Nuestros patrocinadores</h3>
  <br>
  <div class="row">
    <div class="col-sm-3">
    <a href ="https://poyatosilustracion.wordpress.com"><img src="../../IMAGENES/logo1.1.png" class="img-responsive" style="width:100%" alt="Image">
      Pablofpoyatos</a>
    </div>
    <div class="col-sm-3"> 
    <a href ="https://bluedeersmadrid.bandcamp.com/releases"><img src="../../IMAGENES/logo2.png" class="img-responsive" style="width:100%" alt="Image">
      Blue Deers</a>   
    </div>
    <div class="col-sm-3"> 
    <a href ="https://taniamartin92.wordpress.com"><img src="../../IMAGENES/logo3.png" class="img-responsive" style="width:100%" alt="Image">
      Tania Martín</a>   
    </div>
    <div class="col-sm-3"> 
    <a href ="https://www.instagram.com/viniloko1/"><img src="../../IMAGENES/logo4.png" class="img-responsive" style="width:100%" alt="Image">
      Viniloko</a>   
    </div> 
  </div>
</div><br>   


<!-- contenido -->
<div class=" alert alert-danger container-fluid bg-2 text-center">
  <h1>Teléfono de emergencia</h1>
  <img src="../../IMAGENES/urgencias.png">
  <h1>918822645</h1>
</div>


<!-- Footer -->
<footer class="page-footer futer">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="#"> Vitalpet </a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->

</body>
</html>