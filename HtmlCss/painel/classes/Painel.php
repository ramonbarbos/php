<?php

include('MySql.php' );


class Painel{


    public static   $cargos =[
        '0' => 'Normal',
        '1' => 'Sub Administrador',
        '2' => 'Administrador'
    ];

    public static function logado(){
        return isset($_SESSION['login']) ? true : false;
    }

    public static function loggout(){
        session_destroy();
        header('Location: '.INCLUDE_PATH_PAINEL);
    }

    public static function carregarPagina(){
        if(isset($_GET['url'])){
            $url = explode('/',$_GET['url']);
            if(file_exists('pages/'.$url[0].'.php')){
                include('pages/'.$url[0].'.php');
            }else{
                //Pagina nao existe
                header('Location: '.INCLUDE_PATH_PAINEL);

            }
        }else{
            include('pages/home.php');
        }
    }

    public static function listarUsuariosOnline(){
        self::limparUsuariosOnline();
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.online` ");
        $sql->execute();
        return $sql->fetchAll();

    }

    public static function limparUsuariosOnline(){
        $date = date('Y-m-d H:i:s');
        $sql = MySql::conectar()->exec("DELETE FROM `tb_admin.online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE ");
    }

    public static function alerta($tipo,$messagem){
        if($tipo == 'sucesso'){
            echo '<h4>'.$messagem.'</h4>';
        }else if($tipo == 'erro'){
            echo '<h4>'.$messagem.'</h4>';

        }
    }

    public static function imagemValida($imagem){
        if($imagem['type'] == 'image/jpeg' ||
           $imagem['type'] == 'image/jpg' ||
           $imagem['type'] == 'image/png' ){

            $tamanho = $imagem['size']/1024;
            if($tamanho < 300)
                return true;
            else
                return false;

        }else{
            return false;
        }

    }

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