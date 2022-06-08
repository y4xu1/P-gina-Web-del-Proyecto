<!-- Perfil del usuario con el rol de recursos humanos -->
<?php
    
    include ('../aspirantes/phpMiperfil.php');

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="X-UA-Compatible" content="IE=7">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mi Perfil</title>
        <link rel="stylesheet" href="../../../../CSS/Formato_Base.css">
        <link rel="stylesheet" href="../../../../CSS/estadoLog/log true/Mi_Perfil.css">
        <link rel="icon" href="../../../../Imagenes/logoProyect/Logo_Principal.png">
    </head>
    <body>
<!-- Función de cerrar sesión -->
        <article class='logOut'>
            <a href="../../../php/cerrarSesion.php" class='btn_logOut'>
                <img src="../../../../Imagenes/otros logos/quit.png" alt="Log_Out_Symbol" class='logOut_icon'>
            </a>
        </article>
<!-- Menú de herramientas -->
        <header>
            <section class="Barra_Navegacion">
                <section class="Inicio">
                </section>
                <nav id="menu">
                    <ul>
                        <a href="index.html" > <img src="../../../../Imagenes/logoProyect/Logo_Principal.png" class="Logo_Menú"></a>
                            <h1 class="titulo">Trascendental</h1>
                        <li><a href="Mi_Perfil.php" class="menu">Mi Perfil</a></li>
                        <li><a href="formularios/induccion.html" class="menu">Formularios</a></li>
                        <li><a href="Contratos.html" class="menu">Contratos</a></li>
                        <li><a href="obras.php" class="menu">Obras</a></li>
                        <li><a href="aspirantes.php" class="menu">Aspirantes</a></li>
                    </ul>
                </nav>
            </section>
        </header>
<!-- Formulario para completar todos los datos del perfil -->
        <section class="contenido" style="padding-top: 6%;">
            <section style="margin: -5%;">
            </section>
            <center>
                <section class="Perfil">
                    <center>
                        <!-- <h2>Nombre de Usuario</h2>
                        <p>Foto de Perfil</p>
                        <input type="image" src="../../../../Imagenes/otros logos/Logo_Usuario.png" name="Foto Perfil" id="Foto_Perfil"> -->
                        <article>
                            <?=cargardata1($conn);?>
                        </article>
                        <br><br>
                        <a href="Mi_perfil2.php" class="actualizar">Editar información</a>
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