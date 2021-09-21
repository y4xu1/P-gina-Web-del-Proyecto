<?php

include("conexion.php");
include("Aspirantes.php");

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
}
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