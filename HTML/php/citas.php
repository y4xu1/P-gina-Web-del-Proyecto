<?php

include("Conexion.php");


insertar($conn);
function insertar ($conn){
 $docA=$_POST["docAspirante"];
 $correo=$_POST["Correo"];
 $medicos=$_POST["medicos"]; 
 $fechaH=$_POST["Fechadehoy"]; 
 $horaH=$_POST["Horadehoy"]; 
 $fechaC=$_POST["Fechadecita"]; 
 $horasC=$_POST["horas"]; 


 $consulta= "INSERT INTO citasmedicas (docAspirante,nombresCompletosDoc,diaHoy,horaHoy,diaCita,horaCita,correoElectronico) VALUES ('$docA','$medicos','$fechaH','$horaH','$fechaC','$horasC','$correo')";
 mysqli_query($conn,$consulta);
    mysqli_close($conn);
}

#Actualizar dios quiera que funcione o si no valimos

$docA=$_POST["docAspirante"];
 $correo=$_POST["Correo"];
 $medicos=$_POST["medicos"]; 
 $fechaH=$_POST["Fechadehoy"]; 
 $horaH=$_POST["Horadehoy"]; 
 $fechaC=$_POST["Fechadecita"]; 
 $horasC=$_POST["horas"];


if(isset($_POST['btnActualizar'])){
    $query = mysqli_query($conn,"UPDATE citasmedicas SET password='$pass' WHERE numIdentificacion='$nombre'");
   $nr = mysqli_num_rows($query);

}else {
        echo "<script> alert('Error al actualizar'); window.location='Index.html'</script>";
   }
