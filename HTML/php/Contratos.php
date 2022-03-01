<!--Vinculacion con la pagina de Contratos --> 
<?php

include("conexion.php");

// diferenciación de cada botón encontrado en la página.
diferencia($conn);

function diferencia($conn){
    if(isset($_POST ['btnregistrar'])){
        insertar($conn);
    }
    if(isset($_POST ['btnActualizar'])){
        actualizar ($conn);
    }
    if (isset($_POST['btnPdf'])){
        pdfDoc($conn);
    }
}

//Identificar cada variable de vinculacion con la pagina y la base de datos.
//Insertar a la base de datos los datos ingresados en cada campo del formulario.
insertar($conn);
    function insertar ($conn){
        $idContrato=$_POST["idcontrato"];
        $tipoContrato=$_POST["tipoContrato"];
        $docAspirante=$_POST["docAspirante"];
        $docRecursos=$_POST["docRecursos"];
        $cargo=$_POST["Cargo"]; 
        $Salario=$_POST["Salario"]; 
        $valor=$_POST["Valorprestaciones"]; 
        $fecha=$_POST["Fechainiciación"]; 
        $obra=$_POST["Nombreobra"]; 
        $cuidad=$_POST["Ciudadcontratado"];
        $firma=$_POST["Firma"];

        
        if (isset($_POST["btnregistrar"])) {
            $consulta= "INSERT INTO contrato (idContrato,tipoContrato,docAspirante,
            docRecHum,tipoCargoDesp,salario,valorPrestaciones,fechaInicio,nombreObra,ciudadObra,firma)
             VALUES ('$idContrato','$tipoContrato','$docAspirante','$docRecursos','$cargo','$Salario',
             '$valor','$fecha', '$obra',' $cuidad','$firma')";
            
            mysqli_query($conn,$consulta);
            
            echo "<script> alert('El contrato fue cargado correctamente.'); window.location='../estadoLog/logtrue/recursosHumanos/Contratos.html' </script>";  
            /*
            //echo "<script> window.location'../estadoLog/logtrue/recursosHumanos/contratos/Contrato_Fijo.html' </script>";
            if (mysqli_query($conn, $consulta)) {
                echo "<script> alert('Se a finalizado la acción con exito'); window.location'../estadoLog/logtrue/recursosHumanos/contratos/Contrato_Fijo.html' </script>";
            }
            else {
                echo "<script> alert('Hubo un error al enviar'); window.location'../estadoLog/logtrue/recursosHumanos/contratos/Contrato_Fijo.html' </script>";
            }
            */
        }
        else {
            //echo "Error: ". $sql ."<br>". mysqli_error($conn);
            //echo "Error " . mysqli_error($conn) . "<br>";
            echo "<a href='../estadoLog/logtrue/recursosHumanos/Contratos.html'>volver</a>";           
        }
   
        //mysqli_close($conn);

}

//BotÓn Actualizar
//Actualizar los datos encontrados en la base de datos por los datos obtenidos en el formulario. 

function actualizar($conn){
    $idContrato=$_POST["idcontrato"];
        $tipoContrato=$_POST["tipoContrato"];
        $docAspirante=$_POST["docAspirante"];
        $docRecursos=$_POST["docRecursos"];
        $cargo=$_POST["Cargo"]; 
        $Salario=$_POST["Salario"]; 
        $valor=$_POST["Valorprestaciones"]; 
        $fecha=$_POST["Fechainiciación"]; 
        $obra=$_POST["Nombreobra"]; 
        $cuidad=$_POST["Ciudadcontratado"];
        $firma=$_POST["Firma"];
    
       if(isset($_POST['btnActualizar'])){
          $query = mysqli_query($conn,"UPDATE contrato SET tipoContrato='$tipoContrato', docAspirante='$docAspirante', docRecHum='$docRecursos', tipoCargoDesp='$cargo', salario='$Salario', valorPrestaciones='$valor',fechaInicio='$fecha', nombreObra='$obra', ciudadObra='$cuidad',firma='$firma' WHERE idContrato='$idContrato'");
          mysqli_close($conn);

        echo "<script> alert('El contrato fue actualizado correctamente.'); window.location='../estadoLog/logtrue/recursosHumanos/Contratos.html' </script>";  
    
       }
       else {
             echo "<script> alert('Error al actualizar'); window.location='../../index.html'</script>";
          }
    }

    function pdfDoc($conn) {

        require 'pdfLibreria/fpdf.php';
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

        $dato = $_POST['docAspirante'] || $_POST['idContrato'];
        $consulta = "SELECT tipoContrato, PnombreAspirante, PapellidoAspirante
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
          
            /* $pdf->Cell(60,10, 'Apellido', 1, 0, 'C', 0);
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
            $pdf->Cell(25,10, $row['ciudadObra'], 1, 1, 'C', 0); */

        }

        $pdf -> Output();
    }

?>