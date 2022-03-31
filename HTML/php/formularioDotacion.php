<?php

    include("conexion.php");

    #Identificar cada variable de vinculacion con la pagina y la base de datos.
    #Insertar a la base de datos los datos ingresados en cada campo del formulario.

    if(isset($_POST['sendDota'])) {
        insertar ($conn);
    }
    else if(isset($_POST['Actualizar'])) {
        actualizar ($conn);
    } 
    else if (isset($_POST['descargar'])) {
        dPDF($conn);
    }
    else {
        echo "<script>alert('Error')</script>";
    }

    function insertar ($conn) {

        $nombres = $_POST ["nombres"];
        $docAspirante = $_POST ["docAspirante"];
        $docRecHum = $_POST["docRecHum"];
        $cargo = $_POST ["cargo"];
        $proceso = $_POST ["proceso"];
        $fehaEntrega = $_POST ["fechaEntrega"];
        $casco = $_POST ["casco"];
        $overol = $_POST ["overol"];
        $botasMaterial = $_POST ["botasMaterial"];
        $botasCaucho = $_POST ["botasCaucho"];
        $guantesCarnaza = $_POST ["guantesCarnaza"];
        $guantesCaucho = $_POST ["guantesCaucho"];
        $guantesVaqueta = $_POST ["guantesVaqueta"];
        $guantesNitrilo = $_POST ["guantesNitrilo"];
        $protAuditivo = $_POST ["protAuditivo"];
        $protAuditivoCopa = $_POST ["protAuditivoCopa"];
        $tapabocas = $_POST ["tapabocas"];
        $gafas = $_POST ["gafas"];
        $barbuquejo = $_POST ["barbuquejo"];
        $firmaResponsable = $_POST ["firmaResponsable"];
        $firmaTrabajador = $_POST ["firmaTrabajador"];
        $fechaFormulario = $_POST ["fechaFormulario"];


        $query_subirDatos= "INSERT INTO formulario_dotacion (nombresCompletos,docAspirante,docRecHum,cargo,pct,fechaEntrega,casco,overol,botasMaterial,botasCaucho,guantesCarnaza,guantesCaucho,guantesVaqueta,guantesNitrilo,protAuditivo,protAuditivoCopa,tapabocas,gafas,barbuquejo,firmaRRHH,firmaTrabajador,fechaFormulario) 
        VALUES ('$nombres','$docAspirante','$docRecHum','$cargo','$proceso','$fehaEntrega','$casco','$overol','$botasMaterial','$botasCaucho','$guantesCarnaza','$guantesCaucho','$guantesVaqueta','$guantesNitrilo','$protAuditivo','$protAuditivoCopa','$tapabocas','$gafas','$barbuquejo','$firmaResponsable','$firmaTrabajador','$fechaFormulario')";
        mysqli_query($conn, $query_subirDatos);

        echo "<script> alert('El formulario de dotación fue cargado correctamente.'); window.location='../estadoLog/logtrue/recursosHumanos/formularios/dotacion.html' </script>";
        
        mysqli_close($conn);

    }

    function actualizar ($conn) {

        $nombres = $_POST ["nombres"];
        $docAspirante = $_POST ["docAspirante"];
        $docRecHum = $_POST["docRecHum"];
        $cargo = $_POST ["cargo"];
        $proceso = $_POST ["proceso"];
        $fehaEntrega = $_POST ["fechaEntrega"];
        $casco = $_POST ["casco"];
        $overol = $_POST ["overol"];
        $botasMaterial = $_POST ["botasMaterial"];
        $botasCaucho = $_POST ["botasCaucho"];
        $guantesCarnaza = $_POST ["guantesCarnaza"];
        $guantesCaucho = $_POST ["guantesCaucho"];
        $guantesVaqueta = $_POST ["guantesVaqueta"];
        $guantesNitrilo = $_POST ["guantesNitrilo"];
        $protAuditivo = $_POST ["protAuditivo"];
        $protAuditivoCopa = $_POST ["protAuditivoCopa"];
        $tapabocas = $_POST ["tapabocas"];
        $gafas = $_POST ["gafas"];
        $barbuquejo = $_POST ["barbuquejo"];
        $firmaResponsable = $_POST ["firmaResponsable"];
        $firmaTrabajador = $_POST ["firmaTrabajador"];
        $fechaFormulario = $_POST ["fechaFormulario"];


        $query_actuDatos= "UPDATE formulario_dotacion SET nombresCompletos='$nombres',docRecHum='$docRecHum',cargo='$cargo',pct='$proceso',
        fechaEntrega='$fehaEntrega',casco='$casco',overol='$overol',botasMaterial='$botasMaterial',botasCaucho='$botasCaucho',
        guantesCarnaza='$guantesCarnaza',guantesCaucho='$guantesCaucho',guantesVaqueta='$guantesVaqueta',guantesNitrilo='$guantesNitrilo',
        protAuditivo='$protAuditivo',protAuditivoCopa='$protAuditivoCopa',tapabocas='$tapabocas',gafas='$gafas',barbuquejo='$barbuquejo',
        firmaRRHH='$firmaResponsable',firmaTrabajador='$firmaTrabajador',fechaFormulario='$fechaFormulario' 
        WHERE docAspirante='$docAspirante' AND docRecHum='$docRecHum'";
        
        mysqli_query($conn, $query_actuDatos);

        echo "<script> alert('El formulario de dotación fue actualizado correctamente.'); window.location='../estadoLog/logtrue/recursosHumanos/formularios/dotacion.html' </script>";
        
        mysqli_close($conn);
    
    }
    
    function dPDF($conn) {

        require_once 'pdfLibreria/fpdf.php';
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
                $this->Ln(30);
                $this->Cell(384,20, utf8_decode ('FORMATO DE ENTREGA DE DOTACIÓN Y ELEMENTOS DE PROTECCIÓN PERSONAL EPP'), 0, 1,'C');
                // Line break
                $this->Ln(2);
            }

            //Función si se quiere escribir un texto || Colocar variable $html
            function WriteHTML($html){
                
                // HTML parser || Analizador de HTML
                $html = str_replace("\n",' ',$html);
                $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
                foreach ($a as $i=>$e) {
                    if ($i%2==0) {
                        $this->Write(5,$e);
                    }
                    else {
                        if($e[0]=='/')
                            $this->CloseTag(strtoupper(substr($e,1)));
                        else {
                            $a2 = explode(' ',$e);
                            $tag = strtoupper(array_shift($a2));
                            $attr = array();
                            foreach ($a2 as $v) {
                                if (preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
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
                $this->Cell(0,10, utf8_decode ('Página ').$this->PageNo(),0,0,'C');
            }

        }
        
        $docAspirante = $_POST["docAspirante"];

        //adding - idFormularioD & estadoDotacion
        $consulta = "SELECT * FROM formulario_dotacion WHERE docAspirante = '$docAspirante'";
    
        $resul = mysqli_query($conn, $consulta);
    
        //Generar nuevo PDF
        $pdf = new PDF('L','mm','A3');
        //Definición de márgenes del pdf
        $pdf->SetLeftMargin(21);
        $pdf->SetRightMargin(21);
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

            $pdf->Cell(94.5,15, utf8_decode ('Nombre del Trabajador'), 1, 0, 'C');
            $pdf->Cell(94.5,15, utf8_decode ('Cédula del Trabajador'), 1, 0, 'C');
            $pdf->Cell(94.5,15, utf8_decode ('Cargo del Trabajador'), 1, 0, 'C');
            $pdf->Cell(94.5,15, utf8_decode ('Proceso y/o Centro de trabajo'), 1, 1, 'C');

            $pdf->SetFont('Arial','',15);
            
            $pdf->Cell(94.5,15, utf8_decode ($row['nombresCompletos']), 1, 0, 'C');
            $pdf->Cell(94.5,15, utf8_decode ($row['docAspirante']), 1, 0, 'C');
            $pdf->Cell(94.5,15, utf8_decode ($row['cargo']), 1, 0, 'C');
            $pdf->Cell(94.5,15, utf8_decode ($row['pct']), 1, 1, 'C');
            
            $pdf->SetFont('Arial','B',15);
    
            $pdf->Cell(54,15, utf8_decode ('Fecha de Entrega'), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ('Casco'), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ('Overol'), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ('Botas Material'), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ('Botas de Caucho'), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ('Guantes Carnaza'), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ('Guantes Caucho'), 1, 1, 'C');

            $pdf->SetFont('Arial','',15);

            $pdf->Cell(54,15, utf8_decode ($row['fechaEntrega']), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ($row['casco']), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ($row['overol']), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ($row['botasMaterial']), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ($row['botasCaucho']), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ($row['guantesCarnaza']), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ($row['guantesCaucho']), 1, 1, 'C');

            $pdf->SetFont('Arial','B',15);

            $pdf->Cell(54,15, utf8_decode ('Guantes Vaqueta'), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ('Guantes Nitrilo'), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ('Prot. Auditivo'), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ('Prot. Auditivo Copa'), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ('Tapabocas'), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ('Gafas'), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ('Barbuquejo'), 1, 1, 'C');

            $pdf->SetFont('Arial','',15);

            $pdf->Cell(54,15, utf8_decode ($row['guantesVaqueta']), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ($row['guantesNitrilo']), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ($row['protAuditivo']), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ($row['protAuditivoCopa']), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ($row['tapabocas']), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ($row['gafas']), 1, 0, 'C');
            $pdf->Cell(54,15, utf8_decode ($row['barbuquejo']), 1, 1, 'C');
    
            $pdf->SetFont('Arial','B',15);

            $pdf->Cell(94.5,15, utf8_decode ('Cédula del Responsable'), 1, 0, 'C');
            $pdf->Cell(94.5,15, utf8_decode ('Firma del Responsable'), 1, 0, 'C');
            $pdf->Cell(94.5,15, utf8_decode ('Firma del Trabajador'), 1, 0, 'C');
            $pdf->Cell(94.5,15, utf8_decode ('Fecha del Formulario'), 1, 1, 'C');
    
            $pdf->SetFont('Arial','',15);

            $pdf->Cell(94.5,50, utf8_decode ($row['docRecHum']), 1, 0, 'C');
            $pdf->Cell(94.5,50, utf8_decode ($row['firmaRRHH']), 1, 0, 'C');
            $pdf->Cell(94.5,50, utf8_decode ($row['firmaTrabajador']), 1, 0, 'C');
            $pdf->Cell(94.5,50, utf8_decode ($row['fechaFormulario']), 1, 1, 'C');

        }
        
        $html = utf8_decode ('         EN CUMPLIMIENTO DE LOS DEBERES COMO TRABAJADOR DEFINIDOS EN LA LEY A TRAVES DE LA SIGUIENTE NORMATIVIDAD: CODIGO <br>
                            SUSTANTIVO DEL TRABAJO ART. 56 Y ART. 58 NUMERAL 7; LEY 9 DE 1979, ART DECRETO 1295 DE 1994 ART. 22');
        $pdf->Cell(0, 22, (''), 1, 0, 'C');

        //Impresión del html || Variable $html
        $pdf->WriteHTML($html);

        $pdf -> Output();
    }
?>