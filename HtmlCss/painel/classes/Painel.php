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

    public static function insert($arr){
        $certo = true;
        $nome_tabela = $arr['nome_tabela'];
        $query = "INSERT INTO `$nome_tabela` VALUES (null";

        foreach($arr as $key => $value){
            $nome = $key;
            $valor = $value;
            if($nome == 'acao' || $nome == 'nome_tabela' )
                continue;
            
            if($value == ''){
                $certo = false;
                break;
            }
            $query.=",?";
            $parametros[] = $value;
        }
        $query.=")";
        if($certo == true){
            $sql = MySql::conectar()->prepare($query);
            $sql->execute($parametros);
        }
       
        return $query;
    }

    public static function selectAll($tabela,$start = null,$end = null){
        if($start == null && $end == null){
         $sql =   MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id ASC");  
         $sql->execute();

        }else{
            $sql =   MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id ASC LIMIT $start,$end");  
            $sql->execute();

        }
        return $sql->fetchAll();
    }

    public static function deletar($tabela,$id=false){
        if( $id == false){
            $sql = MySql::conectar()->prepare("DELETE FRO `$tabela`");

        }else{
            $sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE  id = $id");
        }
        $sql->execute();
    }

    public static function redirect($url){
        echo '<script>location.href="'.$url.'"</script>';
        die();
    }
    #Metodo especifico para retornar apenas 1 registro
    public static function select($tabela,$query,$arr){
        $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE  $query");
        $sql->execute($arr);
        return $sql->fetch();
    }
    public static function updateDepoimento($arr){
        $certo = true;
        $first = false;
        $nome_tabela = $arr['nome_tabela'];
        $query = "UPDATE `$nome_tabela` SET ";
        foreach($arr as $key => $value){
            $nome = $key;
            $valor = $value;
            if($nome == 'acao' || $nome == 'nome_tabela' || $nome == 'id' )
                continue;
            
            if($value == ''){
                $certo = false;
                break;
            }
            if($first == false){
                $first = true;
                $query.="$nome=?";

            }else{
                $query.=",$nome=?";

            }
            $parametros[] = $value;

            
            if($certo == true){
                $parametros[] = $arr['id'];
                $sql = MySql::conectar()->prepare($query.' WHERE id=?');
                $sql->execute($parametros);
            }
           
            return $query;
        }

    }

    public static function orderItem($tabela,$orderType,$idItem){
        if($orderType == 'up'){
            $infoItemAtual = Painel::select($tabela, 'id=?',array($idItem));
            $order_id = $infoItemAtual['order_id'];  
            $itemBefore = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE order_id < $order_id LIMIT 1");
            $itemBefore->execute();
            if($itemBefore->rowCount() == 0)
                return;
            
            $itemBefore = $itemBefore->fetch();
            Painel::updateDepoimento(array('nome_tabela'=>$tabela,'id'=>$itemBefore['id'],'order_id'=>$infoItemAtual['order_id']));
            Painel::updateDepoimento(array('nome_tabela'=>$tabela,'id'=>$infoItemAtual['id'],'order_id'=>$itemBefore['order_id']));
            
        }else if($orderType == 'down'){

        }
    } 

}

   
?>