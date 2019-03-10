<!DOCTYPE html>
<html lang="en">
<head>
  <title>INDEX</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 400px) {
    .carousel-caption {
      display: none; 
    }
  }
  </style>
</head>
<body>

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
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Iniciar sesión</a></li>
      </ul>
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
        <img src="IMAGENES/gat.jpg" alt="Image">
        <div class="carousel-caption">
        </div>      
      </div>
      <div class="item">
        <img src="IMAGENES/lag.jpg" alt="Image">
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
<div class="container text-center">    
  <h3>Tu clinica de confianza</h3><br>
  <div class="row">
    <div class="col-sm-6">
      <img src="IMAGENES/vet.jpg" class="img-responsive" style="width:100%" alt="Image">
      <p>Animales</p>
    </div>
    <div class="col-sm-6"> 
      <img src="IMAGENES/vet.jpg" class="img-responsive" style="width:100%" alt="Image">
      <p>Personas</p>    
    </div>

    <div class="col-sm-6">
    <p>Este texto es de ejemplo para probar el index, jajaja xd miguel chino carlos calvo y pablo cabezon
     Este texto es de ejemplo para probar el index, jajaja xd miguel chino carlos calvo y pablo cabezon</p>
    </div>

    <div class="col-sm-6">
    <p>Este texto es de ejemplo para probar el index, jajaja xd miguel chino carlos calvo y pablo cabezon
     Este texto es de ejemplo para probar el index, jajaja xd miguel chino carlos calvo y pablo cabezon</p>
    </div>
  </div>
</div><br>


<div class="container">
    <div class="row-fluid">
        <div class="col-md-8">
        	<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/place?q=Cyberborg%20Bodyart%2C%20Bangka%2C%20Jakarta%2C%20Indonesia&key=AIzaSyCGz8WzqxQw1OwHWey3LCTjqKFG9feCxP4"></iframe>
    	</div>
    	
      	<div class="col-md-4">
    		<h2>CONTACTO</h2>
    		<address>
    			<strong>VITAL PET</strong><br>
    			Calle inventada numero 6<br>
    			Fuenlabrada, Madrid<br>
    			España<br>
    			28941<br>
    			petvital@gmail.com<br>
    			<abbr title="Phone">P:</abbr> +34 91562494
    		</address>
    	</div>
    </div>
</div>



 

<br/>
<footer class="container-fluid text-center">
  <p>copiright de viniloko y charlie</p>
</footer>

</body>
</html>