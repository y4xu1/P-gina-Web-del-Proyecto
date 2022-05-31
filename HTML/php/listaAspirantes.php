<!-- Vinculación con el archivo aspirantes.php definiendo el contenido del perfil de los aspirantes de acuerdo con la base de datos -->
<?php

include("conexion.php");

if (ISSET($_POST['bloquear'])) {
  bloqueo($conn);
  echo '<script>
          alert("El usuario fue bloqueado correctamente");
          window.location="../estadoLog/logtrue/recursosHumanos/aspirantes.php";
        </script>';
}

//Es llamada desde el archivo principal (recursosHumanos/aspirantes.php) para consultar cada perfil de los usuarios con el rol de aspirante
function perfilAspirante ($conn) {

  $aspiranteDatos = "SELECT aspirante.PnombreAspirante, aspirante.SnombreAspirante, aspirante.PapellidoAspirante,
  aspirante.SapellidoAspirante, aspirante.docAspirante, aspirante.ciudad, aspirante.telefonoContacto,
  aspirante.correoElectronico, aspirante.Libretamilitar, aspirante.EPS, aspirante.genero, documentos.curriculum,
  documentos.certificadoAlturas, documentos.certificadoJudicial, documentos.certificadoJudicial,
  documentos.certificadoPenal, documentos.certificadoDisciplinario, documentos.resultadosMedicos,
  documentos.carnetVacCovid, documentos.referenciasPersonales, documentos.referenciasLaborales
  FROM aspirante INNER JOIN documentos
  ON aspirante.docAspirante = documentos.docAspirante WHERE aspirante.estadoAspirante = 1";
  
  $listaAsp = mysqli_query($conn, $aspiranteDatos) or die (mysqli_error($conn));

  //Realiza en bucle consulta de cada fila en la base de datos con la respectiva llave primaria y foranea de conexión de tablas en la base de datos para así mostrar en lista
  //los perfiles de los aspirantes que han realizado un diligenciamiento de sus documentos.
  while ($lista = mysqli_fetch_array($listaAsp)) {

    //Contenido del perfil del aspirante
    echo "<articulesection class='Perfil_Aspirante'>";
    
      echo'<section class="infoAsp">
            <center>
                <table>
                    <tr>
                        <td colspan="2">
                            <center>
                                <img src="../../../../Imagenes/otros logos/Logo_Usuario.png" alt="Logo_Usuario" class="Logo_Usuario">
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center>
                                <a href="../aspirantes/Perfil_Aspirante.html" name="aspName">' . $lista['PnombreAspirante'] . ' ' . $lista['SnombreAspirante'] . ' ' . $lista['PapellidoAspirante'] . ' ' . $lista['SapellidoAspirante'] . '</a>
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <th>Documento aspirante</th>
                        <td>' . $lista['docAspirante'] . '</td>
                    </tr>
                    <tr>
                        <th>Ciudad</th>
                        <td>' . $lista['ciudad'] . '</td>
                    </tr>
                    <tr>
                        <th>Telefono</th>
                        <td>' . $lista['telefonoContacto'] . '</td>
                    </tr>
                    <tr>
                        <th>Correo</th>
                        <td>' . $lista['correoElectronico'] . '</td>
                    </tr>
                    <tr>
                        <th>Libreta Militar</th>
                        <td>' . $lista['Libretamilitar'] . '</td>
                    </tr>
                    <tr>
                        <th>EPS</th>
                        <td>' . $lista['EPS'] . '</td>
                    </tr>
                    <tr>
                        <th>Genero</th>
                        <td>' . $lista['genero'] . '</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <form action="../../../php/Aspirantes.php" method="POST">
                                <input type="text" name="docAspirante" style="visibility:hidden" value="' . $lista['docAspirante'] . '">
                                <center>
                                    <input class="botons" type="submit" name="bloquear" value="Bloquear Aspirante" id="Botón_Bloqueo">
                                </center>
                            </form>
                        </td>
                    </tr>
                </table>
            </center>
        </section>';

      echo "<section class='Documentos_Aspirante'>";
        
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['docAspirante'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['curriculum'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoAlturas'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoJudicial'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoPenal'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoDisciplinario'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['resultadosMedicos'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['carnetVacCovid'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['referenciasPersonales'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['referenciasLaborales'] . "'>";
        echo '</section>';

    echo "</articulesection>";
  }
}
  
  //Inicia la función de búsqueda o de consulta de uno o varios usuarios que concuerden con la busqueda ingresada
function busqAspirante($conn) {

  //Identificador del input en el formulario línea 20
  $id = $_POST['docAspirante'];

  $consulta = "SELECT aspirante.PnombreAspirante, aspirante.SnombreAspirante, aspirante.PapellidoAspirante, aspirante.SapellidoAspirante, 
  aspirante.docAspirante, aspirante.tipoCargo, aspirante.ciudad, aspirante.telefonoContacto,
  aspirante.correoElectronico, aspirante.Libretamilitar, aspirante.EPS, aspirante.genero,

  documentos.curriculum, documentos.certificadoAlturas, documentos.certificadoJudicial, documentos.certificadoJudicial, 
  documentos.certificadoPenal, documentos.certificadoDisciplinario, documentos.resultadosMedicos, documentos.carnetVacCovid, documentos.referenciasPersonales, 
  documentos.referenciasLaborales
  FROM aspirante INNER JOIN documentos ON aspirante.docAspirante = documentos.docAspirante WHERE aspirante.docAspirante='$id'";

  $fQuery = mysqli_query($conn, $consulta);

  while ($row = mysqli_fetch_array($fQuery)) {
      //Contenido del perfil del aspirante
      echo "<center>";
      echo "<section class='Perfil_Aspirante' style='width:70%'>";
    
      echo'<div class="infoAsp">
            <center>
                <table>
                    <tr>
                        <td colspan="2">
                            <center>
                                <img src="../../../../Imagenes/otros logos/Logo_Usuario.png" alt="Logo_Usuario" class="Logo_Usuario">
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center>
                                <a href="../aspirantes/Perfil_Aspirante.html" name="aspName">' . $row['PnombreAspirante'] . ' ' . $row['SnombreAspirante'] . ' ' . $row['PapellidoAspirante'] . ' ' . $row['SapellidoAspirante'] . '</a>
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <th>Documento aspirante</th>
                        <td>' . $row['docAspirante'] . '</td>
                    </tr>
                    <tr>
                        <th>Tipo de cargo</th>
                        <td>' . $row['tipoCargo'] . '</td>
                    </tr>
                    <tr>
                        <th>Ciudad</th>
                        <td>' . $row['ciudad'] . '</td>
                    </tr>
                    <tr>
                        <th>Telefono</th>
                        <td>' . $row['telefonoContacto'] . '</td>
                    </tr>
                    <tr>
                        <th>Correo</th>
                        <td>' . $row['correoElectronico'] . '</td>
                    </tr>
                    <tr>
                        <th>Libreta Militar</th>
                        <td>' . $row['Libretamilitar'] . '</td>
                    </tr>
                    <tr>
                        <th>EPS</th>
                        <td>' . $row['EPS'] . '</td>
                    </tr>
                    <tr>
                        <th>Genero</th>
                        <td>' . $row['genero'] . '</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <form action="../../../php/Aspirantes.php" method="POST">
                                <input type="text" name="docAspirante" style="visibility:hidden" value="' . $row['docAspirante'] . '">
                                <center>
                                    <input class="botons" type="submit" name="bloquear" value="Bloquear Aspirante" id="Botón_Bloqueo">
                                </center>
                            </form>
                        </td>
                    </tr>
                </table>
            </center>
        </div>';

      echo "<div class='Documentos_Aspirante'>";
        
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['docAspirante'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['curriculum'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['certificadoAlturas'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['certificadoJudicial'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['certificadoPenal'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['certificadoDisciplinario'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['resultadosMedicos'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['carnetVacCovid'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['referenciasPersonales'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['referenciasLaborales'] . "'>";
        echo '</div>';

    echo "</section>";
    echo "</center>";



    /* echo "<section class='Perfil_Aspirante'>";

      echo "<section class='Foto_Perfil'>";
        echo "<img src='../../../../Imagenes/otros logos/Logo_Usuario.png' alt='Logo_Usuario' class='Logo_Usuario'>";
      echo "</section>";

      echo "<section class='Documentos_Aspirante'>";

        echo "<p><a href='../aspirantes/Perfil_Aspirante.html' name='aspName'>" . $row['PnombreAspirante'] . " " . $row['SnombreAspirante'] . " " . $row['PapellidoAspirante'] . " " . $row['SapellidoAspirante'] . "</a></p>";

        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['docAspirante'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['tipoCargo'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['curriculum'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['certificadoAlturas'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['certificadoJudicial'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['certificadoPenal'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['certificadoDisciplinario'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['resultadosMedicos'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['carnetVacCovid'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['referenciasPersonales'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $row['referenciasLaborales'] . "'>";

        echo '<form action="../../../php/Aspirantes.php" method="POST">';

          echo '<input type="text" name="docAspirante" value="' . $row['docAspirante'] . '" style="visibility:hidden; position: absolute;">';
          echo "<input class='botons' type='submit' name='bloquear' value='Bloquear Aspirante' id='Botón_Bloqueo'>";
        echo '</form>';
      echo "</section>";

    echo "</section>"; */
  }
}

function bloqueo($conn) {
  $id = $_POST['docAspirante'];

  $userQuery = "UPDATE usuarios SET estadoUsuarios = 0 WHERE numIdentificacion = '$id'";

  mysqli_query($conn, $userQuery); 
  mysqli_close($conn);
}
?>