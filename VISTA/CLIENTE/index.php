<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vital-Pet / Cliente</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../CSS/estiloClienteIndex.css">
</head>
<body>



<!-- MENU PRINCIPAL -->
    <?php
      include "../../INCLUDE/menuPrincipal.inc"
      ?>



<!-- contenido -->
<div class="container">    
  <div class="row">
  <div class="col-sm-4">
      <div class="panel panel-danger">
        <div class="panel-heading">EXPEDIENTE VETERINARIO</div>
        <div class="panel-body"><a href="#"><img src="../../IMAGENES/expediente.png" class="img-responsive" style="width:100%" alt="Image"></a></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-danger">
        <div class="panel-heading">CONSULTAR CITAS</div>
        <div class="panel-body"><a href="../COMUN/vistaGestionCitas.php"><img src="../../IMAGENES/consultas.png" class="img-responsive" style="width:100%" alt="Image"></a></div>
        
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-danger">
        <div class="panel-heading">CONSULTAR PRUEBAS</div>
        <div class="panel-body"><a href="../COMUN/vistaGestionPrueba.php"><img src="../../IMAGENES/pruebas.png" class="img-responsive" style="width:100%" alt="Image"></a></div>
       
      </div>
    </div>
  </div>
</div><br>

<div class="container-fluid bg-2 text-center">
  <h1>Teléfono de emergencia</h1>
  <img src="../../IMAGENES/urgencias.png">
  <p>918822645</p>
</div>

<!-- Footer -->
<footer class="page-footer font-small futer">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="#"> Vitalpet </a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->


</body>
</html>