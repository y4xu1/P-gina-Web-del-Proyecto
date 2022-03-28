<?php

    include("conexion.php");

    #Identificar cada variable de vinculacion con la pagina y la base de datos.
    #Insertar a la base de datos los datos ingresados en cada campo del formulario.

    if(isset($_POST['sendIndu'])) {
        insertar($conn);
    } 

    function insertar($conn) {

        $cantAsp = $_POST['totalAsp'];

        for ($x=1; $x<=$cantAsp; $x++) {

            $docAspirante = $_POST[$x."docAspirante"]; //datos de los aspirantes
            $docRecHum = $_POST["docRecHum"];
            $objetivo = $_POST["objetivo"];
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $lugar = $_POST["lugar"];
            $oficinaPrincipal = $_POST["oficinaPrincipal"];
            $responsables = $_POST["responsables"];
            $cargoResponsable = $_POST["cargoResponsable"];
            $tema = $_POST["tema"];
            $numLista = $_POST[$x."numLista"]; //datos de los aspirantes
            $nombresCompletos = $_POST[$x."nombresCompletos"]; //datos de los aspirantes
            $cargoAspirante = $_POST[$x."cargoAspirante"]; //datos de los aspirantes
            $firmaAspirante = $_POST[$x."firmaAspirante"]; //datos de los aspirantes
            $firmaResponsable = $_POST["firmaResponsable"];

            //$consulta = "INSERT INTO formulario_induccion (objetivo, fecha, hora, lugar, oficinaPrincipal, responsables, cargoResponsable, tema, numLista, nombresCompletos, cargoAspirante, docAspirante, docRecHum, firmaAspirante, firmaResponsable, estadoInduccion) VALUES ('objetivo', '', '', 'lugar', 'oficinaPrincipal', 'responsables', 'cargoResponsable', 'tema', '1', 'nombresCompletos', 'cargoAspirante', '34532270', '76308613', '', '', '')";

            $consulta = "INSERT INTO formulario_induccion (objetivo, fecha, hora, lugar, oficinaPrincipal, responsables, cargoResponsable, tema, numLista,
            nombresCompletos, cargoAspirante, docAspirante, docRecHum, firmaAspirante, firmaResponsable, estadoInduccion)
            VALUES ('$objetivo', '$fecha', '$hora', '$lugar', '$oficinaPrincipal', '$responsables', '$cargoResponsable', '$tema', '$numLista',
            '$nombresCompletos', '$cargoAspirante', '$docAspirante', '$docRecHum', '$firmaAspirante', '$firmaResponsable', '1')";

            //mysqli_query($conn, $consulta);

            if (mysqli_query($conn, $consulta) == true) {
                
                echo "<script> alert('El formulario de inducción fue cargado correctamente.'); window.location='../estadoLog/logtrue/recursosHumanos/formularios/induccion.html' </script>";
            }
            else {

                echo "<script> alert('fuck'); window.location='../estadoLog/logtrue/recursosHumanos/formularios/induccion.html' </script>";
            }
        }

        mysqli_close($conn);
    }

?>