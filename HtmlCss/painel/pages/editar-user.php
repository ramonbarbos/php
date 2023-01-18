<div class="container-sm" style="border-radius: 7px; background-color: rgb(250, 250, 250); display: flex; align-items: center;justify-content: center; padding: 40px; width: 800px;">
        <form style="width: 600px;" method="post">

    <?php  
        if(isset($_POST['acao'])){
            //Enviei o meu formulario
            $nome = $_POST['nome'];
            $senha = $_POST['password'];
            $imagen = $_FILES['imagem'];
             /*$imagem_atual = $_POST['imagem_atual'];*/

           /* if($imagem['name'] != ''){

            }else{
                $imagem = $imagem_atual;
                $usuario =  new Usuario();
                if($usuario->atualizarUsuario($nome,$senha,$imagem)){
                    Painel::alerta('sucesso','Atualizado  com sucesso!');

                }else{
                    Painel::alerta('erro','Ocorreu um erro ao atualizar!');

                }
            }*/

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
                <label for="imagem" class="form-label">Imagem</label>
                <input type="file" class="form-control" id="imagem" name="imagem" >
                <input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img'];?>">
            </div>
           
            <input type="submit" class="btn btn-outline-primary" value="Atualizar" name="acao">


</div>