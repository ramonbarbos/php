<?php
    verificaPermissaoPagina(2);
    if(isset($_GET['id'])){
        $id = (int)$_GET['id']; 
        $depoimento = Painel::select('tb_site.depoimentos','id=?',array($id));
    }else{
        Painel::alerta('erro','Voce precisa passar o id!');   
        die();
    }
?>

<div class="container-sm" style="border-radius: 7px; background-color: rgb(250, 250, 250); display: flex; align-items: center;justify-content: center; padding: 40px; width: 800px;">

        <form style="width: 600px;" method="post" enctype="multipart/form-data">

    <?php  
        if(isset($_POST['acao'])){
            //Enviei o meu formulario
            if(Painel::updateDepoimento($_POST)){
                Painel::alerta('sucesso','A atualização de depoimento foi feito com sucesso!');   
                $depoimento = Painel::select('tb_site.depoimentos','id=?',array($id));
                
            }else{
                Painel::alerta('erro','VCampos vazios nao sao permitidos');   
            }
           
          

        }
    ?>

        <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $depoimento['nome'];?>">
            </div>

         <div class="mb-3 form-group">
                <label  class="form-label">Depoimento</label>
                <textarea class="form-control" name="depoimento" ><?php echo $depoimento['depoimento'];?></textarea>
            </div>

            <div class="mb-3 form-group">
                <label  class="form-label">Data</label>
                <input type="text" class="form-control" id="data" name="data" value="<?php echo $depoimento['data'];?>">
            </div>
           
           
            <div class="form-group mb-3">
       
            <input type="submit" class="btn btn-outline-primary" value="Atualizar Depoimento" name="acao">

            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <input type="hidden" name="nome_tabela" value="tb_site.depoimentos" />

            </div>
 


</div>