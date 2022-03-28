<?php

    include("conexion.php");

    #Identificar cada variable de vinculacion con la pagina y la base de datos.
    #Insertar a la base de datos los datos ingresados en cada campo del formulario.

    if(isset($_POST['sendIndu'])) {
        insertar($conn);
    } 

    function insertar($conn) {

        $cantAsp = $_POST['cantAsp'];

        for ($x=1; $x<=$cantAsp; $x++) {

            $docAspirante = $_POST [$x . "docAspirante"];
            $docRecHum = $_POST["docRecHum"];
            $objetivo = $_POST["objetivo"];
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $lugar = $_POST["lugar"];
            $oficinaPrincipal = $_POST["oficinaPrincipal"];
            $responsables = $_POST["responsables"];
            $cargoResponsable = $_POST["cargoResponsable"];
            $tema = $_POST["tema"];
            $numLista = $_POST[$x . "numLista"];
            $nombresCompletos = $_POST[$x . "nombresCompletos"];
            $cargoAspirante = $_POST[$x . "cargoAspirante"];
            $firmaAspirante = $_POST[$x . "firmaAspirante"];
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
<script>

    <?php

    ?>

</script>
<!--

---------
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