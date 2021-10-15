<!--Vinculacion con la pagina Mi_Perfil -->
<?php

include("Conexion.php");

#diferenciar cada boton encontrado en la pagina  
diferencia($conn);

function diferencia($conn){
if(isset($_POST ['enviar'])){
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
  $pnombre=($_POST["pNombre"]);
  $snombre=($_POST["sNombre"]);
  $papellido=($_POST["pApellido"]);
  $sapellido=($_POST["sApellido"]);
  $tipo=($_POST["TipodeDocumento"]);
  $doca=($_POST["docRecHum"]);
  $fechaI=($_POST["FechaExpedición"]);
  $paisE=($_POST["Pais"]);
  $fechaN=($_POST["FechaNacimiento"]);
  $paisN=($_POST["PaísNacimiento"]);
  $dir=($_POST["Direccion"]);
  $telefono=($_POST["Telefono"]);
  $correo=($_POST["CorreoElectrónico"]);
  $cargo=($_POST["Cargo"]);
  $estadoC=($_POST["EstadoCívil"]);
  $estrato=($_POST["Estrato"]);
  $rh=($_POST["RH"]);
  $genero=($_POST["Género"]);
  $eps=($_POST["EPS"]);

  $consulta= "INSERT INTO recursoshumanos (docRecHum,idTipoDocumento,pNombreRh,sNombreRh,pApellidoRh,sApellidoRh,fechaExpDoc,paisExpDoc,fechaNacimiento,paisNacimiento,direccionResidencia,telefonoContacto,correoElectronico,tipoCargo,estadoCivil,estrato,rh,genero,eps) VALUES ('$doca','$tipo','$pnombre','$snombre','$papellido','$sapellido','$fechaI','$paisE','$fechaN','$paisN','$dir','$telefono','$correo','$cargo','$estadoC','$estrato','$rh','$genero','$eps')";

  if(isset($_POST['btnregistrar'])) {
    echo "<script> window.location='../estadoLog/logtrue/recursosHumanos/Mi_Perfil.html' </script>";
    mysqli_query($conn,$consulta);
  }
  else {
    echo "<script> alert('Error al registrar datos'); window.location='Index.html'</script>";
 }
  #
  mysqli_close($conn);
}

#Boton Actualizar
#Actualizar los datos encontrados en la base de datos por los datos obtenidos en el formulario. 
function actualizar($conn){
  $pnombre=($_POST["pNombre"]);
  $snombre=($_POST["sNombre"]);
  $papellido=($_POST["pApellido"]);
  $sapellido=($_POST["sApellido"]);
  $tipo=($_POST["TipodeDocumento"]);
  $doca=($_POST["docRecHum"]);
  $fechaI=($_POST["FechaExpedición"]);
  $paisE=($_POST["Pais"]);
  $fechaN=($_POST["FechaNacimiento"]);
  $paisN=($_POST["PaísNacimiento"]);
  $dir=($_POST["Direccion"]);
  $telefono=($_POST["Telefono"]);
  $correo=($_POST["CorreoElectrónico"]);
  $cargo=($_POST["Cargo"]);
  $estadoC=($_POST["EstadoCívil"]);
  $estrato=($_POST["Estrato"]);
  $rh=($_POST["RH"]);
  $genero=($_POST["Género"]);
  $eps=($_POST["EPS"]);
  
     if(isset($_POST['btnActualizar'])) {
        $query = mysqli_query($conn,"UPDATE recursoshumanos SET idTipoDocumento='$tipo', pNombreRh='$pnombre',
         sNombreRh='$snombre', pApellidoRh='$papellido', sApellidoRh='$sapellido', fechaExpDoc='$fechaI', 
         paisExpDoc='$paisE', fechaNacimiento='$fechaN', 	paisNacimiento='$paisN', direccionResidencia='$dir', 
         telefonoContacto='$telefono', correoElectronico='$correo', tipoCargo='$cargo', estadoCivil='$estadoC',
          estrato='$estrato', rh='$rh', genero='$genero', eps='$eps' WHERE docRecHum='$doca'");
        echo "<script> window.location='../estadoLog/logtrue/recursosHumanos/Mi_Perfil.html' </script>";
        mysqli_close($conn);
     }
     else {
           echo "<script> alert('Error al actualizar'); window.location='Index.html'</script>";
        }
  }

?>