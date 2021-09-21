/*----------------------funcion #1------------------------------*/
    $(buscar_datos());
/*--------------------------------------------------------------*/

function buscar_datos(consulta){ /*funcion de busqieda*/
    $.ajax({/*conexion de conjuntos de tecnologias web (html,css,java)*/
        
        url:'../HTML/php/buscar_datos.php',
        type: 'post',                              /*aqui se es donde van a ser enviado los datos*/
        dataType: 'html',
        data:{ envio_datos : consulta},
    })    

/*--------------------------------------------------------------*/
    .done(function(respuesta) {
         $("#datos").html(respuesta);             /*lo que va hacer*/
    })
    .fail(function () {
        console.log("Error");
    })

            
/*---------------------funcion de accion -----------------------*/

/*barra de busqueda activa*/ 
$(document).on('keyup',/*nombre de la caja de busqueda*/,function (){

    var valor=$(this). val();

    if(valor != ""){

        buscar_dato(valor);
    }else{
        buscar_datos();
    }

});
