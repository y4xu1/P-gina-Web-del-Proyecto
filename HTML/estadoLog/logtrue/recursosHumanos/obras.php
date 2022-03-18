<?php
    //Conexión con la base de datos
    include ("../../../php/conexion.php");
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
                        <li id="Perfil"><a href="Mi_Perfil.html" class="menu">Mi Perfil</a><img src="../../../../Imagenes/otros logos/Log_Notificacion.png" alt="Logo Notificación" class="" id="Logo_Notificacion"></li>
                        <li><a href="formularios/induccion.html" class="menu">Formularios</a></li>
                        <li><a href="Contratos.html" class="menu">Contratos</a></li>
                        <li><a href="obras.php" class="menu">Obras</a></li>
                        <li><a href="aspirantes.php" class="menu">Aspirantes</a></li>
                    </ul>
                </nav>
            </section>
        </header>
       
        <!-- Barra lateral desplegable con función de las notificaciones -->
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
                    font-weight: bolder;
                    color: black;
                    font-size: 100%;
                }
                table thead th {
                    color: #442;
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
                    font-size: 95%;
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
            </style>
            <br><br><br><br><br><br><br><br><br><br>
            <article>
                
                <?php
                    //Reconocimiento de botones
                    if (isset($_POST['buscar'])) {
                        busq($conn);
                    }
                    else if (isset($_POST['btnDescargar'])) {
                        dPDF($conn);
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
        aspirante.PnombreAspirante, aspirante.SnombreAspirante, contrato.tipoCargoDesp, aspirante.PapellidoAspirante, aspirante.SapellidoAspirante,
        aspirante.eps, aspirante.arl FROM contrato INNER JOIN aspirante ON contrato.docAspirante = aspirante.docAspirante ORDER BY nombreObra ";
        
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

        $id = $_POST['nombreObra'];
        $id2 = $_POST['ciudadObra'];
        $fecha1 = $_POST['fecha1'];
        $fecha2 = $_POST['fecha2'];

        $query = "SELECT contrato.nombreObra, contrato.ciudadObra, contrato.fechaInicio, aspirante.docAspirante,
        aspirante.PnombreAspirante, contrato.tipoCargoDesp, aspirante.SnombreAspirante, aspirante.PapellidoAspirante,
        aspirante.SapellidoAspirante, aspirante.eps, aspirante.arl FROM contrato INNER JOIN aspirante
        ON contrato.docAspirante = aspirante.docAspirante WHERE contrato.nombreObra = '$id' AND contrato.ciudadObra = '$id2'
        AND contrato.fechaInicio BETWEEN '$fecha1' AND '$fecha2' ORDER BY fechaInicio";

        $queryObra = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($queryObra)) {
            echo '
            <section id="busq">
                <form action="" method="post">
                    <input type="submit" id="x" name="hide" value="&#x2716">
                </form>
                <section>
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
                            </tr>
                            <tr>
                                <form action="./obras.php" method="post">
                                    <td><input type="text" class="texto" name="nombreObra" id="nombreObra" value="' . $row['nombreObra'] . '" disabled></td>
                                    <td><input type="text" class="texto" name="ciudadObra" id="ciudadObra" value="' . $row['ciudadObra'] . '" disabled></td>
                                    <td><input type="text" class="texto" name="fechaInicio" id="fechaInicio" value="' . $row['fechaInicio'] . '" disabled></td>
                                    <td><input type="text" class="texto" name="docAspirante" id="docAspirante" value="' . $row['docAspirante'] . '" disabled></td>
                                    <td><input type="text" class="texto" name="nombres" id="nombres" value="' . $row['PnombreAspirante'] . " " . $row['SnombreAspirante'] . " "  . $row['PapellidoAspirante'] . " "  . $row['SapellidoAspirante'] . '" disabled></td>
                                    <td><input type="text" class="texto" name="eps" id="eps" value="' . $row['tipoCargoDesp'] . '" disabled></td>
                                    <td><input type="text" class="texto" name="eps" id="eps" value="' . $row['eps'] . '" disabled></td>
                                    <td><input type="text" class="texto" name="arl" id="arl" value="' . $row['arl'] . '" disabled></td>
                                </form>
                            </tr>
                        </table>
                        </center>
                </section>
            </section>
            ';
        }
    }

    //Función para generar PDF
    function dPDF($conn) {

        /* require '../../../php/pdfLibreria/fpdf.php';

        //Inicio clase del pdf
        class PDF extends FPDF {
                        
            //Cabecera del PDF
            function header() {
                // Arial bold 12
                $this->SetFont('Arial','B',12);
                // Move to the right
                $this->Cell(50);
                // Title
                $this->Cell(50,20,'Información de la obras del trabajador',0,1,'C');
                // Line break
                $this->Ln(0);
            }

            function SetStyle($tag, $enable) {
                // Modificar estilo y escoger la fuente correspondiente
                $this->$tag += ($enable ? 1 : -1);
                $style = '';
                foreach(array('B', 'I', 'U') as $s){
                    if($this->$s>0)
                        $style .= $s;
                }
                $this->SetFont('',$style);
            }
        }

        $dato = $_POST['docAspirante'];
        $consulta = "SELECT contrato.nombreObra, contrato.fechaInicio, contrato.fechaFin, aspirante.docAspirante,
        aspirante.PnombreAspirante, aspirante.SnombreAspirante, aspirante.PapellidoAspirante, aspirante.SapellidoAspirante,
        contrato.ciudadObra, aspirante.eps, aspirante.arl FROM contrato INNER JOIN aspirante
        ON contrato.docAspirante = aspirante.docAspirante WHERE aspirante.docAspirante = '$dato'";
    
        $resul = mysqli_query($conn, $consulta);

        //Generar nuevo PDF    
        $pdf = new PDF('P','mm','A4');
        //Definición de márgenes del pdf
        $pdf->SetLeftMargin(30);
        $pdf->SetRightMargin(30);
        //Pronombres de las páginas
        $pdf->AliasNbPages();
        //Agregación de páginas
        $pdf->AddPage();
        //Definición de caligrafía, negrilla y tamaño
        $pdf->SetFont('Arial','',11);

        while ($row = mysqli_fetch_assoc($resul)){
    
            $pdf->Cell(75,8, 'Nombre de la Obra', 1, 0, 'C', 0);
            $pdf->Cell(75,8, $row['nombreObra'], 1, 1, 'C', 0);

            $pdf->Cell(75,8, 'Fecha de inicio', 1, 0, 'C', 0);
            $pdf->Cell(75,8, $row['fechaInicio'], 1, 1, 'C', 0);
            
            $pdf->Cell(75,8, 'Fecha de finalización', 1, 0, 'C', 0);
            $pdf->Cell(75,8, $row['fechaFin'], 1, 1, 'C', 0);
            
            $pdf->Cell(75,8, 'N° Documento', 1, 0, 'C', 0);
            $pdf->Cell(75,8, $row['docAspirante'], 1, 1, 'C', 0);

            $pdf->Cell(75,8, 'Nombres y Apellidos', 1, 0, 'C', 0);
            $pdf->Cell(75,8, $row['PnombreAspirante'] . ' ' . $row['SnombreAspirante'] . ' ' . $row['PapellidoAspirante'] . " " . $row['SapellidoAspirante'], 1, 1, 'C', 0);

            $pdf->Cell(75,8, 'Ciudad', 1, 0, 'C', 0);
            $pdf->Cell(75,8, $row['ciudadObra'], 1, 1, 'C', 0);  

            $pdf->Cell(75,8, 'EPS', 1, 0, 'C', 0);
            $pdf->Cell(75,8, $row['eps'], 1, 1, 'C', 0);  

            $pdf->Cell(75,8, 'ARL', 1, 0, 'C', 0);
            $pdf->Cell(75,8, $row['arl'], 1, 1, 'C', 0); 
        }
    
        $pdf -> Output();*/
    }
?>