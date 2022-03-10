<?php

include("conexion.php");

/*----------------------------Generar codigo rando-----------------------------------------------*/

session_start();

    if(isset($_POST["btnenviar"])){

        $documento=$_POST['docAspirante'];
        $_SESSION['Con']=$documento;

        $query = mysqli_query($conn,"SELECT * FROM usuarios WHERE numIdentificacion ='$_SESSION[Con]'");

        $nr=mysqli_num_rows($query);

            if($nr==1){
                $codigo=rand(100000,500000);

                $query = mysqli_query($conn,"UPDATE usuarios SET codigoVerificacion='$codigo' WHERE numIdentificacion='$_SESSION[Con]'");
                    echo "<script> alert('El codigo de verificacion hasido enviado al correo es $codigo'); window.location='../estadoLog/Olvide_Contraseña.html'</script>";
            }
            else{
                echo "<script> alert('No se halla documento en base de datos'); window.location='../estadoLog/Olvide_Contraseña.html' </script>";
            }      
    }
/*-------------------------codigo---------------------------------------------------------------------*/

    if (isset($_POST["btnverificar"])){

        $codigo=$_POST['codigo'];
        $consulta = "SELECT codigoVerificacion FROM usuarios WHERE numIdentificacion='$_SESSION[Con]'";

        $resultado =mysqli_query($conn, $consulta);

        while($fila = mysqli_fetch_array($resultado)){

            if($codigo==$fila['codigoVerificacion']){
                echo "<script> alert('El codigo de verificacion es correcto'); window.location='../estadoLog/Olvide_Contraseña.html'</script>";
            }
            else{
                echo "<script> alert('El codigo de verificacion es incorrecto'); window.location='../estadoLog/Olvide_Contraseña.html' </script>";
            } 
        }
    }  
    
/*------------------------------verificar contraseña-----------------------------------------*/ 
    if (isset ( $_POST['cambiar'])){
        $contraseña=$_POST['nuevaContraseña'];
        if ( $_POST['nuevaContraseña'] == $_POST['verificacionContraseña']){  
    
            $query = mysqli_query($conn,"UPDATE usuarios SET password='$contraseña' WHERE numIdentificacion='$_SESSION[Con]'");
            echo "<script> alert('si'); window.location='../estadoLog/Olvide_Contraseña.html'</script>";
    
        }else{
            echo"<script> alert('no'); window.location='../estadoLog/Olvide_Contraseña.html'</script>";
        }
    }
?>