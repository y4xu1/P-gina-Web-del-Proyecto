<!--
    Cumple una función de seguridad sobre el ingreso a las herramientas de la plataforma vinculada con los archivos de logeo y de
    registro en la plataforma
-->
<?php

include("Conexion.php");

$nombre = $_POST['usuario'];
$pass = $_POST['pass'];
$rol = $_POST['TipoRol'];

/*
#Session
session_start();
 
#linea 14 segura
$_SESSION["username"] = $nombre;
 
 
#linea 18 a 26 sin total seguridad
if (isset($_SESSION["username"])!==true) {
#if (isset($_SESSION(["username"])!==false) {
 
#if (isset($_SESSION(["username"])))  {
    #session_destroy();
}
else {
    session_destroy();
}
*/


# Función de iniciar sesión
# Login
    if(isset($_POST['btningresar'])){
        $query = mysqli_query($conn,"SELECT * FROM usuarios WHERE numIdentificacion = '$nombre' AND password = '$pass' AND estadoUsuarios = 1");
        $nr = mysqli_num_rows($query);

        if($nr==1){

            switch($rol){
                case /*"ASPIRANTE" || "aspirante" || "Aspirante" ||*/ 1:
                    echo "<script> alert('Bienvenido $nombre'); window.location='../estadoLog/logtrue/aspirantes/Perfil_Aspirante.html'</script>";
                    break;
                case /*"RECURSOS HUMANOS" || "recursos humanos" || "Recursos humanos" || "Recursos Humanos" || "recursos Humanos" ||*/ 2:
                    echo "<script> alert('Bienvenido $nombre'); window.location='../estadoLog/logtrue/recursosHumanos/aspirantes.php'</script>"; 
                    break;

                default: "<script> alert('ERROR'); window.location='.../estadoLog/Inicio_Sesión.html'</script>";
            }
        }
        else {
           echo "<script> alert('Usuario no existe o se encentra bloqueado'); window.location='../estadoLog/Inicio_Sesión.html'</script>";
        }
    }
    /*else {
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }*/

# Función de registro de un usuario

    $codigoaceptacion = $_POST['aceptacion'];

    #Registrar
    if(isset($_POST["btnregistrar"])){
        $sqlgrabar = "INSERT INTO usuarios(numIdentificacion, password, TipoRol, codigoAceptacion, estadoUsuarios) VALUES ('$nombre', '$pass', '$rol', 1, 1)";

        if($codigoaceptacion=='disser123'){

            if(mysqli_query($conn,$sqlgrabar)){
                echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='../estadoLog/Inicio_Sesión.html'</script>";
            }
            else{
                   echo "<script> alert('error'); window.location='../estadoLog/Registro.html'</script>";
            }
        }
        else {
            echo "<script>alert('Código incorrecto, verfique.')</script>";
        }
    }
    else {
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    } 

?>