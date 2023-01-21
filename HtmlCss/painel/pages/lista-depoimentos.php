<?php
    verificaPermissaoPagina(2);
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 2;
    
     $depoimentos = Painel::selectAll('tb_site.depoimentos',($paginaAtual - 1 ) * $porPagina, $porPagina*$paginaAtual);

    
?>

<div class="container-sm" style="border-radius: 7px; background-color: rgb(250, 250, 250); display: flex; align-items: center;justify-content: center; padding: 40px; width: 800px;">

        <form style="width: 600px;" method="post" enctype="multipart/form-data">

    <?php  
        if(isset($_POST['acao'])){
      
        }
    ?>

        <table class="table">
        <thead>
            <tr>
            <th scope="col">Nome</th>
            <th scope="col">Data</th>
            <th scope="col">#</th>
            <th scope="col">#</th>
            </tr>
        </thead>
       
        <tbody>
        <?php 
            foreach ($depoimentos as $key => $value){
        ?>
            <tr>
            <td><?php echo $value['nome'];?></td>
            <td><?php echo $value['data'];?></td>
            <td><button type="button" class="btn btn-warning">Iditar</button></td>
            <td> <button type="button" class="btn btn-danger">Excluir</button></td>
            </tr>
            <?php   }    ?>
        </tbody>
        </table>
        
        <nav class="container">

        

        <ul class="pagination pagination-sm">
          
            <?php 
           $totalPaginas = ceil(count(Painel::selectAll('tb_site.depoimentos')) / 2);
           
           for($i =1; $i <= $totalPaginas; $i++ ){
            
                if($i == $paginaAtual){
                    echo '<li  class="page-item" > <a class="page-link" href="'.INCLUDE_PATH_PAINEL.'lista-depoimentos?pagina='.$i.'">'.$i.'</a></li>';
                }else{
                    echo '<li  class="page-item"><a class="page-link" href="'.INCLUDE_PATH_PAINEL.'lista-depoimentos?pagina='.$i.'">'.$i.'</a></li>';
                }
           
           }
        ?>
        </ul>
        </nav>

</div>