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


        public static function carregarPagina(){
            if(isset($_GET['url'])){
                $url = explode('/', $_GET['url']);
                if(file_exists('pages/'.$url[0].'.php')){
                    include('pages/'.$url[0].'.php');
                }else{
                     header('Location: '.INCLUDE_PATH_PAINEL);

                }

            }else{
                include('pages/home.php');

            }
        }
    }

?>