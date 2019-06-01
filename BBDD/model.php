<?php
    class Model {
        private $conexion;
        /*********************
        ****<CONSTRUCTOR>*****
        **********************/
        function __construct ($host, $user, $pass, $nombreBase){
            $this->conexion = new mysqli($host, $user, $pass);
                if($this->conexion->connect_error){
                    die("Error de conexion (".$this->conexion->connection_errno.") ".$this->conexion->connection_error);
                }
                if(!($this->conexion->select_db($nombreBase))){
                    echo  "No se ha podido conectar";
                }
                $this->conexion->set_charset("utf8");
        }
        /*********************
        ****<CERRAR SESIÓN>*****
        **********************/
        public function desconectar(){
            $this->conexion->close();
        }            
        /****************************
        ****<EJECUTAR CONSULTAS>*****
        *****************************/
        public function ejecutarConsulta($consulta){
            $resultado = null;
            if(isset($this->conexion)){
                $resultado = $this->conexion->stmt_init();
                $resultado->prepare($consulta);
                $resultado->execute();
            }
            return $resultado;
        }
        /*************************************
        ****<DEVOLVER CONSULTAS EN ARRAY>*****
        **************************************/
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
        /****************************************
        ****<DEVOLVER CONSULTAS EN UNA FILA>*****
        *****************************************/
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
        /****************************************
        ****<? EXISTE FILA EN UNA TABLA>*****
        *****************************************/
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


        /********************************
        ************<-USUARIOS->*********
        *********************************/

        /***************************
        ****<R USUARIO>*****
        ****************************/
        public function registrarUsuario($nombre, $apellidos, $dni, $telefono, $correo, $fecna, $direccion, $rol, $pass){
            $consulta = "SELECT * FROM usuarios WHERE dni_usuario = '$dni' ";
            if ($this->existeFila($consulta)) {
                $_SESSION['exito'] = false;
                $_SESSION['mensaje'] = '<h2>El DNI introducido ya existe. Por favor introduce un DNI valido.</h2>';
                $_SESSION['url'] = '../DIRECTOR/vistaContratar.php';
                header('Location: ../VISTA/COMUN/vistaAviso.php');
            } else {
                $passHash = password_hash($pass, PASSWORD_BCRYPT);
                $sql = "INSERT INTO usuarios (nombre_usuario, apellidos_usuario, dni_usuario, telefono_usuario, correo_usuario, fecna_usuario, 
                direccion_usuario, rol_usuario, pass_usuario) VALUES ('$nombre', '$apellidos', '$dni', $telefono, '$correo', '$fecna', 
                '$direccion', '$rol', '$passHash')";
                return $this->ejecutarConsulta($sql);
            }
        }
        /***************************
        ****<V USUARIO DNI>*****
        ****************************/
        public function visualizarUsuarioDni($dni){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario, telefono_usuario, correo_usuario, fecna_usuario, 
            direccion_usuario, rol_usuario FROM usuarios WHERE dni_usuario = '$dni' ";
            $usuario = $this->devolverConsultaFila($consulta);
            return $usuario;
        }
        /***************************
        ****<V USUARIO ID>*****
        ****************************/
        public function visualizarUsuarioId($id){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario, telefono_usuario, correo_usuario, fecna_usuario, 
            direccion_usuario, rol_usuario FROM usuarios WHERE id_usuario = $id ";
            $usuario = $this->devolverConsultaFila($consulta);
            return $usuario;
        }
        /***************************
        ****<F CLIENTES>*****
        ****************************/
        public function filtrarClientes($nombre, $dni){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario, telefono_usuario, correo_usuario, direccion_usuario 
            FROM usuarios WHERE rol_usuario LIKE 'Cliente' AND nombre_usuario LIKE '%$nombre%' AND dni_usuario LIKE '%$dni%'";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<FP CLIENTES>*****
        ****************************/ 
        public function filtrarClientesPaginacion($nombre, $dni, $inicio, $tamano_pagina){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario, telefono_usuario, correo_usuario, direccion_usuario 
            FROM usuarios WHERE rol_usuario LIKE 'Cliente' AND nombre_usuario LIKE '%$nombre%' AND dni_usuario LIKE '%$dni%'LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<F EMPLEADOS>*****
        ****************************/
        public function filtrarEmpleados($nombre, $dni){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario, telefono_usuario, correo_usuario, fecna_usuario, 
            direccion_usuario, rol_usuario FROM usuarios WHERE rol_usuario IN ('Veterinario','Recepcionista') AND nombre_usuario LIKE '%$nombre%' 
            AND dni_usuario LIKE '%$dni%'";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<FP EMPLEADOS>*****
        ****************************/
        public function filtrarEmpleadosPaginacion($nombre, $dni, $inicio, $tamano_pagina){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario, telefono_usuario, correo_usuario, fecna_usuario, 
            direccion_usuario, rol_usuario FROM usuarios WHERE rol_usuario IN ('Veterinario','Recepcionista') AND nombre_usuario LIKE '%$nombre%' 
            AND dni_usuario LIKE '%$dni%'LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<V VETERINARIOS>*****
        ****************************/
        public function visualizarVeterinarios(){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario FROM usuarios WHERE rol_usuario LIKE 'Veterinario'";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<V VETERINARIOS DISPONIBLES>*****
        ****************************/
        public function visualizarVeterinariosDisponibles($fecha, $hora){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, dni_usuario FROM usuarios U
            JOIN contratos C
            ON U.id_usuario = C.id_contratado
            WHERE estado_contrato LIKE 'Activo' AND rol_usuario LIKE 'Veterinario' AND id_usuario NOT IN (SELECT id_veterinario FROM citas WHERE fecha_cita = '$fecha' AND hora_cita = '$hora' AND estado_cita = 'Pendiente')";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<IS USUARIO>*****
        ****************************/
        public function iniciarSesionUsuario($dni,$pass){
            $consulta = "SELECT id_usuario, nombre_usuario, apellidos_usuario, pass_usuario, rol_usuario FROM usuarios WHERE dni_usuario = '$dni' ";
            $resultadoConsulta = $this->ejecutarConsulta($consulta);
            if($resultadoConsulta){
                $resultado = $resultadoConsulta->get_result();
            }
            $existeUsuario = mysqli_num_rows($resultado);
            $columnas = $resultado->fetch_array();
            $accesoPermitido = false;
            if ($existeUsuario == 1) {
                if($columnas['rol_usuario'] == 'Veterinario' || $columnas['rol_usuario'] == 'Recepcionista'){
                    $contrato = $this->visualizarContratoId($columnas['id_usuario']);
                    if($contrato['estado_contrato'] == 'Activo'){
                        $accesoPermitido = true;
                    }
                } else {
                    $accesoPermitido = true;
                }

                if ($accesoPermitido){
                    if (password_verify($pass, $columnas['pass_usuario'])) {
                        $_SESSION['id_usuario'] = $columnas['id_usuario'];
                        $_SESSION['usuario'] = $columnas['nombre_usuario']." ".$columnas['apellidos_usuario'];
                        $_SESSION['rol'] = $columnas['rol_usuario'];
                        $rol = strtoupper($columnas['rol_usuario']);
                        header("Location: ../VISTA/$rol");
                    } else {
                        $_SESSION['exito'] = false;
                        $_SESSION['mensaje'] = '<h2>Usuario/contraseña incorrecta.</h2>';
                        $_SESSION['url'] = '../../index.php';
                        header('Location: ../VISTA/COMUN/vistaAviso.php');
                    }
                } else {
                        $_SESSION['exito'] = false;
                        $_SESSION['mensaje'] = '<h2>Permiso denegado. No tienes acceso a la aplicación.</h2>';
                        $_SESSION['url'] = '../../index.php';
                        header('Location: ../VISTA/COMUN/vistaAviso.php');
                }
            } else {
                $_SESSION['exito'] = false;
                $_SESSION['mensaje'] = '<h2>Usuario/contraseña incorrecta.</h2>';
                $_SESSION['url'] = '../../index.php';
                header('Location: ../VISTA/COMUN/vistaAviso.php');
            }
        }
        /***************************
        ****<M USUARIO>*****
        ****************************/
        public function modificarUsuario($id, $nombre, $apellidos, $dni, $telefono, $correo, $fecna, $direccion){
            $consulta = "SELECT * FROM usuarios WHERE dni_usuario = '$dni' AND id_usuario <> $id";
            if ($this->existeFila($consulta)) {
                $_SESSION['exito'] = false;
                $_SESSION['mensaje'] = '<h2>El DNI introducido ya existe. Por favor introduce un DNI valido.</h2>';
                $_SESSION['url'] = '../DIRECTOR/vistaContratar.php';
                header('Location: ../VISTA/COMUN/vistaAviso.php');
            } else {
                $consulta = "UPDATE usuarios SET nombre_usuario = '$nombre', apellidos_usuario = '$apellidos', dni_usuario = '$dni', telefono_usuario = $telefono, correo_usuario = '$correo', fecna_usuario = '$fecna', 
                direccion_usuario = '$direccion' WHERE id_usuario = $id";
                return $this->ejecutarConsulta($consulta);
            }   
        }

        /***************************
        ****<M PASS USUARIO>*****
        ****************************/
        public function modificarPass($id, $pass){
            $passHash = password_hash($pass, PASSWORD_BCRYPT);
            $consulta = "UPDATE usuarios SET pass_usuario = '$passHash' WHERE id_usuario = $id";
            return $this->ejecutarConsulta($consulta);
        }

        /***************************************
        ****************<-MASCOTAS->************
        ****************************************/

        /***************************
        ****<R MASCOTAS>*****
        ****************************/
        public function registrarMascota($id, $nombre, $tipo, $raza, $sexo, $fecna, $peso){
            $sql = "INSERT INTO mascotas (id_cliente, nombre_mascota, tipo_mascota, raza_mascota, sexo_mascota, fecna_mascota, peso_mascota)
            VALUES ($id, '$nombre', '$tipo', '$raza', '$sexo', '$fecna', $peso)";
            return $this->ejecutarConsulta($sql);      
        }
        /***************************
        ****<V MASCOTAS CLIENTES>*******
        ****************************/
        public function visualizarMascotasClientes($id){
            $consulta = "SELECT usuarios.id_usuario, usuarios.nombre_usuario, usuarios.apellidos_usuario, usuarios.dni_usuario, usuarios.telefono_usuario,
            usuarios.correo_usuario, usuarios.fecna_usuario, usuarios.direccion_usuario, mascotas.nombre_mascota, mascotas.tipo_mascota,
            mascotas.raza_mascota, mascotas.peso_mascota, mascotas.sexo_mascota, mascotas.fecna_mascota, mascotas.peso_mascota
            FROM mascotas
            INNER JOIN usuarios
            ON mascotas.id_cliente = usuarios.id_usuario
            WHERE usuarios.id_usuario = $id";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<F MASCOTAS>*******
        ****************************/
         public function visualizarMascotasFiltrado($nombre, $tipo){
            $consulta = "SELECT usuarios.dni_usuario, mascotas.id_mascota, mascotas.id_cliente, mascotas.nombre_mascota, mascotas.tipo_mascota, mascotas.raza_mascota, mascotas.peso_mascota, mascotas.sexo_mascota
            FROM mascotas
            INNER JOIN usuarios
            ON mascotas.id_cliente = usuarios.id_usuario WHERE  nombre_mascota LIKE '%$nombre%' AND tipo_mascota LIKE '%$tipo%'";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<FP MASCOTAS>*******
        ****************************/
        public function visualizarMascotasFiltradoPaginacion($nombre, $tipo, $inicio, $tamano_pagina){
            $consulta = "SELECT usuarios.dni_usuario, mascotas.id_mascota, mascotas.id_cliente, mascotas.nombre_mascota, mascotas.tipo_mascota, mascotas.raza_mascota, mascotas.peso_mascota, mascotas.sexo_mascota
            FROM mascotas
            INNER JOIN usuarios
            ON mascotas.id_cliente = usuarios.id_usuario WHERE  nombre_mascota LIKE '%$nombre%' AND tipo_mascota LIKE '%$tipo%' LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<V MASCOTAS ID>*******
        ****************************/
        public function visualizarMascotaId($id){
            $consulta = "SELECT * FROM mascotas WHERE id_mascota = $id ";
            $mascota = $this->devolverConsultaFila($consulta);
            return $mascota;
        }
        /***************************
        ****<M MASCOTAS>*******
        ****************************/
        public function modificarMascota($id, $nombre, $tipo, $raza, $sexo, $fecna, $peso){
            $consulta = "UPDATE mascotas SET nombre_mascota = '$nombre', tipo_mascota = '$tipo', raza_mascota = '$raza', 
            sexo_mascota = '$sexo', fecna_mascota = '$fecna', peso_mascota = $peso WHERE id_mascota = $id";
            return $this->ejecutarConsulta($consulta);
        }

        /******************************
        ***************<-CITAS->*******
        ********************************/

        /***************************
        ****<R CITAS>*******
        ****************************/
        public function anadirCita($fecha, $hora, $consulta, $id_mascota, $id_cliente, $id_veterinario){
            $sql = "INSERT INTO citas (fecha_cita, hora_cita, estado_cita, num_consulta, id_mascota, id_cliente, id_veterinario)
                VALUES ('$fecha', '$hora', 'Pendiente', $consulta, $id_mascota, $id_cliente, $id_veterinario)";
            return $this->ejecutarConsulta($sql);
        }
        /***************************
        ****<V CITAS ID>***************
        ****************************/
        public function visualizarCitaId($id){
            $consulta = "SELECT * FROM citas WHERE id_cita = $id";
            $resultado = $this->devolverConsultaFila($consulta);
            return $resultado;
        }
        /***************************
        ****<F CITAS>*******
        ****************************/
        public function visualizarCitasFiltrado($fecha, $dni, $estado){
            $consulta = "SELECT U.dni_usuario, C.id_cita, C.fecha_cita, C.hora_cita, C.estado_cita, C.num_consulta, M.id_mascota, M.nombre_mascota, C.id_cliente, C.id_veterinario 
            FROM citas C
            JOIN usuarios U ON C.id_cliente = U.id_usuario
            JOIN mascotas M ON C.id_mascota = M.id_mascota 
            WHERE  fecha_cita LIKE '%$fecha%' AND dni_usuario LIKE '%$dni%' AND estado_cita LIKE '%$estado%'";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<FP CITAS>*******
        ****************************/ 
        public function visualizarCitasFiltradoPaginacion($fecha, $dni, $estado, $inicio, $tamano_pagina){
            $consulta = "SELECT U.dni_usuario, C.id_cita, C.fecha_cita, C.hora_cita, C.estado_cita, C.num_consulta, M.id_mascota, M.nombre_mascota, C.id_cliente, C.id_veterinario 
            FROM citas C
            JOIN usuarios U ON C.id_cliente = U.id_usuario
            JOIN mascotas M ON C.id_mascota = M.id_mascota 
            WHERE  fecha_cita LIKE '%$fecha%' AND dni_usuario LIKE '%$dni%' AND estado_cita LIKE '%$estado%' LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<V CITAS CLIENTE>*******
        ****************************/
        public function visualizarCitasCliente($id){
            $consulta = "SELECT U.dni_usuario, C.id_cita, C.fecha_cita, C.hora_cita, C.estado_cita, C.num_consulta, M.id_mascota, M.nombre_mascota, C.id_cliente, C.id_veterinario 
            FROM citas C
            JOIN usuarios U ON C.id_cliente = U.id_usuario
            JOIN mascotas M ON C.id_mascota = M.id_mascota 
            WHERE estado_cita LIKE 'Pendiente' AND C.id_cliente = $id ";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<VP CITAS CLIENTE>*******
        ****************************/
        public function visualizarCitasClientePaginacion($id, $inicio, $tamano_pagina){
            $consulta = "SELECT U.dni_usuario, C.id_cita, C.fecha_cita, C.hora_cita, C.estado_cita, C.num_consulta, M.id_mascota, M.nombre_mascota, C.id_cliente, C.id_veterinario 
            FROM citas C
            JOIN usuarios U ON C.id_cliente = U.id_usuario
            JOIN mascotas M ON C.id_mascota = M.id_mascota 
            WHERE estado_cita LIKE 'Pendiente' AND C.id_cliente = $id LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<V CITAS PRUEBAS>***
        ****************************/
        public function visualizarCitasPruebas($id){
            $consulta = "SELECT P.resultado_prueba, P.observaciones_prueba, C.fecha_cita, C.hora_cita, C.num_consulta, 
            C.id_mascota, C.id_cliente, C.id_veterinario, T.nombre_tipo_prueba, T.precio_tipo_prueba
            FROM citas C
            JOIN pruebas P ON C.id_cita = P.id_cita
            JOIN tipos_pruebas T ON P.id_tipo_prueba = T.id_tipo_prueba
            WHERE C.id_cita = $id";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
         }
        /***************************
        ****<V CITAS FECHAYHORA>*****
        ****************************/
        public function visualizarCitasFechaHora($fecha, $hora){
            $consulta = "SELECT * FROM citas WHERE fecha_cita = '$fecha' AND hora_cita = '$hora' AND estado_cita = 'Pendiente'";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<F CITAS VETERINARIO>***
        ****************************/
         public function visualizarCitasVeterinarioFiltrado($id, $fecha, $dni, $estado){
            $consulta = "SELECT U.dni_usuario, C.id_cita, C.fecha_cita, C.hora_cita, C.estado_cita, C.num_consulta, M.id_mascota, M.nombre_mascota, C.id_cliente, C.id_veterinario 
            FROM citas C
            JOIN usuarios U ON C.id_cliente = U.id_usuario
            JOIN mascotas M ON C.id_mascota = M.id_mascota 
            WHERE id_veterinario = $id AND fecha_cita LIKE '%$fecha%' AND dni_usuario LIKE '%$dni%' AND estado_cita LIKE '%$estado%'";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<VP CITAS VETERINARIO>***
        ****************************/
        public function visualizarCitasVeterinarioFiltradoPaginacion($id, $fecha, $dni, $estado, $inicio, $tamano_pagina){
            $consulta = "SELECT U.dni_usuario, C.id_cita, C.fecha_cita, C.hora_cita, C.estado_cita, C.num_consulta, M.id_mascota, M.nombre_mascota, C.id_cliente, C.id_veterinario 
            FROM citas C
            JOIN usuarios U ON C.id_cliente = U.id_usuario
            JOIN mascotas M ON C.id_mascota = M.id_mascota 
            WHERE id_veterinario = $id AND fecha_cita LIKE '%$fecha%' 
            AND dni_usuario LIKE '%$dni%' AND estado_cita LIKE '%$estado%' LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<FIN CITAS>*************
        ****************************/
        public function finalizarCita($id){
            $consulta = "UPDATE citas SET estado_cita = 'Finalizado' WHERE id_cita = $id";
            return $this->ejecutarConsulta($consulta);
        }
        /***************************
        ****<M CITAS>***************
        ****************************/
        public function modificarCita($id, $fecha, $hora, $consulta){
            $consulta = "UPDATE citas SET fecha_cita = '$fecha', hora_cita = '$hora', num_consulta = $consulta WHERE id_cita = $id";
            return $this->ejecutarConsulta($consulta);
        }
        /***************************
        ****<B CITAS>***************
        ****************************/
        public function borrarCita($id){
            $consulta = "DELETE FROM citas WHERE id_cita = $id";
            return $this->ejecutarConsulta($consulta);
        }


        /***************************
        ****<-PRUEBAS->*************
        ****************************/

        /***************************
        ****<R PRUEBAS>*************
        ****************************/
        public function registrarPrueba($id_tipo, $id_mascota, $resultado, $observaciones, $id_cita){
                $sql = "INSERT INTO pruebas (id_tipo_prueba, id_mascota, resultado_prueba, observaciones_prueba, id_cita)
                VALUES ($id_tipo, $id_mascota, '$resultado', '$observaciones', $id_cita)";

                return $this->ejecutarConsulta($sql);
        }
        /***************************
        ****<R PRUEBAS ID>**********
        ****************************/
        public function visualizarPruebaId($id){
            $consulta = "SELECT * FROM pruebas WHERE id_prueba = $id ";
            $prueba = $this->devolverConsultaFila($consulta);
            return $prueba;
        }
        /***************************
        ****<M PRUEBAS>*************
        ****************************/
        public function modificarPrueba($id, $resultado, $observaciones){
            $consulta = "UPDATE pruebas SET resultado_prueba = '$resultado', observaciones_prueba = '$observaciones' WHERE id_prueba = $id";
            return $this->ejecutarConsulta($consulta);
        }
        /***************************
        ****<F PRUEBAS>*************
        ****************************/ 
         public function visualizarPruebasFiltrado($nombre){
            $consulta = "SELECT T.nombre_tipo_prueba, T.precio_tipo_prueba, P.id_prueba, P.resultado_prueba, P.observaciones_prueba, C.fecha_cita, M.nombre_mascota, U.dni_usuario
            FROM pruebas P
            JOIN tipos_pruebas T ON P.id_tipo_prueba = T.id_tipo_prueba
            JOIN citas C ON P.id_cita = C.id_cita
            JOIN mascotas M ON P.id_mascota = M.id_mascota
            JOIN usuarios U ON M.id_cliente = U.id_usuario
            WHERE nombre_tipo_prueba LIKE '%$nombre%'";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<FP PRUEBAS>************
        ****************************/
        public function visualizarPruebasFiltradoPaginacion($nombre, $inicio, $tamano_pagina){
            $consulta = "SELECT T.nombre_tipo_prueba, T.precio_tipo_prueba, P.id_prueba, P.resultado_prueba, P.observaciones_prueba, C.fecha_cita, M.nombre_mascota, U.dni_usuario
            FROM pruebas P
            JOIN tipos_pruebas T ON P.id_tipo_prueba = T.id_tipo_prueba
            JOIN citas C ON P.id_cita = C.id_cita
            JOIN mascotas M ON P.id_mascota = M.id_mascota
            JOIN usuarios U ON M.id_cliente = U.id_usuario
            WHERE nombre_tipo_prueba LIKE '%$nombre%' LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<F PRUEBAS CLIENTE>*************
        ****************************/ 
        public function visualizarPruebasFiltradoCliente($id, $nombre){
            $consulta = "SELECT T.nombre_tipo_prueba, T.precio_tipo_prueba, P.id_prueba, P.resultado_prueba, P.observaciones_prueba, C.fecha_cita, M.nombre_mascota, U.dni_usuario
            FROM pruebas P
            JOIN tipos_pruebas T ON P.id_tipo_prueba = T.id_tipo_prueba
            JOIN citas C ON P.id_cita = C.id_cita
            JOIN mascotas M ON P.id_mascota = M.id_mascota
            JOIN usuarios U ON M.id_cliente = U.id_usuario
            WHERE T.nombre_tipo_prueba LIKE '%$nombre%' AND U.id_usuario = $id";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<FP PRUEBAS CLIENTE>************
        ****************************/
        public function visualizarPruebasFiltradoPaginacionCliente($id, $nombre, $inicio, $tamano_pagina){
            $consulta = "SELECT T.nombre_tipo_prueba, T.precio_tipo_prueba, P.id_prueba, P.resultado_prueba, P.observaciones_prueba, C.fecha_cita, M.nombre_mascota, U.dni_usuario
            FROM pruebas P
            JOIN tipos_pruebas T ON P.id_tipo_prueba = T.id_tipo_prueba
            JOIN citas C ON P.id_cita = C.id_cita
            JOIN mascotas M ON P.id_mascota = M.id_mascota
            JOIN usuarios U ON M.id_cliente = U.id_usuario
            WHERE nombre_tipo_prueba LIKE '%$nombre%' AND U.id_usuario = $id LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        
        /***************************
        ****<B PRUEBAS>*************
        ****************************/
        public function borrarPrueba($id){
            $consulta = "DELETE FROM pruebas WHERE id_prueba = $id";
            return $this->ejecutarConsulta($consulta);
        }


       /***************************
        ****<-TIPOSPRUEBAS->*******
        ****************************/

        /***************************
        ****<R TIPOSPRUEBAS>*******
        ****************************/
        public function registrarTipoPrueba($nombre, $precio){
            $sql = "INSERT INTO tipos_pruebas (nombre_tipo_prueba, precio_tipo_prueba) VALUES ('$nombre', $precio)";
            return $this->ejecutarConsulta($sql);
        }
        /***************************
        ****<V TIPOSPRUEBAS>*******
        ****************************/
        public function visualizarTiposPruebas(){
            $consulta = "SELECT * FROM tipos_pruebas";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
         /***************************
        ****<F TIPOSPRUEBAS>*******
        ****************************/
         public function visualizarTipoPruebasFiltrado($nombre){
            $consulta = "SELECT * FROM tipos_pruebas WHERE  nombre_tipo_prueba LIKE '%$nombre%'";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<FP TIPOSPRUEBAS>*******
        ****************************/
        public function visualizarTipoPruebasFiltradoPaginacion($nombre, $inicio, $tamano_pagina){
            $consulta = "SELECT * FROM tipos_pruebas WHERE  nombre_tipo_prueba LIKE '%$nombre%' LIMIT ".$inicio."," . $tamano_pagina;
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<V TIPOSPRUEBAS ID>*******
        ****************************/
        public function visualizarTipoPruebaId($id){
            $consulta = "SELECT * FROM tipos_pruebas WHERE id_tipo_prueba = '$id' ";
            $tipoPrueba = $this->devolverConsultaFila($consulta);
            return $tipoPrueba;
        }
        /***************************
        ****<M TIPOSPRUEBAS>*******
        ****************************/
        public function modificarTipoPrueba($id, $nombre, $precio){
            $consulta = "UPDATE tipos_pruebas SET nombre_tipo_prueba = '$nombre', precio_tipo_prueba = $precio WHERE id_tipo_prueba = $id";
            return $this->ejecutarConsulta($consulta);
        }


        /**************************************
        *******************<-CONTRATOS->*******
        ***************************************/

        /***************************
        ****<R CONTRATOS>*******
        ****************************/
        public function contratarUsuario($fecini, $fecfin, $sueldo, $diasvac, $horario, $estado, $id_contratado){
                $sql = "INSERT INTO contratos (fecini_contrato, fecfin_contrato, sueldo_contrato, diasvac_contrato, horario_contrato, estado_contrato, 
                id_contratado) VALUES ('$fecini', '$fecfin', $sueldo, $diasvac, '$horario', '$estado', $id_contratado)";
                return $this->ejecutarConsulta($sql);
        }
        /***************************
        ****<V CONTRATOS ID>*******
        ****************************/
        public function visualizarContratoId($id){
            $consulta = "SELECT * FROM contratos WHERE id_contratado = $id";
            $contrato = $this->devolverConsultaFila($consulta);
            return $contrato;
        }
        /***************************
        ****<M CONTRATOS>*******
        ****************************/
        public function modificarContrato($id_contratado, $fecini, $fecfin, $sueldo, $diasvac, $horario){
            $consulta = "UPDATE contratos SET fecini_contrato = '$fecini', fecfin_contrato = '$fecfin', sueldo_contrato = $sueldo, 
            diasvac_contrato = $diasvac, horario_contrato = '$horario' WHERE id_contratado = $id_contratado";
            return $this->ejecutarConsulta($consulta);
        }
        /***************************
        ****<REN CONTRATOS>*******
        ****************************/
        public function renovarContrato($id_contratado, $fecini, $fecfin, $sueldo, $diasvac, $horario){
            $consulta = "UPDATE contratos SET fecini_contrato = '$fecini', fecfin_contrato = '$fecfin', sueldo_contrato = $sueldo, 
            diasvac_contrato = $diasvac, horario_contrato = '$horario', estado_contrato = 'Activo' WHERE id_contratado = $id_contratado";
            return $this->ejecutarConsulta($consulta);
        }
        /***************************
        ****<FIN CONTRATOS>*******
        ****************************/
        public function finalizarContrato($id_contratado){
            $consulta = "UPDATE contratos SET fecfin_contrato = SYSDATE(), estado_contrato = 'Finalizado' WHERE id_contratado = $id_contratado";
            return $this->ejecutarConsulta($consulta);
        }
         /***************************
        ****<V CONTRATOS TRABAJADORES>*******
        ****************************/
         public function visualizarContratoClientes($id){
            $consulta = "SELECT usuarios.nombre_usuario, usuarios.apellidos_usuario, usuarios.dni_usuario, usuarios.telefono_usuario, usuarios.correo_usuario, usuarios.fecna_usuario, usuarios.direccion_usuario,  usuarios.rol_usuario,
             contratos.fecini_contrato, contratos.fecfin_contrato, contratos.sueldo_contrato, contratos.diasvac_contrato, contratos.horario_contrato, contratos.estado_contrato
            FROM contratos
            INNER JOIN usuarios
            ON contratos.id_contratado = usuarios.id_usuario
            WHERE contratos.id_contratado = $id";
            $resultado = $this->devolverConsultaFila($consulta);
            return $resultado;
         }


        /******************************************
        *******************<-PAGOS->***************
        *******************************************/

        /***************************
        ****<I PAGOS>***************
        ****************************/
        public function insertarPago($id_cliente, $total, $fecha, $id_cita){
            $consulta = "INSERT INTO pagos (id_cliente, total_precio, fecha_pago, id_cita) VALUES ($id_cliente, $total, '$fecha', $id_cita)";
            return $this->ejecutarConsulta($consulta);
        }
        /***************************
        ****<V PAGO DATOS>***************
        ****************************/
        public function visualizarDatosPago($id_cita){
            $consulta = "SELECT PA.id_pago, PA.fecha_pago, PA.total_precio, C.fecha_cita, U.id_usuario, U.nombre_usuario, U.apellidos_usuario, U.dni_usuario, U.telefono_usuario, U.correo_usuario, U.direccion_usuario, M.nombre_mascota, M.tipo_mascota, M.raza_mascota, T.nombre_tipo_prueba, T.precio_tipo_prueba
            FROM pagos PA
            JOIN citas C ON PA.id_cita = C.id_cita
            JOIN usuarios U ON C.id_cliente = U.id_usuario
            JOIN mascotas M ON C.id_mascota = M.id_mascota
            JOIN pruebas PR ON C.id_cita = PR.id_cita
            JOIN tipos_pruebas T ON PR.id_tipo_prueba = T.id_tipo_prueba
            WHERE PA.id_cita = $id_cita";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
        /***************************
        ****<V FACTURA>*************
        ****************************/
        public function visualizarDatosFactura($id_cita){
            $consulta = "SELECT C.fecha_cita, U.id_usuario, U.nombre_usuario, U.apellidos_usuario, U.dni_usuario, U.telefono_usuario, U.correo_usuario, U.direccion_usuario, M.nombre_mascota, M.tipo_mascota, M.raza_mascota, T.nombre_tipo_prueba, T.precio_tipo_prueba
            FROM citas C
            JOIN usuarios U ON C.id_cliente = U.id_usuario
            JOIN mascotas M ON C.id_mascota = M.id_mascota
            JOIN pruebas P ON C.id_cita = P.id_cita
            JOIN tipos_pruebas T ON P.id_tipo_prueba = T.id_tipo_prueba
            WHERE C.id_cita = $id_cita";
            $resultado = $this->devolverConsultaArray($consulta);
            return $resultado;
        }
    }
?>