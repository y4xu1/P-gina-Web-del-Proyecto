<!-- Página principal del usuario con el rol de recursos humanos, le permite visualizar en una lista todos los aspirates con sus respectivos documentos -->
<!-- Incluye funciones de automatización a utilizar en la página -->
<?php include('../../../php/listaAspirantes.php')?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="X-UA-Compatible" content="IE=7">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Aspirantes</title>
        <link rel="stylesheet" href="../../../../CSS/Formato_Base.css">
        <link rel="stylesheet" href="../../../../CSS/estadoLog/log true/recursosHumanos/aspirantes.css">
        <link rel="icon" href="../../../../Imagenes/logoProyect/Logo_Principal.png">
    </head>
    <body>
<!-- Función de cerrar sesión -->
        <article class='logOut'>
            <a href="../../../php/cerrarSesion.php" class='btn_logOut'>
                <img src="../../../../Imagenes/otros logos/quit.png" alt="Log_Out_Symbol" class='logOut_icon'>
            </a>
        </article>
<!-- Menú y submenú de herramientas -->
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
<!---------- Submenú ---------->
        <div id="submenu">
            <form action="./aspirantes.php" method="post">
                <input class="text" type="text" name="docAspirante" id="numDoc" placeholder="Buscar aspirante">
                <input class="button" type="submit" name="btnbuscador" value="&#x1f50d">
                <?php
                    if (ISSET($_POST['btnbuscador'])) {
                        echo '<input class="button" type="submit" name="listAsp" value="↩️" style="background:rgb(255, 255, 255,0.2);">';
                    }
                ?>
            </form>
        </div>
<!-- Listado de aspirantes -->
        <section class="contenido">
            <!-- Llamado de función del listado de los aspirantes (Función principal) -->
            <?php
                if (ISSET($_POST['btnbuscador'])){
                    busqAspirante($conn);
                }
                else {
                    perfilAspirante($conn);
                }
            ?>
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