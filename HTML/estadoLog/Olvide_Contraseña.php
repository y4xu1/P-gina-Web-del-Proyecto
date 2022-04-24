<?php
include ('../php/conexion.php');

session_start();

/*----------------------------Generar codigo random-----------------------------------------------*/

if(isset($_POST["btnenviar"])){

    $documento = $_POST['docAspirante'];
    $_SESSION['Con'] = $documento;
    $rol = $_POST['TipoRol'];
    $_SESSION['tRol'] = $rol;

    $query = mysqli_query($conn,"SELECT * FROM usuarios WHERE numIdentificacion ='$_SESSION[Con]' AND TipoRol = '$_SESSION[tRol]'");

    $nr = mysqli_num_rows($query);

    if($nr==1){
        $codigo=rand(100000,500000);

        $query = mysqli_query($conn,"UPDATE usuarios SET codigoVerificacion='$codigo' WHERE numIdentificacion = '$_SESSION[Con]' AND TipoRol = '$_SESSION[tRol]'");
            echo"<script>
                    alert('Se generó un nuevo código de verificación de seguridad. Tenga en cuenta el siguiente código $codigo');
                </script>";
    }
    else{
        echo"<script>
                alert('Error: Verifique la información enviada');
            </script>";
    }    
}

/*----------------------------------codigo--------------------------------------------------------*/

if (isset($_POST["btnverificar"])){

    $codigo = $_POST['codigo'];
    $_SESSION['cod'] = $codigo;

    $query_numRow = "SELECT * FROM usuarios WHERE numIdentificacion='$_SESSION[Con]' AND TipoRol = '$_SESSION[tRol]' AND codigoVerificacion = '$_SESSION[cod]'";
    $queryTrue = mysqli_query($conn, $query_numRow);

    $numRow = mysqli_num_rows($queryTrue);

    if ($numRow==1) {
        echo"<script>
                alert('El código de verificación es correcto ');
            </script>";
    }
    else {
        echo"<script>
                alert('El código de verificación es incorrecto ');
            </script>";
    }
}  

/*----------------------------verificar contraseña------------------------------------------------*/

if (isset ($_POST['cambiar'])){
    
    $contraseña = $_POST['nuevaContraseña'];
    $pass_cifrado=password_hash($contraseña,PASSWORD_DEFAULT);
    
    if ($_POST['nuevaContraseña'] == $_POST['verificacionContraseña']){  

        $query = mysqli_query($conn,"UPDATE usuarios SET password = '$pass_cifrado' WHERE numIdentificacion='$_SESSION[Con]'");
        echo"<script>
                alert('Su contraseña ha logrado ser actualizada con éxito');
            </script>";

    }else{
        echo"<script>
                alert('Las contraseñas enviadas no son iguales');
            </script>";
    }
}

?>
<!-- Breve formulario para recuperar la contraseña de algún usuario -->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="X-UA-Compatible" content="IE=7">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"&amp;gt;>
        <title>Olvide mi Contraseña</title>
        <link rel="stylesheet" href="../../CSS/Formato_Base.css">
        <link rel="stylesheet" href="../../CSS/estadoLog/Estado_Usuario.css">
        <link rel="icon" href="../../Imagenes/logoProyect/Logo_Principal.png">
    </head>
    <body>
<!-- Menú de herramientas -->
            <header>
                <section class="Barra_Navegacion">
                    <section class="Inicio">
                    </section>
                    <nav id="menu">
                        <ul>
                            <a href="../../index.html" > <img src="../../Imagenes/logoProyect/Logo_Principal.png" class="Logo_Menú"></a>
                                <h1 class="titulo">Trascendental</h1>
                            <li><a href="../Contactanos.html" class="menu">Contactanos</a></li>
                            <li><a href="../Nosotros.html">Quienes Somos</a></li>
                            <li><a href="Inicio_Sesión.html" class="menu">Inicia Sesión</a></li>
                            <li><a href="../../index.html" class="menu">Inicio</a></li>
                        </ul>
                    </nav>
                </section>
            </header>
<!-- Formularios para recuperar la contraseña -->
        <section class="contenido">
            <center>
                <section class="Olvide_Contraseña">
                    <center>
                            <?php
                            if (isset($_POST['btnenviar']) && $nr==1){
                                //formulario 2
                                echo'<form action="./Olvide_Contraseña.php" method="POST">
                                        <h2>Olvide mi Contraseña</h2>
                                        <p>Recuerde el código de confirmación notificado en pantalla.<br>Si no recuerda el código presione la tecla "F5" para generar un nuevo código.</p>';
                                        if ($_POST['TipoRol']==1) {
                                            echo'<select class="controls" name="TipoRol" id="rol" style="width: 97%;" disabled="disabled">
                                                    <option value="1">Aspirante</option>
                                                </select>';
                                        }
                                        else if ($_POST['TipoRol']==2) {
                                            echo'<select class="controls" name="TipoRol" id="rol" style="width: 97%;" disabled="disabled">
                                                    <option value="2">Recursos Humanos</option>
                                                </select>';
                                        }
                                    echo'<input class="controls" type="text" name="docAspirante" id="docAsp" value="' . $_POST['docAspirante'] . '" disabled="disabled">
                                        <input class="controls" type="text" name="codigo" id="codigo" placeholder="Ingrese el código de confirmación">
                                        <!-- <img src="../../Imagenes/verificado.png" style="width: 30px;"> -->
                                        <input class="botons" type="submit" value="Verificar" name="btnverificar">
                                    </form>';
                            }
                            else if (isset($_POST['btnverificar']) && $numRow==1){
                                //formulario 3
                                echo'<form action="./Olvide_Contraseña.php" method="POST">
                                        <h2>Recuperar Contraseña</h2>
                                        <p>Recuerde que... Debe ingresar una contraseña que tenga como mínimo 5 caracteres numéricos, una letra minúscula y una letra mayúscula.</p>
                                        <input class="controls" type="password" name="nuevaContraseña" id="txtpassword" placeholder="Ingrese la nueva contraseña">
                                        <input class="controls" type="password" name="verificacionContraseña" id="txtpassword" placeholder="Ingrese la verificación de la contraseña">
                                        <br><br>
                                        <div class="tC">
                                            <input type="checkbox" name="Terminos y condiciones" id="TyC">
                                            <h4>Estoy de acuerdo con <a href="#">Términos y condiciones</a></h4>
                                        </div><br><br>
                                        <input class="botons" type="submit" name="cambiar" value="Cambiar Contraseña">
                                    </form>';
                            }
                            else {
                                //formulario 1
                                echo'<form action="./Olvide_Contraseña.php" method="POST">
                                        <h2>Olvide mi Contraseña</h2>
                                        <p>Para poder recuperar la contraseña, debe diligenciar los siguientes formularios que se le solicite.</p>
                                        <select class="controls" name="TipoRol" id="rol" style="width: 97%;">
                                            <option>Seleccione su rol</option>
                                            <option value="1">Aspirante</option>
                                            <option value="2">Recursos Humanos</option>
                                        </select>
                                        <input class="controls" type="text" name="docAspirante" id="docAsp" placeholder="Ingrese su Número de identificación">
                                        <!-- <img src="../../Imagenes/enviar.png" style="width: 30px;"> -->
                                        <input class="botons" type="submit" value="Enviar" name="btnenviar">
                                    </form>';
                            }
                            ?>
                    </center>
                </section>
            </center>
        </section>
<!-- Información básica de la empresa -->
        <footer class="info_empres">
            <ul>
                <center><h4>Disser Ingieniería S.A.S. Bogotá</h4></center>
                <center>
                    <div class="left">
                        <li class="ubicación">Dirección: Calle 169 # 20-06</li>
                        <li class="contacto">Tel: (1)7042440</li>
                    </div>
                    <div class="right">
                        <li class="actividad">Actividad: Contratación en Obras Cíviles</li>
                    </div>
                </center>
            </ul>
            <section class="copyright">
                <center><p>© Copyright. Todos los derechos reservados - 2021</p></center>
            </section>
        </footer>
    </body>
</html>