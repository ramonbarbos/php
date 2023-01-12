<?php
    include('Painel.php');
    include('../config.php');

    //Validação 
    if(Painel::logado() == false){
        include('login.php');

    }else{
        include('main.php');
    }

?>