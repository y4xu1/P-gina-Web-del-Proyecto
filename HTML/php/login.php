<!--
    Cumple una función de seguridad sobre el ingreso a las herramientas de la plataforma vinculada con los archivos de logeo y de
    registro en la plataforma
-->
<?php

include('conexion.php');

session_start();

#logeo o ingreso al sistema
$nombre = $_POST['usuario'];
$_SESSION['doc'] = $nombre;
$pass = $_POST['pass'];

if(isset($_POST['btningresar'])) {

    $queryusuario =mysqli_query($conn, "SELECT * FROM usuarios WHERE numIdentificacion = '$_SESSION[doc]'");
    $nr = mysqli_fetch_array($queryusuario);
    //$buscarpass=mysqli_fetch_array($queryusuario);
    
    if ($nr > 0) {

        $querypass =mysqli_query($conn, "SELECT password FROM usuarios WHERE numIdentificacion = '$_SESSION[doc]'");
        $nr2 = mysqli_fetch_array($querypass);
        $showpass=$nr2['password'];

        if (password_verify($pass, $showpass)) {
            
            $consulta ="SELECT * FROM usuarios WHERE numIdentificacion = '$_SESSION[doc]'";
            $resultado = mysqli_query($conn, $consulta);
        
            while ($fila = mysqli_fetch_array($resultado)) {
            
                if ($fila['estadoUsuarios'] == 1) {
                    
                    $consulta ="SELECT * FROM usuarios where numIdentificacion = '$_SESSION[doc]'";
                    $resultado = mysqli_query($conn, $consulta);
                
                    while ($fila = mysqli_fetch_array($resultado)) {

                        if ($fila['TipoRol'] == 1) {

                            echo "
                                <script>
                                    alert('Bienvenido $_SESSION[doc]');
                                    window.location='../estadoLog/logtrue/aspirantes/Perfil_Aspirante.php';
                                </script>
                            ";
                            //echo "<script> alert('Bienvenido'); window.location='../estadoLog/logtrue/aspirantes/Perfil_Aspirante2.php'</script>";

                            $qryProfile = "SELECT * FROM aspirante WHERE docAspirante = '$_SESSION[doc]';";
                            $resul_qryProfile = mysqli_query($conn, $qryProfile);

                            if (mysqli_fetch_array($resul_qryProfile) != 0) {
                                //echo "<script> alert('Bienvenido'); window.location='../estadoLog/logtrue/aspirantes/Perfil_Aspirante.php'</script>";
                            }
                            else {
                                //echo "<script> alert('Bienvenido'); window.location='../estadoLog/logtrue/aspirantes/Perfil_Aspirante2.php'</script>";
                            }
                        }
                        else {
                            echo "
                                <script>
                                    alert('Bienvenido $_SESSION[doc]');
                                    window.location = '../estadoLog/logtrue/recursosHumanos/Mi_Perfil.php';
                                </script>
                            ";
                        }
                    }
                }
                else {
                    echo "
                        <script>
                            alert('Su estado de usuario en este momento es inactivo');
                            window.location = '../estadoLog/Inicio_Sesión.html';
                        </script>
                    ";
                }
            }
        }
        else {
            echo "
                <script>
                    alert('Datos incorrectos');
                    window.location = '../estadoLog/Inicio_Sesión.html';
                </script>
            ";
        }
    }
    else {
        echo "
            <script>
                alert('ERROR: El usuario $nombre no existe');
                window.location = '../estadoLog/Registro.html';
            </script>
        ";
    }

}


    $codigoaceptacion = $_POST['aceptacion'];
    $passw = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    $rol = $_POST['TipoRol'];

    #Registrar
    if(isset($_POST["btnregistrar"])){
        
        $sqlgrabar = "INSERT INTO usuarios(numIdentificacion, password, TipoRol, codigoAceptacion, estadoUsuarios) VALUES ('$nombre', '$passw', '$rol', 1, 1)";
        #echo $sqlgrabar;

        if ($codigoaceptacion == 'disser123') {

            if (mysqli_query($conn,$sqlgrabar)) {
                echo "
                    <script>
                        alert('Usuario registrado con exito: $nombre');
                        window.location = '../estadoLog/Inicio_Sesión.html'
                    </script>
                ";
            }
            else {
                echo "
                    <script>
                        alert('ERROR. $sql: mysqli_error($conn)');
                        window.location = '../estadoLog/Registro.html';
                    </script>
                ";
            }
        }
        else {
            echo "
                <script>
                    alert('Código incorrecto');
                    window.location = '../estadoLog/Registro.html';
                </script>
            ";
        }
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>