$(function(){
    $('body').on('submit','form',function(){
        var form = $(this);

        $.ajax({
            url: 'http://localhost/php/ajax/js/formulario.js',
            method:'post',
            dataType: 'json',
            data: form.serialize(),
        }).done(function(data){
            alert(data.retorno);
        });
        return false;
    });
})

/*
*/