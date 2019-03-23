<?php
    
    session_start ();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>INDEX</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="CSS/estiloIndex.css">


</head>
<body>


<!-- MENÚ PRINCIPAL -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img class="logotipo" src="IMAGENES/logotb.png" width="250px" height="auto" > </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">

 <!-- BOTON INICIO DE SESIÓN -->
  <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-log-in"></i> Iniciar sesión</button>

  <!--MODAL -->
  <div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <!--FORMULARIO INICIO DE SESIÓN-->
          <div class="cinicio">
          <h4 class="modal-title">Inicia Sesión</h4>
          <br/>
        <form  action="CONTROLADOR/login.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="email">Dni:</label>
            <input type="text" class="form-control" id="dni" placeholder="Dni" name="dni">
          </div>
        <div class="form-group">
          <label for="pwd">Contraseña:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Contraseña" name="pwd">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Recuerdame</label>
        </div>
          <button type="submit" class="btn btn-default">Iniciar Sesión</button>
      </form>
      </div>
    </div>
  </div>
    </ul>
</div>
    </div>
  </div>
</nav>

<!-- CARROUSEL -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">   
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>    
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="IMAGENES/baner.png" alt="Image">
        <div class="carousel-caption">
        </div>      
      </div>
      <div class="item">
        <img src="IMAGENES/baner1.png" alt="Image">
        <div class="carousel-caption">
        </div>      
      </div>
    </div>
    
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

 <!-- CONTENIDO --> 
<div class="container-fluid ">
  <div class="row">
    <div class="col-8 col-sm-8 col-md-8  col-lg-8">
      <h2>SOBRE NOSOTROS</h2>
      <h4>VITAL PET</h4>      
      <p>TU VETERINARIO DE CONFIANZA</p>
      <p>VITAL PET es una empresa nacida en 1930 en la lucha opresora por liberar a los animales de sus jaulas
        corporeas y precupandose por el medioambiente, inaugurado por viniloko en 1950 de manera oficial
        esta empresa lleva en auge mas de 50 años dandolo todo en las pistas de baile, el resto del texto es inventado
        como prueba para ver que tal queda maquetado es una empresa nacida en 1930 en la lucha opresora por liberar a los animales de sus jaulas
        corporeas y precupandose por el medioambiente, inaugurado por viniloko en 1950 de manera oficial
        esta empresa lleva en auge mas de 50 años dandolo todo en las pistas de baile, el resto del texto es inventado
        como prueba para ver que tal queda maquetado es una empresa nacida en 1930 en la lucha opresora por liberar a los animales de sus jaulas
        corporeas y precupandose por el medioambiente, inaugurado por viniloko en 1950 de manera oficial
        esta empresa lleva en auge mas de 50 años dandolo todo en las pistas de baile, el resto del texto es inventado
        como prueba para ver que tal queda maquetado
      </p>
    </div>
    <div class="col-sm-4">
    <img class="logotipo" src="IMAGENES/sobre.png" width="80%" height="auto" >
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-4 col-sm-4 col-md-4  col-lg-4">
    <img class="logotipo" src="IMAGENES/valors.png" width="90%" height="auto" >
    </div>
    <div class="col-8 col-sm-8 col-md-8  col-lg-8">
      <h2>NUESTROS VALORES</h2>
      <h4><strong>MISIÓN DE LA EMPRESA</strong> Una mascota no es solo un animal es un compañero y amigo que te acompaña durante tu vida, por eso desde PET VITAL ofrecemos el servicio numero 1 para que tu mascota viva sana y en las mejores condiciones posibles</h4>      
    </div>
  </div>
</div>

<!-- SERVICIOS -->
<div class="container-fluid text-center ">
  <h2>SERVICIOS</h2>
  <h4>QUE PODEMOS OFRECERTE</h4>
  <br>
  <div class="row">
    <div class="col-4 col-sm-4 col-md-4  col-lg-4">
      <span class="glyphicon glyphicon-eye-open logo-small"></span>
      <h4>REVISIONES</h4>
      <p>Revisiones periodicas para revisar el estado de tu mascota</p>
    </div>
    <div class="col-4 col-sm-4 col-md-4  col-lg-4">
      <span class="glyphicon glyphicon-gift logo-small"></span>
      <h4>SERVICIOS DE BELLEZA</h4>
      <p>Tu mejor amigo se merece los mejores servicios de belleza</p>
    </div>
    <div class="col-4 col-sm-4 col-md-4  col-lg-4">
      <span class="glyphicon glyphicon-certificate logo-small"></span>
      <h4>ACCIDENTES</h4>
      <p>Cualquier tipo de accidente u operación</p>
    </div>
  </div>
  <br><br>
  <div class="row">
  <div class="col-4 col-sm-4 col-md-4  col-lg-4">
      <span class="glyphicon glyphicon-warning-sign logo-small"></span>
      <h4>SERVICIO DE URGENCIA</h4>
      <p>Servicios 24 horas para tu compañero</p>
    </div>
    <div class="col-4 col-sm-4 col-md-4  col-lg-4">
      <span class="glyphicon glyphicon-scissors logo-small"></span>
      <h4>CASTRACIÓN</h4>
      <p>Los mejores metodos de castración para tu animal</p>
    </div>
    <div class="col-4 col-sm-4 col-md-4  col-lg-4">
      <span class="glyphicon glyphicon-tint logo-small"></span>
      <h4 style="color:#303030;">VACUNAS</h4>
      <p>Vacunas periódicas para tu mascota</p>
    </div>
  </div>
</div>

<!--GOOGLE MAPS -->
<div class="container">
    <div class="row">

    <div class="col-12 col-sm-12 col-md-12  col-lg-12">
        <div class="embed-responsive embed-responsive-16by9">
        <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3043.2384419675677!2d-3.8095838846078625!3d40.2926643793798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd418bff2fdeb219%3A0xa1ded8e97c07bb6e!2sClinica+Vital-Pet!5e0!3m2!1ses!2ses!4v1552826235149"allowfullscreen></iframe>
        </div>
        </div>

        <div class="col-12 col-sm-12 col-md-12  col-lg-12">
        <ul class="listas list-group">
  <li class="list-group-item active">CONTACTO</li>
  <li class="list-group-item">C/Móstoles Fuenlabrada, Madrid 28941</li>
  <li class="list-group-item">910256254 / 605963254 vitalPet@gmail.com</li>
</ul>
</div>

     </div>
  </div>
<br/>
<footer class="container-fluid text-center">
  <p>© Carlos J Angulo, Miguel Gallego, Pablo Fernández</p>
</footer>

</body>
</html>