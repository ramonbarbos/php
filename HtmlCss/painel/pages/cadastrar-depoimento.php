<?php
    verificaPermissaoPagina(2);
?>

<div class="container-sm" style="border-radius: 7px; background-color: rgb(250, 250, 250); display: flex; align-items: center;justify-content: center; padding: 40px; width: 800px;">

        <form style="width: 600px;" method="post" enctype="multipart/form-data">

    <?php  
        if(isset($_POST['acao'])){
            //Enviei o meu formulario
            if(Painel::insert($_POST)){
                Painel::alerta('sucesso','O cadastro de depoimento foi feito com sucesso!');   
            }else{
                Painel::alerta('erro','Ocorreu um erro ao cadastrar depoimento!');

            }

        }
    ?>

        <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>

         <div class="mb-3 form-group">
                <label for="password" class="form-label">Depoimento</label>
                <textarea class="form-control" name="depoimento" id="" cols="30" rows="10"></textarea>
            </div> 

            <div class="mb-3 form-group">
                <label  class="form-label">Data</label>
                <input type="text" class="form-control" id="data" name="data" required>
            </div>
           
           
            <div class="form-group mb-3">
       
            <input type="submit" class="btn btn-outline-primary" value="Cadastrar Depoimento" name="acao">

            <input type="hidden" name="nome_tabela" value="tb_site.depoimentos" />

            </div>
 


</div>