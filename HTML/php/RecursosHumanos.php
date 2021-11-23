<!--Vinculacion con la pagina Mi_Perfil -->
<?php

include("conexion.php");

#diferenciar cada boton encontrado en la pagina  

if(isset($_POST ['btnregistrar'])){
  insertar($conn);
  echo "<script>";
    echo "alert('Su perfil fue cargado correctamente');";
    echo "window.location='../estadoLog/logtrue/recursosHumanos/Mi_Perfil.html';";
  echo "</script>";

} else if(isset($_POST ['btnActualizar'])){
  actualizar ($conn);
  echo "<script>";
    echo "alert('Su perfil fue actualizado correctamente');";
    echo "window.location='../estadoLog/logtrue/recursosHumanos/Mi_Perfil.html';";
  echo "</script>";
} else {
  echo "<script>alert('Error')</script>";
}

#diferencia($conn);
/*function diferencia($conn){
  if(isset($_POST ['enviar'])){
    insertar($conn);
    echo "<script>";
      echo "alert('Su perfil fue cargado correctamente');";
      echo "window.location='../estadoLog/logtrue/recursosHumanos/Mi_Perfil.html';";
    echo "</script>";

  } else if(isset($_POST ['btnActualizar'])){
    actualizar ($conn);
    echo "<script>";
      echo "alert('Su perfil fue cargado correctamente');";
      echo "window.location='../estadoLog/logtrue/recursosHumanos/Mi_Perfil.html';";
    echo "</script>";
  } else {
    echo "<script>alert('Error')</script>";
  }
}*/

#Identificar cada variable de vinculacion con la pagina y la base de datos.
#Insertar a la base de datos los datos ingresados en cada campo del formulario.
function insertar ($conn){

  $doca=($_POST["docRecHum"]);
  $pnombre=($_POST["pNombre"]);
  $snombre=($_POST["sNombre"]);
  $papellido=($_POST["pApellido"]);
  $sapellido=($_POST["sApellido"]);
  $fechaI=($_POST["FechaExpedición"]);
  $paisE=($_POST["Pais"]);
  $fechaN=($_POST["FechaNacimiento"]);
  $paisN=($_POST["PaisNacimiento"]);
  $dir=($_POST["Direccion"]);
  $telefono=($_POST["Telefono"]);
  $correo=($_POST["CorreoElectronico"]);
  $cargo=($_POST["Cargo"]);
  $estadoC=($_POST["EstadoCivil"]);
  $estrato=($_POST["Estrato"]);
  $rh=($_POST["RH"]);
  $genero=($_POST["Genero"]);
  $eps=($_POST["EPS"]);
  $arl=($_POST["ARL"]);

  $consulta= "INSERT INTO recursoshumanos(docRecHum,numIdentificacion,pNombreRh,sNombreRh,pApellidoRh,sApellidoRh,fechaExpDoc,paisExpDoc,fechaNacimiento,paisNacimiento,direccionResidencia,telefonoContacto,correoElectronico,tipoCargo,estadoCivil,estrato,rh,genero,eps,arl) VALUES ('$doca','$doca','$pnombre','$snombre','$papellido','$sapellido','$fechaI','$paisE','$fechaN','$paisN','$dir','$telefono','$correo','$cargo','$estadoC','$estrato','$rh','$genero','$eps','$arl')";
  mysqli_query($conn,$consulta);
  mysqli_close($conn);
  
}

#Boton Actualizar
#Actualizar los datos encontrados en la base de datos por los datos obtenidos en el formulario. 
function actualizar($conn){
  $doca=($_POST["docRecHum"]);
  $pnombre=($_POST["pNombre"]);
  $snombre=($_POST["sNombre"]);
  $papellido=($_POST["pApellido"]);
  $sapellido=($_POST["sApellido"]);
  $fechaI=($_POST["FechaExpedición"]);
  $paisE=($_POST["Pais"]);
  $fechaN=($_POST["FechaNacimiento"]);
  $paisN=($_POST["PaisNacimiento"]);
  $dir=($_POST["Direccion"]);
  $telefono=($_POST["Telefono"]);
  $correo=($_POST["CorreoElectronico"]);
  $cargo=($_POST["Cargo"]);
  $estadoC=($_POST["EstadoCivil"]);
  $estrato=($_POST["Estrato"]);
  $rh=($_POST["RH"]);
  $genero=($_POST["Genero"]);
  $eps=($_POST["EPS"]);
  $arl=($_POST["ARL"]);
  
  $consulta = "UPDATE recursoshumanos SET docRecHum='$doca' numIdentificacion='$doca', pNombreRh='$pnombre', sNombreRh='$snombre', pApellidoRh='$papellido', sApellidoRh='$sapellido', fechaExpDoc='$fechaI', paisExpDoc='$paisE', fechaNacimiento='$fechaN', paisNacimiento='$paisN', direccionResidencia='$dir', telefonoContacto='$telefono', correoElectronico='$correo', tipoCargo='$cargo', estadoCivil='$estadoC',estrato='$estrato', rh='$rh', genero='$genero', eps='$eps', arl='$arl' WHERE docRecHum = '$doca'";
  mysqli_query($conn,$consulta);
  mysqli_close($conn);

}

?>