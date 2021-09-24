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
<!--===============================================================================================================-->
        <header>
            <section class="Barra_Navegacion">
                <section class="Inicio">
                </section>
                <nav id="menu">
                    <ul>
                        <a href="../../../../index.html" > <img src="../../../../Imagenes/logoProyect/Logo_Principal.png" class="Logo_Menú"></a>
                            <h1 class="titulo">Trascendental</h1>
                        <li id="Perfil"><a href="Mi_Perfil.html" class="menu">Mi Perfil</a><img src="../../../../Imagenes/otros logos/Log_Notificacion.png" alt="Logo Notificación" class="" id="Logo_Notificacion"></li>
                        <li><a href="formularios/induccion.html" class="menu">Formularios</a></li>
                        <li><a href="Contratos.html" class="menu">Contratos</a></li>
                    </ul>
                </nav>
            </section>
            <div id="Barra_Herramientas">
                <ul class="Herramientas">
                    <li><input type="text" class="buscador" placeholder="Buscar"></br></li>
                    <li><a href="">Filtro</a>
                        <ul>
                            <li><a href="">Mas Reciente</a></li>
                            <li><a href="">Perfil Completo</a></li>
                            <li><a href="">Perfil Incompleto</a></li>
                        </ul>
                    </li>
                    <li><a href="Graficas.html">Gráficos Estadísticos</a></li>
                </ul>
            </div>
        </header>
<!--===============================================================================================================-->

<!-- -->
<aside>
        <img src="../../../../Imagenes/otros logos/Log_Notificacion.png" alt="imagen de Notificación" class="botonNotif">
        <section class="caja_notificaciones">
            <center>
                <img src="../../../../Imagenes/logoProyect/Logo_Principal.png" class="imgNotif" id="casa_2">
            </center>
            <div class="infoNotif">
                <h2>Trascendental</h2>
                <p>El usuario <b>nombre aspirante</b> fue bloqueado correctamente de la plataforma</p>
            </div>
        </section>
        <section class="caja_notificaciones">
            <center>
                <img src="../../../../Imagenes/otros logos/casa.png" class="imgNotif" id="casa_2">
            </center>
            <div class="infoNotif">
                <h2>Nombre Aspirante</h2>
                <p>Favor hacerme confirmación de que posea los documentos requeridos en su debido orden</p>
            </div>
        </section>
        <section class="caja_notificaciones">
            <center>
                <img src="../../../../Imagenes/logoProyect/Logo_Principal.png" class="imgNotif" id="casa_2">
            </center>
            <div class="infoNotif">
                <h2>Trascendental</h2>
                <p>El aspirante <b>nombre aspirante</b> recibió correctamente su comentario</p>
            </div>
        </section>
    </aside>
<!-- -->

<?php

/*function listado ($conn) {

    $listaAspirantes = "SELECT * FROM aspirante AND usuario";
    $completo = mysqli_query($conn, $listaAspirantes);

    while ($dato = mysqli_fetch_array($completo)) {

        echo "<section class='contenido'>";
            echo "<section class='Perfil_Aspirante'>";
                echo "<section class='Foto_Perfil' name'fotoPerfil'> <? =fotoPerfil($conn); ?> </section>";
                echo "<section> <? =nombreAsp; ?>"
                echo "<section class='Documentos_Aspirantes'> <? =listaDoc_Aspirante($conn); ?> </section>";
                echo "<section class='Comentarios'>";
                    echo "<textarea class='controls' rows='8.5' name='comentario' placeholder='Agregar un comenterio...' id='Comentario'></textarea>";
                    echo "<input class='botons' type='submit' name='Botón_Envío' value='Enviar' id='Botón_Envío'>";
                echo "</section>";
            echo "</section>";
        echo "</section>";
    }

}*/



?>


        <section class="contenido">
            <?=perfilAspirante($conn);?>
            <!--<section class="Perfil_Aspirante">
                <section class="Foto_Perfil" name=''>
                    <img src="../../../../Imagenes/otros logos/Logo_Usuario.png" alt="Logo_Usuario" class="Logo_Usuario">
                </section>
                <section class="Documentos_Aspirante">
                    <p><a href='../aspirantes/Perfil_Aspirante.html' name='aspName'>Nombre Aspirante</a></p>
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Curriculum" id="Documento_1P">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Certificado de Alturas">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Certificado Judicial">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Certificado Penal">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Certificado Disciplinario" id="Documento_1P">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Resultados Médicos">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Carnet de Vacunación Covid-19">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Referencias Personales">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Referencias Laborales" id="Documento_1P">
                    <input class="botons" type="submit" name="Bloqueo" value="Bloquear" id="Botón_Bloqueo">
                </section>
                <section class="Comentarios">
                    <textarea class="controls" rows="8.5" name="comentario" placeholder="Agregar un comenterio..." id="Comentario"></textarea>
                    <input class="botons" type="submit" name="Botón_Envío" value="Enviar" id="Botón_Envío">
                </section>
            </section>
            <section class="Perfil_Aspirante">
                <section class="Foto_Perfil">
                    <img src="../../../../Imagenes/otros logos/Logo_Usuario.png" alt="Logo_Usuario" class="Logo_Usuario">
                </section>
                <section class="Documentos_Aspirante">
                    <p><a href="../aspirantes/Perfil_Aspirante.html">Nombre Aspirante</a></p>
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Curriculum">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Certificado de Alturas" id="Documento_1P">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Certificado Judicial">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Certificado Penal">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Certificado Disciplinario">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Resultados Médicos" id="Documento_1P">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Carnet de Vacunación Covid-19">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Referencias Personales">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Referencias Laborales">
                    <input class="botons" type="submit" name="Bloqueo" value="Bloquear" id="Botón_Bloqueo">
                </section>
                <section class="Comentarios">
                    <textarea class="controls" rows="8.5" name="comentario" placeholder="Agregar un comenterio..." id="Comentario"></textarea>
                    <input class="botons" type="submit" name="Botón_Envío" value="Enviar" id="Botón_Envío">
                </section>
            </section>
            <section class="Perfil_Aspirante">
                <section class="Foto_Perfil">
                    <img src="../../../../Imagenes/otros logos/Logo_Usuario.png" alt="Logo_Usuario" class="Logo_Usuario">
                </section>
                <section class="Documentos_Aspirante">
                    <p><a href="../aspirantes/Perfil_Aspirante.html">Nombre Aspirante</a></p>
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Curriculum">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Certificado de Alturas">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Certificado Judicial">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Certificado Penal" id="Documento_1P">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Certificado Disciplinario">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Resultados Médicos">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Carnet de Vacunación Covid-19" id="Documento_1P">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Referencias Personales">
                    <input type="submit" name="Boton_Documento" class="Boton_Documento" value="Referencias Laborales" id="Documento_1P">
                    <input class="botons" type="submit" name="Bloqueo" value="Bloquear" id="Botón_Bloqueo">
                </section>
                <section class="Comentarios">
                    <textarea class="controls" rows="8.5" name="comentario" placeholder="Agregar un comenterio..." id="Comentario"></textarea>
                    <input class="botons" type="submit" name="Botón_Envío" value="Enviar" id="Botón_Envío">
                </section>
            </section>-->
        </section>
<!--===============================================================================================================-->
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
<!--===============================================================================================================-->

    </body>
</html>