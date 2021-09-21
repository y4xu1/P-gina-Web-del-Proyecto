<?php

include("Conexion.php");


insertar($conn);
function insertar ($conn){
  $pnombre=isset($_POST["pNombre"]);
  $snombre=isset($_POST["sNombre"]);
  $papellido=isset($_POST["pApellido"]);
  $sapellido=isset($_POST["sApellido"]);
  $tipo=isset($_POST["TipodeDocumento"]);
  $doca=isset($_POST["docAspirante"]);
  $fechaI=isset($_POST["FechaExpedición"]);
  $paisE=isset($_POST["Pais"]);
  $fechaN=isset($_POST["FechaNacimiento"]);
  $paisN=isset($_POST["PaísNacimiento"]);
  $dir=isset($_POST["Direccion"]);
  $cuidad=isset($_POST["ciudad"]);
  $telefono=isset($_POST["Telefono"]);
  $correo=isset($_POST["CorreoElectrónico"]);
  $cargo=isset($_POST["Cargo"]);
  $estadoC=isset($_POST["EstadoCívil"]);
  $estrato=isset($_POST["Estrato"]);
  $rh=isset($_POST["RH"]);
  $genero=isset($_POST["Género"]);
  $libretamilitar=isset($_POST["Libretamilitar"]);
  $eps=isset($_POST["EPS"]);

  $consulta= "INSERT INTO aspirante (docAspirante,idTipoDocumento,PnombreAspirante,SnombreAspirante,PapellidoAspirante,SapellidoAspirante,fechaExpDoc,paisExpDoc,fechaNacimiento,paisNacimiento,direccionResidencia,ciudad,telefonoContacto,correoElectronico,tipoCargo,estadoCivil,estrato,rh,genero,libretaMilitar,eps) VALUES ('$doca','$tipo','$pnombre','$snombre','$papellido','$sapellido','$fechaI','$paisE','$fechaN','$paisN','$dir','$cuidad','$telefono','$correo','$cargo','$estadoC','$estrato','$rh','$genero','$libretamilitar','$eps')";
  mysqli_query($conn,$consulta);
  mysqli_close($conn);
}
/*
$listado = isset();
#lista de aspirantes
function $listado($conn) {
  function fotoPerfil ($conn) {

    $fotoPerfil=$_POST["fotoPerfil"];

    $consulFoto_Aspirante = "SELECT fotoAspirante FROM aspirante";
    echo "";

  }
}
?>
*/