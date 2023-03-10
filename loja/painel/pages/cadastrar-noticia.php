<?php

 verificaPermissaoPagina(2);

?>



<section style="background-color: #ebebeb;display: flex; align-items: center; height: 100vh;">

<div class="container" style="border-radius: 7px; background-color: rgb(250, 250, 250); display: flex; align-items: center;justify-content: center; padding: 40px; width: 800px;">


    <form style="width: 600px;" method="post" enctype="multipart/form-data">


    <?php

        if(isset($_POST['acao'])){

            $categoria_id = @$_POST['categoria_id'];
            $titulo = @$_POST['titulo'];
            $conteudo = @$_POST['conteudo'];
            $capa = @$_FILES['capa'];
            if($titulo == '' ){
                Painel::alerta('erro','Campos vazios nao sao permitidos');   

            }else{
                if(Painel::imagemValida($capa)){
                    
                    $imagem = Painel::uploadImagem($capa);  
                    $slug = Painel::generateSlug($titulo);
                    $arr = [ 'categoria_id'=>$categoria_id,  'data'=>date('Y-m-d'), 'titulo' => $titulo, 'conteudo' => $conteudo, 'capa' => $imagem,  'order_id'=>'0','slug'=>$slug,'nome_tabela'=>'tb_site.noticias'];

                    Painel::insert($arr);
                        Painel::alerta('sucesso','Noticia cadastrada!');  

                }else{
                Painel::alerta('erro','Selecione uma imagem valida!');   
                    
                }
                

            }
            
           
        }

    ?>
         <div class="mb-3">
        <label for="titulo" class="form-label">Categoria</label>
        <select class="form-select"  name="categoria_id">
            <?php
                $categoria = Painel::selectAll('tb_site.categoria');
                 
                foreach($categoria as $key => $value){

            ?>
            <option value="<?php echo $value['id']?>"><?php echo $value['nome'];  ?></option>
            <?php 
                }
            ?>
        </select>
        </div>

        <div class="mb-3">
            <label for="titulo" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo">
        </div>

        <div class="mb-3">
            <label for="cateudo" class="form-label">Conteudo</label>
            <input type="text" class="form-control" id="cateudo" name="conteudo">
        </div>
          
        <div class="mb-3">
            <label class="form-label">Capa</label>
            <input type="file" class="form-control"  name="capa">
        </div>

         <a class="btn btn-outline-primary" href="<?php INCLUDE_PATH_PAINEL ?>noticia">Voltar</a>

         <!--PARA CADASTROS DINAMICOS-->
        <input type="hidden" name="order_id" value="0" />
        <input type="hidden" name="nome_tabela" value="tb_site.noticias" />
         <!--CORRIGIR ERROS-->

        <input type="submit" class="btn btn-outline-dark" value="Casdastrar" name="acao">

</form>

</div>
</section>
