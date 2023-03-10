$(function(){
    $('form').submit(function(){
        var form = $(this);
        $.ajax({
            url: 'http://localhost/PHP/loja/ajax/form.php',
            method: 'post',
            dataType: 'json',
            contentType: "application/json; charset=utf-8",
            data: form.serialize()
        }).done(function(data){
            console.log(data);
        });

        return false;
    })
})