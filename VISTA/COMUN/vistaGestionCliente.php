<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
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
  <script type="text/javascript" src="../../JS/consultar.js"></script>

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
      include "../../INCLUDE/menuDir.inc"
  ?>
      </div>


      <!-- CONTENIDO-->

<!-- filtro y busqueda-->
 <div class="col-12 col-sm-7 col-md-7 col-lg-7 text-left">
   <div class="row">

   <div class="col-12 col-sm-12 col-md-12 col-lg-12">
 <h1>LISTADO MASCOTAS</h1>
 </div>

 <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <input class="form-control" id="myInput" type="text" placeholder="Busqueda..">
</div>

  <!-- tabla de busqueda-->
  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>DNI</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>Dirección</th>
        <th>Editar</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <tr>
        <td>paco</td>
        <td>John</td>
        <td>456765457e</td>
        <td>36653554345</td>
        <td>cliente@cliente.com</td>
        <td>CALLE PEPITO</td>
  
        <td>
        <!--RECEPCION-->
        <a href="#" class="btn btn-danger" role="button">Borrar</a>
        <a href="#" class="btn btn-info" role="button">Editar</a>

        <!--VER COMO ACCEDER A LAS MASCOTAS DE ESTE CLIENTE   SIN HACER-->
        <a href="../COMUN/vistaGestionMascotas.php" class="btn btn-info" role="button">Ver mascotas</a>
 

        </td>
      </tr>
      <tr>
        <td>pepe</td>
        <td>John</td>
        <td>456765457e</td>
        <td>36653554345</td>
        <td>cliente@cliente.com</td>
        <td>CALLE PEPITO</td>
     
        <td>
         <!--RECEPCION-->
         <a href="#" class="btn btn-danger" role="button">Borrar</a>
        <a href="#" class="btn btn-info" role="button">Editar</a>

        <!--VER COMO ACCEDER A LAS MASCOTAS DE ESTE CLIENTE-->
        <a href="../COMUN/vistaGestionMascotas.php" class="btn btn-info" role="button">Ver mascotas</a>
       
        </td>
      </tr>
    </tbody>
  </table>
</div>

<!-- PAGINACIÓN-->

<div class="col-12 col-sm-12 col-md-12 col-lg-12">
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#"><i class="glyphicon glyphicon-triangle-left"></i> </a></li>
    <li class="page-item"><a class="page-link" href="#"><i class="glyphicon glyphicon-menu-left"></i> </a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#"><i class="glyphicon glyphicon-menu-right"></i> </a></li>
    <li class="page-item"><a class="page-link" href="#"><i class="glyphicon glyphicon-triangle-right"></i> </a></li>
  </ul>
</nav>
</div>
</div>
</div>
</div>
</body>

</html>