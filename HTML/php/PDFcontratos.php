<?php

    /* include("php/conexion.php"); */

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            table, thead, tbody, tfoot, tr, td, th {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <h2>N° <?php echo $configuracion['idcontrato'];?> </h2>
        <h2>Contrato Individual <?php echo $configuracion['tipoContrato'];?> </h2>
        <div>
            <table class='cualquiercosaxd'>
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
                        <td> <?php echo $configuracion['Nombre'];?> </td>
                    </tr>
                    <tr>
                        <th> Cédula </th>
                        <td> <?php echo $configuracion['docAspirante'];?> </td>
                    </tr>
                    <tr>
                        <th> Dirección del Empleado </th>
                        <td> <?php echo $configuracion['Direccion'];?> </td>
                    </tr>
                    <tr>
                        <th> Teléfono </th>
                        <td> <?php echo $configuracion['telefono'];?> </td>
                    </tr>
                    <tr>
                        <th> Oficio del Empleado </th>
                        <td> <?php echo $configuracion['Cargo'];?> </td>
                    </tr>
                    <tr>
                        <th> Salario  </th>
                        <td> <?php echo $configuracion['Salario'];?> </td>
                    </tr>
                    <tr>
                        <th> Valor de Prestaciones  </th>
                        <td> <?php echo $configuracion['Valorprestaciones'];?> </td>
                    </tr>
                    <tr>
                        <th> Fecha de Ingreso </th>
                        <td> <?php echo $configuracion['fechaInicio'];?> </td>
                        <!-- <td> <?php /* echo $configuracion['Fechainiciación']; */?> </td> -->
                    </tr>
                    <tr>
                        <th> Nombre de la Obra </th>
                        <td> <?php echo $configuracion['Nombreobra'];?> </td>
                    </tr>
                    <tr>
                        <th> Ciudad </th>
                        <td> <?php echo $configuracion['ciudadObra'];?> </td>
                        <!-- <td> <?php /* echo $configuracion['Ciudadcontratado']; */?> </td> -->
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
                                <?php /* echo $configuracion['ANDRES EMILIO NOVA GARCIA'] */ ?>
                                ANDRÉS EMILIO NOVA GARCÍA
                                C.C. No.7.222.162 DE DUITAMA<br>
                                REPRESENTANTE LEGAL<br>
                                DISSER INGENIERÍA S.A.S.<br>
                                NIT. 830.032.688-5<br>
                            </th>
                            <td>
                                <strong>
                                    OHM CIFUENTES SANCHEZ<br>
                                    C.C. No.79.944.583 DE BOGOTÁ
                                </strong>
                            </td>
                            </tr>
                        </tfoot>
                    </table>
                </table>
            </div>
        </body>
    <footer>

    </footer>
</html>