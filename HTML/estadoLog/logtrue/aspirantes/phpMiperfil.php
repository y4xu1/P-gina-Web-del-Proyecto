<?php
//Inclusión de la conexión con la BD
include ('../../../php/conexion.php');
//include ('../../../php/login.php');

session_start();

function cargardata($conn) {

    $jun = $_SESSION['doc'];

    $consulta = "SELECT * FROM aspirante where docAspirante='$_SESSION[doc]'";
    $resultado = mysqli_query($conn, $consulta);

    while($fila = mysqli_fetch_array($resultado)){
        
        echo "
            <table>
                <tr>
                    <th colspan='2'>
                        <center>
                            <h2>" . $fila['PnombreAspirante'] . " " . $fila['SnombreAspirante'] . " " . $fila['PapellidoAspirante'] . " " . $fila['SapellidoAspirante'] . "</h2>
                        </center>
                        <br>
                        <br>
                        <hr>
                        <br>
                    </th>
                </tr>
                <tr>
                    <td colspan='2'>
                        <center>
                            <p>Foto de perfil</p>
                            <input type='image' src='../../../../Imagenes/otros logos/Logo_Usuario.png' name='Foto Perfil' id='Foto_Perfil'>
                        </center>
                        <br>
                    </td>
                </tr>
                <tr>
                    <th>Número de documento:</th>
                    <td>
                        " . $fila['docAspirante'] . "
                    </td>
                </tr>
                <tr>
                    <th>Fecha de expedición:</th>
                    <td>" . $fila['fechaExpDoc'] . "</td>
                </tr>
                <tr>
                    <th>País de expedición:<br><br></th>
                    <td>" . $fila['paisExpDoc'] . " <br><br></td>
                </tr>
                <tr>
                    <th>Fecha de nacimiento:</th>
                    <td>" . $fila['fechaNacimiento'] . "</td>
                </tr>
                <tr>
                    <th>País de nacimiento:</th>
                    <td>" . $fila['paisNacimiento'] . "</td>
                </tr>
                <tr>
                    <th>Genero:<br><br></th>
                    <td>" . $fila['genero'] . "<br><br></td>
                </tr>
                <tr>
                    <th>Dirección:</th>
                    <td>" . $fila['direccionResidencia'] . "</td>
                </tr>
                <tr>
                    <th>Ciudad:</th>
                    <td>" . $fila['ciudad'] . "</td>
                </tr>
                <tr>
                    <th>Estrato:<br><br></th>
                    <td>" . $fila['estrato'] . "<br><br></td>
                </tr>
                <tr>
                    <th>Número de contacto:</th>
                    <td>". $fila['telefonoContacto'] . "</td>
                </tr>
                <tr>
                    <th>Correo electrónico:<br><br></th>
                    <td>". $fila['correoElectronico'] . "<br><br></td>
                </tr>
                <tr>
                    <th>Cargo:<br><br></th>
                    <td>". $fila['tipoCargo'] . "<br><br></td>
                </tr>
                <tr>
                    <th>EPS:</th>
                    <td>" . $fila['eps'] . "</td>
                </tr>
                <tr>
                    <th>ARL:</th>
                    <td>" . $fila['arl'] . "</td>
                </tr>
                <tr>
                    <th>Tipo de RH:<br><br></th>
                    <td>" . $fila['rh'] . "<br><br></td>
                </tr>
                <tr>
                    <th>Estado Civil:</th>
                    <td>" . $fila['estadoCivil'] . "</td>
                </tr>
                <tr>
                    <th>Libreta militar:</th>
                    <td>" . $fila['libretaMilitar'] . "</td>
                </tr>
            </table>
        ";

        /* echo "<div>
                <label for='nombre'> Nombre: </label>
                <h3>" . $fila['PnombreAspirante'] . " " . $fila['SnombreAspirante'] . " " . $fila['PapellidoAspirante'] . " " . $fila['SapellidoAspirante'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='fotoPerfil'>Foto de perfil: </label>
                <h3>" . $fila['fotoAspirante'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='documento'> Documento: </label>
                <h3>". $fila['docAspirante']."</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='dateExpedicion'>Fecha de expedición: </label>
                <h3>" . $fila['fechaExpDoc'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='paisExpedicion'>País de expedición: </label>
                <h3>" . $fila['paisExpDoc'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='dateNacimiento'>Fecha de nacimiento: </label>
                <h3>" . $fila['fechaNacimiento'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='paisNacimiento'>País de nacimiento: </label>
                <h3>" . $fila['paisNacimiento'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='direccion'>Dirección: </label>
                <h3>" . $fila['direccionResidencia'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='ciudadResidencia'>Ciudad: </label>
                <h3>" . $fila['ciudad'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for=''> Numero de contacto: </label>
                <h3>". $fila['telefonoContacto'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for=''> Correo: </label>
                <h3>". $fila['correoElectronico'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for=''> Rol: </label>
                <h3>". $fila['tipoCargo'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='estadoCivil'>Estado Civil: </label>
                <h3>" . $fila['estadoCivil'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='estrato'>Estrato: </label>
                <h3>" . $fila['estrato'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='rh'>Tipo de RH: </label>
                <h3>" . $fila['rh'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='genero'>Genero: </label>
                <h3>" . $fila['genero'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='libretaMilitar'>libreta militar</label>
                <h3>" . $fila['libretaMilitar'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='eps'>EPS: </label>
                <h3>" . $fila['eps'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='arl'>ARL: </label>
                <h3>" . $fila['arl'] . "</h3>
                <hr>
              </div>"; */

        /* if () { //Para identificar si es de recursos humanos o no?
            
            echo "<div>
                    <label for='estadoAspirante'>Estado del aspirante: </label>";
            if ($fila['estadoAspirante']==1) {
               echo"<h3>Activo</h3>
                    <hr>
                  </div>";
            }
            else {
               echo"<h3>Bloqueado/Inactivo</h3>
                    <hr>
                  </div>";
            }
        }else{} */
    }
}

function cargardata1($conn) {

    $jun1 = $_SESSION['doc'];
    $consulta = "SELECT * FROM recursoshumanos where docRecHum='$_SESSION[doc]'";
    $resultado =mysqli_query($conn, $consulta);

    while($fila = mysqli_fetch_array($resultado)){
 
        echo "
            <table>
                <tr>
                    <th colspan='2'>
                        <center>
                        <h2>" . $fila['pNombreRh'] . " " . $fila['sNombreRh'] . " " . $fila['pApellidoRh'] . " " . $fila['sApellidoRh'] . "</h2>
                        </center>
                        <br>
                        <br>
                        <hr>
                        <br>
                    </th>
                </tr>
                <tr>
                    <td colspan='2'>
                        <center>
                            <p>Foto de perfil</p>
                            <input type='image' src='../../../../Imagenes/otros logos/Logo_Usuario.png' name='Foto Perfil' id='Foto_Perfil'>
                        </center>
                        <br>
                    </td>
                </tr>
                <tr>
                    <th>Número de documento:</th>
                    <td>" . $fila['docRecHum'] . "</td>
                </tr>
                <tr>
                    <th>Fecha de expedición:</th>
                    <td>" . $fila['fechaExpDoc'] . "</td>
                </tr>
                <tr>
                    <th>País de expedición:<br><br></th>
                    <td>" . $fila['paisExpDoc'] . "<br><br></td>
                </tr>
                <tr>
                    <th>Fecha de nacimiento:</th>
                    <td>" . $fila['fechaNacimiento'] . "</td>
                </tr>
                <tr>
                    <th>País de nacimiento:<br><br></th>
                    <td>" . $fila['paisNacimiento'] . "<br><br></td>
                </tr>
                <tr>
                    <th>Dirección:</th>
                    <td>" . $fila['direccionResidencia'] . "</td>
                </tr>
                <tr>
                    <th>Estrato:<br><br></th>
                    <td>" . $fila['estrato'] . "<br><br></td>
                </tr>
                <tr>
                    <th>Estado civil:</th>
                    <td>" . $fila['estadoCivil'] . "</td>
                </tr>
                <tr>
                    <th>Número de contacto:</th>
                    <td>" . $fila['telefonoContacto'] . "</td>
                </tr>
                <tr>
                    <th>Correo electrónico:<br><br></th>
                    <td>" . $fila['correoElectronico'] . "<br><br></td>
                </tr>
                <tr>
                    <th>Cargo:</th>
                    <td>" . $fila['tipoCargo'] . "</td>
                </tr>
                <tr>
                    <th>Tipo de RH:</th>
                    <td>" . $fila['rh'] . "</td>
                </tr>
                <tr>
                    <th>EPS:</th>
                    <td>" . $fila['eps'] . "</td>
                </tr>
                <tr>
                    <th>ARL:</th>
                    <td>" . $fila['arl'] . "</td>
                </tr>
            </table>
            <!-- <label for='nombres'></label> <!-- nombres y apellidos -->

        ";
        /* echo "<div>
                <label for='Apellidos'> Apellidos </label>
                <h3>". $fila['pApellidoRh']." ".$fila['sApellidoRh']."</h3>
                <hr>
              </div>"; */
        /* echo "<div>
                <label for='fotoPerfil'>Foto de perfil</label><br>";
                //<h3>" . $fila['fotoEh'] . "</h3>
          echo "<input type='image' src='../../../../Imagenes/otros logos/Logo_Usuario.png' name='Foto Perfil' id='Foto_Perfil'>
                <br>
              </div>";
        //Datos
        echo "<div>
                <label for='documento'>Número de documento: 
                    <h3>" . $fila['docRecHum'] . "</h3>
                </label>
                <br>
              </div>";
        echo "<div>
                <label for='dateExpedicion'>Fecha de expidición: 
                    <h3>" . $fila['fechaExpDoc'] . "</h3>
                </label>
                <br>
              </div>";
        echo "<div>
                <label for='paisExpedicion'>País de expedición: </label>
                <h3>" . $fila['paisExpDoc'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='dateNacimiento'>Fecha de nacimiento: </label>
                <h3>" . $fila['fechaNacimiento'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='paisNacimiento'>País de nacimiento: </label>
                <h3>" . $fila['paisNacimiento'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='tipoCargo'> Rol: </label>
                <h3>" . $fila['tipoCargo'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='NContacto'> Número de contacto: </label>
                <h3>" . $fila['telefonoContacto'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='email'> Correo electrónico: </label>
                <h3>" . $fila['correoElectronico'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for=''>Dirección: </label>
                <h3>" . $fila['direccionResidencia'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='estadoCivil'>Estado civil: </label>
                <h3>" . $fila['estadoCivil'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='estrato'>Estrato: </label>
                <h3>" . $fila['estrato'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='rh'>Tipo de RH</label>
                <h3>" . $fila['rh'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='genero'>Genero: </label>
                <h3>" . $fila['genero'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='EPS'>EPS: </label>
                <h3>" . $fila['eps'] . "</h3>
                <hr>
              </div>";
        echo "<div>
                <label for='ARL'>ARL: </label>
                <h3>" . $fila['arl'] . "</h3>
                <hr>
              </div>"; */
    }
}

function perfilRRHH($conn) {

    $jun2 = $_SESSION['doc'];
    
    $consulta = "SELECT * FROM recursoshumanos  WHERE docRecHum = '$_SESSION[doc]'";
    $resultado = mysqli_query($conn, $consulta);
    $row = mysqli_fetch_assoc($resultado);

    if ($row && $row['docRecHum'] == null) {}
    else {
        
        $consul = "SELECT * FROM recursoshumanos  WHERE docRecHum = '$_SESSION[doc]'";
        $resul = mysqli_query($conn, $consul);
        while ($fila = mysqli_fetch_array($resul)) {

            if ($fila['docRecHum'] == $_SESSION['doc']) {
                echo '
                    <input class="controls" type="text" name="pNombre" id="" value="' . $fila['pNombreRh'] . '">
                    <input class="controls" type="text" name="sNombre" id="" value="' . $fila['sNombreRh'] . '">
                    <input class="controls" type="text" name="pApellido" id="" value="' . $fila['pApellidoRh'] . '">
                    <input class="controls" type="text" name="sApellido" id="" value="' . $fila['sApellidoRh'] . '">
                    <select class="Seleccion" name="TipodeDocumento" id="Tipo_de_Identificación">
                        <option selected="selected">Selecione el Tipo de Identificación</option>
                        <option value="CC">Cédula de Ciudadanía (CC)</option>
                        <option value="CE">Cédula de Extrangería (CE)</option>
                        <option value="PA">Pasaporte (PA)</option>
                    </select>
                    <input class="controls" type="text" name="docRecHum" id="Documento_de_Identidad" value="' . $fila['docRecHum'] . '">
                </center>
                    <p>
                        Fecha de Expedición del Documento
                        <input class="controls" type="date" name="FechaExpedición" id="Fecha_Expedición_Documento" value="' . $fila['fechaExpDoc'] . '">
                    </p>
                    <input class="controls" type="text" name="Pais" id="Paisexpedición" value="' . $fila['paisExpDoc'] . '">
                    <p>
                        Fecha de Nacimiento
                        <input class="controls" type="date" name="FechaNacimiento" id="Fecha_Nacimiento" value="' . $fila['fechaNacimiento']. '">
                    </p>
                <center>
                    <input class="controls" type="text" name="PaisNacimiento" id="País_de_Nacimiento" value="' . $fila['paisNacimiento'] . '">
                    <input class="controls" type="text" name="Direccion" id="Direccion" value="' . $fila['direccionResidencia'] . '">
                    <input class="controls" type="text" name="Telefono" id="Telefono" value="' . $fila['telefonoContacto'] . '">
                    <input class="controls" type="text" name="CorreoElectronico" id="Correo_Electrónico" value="' . $fila['correoElectronico'] . '">
                    <input class="controls" type="text" name="Cargo" id="Cargo" value="' . $fila['tipoCargo'] . '">
                    <select class="Seleccion" name="EstadoCivil" id="Estado_Civil" required>
                        <option selected="selected">Selecione su estado cívil</option>
                        <option value="Indiferente">Indiferente</option>
                        <option value="Soltero">Soltero / Soltera</option>
                        <option value="Casado">Casado / Casada</option>
                        <option value="Unión Libre">Unión Libre</option>
                        <option value="Separado">Separado</option>
                        <option value="Viudo">Viudo</option>
                    </select>
                    <select class="Seleccion" name="Estrato" id="Estrado" required>
                        <option selected="selected">Selecione su Estrato</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                    <select class="Seleccion" name="RH" id="RH" required>
                        <option selected="selected">Selecione su RH</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                    <select class="Seleccion" name="Genero" id="Género" required>
                        <option selected="selected">Selecione su Género</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                    </select>
                    <input class="controls" type="text" name="EPS" id="EPS" value="' . $fila['eps'] . '">
                    <input class="controls" type="text" name="ARL" id="ARL" value="' . $fila['arl'] . '">
    
                    <input class="botons" type="submit" value="Actualizar Datos" name="btnActualizar" id="enviar">
                ';
            }
        }
    }

    if (is_null($resultado) == false) {

        echo '
                <input class="controls" type="text" name="pNombre" id="" placeholder="Primer Nombre">
                <input class="controls" type="text" name="sNombre" id="" placeholder="Segundo Nombre">
                <input class="controls" type="text" name="pApellido" id="" placeholder="Primer Apellido">
                <input class="controls" type="text" name="sApellido" id="" placeholder="Segundo Apellido"> 
                <select class="Seleccion" name="TipodeDocumento" id="Tipo_de_Identificación">
                    <option selected="selected">Selecione el Tipo de Identificación</option>
                    <option value="CC">Cédula de Ciudadanía (CC)</option>
                    <option value="CE">Cédula de Extrangería (CE)</option>
                    <option value="PA">Pasaporte (PA)</option>
                </select>
                <input class="controls" type="text" name="docRecHum" id="Documento_de_Identidad" placeholder="Documento de Identidad">
            </center>
                <p>
                    Fecha de Expedición del Documento
                    <input class="controls" type="date" name="FechaExpedición" id="Fecha_Expedición_Documento">
                </p>
                <input class="controls" type="text" name="Pais" id="Paisexpedición" placeholder="País de expedición">
                <p>
                    Fecha de Nacimiento
                    <input class="controls" type="date" name="FechaNacimiento" id="Fecha_Nacimiento">
                </p>
            <center>
                <input class="controls" type="text" name="PaisNacimiento" id="País_de_Nacimiento" placeholder="País de Nacimiento">
                <input class="controls" type="text" name="Direccion" id="Direccion" placeholder="Dirección de Residencia">
                <input class="controls" type="text" name="Telefono" id="Telefono" placeholder="Teléfono de Contacto">
                <input class="controls" type="text" name="CorreoElectronico" id="Correo_Electrónico" placeholder="Correo Electrónico">
                <input class="controls" type="text" name="Cargo" id="Cargo" placeholder="Cargo">
                <select class="Seleccion" name="EstadoCivil" id="Estado_Civil">
                    <option selected="selected">Selecione su estado cívil</option>
                    <option value="Indiferente">Indiferente</option>
                    <option value="Soltero">Soltero / Soltera</option>
                    <option value="Casado">Casado / Casada</option>
                    <option value="Unión Libre">Unión Libre</option>
                    <option value="Separado">Separado</option>
                    <option value="Viudo">Viudo</option>
                </select>
                <select class="Seleccion" name="Estrato" id="Estrado">
                    <option selected="selected">Selecione su Estrato</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <select class="Seleccion" name="RH" id="RH">
                    <option selected="selected">Selecione su tipo de RH</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
                <select class="Seleccion" name="Genero" id="Género">
                    <option selected="selected">Selecione su Género</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                </select>
                <input class="controls" type="text" name="EPS" id="EPS" placeholder="EPS">
                <input class="controls" type="text" name="ARL" id="ARL" placeholder="ARL">

                <input class="botons" type="submit" value="Insertar Datos" name="btnregistrar" id="formulario">
        ';
    }
    else {}    
}

    /* $qry = "SELECT * FROM usuarios WHERE numIdentificacion = '$_SESSION[doc]'";
    $qry_result = mysqli_query($conn, $qry);

    while ($row = mysqli_fetch_array($qry_result)) {

        if ($row['numIdentificacion'] == $_SESSION['doc']) {
    
        }
    } */


    /* while ($fila = mysqli_fetch_array($resultado)) {

        if ($fila['docRecHum'] == $_SESSION['doc']) {
            echo '
                <input class="controls" type="text" name="pNombre" id="" value="' . $fila['pNombreRh'] . '">
                <input class="controls" type="text" name="sNombre" id="" value="' . $fila['sNombreRh'] . '">
                <input class="controls" type="text" name="pApellido" id="" value="' . $fila['pApellidoRh'] . '">
                <input class="controls" type="text" name="sApellido" id="" value="' . $fila['sApellidoRh'] . '">
                <select class="Seleccion" name="TipodeDocumento" id="Tipo_de_Identificación">
                    <option selected="selected">Selecione el Tipo de Identificación</option>
                    <option value="CC">Cédula de Ciudadanía (CC)</option>
                    <option value="CE">Cédula de Extrangería (CE)</option>
                    <option value="PA">Pasaporte (PA)</option>
                </select>
                <input class="controls" type="text" name="docRecHum" id="Documento_de_Identidad" value="' . $fila['docRecHum'] . '">
            </center>
                <p>
                    Fecha de Expedición del Documento
                    <input class="controls" type="date" name="FechaExpedición" id="Fecha_Expedición_Documento" value="' . $fila['fechaExpDoc'] . '">
                </p>
                <input class="controls" type="text" name="Pais" id="Paisexpedición" value="' . $fila['paisExpDoc'] . '">
                <p>
                    Fecha de Nacimiento
                    <input class="controls" type="date" name="FechaNacimiento" id="Fecha_Nacimiento" value="' . $fila['fechaNacimiento']. '">
                </p>
            <center>
                <input class="controls" type="text" name="PaisNacimiento" id="País_de_Nacimiento" value="' . $fila['paisNacimiento'] . '">
                <input class="controls" type="text" name="Direccion" id="Direccion" value="' . $fila['direccionResidencia'] . '">
                <input class="controls" type="text" name="Telefono" id="Telefono" value="' . $fila['telefonoContacto'] . '">
                <input class="controls" type="text" name="CorreoElectronico" id="Correo_Electrónico" value="' . $fila['correoElectronico'] . '">
                <input class="controls" type="text" name="Cargo" id="Cargo" value="' . $fila['tipoCargo'] . '">
                <select class="Seleccion" name="EstadoCivil" id="Estado_Civil" required>
                    <option selected="selected">Selecione su estado cívil</option>
                    <option value="Indiferente">Indiferente</option>
                    <option value="Soltero">Soltero / Soltera</option>
                    <option value="Casado">Casado / Casada</option>
                    <option value="Unión Libre">Unión Libre</option>
                    <option value="Separado">Separado</option>
                    <option value="Viudo">Viudo</option>
                </select>
                <select class="Seleccion" name="Estrato" id="Estrado" required>
                    <option selected="selected">Selecione su Estrato</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <select class="Seleccion" name="RH" id="RH" required>
                    <option selected="selected">Selecione su RH</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
                <select class="Seleccion" name="Genero" id="Género" required>
                    <option selected="selected">Selecione su Género</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                </select>
                <input class="controls" type="text" name="EPS" id="EPS" value="' . $fila['eps'] . '">
                <input class="controls" type="text" name="ARL" id="ARL" value="' . $fila['arl'] . '">

                <input class="botons" type="submit" value="Actualizar Datos" name="btnActualizar" id="enviar">
            ';
        }
        else {
            echo '
            <script>
                alert("si");
            </script>
            ';
            echo '
                <input class="controls" type="text" name="pNombre" id="" placeholder="Primer Nombre">
                <input class="controls" type="text" name="sNombre" id="" placeholder="Segundo Nombre">
                <input class="controls" type="text" name="pApellido" id="" placeholder="Primer Apellido">
                <input class="controls" type="text" name="sApellido" id="" placeholder="Segundo Apellido"> 
                <select class="Seleccion" name="TipodeDocumento" id="Tipo_de_Identificación">
                    <option selected="selected">Selecione el Tipo de Identificación</option>
                    <option value="CC">Cédula de Ciudadanía (CC)</option>
                    <option value="CE">Cédula de Extrangería (CE)</option>
                    <option value="PA">Pasaporte (PA)</option>
                </select>
                <input class="controls" type="text" name="docRecHum" id="Documento_de_Identidad" placeholder="Documento de Identidad">
            </center>
                <p>
                    Fecha de Expedición del Documento
                    <input class="controls" type="date" name="FechaExpedición" id="Fecha_Expedición_Documento">
                </p>
                <input class="controls" type="text" name="Pais" id="Paisexpedición" placeholder="País de expedición">
                <p>
                    Fecha de Nacimiento
                    <input class="controls" type="date" name="FechaNacimiento" id="Fecha_Nacimiento">
                </p>
            <center>
                <input class="controls" type="text" name="PaisNacimiento" id="País_de_Nacimiento" placeholder="País de Nacimiento">
                <input class="controls" type="text" name="Direccion" id="Direccion" placeholder="Dirección de Residencia">
                <input class="controls" type="text" name="Telefono" id="Telefono" placeholder="Teléfono de Contacto">
                <input class="controls" type="text" name="CorreoElectronico" id="Correo_Electrónico" placeholder="Correo Electrónico">
                <input class="controls" type="text" name="Cargo" id="Cargo" placeholder="Cargo">
                <select class="Seleccion" name="EstadoCivil" id="Estado_Civil">
                    <option selected="selected">Selecione su estado cívil</option>
                    <option value="Indiferente">Indiferente</option>
                    <option value="Soltero">Soltero / Soltera</option>
                    <option value="Casado">Casado / Casada</option>
                    <option value="Unión Libre">Unión Libre</option>
                    <option value="Separado">Separado</option>
                    <option value="Viudo">Viudo</option>
                </select>
                <select class="Seleccion" name="Estrato" id="Estrado">
                    <option selected="selected">Selecione su Estrato</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <select class="Seleccion" name="RH" id="RH">
                    <option selected="selected">Selecione su tipo de RH</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
                <select class="Seleccion" name="Genero" id="Género">
                    <option selected="selected">Selecione su Género</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                </select>
                <input class="controls" type="text" name="EPS" id="EPS" placeholder="EPS">
                <input class="controls" type="text" name="ARL" id="ARL" placeholder="ARL">

                <input class="botons" type="submit" value="Insertar Datos" name="btnregistrar" id="formulario">
            ';
        }
    } */

/* function chargeDocuments($conn) {
    $jun3 = $_SESSION['doc'];
    $consulta = "SELECT * FROM documentos WHERE docAspirante = '$_SESSION[doc]'";
    $result =  mysqli_query($conn, $consulta);

    while ($fila = mysqli_fetch_array($result)) {

        if ($fila['docAspirante'] == $jun2) {

        }
        else {

        }
        echo '
            <div>
                <img src="../../../../Imagenes/subir-color.png" style="width: 30px; margin: -7px 15px;">
                <label>Curriculum</label><br><br>
                <input type="text" name="Curriculum" class="controls" value="' . $fila['curriculum'] . ' disabled"><br><br>
            </div>
            <div>
                <img src="../../../../Imagenes/subir-color.png" style="width: 30px; margin: -7px 15px;">
                <label>Suba su Certificado de Alturas</label><br><br>
                <input type="text" name="CertificadoAlturas" class="controls" value="' . $fila['certificadoAlturas'] . '" disabled><br><br>
            </div>
            <div>
                <img src="../../../../Imagenes/subir-color.png" style="width: 30px; margin: -7px 15px;">
                <label>Suba su Certificado Judicial</label><br><br>
                <input type="text" name="CertificadoJudicial" class="controls" value="' . $fila['certificadoJudicial'] . '" disabled><br><br>
            </div>
            <div>
                <img src="../../../../Imagenes/subir-color.png" style="width: 30px; margin: -7px 15px;">
                <label>Suba su Certificado Penal</label><br><br>
                <input type="text" name="CertificadoPenal" class="controls" value="' . $fila['certificadoPenal'] . '" disabled><br><br>
            </div>
            <div>
                <img src="../../../../Imagenes/subir-color.png" style="width: 30px; margin: -7px 15px;">
                <label>Suba su Certificado Disciplinario</label><br><br>
                <input type="text" name="CertificadoDisciplinario" class="controls" value="' . $fila['certificadoDisciplinario'] . '" disabled><br><br>
            </div>
            <div>
                <img src="../../../../Imagenes/subir-color.png" style="width: 30px; margin: -7px 15px;">
                <label>Suba sus Resultados Médicos</label><br><br>
                <input type="text" name="ResultadosMédicos" class="controls" value="'. $fila['resultadosMedicos'] . '" disabled><br><br>
            </div>
            <div>

            </div>
            <div>

            </div>
            <div>

            </div>
        ';
    }

} */
?>