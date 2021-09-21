<?php

include("Conexion.php");


insertar($conn);
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