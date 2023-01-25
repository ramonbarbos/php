<?php

include('MySql.php');

    class Painel{

        public static function logado(){
            //Validando se o login já está autenticado
            return isset($_SESSION['login']) ? true : false;
        }

        //Função Logout
        public static function logout(){
            session_destroy();
            header('Location: '.INCLUDE_PATH_PAINEL);
        }

    }

?>