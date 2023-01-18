<?php
    
    class Usuario{

        public function atualizarUsuario($nome,$senha,$imagem){
            $sql = MySql::conectar()->prepare('UPDATE `tb.admin.usuarios` SET  nome = ?, password = ?, img = ? WHERE user = ? ');
            if($sql->execute(array($nome,$senha,$imagem))){
                return true;
            }else{
                return false;
            }
        }

    }

?>
