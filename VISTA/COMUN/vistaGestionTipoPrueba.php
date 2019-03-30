<?php
    session_start();

    if(!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])){
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>Tipos de pruebas</title>
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
      <div class="col-12 col-sm-5 col-md-4 col-lg-4">
      <?php
        if ($_SESSION['rol'] == 'Recepcionista'){
        include "../../INCLUDE/menuRec.inc";
      } else if ($_SESSION['rol'] == 'Veterinario'){
        include "../../INCLUDE/menuVet.inc";
      }
      ?>
      </div>


      <!-- CONTENIDO-->

      <div class="col-12 col-sm-7 col-md-7  col-lg-7 text-left">
      <div class="form-group row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <h1>TIPO DE PRUEBA</h1>
          </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <label name="busquedaNombre_lb" id="id_busqueda_Nombre">Nombre:
            <input class="form-control" name="busquedaNombre" id="myInput" type="text" placeholder="Busqueda..">
            </label>
      </div>

      </div>
      <br>
      <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID prueba</th>
        <th>Nombre</th>
        <th>Precio</th>
        <?php
          if($_SESSION['rol'] == 'Veterinario'){
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
      
        $resultado = $conexion->visualizarTiposPruebas();

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
            
            $resultadoPaginacion = $conexion->visualizarTipoPruebaPaginacion($inicio, $tamano_pagina);
            foreach($resultadoPaginacion as $tprueba){
                  echo" <tr>
                  <td>".$tprueba['id_tipo_prueba']."</td>
                  <td>".$tprueba['nombre_tipo_prueba']."</td>
                  <td>".$tprueba['precio_tipo_prueba']."</td>";

                    if($_SESSION['rol'] == 'Veterinario'){
                          echo '<td>
                          <a href="#" class="btn btn-info" role="button">Editar</a>
                          <a href="#" class="btn btn-danger" role="button">Borrar</a>
                          </td>';
                    }
              echo "</tr>";
        }
          ?>
    </tbody>
  </table>
</div>

<!-- PAGINACIÓN-->

<div class="col-12 col-sm-12 col-md-12  col-lg-12">
<?php
    echo '<nav aria-label="Page navigation example"><ul class="pagination">';
    if ($total_paginas > 1) {
      echo "<li class='page-item'><a href='vistaGestionTipoPrueba.php?pagina=0'><i class='glyphicon glyphicon-triangle-left'></i></a></li>";
      if ($pagina != 1){
          echo "<li class='page-item'><a href='vistaGestionTipoPrueba.php?pagina=".($pagina-1)."'><i class='glyphicon glyphicon-menu-left'></i></a></li>";
      }
      for ($i=1;$i<=$total_paginas;$i++) {
          if ($pagina == $i){
              echo "<li class='page-item'><a id='actual'>$pagina</a></li>";
          } else {
              echo "<li class='page-item'><a href='vistaGestionTipoPrueba.php?pagina=".$i."'>".$i."</a></li>";
          }
      }
      if ($pagina != $total_paginas){
          echo "<li class='page-item'><a href='vistaGestionTipoPrueba.php?pagina=".($pagina+1)."'><i class='glyphicon glyphicon-menu-right'></i></a></li>";
      }
      echo "<li class='page-item'><a href='vistaGestionTipoPrueba.php?pagina=".$total_paginas."'><i class='glyphicon glyphicon-triangle-right'></i></a></li>";
    }
    echo '</ul></nav>';

  } else {
    echo "<p>No se han encontrado resultados.</p>";
  } 

  $conexion->desconectar();
  ?>
</div>
</div>
</div>
</div>



</body>

</html>