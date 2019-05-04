<?php
  session_start();

  if(!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])){
    header("Location: ../../index.php");
    } else {
        if($_SESSION['rol'] != 'Director'){
            header("Location: ../".$_SESSION['rol']);
        }
  }
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>Vital-Pet / Gestión empleados</title>
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
      include "../../INCLUDE/menuDir.inc"
  ?>
      </div>


<!-- CONTENIDO-->

<!-- filtro y busqueda-->
<div class="col-12 col-sm-7 col-md-7 col-lg-7 text-left">
 <div class="form-group row">
<form class="formulario" action='vistaGestionCliente.php' method='POST'>
      <div class="col-12 col-sm-12 col-md-3 col-lg-3">
            <label name="busquedaNombre_lb" id="id_busqueda_Nombre">Nombre:
            <input class="form-control" name="nombre" id="myInput" type="text" placeholder="Busqueda..">
            </label>
      </div>
      <div class="col-12 col-sm-12 col-md-3 col-lg-3">
            <label name="busquedaDni_lb" id="id_busqueda_nombre">Dni:
            <input class="form-control" name="dni" id="myInput" type="text" placeholder="Busqueda..">
            </label>
      </div>
      <div class="col-12 col-sm-12 col-md-2 col-lg-2">
            <input type="submit" class="btn btn-info botonsitobb" value="buscar" name="busqueda">
      </div>
            
      </form>


 
  <!-- tabla de busqueda-->
  <div class="col-12 col-sm-7 col-md-7 col-lg-7">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID Empleado</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>DNI</th>
        <th>Telefono</th>
        <th>Profesión</th>
        <th>Estado contrato</th>
        <th>Editar</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php
        require_once '../../BBDD/model.php';
        require_once '../../BBDD/config.php';
      
        $conexion = new Model(Config::$host, Config::$user, Config::$pass, Config::$nombreBase);
      
        if (isset($_POST["busqueda"])){
          $resultado = $conexion->filtrarEmpleados($_POST["nombre"], $_POST["dni"]);
        }else{
        $resultado = $conexion->visualizarEmpleados();
        }
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
            
            if (isset($_POST["busqueda"])){
              $resultadoPaginacion = $conexion->filtrarEmpleadosPaginacion($_POST["nombre"], $_POST["dni"], $inicio, $tamano_pagina);
             }else{
            $resultadoPaginacion = $conexion->visualizarEmpleadosPaginacion($inicio, $tamano_pagina);
             }
            foreach($resultadoPaginacion as $empleado){

              $contrato = $conexion->visualizarContratoId($empleado['id_usuario']);
               echo ("<tr>
               <td><a href='vistaDetalleEmpleado.php'>".$empleado['id_usuario']."<a/></td>
              <td>".$empleado['nombre_usuario']."</td>
              <td>".$empleado['apellidos_usuario']."</td>
              <td>".$empleado['dni_usuario']."</td>
              <td>".$empleado['telefono_usuario']."</td>
              <td>".$empleado['rol_usuario']."</td>
              <td>".$contrato['estado_contrato']."</td>
              <td>");
              
                echo ("<form action='vistaEditarContrato.php' method='POST'>       
                <input type='hidden' name='id_usuario' value='".$empleado["id_usuario"]."'/>
                ");
                if ($contrato['estado_contrato'] == 'Finalizado') {
                    echo ("<input type='submit' class='btn' name='renovarContrato' value='Renovar'/>
                    </form>");
                } else {
                  echo ("<input type='submit' class='btn' name='editarContrato' value='Editar contrato'/>
                  </form>
                  <form action='../../CONTROLADOR/controladorDirector.php' method='POST'>
                    <input type='hidden' name='id_usuario' value='".$empleado["id_usuario"]."'/>
                    <input type='submit' class='btn' name='despedirContrato' value='Despedir'/>
                    </form>");
                }
              echo ("<form action='vistaEditarEmpleado.php' method='POST'>
                <input type='hidden' name='id_usuario' value='".$empleado["id_usuario"]."'/>
                <input type='submit' class='btn' value='Editar'/>
              </form>
              </td>
            </tr>");
            }
        
      ?>
    </tbody>
  </table>
  </div>


      <!-- PAGINACIÓN-->
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <?php
          include '../../INCLUDE/piePaginacion.php';
        } else {
          echo utf8_encode ("<p>No se han encontrado resultados.</p>");
        } 

        $conexion->desconectar();
        ?>
      </div>

</div>
</div>
</div>
</div>
</body>

</html>