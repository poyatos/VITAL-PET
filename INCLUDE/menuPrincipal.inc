 <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
      <img  src="../../IMAGENES/logotb.png" width="250px" height="auto" > 
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a><span class="glyphicon glyphicon-user"></span> <?= $_SESSION['usuario'] ?></a></li>
        <li><a href="../COMUN/vistaComunCambiarContrasena.php"><span class="glyphicon glyphicon-lock"></span> Contraseña</a></li>
        <li><a href="../../CONTROLADOR/logout.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
      </ul>
    </div>
  </nav>



