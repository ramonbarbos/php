

<div id="container-noticias" >
<?php 
      $infoSite = Painel::selectAll('tb_site.noticias');
      foreach($infoSite as $key => $value) {
    ?>
<div class="card mt-4 mb-4" style="width: 100%;">
  <div class="card-body">
  


    <h5 class="card-title"><?php echo $value['titulo'];?></h5>

    <h6 class="card-subtitle mb-2 text-muted"><?php echo date('d/m/Y',strtotime($value['data']));?></p>
    
    <p class="card-text"><?php echo substr($value['conteudo'],0,300);?></p>

    <a href="#" class="card-link">Link da Noticia</a>
  </div>
</div>
<?php } ?>
  

</div>