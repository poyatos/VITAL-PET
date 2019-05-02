<?php
    require_once "BBDD/config.php";
    require_once "BBDD/model.php";
    require_once "FACTURAS/FPDF/fpdf.php";
            
            session_start();
            if (!isset($_SESSION['logeado'])) {
                header("Location: USUARIO/sesionFormulario.php");
            }

            $conexion = new Model (Config::$host, Config::$user, Config::$pass, Config::$nombreBase);

          
            $pdf = new FPDF();
            //pdf la factura numero 1 de la tipica BBDD de facturacion
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 12);
            // Imprimimos el logo a 300 ppp
            $pdf->Image('IMAGENES/logon.png',5,5,-700);
            //Datos veterinario  
            $pdf->Cell(50, 70, "Datos de nuestra empresa", 0, 0, 'C');
            $pdf->Ln(7);
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(90, 70, "- Direccion: Calle de Mostoles 70, 28942 Fuenlabrada, Madrid", 0, 0, 'C');
            $pdf->Ln(5);
            $pdf->Cell(70, 70, "- Telefonos de interes: 910256254 / 605963254", 0, 0, 'C');
            $pdf->Ln(5);
            $pdf->Cell(80, 70, "- Ponte en contacto en: veterinariovitalpet@gmail.com", 0, 0, 'C');
            $pdf->Ln(10);
            //Datos del cliente y mascota 
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(57, 70, "Datos del cliente y de la mascota", 0, 0, 'C');
            $pdf->Ln(7);
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(35, 70, "- Nombre y apellidos:", 0, 0, 'C');
            $pdf->Ln(5);
            $pdf->Cell(34, 70, "- Correo electronico:", 0, 0, 'C');
            $pdf->Ln(5);
            $pdf->Cell(20, 70, "- NIE / NIF:", 0, 0, 'C');
            $pdf->Ln(5);
            $pdf->Cell(20, 70, "- Mascota:", 0, 0, 'C');
            $pdf->Ln(50);
            $pdf->SetTextColor(0,0,0);
            $pdf->SetFont('Arial', '', 10);              
            $pdf->Cell(100, 6, "PRUEBA", 1, 0, 'C');
            $pdf->Cell(20, 6, "PRECIO", 1, 0, 'C');
            $pdf->Cell(30, 6, "CANTIDAD", 1, 0, 'C');
            $pdf->Cell(30, 6, "TOTAL", 1, 0, 'C');
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
            }
            $conexion->desconectar()
?>
 