<!--
    Cumple una función de seguridad sobre el ingreso a las herramientas de la plataforma vinculada con los archivos de logeo y de
    registro en la plataforma
-->
<?php

include("conexion.php");

$nombre = $_POST['usuario'];
$pass = $_POST['pass'];
$rol = $_POST['TipoRol'];



/*
#Session
session_start();
 
#linea 14 segura
$_SESSION["username"] = $nombre;
 
 
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
        $consulta = "SELECT * FROM usuarios WHERE numIdentificacion = '$nombre' AND password = '$pass' AND estadoUsuarios = 1";
        $query = mysqli_query($conn,$consulta); 
        
        /*
        echo $consulta;
        echo "<br>";
        var_dump($query);
        */
        
        $nr = mysqli_num_rows($query);

        /*
        echo $consulta;
        echo "<br>";
        echo "numero registros";
        echo "<br>";
        echo $nr;
        exit(0);
        */
        #mysqli_close($conn);

        $consulRol = "SELECT tipoRol FROM usuarios WHERE numIdentificacion='$nombre'";
        $queryRol = mysqli_query($conn, $consulRol);
/*
        if ($queryRol==2) {
            if($nr==1){
                echo "<script> alert('Bienvenido $nombre'); window.location='../estadoLog/logtrue/recursosHumanos/aspirantes.php'</script>"; 
            }
            else {
                echo "<script> alert('Usuario no existe o se encentra bloqueado'); window.location='../estadoLog/Inicio_Sesión.html'</script>";
            }
        }
        elseif ($queryRol==1) {
            if($nr==1){
                echo "<script> alert('Bienvenido $nombre'); window.location='../estadoLog/logtrue/aspirantes/Perfil_Aspirante.html'</script>";
            }
            else {
                echo "<script> alert('Usuario no existe o se encentra bloqueado'); window.location='../estadoLog/Inicio_Sesión.html'</script>";
            }
        }
        else {
            echo "<script> alert('ERROR'); window.location='.../estadoLog/Inicio_Sesión.html'</script>";
        }
*/
            /*
            switch ($queryRol) {
                case 1:
                    echo "<script> alert('Bienvenido $nombre'); window.location='../estadoLog/logtrue/aspirantes/Perfil_Aspirante.html'</script>";
                    break;
                case 2:
                    echo "<script> alert('Bienvenido $nombre'); window.location='../estadoLog/logtrue/recursosHumanos/aspirantes.php'</script>"; 
                    break;
                default:
                    echo "<script> alert('ERROR'); window.location='.../estadoLog/Inicio_Sesión.html'</script>";
            }
            */
        
        if($nr==1){
            
            switch($rol){
                case 1: #"ASPIRANTE" || "aspirante" || "Aspirante" ||
                    echo "<script> alert('Bienvenido $nombre'); window.location='../estadoLog/logtrue/aspirantes/Perfil_Aspirante.html'</script>";
                    break;
                case 2: #"RECURSOS HUMANOS" || "recursos humanos" || "Recursos humanos" || "Recursos Humanos" || "recursos Humanos" ||
                    echo "<script> alert('Bienvenido $nombre'); window.location='../estadoLog/logtrue/recursosHumanos/aspirantes.php'</script>"; 
                    break;

                default: echo "<script> alert('ERROR'); window.location='.../estadoLog/Inicio_Sesión.html'</script>";
            }
        }
        else {
           echo "<script> alert('Usuario no existe o se encentra bloqueado'); window.location='../estadoLog/Inicio_Sesión.html'</script>";
        }
        
        #mysqli_close($conn);
    }
    else {
        echo "Error: ". $sql ."<br>" . mysqli_error($conn);
    }

#Función de registro de un usuario

    $codigoaceptacion = $_POST['aceptacion'];

    #Registrar
    if(isset($_POST["btnregistrar"])){
        $sqlgrabar = "INSERT INTO usuarios(numIdentificacion, password, TipoRol, codigoAceptacion, estadoUsuarios) VALUES ($nombre, '$pass', '$rol', 1, 1)";
        #echo $sqlgrabar;

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