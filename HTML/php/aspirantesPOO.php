

include ("conexion.php");

class aspirante {

    #public $datos; = ($_POST["datosAsp"]);
    #public $datos = "SELECT * FROM aspirante";
    public $datos;
    #public $documentosAspirante = ($_POST["docAsp"]);
    #public $documentosAspirante = "SELECT * FROM documentos";
    public $documentosAspirante;

    #insertarDatos ($conn, $datos);
    function __construct/*insertarDatos*/ (/*$conn, */$datos) {

        $this -> $pnombre=($_POST["pNombre"]);
        $this -> $snombre=($_POST["sNombre"]);
        $this -> $papellido=($_POST["pApellido"]);
        $this -> $sapellido=($_POST["sApellido"]);
        $this -> $tipo=($_POST["TipodeDocumento"]);
        $this -> $doca=($_POST["docAspirante"]);
        $this -> $fechaI=($_POST["FechaExpedición"]);
        $this -> $paisE=($_POST["Pais"]);
        $this -> $fechaN=($_POST["FechaNacimiento"]);
        $this -> $paisN=($_POST["PaísNacimiento"]);
        $this -> $dir=($_POST["Direccion"]);
        $this -> $cuidad=($_POST["ciudad"]);
        $this -> $telefono=($_POST["Telefono"]);
        $this -> $correo=($_POST["CorreoElectrónico"]);
        $this -> $cargo=($_POST["Cargo"]);
        $this -> $estadoC=($_POST["EstadoCívil"]);
        $this -> $estrato=($_POST["Estrato"]);
        $this -> $rh=($_POST["RH"]);
        $this -> $genero=($_POST["Género"]);
        $this -> $libretamilitar=($_POST["Libretamilitar"]);
        $this -> $eps=($_POST["EPS"]);

        $consultaDatos= "INSERT INTO aspirante (docAspirante,idTipoDocumento,PnombreAspirante,SnombreAspirante,PapellidoAspirante,SapellidoAspirante,fechaExpDoc,paisExpDoc,fechaNacimiento,paisNacimiento,direccionResidencia,ciudad,telefonoContacto,correoElectronico,tipoCargo,estadoCivil,estrato,rh,genero,libretaMilitar,eps) VALUES ('$doca','$tipo','$pnombre','$snombre','$papellido','$sapellido','$fechaI','$paisE','$fechaN','$paisN','$dir','$cuidad','$telefono','$correo','$cargo','$estadoC','$estrato','$rh','$genero','$libretamilitar','$eps')";
        mysqli_query($conn,$consultaDatos);
        mysqli_close($conn);

    }

    #insertarDocu($conn, $documentosAspirante);
    function insertarDocu($conn, $documentosAspirante) {

        $this -> $docAspirante=($_POST["docAspirante"]);
        $this -> $curriculum=($_POST["Curriculum"]);
        $this -> $certificadoAlturas=($_POST["CertificadoAlturas"]);
        $this -> $certificadoJudicial=($_POST["CertificadoJudicial"]);
        $this -> $certificadoPenal=($_POST["CertificadoPenal"]);
        $this -> $certificadoDisciplinario=($_POST["CertificadoDisciplinario"]);
        $this -> $resultadosMedicos=($_POST["ResultadosMédicos"]);
        $this -> $carnetVacCovid=($_POST["CarnetVacunaciónCovid-19"]);
        $this -> $referenciasPersonales=($_POST["ReferenciasPersonales"]);
        $this -> $referenciasLaborales=($_POST["ReferenciasLaborales"]);

        $consultaDocumentos = "INSERT INTO documentos (docAspirante,curriculum,certificadoAlturas,certificadoJudicial,certificadoPenal,certificadoDisciplinario,resultadosMedicos,carnetVacCovid,referenciasPersonales,referenciasLaborales) VALUES ('$docAspirante','$curriculum','$certificadoAlturas','$certificadoJudicia','$certificadoPenal','$certificadoDisciplinario','$resultadosMedicos','$carnetVacCovid','$referenciasPersonales','$referenciasLaborales')";
        mysqli_query($conn,$consultaDocumentos);
        mysqli_close($conn);

    }
}

?>