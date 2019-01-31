function enviarReporte(){


    $('.modal-body').html('<p style="color:red;">Espere, enviando correos!</p>');
    $('.modal').modal('show');

    $.get('/citas/EnviarReporte',{},function(data){
 
        $('.modal-body').html(' <p style="color:rgb(13, 4, 65);">Se ha enviado el correo a los responsables de forma satisfactoria</p>');
        $('.modal').modal('show');
    });
}