<?php
    session_start();
    if(!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])){
        header("Location: ../index.php");
    } else {
      if($_SESSION['rol'] == 'Cliente'){
        header("Location: ../CLIENTE");
      }
    }
    if (isset($_GET["nombre"]) && isset($_GET["dni"])){
      $nombre = $_GET["nombre"];
      $dni = $_GET["dni"];
    }else{
      $nombre = "";
      $dni = "";
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Vital-Pet / Gestión Clientes</title>
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
 <h1>LISTADO CLIENTES</h1>
</div>  
      <form class="formulario" action='vistaGestionCliente.php' method='GET'>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <label name="busquedaNombre_lb" id="id_busqueda_Nombre">Nombre:
            <input class="form-control" name="nombre" id="myInput" type="text" value="<?= $nombre ?>" placeholder="Busqueda...">
            </label>
      </div>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <label name="busquedaDni_lb" id="id_busqueda_nombre">NIE / NIF:
            <input class="form-control" name="dni" id="myInput" type="text" value="<?= $dni ?>" placeholder="Busqueda...">
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
        <th>ID cliente</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>NIE / NIF</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>Dirección</th>
        <?php
          if($_SESSION['rol'] == 'Recepcionista'){
             echo '<th>Editar</th>';
          }
        ?>
      </tr>
    </thead>
    <tbody id="myTable">
    <?php
        require_once '../../BBDD/model.php';
        require_once '../../BBDD/config.php';
        $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);
        $resultado = $conexion->filtrarClientes($nombre, $dni);
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
            $resultadoPaginacion = $conexion->filtrarClientesPaginacion($nombre, $dni, $inicio, $tamano_pagina);
            foreach($resultadoPaginacion as $clientes){
                   echo (" <tr>
                  <td><a href='vistaDetalleCliente.php?id=".$clientes['id_usuario']."'>".$clientes['id_usuario']."</a></td>
                  <td>".$clientes['nombre_usuario']."</td>
                  <td>".$clientes['apellidos_usuario']."</td>
                  <td>".$clientes['dni_usuario']."</td>
                  <td>".$clientes['telefono_usuario']."</td>
                  <td>".$clientes['correo_usuario']."</td>
                  <td>".$clientes['direccion_usuario']."</td>");
                    if($_SESSION['rol'] == 'Recepcionista'){
                       echo ('<td class="botonesAccion">
                       <div class="btn-group-vertical">
                      <form action="../RECEPCIONISTA/vistaRegistroMascota.php" method="POST">
                        <input type="hidden" value="'.$clientes['id_usuario'].'" name="id_cliente">
                        <input class="btn btn-primary" type="submit" value="Añadir mascota" name="anadirMascota"> 
                      </form>
                      <form action="../RECEPCIONISTA/vistaEditarCliente.php" method="POST">
                        <input type="hidden" value="'.$clientes['id_usuario'].'" name="id_cliente">
                        <input class="btn btn-primary" type="submit" value="Editar" name="editarCliente">
                      </form>
                      </div>
                      </td>');
                    }
               echo ("</tr>");
        }
          ?>
    </tbody>
  </table>
</div>
<!-- PAGINACIÓN-->
<div class="col-12 col-sm-12 col-md-12 col-lg-12">
<?php
    $busqueda = "&nombre=".$nombre."&dni=".$dni;
    include '../../INCLUDE/piePaginacion.php';
  } else {
     echo ("<p>No se han encontrado resultados.</p>");
  }
  $conexion->desconectar();
  ?>
</div>
</body>
</html>