<?php

    include("conexion.php");

    #Identificar cada variable de vinculacion con la pagina y la base de datos.
    #Insertar a la base de datos los datos ingresados en cada campo del formulario.

    function insertar ($conn){
        
        $docA=$_POST["docAspirante"];
        $idFormulario=$_POST["idFormulario"];
        $tipoF=$_POST["tipoFormulario"]; 
        $fechaF=$_POST["fechaFormulario"]; 
        $docRecHumS=$_POST["docRecHum"]; 
        $archivoF=$_POST["archivoFormulario"]; 
        
        $query_subirDatos= "INSERT INTO formulario (idFormulario,tipoFormulario,archivoFormulario,fechaFormulario,docRecHum,docAspirante) VALUES ('$idFormulario','$tipoF','$archivoF','$fechaF','$docRecHumS','$docA')";
        mysqli_query($conn, $query_subirDatos);
        
        echo "<script> alert('El formulario de inducción fue cargado correctamente.'); window.location='../estadoLog/logtrue/recursosHumanos/formularios/induccion.html' </script>";
        
        mysqli_close($conn);
    }
    
    insertar($conn);
?>