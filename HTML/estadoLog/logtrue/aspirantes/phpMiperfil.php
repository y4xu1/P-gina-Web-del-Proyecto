<?php
    //Inclusión de la conexión con la BD
    include ('../../../php/conexion.php');
session_start();

function cargardata($conn){

$jun = $_SESSION['doc'];
    $consulta = "SELECT * FROM aspirante where docAspirante='$_SESSION[doc]'";
    $resultado =mysqli_query($conn, $consulta);

    while($fila = mysqli_fetch_array($resultado)){
 
     echo "<label for=''> Rol: </label>";
     echo "<h3>". $fila['tipoCargo']."</h3> ";
     echo "<hr>";
     echo "<label for='nombre'> Nombre: </label>";
     echo "<h3>". $fila['PnombreAspirante']." ".$fila['PapellidoAspirante']."</h3>";
     echo "<hr>";
     echo "<label for='documento'> Documento: </label>";
     echo "<h3>". $fila['docAspirante']."</h3> ";
     echo "<hr>";
     echo "<label for=''> Numero de contacto: </label>";
     echo "<h3>". $fila['telefonoContacto']."</h3> ";
     echo "<hr>";
     echo "<label for=''> Correo: </label>";
     echo "<h3>". $fila['correoElectronico']."</h3> ";
    }
 }
?>