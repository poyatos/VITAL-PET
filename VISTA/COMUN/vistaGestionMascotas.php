<?php
  session_start();

  if(!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])){
    header("Location: ../../index.php");
  } else {
    if($_SESSION['rol'] == 'cliente'){
      header("Location: ../../index.php");
    }
  }
?>
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
        include "../../INCLUDE/menuPrincipal.inc";
      ?>
  </div>
 

  <!-- MENU LATERAL -->
      <div class="col-12 col-sm-5 col-md-4  col-lg-4">
  <?php
      if($_SESSION['rol'] == 'Director'){
        include "../../INCLUDE/menuDir.inc";
      } else if ($_SESSION['rol'] == 'Recepcionista'){
        include "../../INCLUDE/menuRec.inc";
      } else if ($_SESSION['rol'] == 'Veterinario'){
        include "../../INCLUDE/menuVet.inc";
      }
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
        <th>ID Paciente</th>
        <th>Nombre de Mascota</th>
        <th>DNI dueño</th>
        <th>Tipo</th>
        <th>Raza</th>
        <th>Peso</th>
        <th>Sexo</th>
        <th>Editar</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <tr>
        <td>#01</td>
        <td>John</td>
        <td>456765457e</td>
        <td>perrete</td>
        <td>labrador</td>
        <td>50kilos</td>
        <td>M</td>
        <td>
        <!--DIRECTOR Y RECEPCION-->
        <a href="#" class="btn btn-danger" role="button">Borrar</a>
        <a href="#" class="btn btn-info" role="button">Editar</a>
         <!--VETERINARIO-->
        <a href="../VETERINARIO/vistaAnadirPrueba.php" class="btn btn-info" role="button">Añadir prueba</a>
        <!--RECEPCIONISTA-->
        <a href="../VETERINARIO/vistaAnadirPrueba.php" class="btn btn-info" role="button">Pagar pruebas</a>
        <a href="#" class="btn btn-danger" role="button">Añadir citas</a>

        </td>
      </tr>
      <tr>
        <td>#01</td>
        <td>Perico</td>
        <td>456765457e</td>
        <td>perrete</td>
        <td>labrador</td>
        <td>50kilos</td>
        <td>M</td>
        <td>
        <!--DIRECTOR Y RECEPCION-->
        <a href="#" class="btn btn-danger" role="button">Borrar</a>
        <a href="#" class="btn btn-info" role="button">Editar</a>
        <!--VETERINARIO-->
        <a href="../VETERINARIO/vistaAnadirPrueba.php" class="btn btn-info" role="button">Añadir prueba</a>
        <!--RECEPCIONISTA-->
        <a href="../VETERINARIO/vistaAnadirPrueba.php" class="btn btn-info" role="button">Pagar pruebas</a>
        <a href="#" class="btn btn-danger" role="button">Añadir citas</a>
       
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