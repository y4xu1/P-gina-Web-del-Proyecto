<!--Vinculacion con la pagina de Contratos --> 
<?php

include("conexion.php");

#diferenciar cada boton encontrado en la pagina.  
diferencia($conn);

function diferencia($conn){
if(isset($_POST ['btnregistrar'])){
insertar($conn);
}
if(isset($_POST ['btnActualizar'])){
actualizar ($conn);
}
}
#Identificar cada variable de vinculacion con la pagina y la base de datos.
#Insertar a la base de datos los datos ingresados en cada campo del formulario.
insertar($conn);
    function insertar ($conn){
        $idContrato=$_POST["idcontrato"];
        $tipoContrato=$_POST["tipoContrato"];
        $docAspirante=$_POST["docAspirante"];
        $docRecursos=$_POST["docRecursos"];
        $cargo=$_POST["Cargo"]; 
        $Salario=$_POST["Salario"]; 
        $valor=$_POST["Valorprestaciones"]; 
        $fecha=$_POST["Fechainiciación"]; 
        $obra=$_POST["Nombreobra"]; 
        $cuidad=$_POST["Ciudadcontratado"];
        $firma=$_POST["Firma"];

        
        if (isset($_POST["btnregistrar"])) {
            $consulta= "INSERT INTO contrato (idContrato,tipoContrato,docAspirante,
            docRecHum,tipoCargoDesp,salario,valorPrestaciones,fechaInicio,nombreObra,ciudadObra,firma)
             VALUES ('$idContrato','$tipoContrato','$docAspirante','$docRecursos','$cargo','$Salario',
             '$valor','$fecha', '$obra',' $cuidad','$firma')";
            mysqli_query($conn,$consulta);
            echo "<script> alert('El contrato fue cargado correctamente.'); window.location='../estadoLog/logtrue/recursosHumanos/Contratos.html' </script>";  
            #echo "<script> window.location'../estadoLog/logtrue/recursosHumanos/contratos/Contrato_Fijo.html' </script>";
            /*if (mysqli_query($conn, $consulta)) {
                echo "<script> alert('Se a finalizado la acción con exito'); window.location'../estadoLog/logtrue/recursosHumanos/contratos/Contrato_Fijo.html' </script>";
            }
            else {
                echo "<script> alert('Hubo un error al enviar'); window.location'../estadoLog/logtrue/recursosHumanos/contratos/Contrato_Fijo.html' </script>";
            }*/
        }
        else {
            #echo "Error: ". $sql ."<br>". mysqli_error($conn);
            #echo "Error " . mysqli_error($conn) . "<br>";
            echo "<a href='../estadoLog/logtrue/recursosHumanos/Contratos.html'>volver</a>";           
        }
   
        #mysqli_close($conn);

}

#Boton Actualizar
#Actualizar los datos encontrados en la base de datos por los datos obtenidos en el formulario. 
function actualizar($conn){
    $idContrato=$_POST["idcontrato"];
        $tipoContrato=$_POST["tipoContrato"];
        $docAspirante=$_POST["docAspirante"];
        $docRecursos=$_POST["docRecursos"];
        $cargo=$_POST["Cargo"]; 
        $Salario=$_POST["Salario"]; 
        $valor=$_POST["Valorprestaciones"]; 
        $fecha=$_POST["Fechainiciación"]; 
        $obra=$_POST["Nombreobra"]; 
        $cuidad=$_POST["Ciudadcontratado"];
        $firma=$_POST["Firma"];
    
       if(isset($_POST['btnActualizar'])){
          $query = mysqli_query($conn,"UPDATE contrato SET tipoContrato='$tipoContrato', docAspirante='$docAspirante', docRecHum='$docRecursos', tipoCargoDesp='$cargo', salario='$Salario', valorPrestaciones='$valor',fechaInicio='$fecha', nombreObra='$obra', ciudadObra='$cuidad',firma='$firma' WHERE idContrato='$idContrato'");
          mysqli_close($conn);

        echo "<script> alert('El contrato fue actualizado correctamente.'); window.location='../estadoLog/logtrue/recursosHumanos/Contratos.html' </script>";  
    
       }
       else {
             echo "<script> alert('Error al actualizar'); window.location='Index.html'</script>";
          }
    }
?>