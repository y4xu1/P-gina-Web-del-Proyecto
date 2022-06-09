<!--Vinculación con la pagina perfil_Aspirantes -->
<?php

include("conexion.php");
    
/*require_once("login.php");
echo $_SESSION["username"];*/
//diferenciar cada boton encontrado en la pagina.

if(isset($_POST['btnregistrar'])) {
  insertar($conn);
  echo "
    <script>
      alert('Su perfil fue cargado correctamente');
      window.location='../estadoLog/logtrue/aspirantes/Perfil_Aspirante.php';
    </script>
  ";
} else if(isset($_POST['btnActualizar'])) {
  actualizar ($conn);
  echo "
    <script>
      alert('Su perfil fue actualizado correctamente');
      window.location='../estadoLog/logtrue/aspirantes/Perfil_Aspirante.php';
    </script>
  ";
} else if(isset($_POST['btndocumentos'])) {
  documentos($conn);
  echo "
    <script>
      alert('Sus documentos fuerón cargados correctamente');
      window.location='../estadoLog/logtrue/aspirantes/Perfil_Aspirante.php';
    </script>
  ";
} else if(isset($_POST['Actualizardocumentos'])) {
  Actualizardocumentos($conn);
  echo "
    <script>
      alert('Sus documentos fuerón actualiazados correctamente');
      window.location='../estadoLog/logtrue/aspirantes/Perfil_Aspirante.php';
    </script>
  ";
} else if (ISSET($_POST['bloquear'])) {
  bloqueo($conn);
  echo "
    <script>
      alert('El usuario fue bloqueado correctamente');
      window.location='../estadoLog/logtrue/recursosHumanos/aspirantes.php';
    </script>
  ";
} else {
  echo "
    <script>
      alert('ERROR');
    </script>
  ";
}

#Identificar cada variable de vinculacion con la pagina y la base de datos.
#Insertar a la base de datos los datos ingresados en cada campo del formulario.
function insertar ($conn){

  $doca=($_POST["docAspirante"]);
  $pnombre=($_POST["pNombre"]);
  $snombre=($_POST["sNombre"]);
  $papellido=($_POST["pApellido"]);
  $sapellido=($_POST["sApellido"]);
  $fechaI=($_POST["FechaExpedición"]);
  $paisE=($_POST["Pais"]);
  $fechaN=($_POST["FechaNacimiento"]);
  $paisN=($_POST["PaísNacimiento"]);
  $dir=($_POST["Direccion"]);
  $cuidad=($_POST["ciudad"]);
  $telefono=($_POST["Telefono"]);
  $correo=($_POST["CorreoElectrónico"]);
  $cargo=($_POST["Cargo"]);
  $estadoC=($_POST["EstadoCívil"]);
  $estrato=($_POST["Estrato"]);
  $rh=($_POST["RH"]);
  $genero=($_POST["Género"]);
  $libretamilitar=($_POST["Libretamilitar"]);
  $eps=($_POST["EPS"]);
  $arl=($_POST["ARL"]);

  $consulta = "INSERT INTO aspirante (docAspirante,numIdentificacion,PnombreAspirante,SnombreAspirante,PapellidoAspirante,SapellidoAspirante,fechaExpDoc,paisExpDoc,fechaNacimiento,paisNacimiento,direccionResidencia,ciudad,telefonoContacto,correoElectronico,tipoCargo,estadoCivil,estrato,rh,genero,libretaMilitar,eps,arl,estadoAspirante	) VALUES ('$doca',$doca,'$pnombre','$snombre','$papellido','$sapellido','$fechaI','$paisE','$fechaN','$paisN','$dir','$cuidad','$telefono','$correo','$cargo','$estadoC','$estrato','$rh','$genero','$libretamilitar','$eps','$arl',1)";
  mysqli_query($conn,$consulta);

  mysqli_close($conn);
}

#Insertar a la base de datos los archivos ingresados en cada campo del formulario.
function documentos($conn){
  $docAspiranteS=$_POST["docAspirante"];
  $curriculum=$_POST["Curriculum"];
  $certificadoAlturas=$_POST["CertificadoAlturas"];
  $certificadoJudicial=$_POST["CertificadoJudicial"];
  $certificadoPenal=$_POST["CertificadoPenal"];
  $certificadoDisciplinario=$_POST["CertificadoDisciplinario"];
  $resultadosMedicos=$_POST["ResultadosMédicos"];
  $carnetVacCovid=$_POST["CarnetVacunaciónCovid-19"];
  $referenciasPersonales=$_POST["ReferenciasPersonales"];
  $referenciasLaborales=$_POST["ReferenciasLaborales"];
  $firma=$_POST["firma"];

  $consulta= "INSERT INTO documentos(docAspirante, curriculum, certificadoAlturas, certificadoJudicial,
  certificadoPenal, certificadoDisciplinario, resultadosMedicos, carnetVacCovid, referenciasPersonales,
  referenciasLaborales, firma) VALUES ('$docAspiranteS', '$curriculum', '$certificadoAlturas', '$certificadoJudicial',
  '$certificadoPenal', '$certificadoDisciplinario', '$resultadosMedicos', '$carnetVacCovid', '$referenciasPersonales',
  '$referenciasLaborales', '$firma')";
  
  mysqli_query($conn,$consulta);
  mysqli_close($conn);
}

#Actualizar los datos encontrados en la base de datos por los datos obtenidos en el formulario. 
function actualizar($conn){
  $doca=($_POST["docAspirante"]);
  $pnombre=($_POST["pNombre"]);
  $snombre=($_POST["sNombre"]);
  $papellido=($_POST["pApellido"]);
  $sapellido=($_POST["sApellido"]);
  $fechaI=($_POST["FechaExpedición"]);
  $paisE=($_POST["Pais"]);
  $fechaN=($_POST["FechaNacimiento"]);
  $paisN=($_POST["PaísNacimiento"]);
  $dir=($_POST["Direccion"]);
  $cuidad=($_POST["ciudad"]);
  $telefono=($_POST["Telefono"]);
  $correo=($_POST["CorreoElectrónico"]);
  $cargo=($_POST["Cargo"]);
  $estadoC=($_POST["EstadoCívil"]);
  $estrato=($_POST["Estrato"]);
  $rh=($_POST["RH"]);
  $genero=($_POST["Género"]);
  $libretamilitar=($_POST["Libretamilitar"]);
  $eps=($_POST["EPS"]);
  $arl=($_POST["ARL"]);

  #$consulta = "UPDATE aspirante SET docAspirante='$doca', numIdentificacion='$doca', PnombreAspirante='$pnombre', SnombreAspirante='$snombre', PapellidoAspirante='$papellido', SapellidoAspirante=' $sapellido',fechaExpDoc='$fechaI', paisExpDoc='$paisE', fechaNacimiento='$fechaN',paisNacimiento=' $paisN',direccionResidencia='$dir', ciudad='$cuidad', telefonoContacto='$telefono', correoElectronico='$correo',tipoCargo='$cargo',estadoCivil='$estadoC',estrato='$estrato',rh='$rh',genero='$genero',libretaMilitar='$libretamilitar',eps='$eps',arl='$arl' WHERE docAspirante = '$doca'";
  $consulta = "UPDATE aspirante SET PnombreAspirante='$pnombre', SnombreAspirante='$snombre', PapellidoAspirante='$papellido', SapellidoAspirante=' $sapellido',fechaExpDoc='$fechaI', paisExpDoc='$paisE', fechaNacimiento='$fechaN',paisNacimiento=' $paisN',direccionResidencia='$dir', ciudad='$cuidad', telefonoContacto='$telefono', correoElectronico='$correo',tipoCargo='$cargo',estadoCivil='$estadoC',estrato='$estrato',rh='$rh',genero='$genero',libretaMilitar='$libretamilitar',eps='$eps',arl='$arl' WHERE docAspirante = '$doca'";
  mysqli_query($conn, $consulta);
  mysqli_close($conn);
}

#Actualizar los archivos encontrados en la base de datos por los datos obtenidos en el formulario. 
function Actualizardocumentos ($conn){
  $docAspirante=($_POST["docAspirante"]);
  $curriculum=($_POST["Curriculum"]);
  $certificadoAlturas=($_POST["CertificadoAlturas"]);
  $certificadoJudicial=($_POST["CertificadoJudicial"]);
  $certificadoPenal=($_POST["CertificadoPenal"]);
  $certificadoDisciplinario=($_POST["CertificadoDisciplinario"]);
  $resultadosMedicos=($_POST["ResultadosMédicos"]);
  $carnetVacCovid=($_POST["CarnetVacunaciónCovid-19"]);
  $referenciasPersonales=($_POST["ReferenciasPersonales"]);
  $referenciasLaborales=($_POST["ReferenciasLaborales"]);
  $firma=($_POST["firma"]);
  
  $consulta = "UPDATE documentos SET curriculum='$curriculum', certificadoAlturas='$certificadoAlturas', certificadoJudicial='$certificadoJudicial', certificadoPenal='$certificadoPenal', certificadoDisciplinario='$certificadoDisciplinario', resultadosMedicos='$resultadosMedicos', carnetVacCovid='$carnetVacCovid', referenciasPersonales='$referenciasPersonales', referenciasLaborales='$referenciasLaborales', firma='$firma' WHERE docAspirante='$docAspirante'";
  mysqli_query($conn, $consulta);
  mysqli_close($conn);
}

function bloqueo($conn) {
  $id = $_POST['docAspirante'];

  $consulta = "UPDATE aspirante, usuarios SET aspirante.estadoAspirante = 0, usuarios.estadoUsuarios = 0
  WHERE aspirante.docAspirante = '$id' AND usuarios.numIdentificacion = '$id'";
  mysqli_query($conn, $consulta);
  mysqli_close($conn);
}

?>