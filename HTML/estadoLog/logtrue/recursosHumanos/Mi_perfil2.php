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
                        <h2>Nombre de Usuario</h2>
                        <p>Foto de Perfil</p>
                        <input type="image" src="../../../../Imagenes/otros logos/Logo_Usuario.png" name="Foto Perfil" id="Foto_Perfil">
                        <form action="../../../php/RecursosHumanos.php" method="POST">
                        
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
                            <input class="controls" type="text" name="docRecHum" id="Documento_de_Identidad" placeholder="Documento de Identidad">
                        </center>
                            <p>
                                Fecha de Expedición del Documento
                                <input class="controls" type="date" name="FechaExpedición" id="Fecha_Expedición_Documento">
                            </p>
                            <input class="controls" type="text" name="Pais" id="Paisexpedición" placeholder="País de expedición">
                            <p>
                                Fecha de Nacimiento
                                <input class="controls" type="date" name="FechaNacimiento" id="Fecha_Nacimiento">
                            </p>
                        <center>
                            <input class="controls" type="text" name="PaisNacimiento" id="País_de_Nacimiento" placeholder="País de Nacimiento">
                            <input class="controls" type="text" name="Direccion" id="Direccion" placeholder="Dirección de Residencia">
                            <input class="controls" type="text" name="Telefono" id="Telefono" placeholder="Teléfono de Contacto">
                            <input class="controls" type="text" name="CorreoElectronico" id="Correo_Electrónico" placeholder="Correo Electrónico">
                            <input class="controls" type="text" name="Cargo" id="Cargo" placeholder="Cargo">
                            <select class="Seleccion" name="EstadoCivil" id="Estado_Civil">
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
                            <select class="Seleccion" name="Genero" id="Género">
                                <option selected="selected">Selecione su Género</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                            </select>
                            <input class="controls" type="text" name="EPS" id="EPS" placeholder="EPS"> 
                            <input class="controls" type="text" name="ARL" id="ARL" placeholder="ARL"> 

                            <input class="botons" type="submit" value="Insertar Datos" name="btnregistrar" id="formulario">
                            <input class="botons" type="submit" value="Actualizar Datos" name="btnActualizar" id="enviar">
                        </form>
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