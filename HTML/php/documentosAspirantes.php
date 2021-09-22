<?php

include("Conexion.php");

diferencia($conn);

function diferencia($conn){
if(isset($_POST ['btndocumentos'])){
insertar($conn);
}
if(isset($_POST ['btnActualizar'])){
actualizar ($conn);
}
}


function insertar ($conn) {
  $docAspiranteS=($_POST["docAspiranteS"]);
  $curriculum=($_POST["Curriculum"]);
  $certificadoAlturas=($_POST["CertificadoAlturas"]);
  $certificadoJudicial=($_POST["CertificadoJudicial"]);
  $certificadoPenal=($_POST["CertificadoPenal"]);
  $certificadoDisciplinario=($_POST["CertificadoDisciplinario"]);
  $resultadosMedicos=($_POST["ResultadosMédicos"]);
  $carnetVacCovid=($_POST["CarnetVacunaciónCovid-19"]);
  $referenciasPersonales=($_POST["ReferenciasPersonales"]);
  $referenciasLaborales=($_POST["ReferenciasLaborales"]);

  $consulta= "INSERT INTO documentos (docAspirante,curriculum,certificadoAlturas,certificadoJudicial,certificadoPenal,certificadoDisciplinario,resultadosMedicos,carnetVacCovid,referenciasPersonales,referenciasLaborales) VALUES ('$docAspiranteS','$curriculum','$certificadoAlturas','$certificadoJudicial','$certificadoPenal','$certificadoDisciplinario','$resultadosMedicos','$carnetVacCovid','$referenciasPersonales','$referenciasLaborales')";
  mysqli_query($conn,$consulta);
  mysqli_close($conn);
 
}
function actualizar($conn){
  $docAspiranteS=($_POST["docAspiranteS"]);
  $curriculum=($_POST["Curriculum"]);
  $certificadoAlturas=($_POST["CertificadoAlturas"]);
  $certificadoJudicial=($_POST["CertificadoJudicial"]);
  $certificadoPenal=($_POST["CertificadoPenal"]);
  $certificadoDisciplinario=($_POST["CertificadoDisciplinario"]);
  $resultadosMedicos=($_POST["ResultadosMédicos"]);
  $carnetVacCovid=($_POST["CarnetVacunaciónCovid-19"]);
  $referenciasPersonales=($_POST["ReferenciasPersonales"]);
  $referenciasLaborales=($_POST["ReferenciasLaborales"]);
  
     if(isset($_POST['btnActualizar'])){
        $query = mysqli_query($conn,"UPDATE documentos SET curriculum='$curriculum',certificadoAlturas='$certificadoAlturas',certificadoJudicial='$certificadoJudicial',certificadoPenal='$certificadoPenal',certificadoDisciplinario='$certificadoDisciplinario',resultadosMedicos='$resultadosMedicos',carnetVacCovid='$carnetVacCovid',referenciasPersonales='$referenciasPersonales',referenciasLaborales='$referenciasLaborales' WHERE docAspirante='$docAspiranteS'");
        mysqli_close($conn);
     }
     else {
           echo "<script> alert('Error al actualizar'); window.location='Index.html'</script>";
        }
  }
?>
