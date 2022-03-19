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

            // Arial bold 12
            $this->SetFont('Arial','B',14);
            // Move to the right
            $this->Cell(50);
            // Title
            $this->Cell(270,20,'Lista de la obra ' . $dato . ' en la ciudad de ' . $dato2 . ' desde la fecha ' . $date1 . ' hasta la fecha ' . $date2, 0, 1,'C');
            // Line break
            $this->Ln(0);
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
            $this->Cell(0,10,utf8_decode('Página ').$this->PageNo(),0,0,'C');
        }
    }

    //Generar nuevo PDF    
    //$pdf = new PDF('P','mm','A4');
    $pdf = new PDF('L','mm','A3');
    //$pdf = new FPDF('P', 'mm', '200, 300');
    
    //Definición de márgenes del pdf
    $pdf->SetLeftMargin(25);
    $pdf->SetRightMargin(30);

    //Pronombres de las páginas
    $pdf->AliasNbPages();
    
    //Agregación de páginas
    $pdf->AddPage();

    //Contenido del PDF
    $pdf->ln(8);

    //Definición de caligrafía, negrilla y tamaño
    $pdf->SetFont('Arial','B',12);

    $pdf->Cell(45,10, 'Nombre de la Obra', 1, 0, 'C', 0);
    $pdf->Cell(45,10, 'Ciudad de la Obra', 1, 0, 'C', 0);
    $pdf->Cell(40,10, 'Fecha', 1, 0, 'C', 0);
    $pdf->Cell(40,10, 'N. Documento', 1, 0, 'C', 0);
    $pdf->Cell(80,10, 'Nombres y Apellidos', 1, 0, 'C', 0);
    $pdf->Cell(40,10, 'Cargo', 1, 0, 'C', 0);
    $pdf->Cell(40,10, 'EPS', 1, 0, 'C', 0);
    $pdf->Cell(40,10, 'ARL', 1, 1, 'C', 0);

    $pdf->SetFont('Arial','',11);
    
    while ($row = mysqli_fetch_assoc($resul)){
        
        $pdf->Cell(45,10, $row['nombreObra'], 1, 0, 'C', 0);
        $pdf->Cell(45,10, $row['ciudadObra'], 1, 0, 'C', 0); 
        $pdf->Cell(40,10, $row['fechaInicio'], 1, 0, 'C', 0);
        $pdf->Cell(40,10, $row['docAspirante'], 1, 0, 'C', 0);
        $pdf->Cell(80,10, $row['PnombreAspirante'] . ' ' . $row['SnombreAspirante'] . ' ' . $row['PapellidoAspirante'] . " " . $row['SapellidoAspirante'], 1, 0, 'C', 0);
        $pdf->Cell(40,10, $row['tipoCargoDesp'], 1, 0, 'C', 0);  
        $pdf->Cell(40,10, $row['eps'], 1, 0, 'C', 0);
        $pdf->Cell(40,10, $row['arl'], 1, 1, 'C', 0); 
    }

    $pdf -> Output();
}
?>