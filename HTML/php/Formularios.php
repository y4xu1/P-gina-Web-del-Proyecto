<!-- Vinculacion con la paginas dotacion e induccion -->
<?php

include("conexion.php");

#Identificar cada variable de vinculacion con la pagina y la base de datos.
#Insertar a la base de datos los datos ingresados en cada campo del formulario.
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