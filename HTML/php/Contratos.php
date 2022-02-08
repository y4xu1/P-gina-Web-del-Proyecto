<!--Vinculacion con la pagina de Contratos --> 
<?php

/*include("conexion.php");*/ 

/*use Dompdf\Dompdf;*/
namespace Dompdf;
require_once '../../dompdf/autoload.inc.php'; 

/* INICIO - PDF */

if (isset($_POST['submit_val'])) {
    
    $dompdf = new Dompdf();
    $dompdf->loadHtml('
    
    <h2>No  ' . $_POST['idcontrato'] . '</h2>
        <h2>Contrato Individual' . $_POST['tipoContrato'] . '</h2>
        <div>
            <table class="datPersonales">
                <thead>
                    <tr>htlmasd</tr>
                        <th>Nombre del Empleador</th> 
                        <td> Disser Ingenieria S.A.S </td>
                    <tr>
                        <th> Nit </th>
                        <td> 830.032.688-5</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th> Nombre del Empleado </th>
                        <td>' . $_POST['Nombre'] . '</td>
                    </tr>
                    <tr>
                        <th> Cédula </th>
                        <td>' . $_POST['docAspirante'] . '</td>
                    </tr>
                    <tr>
                        <th> Dirección del Empleado </th>
                        <td>' . $_PSOT['Direccion'] . '</td>
                    </tr>
                    <tr>
                        <th> Teléfono </th>
                        <td>' . $_POST['telefono'] . '</td>
                    </tr>
                    <tr>
                        <th> Oficio del Empleado </th>
                        <td>' . $_POST['Cargo'] . '</td>
                    </tr>
                    <tr>
                        <th> Salario  </th>
                        <td>' . $_POST['Salario'] . '</td>
                    </tr>
                    <tr>
                        <th> Valor de Prestaciones  </th>
                        <td>' . $_POST ['Valorprestaciones'] . '</td>
                    </tr>
                    <tr>
                        <th> Fecha de Ingreso </th>
                        <td>' . $_POST['fechaInicio'] . '</td>
                    </tr>
                    <tr>
                        <th> Nombre de la Obra </th>
                        <td>' . $_POST['Nombreobra'] . '</td>
                    </tr>
                    <tr>
                        <th> Ciudad </th>
                        <td>' . $_POST['ciudadObra']. ' </td>
                        <td>'. $_POST ['Ciudadcontratado']. '  </td>
                    </tr>
                    <table>
                        <td>
                            Entre los suscritos a saber <strong>de una parte, DISSER INGENIERÍA S.A.S.</strong>, sociedad de tipo 
                            comercial, legalmente constituida, identificada con el <strong>NIT. 830.032.688-5</strong>, tal como consta 
                            en su correspondiente certificado de existencia y representación, expedido por la Cámara 
                            de Comercio de Bogotá, con domicilio en dicha ciudad, actuando en el presente contrato a 
                            través de su representante legal Ing. <strong>ANDRÉS EMILIO NOVA GARCÍA</strong>, mayor de edad, con 
                            domicilio y residencia en la ciudad de Bogotá, identificado con la C.C. No.<strong>7.222.162 DE 
                            DUITAMA</strong>, quien en adelante y para los efectos de este contrato se denominará <strong>EL 
                            EMPLEADOR</strong> y, de otra, <strong>OHM CIFUENTES SANCHEZ</strong>, igualmente mayor de edad, 
                            domiciliado y residenciado en la ciudad de <strong>BOGOTÁ</strong> identificado con la C.C. No.<strong>79.944.583 
                            DE BOGOTÁ</strong>, quien en adelante y para los efectos de este <strong>OTRO SI</strong> a este contrato se 
                            denominará <strong>EL TRABAJADOR</strong>, hemos acordado un cambio de proyecto para ÉXITO EL 
                            ENSUEÑO A partir del 13 de Marzo de 2022.
                        </td>
                    </table>
                </tbody>
                <table>
                    <tfoot>
                        <tr>
                            <th>
                                <!-- <strong>EL EMPLEADOR</strong> -->
                            <th>
                                EL EMPLEADOR
                            </th>
                            <td>
                                <strong>EL TRABAJADOR</strong>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <br><br><br><br>
                            </th>
                            <td>
                                <br><br><br><br>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                ' . $_POST['Nombre'] .
                                /*nombre arriba creo*/'ANDRÉS EMILIO NOVA GARCÍA<br>
                                C.C. No.7.222.162 DE DUITAMA<br>
                                REPRESENTANTE LEGAL<br>
                                DISSER INGENIERÍA S.A.S.<br>
                                NIT. 830.032.688-5<br>
                            </th>
                            <td>
                                <strong>
                                ' . $_POST['Nombre'] . '< br>
                                ' . $_POST['docAspirante'] . 'DE BOGOTÁ
                                </strong>
                            </td>
                            </tr>
                        </tfoot>
                    </table>
                </table>
            </div>
    
    ');

    $dompdf -> setPaper('A4','landscape');
    $dompdf -> render();
    $dompdf -> stream("",array ("Attachment" => false));

    exit (0);

}

/* FIN - PDF */
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