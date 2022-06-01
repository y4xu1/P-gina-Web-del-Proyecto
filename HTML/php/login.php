<!--
    Cumple una función de seguridad sobre el ingreso a las herramientas de la plataforma vinculada con los archivos de logeo y de
    registro en la plataforma
-->
<?php
    include('conexion.php');
?>

<?php
session_start();
#logeo o ingreso al sistema
$nombre = $_POST['usuario'];
$_SESSION['doc']=$nombre;
$pass = $_POST['pass'];
$rol = $_POST['TipoRol'];

if(isset($_POST['btningresar'])) {
     $queryusuario =mysqli_query($conn, "SELECT * FROM usuarios where numIdentificacion = '$_SESSION[doc]'");
     $nr=mysqli_num_rows($queryusuario);
     $buscarpass=mysqli_fetch_array($queryusuario);

     if ($nr==1){

        $consulta ="SELECT * FROM usuarios where numIdentificacion='$_SESSION[doc]'";
        $resultado =mysqli_query($conn, $consulta);
       
        while($fila = mysqli_fetch_array($resultado)){
        
            if($fila['estadoUsuarios']==1){
                
                $consulta ="SELECT * FROM usuarios where numIdentificacion='$_SESSION[doc]'";
                $resultado =mysqli_query($conn, $consulta);
               
                while($fila = mysqli_fetch_array($resultado)){
    
                    if($fila['TipoRol']==1){
                        echo "<script> alert('Bienvenido jojjoj'); window.location='../estadoLog/logtrue/aspirantes/Perfil_Aspirante.php'</script>";
                    }else{
                        echo "<script> alert('Bienvenido jajajaj'); window.location='../estadoLog/logtrue/recursosHumanos/Mi_Perfil.php'</script>";
                    }
                   
                }
            }else{
                echo "<script> alert('su estado en este momento es inactivo'); window.location='../estadoLog/Inicio_Sesión.html'</script>";
            }

       
        }
     }  
     else{
        echo "<script> alert('ERROR:usuario no existe'); window.location='../estadoLog/Inicio_Sesión.html'</script>";
      
     }

}

?>

<?php

    $codigoaceptacion = $_POST['aceptacion'];

    #Registrar
    if(isset($_POST["btnregistrar"])){
        $sqlgrabar = "INSERT INTO usuarios(numIdentificacion, password, TipoRol, codigoAceptacion, estadoUsuarios) VALUES ($nombre, '$pass_cifrado', '$rol', 1, 1)";
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