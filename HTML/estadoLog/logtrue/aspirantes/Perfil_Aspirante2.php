<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="X-UA-Compatible" content="IE=7">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"amp;gt;>
        <title>Perfil Aspirantes</title>
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
<!--Menú de herramientas-->
        <header>
            <section class="Barra_Navegacion">
                <nav id="menu">
                    <ul>
                        <a href="../../../../index.html" ><img src="../../../../Imagenes/logoProyect/Logo_Principal.png" class="Logo_Menú"></a>
                            <h1 class="titulo">Trascendental</h1>
                        <li><a href="Perfil_Aspirante.php" class="menu">Mi perfil</a></li>
                        <li><a href="Agendar_citas.html" class="menu">Agendar Cita</a></li>
                        <li><a href="miContrato.php" class="menu">Contrato</a></li>
                    </ul>
                </nav>
            </section>
        </header>
<!--Imagen principal-->
        <section class="fondo_notificaciones">
        </section>
<!--Formulario de ingreso y actualizacion de datos del aspirante a la base datos-->
        <section id="aspirante">
            <section class="Perfil">
                <center>
                    <h2>Nombre de Usuario</h2>
                    <p>Foto de Perfil</p>
                    <input type="image" src="../../../../Imagenes/otros logos/Logo_Usuario.png" name="Foto Perfil" id="Foto_Perfil">
                </center>
                <form action="../../../php/Aspirantes.php" method="POST">
                    <center>
                        <input class="controls" type="text" name="pNombre" id="" placeholder="Primer Nombre"> 
                        <input class="controls" type="text" name="sNombre" id="" placeholder="Segundo Nombre">
                        <input class="controls" type="text" name="pApellido" id="" placeholder="Primer Apellido">
                        <input class="controls" type="text" name="sApellido" id="" placeholder="Segundo Apellido"> 
                            <select class="Seleccion" name="TipodeDocumento" id="Tipo_de_Identificación">
                            <option selected="selected">Selecione el Tipo de Identificación</option>
                            <option value="CC">Cédula de Ciudadanía (CC)</option>
                            <option value="CE">Cédula de Extrangería (CE)</option> 
                            <option value="PA">Pasaporte (PA)</option> 
                            </select> 
                        <input class="controls" type="text" name="docAspirante" id="Documento_de_Identidad" placeholder="Documento de Identidad">
                        <p>Fecha de Expedición del Documento<input class="controls" type="date" name="FechaExpedición" id="Fecha_Expedición_Documento"></p>
                        <input class="controls" type="text" name="Pais" id="Paisexpedición" placeholder="País de expedición">
                            <p>Fecha de Nacimiento<input class="controls" type="date" name="FechaNacimiento" id="Fecha_Nacimiento"></p>
                        <input class="controls" type="text" name="PaísNacimiento" id="País_de_Nacimiento" placeholder="País de Nacimiento">
                        <input class="controls" type="text" name="ciudad" id="ciudad" placeholder="Ciudad de Residencia">
                        <input class="controls" type="text" name="Direccion" id="Direccion" placeholder="Dirección de Residencia">
                        <input class="controls" type="text" name="Telefono" id="Telefono" placeholder="Teléfono de Contacto">
                        <input class="controls" type="text" name="CorreoElectrónico" id="Correo_Electrónico" placeholder="Correo Electrónico">
                        <input class="controls" type="text" name="Cargo" id="Cargo" placeholder="Cargo">
                            <select class="Seleccion" name="EstadoCívil" id="Estado_Civil">
                            <option selected="selected">Selecione su estado cívil</option>
                            <option value="Indiferente">Indiferente</option>
                            <option value="Soltero">Soltero / Soltera</option>
                            <option value="Casado">Casado / Casada</option>
                            <option value="Unión Libre">Unión Libre</option>
                            <option value="Separado">Separado</option>
                            <option value="Viudo">Viudo</option>
                        </select>
                        <select class="Seleccion" name="Estrato" id="Estrado">
                            <option selected="selected">Selecione su Estrato</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                        <select class="Seleccion" name="RH" id="RH">
                            <option selected="selected">Selecione su RH</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                        <select class="Seleccion" name="Género" id="Género">
                            <option selected="selected">Selecione su Género</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                        </select>
                        <input class="controls" type="text" name="Libretamilitar" id="Libreta_militar" placeholder="Libreta militar">
                        <input class="controls" type="text" name="EPS" id="EPS" placeholder="EPS">
                        <input class="controls" type="text" name="ARL" id="ARL" placeholder="ARL"> 

                        <input class="botons" type="submit" value="Insertar Datos" name="btnregistrar" id="formulario">
                        <input class="botons" type="submit" value="Actualizar Datos" name="btnActualizar" id="enviar">
                    </center>
                </form>
            </section>
            <!-- ingreso de los archivos de la documentacion requerida por la empresa -->
            <section class="Documentos_Aspirante">
                <center>
                    <h2 id="titleDoc">Documentos</h2>
                </center>
                <form action="../../../php/Aspirantes.php" method="POST">
                    <img src="../../../../Imagenes/subir-color.png" style="width: 30px; margin: -7px 15px;"><label>Suba su Curriculum</label><br><br>
                    <input type="file" name="Curriculum" class="controls" value="Curriculum"><br><br>
                    <img src="../../../../Imagenes/subir-color.png" style="width: 30px; margin: -7px 15px;"><label>Suba su Certificado de Alturas</label><br><br>
                    <input type="file" name="CertificadoAlturas" class="controls" value="Certificado de Alturas"><br><br>
                    <img src="../../../../Imagenes/subir-color.png" style="width: 30px; margin: -7px 15px;"><label>Suba su Certificado Judicial</label><br><br>
                    <input type="file" name="CertificadoJudicial" class="controls" value="Certificado Judicial"><br><br>
                    <img src="../../../../Imagenes/subir-color.png" style="width: 30px; margin: -7px 15px;"><label>Suba su Certificado Penal</label><br><br>
                    <input type="file" name="CertificadoPenal" class="controls" value="Certificado Penal"><br><br>
                    <img src="../../../../Imagenes/subir-color.png" style="width: 30px; margin: -7px 15px;"><label>Suba su Certificado Disciplinario</label><br><br>
                    <input type="file" name="CertificadoDisciplinario" class="controls" value="Certificado Disciplinario"><br><br>
                    <img src="../../../../Imagenes/subir-color.png" style="width: 30px; margin: -7px 15px;"><label>Suba sus Resultados Médicos</label><br><br>
                    <input type="file" name="ResultadosMédicos" class="controls" value="Resultados Médicos"><br><br>
                    <img src="../../../../Imagenes/subir-color.png" style="width: 30px; margin: -7px 15px;"><label>Suba su Carnet de Vacunación Covid-19</label><br><br>
                    <input type="file" name="CarnetVacunaciónCovid-19" class="controls" value="Carnet de Vacunación Covid-19"><br><br>
                    <img src="../../../../Imagenes/subir-color.png" style="width: 30px; margin: -7px 15px;"><label>Suba sus Referencias Personales</label><br><br>
                    <input type="file" name="ReferenciasPersonales" class="controls" value="Referencias Personales"><br><br>
                    <img src="../../../../Imagenes/subir-color.png" style="width: 30px; margin: -7px 15px;"><label>Suba sus Referencias Laborales</label><br><br>
                    <input type="file" name="ReferenciasLaborales" class="controls" value="Referencias Laborales"><br><br>
                    <img src="../../../../Imagenes/subir-color.png" style="width: 30px; margin: -7px 15px;"><label>Suba su firma para el contrato</label><br><br>
                    <input type="file" name="firma" class="controls" value="Firma para el contrato"><br><br>
                    <center>
                        <input class="botons" type="submit" value="Insertar Documentos" name="btndocumentos" id="formulario">
                        <input class="botons" type="submit" value="Actualizar Documentos" name="Actualizardocumentos" id="enviar">
                    </center>
                </form>
            </section>
        </section>
<!--Información básica de la empresa-->
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