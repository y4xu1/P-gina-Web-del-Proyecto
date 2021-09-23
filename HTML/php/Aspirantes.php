<?php

include("conexion.php");
require_once("login.php");

echo $_SESSION["username"];

diferencia($conn);
function diferencia($conn){
if(isset($_POST ['btnregistrar'])){
insertar($conn);
}
if(isset($_POST ['btnActualizar'])){
actualizar ($conn);
}
if(isset($_POST ['btndocumentos'])){
documentos($conn);
}
if(isset($_POST ['Actualizardocumentos'])){
  Actualizardocumentos($conn);
}
}


  function insertar ($conn){
    $pnombre=($_POST["pNombre"]);
    $snombre=($_POST["sNombre"]);
    $papellido=($_POST["pApellido"]);
    $sapellido=($_POST["sApellido"]);
    $tipo=($_POST["TipodeDocumento"]);
    $doca=($_POST["docAspirante"]);
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

    $consulta= "INSERT INTO aspirante (docAspirante,idTipoDocumento,PnombreAspirante,SnombreAspirante,PapellidoAspirante,SapellidoAspirante,fechaExpDoc,paisExpDoc,fechaNacimiento,paisNacimiento,direccionResidencia,ciudad,telefonoContacto,correoElectronico,tipoCargo,estadoCivil,estrato,rh,genero,libretaMilitar,eps) VALUES ('$doca','$tipo','$pnombre','$snombre','$papellido','$sapellido','$fechaI','$paisE','$fechaN','$paisN','$dir','$cuidad','$telefono','$correo','$cargo','$estadoC','$estrato','$rh','$genero','$libretamilitar','$eps')";
    mysqli_query($conn,$consulta);
    mysqli_close($conn);
  }
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
    $consulta= "INSERT INTO documentos (docAspirante,curriculum,certificadoAlturas,certificadoJudicial,certificadoPenal,certificadoDisciplinario,resultadosMedicos,carnetVacCovid,referenciasPersonales,referenciasLaborales) VALUES ('$docAspiranteS','$curriculum','$certificadoAlturas','$certificadoJudicial','$certificadoPenal','$certificadoDisciplinario','$resultadosMedicos','$carnetVacCovid','$referenciasPersonales','$referenciasLaborales')";
    mysqli_query($conn,$consulta);
    mysqli_close($conn);
  }

  function actualizar($conn){
    $pnombre=($_POST["pNombre"]);
    $snombre=($_POST["sNombre"]);
    $papellido=($_POST["pApellido"]);
    $sapellido=($_POST["sApellido"]);
    $tipo=($_POST["TipodeDocumento"]);
    $doca=($_POST["docAspirante"]);
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
    
       if(isset($_POST['btnActualizar'])){
          $query = mysqli_query($conn,"UPDATE aspirante SET idTipoDocumento='$tipo', PnombreAspirante='$pnombre', SnombreAspirante='$snombre', PapellidoAspirante='$papellido', SapellidoAspirante=' $sapellido',fechaExpDoc='$fechaI', paisExpDoc='$paisE', fechaNacimiento='$fechaN',paisNacimiento=' $paisN',direccionResidencia='$dir', ciudad='$cuidad', telefonoContacto='$telefono', correoElectronico='$correo',tipoCargo='$cargo',estadoCivil='$estadoC',estrato='$estrato',rh='$rh',genero='$genero',libretaMilitar='$libretamilitar',eps='$eps' WHERE docAspirante='$doca'");
          mysqli_close($conn);
    
       }
       else {
             echo "<script> alert('Error al actualizar'); window.location='Index.html'</script>";
          }
    }

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
      
         if(isset($_POST['Actualizardocumentos'])){
            $query = mysqli_query($conn,"UPDATE documentos SET curriculum='$curriculum',certificadoAlturas='$certificadoAlturas',certificadoJudicial='$certificadoJudicial',certificadoPenal='$certificadoPenal',certificadoDisciplinario='$certificadoDisciplinario',resultadosMedicos='$resultadosMedicos',carnetVacCovid='$carnetVacCovid',referenciasPersonales='$referenciasPersonales',referenciasLaborales='$referenciasLaborales' WHERE docAspirante='$docAspirante'");
            mysqli_close($conn);
         }
         else {
               echo "<script> alert('Error al actualizar'); window.location='Index.html'</script>";
            }
      }

?>