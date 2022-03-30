<?php
    //Inclusión de la conexión con la BD
    include ('../../../php/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="X-UA-Compatible" content="IE=7">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mi contrato</title>
        <?php
            if (isset($_POST['miContrato'])) {
                echo '<link rel="stylesheet" href="../../../../CSS/estadoLog/log true/recursosHumanos/buscarContratos.css">';
            }
            else {
                echo '<link rel="stylesheet" href="../../../../CSS/estadoLog/log true/aspirantes/contrato.css">';
            }
        ?>
        <link rel="stylesheet" href="../../../../CSS/Formato_Base.css">
        <link rel="icon" href="../../../../Imagenes/logoProyect/Logo_Principal.png">
    </head>
    <body>

<!--Menu de herramientas-->
        <header>
            <?php
                if (isset($_POST['miContrato'])) {

                }
                else {
                    echo'<section class="Barra_Navegacion">
                            <nav id="menu">
                                <ul>
                                    <a href="../../../../index.html" > <img src="../../../../Imagenes/logoProyect/Logo_Principal.png" class="Logo_Menú"></a>
                                    <h1 class="titulo">Trascendental</h1>
                                    <li id="Perfil"><a href="Perfil_Aspirante.html" class="menu">Mi perfil</a><img src="../../../../Imagenes/otros logos/Log_Notificacion.png" alt="Logo Notificación" class="" id="Logo_Notificacion"></li>
                                    <li><a href="Agendar_citas.html" class="menu">Agendar Cita</a></li>
                                    <li><a href="miContrato.php" class="menu">Contrato</a></li>
                                </ul>
                            </nav>
                        </section>';
                }
            ?>
        </header>
<!-- Formulario para mostrar el contrato -->
            <?php
                if (isset($_POST['miContrato'])) {
                    seguridad($conn);
                }
                else {
                    echo
                    '<main>
                        <center>
                            <article>
                                <fieldset>
                                    <legend>Mi Contrato</legend>
                                    <form action="./miContrato.php" method="post">
                                        <input class="controls" type="text" name="docAspirante" id="numDoc" placeholder="Digite su número de identificación"><br>
                                        <input class="controls" type="password" name="password" id="txtpassword" placeholder="Digite su contraseña"><br><br>
                                        <div class="ub1">
                                            <input type="checkbox" onclick="verpassword()" >
                                            <h4>Mostrar contraseña</h4>
                                        </div><br><br>
                                        <div id="noR">
                                            <div class="letra">
                                                <input type="checkbox" name="noRobot" id="nR" required>
                                                <h5>No soy un robot</h5>
                                            </div>
                                            <img src="../../../../Imagenes/captcha.png" id="captcha">
                                        </div><br><br>
                                        <input class="botons" type="submit" name="miContrato" value="Acceder">
                                    </form>
                                </fieldset>
                            </article>
                        </center>
                    </main>';
                }
            ?>
        
<!--Información básica de la empresa-->
        <?php
        if (isset($_POST['miContrato'])) {}
        else {
            echo 
            '<footer class="info_empres">
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
            </footer>';
        }
        ?>
    </body>
    
<!-- Función para mostrar contraseña -->
    <script>
        function verpassword(){
            var tipo = document.getElementById("txtpassword");
            if(tipo.type == "password")
            {
                tipo.type = "text";
            }
            else
            {
                tipo.type = "password";
            }
        }
    </script>
</html>

<!-- Función buscar el contrato y mostrarlo en html -->
<?php

    function seguridad($conn) {
        $id = $_POST['docAspirante'];
        $pass = $_POST['password'];

        $seQuery = "SELECT numIdentificacion, password FROM usuarios WHERE numIdentificacion='$id' AND password='$pass'";
        $query = mysqli_query($conn, $seQuery);

        $nr = mysqli_num_rows($query);

        if ($nr == 1) {

            $contBD_query = "SELECT docAspirante FROM contrato WHERE docAspirante = '$id'";
            $query = mysqli_query($conn, $contBD_query);

            $nrContrato_BD = mysqli_fetch_array($query);

            if ($nrContrato_BD != 0) {
                echo
                '<script>
                    alert("Contrato encontrato");
                </script>';
                busqContrato($conn);
            }
            else {
                echo
                '<script>
                    alert("Su contrato no se ha procesado, tenga paciencia");
                    window.location="./Perfil_Aspirante.html";
                </script>';
            }
          
        }
        else {
            echo
            '<script>
                alert("ERROR: Datos inválidos");
                window.location="./miContrato.php";
            </script>';
        }
    }

    function contratoBD($conn) {
        $id = $_POST['docAspirante'];

        $contBD_query = "SELECT docAspirante FROM contrato WHERE docAspirante = '$id'";
        $query = mysqli_query($conn, $contBD_query);

        $nrC = mysqli_fetch_array($query);

        if ($nrC == 1) {
            echo
            '<script>
                alert("Contrato encontrato");
            </script>';
            busqContrato($conn);
        }
        else {
            echo
            '<script>
                alert("Su contrato no se ha procesado, tenga paciencia");
                window.location="./Perfil_Aspirante.html";
            </script>';
        }
    }
    
    function busqContrato($conn) {

        $id = $_POST['docAspirante'];
            
        $consulta = "SELECT aspirante.docAspirante, aspirante.ciudad, tipoContrato, PnombreAspirante, SnombreAspirante, PapellidoAspirante, SapellidoAspirante, direccionResidencia, telefonoContacto, 
            tipoCargoDesp, salario, valorPrestaciones, fechaInicio, nombreObra, ciudadObra, firma, telefonoContacto FROM aspirante INNER JOIN contrato ON 
            aspirante.docAspirante=contrato.docAspirante WHERE contrato.docAspirante = '$id'";

        $resul = mysqli_query($conn, $consulta);
        
        while ($row = mysqli_fetch_assoc($resul)) {
            
            echo '  <form action="./Perfil_Aspirante.html" method="POST">
                        <input class="goBack" id="btnGB" type="submit" value="&#9756">
                    </form>
                    <article class="content">
                        <section id="cabecera">
                            <div id="titulo">
                                <center>
                                    <img src="../../../../Imagenes/otros logos/disserLogo.jpg" class="logoTrascendental" alt="logoTrascendental">';
                            echo '  <h2>CONTRATO INDIVIDUAL DE TRABAJO A ' . $row['tipoContrato'] . '</h2>';
                        echo '  </center>
                            </div>
                        </section>
                        <section id="cuerpo">
                            <div id="cuerpo">
                                <center>
                                    <table class="datos">
                                        <tr>
                                            <th>Nombre del Empleador</th>
                                            <td>Disser Ingenieria S.A.S.</td>
                                        </tr>
                                        <tr>
                                            <th>NIT</th>
                                            <td>830.032.688 - 5</td>
                                        </tr>
                                        <tr>
                                            <th>Domicilio del Empleador</th>
                                            <td>Calle 169 Nº 20-06 Piso 2</td>
                                        </tr>
                                        <tr>
                                            <th>Nombre del Trabajador</th>';
                                    echo '  <td>'  . $row['PnombreAspirante'] . ' ' . $row['SnombreAspirante'] . ' ' . $row['PapellidoAspirante'] . ' ' . $row['SapellidoAspirante'] . '</th>';
                                echo '  </tr>
                                        <tr>
                                            <th>Cedula</th>';
                                    echo '  <td>' . $row['docAspirante'] . ' de ' . $row['ciudad'] . '</td>';
                                echo '  </tr>
                                        <tr>
                                            <th>Direccion del Trabajador</th>';
                                    echo '  <td>' . $row['direccionResidencia'] . '</td>';
                                echo '  </tr>
                                        <tr>
                                            <th>Telefono</th>';
                                    echo '  <td>' . $row['telefonoContacto'] . '</td>';
                                echo '  </tr>
                                        <tr>
                                            <th>Cargo</th>';
                                    echo '  <td>' . $row['tipoCargoDesp'] . '</td>';
                                echo '  </tr>
                                        <tr>
                                            <th>Salario</th>';
                                    echo '  <td>' . $row['salario'] . '</td>';
                                echo '  </tr>
                                        <tr>
                                            <th>Prestaciones</th>';
                                    echo '  <td>' . $row['valorPrestaciones'] . '</td>';
                                echo '  <tr>
                                            <th>Forma de Pago</th>
                                            <td>Mensual</td>
                                        </tr>
                                        <tr>
                                            <th>Fecha de Ingreso</th>';
                                    echo '  <td>' . $row['fechaInicio'] . '</td>';
                                echo '  </tr>
                                        <tr>
                                            <th>Nombre de la Obra</th>';
                                    echo '  <td>' . $row['nombreObra'] . '</td>';
                                echo '  </tr>
                                        <tr>
                                            <th>Ciudad de la Obra</th>';
                                    echo '  <td>' . $row['ciudadObra'] . '</td>';
                                echo '  </tr>
                                    </table>
                            </center>';
                    echo '  <p class="parrafoC">
                                Entre los suscritos a saber <b>de una parte, DISSER INGENIERIA S.A.S.</b>, sociedad de tipo comercial, legalmente constituida, identificada con el
                                <b>NIT. 830.032.688 - 5</b>, tal como consta en su correspondiente certificado de existencia y representacion, expedido por la Camara de Comercio de Bogota, con domicilio en dicha
                                ciudad, actuando en el presente contrato a traves de su representante legal Ing. <b>Andres Emilio Nova Garcia,</b> mayor de edad, con domicilio y residencia en la ciudad de Bogota,
                                identificado con la C.C. No. <b>7222162 de Duitama</b>, quien en adelante y para los efectos de este contrato se denominara <b>EL EMPLEADOR</b> y, de otra,
                                <b>' . $row['PnombreAspirante'] . ' ' . $row['SnombreAspirante'] . ' ' . $row['PapellidoAspirante'] . ' ' . $row['SapellidoAspirante'] . '</b>, igualmente mayor de edad, domiciliado
                                y residenciado en la ciudad de <b>' . $row['ciudad'] . '</b> identificado con la C.C. No. <b>' . $row['docAspirante'] . ' de ' . $row['ciudad'] .'</b>, quien en adelante y para los
                                efectos de este <b>otro si</b> a este contrato se denominara <b>EL TRABAJADOR</b>, hemos acordado un cambio de proyecto
                                para ' . $row['nombreObra'] . ' en la ciudad de '. $row['ciudadObra'] . ' a partir del ' . $row['fechaInicio'] . '.
                            </p>';
                    echo'</div>
                        <center>
                            <div class="firma">
                                <table class="firmas">
                                    <tr>
                                        <th>EL EMPLEADOR</th>
                                        <th>EL TRABAJADOR</th>
                                    </tr>
                                    <tr>
                                        <td><br><br><br><br><br><br></td>
                                        <td><br><br><br><br><br><br></td>
                                    </tr>
                                    <tr class="name">
                                        <td>Andres Emilio Nova Garcia</td>';
                                echo '  <td>'  . $row['PnombreAspirante'] . ' ' . $row['SnombreAspirante'] . ' ' . $row['PapellidoAspirante'] . ' ' . $row['SapellidoAspirante'] . '</td>';
                            echo '  </tr>
                                    <tr class="cc">
                                        <th>C.C. No. 7222162 de Duitama</th>';
                                echo '  <th>C.C. No. ' . $row['docAspirante'] . ' de ' . $row['ciudad'] . '</th>';
                            echo '  </tr>
                                </table>
                            </div>
                        </center>
                    </section>
                    <center>
                        <div class="piePag">
                            <p>Página 1</p>
                        </div>
                    </center>';
        }

    }

?>