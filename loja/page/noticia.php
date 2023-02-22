
<?php 
  $url = explode('/',$_GET['url']);
  if(!isset($url[2]))
  {
  $cat = MySql::conectar()->prepare("SELECT * FROM `tb_site.categoria` WHERE slug = ?");
  $cat->execute(array(@$url[1]));
  $cat = $cat->fetch();
    print_r($cat);
   //$cat['nome'];
?>

<div id="legendas" class="container-fluid">
     <?php 
       
          
        /* 
           if($cat['nome'] == ''){
            echo '<div id="legendas" class="container-fluid">
                  <p>Todas as Noticias</p>
              </div>';
          }else{
            echo '<div id="legendas" class="container-fluid">
            <p>Novas Noticias em '.$cat['nome'].'</p>
          </div>';
          }
 
          $query = "SELECT * FROM `tb_site.noticias`";
          if($cat['nome'] !=''){
            $query.="WHERE categoria_id = $cat[id]";
          }
          $sql =  MySql::conectar()->prepare($query);
          $sql->execute();
          $noticias = $sql->fetchAll();
    */  ?>
    <div id="legendas" class="container-fluid">
                  <p>Todas as Noticias</p>
              </div>
     </div>


    <section id="painel-noticia" class="container mt-5">

     

        <div id="lateral" class="container-fluid" >
     <?php Componente::lateralNoticias(); ?>
    </div>


     <div id="noticias" class="container-fluid" >
     <?php Componente::carregarNoticias(); ?>
    </div>



    </section>
<?php }else{
    include('page/noticia_single.php');
} ?>