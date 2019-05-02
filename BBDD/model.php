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
                 echo  "No se ha podido conectar";
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
            $total = null;

            if($resultadoConsulta){
                $resultado = $resultadoConsulta->get_result();
            }  

            if($resultado){
                $fila = $resultado->fetch_array();
            
                while ($fila != null){
                    $total[] = $fila;
                    $fila = $resultado->fetch_array();
                }
            }

            return $total;
        }

        //FUNCION GENERAL PARA DEVOLVER CONSULTAS DE UNA SOLA FILA
        public function devolverConsultaFila($consulta){
            $resultadoConsulta = $this->ejecutarConsulta($consulta);
            $fila = null;

            if($resultadoConsulta){
                $resultado = $resultadoConsulta->get_result();
            }  

            if($resultado){
                $fila = $resultado->fetch_array();
            }

            return $fila;
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
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/

        //REGISTRAR USUARIO
        public function registrarUsuario($nombre, $apellidos, $dni, $telefono, $correo, $fecna, $direccion, $rol, $pass){
            $consulta = "SELECT * FROM usuarios WHERE dni_usuario = '$dni' ";

            if ($this->existeFila($consulta)) {
                 echo "<br/><h2>El usuario ya existe.</h2><br />";
                 echo "<a href='registroFormulario.php'>Por favor elige otro nombre.</a>";
            } else {
                $passHash = hash("sha512", $pass);
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
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario, telefono_usuario, correo_usuario, fecna_usuario, 
            direccion_usuario, rol_usuario FROM usuarios";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //VISUALIZAR USUARIO POR DNI
        public function visualizarUsuarioDni($dni){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario, telefono_usuario, correo_usuario, fecna_usuario, 
            direccion_usuario, rol_usuario FROM usuarios WHERE dni_usuario = '$dni' ";
            $usuario = $this->devolverConsultaFila($consulta);
            return $usuario;
        }

        //VISUALIZAR USUARIO POR ID
        public function visualizarUsuarioId($id){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario, telefono_usuario, correo_usuario, fecna_usuario, 
            direccion_usuario, rol_usuario FROM usuarios WHERE id_usuario = $id ";
            $usuario = $this->devolverConsultaFila($consulta);
            return $usuario;
        }

        //VISUALIZAR CLIENTES
        public function visualizarClientes(){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario, telefono_usuario, correo_usuario, fecna_usuario, 
            direccion_usuario, rol_usuario FROM usuarios WHERE rol_usuario LIKE 'Cliente'";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //FILTRAR CLIENTES FILTRO 
        public function filtrarClientes($nombre, $dni){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario, telefono_usuario, correo_usuario, direccion_usuario 
            FROM usuarios WHERE rol_usuario LIKE 'Cliente' AND nombre_usuario LIKE '%$nombre%' AND dni_usuario LIKE '%$dni%'";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //FILTRAR CLIENTES FILTRO 
        public function filtrarClientesPaginacion($nombre, $dni, $inicio, $tamano_pagina){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario, telefono_usuario, correo_usuario, direccion_usuario 
            FROM usuarios WHERE rol_usuario LIKE 'Cliente' AND nombre_usuario LIKE '%$nombre%' AND dni_usuario LIKE '%$dni%'LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //VISUALIZAR CLIENTES (PAGINACION)
        public function visualizarClientesPaginacion($inicio, $tamano_pagina){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario, telefono_usuario, correo_usuario, fecna_usuario, 
            direccion_usuario, rol_usuario FROM usuarios WHERE rol_usuario LIKE 'Cliente' LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }


        //VISUALIZAR EMPLEADOS
        public function visualizarEmpleados(){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario, telefono_usuario, correo_usuario, fecna_usuario, 
            direccion_usuario, rol_usuario FROM usuarios WHERE rol_usuario IN ('Veterinario','Recepcionista')";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //VISUALIZAR EMPLEADOS (PAGINACION)
        public function visualizarEmpleadosPaginacion($inicio, $tamano_pagina){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario, telefono_usuario, correo_usuario, fecna_usuario, 
            direccion_usuario, rol_usuario FROM usuarios WHERE rol_usuario IN ('Veterinario','Recepcionista') LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //FILTRAR EMPLEADOS
        public function filtarEmpleados($nombre, $apellidos, $dni){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario, telefono_usuario, correo_usuario, fecna_usuario, 
            direccion_usuario, rol_usuario FROM usuarios WHERE rol_usuario IN ('Veterinario','Recepcionista') AND nombre_usuario LIKE '%$nombre%' 
            AND apellidos_usuario LIKE '%$apellidos%' AND dni_usuario LIKE '%$dni%'";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //FILTRAR EMPLEADOS (PAGINACION)
        public function filtarEmpleadosPaginacion($nombre, $apellidos, $dni){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario, telefono_usuario, correo_usuario, fecna_usuario, 
            direccion_usuario, rol_usuario FROM usuarios WHERE rol_usuario IN ('Veterinario','Recepcionista') AND nombre_usuario LIKE '%$nombre%' 
            AND apellidos_usuario LIKE '%$apellidos%' AND dni_usuario LIKE '%$dni%'  LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //VISUALIZAR VETERINARIOS
        public function visualizarVeterinarios(){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario FROM usuarios WHERE rol_usuario LIKE 'Veterinario'";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        
        //INICIAR SESION USUARIO
        public function iniciarSesionUsuario($dni,$pass){
            $consulta = "SELECT dni_usuario, pass_usuario, rol_usuario FROM usuarios WHERE dni_usuario = '$dni' ";

            $resultadoConsulta = $this->ejecutarConsulta($consulta);

            if($resultadoConsulta){
                $resultado = $resultadoConsulta->get_result();
            }
            $existeUsuario = mysqli_num_rows($resultado);
            $columnas = $resultado->fetch_array();

            if ($existeUsuario == 1) {
                if ($columnas['pass_usuario'] == hash("sha512",$pass)) {
                    $_SESSION['id_usuario'] = $columnas['id_usuario'];
                    $_SESSION['usuario'] = $columnas['nombre_usuario'] + " " + $columnas['apellidos_usuario'];
                    $_SESSION['rol'] = $columnas['rol_usuario'];
                    $rol = strtoupper($columnas['rol_usuario']);
                    header("Location: ../VISTA/$rol");
                } else {
                     echo "<br/><h2>La contraseña es incorrecta, por favor introduzca una contraseña válida.</h2>";
                     echo "<h4>Volver al <a href='../index.php'>formulario</a></h4>";
                }
            } else {
                 echo "<br/><h2>El usuario no existe, por favor introduzca un usuario válido.</h2>";
                 echo "<h4>Volver al <a href='../index.php'>formulario</a></h4>";
            }
        }

        //MODIFICAR USUARIO
        public function modificarUsuario($id, $nombre, $apellidos, $dni, $telefono, $correo, $fecna, $direccion){
            $consulta = "UPDATE usuarios SET nombre_usuario = '$nombre', apellidos_usuario = '$apellidos', dni_usuario = '$dni', telefono_usuario = $telefono, correo_usuario = '$correo', fecna_usuario = '$fecna', 
            direccion_usuario = '$direccion' WHERE id_usuario = $id";
            $this->ejecutarConsulta($consulta);
        }

        //BORRAR USUARIO (POSIBLE IMPLEMENTACION, PERO IMPLICARIA ELIMINAR OTROS ELEMENTOS RELACIONADOS CON USUARIO)
        public function borrarUsuario($id){
            $consulta = "DELETE FROM usuarios WHERE id_usuario = $id";
            $this->ejecutarConsulta($consulta);
        }

        /* ----------------------------------------------------------- MASCOTAS --------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/


        //REGISTRAR MASCOTA
        public function registrarMascota($id, $nombre, $tipo, $raza, $sexo, $fecna, $peso){
            $consulta = "SELECT * FROM mascotas WHERE id_cliente = $id AND nombre_mascota = '$nombre' AND tipo_mascota = '$tipo' ";

            if ($this->existeFila($consulta)) {
                 echo "<br/><h2>La mascota ya existe.</h2><br />";
            } else {
                $sql = "INSERT INTO mascotas (id_cliente, nombre_mascota, tipo_mascota, raza_mascota, sexo_mascota, fecna_mascota, peso_mascota)
                VALUES ($id, '$nombre', '$tipo', '$raza', '$sexo', '$fecna', $peso)";

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
            $consulta = "SELECT usuarios.dni_usuario, mascotas.id_mascota, mascotas.id_cliente, mascotas.nombre_mascota, mascotas.tipo_mascota, mascotas.raza_mascota, mascotas.peso_mascota, mascotas.sexo_mascota
            FROM mascotas
            INNER JOIN usuarios
            ON mascotas.id_cliente = usuarios.id_usuario";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //VISUALIZAR MASCOTAS (PAGINACION)
        public function visualizarMascotasPaginacion($inicio, $tamano_pagina){
            $consulta = "SELECT usuarios.dni_usuario, mascotas.id_mascota, mascotas.id_cliente, mascotas.nombre_mascota, mascotas.tipo_mascota, mascotas.raza_mascota, mascotas.peso_mascota, mascotas.sexo_mascota
            FROM mascotas
            INNER JOIN usuarios
            ON mascotas.id_cliente = usuarios.id_usuario LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

         //FILTRAR MASCOTAS FILTRO 
         public function visualizarMascotasFiltrado($nombre, $tipo){
            $consulta = "SELECT usuarios.dni_usuario, mascotas.id_mascota, mascotas.id_cliente, mascotas.nombre_mascota, mascotas.tipo_mascota, mascotas.raza_mascota, mascotas.peso_mascota, mascotas.sexo_mascota
            FROM mascotas
            INNER JOIN usuarios
            ON mascotas.id_cliente = usuarios.id_usuario WHERE  nombre_mascota LIKE '%$nombre%' AND tipo_mascota LIKE '%$tipo%'";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //FILTRAR MASCOTAS FILTRO 
        public function visualizarMascotasFiltradoPaginacion($nombre, $tipo, $inicio, $tamano_pagina){
            $consulta = "SELECT usuarios.dni_usuario, mascotas.id_mascota, mascotas.id_cliente, mascotas.nombre_mascota, mascotas.tipo_mascota, mascotas.raza_mascota, mascotas.peso_mascota, mascotas.sexo_mascota
            FROM mascotas
            INNER JOIN usuarios
            ON mascotas.id_cliente = usuarios.id_usuario WHERE  nombre_mascota LIKE '%$nombre%' AND tipo_mascota LIKE '%$tipo%' LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }


        //VISUALIZAR MASCOTA ID
        public function visualizarMascotaId($id){
            $consulta = "SELECT * FROM mascotas WHERE id_mascota = $id ";
            $mascota = $this->devolverConsultaFila($consulta);
            return $mascota;
        }

        //VISUALIZAR MASCOTAS CLIENTE
        public function visualizarMascotasCliente($id){
            $consulta = "SELECT * FROM mascotas WHERE id_cliente = $id ";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //MODIFICAR MASCOTA
        public function modificarMascota($id, $nombre, $tipo, $raza, $sexo, $fecna, $peso){
            $consulta = "UPDATE mascotas SET nombre_mascota = '$nombre', tipo_mascota = '$tipo', raza_mascota = '$raza', 
            sexo_mascota = '$sexo', fecna_mascota = '$fecna', peso_mascota = $peso WHERE id_mascota = $id";
            $this->ejecutarConsulta($consulta);
        }

        //BORRAR MASCOTAS
        public function borrarMascota($id){
            $consulta = "DELETE FROM mascotas WHERE id_mascota = $id";
            $this->ejecutarConsulta($consulta);
        }

        /* ------------------------------------------------------------- CITAS --------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/


        //REGISTRAR CITAS
        public function anadirCita($fecha, $hora, $consulta, $id_mascota, $id_cliente, $id_veterinario){
            $consulta = "SELECT * FROM citas WHERE fecha_cita = '$fecha' AND hora_cita = '$hora'";

            if ($this->existeFila($consulta)) {
                 echo "<br/><h2>La cita ya existe.</h2><br />";
            } else {
                $sql = "INSERT INTO citas (fecha_cita, hora_cita, estado_cita, num_consulta, id_mascota, id_cliente, id_veterinario)
                VALUES ('$fecha', '$hora', 'Pendiente', $consulta, $id_mascota, $id_cliente, $id_veterinario)";

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
            $consulta = "SELECT usuarios.dni_usuario, id_cita, fecha_cita, hora_cita, estado_cita, num_consulta, id_mascota, id_cliente, id_veterinario 
            FROM citas
            INNER JOIN usuarios
            ON citas.id_cliente = usuarios.id_usuario";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //VISUALIZAR CITAS PAGINACION
        public function visualizarCitasPaginacion($inicio, $tamano_pagina){
            $consulta = "SELECT usuarios.dni_usuario, id_cita, fecha_cita, hora_cita, estado_cita, num_consulta, id_mascota, id_cliente, id_veterinario 
            FROM citas
            INNER JOIN usuarios
            ON citas.id_cliente = usuarios.id_usuario LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //VISUALIZAR CITAS CLIENTE
        public function visualizarCitasCliente($id){
            $consulta = "SELECT * FROM citas WHERE id_cliente = $id ";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //VISUALIZAR CITAS CLIENTE PAGINACION
        public function visualizarCitasClientePaginacion($id, $inicio, $tamano_pagina){
            $consulta = "SELECT * FROM citas WHERE id_cliente = $id LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //VISUALIZAR CITAS MASCOTA
        public function visualizarCitasMascota($id){
            $consulta = "SELECT * FROM citas WHERE id_mascota = $id ";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //VISUALIZAR CITAS VETERINARIO
        public function visualizarCitasVeterinario($id){
            $consulta = "SELECT * FROM citas WHERE id_veterinario = $id ";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //VISUALIZAR CITAS VETERINARIO PAGINACION
        public function visualizarCitasVeterinarioPaginacion($id, $inicio, $tamano_pagina){
            $consulta = "SELECT * FROM citas WHERE id_veterinario = $id LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //VISUALIZAR CITAS DE UNA FECHA Y HORA
        public function visualizarCitasFechaHora($fecha, $hora){
            $consulta = "SELECT * FROM citas WHERE fecha_cita = '$fecha' AND hora_cita = '$hora' AND estado_cita = 'Pendiente'";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //MODIFICAR CITA
        public function modificarCita($id, $fecha, $hora, $consulta){
            $consulta = "UPDATE citas SET fecha_cita = '$fecha', hora_cita = '$hora', num_consulta = $consulta WHERE id_cita = $id";
            $this->ejecutarConsulta($consulta);
        }

        //MODIFICAR ESTADO CITA
        public function modificarEstadoCita($id, $estado){
            $consulta = "UPDATE citas SET estado = '$estado' WHERE id_cita = $id";
            $this->ejecutarConsulta($consulta);
        }

        //BORRAR CITA (OPCIONAL)
        public function borrarCita($id){
            $consulta = "DELETE FROM citas WHERE id_cita = $id";
            $this->ejecutarConsulta($consulta);
        }

        /* ------------------------------------------------------------ PRUEBAS --------------------------------------------------------------*/

        //REGISTRAR PRUEBAS
        public function registrarPrueba($id_tipo, $id_mascota, $resultado, $observaciones, $id_cita){
                $sql = "INSERT INTO pruebas (id_tipo_prueba, id_mascota, resultado_prueba, observaciones_prueba, id_cita)
                VALUES ($id_tipo, $id_mascota, '$resultado', '$observaciones', $id_cita)";

                if ($this->ejecutarConsulta($sql)) {
                     echo "<br/><h2>Prueba registrada correctamente.</h2>";
                } else {
                     echo "<h2>Error al crear la prueba." . $sql . "</h2><br/>";
                     echo "<h5><a href='registroFormulario.php'>Intentelo de nuevo</a></h5>"; 
                }
        }

        //VISUALIZAR PRUEBAS
        public function visualizarPruebas(){
            $consulta = "SELECT tipos_pruebas.nombre_tipo_prueba, tipos_pruebas.precio_tipo_prueba, pruebas.id_prueba, pruebas.resultado_prueba, pruebas.observaciones_prueba
            FROM pruebas
            INNER JOIN tipos_pruebas
            ON pruebas.id_tipo_prueba = tipos_pruebas.id_tipo_prueba";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //VISUALIZAR PRUEBA ID
        public function visualizarPruebaId($id){
            $consulta = "SELECT * FROM pruebas WHERE id_prueba = $id ";
            $prueba = $this->devolverConsultaFila($consulta);
            return $prueba;
        }

        //VISUALIZAR PRUEBAS MASCOTA
        public function visualizarPruebasMascota($id){
            $consulta = "SELECT * FROM pruebas WHERE id_prueba = $id ";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //MODIFICAR PRUEBA
        public function modificarPrueba($id, $resultado, $observaciones){
            $consulta = "UPDATE pruebas SET resultado_prueba = '$resultado', observaciones_prueba = '$observaciones' WHERE id_prueba = $id";
            $this->ejecutarConsulta($consulta);
        }

        //VISUALIZAR PRUEBA PAGINACION
        public function visualizarPruebasPaginacion($inicio, $tamano_pagina){
            $consulta = "SELECT tipos_pruebas.nombre_tipo_prueba, tipos_pruebas.precio_tipo_prueba, pruebas.id_prueba, pruebas.resultado_prueba, pruebas.observaciones_prueba
            FROM pruebas
            INNER JOIN tipos_pruebas
            ON pruebas.id_tipo_prueba = tipos_pruebas.id_tipo_prueba LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

         //FILTRAR PRUEBA FILTRO 
         public function visualizarPruebasFiltrado($nombre){
            $consulta = "SELECT tipos_pruebas.nombre_tipo_prueba, tipos_pruebas.precio_tipo_prueba, pruebas.id_prueba, pruebas.resultado_prueba, pruebas.observaciones_prueba
            FROM pruebas
            INNER JOIN tipos_pruebas
            ON pruebas.id_tipo_prueba = tipos_pruebas.id_tipo_prueba WHERE nombre_tipo_prueba LIKE '%$nombre%'";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //FILTRAR PRUEBA FILTRO 
        public function visualizarPruebasFiltradoPaginacion($nombre, $inicio, $tamano_pagina){
            $consulta = "SELECT tipos_pruebas.nombre_tipo_prueba, tipos_pruebas.precio_tipo_prueba, pruebas.id_prueba, pruebas.resultado_prueba, pruebas.observaciones_prueba
            FROM pruebas
            INNER JOIN tipos_pruebas
            ON pruebas.id_tipo_prueba = tipos_pruebas.id_tipo_prueba WHERE nombre_tipo_prueba LIKE '%$nombre%' LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }



        //BORRAR PRUEBA
        public function borrarPrueba($id){
            $consulta = "DELETE FROM pruebas WHERE id_prueba = $id";
            $this->ejecutarConsulta($consulta);
        }

        /* -------------------------------------------------------- TIPOS DE PRUEBAS -----------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/

        //REGISTRAR TIPOS DE PRUEBAS
        public function registrarTipoPrueba($nombre, $precio){
            $sql = "INSERT INTO tipos_pruebas (nombre_tipo_prueba, precio_tipo_prueba) VALUES ('$nombre', $precio)";

            if ($this->ejecutarConsulta($sql)) {
                 echo "<br/><h2>Tipo de prueba registrada correctamente.</h2>";
            } else {
                 echo "<h2>Error al crear el tipo de prueba ." . $sql . "</h2><br/>";
                 echo "<h5><a href='registroFormulario.php'>Intentelo de nuevo</a></h5>"; 
            }
        }

        //VISUALIZAR TIPOS DE PRUEBAS
        public function visualizarTiposPruebas(){
            $consulta = "SELECT * FROM tipos_pruebas";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }


        //VISUALIZAR TIPOS DE PRUEBAS(paginacion)------------------------------------------
        public function visualizarTipoPruebaPaginacion($inicio, $tamano_pagina){
            $consulta = "SELECT * FROM tipos_pruebas LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

         //FILTRAR T PRUEBAS FILTRO 
         public function visualizarTipoPruebasFiltrado($nombre){
            $consulta = "SELECT * FROM tipos_pruebas WHERE  nombre_tipo_prueba LIKE '%$nombre%'";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //FILTRAR T PRUEBAS FILTRO 
        public function visualizarTipoPruebasFiltradoPaginacion($nombre, $inicio, $tamano_pagina){
            $consulta = "SELECT * FROM tipos_pruebas WHERE  nombre_tipo_prueba LIKE '%$nombre%' LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        //VISUALIZAR PRUEBA ID
        public function visualizarTipoPruebaId($id){
            $consulta = "SELECT * FROM tipos_pruebas WHERE id_tipo_prueba = '$id' ";
            $tipoPrueba = $this->devolverConsultaFila($consulta);
            return $tipoPrueba;
        }

        //MODIFICAR TIPO DE PRUEBA
        public function modificarTipoPrueba($id, $nombre, $precio){
            $consulta = "UPDATE tipos_pruebas SET nombre_tipo_prueba = '$nombre', precio_tipo_prueba = $precio WHERE id_tipo_prueba = $id";
            $this->ejecutarConsulta($consulta);
        }

        //BORRAR TIPO DE PRUEBA
        public function borrarTipoPrueba($id){
            $consulta = "DELETE FROM tipos_pruebas WHERE id_tipo_prueba = $id";
            $this->ejecutarConsulta($consulta);
        }

        /* ----------------------------------------------------------- CONTRATOS --------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        /* ------------------------------------------------------------------------------------------------------------------------------------*/
        
        //REGISTRAR CONTRATO
        public function contratarUsuario($fecini, $fecfin, $sueldo, $diasvac, $horario, $estado, $id_contratado){
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
                id_contratado) VALUES ('$fecini', '$fecfin', $sueldo, $diasvac, '$horario', '$estado', $id_contratado)";
    
                if ($this->ejecutarConsulta($sql)) {
                     echo "<br/><h2>Contrato registrado correctamente.</h2>";
                } else {
                     echo "<h2>Error al crear el contrato." . $sql . "</h2><br/>";
                     echo "<h5><a href='registroFormulario.php'>Intentelo de nuevo</a></h5>"; 
                }
            }
        }

        //VISUALIZAR CONTRATO ID
        public function visualizarContratoId($id){
            $consulta = "SELECT * FROM contratos WHERE id_contratado = $id ";
            $contrato = $this->devolverConsultaFila($consulta);
            return $contrato;
        }

        //MODIFICAR CONTRATO
        public function modificarContrato($id_contratado, $fecini, $fecfin, $sueldo, $diasvac, $horario){
            $consulta = "UPDATE contratos SET fecini_contrato = '$fecini', fecfin_contrato = '$fecfin', sueldo_contrato = $sueldo, 
            diasvac_contrato = $diasvac, horario_contrato = '$horario' WHERE id_contratado = $id_contratado";
            $this->ejecutarConsulta($consulta);
        }

        //RENOVAR CONTRATO
        public function renovarContrato($id_contratado, $fecini, $fecfin, $sueldo, $diasvac, $horario){
            $consulta = "UPDATE contratos SET fecini_contrato = '$fecini', fecfin_contrato = '$fecfin', sueldo_contrato = $sueldo, 
            diasvac_contrato = $diasvac, horario_contrato = '$horario', estado_contrato = 'Activo' WHERE id_contratado = $id_contratado";
            $this->ejecutarConsulta($consulta);
        }

        //FINALIZAR CONTRATO
        public function finalizarContrato($id_contratado){
            $consulta = "UPDATE contratos SET fecfin_contrato = SYSDATE(), estado_contrato = 'Finalizado' WHERE id_contratado = $id_contratado";
            $this->ejecutarConsulta($consulta);
        }

        /* ------------------------------------------------------------- PAGOS --------------------------------------------------------------*/

        public function visualizarPagos(){
            $consulta = "SELECT * FROM pagos";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }

        /* ------------------------------------------------------ CONSULTAS (OPCIONAL) ---------------------------------------------------------*/        


        public function visualizarCitasXfecha($fecha){
            $consulta = "SELECT hora_cita FROM citas WHERE fecha_cita = $fecha";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
    }
?>