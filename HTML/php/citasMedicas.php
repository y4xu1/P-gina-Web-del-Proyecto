<?php

include("conexion.php");

diferencia($conn);

function diferencia($conn){
if(isset($_POST ['enviar'])){
insertar($conn);
}
if(isset($_POST ['eliminar'])){
eliminar ($conn);
}
}

function insertar ($conn){
    $docA=$_POST["docAspirante"];
    $correo=$_POST["Correo"];
    $medicos=$_POST["medicos"]; 
    $fechaH=$_POST["Fechadehoy"]; 
    $horaH=$_POST["Horadehoy"]; 
    $fechaC=$_POST["Fechadecita"]; 
    $horasC=$_POST["horas"]; 
    $numOrden=$_POST["numOrden"];

    if (isset($_POST['enviar'])) {
        
        $consulta= "INSERT INTO citasmedicas (docAspirante,nombresCompletosDoctor,diaHoy,horaHoy,diaCita,horaCita,correoElectronicoAspirante) VALUES ('$docA','$medicos','$fechaH','$horaH','$fechaC','$horasC','$correo')";
        mysqli_query($conn,$consulta);

        $factura = "SELECT * FROM citasmedicas WHERE docAspirante = '$docA'";
        $facturaDatos = mysqli_query($conn, $factura);
        $lista = mysqli_fetch_array($facturaDatos);

            echo "<style>";
                echo "table {border: 2px groove black;}";
                echo "th, td {border: 1px solid black;}";
                echo "img {width: 15%; float: inline-end;}";
            echo "</style>";
            echo "<img src='../../Imagenes/logoProyect/Logo_Trascendental.png'>";
            echo "<table>";
                echo "<h2>Agención de cita realizada con exito</h2>";
                echo "<p>Tenga en cuenta la siguiente información al realizar su cita medica.<p/>";
                echo "<p>Tome un pantallazo o una foto (en la que se aprecie bien los datos) para evidencia de la agendación.</p><br><br>";
                echo "<thead>";
                    echo "<th>Numero de referencia</th>";
                    echo "<th>Número de identificación</th>";
                    echo "<th>Correo electrónico</th>";
                    echo "<th>Nombre del médico</th>";
                    echo "<th>Fecha y hora de solicitud de la cita</th>";
                    echo "<th>Fecha y hora de la cita</th>";
                echo "</thead>";
                echo "<tbody>";
                    echo "<tr>";
                    echo "<td>" . $lista['numOrden'] . "</td>";
                    echo "<td>" . $lista['docAspirante'] . "</td>";
                    echo "<td>" . $lista['correoElectronicoAspirante'] . "</td>";
                    echo "<td>" . $lista['nombresCompletosDoctor'] . "</td>";
                    echo "<td>" . $lista['diaHoy'] . " - " . $lista['horaHoy'] ."</td>";
                    echo "<td>" . $lista['diaCita'] . " - " . $lista['horaCita'] ."</td>";
                    echo "</tr>";
                echo "</tbody>";
            echo "</table><br>";
            echo "<a href='../estadoLog/logtrue/aspirantes/Agendar_citas.html'>Volver</a>";
        /*
        echo "<input type='submit' name='volver' value='Volver'>";
        if (isset($_POST['volver'])) {
            #echo "<script> window.location='../estadoLog/logtrue/aspirantes/Perfil_Aspirante.html'; </script>";
            echo "<script> window.location='../estadoLog/logtrue/aspirantes/Agendar_citas.html'; </script>";
        }
        else {
            echo "<script> alert('Hubo un error, vuelva a intentar') </script>";
        }
        */
        /*
        =facturaMedica ();
        function facturaMedica ($conn){
            de la linea 31
        }
        */
    }
    else {
        echo "<script> alert('Hubo un error al agendar su cita, por favor verfique.'); window.location='../estadoLog/logtrue/aspirantes/Agendar_citas.html' </script>";
    }
    #echo "<script></script>"
    mysqli_close($conn);
}

function eliminar ($conn){
    $docA=$_POST["docAspirante"];
    $correo=$_POST["Correo"];
    $medicos=$_POST["medicos"];
    $fechaH=$_POST["Fechadehoy"];
    $horaH=$_POST["Horadehoy"];
    $fechaC=$_POST["Fechadecita"];
    $horasC=$_POST["horas"];
    $numOrden=$_POST["numOrden"];

    if (isset($_POST['eliminar'])) {
        $eliminar= "DELETE FROM citasmedicas WHERE CONCAT(citasmedicas.numOrden) = '$numOrden'";
        mysqli_query($conn, $eliminar);
        echo "<script> window.location='../estadoLog/logtrue/aspirantes/Agendar_citas.html'; alert('Cancelación de cita realizada con exito') </script>";
    }
    else {
        echo "<script> alert('Hubo un error al cancelar la cita'); window.location='../estadoLog/logtrue/aspirantes/Agendar_citas.html' </script>";
    }

    mysqli_close($conn);
}

?>