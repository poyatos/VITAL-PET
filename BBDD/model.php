<?php
    class Model {
        private $conexion;

        //CONSTRUCTOR
        function __construct ($host, $user, $pass, $nombreBase){
            $this->conexion = new mysqli($host, $user, $pass);

            if($this->conexion->connect_error){
                die("Error de conexion (".$this->conexion->connection_errno.") ".$this->conexion->connection_error);
            }

            if(!($this->conexion->select_db($nombreBase))){
                echo "No se ha podido conectar";
            }
        }

        public function desconectar(){
            $this->conexion->close();
        }
            
        //FUNCION GENERAL PARA EJECUTAR CONSULTAS
        public function ejecutarConsulta($consulta){
            $resultado = null;
            
            if(isset($this->conexion)){
                $resultado = $this->conexion->stmt_init();
                $resultado->prepare($consulta);
                $resultado->execute();
            }

            return $resultado;
        }

        //FUNCION GENERAL PARA DEVOLVER CONSULTAS EN UN ARRAY
        public function devolverConsultaArray($consulta){
            $resultadoConsulta = $this->ejecutarConsulta($consulta);
            $productos = null;

            if($resultadoConsulta){
                $resultado = $resultadoConsulta->get_result();
            }

            if($resultado){
                $fila = $resultado->fetch_array();
            
                while ($fila != null){
                    $productos[] = $fila;
                    $fila = $resultado->fetch_array();
                }
            }

            return $productos;
        }

        /* ------------------------------------------------------------ USUARIOS --------------------------------------------------------------*/

        //REGISTRAR USUARIO
        public function registrarUsuario($nombre, $apellidos, $dni, $telefono, $correo, $fecna, $direccion, $rol, $pass){
            $consulta = "SELECT * FROM usuarios WHERE dni_usuario = '$dni' ";

            $resultadoConsulta = $this->ejecutarConsulta($consulta);

            if($resultadoConsulta){
                $resultado = $resultadoConsulta->get_result();
            }
            $existeUsuario = mysqli_num_rows($resultado);

            if ($existeUsuario == 1) {
                echo "<br/><h2>El usuario ya existe.</h2><br />";
                echo "<a href='registroFormulario.php'>Por favor elige otro nombre.</a>";
            } else {
                $passHash = hash("sha2", $pass);
                $sql = "INSERT INTO usuarios (nombre_usuario, apellidos_usuario, dni_usuario, telefono_usuario, correo_usuario, fecna_usuario, 
                direccion_usuario, rol_usuario, pass_usuario) VALUES ('$nombre', '$apellidos', '$dni', $telefono, '$correo', '$fecna', 
                '$direccion', '$rol', '$passHash')";

                if ($this->ejecutarConsulta($sql)) {
                    echo "<br/><h2>Usuario registrado correctamente.</h2>";
                } else {
                    echo "<h2>Error al crear el usuario." . $sql . "</h2><br/>";
                    echo "<h5><a href='registroFormulario.php'>Intentelo de nuevo</a></h5>"; 
                }
            }
        }

        //VISUALIZAR USUARIOS
        public function visualizarUsuarios(){
            $consulta = "SELECT * FROM usuarios";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //VISUALIZAR USUARIO POR DNI
        public function visualizarUsuarioDni($dni){
            $consulta = "SELECT * FROM usuarios WHERE dni_usuario = '$dni' ";
            $resultado = $this->ejecutarConsulta($consulta);
            return $resultado;
        }
        
        //INICIAR SESION USUARIO
        public function iniciarSesionUsuario($dni,$pass){
            $consulta = "SELECT * FROM usuarios WHERE dni_usuario = '$dni' ";

            $resultadoConsulta = $this->ejecutarConsulta($consulta);

            if($resultadoConsulta){
                $resultado = $resultadoConsulta->get_result();
            }
            $existeUsuario = mysqli_num_rows($resultado);
            $columnas = $resultado->fetch_array();

            if ($existeUsuario >= 1) {
                if ($columnas['pass_usuario'] == $pass) {
                    $_SESSION['usuario'] = $dni;
                    $seccion = strtoupper($columnas['rol_usuario']);
                    header("Location: ../$seccion");
                } else {
                    echo "<br/><h2>La contraseña es incorrecta, por favor introduzca una contraseña válida.</h2>";
                    echo "<h4>Volver al <a href='sesionFormulario.php'>formulario</a></h4>";
                }
            } else {
                echo "<br/><h2>El usuario no existe, por favor introduzca un usuario válido.</h2>";
                echo "<h4>Volver al <a href='sesionFormulario.php'>formulario</a></h4>";
            }
        }

        //MODIFICAR USUARIO
        public function modificarUsuario($id, $nombre, $apellidos, $dni, $telefono, $correo, $fecna, $direccion, $rol, $pass){
            $consulta = "UPDATE usuarios SET nombre_usuario = '$nombre', apellidos_usuario = '$apellidos', dni_usuario = '$dni', telefono_usuario = $telefono, correo_usuario = '$correo', fecna_usuario = '$fecna', 
            direccion_usuario = '$direccion', rol_usuario = '$rol', pass_usuario = '$pass' WHERE id_usuario = $id";
            $this->ejecutarConsulta($consulta);
        }

        //BORRAR USUARIO (POSIBLE IMPLEMENTACION, PERO IMPLICARIA ELIMINAR OTROS ELEMENTOS RELACIONADOS CON USUARIO)

        /* ----------------------------------------------------------- MASCOTAS --------------------------------------------------------------*/

        //REGISTRAR MASCOTA
        public function registrarMascota($dni, $nombre, $tipo, $raza, $sexo, $fecna, $peso){
            $consulta = "SELECT * FROM mascotas WHERE dni_cliente = '$dni' AND nombre_mascota = '$nombre' AND tipo_mascota = '$tipo' ";

            $resultadoConsulta = $this->ejecutarConsulta($consulta);

            if($resultadoConsulta){
                $resultado = $resultadoConsulta->get_result();
            }
            $existeMascota = mysqli_num_rows($resultado);

            if ($existeMascota >= 1) {
                echo "<br/><h2>La mascota ya existe.</h2><br />";
            } else {
                $sql = "INSERT INTO mascotas (dni_cliente, nombre_mascota, tipo_mascota, raza_mascota, sexo_mascota, fecna_mascota, peso_mascota)
                VALUES ('$dni', '$nombre', '$tipo', '$raza', '$sexo', '$fecna', $peso)";

                if ($this->ejecutarConsulta($sql)) {
                    echo "<br/><h2>Mascota registrada correctamente.</h2>";
                } else {
                    echo "<h2>Error al crear la mascota." . $sql . "</h2><br/>";
                    echo "<h5><a href='registroFormulario.php'>Intentelo de nuevo</a></h5>"; 
                }
            }            
        }

        //VISUALIZAR MASCOTAS
        public function visualizarMascotas(){
            $consulta = "SELECT * FROM mascotas";
            $resultado = $this->ejecutarConsulta($consulta);
            return $resultado;
        }

        //VISUALIZAR MASCOTAS DUEÑO
        public function visualizarMascotasDueno($dni){
            $consulta = "SELECT * FROM mascotas WHERE dni_cliente = '$dni' ";
            $resultado = $this->ejecutarConsulta($consulta);
            return $resultado;
        }

        //MODIFICAR MASCOTAS
        public function modificarMascota($id, $dni, $nombre, $tipo, $raza, $sexo, $fecna, $peso){
            $consulta = "UPDATE usuarios SET dni_cliente = '$dni', nombre_mascota = '$nombre', tipo_mascota = '$tipo', raza_mascota = '$raza', 
            sexo_mascota = '$sexo', fecna_mascota = '$fecna', peso_mascota = $peso WHERE id_mascota = $id";
            $this->ejecutarConsulta($consulta);
        }

        /* ------------------------------------------------------------- CITAS --------------------------------------------------------------*/

        /* ------------------------------------------------------------ PRUEBAS --------------------------------------------------------------*/

        /* -------------------------------------------------------- TIPOS DE PRUEBAS -----------------------------------------------------------*/

        /* ----------------------------------------------------------- CONTRATOS --------------------------------------------------------------*/
 
?>