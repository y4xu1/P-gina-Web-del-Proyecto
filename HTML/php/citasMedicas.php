<?php

include("conexion.php");


insertar($conn);
function insertar ($conn){
 $docA=$_POST["docAspirante"];
 $correo=$_POST["Correo"];
 $medicos=$_POST["medicos"]; 
 $fechaH=$_POST["Fechadehoy"]; 
 $horaH=$_POST["Horadehoy"]; 
 $fechaC=$_POST["Fechadecita"]; 
 $horasC=$_POST["horas"]; 


 $consulta= "INSERT INTO citasmedicas (docAspirante,nombresCompletosDoctor,diaHoy,horaHoy,diaCita,horaCita,correoElectronicoAspirante) VALUES ('$docA','$medicos','$fechaH','$horaH','$fechaC','$horasC','$correo')";
 mysqli_query($conn,$consulta);
    mysqli_close($conn);
}
?>