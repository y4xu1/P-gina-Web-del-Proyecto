<?php

include("Conexion.php");


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
            $consulta= "INSERT INTO contrato (idContrato,tipoContrato,docAspirante,docRecHum,tipoCargoDesp,salario,valorPrestaciones,fechaInicio,nombreObra,ciudadObra,firma) VALUES ('$idContrato','$tipoContrato','$docAspirante','$docRecursos','$cargo','$Salario','$valor','$fecha', '$obra',' $cuidad','$firma')";
            echo "<script> window.location'../estadoLog/logtrue/recursosHumanos/contratos/Contrato_Fijo.html' </script>";
            /*if (mysqli_query($conn, $consulta)) {
                echo "<script> alert('Se a finalizado la acción con exito'); window.location'../estadoLog/logtrue/recursosHumanos/contratos/Contrato_Fijo.html' </script>";
            }
            else {
                echo "<script> alert('Hubo un error al enviar'); window.location'../estadoLog/logtrue/recursosHumanos/contratos/Contrato_Fijo.html' </script>";
            }*/
        }
        else {
            echo "Error: ".$sql."<br>".mysqli_error($conn);
        }
        
        mysqli_query($conn,$consulta);
        mysqli_close($conn);

}

?>