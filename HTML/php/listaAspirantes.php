<?php

include("conexion.php");
#include("Aspirantes.php");

function perfilAspirante ($conn) {

  #$aspiranteDatos = "SELECT * FROM aspirante";
  #$aspiranteDocs = "SELECT * FROM documentos";
  #$aspirante = "SELECT * FROM aspirante AND documentos";
  #$aspirante = "SELECT * FROM aspirante, documentos WHERE docAspirante = docAspirante";
  $aspiranteDatos = "SELECT aspirante.PnombreAspirante, aspirante.SnombreAspirante, aspirante.PapellidoAspirante, aspirante.SapellidoAspirante, aspirante.docAspirante, documentos.curriculum, documentos.certificadoAlturas, documentos.certificadoJudicial, documentos.certificadoJudicial, documentos.certificadoPenal, documentos.certificadoDisciplinario, documentos.resultadosMedicos, documentos.carnetVacCovid, documentos.referenciasPersonales, documentos.referenciasLaborales FROM aspirante INNER JOIN documentos ON aspirante.docAspirante = documentos.docAspirante";
  #$listaAsp = mysqli_query($conn, $aspiranteDatos, $aspiranteDocs);
  $listaAsp = mysqli_query($conn, $aspiranteDatos) or die (mysqli_error($conn));

  while ($lista = mysqli_fetch_array($listaAsp)) {
    echo "<section class='Perfil_Aspirante'>";
      echo "<section class='Foto_Perfil'>";
      #echo "" . $lista['fotoAspirante'] . "";
      echo "<img src='../../../../Imagenes/otros logos/Logo_Usuario.png' alt='Logo_Usuario' class='Logo_Usuario'>";
      echo "</section>";
      echo "<section class='Documentos_Aspirante'>";
        echo "<p><a href='../aspirantes/Perfil_Aspirante.html' name='aspName'>" . $lista['PnombreAspirante'] . " " . $lista['SnombreAspirante'] . " " . $lista['PapellidoAspirante'] . " " . $lista['SapellidoAspirante'] . "</a></p>";
        /* ---------------------------------- */
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['docAspirante'] . "' id='Documento_1P'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['curriculum'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoAlturas'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoJudicial'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoPenal'] . "' id='Documento_1P'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoDisciplinario'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['resultadosMedicos'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['carnetVacCovid'] . "'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['referenciasPersonales'] . "' id='Documento_1P'>";
        echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['referenciasLaborales'] . "' id='Documento_1P'>";
        /* ---------------------------------- */
        echo "<input class='botons' type='submit' name='Bloqueo' value='Bloquear' id='Botón_Bloqueo'>";
      echo "</section>";
      echo "<section class='Comentarios'>";
        echo "<textarea class='controls' rows='23' name='comentario' placeholder='Agregar un comenterio...' id='Comentario'></textarea>";
        echo "<input class='botons' type='submit' name='Botón_Envío' value='Enviar' id='Botón_Envío'>";
      echo "</section>";
    echo "</section>";
  }

  #$fotoAspirante = ""

}

/*
#lista de aspirantes
#$listadoAsp = isset();
function listadoAsp ($conn) {

    $listadoAsp = "SELECT * FROM aspirante AND usuario AND documentos";
    $consulAsp = mysquli_query($conn, $listadoAsp);

    function fotoPerfil ($conn) {
        
    $consulFoto_Aspirante = "SELECT fotoAspirante FROM aspirante WHERE ";

    $fotoPerfil=$_POST["fotoPerfil"];

    echo "" . $foto['fotoPerfil'] . "";

    function listadoDoc_Aspirantes ($conn) {

    }

    mysqli_close($conn);
  }
}*/
/*

$listado = isset();
function $listado($conn) {
  function fotoPerfil ($conn) {

    $fotoPerfil=$_POST["fotoPerfil"];

    $consulFoto_Aspirante = "SELECT fotoAspirante FROM aspirante";
    echo $foto['fotoPerfil'];

  }
}

-------------------------------------------------

<?php

    function listado ($conn) {

    $listaAspirantes = "SELECT * FROM aspirante AND usuario";
    $completo = mysqli_query($conn, $listaAspirantes);

    while ($dato = mysqli_fetch_array($completo)) {

        echo "<section class='contenido'>";
            echo "<section class='Perfil_Aspirante'>";
                echo "<section class='Foto_Perfil' name'fotoPerfil'> <? =fotoPerfil($conn); ?> </section>";
                echo "<section class='Documentos_Aspirantes'> <? =listaDoc_Aspirante($conn); ?> </section>";
                    cho "<section class='Comentarios'>";
                    echo "<textarea class='controls' rows='8.5' name='comentario' placeholder='Agregar un comenterio...' id='Comentario'></textarea>";
                    echo "<input class='botons' type='submit' name='Botón_Envío' value='Enviar' id='Botón_Envío'>";
                echo "</section>";
            echo "</section>";
        echo "</section>";
    }

    }

?>

*/
?>