<?php
    //Conexión con la base de datos
    include ("../../../php/conexion.php");
    include ("../../../php/obrasFunciones.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="X-UA-Compatible" content="IE=7">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Obras</title>
        <link rel="stylesheet" href="../../../../CSS/Formato_Base.css">
        <link rel="stylesheet" href="../../../../CSS/estadoLog/log true/recursosHumanos/Contratos.css">
        <link rel="stylesheet" href="../../../../CSS/estadoLog/log true/recursosHumanos/obras.css">
        <link rel="icon" href="../../../../Imagenes/logoProyect/Logo_Principal.png">
    </head>
    <body>
<!-- Función de cerrar sesión -->
        <article class='logOut'>
             <a href="../../../php/cerrarSesion.php" class='btn_logOut'>
                 <img src="../../../../Imagenes/otros logos/quit.png" alt="Log_Out_Symbol" class='logOut_icon'>
             </a>
        </article>
<!-- Menu de Herramientas -->
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
<!-- contenido principal -->
            <style>
                * {
                    font-family: sans-serif;
                }
                .title {
                    font-size: 250%;
                    text-shadow: 1px 2px 3px black;
                }
                article table {
                    width: 95%;
                    border-collapse: collapse;
                }
                #busq {
                    position: fixed;
                    width: 92%;
                    float: left;
                    margin: 0% 4%;
                    padding-top: 0%;
                    background: rgb(200, 200, 200);
                    border-radius: 7px;
                }
                #busq #x {
                    margin-right: 0%;
                    padding: 5px 0.8%;
                    float: right;
                    position: relative;
                    border: none;
                    background: rgb(0, 0, 0, 0);
                    font-size: 110%;
                    border-top-right-radius: 7px;
                }
                #busq #x:hover {
                    background: #D32F2F;
                }
                #busq section {
                    margin: 0.2%;
                    margin-top: 35px;
                    padding: 3% 1.5%;
                    border-bottom-left-radius: 7px;
                    border-bottom-right-radius: 7px;
                    background: whitesmoke;
                }
                #busq table {
                    width: 100%;
                    border-radius: 5px;
                }
                table {
                    background: whitesmoke;
                    border-radius: 5px;
                    box-shadow: 0px 0px 10px gray;
                }
                table thead .texto {
                    color: #63572A;
                    font-size: 95%;
                    font-weight: 700;
                }
                table thead .texto::placeholder {
                    color: black;
                }
                table thead th {
                    color: #63572A;
                    opacity: 1;
                }
                article td, article th {
                    border: 1px solid black;
                }
                article table th {
                    padding: 0.5% 0%;
                    background: #DABF5D;
                    font-size: 105%;
                }
                article table #fechas {
                    display: inline-flex;
                    vertical-align: middle;
                }
                article table #fechas .date {
                    margin: 0%;
                    padding: 0%;
                    width: 122px;
                    border: none;
                    color: #63572A;
                    font-size: 95%;
                    font-weight: 700;
                }
                article input {
                    text-align: center;
                    background: rgb(0, 0, 0, 0);
                    color: black;
                }
                article .texto {
                    margin: 0%;
                    padding: 1% 0.5%;
                    width: 95%;
                    border: none;
                    font-size: 90%;
                }
                article .boton {
                    margin: 0%;
                    padding: 0%;
                    width: 100%;
                    border: none;
                    text-align: left;
                    font-size: 110%;
                }
                article .download {
                    display: inline-flex;
                    vertical-align: middle;
                    float: right;
                    margin: 5px 0px;
                    border: none;
                }
                article .download p {
                    margin: 14px 5px;
                }
                article .download input {
                    font-size: 180%;
                    border: none;
                    padding: 0%;
                    margin-top: -10px;
                }
            </style>
            <br><br><br><br><br><br><br><br>
            <article>
                
                <?php
                    //Reconocimiento de botones
                    if (isset($_POST['buscar'])) {
                        busq($conn);
                    }
                ?>

                <center>
                    <h3 class="title">Listado de obras</h3><br>
                    <table>
                        <thead>
                            <tr>
                                <form action="./obras.php" method="post">
                                    <th style="width: 200px;">
                                        <input type="text" class="texto" name="nombreObra" list="items_nombreOb" id="" placeholder="Nombre de la Obra">
                                        <datalist id="items_nombreOb">
                                            <?php
                                                $nombreOb = "SELECT nombreObra FROM contrato";

                                                $query_nombreOb = mysqli_query($conn, $nombreOb);

                                                while ($row_nombreOb = mysqli_fetch_assoc($query_nombreOb)) {
                                                    echo '<option value="'. $row_nombreOb['nombreObra'] . '">' . $row_nombreOb['nombreObra'] . '</option>';
                                                }
                                            ?>
                                        </datalist>
                                        
                                    </th>
                                    <th style="width: 200px;">
                                        <input type="text" class="texto" name="ciudadObra" list="items_ciudadOb" id="" placeholder="Ciudad de la Obra">
                                        <datalist id="items_ciudadOb">
                                            <?php
                                                $ciudadOb = "SELECT ciudadObra FROM contrato";

                                                $query_ciudadOb = mysqli_query($conn, $ciudadOb);

                                                while ($row_ciudadOb = mysqli_fetch_assoc($query_ciudadOb)) {
                                                    echo '<option value="'. $row_ciudadOb['ciudadObra'] . '">' . $row_ciudadOb['ciudadObra'] . '</option>';
                                                }
                                            ?>
                                        </datalist>
                                        
                                    </th>
                                    <th style="width: 380px;">
                                        <h4>Fecha</h4>
                                        <div id="fechas">
                                            <center>
                                                Desde <input type="date" class="date" name="fecha1" id="">
                                                Hasta
                                                <input type="date" class="date" name="fecha2" id="">
                                            </center>
                                        </div>
                                    </th>
                                    <th style = "width: 140px;">N° Documento</th>
                                    <th>Nombres y Apellidos</th>
                                    <th>Cargo</th>
                                    <th>EPS</th>
                                    <th style="border-right: none">ARL</th>
                                    <th style="width: 40px; border-left: none">
                                        <input type="submit" class="boton" name="buscar" value="&#x1f50d">
                                    </th>
                                </form>
                            </tr>
                        </thead>
                        <tbody>
                            <?=listaObra($conn)?>
                        </tbody>
                    </table>
                </center>
            </article> 
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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
<?php

    function listaObra($conn) {

        $consulta  = "SELECT contrato.nombreObra, contrato.ciudadObra, contrato.fechaInicio, aspirante.docAspirante,
        aspirante.PnombreAspirante, aspirante.SnombreAspirante, aspirante.PapellidoAspirante, aspirante.SapellidoAspirante, contrato.tipoCargoDesp,
        aspirante.eps, aspirante.arl FROM contrato INNER JOIN aspirante ON contrato.docAspirante = aspirante.docAspirante ORDER BY ciudadObra";
        
        $obraConsulta = mysqli_query($conn, $consulta);

        while ($row = mysqli_fetch_assoc($obraConsulta)) {
            echo '
            <tr>
                <form action="./obras.php" method="post">
                    <td ><input type="text" class="texto" name="nombreObra" id="nombreObra" value="' . $row['nombreObra'] . '" disabled></td>
                    <td ><input type="text" class="texto" name="ciudadObra" id="ciudadObra" value="' . $row['ciudadObra'] . '" disabled></td>
                    <td ><input type="text" class="texto" name="fechaInicio" id="fechaInicio" value="' . $row['fechaInicio'] . '" disabled></td>
                    <td ><input type="text" class="texto" name="docAspirante" id="docAspirante" value="' . $row['docAspirante'] . '" disabled></td>
                    <td ><input type="text" class="texto" name="nombres" id="nombres" value="' . $row['PnombreAspirante'] . " " . $row['SnombreAspirante'] . " "  . $row['PapellidoAspirante'] . " "  . $row['SapellidoAspirante'] . '" disabled></td>
                    <td ><input type="text" class="texto" name="tipoCargo" id="tipoCargo" value="' . $row['tipoCargoDesp'] . '" disabled></td>
                    <td ><input type="text" class="texto" name="eps" id="eps" value="' . $row['eps'] . '" disabled></td>
                    <td colspan="2"><input type="text" class="texto" name="arl" id="arl" value="' . $row['arl'] . '" disabled></td>
                </form>
            </tr>';
        }
    }

    function busq($conn) {

        $nombreObra_ = $_POST['nombreObra'];
        $ciudadObra_ = $_POST['ciudadObra'];
        $fecha1 = $_POST['fecha1'];
        $fecha2 = $_POST['fecha2'];

        $query = "SELECT contrato.nombreObra, contrato.ciudadObra, contrato.fechaInicio, aspirante.docAspirante,
        aspirante.PnombreAspirante, aspirante.SnombreAspirante, aspirante.PapellidoAspirante,
        aspirante.SapellidoAspirante, contrato.tipoCargoDesp, aspirante.eps, aspirante.arl FROM contrato INNER JOIN aspirante
        ON contrato.docAspirante = aspirante.docAspirante WHERE contrato.nombreObra = '$nombreObra_' AND contrato.ciudadObra = '$ciudadObra_'
        AND contrato.fechaInicio BETWEEN '$fecha1' AND '$fecha2' ORDER BY fechaInicio";

        $queryObra = mysqli_query($conn, $query);

        echo '
        <section id="busq">
            <form action="./obras.php" method="post">
                <input type="submit" id="x" name="hide" value="&#x2716">
            </form>
            <section>
                <form action="../../../php/obrasFunciones.php" method="post">
                    <input type="text" name="nombre_Obra" value="' . $nombreObra_ .'" style="visibility: hidden;">
                    <input type="text" name="ciudad_Obra" value="' . $ciudadObra_ .'" style="visibility: hidden;">
                    <input type="text" name="1fecha" value="' . $fecha1 .'" style="visibility: hidden;">
                    <input type="text" name="2fecha" value="' . $fecha2 .'" style="visibility: hidden;">
                    <center>
                        <h3 class="title">Resultados para la búsqueda</h3><br>
                        <table>
                            <tr>
                                <th>Nombre de la obra</th>
                                <th>Ciudad de la obra</th>
                                <th>Fecha de inicio</th>
                                <th>N° Documento</th>
                                <th>Nombres y Apellidos</th>
                                <th>Cargo</th>
                                <th>EPS</th>
                                <th>ARL</th>
                            </tr>';

                            while ($row = mysqli_fetch_assoc($queryObra)) {
                                echo'
                                <tr>
                                    <td><input type="text" class="texto" name="nombreObra" id="nombreObra" value="' . $row['nombreObra'] . '" disabled></td>
                                    <td><input type="text" class="texto" name="ciudadObra" id="ciudadObra" value="' . $row['ciudadObra'] . '" disabled></td>
                                    <td><input type="text" class="texto" name="fechaInicio" id="fechaInicio" value="' . $row['fechaInicio'] . '" disabled></td>
                                    <td><input type="text" class="texto" name="docAspirante" id="docAspirante" value="' . $row['docAspirante'] . '" disabled></td>
                                    <td><input type="text" class="texto" name="nombres" id="nombres" value="' . $row['PnombreAspirante'] . " " . $row['SnombreAspirante'] . " "  . $row['PapellidoAspirante'] . " "  . $row['SapellidoAspirante'] . '" disabled></td>
                                    <td><input type="text" class="texto" name="tipoCargo" id="tipoCargo" value="' . $row['tipoCargoDesp'] . '" disabled></td>
                                    <td><input type="text" class="texto" name="eps" id="eps" value="' . $row['eps'] . '" disabled></td>
                                    <td><input type="text" class="texto" name="arl" id="arl" value="' . $row['arl'] . '" disabled></td>
                                </tr>';
                            }
        
                    echo'</table>
                    </center>
                    <div class="download">
                        <p>Descargar </p>
                        <input type="submit" name="descargar" value="&#x1f4e5">
                    </div>
                </form>
            </section>
        </section>';
    }
?>