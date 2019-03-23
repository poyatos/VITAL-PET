<?php
  session_start();

  if(!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])){
    header("Location: ../../index.php");
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
      <?php
      include "../../INCLUDE/menuPrincipal.inc"
      ?>

  <div class="row">

  <!-- MENU LATERAL -->
      <div class="col-sm-4">
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
 <div class="col-sm-7 text-left">

 <h1>LISTADO CITAS</h1>

            <input class="form-control" id="myInput" type="text" placeholder="Busqueda..">
  <br>

  <!-- tabla de busqueda-->
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID cita</th>
        <th>DNI</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Estado de la cita</th>
        <th>id mascota</th>
        <th>Consulta nº</th>
        <th>Editar</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <tr>
        <td>#445</td>
        <td>456765457e</td>
        <td>09/10/2021</td>
        <td>19:30</td>
        <td>disponible</td>
        <td>#445</td>
        <td>4</td>
        <td>
         <!--VETERINARIO Y RECEPCIONISTA-->
        <a href="#" class="btn btn-danger" role="button">Borrar</a>
        <a href="#" class="btn btn-info" role="button">Editar</a>
        <a href="#" class="btn btn-danger" role="button">Finalizar Consulta</a>
        <!--RECEPCIONISTA-->
        <a href="#" class="btn btn-danger" role="button">Añadir citas</a>
        </td>
      </tr>
      <tr>
        <td>#456/td>
        <td>45875457e</td>
        <td>09/10/2022</td>
        <td>17:30</td>
        <td>no disponible</td>
        <td>#445</td>
        <td>4</td>
        <td>
          <!--VETERINARIO Y RECEPCIONISTA-->
        <a href="#" class="btn btn-danger" role="button">Borrar</a>
        <a href="#" class="btn btn-info" role="button">Editar</a>
        <a href="#" class="btn btn-danger" role="button">Finalizar Consulta</a>
        <!--RECEPCIONISTA-->
        <a href="#" class="btn btn-danger" role="button">Añadir citas</a>
        </td>
      </tr>
    </tbody>
  </table>


<!-- PAGINACIÓN-->
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
</body>

</html>