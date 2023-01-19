<?php

    session_start();
    
    date_default_timezone_set('America/Sao_Paulo');

    //CONSTANTES DE ROTAS
    define('INCLUDE_PATH','http://localhost/PHP/HtmlCss/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
    define('BASE_DIR_PAINEL',__DIR__.'/painel');
    
    //conectar com o banco de dados
    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','projeto_01');


    //Constante
    define('NOME_EMPRESA','Meu Site');

    //Funcoes
    function pegaCargo($cargo){
        $arr =[
            '0' => 'Normal',
            '1' => 'Sub Administrador',
            '2' => 'Administrador'
        ];
        return $arr[$cargo];
    }

?>
