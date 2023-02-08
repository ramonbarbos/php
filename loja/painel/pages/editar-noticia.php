<?php

 verificaPermissaoPagina(2);

 if(isset($_GET['id'])){
    //Captar id da URL
    $id = (int)$_GET['id'];
    //Exibir o usuario no input 
    $noticia = Painel::select('tb_site.noticias','id=?',array($id));
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

            $titulo = @$_POST['titulo'];
            $conteudo = @$_POST['conteudo'];
            $capa = @$_FILES['capa'];
            $capa_atual = @$_POST['capa_atual'];
            echo $titulo;
            echo $conteudo;
            if($capa['name'] != '' ){

                if(Painel::imagemValida($capa)){
                    
                    $imagem = Painel::uploadImagem($capa);  

                    $slug = Painel::generateSlug($titulo);

                    $arr = [  'titulo' => $titulo, 'conteudo' => $conteudo, 'capa' => $imagem, 'id'=>$id,  'slug'=>$slug,'nome_tabela'=>'tb_site.noticias'];

                    Painel::updateCadastro($arr);
                        Painel::alerta('sucesso','Noticia Atualizada!');  

            }else{
               $imagem = $capa_atual;
               
               $slug = Painel::generateSlug($titulo);

               $arr = [  'titulo' => $titulo, 'conteudo' => $conteudo, 'capa' => $imagem, 'id'=>$id,  'slug'=>$slug,'nome_tabela'=>'tb_site.noticias'];

               Painel::updateCadastro($arr);
                   Painel::alerta('sucesso','Noticia Atualizada!');  

                }
                

            }
        
        

        }
        

    ?>
  
     
        <div class="mb-3">
            <label for="titulo" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?php  echo $noticia['titulo'];?>"  >
        </div>
        <div class="mb-3">
            <label for="conteudo" class="form-label">Conteudo</label>
            <input type="text" class="form-control" id="conteudo" name="conteudo" value="<?php  echo $noticia['conteudo'];?>"  >
        </div>
        
        <div class="mb-3">
            <label class="form-label">Capa</label>
            <input type="file" class="form-control"  name="capa">
            <input type="hidden" name="capa_atual" value="<?php echo $noticia['capa'] ?>" >

        </div>
       
         <a class="btn btn-outline-primary" href="<?php INCLUDE_PATH_PAINEL ?>noticia">Voltar</a>
        <input type="submit" class="btn btn-outline-dark" value="Atualizar" name="acao">

        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <input type="hidden" name="nome_tabela" value="tb_site.noticias" />

</form>

</div>
</section>
