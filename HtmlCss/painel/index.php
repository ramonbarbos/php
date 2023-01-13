<?php
    include('./classes/Painel.php');
    include('../config.php');

    //Validação 
    if(Painel::logado() == false){
        include('login.php');

    }else{
        include('main.php');
    }

?>