<?php

    /*use Dompdf\Dompdf;*/
    /* namespace Dompdf; */
    include "../php/conexion.php";
    require_once '../dompdf_1-0-2/dompdf/autoload.inc.php';

    if (isset($_POST['submit_val'])) {
        
        $pdf = new Dompdf();
        $pdf->loadHtml('
        
        <h2>N°' . $_POST['idcontrato'] . '</h2>
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

        $pdf -> setPaper('A4','landscape');
        $pdf -> render();
        $pdf -> stream("",array ("Attachment" => false));

        exit (0);

    }

?>
