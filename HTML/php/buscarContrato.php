<!-- 

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contrato</title>
        <link rel="stylesheet" href="../../CSS/Formato_Base.css">
        <link rel="stylesheet" href="../../CSS/estadoLog/log true/recursosHumanos/buscarContrato.css">
        <link rel="icon" href="../../Imagenes/logoProyect/Logo_Principal.png">
    </head>
    <body>
        <section id="cabecera">
                <div id="titulo">
                    <center>
                        <img src='../../Imagenes/logoProyect/Logo_Principal.png'>
                        <h2>Contrato Individual de Trabajo a (Tipo de contrato)</h2>
                    </center>
                <div>
                    <div id="cuerpo">
                        <h2 class="tituloContra">Nombre del Empleador: Disser Ingenieria S.A.S.</h2>
                        <h2 class="nit">NIT: 830.032.688 - 5</h2>
                        <h2 class="">Domicilio del Empleador: Calle 169 Nº 20-06 Piso 2</h2>
                        <h2>Nombre del Trabajador: Pepito Pérez</h2>
                        <h2>Cedula: Si señor</h2>
                        <h2>Direccion del Trabajador: Springfield avenida siempre viva</h2>
                        <h2>Telefono: 911</h2>
                        <h2>Cargo: stripper</h2>
                        <h2>Salario: Propinas</h2>
                        <h2>Prestaciones: Ninguna</h2>
                        <h2>Forma de Pago: Mensual</h2>
                        <h2>Fecha de Ingreso: 06/03/2022</h2>
                        <h2>Nombre de la Obra: yaxul</h2>
                        <h2>Ciudad de la Obra: Bogota</h2>
                    </div>
                    <div id="piePag">
                        <p>
                            Entre los suscritos a saber <b>de una parte, DISSER INGENIERIA S.A.S.</b>, sociedad de tipo comercial, legalmente constituida, identificada con el 
                            <b>NIT. 830.032.688-5</b>, tal como consta en su correspondiente certificado de existencia y representación, expedido por la Cámara de Comercio de Bogotá, con domicilio en dicha 
                            ciudad, actuando en el presente contrato a través de su representante legal Ing. <b>ANDRÉS EMILIO NOVA GARCÍA</b>, mayor de edad, con 
                            domicilio y residencia en la ciudad de Bogotá, identificado con la C.C. No.<b>7.222.162 DE DUITAMA</b>, quien en adelante y para los efectos de este contrato se denominará <b>EL 
                            EMPLEADOR</b> y, de otra, <b>OHM CIFUENTES SANCHEZ</b>, igualmente mayor de edad, domiciliado y residenciado en la ciudad de <b>BOGOTÁ</b> identificado con la C.C. No.<b>79.944.583 
                            DE BOGOTÁ</b>, quien en adelante y para los efectos de este <b>OTRO SI</b> a este contrato se denominará <b>EL TRABAJADOR</b>, hemos acordado un cambio de proyecto para ÉXITO EL 
                            ENSUEÑO A partir del 13 de Marzo de 2022.
                        </p>
                    </div>
                    <h2>EL EMPLEADOR</h2>
                    <h2>Andres Emilio Nova Garcia</h2>
                    <h2>C.C. No. 7222162 de Duitama</h2>
                    <h2>EL TRABAJADOR</h2>
                    <h2>Pepito Pérez</h2>
                    <h2>C.C. No. 123</h2>
                </div>
            </section>
        }

        //Generar PDF (¿se va a colocar? Toca revisar)
        <form action="./buscarContrato.php" method="post"> //cambiar si se crea otro archivo
            <input type="submit" name="btnPdf" value="Descargar">
        </form>
    </body>
</html>

 -->
<?php

    include ('conexion.php');

    //Diferenciación de botones
    botones($conn);

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contrato</title>
        <!-- <title>
            < ?=idContrato($conn);?>
        </title> -->
        <link rel="stylesheet" href="../../CSS/Formato_Base.css">
        <link rel="stylesheet" href="../../CSS/estadoLog/log true/recursosHumanos/buscarContrato.css">
        <link rel="icon" href="../../Imagenes/logoProyect/Logo_Principal.png">
    </head>
</html>
<?php

    //Funcion de diferenciación de botones
    function botones($conn){
        if (ISSET($_POST['btnPdf'])){
            pdfDoc($conn);
        }
        if (ISSET($_POST['vContrato'])) {
            busqContrato($conn);
        }
    }

    //Consulta de identificación de contratado
    //NOTA: No sirve la función en el head
    function idContrato($conn) {

        $id = $_POST['docAspirante'];
        
        $consulID = "SELECT aspirante.docAspirante, PnombreAspirante, SnombreAspirante, PapellidoAspirante, SapellidoAspirante FROM aspirante INNER JOIN contrato
        ON aspirante=docAspirante=contrato.docAspirante WHERE contrato.docAspirante='$id'";

        $query = mysqli_query($conn, $consulID);

        while ($row=mysqli_fetch_assoc($query)) {
            echo '<title>Contrato ' . $row['docAspirante'] . ' ' . $row['PapellidoAspirante'] . ' ' . $row['PnombreAspirante'] . '</title>';
        }
    }

    //Funición para listar contratos que tienen los empleados (antes aspirantes).
    function listaContratos($conn) {
        
        $consLista = "SELECT aspirante.docAspirante, PnombreAspirante, SnombreAspirante, PapellidoAspirante, SapellidoAspirante, tipoContrato, direccionResidencia, telefonoContacto,
        tipoCargo, salario, fechaInicio,nombreObra,ciudadObra FROM aspirante INNER JOIN contrato ON aspirante.docAspirante=contrato.docAspirante";

        $resultLista = mysqli_query($conn, $consLista);
            
        while ($row = mysqli_fetch_assoc($resultLista)) {
            echo '<div class="lista">';
                echo '<br><br>';
                echo '<a href="">Tipo de contrato -> ' . $row['tipoContrato'] . '.</a><br>';
                echo '<a href="">Número de documento -> ' . $row['docAspirante'] . '.</a><br>';
                echo '<a href="">Nombres del empleado -> ' . $row['PnombreAspirante'] . ' ' . $row['SnombreAspirante'] . '.</a><br>';
                echo '<a href="">Apellidos del empleado -> ' . $row['PapellidoAspirante'] . ' ' . $row['SapellidoAspirante'] . '.</a><br>';
                echo '<a href="">Dirección de residencia del empleado -> ' . $row['direccionResidencia'] . '</a><br>';
                echo '<a href="">Teléfono de contacto del empleado -> ' . $row['telefonoContacto'] . '</a><br>';
                echo '<a href="">Cargo del empleado -> ' . $row['tipoCargo'] . '.</a><br>';
                echo '<a href="">Salario del empleado -> ' . $row['salario'] . '</a><br>';
                echo '<a href="">Fecha de inicio del contrato -> ' . $row['fechaInicio'] . '</a><br>';
                echo '<a href="">Nombre de la obra -> ' . $row['nombreObra'] . '</a><br>';
                echo '<a href="">Ciudad de la obra -> ' . $row['ciudadObra'] . '.</a><br>';
                /* echo '<a href=""></a><br>'; */
                
                //Generar PDF (¿se va a colocar? Toca revisar)
                echo '<form action="./buscarContrato.php" method="post">'; //cambiar si se crea otro archivo
                    echo '<input type="submit" name="descargarContrato" value="Descargar">';
                echo '</form>';
            echo '</div><br><br>';
        }
    }

    //Función para buscar un contrato y mostrarlo en HTML (¿Posibilidad de descargar?)
    function busqContrato($conn) {
            
        //Identificador del input en el formulario línea 20
        $id = $_POST['docAspirante'];
            
        $consulta = "SELECT aspirante.docAspirante, aspirante.ciudad, tipoContrato, PnombreAspirante, SnombreAspirante, PapellidoAspirante, SapellidoAspirante, direccionResidencia, telefonoContacto, 
            tipoCargoDesp, salario, valorPrestaciones, fechaInicio, nombreObra, ciudadObra, firma, telefonoContacto FROM aspirante INNER JOIN contrato ON 
            aspirante.docAspirante=contrato.docAspirante WHERE contrato.docAspirante = '$id'";
    
        $resul = mysqli_query($conn, $consulta);

        //Volver a la función de listado de contratos
        echo '<button class="goBack"><a href="../estadoLog/logtrue/recursosHumanos/Contratos.html">Volver</a></button>';

        while ($row = mysqli_fetch_assoc($resul)) {
            
            echo '<section id="cabecera">';
                echo '<div id="titulo">';
                    echo '<center>';
                        echo "<img src='../../Imagenes/logoProyect/Logo_Principal.png'>";
                        /*echo '<h2>Otro si No° 1</h2>';*/
                        echo '<h2>Contrato Individual de Trabajo a ' . $row['tipoContrato'] . '</h2>';
                        /* echo '<h2></h2>'; */
                    echo '</center>';
                echo '<div>';
                    echo '<div id="cuerpo">';
                        echo '<h2 class="tituloContra">Nombre del Empleador: Disser Ingenieria S.A.S.</h2>';
                        echo '<h2 class="nit">NIT: 830.032.688 - 5</h2>';
                        echo '<h2 class="">Domicilio del Empleador: Calle 169 Nº 20-06 Piso 2</h2>';
                        echo '<h2>Nombre del Trabajador: '  . $row['PnombreAspirante'] . ' ' . $row['SnombreAspirante'] . ' ' . $row['PapellidoAspirante'] . ' ' . $row['SapellidoAspirante'] . '</h2>';
                        echo '<h2>Cedula: ' . $row['docAspirante'] . ' de ' . $row['ciudad'] . '</h2>';
                        echo '<h2>Direccion del Trabajador: ' . $row['direccionResidencia'] . '</h2>';
                        echo '<h2>Telefono: ' . $row['telefonoContacto'] . '</h2>';
                        echo '<h2>Cargo: ' . $row['tipoCargoDesp'] . '</h2>';
                        echo '<h2>Salario: ' . $row['salario'] . '</h2>';
                        echo '<h2>Prestaciones: ' . $row['valorPrestaciones'] . '</h2>';
                        echo '<h2>Forma de Pago: Mensual</h2>';
                        echo '<h2>Fecha de Ingreso: ' . $row['fechaInicio'] . '</h2>';
                        echo '<h2>Nombre de la Obra: ' . $row['nombreObra'] . '</h2>';
                        echo '<h2>Ciudad de la Obra: ' . $row['ciudadObra'] . '</h2>';
                    echo '</div>';
                    echo '<div id="piePag">';
                        echo ' <p>
                        Entre los suscritos a saber <b>de una parte, DISSER INGENIERIA S.A.S.</b>, sociedad de tipo comercial, legalmente constituida, identificada con el
                        <b>NIT. 830.032.688 - 5</b>, tal como consta en su correspondiente certificado de existencia y representacion, expedido por la Camara de Comercio de Bogota, con domicilio en dicha
                        ciudad, actuando en el presente contrato a traves de su representante legal Ing. <b>Andres Emilio Nova Garcia,</b> mayor de edad, con domicilio y residencia en la ciudad de Bogota,
                        identificado con la C.C. No. <b>7222162 de Duitama</b>, quien en adelante y para los efectos de este contrato se denominara <b>EL EMPLEADOR</b> y, de otra,
                        <b>' . $row['PnombreAspirante'] . ' ' . $row['SnombreAspirante'] . ' ' . $row['PapellidoAspirante'] . ' ' . $row['SapellidoAspirante'] . '</b>, igualmente mayor de edad, domiciliado
                        y residenciado en la ciudad de <b>' . $row['ciudad'] . '</b> identificado con la C.C. No. <b>' . $row['docAspirante'] . ' de ' . $row['ciudad'] .'</b>, quien en adelante y para los
                        efectos de este <b>otro si</b> a este contrato se denominara <b>EL TRABAJADOR</b>, hemos acordado un cambio de proyecto
                        para ' . $row['nombreObra'] . ' en la ciudad de '. $row['ciudadObra'] . ' a partir del ' . $row['fechaInicio'] . '.
                        </p>';
                    echo '</div>';
                    echo '<h2>EL EMPLEADOR</h2>';
                    echo '<h2>Andres Emilio Nova Garcia</h2>';
                    echo '<h2>C.C. No. 7222162 de Duitama</h2>';
                    echo '<h2>EL TRABAJADOR</h2>';
                    echo '<h2>'  . $row['PnombreAspirante'] . ' ' . $row['SnombreAspirante'] . ' ' . $row['PapellidoAspirante'] . ' ' . $row['SapellidoAspirante'] . '</h2>';
                    echo '<h2>C.C. No. ' . $row['docAspirante'] . ' de ' . $row['ciudad'] . '</h2>';
                echo '</div>';
            echo '</section>';
        }

        //Generar PDF (¿se va a colocar? Toca revisar)
        echo '<form action="./buscarContrato.php" method="post">'; //cambiar si se crea otro archivo
            echo '<input type="submit" name="btnPdf" value="Descargar">';
        echo '</form>';
    }

    //Función para generar PDF (¿se va a colocar? Toca revisar)
    function pdfDoc($conn) {

        require 'pdfLibreria/fpdf.php';
        $conn = mysqli_connect('localhost', 'root', '', 'trascendental');
    
        //Inicio clase del pdf
        class PDF extends FPDF {
            
            //Cabecera del PDF
            function header() {
                // Logo
                $this->Image('../../Imagenes/logoProyect/Logo_Principal.png',25,9,20);
                // Arial bold 12
                $this->SetFont('Arial','B',12);
                // Move to the right
                $this->Cell(50);
                // Title
                $this->Cell(50,20,'CONTRATO INDIVIDUAL DE TRABAJO',0,1,'C');
                // Line break
                $this->Ln(0);
            }
    
            //Función si se quiere escribir un texto || Colocar variable $html
            function WriteHTML($html){
                
                // HTML parser || Analizador de HTML
                $html = str_replace("\n",' ',$html);
                $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
                foreach($a as $i=>$e){
                    if($i%2==0){
                            $this->Write(5,$e);
                    }
                    else{
                        if($e[0]=='/')
                            $this->CloseTag(strtoupper(substr($e,1)));
                        else{
                            $a2 = explode(' ',$e);
                            $tag = strtoupper(array_shift($a2));
                            $attr = array();
                            foreach($a2 as $v){
                                if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                                    $attr[strtoupper($a3[1])] = $a3[2];
                            }
                            $this->OpenTag($tag,$attr);
                        }
                    }
                }
            }
            
            //No sé qué hace esta función :c
            function OpenTag($tag, $attr) {
                if($tag=='BR') {
                    $this->Ln(8);
                }
            }
    
            function CloseTag($tag) {
                // Etiqueta de cierre
                if($tag=='B' || $tag=='I' || $tag=='U')
                    $this->SetStyle($tag,false);
                if($tag=='A')
                    $this->HREF = '';
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
    
            function PutLink($URL, $txt) {
                // Escribir un hiper-enlace
                $this->SetTextColor(0,0,255);
                $this->SetStyle('U',true);
                $this->Write(5,$txt,$URL);
                $this->SetStyle('U',false);
                $this->SetTextColor(0);
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
    
        $dato = $_POST['docAspirante'];
        $consulta = "SELECT aspirante.docAspirante, aspirante.ciudad, tipoContrato, PnombreAspirante, SnombreAspirante, PapellidoAspirante, SapellidoAspirante,
        direccionResidencia, tipoCargoDesp, salario, valorPrestaciones, fechaInicio,
        nombreObra, ciudadObra, firma, telefonoContacto FROM aspirante INNER JOIN contrato ON
        aspirante.docAspirante=contrato.docAspirante WHERE contrato.docAspirante = '$dato'";
    
        $resul = mysqli_query($conn, $consulta);
    
        //Generar nuevo PDF    
        $pdf = new PDF('P','mm','A4');
        //Definición de márgenes del pdf
        $pdf->SetLeftMargin(30);
        $pdf->SetRightMargin(30);
        //Pronombres de las páginas
        $pdf->AliasNbPages();
        //Agregación de páginas
        $pdf->AddPage();
        //Definición de caligrafía, negrilla y tamaño
        $pdf->SetFont('Arial','',11);
    
        while ($row = mysqli_fetch_assoc($resul)){
    
            $pdf->Cell(75,8, 'Tipo de Contrato', 1, 0, 'C', 0);
            $pdf->Cell(75,8, $row['tipoContrato'], 1, 1, 'C', 0);
            
            $pdf->Cell(75,8, 'Nombre del Empleador', 1, 0, 'C', 0);
            $pdf->Cell(75,8, 'Disser Ingenieria S.A.S', 1, 1, 'C', 0);
            
            $pdf->Cell(75,8, 'NIT', 1, 0, 'C', 0);
            $pdf->Cell(75,8, '830.032.688 - 5', 1, 1, 'C', 0);
            
            $pdf->Cell(75,8, 'Domicilio del Empleador', 1, 0, 'C', 0);
            $pdf->Cell(75,8, 'Calle 169 N 20-06 Piso 2', 1, 1, 'C', 0);
            
            $pdf->Cell(75,8, 'Nombre del Trabajador', 1, 0, 'C', 0);
            $pdf->Cell(75,8, $row['PnombreAspirante'] . ' ' . $row['SnombreAspirante'] . ' ' . $row['PapellidoAspirante'] . " " . $row['SapellidoAspirante'], 1, 1, 'C', 0);
    
            $pdf->Cell(75,8, 'Cedula', 1, 0, 'C', 0);
            $pdf->Cell(75,8, $row['docAspirante'] . ' ' . $row['ciudad'], 1, 1, 'C', 0);
    
            $pdf->Cell(75,8, 'Direccion del Empleado', 1, 0, 'C', 0);
            $pdf->Cell(75,8, $row['direccionResidencia'], 1, 1, 'C', 0);
            
            $pdf->Cell(75,8, 'Telefono del Empleado', 1, 0, 'C', 0);
            $pdf->Cell(75,8, $row['telefonoContacto'], 1, 1, 'C', 0);
    
            $pdf->Cell(75,8, 'Cargo', 1, 0, 'C', 0);
            $pdf->Cell(75,8, $row['tipoCargoDesp'], 1, 1, 'C', 0);
    
            $pdf->Cell(75,8, 'Salario', 1, 0, 'C', 0);
            $pdf->Cell(75,8, $row['salario'], 1, 1, 'C', 0);
    
            $pdf->Cell(75,8, 'Valor de Prestaciones', 1, 0, 'C', 0);
            $pdf->Cell(75,8, $row['valorPrestaciones'], 1, 1, 'C', 0);
    
            $pdf->Cell(75,8, 'Forma de Pago', 1, 0, 'C', 0);
            $pdf->Cell(75,8, 'Mensual', 1, 1, 'C', 0);
    
            $pdf->Cell(75,8, 'Fecha de Inicio', 1, 0, 'C', 0);
            $pdf->Cell(75,8, $row['fechaInicio'], 1, 1, 'C', 0);
    
            $pdf->Cell(75,8, 'Nombre Obra', 1, 0, 'C', 0);
            $pdf->Cell(75,8, $row['nombreObra'], 1, 1, 'C', 0);
    
            $pdf->Cell(75,8, 'Ciudad Obra', 1, 0, 'C', 0);
            $pdf->Cell(75,8, $row['ciudadObra'], 1, 1, 'C', 0);
            
            //Salto de línea
            $pdf->ln(10);
    
            $html = 'Entre los suscritos a saber <b>de una parte, DISSER INGENIERIA S.A.S.</b>, sociedad de tipo comercial, legalmente constituida, identificada con el
    <b>NIT. 830.032.688 - 5</b>, tal como consta en su correspondiente certificado de existencia y representacion, expedido por la Camara de Comercio de Bogota, con domicilio en dicha
    ciudad, actuando en el presente contrato a traves de su representante legal Ing. <b>Andres Emilio Nova Garcia,</b> mayor de edad, con domicilio y residencia en la ciudad de Bogota,
    identificado con la C.C. No. <b>7222162 de Duitama</b>, quien en adelante y para los efectos de este contrato se denominara <b>EL EMPLEADOR</b> y, de otra,
    <b>' . $row['PnombreAspirante'] . ' ' . $row['SnombreAspirante'] . ' ' . $row['PapellidoAspirante'] . ' ' . $row['SapellidoAspirante'] . '</b>, igualmente mayor de edad, domiciliado
    y residenciado en la ciudad de <b>' . $row['ciudad'] . '</b> identificado con la C.C. No. <b>' . $row['docAspirante'] . ' de ' . $row['ciudad'] .'</b>, quien en adelante y para los
    efectos de este <b>otro si</b> a este contrato se denominara <b>EL TRABAJADOR</b>, hemos acordado un cambio de proyecto
    para ' . $row['nombreObra'] . ' en la ciudad de '. $row['ciudadObra'] . ' a partir del ' . $row['fechaInicio'] . '.';
    
            //Impresión del html || Variable $html
            $pdf->WriteHTML($html);
    
            //Salto de línea
            $pdf->ln(10);
    
            //FIRMA
                //IZQUIERDA
                $pdf->Cell(75,8, 'EMPLEADOR', 0, 0, 'C', 0);
                //DERECHA
                $pdf->Cell(75,8, 'TRABAJADOR', 0, 1, 'C', 0);
                //IZQUIERDA
                $pdf->Cell(75,20, '', 0, 0, 'C', 0);
                //DERECHA
                $pdf->Cell(75,20, '', 0, 1, 'C', 0);
                //IZQUIERDA
                $pdf->Cell(75,4, 'Andres Emilio Nova Garcia', 0, 0, 'C', 0);
                //DERECHA
                $pdf->Cell(75,4, $row['PnombreAspirante'] . ' ' . $row['SnombreAspirante'] . ' ' . $row['PapellidoAspirante'] . ' ' . $row['SapellidoAspirante'], 0, 1, 'C', 0);
                //IZQUIERDA
                $pdf->Cell(75,4, 'C.C. No. 7222162 de Duitama', 0, 0, 'C', 0);
                //DERECHA
                $pdf->Cell(75,4, 'C.C. No. ' . $row['docAspirante'] . ' de ' . $row['ciudad'], 0, 1, 'C', 0);
        }
    
        $pdf -> Output();
    }

?>