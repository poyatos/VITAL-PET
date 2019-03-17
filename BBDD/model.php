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

        //FUNCION PARA CERRAR LA CONEXION
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

        //FUNCION PARA COMPROBAR SI YA EXISTE UNA MISMA FILA DENTRO DE UNA TABLA
        public function existeFila($consulta){
            $existe = false;
            $resultadoConsulta = $this->ejecutarConsulta($consulta);

            if($resultadoConsulta){
                $resultado = $resultadoConsulta->get_result();
            }
            $numFilas = mysqli_num_rows($resultado);

            if($numFilas >= 1){
                $existe = true;
            }

            return $existe;
        }

        /* ------------------------------------------------------------ USUARIOS --------------------------------------------------------------*/

        //REGISTRAR USUARIO
        public function registrarUsuario($nombre, $apellidos, $dni, $telefono, $correo, $fecna, $direccion, $rol, $pass){
            $consulta = "SELECT * FROM usuarios WHERE dni_usuario = '$dni' ";

            if ($this->existeFila($consulta)) {
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
                    $_SESSION['rol'] = $columnas['rol_usuario'];
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

            if ($this->existeFila($consulta)) {
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

        //VISUALIZAR MASCOTAS CLIENTE
        public function visualizarMascotasCliente($dni){
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

        //BORRAR MASCOTAS (OPCIONAL)

        /* ------------------------------------------------------------- CITAS --------------------------------------------------------------*/

        //REGISTRAR CITAS
        public function registrarCita($fecha, $hora, $consulta, $id, $dni){
            $consulta = "SELECT * FROM citas WHERE fecha_cita = '$fecha' AND hora_cita = '$hora'";

            if ($this->existeFila($consulta)) {
                echo "<br/><h2>La cita ya existe.</h2><br />";
            } else {
                $sql = "INSERT INTO citas (fecha_cita, hora_cita, estado_cita, num_consulta, id_mascota, dni_cliente)
                VALUES ('$fecha', '$hora', 'Pendiente', $consulta, $id, '$dni')";

                if ($this->ejecutarConsulta($sql)) {
                    echo "<br/><h2>Cita registrada correctamente.</h2>";
                } else {
                    echo "<h2>Error al crear la cita." . $sql . "</h2><br/>";
                    echo "<h5><a href='registroFormulario.php'>Intentelo de nuevo</a></h5>"; 
                }
            }
        }

        //VISUALIZAR CITAS
        public function visualizarCitas(){
            $consulta = "SELECT * FROM citas";
            $resultado = $this->ejecutarConsulta($consulta);
            return $resultado;
        }

        //VISUALIZAR CITAS CLIENTE
        public function visualizarCitasCliente($dni){
            $consulta = "SELECT * FROM citas WHERE dni_cliente = '$dni' ";
            $resultado = $this->ejecutarConsulta($consulta);
            return $resultado;
        }

        //MODIFICAR CITA
        public function modificarCita($id, $fecha, $hora, $estado, $consulta, $id_mascota, $dni_cliente, $dni_veterinario){
            $consulta = "UPDATE citas SET fecha_cita = '$fecha', hora_cita = '$hora', estado = '$estado', num_consulta = $consulta, 
            id_mascota = $id_mascota, dni_cliente = $dni_cliente, dni_veterinario = $dni_veterinario WHERE id_cita = $id";
            $this->ejecutarConsulta($consulta);
        }

        //MODIFICAR ESTADO CITA
        public function modificarEstadoCita($id, $estado){
            $consulta = "UPDATE citas SET estado = '$estado' WHERE id_cita = $id";
            $this->ejecutarConsulta($consulta);
        }

        //BORRAR CITA (OPCIONAL)

        /* ------------------------------------------------------------ PRUEBAS --------------------------------------------------------------*/

        //REGISTRAR PRUEBAS
        public function registrarPrueba($id_tipo, $id_mascota, $resultado, $observaciones){
                $consulta = $this->visualizarTipoPruebaId($id_tipo);
                $sql = "INSERT INTO citas (id_tipo_prueba, id_mascota, resultado_prueba, observaciones_prueba)
                VALUES ($id_tipo, $id_mascota, '$resultado', '$observaciones')";

                if ($this->ejecutarConsulta($sql)) {
                    echo "<br/><h2>Prueba registrada correctamente.</h2>";
                } else {
                    echo "<h2>Error al crear la cita." . $sql . "</h2><br/>";
                    echo "<h5><a href='registroFormulario.php'>Intentelo de nuevo</a></h5>"; 
                }
        }

        //VISUALIZAR PRUEBAS
        public function visualizarPruebas(){
            $consulta = "SELECT * FROM pruebas";
            $resultado = $this->ejecutarConsulta($consulta);
            return $resultado;
        }

        //VISUALIZAR PRUEBAS MASCOTA
        public function visualizarPruebasMascota($id){
            $consulta = "SELECT * FROM pruebas WHERE id_mascota = '$id' ";
            $resultado = $this->ejecutarConsulta($consulta);
            return $resultado;
        }

        //MODIFICAR PRUEBA
        public function modificarPrueba($id_tipo, $id_mascota, $resultado, $observaciones){
            $consulta = "UPDATE pruebas SET id_tipo = $id_tipo, id_mascota = $id_mascota, resultado_prueba = '$resultado', observaciones = '$observaciones', 
            id_mascota = $id_mascota, dni_cliente = $dni_cliente, dni_veterinario = $dni_veterinario WHERE id_cita = $id";
            $this->ejecutarConsulta($consulta);
        }

        //BORRAR CITA (OPCIONAL)

        /* -------------------------------------------------------- TIPOS DE PRUEBAS -----------------------------------------------------------*/

        /* ----------------------------------------------------------- CONTRATOS --------------------------------------------------------------*/

        //REGISTRAR CONTRATO
        public function contratarUsuario($fecini_contrato, $fecfin_contrato, $sueldo_contrato, $diasvac_contrato, $horario_contrato, $estado_contrato, $id_contratado){
            $consulta = "SELECT * FROM contratos WHERE id_contratado = '$id_contratado' ";
    
            $resultadoConsulta = $this->ejecutarConsulta($consulta);
    
            if($resultadoConsulta){
                $resultado = $resultadoConsulta->get_result();
            }
            $existeContrato = mysqli_num_rows($resultado);

            if ($existeContrato == 1) {
                echo "<br/><h2>Este usuario ya tiene contrato.</h2><br />";
                echo "<a href='registroFormulario.php'>Por favor elige otra opción.</a>";
            } else {
                $sql = "INSERT INTO contratos (fecini_contrato, fecfin_contrato, sueldo_contrato, diasvac_contrato, horario_contrato, estado_contrato, 
                id_contratado) VALUES ('$fecini_contrato', '$fecfin_contrato', $sueldo_contrato, $diasvac_contrato, '$horario_contrato', '$estado_contrato', $id_contratado)";
    
                if ($this->ejecutarConsulta($sql)) {
                    echo "<br/><h2>Contrato registrado correctamente.</h2>";
                } else {
                    echo "<h2>Error al crear el contrato." . $sql . "</h2><br/>";
                    echo "<h5><a href='registroFormulario.php'>Intentelo de nuevo</a></h5>"; 
                }
            }
        }

        /* ------------------------------------------------------------- PAGOS --------------------------------------------------------------*/

        /* ----------------------------------------------------------- CONSULTAS --------------------------------------------------------------*/
    }
?>