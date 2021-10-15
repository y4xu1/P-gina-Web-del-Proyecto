<?php

include("conexion.php");
#include("Aspirantes.php");




function perfilAspirante ($conn) {

  $aspiranteDatos = "SELECT aspirante.PnombreAspirante, aspirante.SnombreAspirante, aspirante.PapellidoAspirante, aspirante.SapellidoAspirante, aspirante.docAspirante, documentos.curriculum, documentos.certificadoAlturas, documentos.certificadoJudicial, documentos.certificadoJudicial, documentos.certificadoPenal, documentos.certificadoDisciplinario, documentos.resultadosMedicos, documentos.carnetVacCovid, documentos.referenciasPersonales, documentos.referenciasLaborales FROM aspirante INNER JOIN documentos ON aspirante.docAspirante = documentos.docAspirante";
  $listaAsp = mysqli_query($conn, $aspiranteDatos) or die (mysqli_error($conn));

  do {
    while ($lista = mysqli_fetch_array($listaAsp)) {

      echo "<section class='Perfil_Aspirante'>";
        echo "<section class='Foto_Perfil'>";
        #echo "" . $lista['fotoAspirante'] . "";
        echo "<img src='../../../../Imagenes/otros logos/Logo_Usuario.png' alt='Logo_Usuario' class='Logo_Usuario'>";
        echo "</section>";
        echo "<section class='Documentos_Aspirante'>";
          echo "<p><a href='../aspirantes/Perfil_Aspirante.html' name='aspName'>" . $lista['PnombreAspirante'] . " " . $lista['SnombreAspirante'] . " " . $lista['PapellidoAspirante'] . " " . $lista['SapellidoAspirante'] . "</a></p>";
          
          /* ---------------------------------- */

          /*
          if ($conn) {
            echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['docAspirante'] . "'>";
          }
          else {
            echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['docAspirante'] . "' id='Documento_1P'>";
          }
          */
          echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['docAspirante'] . "'>";
          echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['curriculum'] . "'>";
          echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoAlturas'] . "'>";
          echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoJudicial'] . "'>";
          #$lista=mysqli_query(aspiranteDatos)
          /*
          if (mysqli_num_rows($listaAsp)!==0) {
            echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoPenal'] . "'>";
          } else {
            echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoPenal'] . "' id='Documento_1P'>";
          }
          */
          echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoPenal'] . "'>";
          echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoDisciplinario'] . "'>";
          echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['resultadosMedicos'] . "'>";
          echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['carnetVacCovid'] . "'>";
          echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['referenciasPersonales'] . "'>";
          echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['referenciasLaborales'] . "'>";
          
          /* ---------------------------------- */

          echo "<input class='botons' type='submit' name='Bloquear' value='Bloquear Documentos' id='Botón_Bloqueo'>";
        echo "</section>";
        echo "<section class='Comentarios'>";
          echo "<textarea class='controls' rows='23' name='comentario' placeholder='Agregar un comentario...' id='Comentario'></textarea>";
          echo "<input class='botons' type='submit' name='Botón_Envío' value='Enviar' id='Botón_Envío'>";
        echo "</section>";
      echo "</section>";

    }
  } while (isset($_GET['btnbuscador']));
    /*{

    busqueda($conn);
    function busqueda($conn) {*/
      
      
      #}
      
}
function buscarAsp($conn) {
  $datoAspirante = ($_GET['datoAsp']);
  
  #consulta
  $buscarDatos_Aspirante = "SELECT aspirante.PnombreAspirante, aspirante.SnombreAspirante, aspirante.PapellidoAspirante, aspirante.SapellidoAspirante, aspirante.docAspirante, documentos.curriculum, documentos.certificadoAlturas, documentos.certificadoJudicial, documentos.certificadoJudicial, documentos.certificadoPenal, documentos.certificadoDisciplinario, documentos.resultadosMedicos, documentos.carnetVacCovid, documentos.referenciasPersonales, documentos.referenciasLaborales FROM aspirante INNER JOIN documentos ON aspirante.docAspirante = documentos.docAspirante WHERE aspirante LIKE '%$datoAspirante%' = aspirante.docAspirante";
  #SELECT aspirante.PnombreAspirante, aspirante.SnombreAspirante, aspirante.PapellidoAspirante, aspirante.SapellidoAspirante, aspirante.docAspirante, documentos.curriculum, documentos.certificadoAlturas, documentos.certificadoJudicial, documentos.certificadoJudicial, documentos.certificadoPenal, documentos.certificadoDisciplinario, documentos.resultadosMedicos, documentos.carnetVacCovid, documentos.referenciasPersonales, documentos.referenciasLaborales FROM aspirante INNER JOIN documentos ON aspirante.docAspirante = documentos.docAspirante WHERE '$datoAspirante' = aspirante.docAspirante
  #SELECT aspirante.PnombreAspirante, aspirante.SnombreAspirante, aspirante.PapellidoAspirante, aspirante.SapellidoAspirante, aspirante.docAspirante, documentos.curriculum, documentos.certificadoAlturas, documentos.certificadoJudicial, documentos.certificadoJudicial, documentos.certificadoPenal, documentos.certificadoDisciplinario, documentos.resultadosMedicos, documentos.carnetVacCovid, documentos.referenciasPersonales, documentos.referenciasLaborales FROM aspirante INNER JOIN documentos ON aspirante.docAspirante = documentos.docAspirante OR ON '$datoAspirante' = aspirante.PnombreAsp OR ON '$datoAspirante' = aspirante.
  $listaResultado = mysqli_query($conn, $buscarDatos_Aspirante) or die (mysqli_error($conn));

  while ($lista = mysqli_fetch_array($listaResultado)) {
        echo "<section class='Perfil_Aspirante'>";
          echo "<section class='Foto_Perfil'>";
          #echo "" . $lista['fotoAspirante'] . "";
          echo "<img src='../../../../Imagenes/otros logos/Logo_Usuario.png' alt='Logo_Usuario' class='Logo_Usuario'>";
          echo "</section>";
          echo "<section class='Documentos_Aspirante'>";
            echo "<p><a href='../aspirantes/Perfil_Aspirante.html' name='aspName'>" . $lista['PnombreAspirante'] . " " . $lista['SnombreAspirante'] . " " . $lista['PapellidoAspirante'] . " " . $lista['SapellidoAspirante'] . "</a></p>";
            
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
            
            /* ---------------------------------- */
    
            echo "<input class='botons' type='submit' name='Bloquear' value='Bloquear Documentos' id='Botón_Bloqueo'>";
          echo "</section>";
          echo "<section class='Comentarios'>";
            echo "<textarea class='controls' rows='23' name='comentario' placeholder='Agregar un comenterio...' id='Comentario'></textarea>";
            echo "<input class='botons' type='submit' name='Botón_Envío' value='Enviar' id='Botón_Envío'>";
          echo "</section>";
        echo "</section>";
  }
}
?>

<?php
/*
function busueda($conn) {
  if (isset($_GET['btnbuscador'])){
    echo "<script>window.location='../estadoLog/logtrue/recursosHumanos/aspirantes.php';</script>";

    buscarAsp($conn);
    function buscarAsp($conn) {
      $datoAspirante = ($_GET['datoAsp']);
      
      #consulta
      $buscarDatos_Aspirante = "SELECT aspirante.PnombreAspirante, aspirante.SnombreAspirante, aspirante.PapellidoAspirante, aspirante.SapellidoAspirante, aspirante.docAspirante, documentos.curriculum, documentos.certificadoAlturas, documentos.certificadoJudicial, documentos.certificadoJudicial, documentos.certificadoPenal, documentos.certificadoDisciplinario, documentos.resultadosMedicos, documentos.carnetVacCovid, documentos.referenciasPersonales, documentos.referenciasLaborales FROM aspirante INNER JOIN documentos ON aspirante.docAspirante = documentos.docAspirante WHERE aspirante LIKE '%$datoAspirante%' = aspirante.docAspirante";
      #SELECT aspirante.PnombreAspirante, aspirante.SnombreAspirante, aspirante.PapellidoAspirante, aspirante.SapellidoAspirante, aspirante.docAspirante, documentos.curriculum, documentos.certificadoAlturas, documentos.certificadoJudicial, documentos.certificadoJudicial, documentos.certificadoPenal, documentos.certificadoDisciplinario, documentos.resultadosMedicos, documentos.carnetVacCovid, documentos.referenciasPersonales, documentos.referenciasLaborales FROM aspirante INNER JOIN documentos ON aspirante.docAspirante = documentos.docAspirante WHERE '$datoAspirante' = aspirante.docAspirante
      #SELECT aspirante.PnombreAspirante, aspirante.SnombreAspirante, aspirante.PapellidoAspirante, aspirante.SapellidoAspirante, aspirante.docAspirante, documentos.curriculum, documentos.certificadoAlturas, documentos.certificadoJudicial, documentos.certificadoJudicial, documentos.certificadoPenal, documentos.certificadoDisciplinario, documentos.resultadosMedicos, documentos.carnetVacCovid, documentos.referenciasPersonales, documentos.referenciasLaborales FROM aspirante INNER JOIN documentos ON aspirante.docAspirante = documentos.docAspirante OR ON '$datoAspirante' = aspirante.PnombreAsp OR ON '$datoAspirante' = aspirante.
      $listaResultado = mysqli_query($conn, $buscarDatos_Aspirante) or die (mysqli_error($conn));
    
      while ($lista = mysqli_fetch_array($listaResultado)) {
        echo "<section class='Perfil_Aspirante'>";
          echo "<section class='Foto_Perfil'>";
          #echo "" . $lista['fotoAspirante'] . "";
          echo "<img src='../../../../Imagenes/otros logos/Logo_Usuario.png' alt='Logo_Usuario' class='Logo_Usuario'>";
          echo "</section>";
          echo "<section class='Documentos_Aspirante'>";
            echo "<p><a href='../aspirantes/Perfil_Aspirante.html' name='aspName'>" . $lista['PnombreAspirante'] . " " . $lista['SnombreAspirante'] . " " . $lista['PapellidoAspirante'] . " " . $lista['SapellidoAspirante'] . "</a></p>";
            #if ($conn) {
              #echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['docAspirante'] . "'>";
            #}
            #else {
              #echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['docAspirante'] . "' id='Documento_1P'>";
            #}
            echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['docAspirante'] . "'>";
            echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['curriculum'] . "'>";
            echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoAlturas'] . "'>";
            echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoJudicial'] . "'>";
            #$lista=mysqli_query(aspiranteDatos)
            #if (mysqli_num_rows($listaAsp)!==0) {
              #echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoPenal'] . "'>";
            #} else {
              #echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoPenal'] . "' id='Documento_1P'>";
            #}
            echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoPenal'] . "'>";
            echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['certificadoDisciplinario'] . "'>";
            echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['resultadosMedicos'] . "'>";
            echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['carnetVacCovid'] . "'>";
            echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['referenciasPersonales'] . "'>";
            echo "<input type='submit' name='Boton_Documento' class='Boton_Documento' value='" . $lista['referenciasLaborales'] . "'>";
            
            ############################
    
            echo "<input class='botons' type='submit' name='Bloquear' value='Bloquear Documentos' id='Botón_Bloqueo'>";
          echo "</section>";
          echo "<section class='Comentarios'>";
            echo "<textarea class='controls' rows='23' name='comentario' placeholder='Agregar un comenterio...' id='Comentario'></textarea>";
            echo "<input class='botons' type='submit' name='Botón_Envío' value='Enviar' id='Botón_Envío'>";
          echo "</section>";
        echo "</section>";
      }
    }
  }
  else {
    echo "<script>alert('No se encontro a ningún aspirante, verifique los datos ingresados');</script>";
  }
}
*/
?>