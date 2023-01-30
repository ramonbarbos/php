<?php

include('MySql.php');

    class Painel{

        public static   $cargos =[
            '0' => 'Normal',
            '1' => 'Sub Administrador',
            '2' => 'Administrador'
        ];

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

        public static function alerta($tipo,$messagem){
            if($tipo == 'sucesso'){
                echo '<h4>'.$messagem.'</h4>';
            }else if($tipo == 'erro'){
                echo '<h4>'.$messagem.'</h4>';
    
            }
        }

        //Atualizar imagem imagem
        public static function uploadImagem($file){
            $formato = explode('.',$file['name']);
            $imagemNome = uniqid().'.'.$formato[count($formato) - 1];
             if( move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagemNome))
                return $imagemNome;
            else    
                return false;
        
        }
    }

?>