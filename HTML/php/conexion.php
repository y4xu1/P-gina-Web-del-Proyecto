<!-- Este archivo menciona la conexión con la Base de Datos -->
<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "trascendental";
    
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    #$dbconn=new PDO("mysql:host=$dbhost; dbname=$dbname", $dbuser, $dbpass);

    if(!$conn){
        die("No hay conexion: " .mysqli_connect_error());
    }
?>


<!-- Este archivo menciona la conexión con la Base de Datos -->
<?php

    /*
    $dbhost = "sql113.epizy.com";
    $dbuser = "epiz_30314340";
    $dbpass = "5OAed2DGHV";
    $dbname = "epiz_30314340_bdtrascendental";
    
    $conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

    if(!$conn){
        die("No hay conexion: " .mysqli_connect_error());
    }
    echo ("conexion establecida");
    */

?>