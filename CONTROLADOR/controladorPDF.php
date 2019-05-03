<?php
    require_once "BBDD/config.php";
    require_once "BBDD/model.php";
    require_once "FACTURAS/FPDF/fpdf.php";
            
            session_start();
            if (!isset($_SESSION['logeado'])) {
                header("Location: USUARIO/sesionFormulario.php");
            }

            $conexion = new Model (Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

            //Recibir detalles de factura
            $id_factura = $_POST["id_factura"];
            $fecha_factura = $_POST["fecha_factura"];

            //Recibir los datos del cliente y de la mascota
            $nombre_cliente = $_POST["nombre_cliente"];
            $apellidos_cliente = $_POST["apellidos_cliente"];
            $direccion_cliente = $_POST["direccion_cliente"];
            $provincia_cliente = $_POST["provincia_cliente"];
            $codigo_postal_cliente = $_POST["codigo_postal_cliente"];
            $nienif = $_POST["nienif"];
            $mascota = $_POST["nombre_mascota"];

            //Recibir los datos de las pruebas
            $prueba = $_POST["prueba"];
            $precio = $_POST["precio"];
            $cantidad = $_POST["cantidad"];
          
            $pdf = new FPDF();

            //pdf la factura numero 1 de la tipica BBDD de facturacion
            $pdf->AddPage();

            // Logo del veterinario
            $pdf->Image('IMAGENES/logon.png',5,5,-700);

            // Encabezado de la factura
            $pdf->SetFont('Arial','B',14);
            $pdf->Cell(190, 10, "FACTURA DE COMPRA", 0, 2, "C");
            $pdf->SetFont('Arial','B',10);
            $pdf->MultiCell(190,5, "Número de factura: $id_factura"."\n"."Fecha: $fecha_factura", 0, "C", false);
            $pdf->Ln(2);

            // Datos del veterinario
            $pdf->SetFont('Arial','B',12);
            $top_datos=45;
            $pdf->SetXY(40, $top_datos);
            $pdf->Cell(190, 10, "Datos de la tienda:", 0, 2, "J");
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(190, 5,
            "Vital-Pet".\n.
            "Dirección: Calle de Móstoles 70A".\n.
            "Población: Fuenlabrada".\n.
            "Provincia: Madrid".\n.
            "Código Postal: 28942".\n.
            "Teléfono: 910256254 / 605963254".\n.
            "Fax: 910256254 / 605963254",
            0,"J",false);

            // Datos del cliente/mascota
            $pdf->SetFont('Arial','B',12);
            $pdf->SetXY(125, $top_datos);
            $pdf->Cell(190, 10, "Datos del cliente:", 0, 2, "J");
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(190, 5,
            "Nombre: ".$nombre_cliente."\n".
            "Apellidos: ".$apellidos_cliente."\n".
            "Dirección: ".$direccion_cliente."\n".
            "Provincia: ".$provincia_cliente."\n".
            "Código Postal: ".$codigo_postal_cliente."\n".
            "NIE / NIF: ".$nienif."\n".
            "Nombre de la mascota: .$mascota.", 
            0,"J", false);

            $pdf->Ln(10);

                foreach ($_SESSION['cesta']->getArticulos() as $codigo => $cantidad) {
                    $pdf->SetFont('Arial', '', 10);
                    $filtro = $conexion->visualizarProductosCodigo($codigo);
                    $pdf->Cell(100, 6, $filtro["nombre_producto"], 1, 0, 'C');
                    $pdf->Cell(20, 6, $filtro["precio_producto"] . chr(128), 1, 0, 'C');
                    $pdf->Cell(30, 6, $cantidad, 1, 0, 'C');
                    $pdf->Cell(30, 6, $cantidad * $filtro["precio_producto"] . chr(128), 1, 0, 'C');
                    $pdf->Ln(8);
                }

                $pdf->Cell(180, 0, '', 1, 0, '');
                $pdf->Ln(12);
                $pdf->SetFont('Arial', 'B', 16);
                $pdf->Cell(90, 6, 'Total de la Compra: ', 0, 0, 'C');
                $pdf->Cell(90, 6, $_SESSION['cesta']->totalCompra() . chr(128), 0, 0, 'C');

                $numeroFactura = $conexion->maxCodigoPedido() + 1;
                $fichero = "FACTURAS/factura".$numeroFactura.".pdf";

                $pdf->Output($fichero, 'F');

                $conexion->insertarPedido($fichero);

                foreach ($_SESSION['cesta']->getArticulos() as $codigo => $cantidad) {
                    $conexion->actualizarExistencias($codigo, $cantidad);
                }
                
                if ($_SESSION['cesta']->vaciarCesta()) {                    
                    header("Location: envioFactura.php?fichero=$fichero&correo=".$_SESSION['logeado']."&id=$numeroFactura");                    
                } else {
                    echo "Error";
                }
            $conexion->desconectar()
?>
 