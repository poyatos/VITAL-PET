<?php
            $pdf = new FPDF();

            //pdf la factura numero 1 de la tipica BBDD de facturacion
            $pdf->AddPage();

            // Logo del veterinario
            $pdf->Image('../IMAGENES/logon.png', 5, 5, -700);

            // Encabezado de la factura
            $pdf->SetFont('Arial', 'B', 14);
            $pdf->Cell(190, 10, "FACTURA DE CITA", 0, 2, "C");
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->MultiCell(190, 5, "Número de factura: ".$datos[0]['id_pago']."\n"."Fecha: ".date("d/m/Y", strtotime($datos[0]['fecha_pago'])), 0, "C", false);
            $pdf->Ln(2);

            // Datos del veterinario
            $pdf->SetFont('Arial', 'B', 12);
            $top_datos=45;
            $pdf->SetXY(40, $top_datos);
            $pdf->Cell(190, 10, "Datos del veterinario:", 0, 2, "J");
            $pdf->SetFont('Arial', '', 9);
            $pdf->MultiCell(
                190,
                5,
                "Vital-Pet \n".
            "Dirección: Calle de Móstoles 70A \n".
            "Población: Fuenlabrada \n".
            "Provincia: Madrid \n".
            "Código Postal: 28942 \n".
            "Teléfono: 910256254 / 605963254 \n".
            "Fax: 910256254 / 605963254",
                0,
                "J",
                false
            );

            // Datos del cliente/mascota
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->SetXY(125, $top_datos);
            $pdf->Cell(190, 10, "Datos del cliente:", 0, 2, "J");
            $pdf->SetFont('Arial', '', 9);
            $pdf->MultiCell(
                190,
                5,
                "Nombre: ".$datos[0]['nombre_usuario']."\n".
            "Apellidos: ".$datos[0]['apellidos_usuario']."\n".
            "Dirección: ".$datos[0]['direccion_usuario']."\n".
            "NIE / NIF: ".$datos[0]['dni_usuario']."\n".
            "Nombre de mascota: ".$datos[0]['nombre_mascota']."\n".
            "Tipo de mascota: ".$datos[0]['tipo_mascota']."\n".
            "Raza de mascota: ".$datos[0]['raza_mascota']."\n",
                0,
                "J",
                false
            );

            $pdf->Ln(40);
            
            //Tabla para describir factura
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(100, 6, "PRUEBA", 1, 0, 'C');
            $pdf->Cell(20, 6, "PRECIO", 1, 0, 'C');
            $pdf->Ln(10);

                foreach ($datos as $prueba) {
                    $pdf->SetFont('Arial', '', 10);
                    $pdf->Cell(100, 6, $prueba["nombre_tipo_prueba"], 1, 0, 'C');
                    $pdf->Cell(20, 6, $prueba["precio__tipo_prueba"] . chr(128), 1, 0, 'C');
                    $pdf->Ln(8);
                }

                $pdf->Cell(180, 0, '', 1, 0, '');
                $pdf->Ln(12);
                $pdf->SetFont('Arial', 'B', 16);
                $pdf->Cell(90, 6, 'Total: ', 0, 0, 'C');
                $pdf->Cell(90, 6, $datos[0]['total_pago'] . chr(128), 0, 0, 'C');

                $fichero = "../FACTURAS/PAGOS/factura".$datos[0]['id_pago'].".pdf";

                $pdf->Output($fichero, 'F');
?>
 