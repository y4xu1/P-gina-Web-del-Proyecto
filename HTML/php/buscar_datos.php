<?php
    /*busqueda de documentos en recursos recursosHumanos*/

 /*-------------------------------conexiones con la pagina-----------------------------------------*/   
    include("conexion.php"); 
    include();/*conexion con los datos cargados del aspirante o algo asi =)*/ 
    mysql_select_db($dbname,$conn) or die("hubo un error al conectarse a la base de datos");
    
    $salida ="";
    $quary = "SELECT * FROM /*base donde estan los datos */ ORDER BY /*base de datossaca la informacion*/";
 /*-----------------------------------codigo de busqueda---------------------------------------------*/

    if(isset($_POST['consulta'])){
        $q = $mysqli-> real_escape_string($_POST['consulta']);
 
        $quary = "SELECT /*nombres de la tabla aspirante */FROM /*tabla de aspirantes*/
        WHERE/* --nombre-- */like '%".$q."%' OR marca LIKE '%".$q."%' OR modelo LIKE '%".$q."'"; 
    }        
     

    $resultado= $mysqli->query($query);

    if ($resultado->num_rows > 0){

        /*armar tabla con datos*/
        $salida.="<table class='deco_tablas_busqueda'>
                        <thead>
                            <tr>
                                <td>"nombre tabla"</td>
                                <td>"nombre tabla"</td>
                                <td>"nombre tabla"</td>
                                <td>"nombre tabla"</td>
                                <td>"nombre tabla"</td>
                            </tr>
                        </thead>
                        <tbody>";

        while($fila = $resultado -> fetch_assoc()){

            $salida.="<tr>
                        <td>".$fila[nombre tablas]."</td>
                        <td>".$fila[]."</td>
                        <td>".$fila[]."</td>
                        <td>".$fila[]."</td>
            </tr>";

        }

            $salida.="</tbody></table>";


    }else{

        $salida.=" DATO NO ENCONTRADO, VERIFIQUE CODIGO";

    }

    echo $salida;

    $mysqli->close();



?>