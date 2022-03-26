<?php

    include("conexion.php");

    #Identificar cada variable de vinculacion con la pagina y la base de datos.
    #Insertar a la base de datos los datos ingresados en cada campo del formulario.

    if(isset($_POST['sendIndu'])) {
        insertar($conn);
    } 

    //insertar($conn);
    function insertar($conn) {

        $docAspirante = isset($_POST ["docAspirante"]);
        $docRecHum = isset($_POST["docRecHum"]);
        $objetivo = isset($_POST["objetivo"]);
        $fecha = isset($_POST["fecha"]);
        $hora = isset($_POST["hora"]);
        $lugar = isset($_POST["lugar"]);
        $oficinaPrincipal = isset($_POST["oficinaPrincipal"]);
        $responsables = isset($_POST["responsables"]);
        $cargoResponsable = isset($_POST["cargoResponsable"]);
        $tema = isset($_POST["tema"]);
        $numLista = isset($_POST["numLista"]);
        $nombresCompletos = isset($_POST["nombresCompletos"]);
        $cargoAspirante = isset($_POST["cargoAspirante"]);
        //$firmaAspirante = isset($_POST["firmaAspirante"]);
        //$firmaResponsable = isset($_POST["firmaResponsable"]);

        //echo '<script>alert("si");</script>';

        $consulta = "INSERT INTO formulario_induccion (docAspirante, docRRHH, objetivo, fecha, hora, lugar, oficinaPrincipal, responsables, cargoResponsable, tema, numLista,
        nombresCompletos, cargoAspirante) VALUES ('$docAspirante', '$docRecHum' '$objetivo', '$fecha', '$hora', '$lugar', '$oficinaPrincipal', '$responsables',
        '$cargoResponsable', '$tema', '$numLista', '$nombresCompletos', '$cargoAspirante')"; //, firmaAspirante, firmaResponsable--, '$firmaAspirante', '$firmaResponsable'

        //echo '<script>alert("si x2");</script>';

        mysqli_query($conn, $consulta);

        echo '<script>alert("si x3");</script>';

        if (mysqli_query($conn, $consulta) == true) {
            
            echo "<script> alert('El formulario de inducción fue cargado correctamente.'); window.location='../estadoLog/logtrue/recursosHumanos/formularios/induccion.html' </script>";
        }
        else {

            echo "<script> alert('fuck'); window.location='../estadoLog/logtrue/recursosHumanos/formularios/induccion.html' </script>";
        }
        
        mysqli_close($conn);
    }

?>
<!--
< ?php


for ($a==1; $a<=30; $a++) {
    echo '  <tr>
                <td><input class="control'. $a . '" type="text" name="numLista'. $a . '" id="numLista" value="'. $a . '" disabled></td>
                <td><input class="control'. $a . '" type="text" name="nombresCompletos'. $a . '" id="nombresCompletos" placeholder="Pepito Pérez"></td>
                <td><input class="control'. $a . '" type="text" name="cargoAspirante'. $a . '" id="cargoAspirante" placeholder="Asistencia"></td>
                <td><input class="control'. $a . '" type="text" name="docAspirante'. $a . '" id="docAspirante" placeholder="9999999999"></td>
                <td><input class="control'. $a . '" type="text" name="firmaAspirante'. $a . '" id="firmaAspirante" placeholder="Adjunte su firma dígital"></td>
            </tr>';
}

?>