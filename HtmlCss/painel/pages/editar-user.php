<div class="container-sm" style="border-radius: 7px; background-color: rgb(250, 250, 250); display: flex; align-items: center;justify-content: center; padding: 40px; width: 800px;">

        <form style="width: 600px;" method="post" enctype="multipart/form-data">

    <?php  
        if(isset($_POST['acao'])){
            //Enviei o meu formulario

           $nome = @$_POST['nome'];
           $senha = @$_POST['password'];
           $imagem =@$_FILES['imagem'];
           $imagem_atual = $_POST['imagem_atual'];
           $usuario =  new Usuario();

           if($imagem['name'] != ''){
                    if(Painel::imagemValida($imagem)){
                        $imagem = Painel::uploadImagem($imagem);
                        if($usuario->atualizarUsuario($nome,$senha,$imagem)){
                            Painel::alerta('sucesso','Atualizado  com sucesso com a imagem');
                        }else{
                            Painel::alerta('erro','Ocorreu um erro ao atualizar com a imagem!');
                        }
                    }
            }else{
                $imagem = $imagem_atual;
                $usuario =  new Usuario();
                if($usuario->atualizarUsuario($nome,$senha,$imagem)){

                }else{
                    Painel::alerta('erro','Ocorreu um erro ao atualizar!');

                }
            }

        }
    ?>

        <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required value="<?php echo $_SESSION['nome'];?>">
            </div>

        <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required value="<?php echo $_SESSION['password'];?>" >
            </div>
           
            <div class="mb-3">
                <label for="formFile" class="form-label">Imagem</label>
                <input class="form-control" type="file" id="formFile" name="imagem">
                <input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img'];?>">
             </div>

            <input type="submit" class="btn btn-outline-primary" value="Atualizar" name="acao">


</div>