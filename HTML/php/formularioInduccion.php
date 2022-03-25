<?php

    include("conexion.php");

    #Identificar cada variable de vinculacion con la pagina y la base de datos.
    #Insertar a la base de datos los datos ingresados en cada campo del formulario.

    if(isset($_POST['sendIndu'])) {
        insertar($conn);
    } 

    function insertar ($conn) {

        $docAspirante = $_POST ["docAspirante"];
        /* $docRecHum = $_POST["docRecHum"]; */
        $objetivo = $_POST["objetivo"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $lugar = $_POST["lugar"];
        $oficinaPrincipal = $_POST["oficinaPrincipal"];
        $responsables = $_POST["responsables"];
        $cargoResponsable = $_POST["cargoResponsable"];
        $tema = $_POST["tema"];
        $numLista = $_POST["numLista"];
        $nombresCompletos = $_POST["nombresCompletos"];
        $cargoAspirante = $_POST["cargoAspirante"];
        $firmaAspirante = $_POST["firmaAspirante"];
        $firmaResponsable = $_POST["firmaResponsable"];


        $query_subirDatos= "INSERT INTO formulario (idFormulario,tipoFormulario,archivoFormulario,fechaFormulario,docRecHum,docAspirante) VALUES ('$idFormulario','$tipoF','$archivoF','$fechaF','$docRecHumS','$docA')";
        mysqli_query($conn, $query_subirDatos);
        
        echo "<script> alert('El formulario de inducción fue cargado correctamente.'); window.location='../estadoLog/logtrue/recursosHumanos/formularios/induccion.html' </script>";
        
        mysqli_close($conn);
    }
    
    insertar($conn);
?>