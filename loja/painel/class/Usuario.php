<?php 

        class Usuario{

            //Verificar usuarios existentes
            public static function  userExists($user){
                $sql = MySql::conectar()->prepare('SELECT id FROM `tb_admin.usuarios` WHERE   user = ?');
                $sql->execute(array($user));
                if($sql->rowCount() == 1)
                    return true;
                else
                    return false;
                }

                //Cadastro Usuarios
                public static function cadastrarUsuario($user,$nome,$senha,$cargo,$imagem){
                    $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.usuarios` VALUES (null,?,?,?,?,?) ");
                    $sql->execute(array($user,$nome,$senha,$cargo,$imagem));
        
                }

        }

?>  