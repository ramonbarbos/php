<?php
    verificaPermissaoPagina(2);
?>

<div class="container-sm" style="border-radius: 7px; background-color: rgb(250, 250, 250); display: flex; align-items: center;justify-content: center; padding: 40px; width: 800px;">

        <form style="width: 600px;" method="post" enctype="multipart/form-data">

        <?php  
        if(isset($_POST['acao'])){
            //Enviei o meu formulario
            $login =@$_POST['login'];
           $nome = @$_POST['nome'];
           $senha = @$_POST['password'];
           $cargo =@$_POST['cargo'];
           $imagem =@$_FILES['imagem'];

           if(Usuario::userExists($login)){
                 Painel::alerta('erro','O login ja existe!');

           }else{
                    //Cadastrar 
                    $usuario =  new Usuario();
                    $imagem = Painel::uploadImagem($imagem);
                    $usuario->cadastrarUsuario($login,$nome,$senha,$cargo,$imagem);
                    Painel::alerta('sucesso','O cadastro foi feito com sucesso!');

           }
           
        }
    ?>

        <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control" id="login" name="login" required >
            </div>

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required >
            </div>



        <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required  >
            </div>

            <div class="mb-3">
                <label for="cargo" class="form-label">Cargo</label>
                <select class="form-select" name="cargo">
                    <?php 
                        foreach (Painel::$cargos as $key => $value){
                            if($key < $_SESSION['cargo'])  echo '<option value="'.$key.'">'.$value.'</option>';
                        }
                    ?>
                </select>
            </div>
           
            <div class="mb-3">
                <label for="formFile" class="form-label">Imagem</label>
                <input class="form-control" type="file" id="formFile" name="imagem" required>
                
             </div>

            <input type="submit" class="btn btn-outline-primary" value="Cadastrar" name="acao">


</div>