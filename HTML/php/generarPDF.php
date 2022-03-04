<?php

/* include ('../conexion.php');

if (ISSET($_POST['busqContrato'])) {
    descargarPDF($conn);
}

function descargarPDF($conn) {
        
    require '../../../php/pdfLibreria/fpdf.php';
    
    class PDF extends FPDF {
        function Header() {

            $this->Image('./logo.png',15,10,30);
            $this->SetFont('Arial','B',18);
            $this->Cell(50);
            $this->Cell(70,20, utf8_decode('Consultar Información Contratación'),0,1,'C');
            $this->Cell(170,0, utf8_decode('Universidad SENA CEET :v'),0,1,'C');
            $this->Cell(50,25, '',0,1,'C');
            $this->Ln(0);
        }
        
        function WriteHTML($html){

            // HTML parser
            $html = str_replace("\n",' ',$html);
            $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
            
            foreach($a as $i=>$e){
                
                if ($i%2==0) {
                    $this->Write(5,$e);
                }
                
                else {
                    if ($e[0]=='/') {
                        $this->CloseTag(strtoupper(substr($e,1)));
                    }
                    else {
                        $a2 = explode(' ',$e);
                        $tag = strtoupper(array_shift($a2));
                        $attr = array();
                        foreach ($a2 as $v) {
                            if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                                $attr[strtoupper($a3[1])] = $a3[2];
                        }
                        $this->OpenTag($tag,$attr);
                    }
                }
            }
        }
        
        function OpenTag($tag, $attr) {
            if($tag=='BR') {
                $this->Ln(8);
            }
        }
        
        function Footer() {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,utf8_decode('Página ').$this->PageNo(),0,0,'C');
        }
        
    }
        
    $html = 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde ipsa sit, perferendis rerum voluptate eveniet quae, quos illum est voluptas, sunt alias aperiam quis eligendi excepturi quod maiores amet! Dicta?Lorem ipsum dolor .<br>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde ipsa sit, perferendis rerum voluptate eveniet quae, quos illum est voluptas, sunt alias aperiam quis eligendi excepturi quod maiores amet! Dicta?Lorem ipsum dolor .<br><br>';
        
    $dato = $_POST['idBusq'];
    $consult="SELECT aspirante.docAspirante, PnombreAspirante,SnombreAspirante, PapellidoAspirante, tipoContrato, direccionResidencia, telefonoContacto, tipoCargo, salario,
    fechaInicio,nombreObra,ciudadObra FROM aspirante INNER JOIN contrato ON aspirante.docAspirante=contrato.docAspirante WHERE aspirante.docAspirante = '$dato'";

    $result = mysqli_query($conn, $consult);

    $pdf = new PDF('P','mm','A4');
    $pdf->SetLeftMargin(22);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',0, 'C');
    $pdf->SetFont('');
    $pdf->SetFontSize(12);
    $pdf->WriteHTML($html);

    while($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell(85,10, ' NOMBRE DEL EMPLEADOR', 1, 0, 'J', 0);
        $pdf->Cell(85,10, ' DISSER INGENIERIA S.A.S', 1, 1, 'J', 0);
    
        $pdf->Cell(85,10,utf8_decode( ' NIT'), 1, 0, 'J', 0);
        $pdf->Cell(85,10,utf8_decode( ' 830.032.688-5'), 1, 1, 'J', 0);
    
        $pdf->Cell(85,10,utf8_decode( ' DOMICILIO DEL EMPLEADOR'), 1, 0, 'J', 0);
        $pdf->Cell(85,10,utf8_decode( ' Calle 169 #20-06'), 1, 1, 'J', 0);
    
        $pdf->Cell(85,10,utf8_decode( ' NOMBRE DEL TRABAJADOR'), 1, 0, 'J', 0);
        $pdf->Cell(85,10,' '. $row['PnombreAspirante'] . ' ' .$row['SnombreAspirante'] . ' ' . $row['PapellidoAspirante'], 1, 1, 'J', 0);
    
        $pdf->Cell(85,10, ' CEDULA', 1, 0, 'J', 0);
        $pdf->Cell(85,10,' '. $row['docAspirante'], 1, 1, 'J', 0);
    
        $pdf->Cell(85,10, utf8_decode(' DIRECCIÓN DEL TRABAJADOR'), 1, 0, 'J', 0);
        $pdf->Cell(85,10,' '. $row['direccionResidencia'], 1, 1, 'J', 0);
    
        $pdf->Cell(85,10, utf8_decode(' TELEFONO'), 1, 0, 'J', 0);
        $pdf->Cell(85,10,' '. $row['telefonoContacto'], 1, 1, 'J', 0);
    
        $pdf->Cell(85,10, utf8_decode(' OFICIO QUE DESEMPEÑARÁ'), 1, 0, 'J', 0);
        $pdf->Cell(85,10,utf8_decode(' '. $row['tipoCargo']), 1, 1, 'J', 0);
    
        $pdf->Cell(85,10, utf8_decode(' SALARIO'), 1, 0, 'J', 0);
        $pdf->Cell(85,10,' '. $row['salario'], 1, 1, 'J', 0);
    
        $pdf->Cell(85,10, utf8_decode(' FECHA DE INICIO'), 1, 0, 'J', 0);
        $pdf->Cell(85,10,' '. $row['fechaInicio'], 1, 1, 'J', 0);
    
        $pdf->Cell(85,10, utf8_decode(' NOMBRE OBRA'), 1, 0, 'J', 0);
        $pdf->Cell(85,10,utf8_decode(' '. $row['nombreObra']), 1, 1, 'J', 0);
    
        $pdf->Cell(85,10, utf8_decode(' CIUDAD OBRA'), 1, 0, 'J', 0);
        $pdf->Cell(85,10,utf8_decode(' '. $row['ciudadObra']), 1, 1, 'J', 0);
    }
    
    $pdf->Output();

    echo '<script>window.location("../../estadoLog/logtrue/recursosHumanos/buscarContrato.php");</script>';
} */

?>
<?php

include ('../conexion.php');

if (ISSET($_POST['busqContrato'])) {
    descargarPDF($conn);
}

function descargarPDF($conn) {

    require 'fpdf.php';
    $conn = mysqli_connect('localhost', 'root', '', 'trascendental');

    class PDF extends FPDF {
        //cabecera
        function header() {
            // Logo
            // Arial bold 15
            //
            $this->SetFont('Arial','B',11);
            // Move to the right
            $this->Cell(50);
            // Title
            $this->Cell(50,60,'Titulo',0,1,'C');
            // Line break
            $this->Ln(0);
        }
    }

    $dato = $_POST['idBusq'];
    $consulta = "SELECT contrato.docAspirante, tipoContrato, PnombreAspirante, SnombreAspirante, PapellidoAspirante, SapellidoAspirante,
    direccionResidencia, tipoCargoDesp, salario, valorPrestaciones, fechaInicio,
    nombreObra, ciudadObra firma, telefonoContacto FROM aspirante INNER JOIN contrato ON
    aspirante.docAspirante=contrato.docAspirante WHERE contrato.docAspirante = '$dato'";

    $resul = mysqli_query($conn, $consulta);

    $pdf = new PDF('P','mm','A4');
    $pdf->SetLeftMargin(35);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',13);

    while ($row = mysqli_fetch_assoc($resul)){

        $pdf->Cell(15,10, 'NIT', 1, 0, 'C', 0);
        $pdf->Cell(15,10, '830', 1, 0, 'C', 0);
      
        $pdf->Cell(15,10, 'Domicilio Del Empleador', 1, 0, 'C', 0);
        $pdf->Cell(15,10, 'Calle 169', 1, 1, 'C', 0);
      
        $pdf->Cell(60,10, 'Nombre', 1, 0, 'C', 0);
        $pdf->Cell(25,10, $row['PnombreAspirante'], 1, 1, 'C', 0);
      
        $pdf->Cell(60,10, 'Apellido', 1, 0, 'C', 0);
        $pdf->Cell(25,10, $row['PapellidoAspirante'], 1, 1, 'C', 0);

        $pdf->Cell(60,10, 'Cedula', 1, 0, 'C', 0);
        $pdf->Cell(25,10, $row['docAspirante'], 1, 1, 'C', 0);

        $pdf->Cell(60,10, 'Direccion', 1, 0, 'C', 0);
        $pdf->Cell(25,10, $row['direccionResidencia'], 1, 1, 'C', 0);
        
        $pdf->Cell(60,10, 'Telefono', 1, 0, 'C', 0);
        $pdf->Cell(25,10, $row['telefonoContacto'], 1, 1, 'C', 0);

        $pdf->Cell(60,10, 'Cargo', 1, 0, 'C', 0);
        $pdf->Cell(25,10, $row['tipoCargoDesp'], 1, 1, 'C', 0);

        $pdf->Cell(60,10, 'Salario', 1, 0, 'C', 0);
        $pdf->Cell(25,10, $row['salario'], 1, 1, 'C', 0);

        $pdf->Cell(60,10, 'Valor De Prestaciones', 1, 0, 'C', 0);
        $pdf->Cell(25,10, $row['valorPrestaciones'], 1, 1, 'C', 0);

        $pdf->Cell(15,10, 'Forma De Pago', 1, 0, 'C', 0);
        $pdf->Cell(15,10, 'Mensual', 1, 0, 'C', 0);

        $pdf->Cell(15,10, 'Fecha de Inicio', 1, 0, 'C', 0);
        $pdf->Cell(25,10, $row['fechaInicio'], 1, 1, 'C', 0);

        $pdf->Cell(15,10, 'Nombre Obra', 1, 0, 'C', 0);
        $pdf->Cell(25,10, $row['nombreObra'], 1, 1, 'C', 0);

        $pdf->Cell(15,10, 'Ciudad Obra', 1, 0, 'C', 0);
        $pdf->Cell(25,10, $row['ciudadObra'], 1, 1, 'C', 0);

    }
    
    $pdf->Output();
    echo '<script>window.location("../../estadoLog/logtrue/recursosHumanos/buscarContrato.php");</script>';
}

?>