<?php

    /* include("php/conexion.php"); */

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            table, thead, tbody, tfoot, tr, td, th {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <h2>N° <?php echo $configuracion['idcontrato'];?> </h2>
        <h2>Contrato Individual <?php echo $configuracion['tipoContrato'];?> </h2>
        <div>
            <table class='cualquiercosaxd'>
                <thead>
                    <tr>htlmasd</tr>
                        <th>Nombre del Empleador</th> 
                        <td> Disser Ingenieria S.A.S </td>
                    <tr>
                        <th> Nit </th>
                        <td> 830.032.688-5</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th> Nombre del Empleado </th>
                        <td> <?php echo $configuracion['Nombre'];?> </td>
                    </tr>
                    <tr>
                        <th> Cédula </th>
                        <td> <?php echo $configuracion['docAspirante'];?> </td>
                    </tr>
                    <tr>
                        <th> Dirección del Empleado </th>
                        <td> <?php echo $configuracion['Direccion'];?> </td>
                    </tr>
                    <tr>
                        <th> Teléfono </th>
                        <td> <?php echo $configuracion['telefono'];?> </td>
                    </tr>
                    <tr>
                        <th> Oficio del Empleado </th>
                        <td> <?php echo $configuracion['Cargo'];?> </td>
                    </tr>
                    <tr>
                        <th> Salario  </th>
                        <td> <?php echo $configuracion['Salario'];?> </td>
                    </tr>
                    <tr>
                        <th> Valor de Prestaciones  </th>
                        <td> <?php echo $configuracion['Valorprestaciones'];?> </td>
                    </tr>
                    <tr>
                        <th> Fecha de Ingreso </th>
                        <td> <?php echo $configuracion['fechaInicio'];?> </td>
                        <!-- <td> <?php /* echo $configuracion['Fechainiciación']; */?> </td> -->
                    </tr>
                    <tr>
                        <th> Nombre de la Obra </th>
                        <td> <?php echo $configuracion['Nombreobra'];?> </td>
                    </tr>
                    <tr>
                        <th> Ciudad </th>
                        <td> <?php echo $configuracion['ciudadObra'];?> </td>
                        <!-- <td> <?php /* echo $configuracion['Ciudadcontratado']; */?> </td> -->
                    </tr>
                    <table>
                        <td>
                            Entre los suscritos a saber <strong>de una parte, DISSER INGENIERÍA S.A.S.</strong>, sociedad de tipo 
                            comercial, legalmente constituida, identificada con el <strong>NIT. 830.032.688-5</strong>, tal como consta 
                            en su correspondiente certificado de existencia y representación, expedido por la Cámara 
                            de Comercio de Bogotá, con domicilio en dicha ciudad, actuando en el presente contrato a 
                            través de su representante legal Ing. <strong>ANDRÉS EMILIO NOVA GARCÍA</strong>, mayor de edad, con 
                            domicilio y residencia en la ciudad de Bogotá, identificado con la C.C. No.<strong>7.222.162 DE 
                            DUITAMA</strong>, quien en adelante y para los efectos de este contrato se denominará <strong>EL 
                            EMPLEADOR</strong> y, de otra, <strong>OHM CIFUENTES SANCHEZ</strong>, igualmente mayor de edad, 
                            domiciliado y residenciado en la ciudad de <strong>BOGOTÁ</strong> identificado con la C.C. No.<strong>79.944.583 
                            DE BOGOTÁ</strong>, quien en adelante y para los efectos de este <strong>OTRO SI</strong> a este contrato se 
                            denominará <strong>EL TRABAJADOR</strong>, hemos acordado un cambio de proyecto para ÉXITO EL 
                            ENSUEÑO A partir del 13 de Marzo de 2022.
                        </td>
                    </table>
                </tbody>
                <table>
                    <tfoot>
                        <tr>
                            <th>
                                <!-- <strong>EL EMPLEADOR</strong> -->
                                EL EMPLEADOR
                            </th>
                            <td>
                                <strong>EL TRABAJADOR</strong>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <br><br><br><br>
                            </th>
                            <td>
                                <br><br><br><br>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php /* echo $configuracion['ANDRES EMILIO NOVA GARCIA'] */ ?>
                                ANDRÉS EMILIO NOVA GARCÍA
                                C.C. No.7.222.162 DE DUITAMA<br>
                                REPRESENTANTE LEGAL<br>
                                DISSER INGENIERÍA S.A.S.<br>
                                NIT. 830.032.688-5<br>
                            </th>
                            <td>
                                <strong>
                                    OHM CIFUENTES SANCHEZ<br>
                                    C.C. No.79.944.583 DE BOGOTÁ
                                </strong>
                            </td>
                            </tr>
                        </tfoot>
                    </table>
                </table>
            </div>
        </body>
    <footer>

    </footer>
</html>

<?php
    
    include ('conexion.php');

    if (ISSET($_POST['busqContrato'])) {
        busqContrato($conn);
        echo    "<script>
                    alert('Buscando aspirante');
                </script>";
    }
    /* else {
        echo '<form action="buscarContrato.php" method="post">';
            echo '<input type="text" name="idBusq" id="">';
            echo '<input type="button" name="busqContrato" value="Buscar">'; //cambiar si se crea otro archivo
        echo '</form>';
        listaContratos($conn);
    } */
    if (ISSET($_POST['descargarContrato'])) {
        descargarPDF($conn);
    }

    function listaContratos($conn) {
            
        /* $id = $_POST['idBusq']; */
        
        $consLista = "SELECT aspirante.docAspirante, PnombreAspirante, SnombreAspirante, PapellidoAspirante, tipoContrato, direccionResidencia, telefonoContacto, tipoCargo, salario,
        fechaInicio,nombreObra,ciudadObra FROM aspirante INNER JOIN contrato ON aspirante.docAspirante=contrato.docAspirante";
        /* $consLista = "SELECT tipoContrato, docAspirante, PnombreAspirante, PapellidoAspirante,
                direccionResidencia, tipoCargoDesp, salario, valorPrestaciones, fechaInicio,
                nombreObra, ciudadObra, firma, telefonoContacto FROM aspirante INNER JOIN contrato ON
                aspirante.docAspirante=contrato.docAspirante"; */


        $resultLista = mysqli_query($conn, $consLista);
            
        while ($row = mysqli_fetch_assoc($resultLista)) {
            echo '<div class="lista">';
                echo '<a href="">Tipo de contrato -> ' . $row['tipoContrato'] . '.</a><br>';
                echo '<a href="">Número de documento -> ' . $row['docAspirante'] . '.</a><br>';
                echo '<a href="">Nombre del empleado -> ' . $row['PnombreAspirante'] . '.</a><br>';
                echo '<a href="">Apellido del empleado -> ' . $row['PapellidoAspirante'] . '.</a><br>';
                echo '<a href="">Cargo del empleado -> ' . $row['tipoCargo'] . '.</a><br>';
                echo '<a href="">Ciudad de la obra -> ' . $row['ciudadObra'] . '.</a><br>';
                echo '<a href="">Número de contacto -> ' . $row['telefonoContacto'] . '.</a><br>';
                echo '<form action="buscarContrato.php" method="post">'; //cambiar si se crea otro archivo
                    echo '<input type="button" name="descargarContrato" value="Descargar">';
                echo '</form>';
            echo '</div><br><br>';
        }

        /* $id = $_POST['descargarContrato']['contrato.docAspirante']; */
    }
        
    function busqContrato($conn) {
            
        $id = $_POST['idBusq'];
            
        $consulta = "SELECT contrato.docAspirante, tipoContrato, PnombreAspirante, SnombreAspirante, PapellidoAspirante, SapellidoAspirante,
            direccionResidencia, tipoCargoDesp, salario, valorPrestaciones, fechaInicio,
            nombreObra, ciudadObra firma, telefonoContacto FROM aspirante INNER JOIN contrato ON
            aspirante.docAspirante=contrato.docAspirante WHERE contrato.docAspirante = '$id'";
    
        $resul = mysqli_query($conn, $consulta);
    
        while ($row = mysqli_fetch_assoc($resul)) {
            
            echo '<section id="cabecera">';
                echo '<div id="titulo">';
                    echo '<center>';
                        echo '<h2>Otro si No° 1</h2>';
                        echo '<h2>CONTRATO INDIVIDUAL DE TRABAJO A ' . $row['tipoContrato'] . '</h2>';
                        echo '<h2>NOMBRE DEL EMPLEADO: DISSER INGENIERIA S.A.S.</h2>';
                        echo '<h2>NIT: 830.032.688 -5</h2>';
                        echo '<h2>NOMBRE DEL TRABAJADOR: '  . $row['PnombreAspirante'] . $row['SnombreAspirante'] . $row['PapellidoAspirante'] . $row['SapellidoAspirante'] . '</h2>';
                        echo '<h2>CEDULA: ' . $id || $row['contrato.docAspirante'] . '</h2>';
                        echo '<h2>DIRECCION DEL TRABAJADOR: ' . $row['direccionResidencia'] . '</h2>';
                        echo '<h2>OFICIO QUE DESEMPEÑARA: ' . $row['tipoCarpoDesp'] . '</h2>';
                        echo '<h2>SALARIO: ' . $row['salario'] . '</h2>';
                        echo '<h2>PRESTACIONES: ' . $row['valorPrestaciones'] . '</h2>';
                        echo '<h2>FORMA DE PAGO: MENSUAL</h2>';
                        echo '<h2>FECHA DE INGRESO: ' . $row['fechaInicio'] . '</h2>';
                        echo '<h2>PROYECTO OTRO SI ' . $row['nombreObra'] . ' en ' . $row['ciudadObra'] . '</h2>';
                        /* echo '<h2></h2>'; */
                    echo '</center>';
                echo '<div>';
                echo '<div id="cuerpo">';
                    echo '';
                echo '</div>';
                echo '<div id="piePag">';
                    echo ' <p>
                        Entre los suscritos a saber <strong>de una parte, DISSER INGENIERÍA S.A.S.</strong>, sociedad de tipo 
                        comercial, legalmente constituida, identificada con el <strong>NIT. 830.032.688-5</strong>, tal como consta 
                        en su correspondiente certificado de existencia y representación, expedido por la Cámara 
                        de Comercio de Bogotá, con domicilio en dicha ciudad, actuando en el presente contrato a 
                        través de su representante legal Ing. <strong>ANDRÉS EMILIO NOVA GARCÍA</strong>, mayor de edad, con 
                        domicilio y residencia en la ciudad de Bogotá, identificado con la C.C. No.<strong>7.222.162 DE 
                        DUITAMA</strong>, quien en adelante y para los efectos de este contrato se denominará <strong>EL 
                        EMPLEADOR</strong> y, de otra, <strong>OHM CIFUENTES SANCHEZ</strong>, igualmente mayor de edad, 
                        domiciliado y residenciado en la ciudad de <strong>BOGOTÁ</strong> identificado con la C.C. No.<strong>79.944.583 
                        DE BOGOTÁ</strong>, quien en adelante y para los efectos de este <strong>OTRO SI</strong> a este contrato se 
                        denominará <strong>EL TRABAJADOR</strong>, hemos acordado un cambio de proyecto para ÉXITO EL 
                        ENSUEÑO A partir del 13 de Marzo de 2022.
                    </p>';
                echo '</div>';
            echo '</section>';
        }

        echo '<form action="buscarContrato.php" method="post">'; //cambiar si se crea otro archivo
            echo '<input type="button" name="descargarContrato" value="Descargar">';
        echo '</form>';
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
            
        $dato = $_POST['dato'];
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
    }
?>