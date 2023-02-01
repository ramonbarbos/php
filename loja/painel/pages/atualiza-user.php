<?php

 verificaPermissaoPagina(2);

 if(isset($_GET['id'])){
    //Captar id da URL
    $id = (int)$_GET['id'];
    //Exibir o usuario no input 
    $user = Painel::select('tb_admin.usuarios','id=?',array($id));
}else{
    //Se o ID não for informado irá da a tela de erro 
    Painel::alerta('erro','Voce precisa passar o id!');   
    die();
}

?>



<section style="background-color: #ebebeb;display: flex; align-items: center; height: 100vh;">

<div class="container" style="border-radius: 7px; background-color: rgb(250, 250, 250); display: flex; align-items: center;justify-content: center; padding: 40px; width: 800px;">


    <form style="width: 600px;" method="post" enctype="multipart/form-data">


    <?php
        if(isset($_POST['acao'])){
            //Enviei o meu formulario
            if(Painel::updateCadastro($_POST)){
                Painel::alerta('sucesso','A atualização de depoimento foi feito com sucesso!');   
                $user = Painel::select('tb_admin.usuarios','id=?',array($id));
                
            }else{
                Painel::alerta('erro','VCampos vazios nao sao permitidos');   
            }
        
        

        }
        

    ?>
  
     
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php  echo $user['nome'];?>"  >
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password"  >
        </div>
       

        <div class="mb-3">
            <labelclass="form-label">Imagem</label>
            <input type="file" class="form-control"  name="imagem">
            <input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img'];?>">

        </div>
       
         <a class="btn btn-outline-primary" href="<?php INCLUDE_PATH_PAINEL ?>cadastro">Voltar</a>
        <input type="submit" class="btn btn-outline-dark" value="Atualizar" name="acao">

        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <input type="hidden" name="nome_tabela" value="tb_admin.usuarios" />

</form>

</div>
</section>
