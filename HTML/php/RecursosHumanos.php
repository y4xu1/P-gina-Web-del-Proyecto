<?php

include("Conexion.php");


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
  mysqli_query($conn,$consulta);
  mysqli_close($conn);
}