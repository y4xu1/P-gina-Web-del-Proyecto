<?php

    include("conexion.php");

    #Identificar cada variable de vinculacion con la pagina y la base de datos.
    #Insertar a la base de datos los datos ingresados en cada campo del formulario.

    if(isset($_POST['sendIndu'])) {
        insertar($conn);
    } 
    else if (isset($_POST['descargar'])) {
        generarPDF($conn);
    }
    else {
        echo "<script>alert('Error')</script>";
    }

    function insertar($conn) {

        $cantAsp = $_POST['totalAsp'];

        for ($x=1; $x<=$cantAsp; $x++) {

            $docAspirante = $_POST[$x."docAspirante"]; //datos de los aspirantes
            $docRecHum = $_POST["docRecHum"];
            $objetivo = $_POST["objetivo"];
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $lugar = $_POST["lugar"];
            $oficinaPrincipal = $_POST["oficinaPrincipal"];
            $responsables = $_POST["responsables"];
            $cargoResponsable = $_POST["cargoResponsable"];
            $tema = $_POST["tema"];
            $numLista = $_POST[$x."numLista"]; //datos de los aspirantes
            $nombresCompletos = $_POST[$x."nombresCompletos"]; //datos de los aspirantes
            $cargoAspirante = $_POST[$x."cargoAspirante"]; //datos de los aspirantes
            $firmaAspirante = $_POST[$x."firmaAspirante"]; //datos de los aspirantes
            $firmaResponsable = $_POST["firmaResponsable"];

            //$consulta = "INSERT INTO formulario_induccion (objetivo, fecha, hora, lugar, oficinaPrincipal, responsables, cargoResponsable, tema, numLista, nombresCompletos, cargoAspirante, docAspirante, docRecHum, firmaAspirante, firmaResponsable, estadoInduccion) VALUES ('objetivo', '', '', 'lugar', 'oficinaPrincipal', 'responsables', 'cargoResponsable', 'tema', '1', 'nombresCompletos', 'cargoAspirante', '34532270', '76308613', '', '', '')";

            $consulta = "INSERT INTO formulario_induccion (objetivo, fecha, hora, lugar, oficinaPrincipal, responsables, cargoResponsable, tema,
            numLista, nombresCompletos, cargoAspirante, docAspirante, docRecHum, firmaAspirante, firmaResponsable, estadoInduccion)
            VALUES ('$objetivo', '$fecha', '$hora', '$lugar', '$oficinaPrincipal', '$responsables', '$cargoResponsable', '$tema',
            '$numLista', '$nombresCompletos', '$cargoAspirante', '$docAspirante', '$docRecHum', '$firmaAspirante', '$firmaResponsable', '1')";

            //mysqli_query($conn, $consulta);

            if (mysqli_query($conn, $consulta) == true) {
                
                echo "<script> alert('El formulario de inducción fue cargado correctamente.'); window.location='../estadoLog/logtrue/recursosHumanos/formularios/induccion.html' </script>";
            }
            else {

                echo "<script> alert('fuck'); window.location='../estadoLog/logtrue/recursosHumanos/formularios/induccion.html' </script>";
            }
        }

        mysqli_close($conn);
    }

    //Función para generar PDF
    function generarPDF($conn) {

        require 'pdfLibreria/fpdf.php';
        $conn = mysqli_connect('localhost', 'root', '', 'trascendental');
    
        //Inicio clase del pdf
        class PDF extends FPDF {
            
            //Cabecera del PDF
            function header() {
                //Logo
                $this->Image('../../Imagenes/otros logos/disserLogo.jpg',15,12,30);
                //Arial bold 12
                $this->SetFont('Arial','B',20);
                //Move to the right
                $this->Cell(50);
                //Title
                $this->Ln(20);
                $this->Cell(0,20, utf8_decode ('FORMATO DE INDUCCIÓN'), 0, 1,'C');
                // Line break
                $this->Ln(2);
            }
    
            function SetStyle($tag, $enable) {
                // Modificar estilo y escoger la fuente correspondiente
                $this->$tag += ($enable ? 1 : -1);
                $style = '';
                foreach(array('B', 'I', 'U') as $s)
                {
                    if($this->$s>0)
                        $style .= $s;
                }
                $this->SetFont('',$style);
            }
            
            //Pie de página
            function Footer() {
                // Position at 1.5 cm from bottom
                $this->SetY(-15);
                // Arial italic 8
                $this->SetFont('Arial','',8);
                // Page number
                $this->Cell(0,10, utf8_decode ('Página ').$this->PageNo(),0,0,'C');
            }
        }
    
        $fecha = $_POST["fecha"];
        /* $hora = $_POST["hora"]; */

        /* $consulta = "SELECT DISTINCT objetivo, fecha, hora, lugar, oficinaPrincipal, tema, responsables, cargoResponsable, docRecHum, firmaResponsable FROM formulario_induccion WHERE fecha = '$fecha' AND hora = '$hora'"; */
        $consulta = "SELECT DISTINCT objetivo, fecha, hora, lugar, oficinaPrincipal, tema, responsables, cargoResponsable, docRecHum, firmaResponsable FROM formulario_induccion WHERE fecha = '$fecha'";
    
        $resul = mysqli_query($conn, $consulta);
    
        //Generar nuevo PDF    
        $pdf = new PDF('L','mm','A3');
        //Definición de márgenes del pdf
        $pdf->SetLeftMargin(30);
        $pdf->SetRightMargin(30);
        //Pronombres de las páginas
        $pdf->AliasNbPages();
        //Agregación de páginas
        $pdf->AddPage();
        //Contenido del PDF
        $pdf->ln(8);
        //Definición de caligrafía, negrilla y tamaño
        $pdf->SetFont('Arial','',12);
            
        while ($row = mysqli_fetch_assoc($resul)){

            $pdf->SetFont('Arial','B',15);
            $pdf->Cell(360,15, utf8_decode ('Objetivo'), 1, 1, 'C');

            $pdf->SetFont('Arial','',15);
            $pdf->Cell(360,40, utf8_decode ($row['objetivo']), 1, 1, 'C');

            $pdf->SetFont('Arial','B',15);
            $pdf->Cell(90,15, utf8_decode ('Fecha'), 1, 0, 'C');
            $pdf->Cell(90,15, utf8_decode ('Hora'), 1, 0, 'C');
            $pdf->Cell(90,15, utf8_decode ('Lugar'), 1, 0, 'C');
            $pdf->Cell(90,15, utf8_decode ('Oficina Principal'), 1, 1, 'C');

            $pdf->SetFont('Arial','',15);
            $pdf->Cell(90,15, utf8_decode ($row['fecha']), 1, 0, 'C');
            $pdf->Cell(90,15, utf8_decode ($row['hora']), 1, 0, 'C');
            $pdf->Cell(90,15, utf8_decode ($row['lugar']), 1, 0, 'C');
            $pdf->Cell(90,15, utf8_decode ($row['oficinaPrincipal']), 1, 1, 'C');

            $pdf->SetFont('Arial','B',15);
            /* $pdf->Cell(120,15, utf8_decode ('Responsable (S)'), 1, 0, 'C'); */
            $pdf->Cell(120,15, utf8_decode ('Responsable'), 1, 0, 'C');
            $pdf->Cell(120,15, utf8_decode ('Cédula'), 1, 0, 'C');
            $pdf->Cell(120,15, utf8_decode ('Cargo'), 1, 1, 'C');

            /* $consulta2 = mysqli_query($conn, "SELECT responsables, docRecHum, cargoResponsable FROM formulario_induccion WHERE fecha = '$fecha' AND hora = '$hora'");

            while ($nResponsable = mysqli_fetch_assoc($consulta2)) {

                $pdf->SetFont('Arial','',15);
                $pdf->Cell(120,15, utf8_decode ($nResponsable['responsables']), 1, 0, 'C');
                $pdf->Cell(120,15, utf8_decode ($nResponsable['docRecHum']), 1, 0, 'C');
                $pdf->Cell(120,15, utf8_decode ($nResponsable['cargoResponsable']), 1, 1, 'C');

            } */

            $pdf->SetFont('Arial','',15);
            $pdf->Cell(120,15, utf8_decode ($row['responsables']), 1, 0, 'C');
            $pdf->Cell(120,15, utf8_decode ($row['docRecHum']), 1, 0, 'C');
            $pdf->Cell(120,15, utf8_decode ($row['cargoResponsable']), 1, 1, 'C');

            $pdf->SetFont('Arial','B',15);
            $pdf->Cell(360,15, utf8_decode ('Tema (S)'), 1, 1, 'C');

            $pdf->SetFont('Arial','',15);
            $pdf->Cell(360,40, utf8_decode ($row['tema']), 1, 1, 'C');

            $pdf->ln(50);

            $pdf->SetFont('Arial','B',15);
            $pdf->Cell(40,15, utf8_decode ('Nº'), 1, 0, 'C');
            $pdf->Cell(85,15, utf8_decode ('Nombre'), 1, 0, 'C');
            $pdf->Cell(55,15, utf8_decode ('Cédula'), 1, 0, 'C');
            $pdf->Cell(85,15, utf8_decode ('Cargo'), 1, 0, 'C');
            $pdf->Cell(95,15, utf8_decode ('Firma'), 1, 1, 'C');

            //$consulta3 = mysqli_query($conn, "SELECT numLista, nombresCompletos, docAspirante, cargoAspirante, firmaAspirante FROM formulario_induccion WHERE fecha = '$fecha' AND hora = '$hora'");
            $consulta3 = mysqli_query($conn, "SELECT numLista, nombresCompletos, docAspirante, cargoAspirante, firmaAspirante FROM formulario_induccion WHERE fecha = '$fecha'");

            while ($nAsp = mysqli_fetch_assoc($consulta3)) {

                $pdf->SetFont('Arial','',15);
                $pdf->Cell(40,50, utf8_decode ($nAsp['numLista']), 1, 0, 'C');
                $pdf->Cell(85,50, utf8_decode ($nAsp['nombresCompletos']), 1, 0, 'C');
                $pdf->Cell(55,50, utf8_decode ($nAsp['docAspirante']), 1, 0, 'C');
                $pdf->Cell(85,50, utf8_decode ($nAsp['cargoAspirante']), 1, 0, 'C');
                $pdf->Cell(95,50, utf8_decode ($nAsp['firmaAspirante']), 1, 1, 'C');

            }

            $pdf->SetFont('Arial','B',15);
            $pdf->Cell(180,50, utf8_decode ('Firma del Responsable de la Capacitación'), 1, 0, 'C');

            $pdf->SetFont('Arial','',15);
            $pdf->Cell(180,50, utf8_decode ($row['firmaResponsable']), 1, 1, 'C');
        }

        $pdf -> Output();
    }
?>