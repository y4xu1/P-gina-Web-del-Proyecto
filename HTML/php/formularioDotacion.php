<!-- Vinculacion con la paginas dotacion e induccion -->
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

        echo "<script> alert('El formulario de dotación fue cargado correctamente.'); window.location='../estadoLog/logtrue/recursosHumanos/formularios/dotacion.html' </script>";
        
        mysqli_close($conn);

    }

    insertar($conn);

    /*if (isset($_POST['sendIndu'])) {
        insertar($conn);
        echo "<script> alert('El formulario de inducción fue cargado correctamente.'); window.location='../estadoLog/logtrue/recursosHumanos/formularios/induccion.html' </script>";
    } else {
        #echo "<h4>Error: </h4><br><h3>" . mysqli_error($conn) . "</h3>";
    }
    
    if (isset($_POST['sendDota'])) {
        insertar($conn);
        echo "<script> alert('El formulario de dotación fue cargado correctamente.'); window.location='../estadoLog/logtrue/recursosHumanos/formularios/dotacion.html' </script>";
    } else {
        #echo "<h4>Error: </h4><br><h3>" . mysqli_error($conn) . "</h3>";
    }*/

?>