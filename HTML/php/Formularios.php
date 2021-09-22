<?php

include("conexion.php");


insertar($conn);
function insertar ($conn){
 $docA=$_POST["docAspirante"];
 $idFormulario=$_POST["idFormulario"];
 $tipoF=$_POST["tipoFormulario"]; 
 $fechaF=$_POST["fechaFormulario"]; 
 $docRecHumS=$_POST["docRecHum"]; 
 $archivoF=$_POST["archivoFormulario"]; 


 $consulta= "INSERT INTO formulario (idFormulario,tipoFormulario,archivoFormulario,fechaFormulario,docRecHum,docAspirante) VALUES ('$idFormulario','$tipoF','$archivoF','$fechaF','$docRecHumS','$docA')";
 mysqli_query($conn,$consulta);
    mysqli_close($conn);
}
?>