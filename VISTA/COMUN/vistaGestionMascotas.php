<?php
  session_start();

  if(!isset($_SESSION['mascota']) && !isset($_SESSION['rol'])){
    header("Location: ../../index.php");
  }

  if (isset($_GET["nombre"]) && isset($_GET["tipo"])){
    $nombre = $_GET["nombre"];
    $tipo = $_GET["tipo"];
  }else{
    $nombre = "";
    $tipo = "";
  }
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>Vital-Pet / Gestión Mascotas</title>
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
 <div class="form-group row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
 <h1>LISTADO MASCOTAS</h1>
</div>
           
<form class="formulario" action='vistaGestionMascotas.php' method='GET'>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <label name="busquedaNombre_lb" id="id_busqueda_Nombre">Nombre de la mascota:
            <input class="form-control" name="nombre" id="myInput" type="text" value="<?= $nombre ?>" placeholder="Busqueda...">
            </label>
      </div>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <label name="busquedaTipo_lb" id="id_busqueda_nombre">Tipo:
            <input class="form-control" name="tipo" id="myInput" type="text" value="<?= $tipo ?>" placeholder="Busqueda...">
            </label>
      </div>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <input type="submit" class="btn btn-info botonsitobb" value="Buscar" name="busqueda">
      </div>
            
      </form>

  <!-- tabla de busqueda-->
  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID Mascota</th>
        <th>Nombre de Mascota</th>
        <th>DNI dueño</th>
        <th>Tipo</th>
        <th>Raza</th>
        <th>Peso (Kg)</th>
        <th>Sexo</th>
        <?php
          if ($_SESSION['rol'] == 'Recepcionista' || $_SESSION['rol'] == 'Veterinario'){
          echo ("<th>Editar</th>");
          }
        ?>
      </tr>
    </thead>
    <tbody id="myTable">
    <?php
        require_once '../../BBDD/model.php';
        require_once '../../BBDD/config.php';
      
        $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

        $resultado = $conexion->visualizarMascotasFiltrado($nombre, $tipo);

        if (!empty($resultado)) {
            $total_registros = count($resultado);

            $tamano_pagina = 5;
            $pagina = false;

            if (isset($_GET["pagina"])) {
                $pagina = $_GET["pagina"];
            }
            if (!$pagina) {
                $inicio = 0;
                $pagina = 1;
            } else {
                $inicio = ($pagina - 1) * $tamano_pagina;
            }
            $total_paginas = ceil($total_registros / $tamano_pagina);
            
            $resultadoPaginacion = $conexion->visualizarMascotasFiltradoPaginacion($nombre, $tipo, $inicio, $tamano_pagina);

            foreach($resultadoPaginacion as $mascota){
               echo ("<tr>
              <td>".$mascota['id_mascota']."</td>
              <td>".$mascota['nombre_mascota']."</td>
              <td>".$mascota['dni_usuario']."</td>
              <td>".$mascota['tipo_mascota']."</td>
              <td>".$mascota['raza_mascota']."</td>
              <td>".$mascota['peso_mascota']."</td>
              <td>".$mascota['sexo_mascota']."</td>");
              if ($_SESSION['rol'] == 'Recepcionista'){
                 echo  ('<td>
                      <form action="../RECEPCIONISTA/vistaAnadirCita.php" method="POST">
                        <input type="hidden" value="'.$mascota['id_cliente'].'" name="id_cliente">
                        <input type="hidden" value="'.$mascota['id_mascota'].'" name="id_mascota"> 
                        <input type="submit" value="Añadir citas">
                      </form>
                      </td>');
              } else if ($_SESSION['rol'] == 'Veterinario'){
                 echo ( '<td>
                      <form action="../VETERINARIO/vistaEditarMascota.php" method="POST">
                        <input type="hidden" value="'.$mascota['id_mascota'].'" name="id_mascota">
                        <input type="submit" value="Editar">
                      </form>
                      <form action="../../CONTROLADOR/controladorVeterinario.php" method="POST"> 
                        <input type="hidden" value="'.$mascota['id_mascota'].'" name="id_mascota">
                        <input type="submit" value="Borrar" name="borrarMascota">
                      </form>
                      </td>');
              }
               echo ( "</tr>");
            }
        
      ?>
    </tbody>
  </table>
</div>

<!-- PAGINACIÓN-->

<div class="col-12 col-sm-12 col-md-12 col-lg-12">
<?php
    $busqueda = "&nombre=".$nombre."&tipo=".$tipo;
    include '../../INCLUDE/piePaginacion.php';
  } else {
     echo ( "<p>No se han encontrado resultados.</p>");
  } 

  $conexion->desconectar();
  ?>
</div>
</div>
</div>
</div>
</body>

</html>