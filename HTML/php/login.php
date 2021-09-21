<?php

    include("Conexion.php");

    $nombre = $_POST['usuario'];
    $pass = $_POST['pass'];
    $rol = $_POST['TipoRol'];

    #Login
    if(isset($_POST['btningresar'])){
        $query = mysqli_query($conn,"SELECT * FROM login WHERE numIdentificacion = '$nombre' AND password = '$pass'");
        $nr = mysqli_num_rows($query);

        if($nr==1){

            switch($rol){
                case /*"ASPIRANTE" || "aspirante" || "Aspirante" ||*/ 1:
                    echo "<script> alert('Bienvenido $nombre'); window.location='../estadoLog/logtrue/aspirantes/Perfil_Aspirante.html'</script>";
                break;
                case /*"RECURSOS HUMANOS" || "recursos humanos" || "Recursos humanos" || "Recursos Humanos" || "recursos Humanos" ||*/ 2:
                    echo "<script> alert('Bienvenido $nombre'); window.location='../estadoLog/logtrue/recursosHumanos/aspirantes.php'</script>"; 
                break;

                default: "<script> alert('ERROR'); window.location='../../Inicio_Sesión.html'</script>";
            }
        }
        else {
            echo "<script> alert('Usuario no existe'); window.location='../../Inicio_Sesión.html'</script>";
        }
    }

    #Registrar
    if(isset($_POST["btnregistrar"])){
        $sqlgrabar = "INSERT INTO login(numIdentificacion,password,TipoRol) VALUES ('$nombre','$pass','$rol')";

        if(mysqli_query($conn,$sqlgrabar)){
            echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='../estadoLog/Inicio_Sesión.html'</script>";
        }else {
            echo "Error: ".$sql."<br>".mysqli_error($conn);
        }
    }
?>