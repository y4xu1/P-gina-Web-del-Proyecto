<!--
    Cumple una función de seguridad sobre el ingreso a las herramientas de la plataforma vinculada con los archivos de logeo y de
    registro en la plataforma
-->
<?php
    include('conexion.php');
?>

<?php

    #logeo o ingreso al sistema
    $nombre = $_POST['usuario'];
    $pass = $_POST['pass'];
    $rol = $_POST['TipoRol'];

    if(isset($_POST['btningresar'])) {

        $consulta = "SELECT * FROM usuarios WHERE numIdentificacion = '$nombre' AND password = '$pass' AND estadoUsuarios = 1";
        $query = mysqli_query($conn,$consulta); 

        $nr = mysqli_num_rows($query);

        if ($nr == 1) {

            #$consulRol = "SELECT tipoRol FROM usuarios WHERE numIdentificacion='$nombre'";
            $consulRol = "SELECT * FROM usuarios WHERE numIdentificacion = $nombre AND password = '$pass' AND TipoRol = $rol";
            $queryRol = mysqli_query($conn, $consulRol);
            $numConsul = mysqli_num_rows($queryRol);

            if ($numConsul == 1) {
                #echo "<script> alert('Bienvenido $nombre'); window.location='../estadoLog/logtrue/aspirantes/Perfil_Aspirante.html'</script>";
                switch ($rol){
                    case 1:
                        echo "<script> alert('Bienvenido $nombre'); window.location='../estadoLog/logtrue/aspirantes/Perfil_Aspirante.html'</script>";
                        break;
                    case 2:
                        echo "<script> alert('Bienvenido $nombre'); window.location='../estadoLog/logtrue/recursosHumanos/aspirantes.php'</script>"; 
                        break;
                    default:
                        echo "<script> alert('ERROR: Rol no indicado'); window.location='../estadoLog/Inicio_Sesión.html'</script>";
                        break;
                }
            }
            else {
                echo "<script> alert('ERROR: Rol no indicado o erroneo'); window.location='../estadoLog/Inicio_Sesión.html'</script>";
            }
            /*
            switch ($numConsul){
                case 1:
                    echo "<script> alert('Bienvenido $nombre'); window.location='../estadoLog/logtrue/aspirantes/Perfil_Aspirante.html'</script>";
                    break;
                case 2:
                    echo "<script> alert('Bienvenido $nombre'); window.location='../estadoLog/logtrue/recursosHumanos/aspirantes.php'</script>"; 
                    break;
                default:
                    echo "<script> alert('ERROR: Rol no indicado'); window.location='../estadoLog/Inicio_Sesión.html'</script>";
                    break;
            }
            */
        }
        else {
            echo "<script> alert('Usuario incorrecto, bloqueado o la contraseña esta incorrecta.');window.location= '../estadoLog/Inicio_Sesión.html' </script>";
        }

    }
    else {
        #echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        #echo "<h4>Error: </h4><br><h3>" . mysqli_error($conn) . "</h3>";
    }

?>

<?php

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