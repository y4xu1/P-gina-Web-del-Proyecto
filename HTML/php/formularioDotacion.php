<!-- Vinculacion con la paginas dotacion e induccion -->
<?php

    include("conexion.php");

    #Identificar cada variable de vinculacion con la pagina y la base de datos.
    #Insertar a la base de datos los datos ingresados en cada campo del formulario.

    function insertar ($conn){
        $Nombres=$_POST["Nombres"];
        $docA=$_POST["docAspirante"];
        $cargo=$_POST["Cargo"];
        $proceso=$_POST["Proceso"];
        $fechaE=$_POST["fechaEntrega"];
        $casco=$_POST["Casco"];
        $overol=$_POST["Overol"];
        $botasMaterial["botasMaterial"];
        $botasCaucho=$_POST["botasCaucho"];
        $guantesCarnaza=$_POST["guantesCarnaza"];
        $guantesVaqueta=$_POST["guantesVaqueta"];
        $guantesNitrilo=$_POST["guantesNitrilo"];
        $protAuditivo=$_POST["protAuditivo"];
        $protAuditivoCopa=$_POST["protAuditivoCopa"];
        $Tapabocas=$_POST["Tapabocas"];
        $Gafas=$_POST["Gafas"];
        $Barbuquejo=$_POST["Barbuquejo"];
        $docRecHum=$_POST["docRecHum"];
        $firmaResponsable=$_POST["firmaResponsable"];
        $firmaTrabajador=$_POST["firmaTrabajador"];
        $fechaFormulario=$_POST["fechaFormulario"];


        $query_subirDatos= "INSERT INTO formulario_dotacion (nombresCompletos,docAspirante,) VALUES ('$Nombres','$docA','$cargo','$proceso','$fechaE','$casco','$overol','$botasMaterial','$botasCaucho','$guantesCarnaza','')";
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