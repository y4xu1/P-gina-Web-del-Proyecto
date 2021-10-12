<?php

include("conexion.php");

// diferencia($conn);

// function diferencia($conn){
// if(isset($_POST ['enviar'])){
// insertar($conn);
// }


insertar($conn);
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
        echo "<script> alert('La cita fue agendada correctamente '); window.location='../estadoLog/logtrue/aspirantes/Agendar_citas.html' </script>"  
    }
    else {
        echo "<script> alert('Hubo un error al agendar su cita, por favor verfique.'); window.location='../estadoLog/logtrue/aspirantes/Agendar_citas.html' </script>";
    }
    #echo "<script></script>"
    mysqli_close($conn);
}


?>