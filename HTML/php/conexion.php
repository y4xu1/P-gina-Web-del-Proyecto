<!-- Este archivo menciona la conexión con la Base de Datos -->
<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "bdtrascendental2";
    
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if(!$conn){
        die("No hay conexion: " .mysqli_connect_error());
    }
?>