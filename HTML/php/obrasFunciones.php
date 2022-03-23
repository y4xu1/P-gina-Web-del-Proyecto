<?php

include ('conexion.php');
require_once 'pdfLibreria/fpdf.php';

if (isset($_POST['descargar'])) {
    dPDF($conn);
}

//Función para generar PDF
function dPDF($conn) {

    require_once 'pdfLibreria/fpdf.php';
    $conn = mysqli_connect('localhost', 'root', '', 'trascendental');

    //Consulta
    $dato = $_POST['nombre_Obra'];
    $dato2 = $_POST['ciudad_Obra'];
    $date1 = $_POST['1fecha'];
    $date2 = $_POST['2fecha'];

    $consulta = "SELECT contrato.nombreObra, contrato.ciudadObra, contrato.fechaInicio, aspirante.docAspirante,
    aspirante.PnombreAspirante, aspirante.SnombreAspirante, aspirante.PapellidoAspirante,
    aspirante.SapellidoAspirante, contrato.tipoCargoDesp, aspirante.eps, aspirante.arl FROM contrato INNER JOIN aspirante
    ON contrato.docAspirante = aspirante.docAspirante WHERE contrato.nombreObra = '$dato' AND contrato.ciudadObra = '$dato2'
    AND contrato.fechaInicio BETWEEN '$date1' AND '$date2' ORDER BY fechaInicio";

    $resul = mysqli_query($conn, $consulta);

    //Inicio clase del pdf
    class PDF extends FPDF {
        
        //Cabecera del PDF
        function header() {

            $dato = $_POST['nombre_Obra'];
            $dato2 = $_POST['ciudad_Obra'];
            $date1 = $_POST['1fecha'];
            $date2 = $_POST['2fecha'];

            // Logo
            $this->Image('../../Imagenes/otros logos/disserLogo.jpg',15,12,30);
            // Arial bold 12
            $this->SetFont('Arial','B',20);
            // Move to the right
            $this->Cell(50);
            // Title
            //$this->Ln(10);
            $this->Cell(0,20, utf8_decode (''), 0, 1,'C');
            $this->Cell(370,20, utf8_decode ('Lista de la obra ' . $dato . ' en la ciudad de ' . $dato2), 0, 1,'C');
            $this->Cell(368,0, utf8_decode (' desde la fecha ' . $date1 . ' hasta la fecha ' . $date2), 2, 1,'C');
            // Line break
            $this->Ln(5);
        }

        function SetStyle($tag, $enable) {
            // Modificar estilo y escoger la fuente correspondiente
            $this->$tag += ($enable ? 1 : -1);
            $style = '';
            foreach(array('B', 'I', 'U') as $s) {
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

    //Generar nuevo PDF 
    $pdf = new PDF('L','mm','A3');
    //Definición de márgenes del pdf
    $pdf->SetLeftMargin(20);
    $pdf->SetRightMargin(20);
    //Pronombres de las páginas
    $pdf->AliasNbPages();
    //Agregación de páginas
    $pdf->AddPage();
    //Contenido del PDF
    $pdf->ln(8);
    //Definición de caligrafía, negrilla y tamaño
    $pdf->SetFont('Arial','B',12);
    //Color de fondo
    $pdf->SetFillColor(218, 191, 93);

    $pdf->Cell(45,10, utf8_decode ('Nombre de la Obra'), 1, 0, 'C', true);
    $pdf->Cell(45,10, utf8_decode ('Ciudad de la Obra'), 1, 0, 'C', true);
    $pdf->Cell(40,10, utf8_decode ('Fecha'), 1, 0, 'C', true);
    $pdf->Cell(40,10, utf8_decode ('N° Documento'), 1, 0, 'C', true);
    $pdf->Cell(70,10, utf8_decode ('Nombres y Apellidos'), 1, 0, 'C', true);
    $pdf->Cell(60,10, utf8_decode ('Cargo'), 1, 0, 'C', true);
    $pdf->Cell(40,10, utf8_decode ('EPS'), 1, 0, 'C', true);
    $pdf->Cell(40,10, utf8_decode ('ARL'), 1, 1, 'C', true);

    $pdf->SetFont('Arial','',11);
    
    while ($row = mysqli_fetch_assoc($resul)){
        
        $pdf->Cell(45,10, utf8_decode ($row['nombreObra']), 1, 0, 'C', 0);
        $pdf->Cell(45,10, utf8_decode ($row['ciudadObra']), 1, 0, 'C', 0); 
        $pdf->Cell(40,10, utf8_decode ($row['fechaInicio']), 1, 0, 'C', 0);
        $pdf->Cell(40,10, utf8_decode ($row['docAspirante']), 1, 0, 'C', 0);
        $pdf->Cell(70,10, utf8_decode ($row['PnombreAspirante'] . ' ' . $row['SnombreAspirante'] . ' ' . $row['PapellidoAspirante'] . " " . $row['SapellidoAspirante']), 1, 0, 'C', 0);
        $pdf->Cell(60,10, utf8_decode ($row['tipoCargoDesp']), 1, 0, 'C', 0);  
        $pdf->Cell(40,10, utf8_decode ($row['eps']), 1, 0, 'C', 0);
        $pdf->Cell(40,10, utf8_decode ($row['arl']), 1, 1, 'C', 0); 
    }

    $pdf -> Output();
}
?>