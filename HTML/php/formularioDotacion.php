<?php

    include("conexion.php");

    #Identificar cada variable de vinculacion con la pagina y la base de datos.
    #Insertar a la base de datos los datos ingresados en cada campo del formulario.
    
    if(isset($_POST['sendDota'])) {
        insertar($conn);
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

    insertar($conn);

?>