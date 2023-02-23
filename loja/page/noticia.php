
<?php 
  $url = explode('/',$_GET['url']);
  if(!isset($url[2]))
  {
  $cat = MySql::conectar()->prepare("SELECT * FROM `tb_site.categoria` WHERE slug = ?");
  $cat->execute(array(@$url[1]));
  $cat = $cat->fetch();
    //print_r($cat);
   //$cat['nome'];
?>


   
    <div id="legendas" class="container-fluid">

            <?php 
            if(@$cat['nome'] ==''){ 
              echo '<p>Todas as Noticias</p>';
            }else{
              echo '<p>'.$cat['nome'].'</p>';

            }
            ?>
              </div>
     


    <section id="painel-noticia" class="container mt-5"> 

     

        <div id="lateral" class="container-fluid" ><!--INICIO LATERAL-->
                          
                <div id="container-lateral" >

                <div class="caixa mt-4 mb-5" style="width: 18rem; height: 10rem;background-color:  #c6cecf; border-radius: 7px;">

                    <div class="titulo mt-3">
                        Realizar uma busca:
                    </div>

                    <form  role="search">
                    <input class="form-control mt-2" type="search" name="parametro" placeholder="O que deseja procurar?" aria-label="Search">
                    <button class="btn btn-outline-success mt-3" type="submit">Pesquisar</button>
                    </form>

                </div>


                <div class="caixa mt-4 mb-4" style="width: 18rem; height: 8rem;background-color:  #c6cecf; border-radius: 7px;">

                    <div class="titulo mt-3">              
                        Selecionar categoria:
                    </div>
                  
                    <form >
                        <select class="form-control mt-2"  name="categoria">


                        <option value="" disabled selected="">Todas as categorias</option>

                        <?php
                            $categorias = Painel::selectAll('tb_site.categoria');
                            foreach($categorias as $key => $value) {

                        ?>
                          <option <?php if($value['slug'] == @$url[1]) echo 'selected'; ?> value="<?php echo $value['slug'] ?>"><?php echo $value['nome']; ?></option>
                          
                          <?php } ?>
                      
                      
                        </select>

                    </form>

                </div>

                </div>
       </div><!--FIM LATERAL-->


    <div id="container-noticias" style="" ><!--INICIO NOTICIAS-->

          
          
             
        <?php 
                  

                  $query = "SELECT * FROM `tb_site.noticias` ";
                  if(@$cat['nome'] !=''){
                    $query.="WHERE categoria_id = $cat[id]";

                  }
                  $sql =  MySql::conectar()->prepare($query);
                  $sql->execute();
                  $noticias = $sql->fetchAll();
                ?>
                <?php 
                    foreach($noticias as $key => $value) {
                      $sql =  MySql::conectar()->prepare("SELECT  `slug` FROM  `tb_site.categoria` WHERE id = ? ");
                      $sql->execute(array($value['categoria_id']));
                      $categoriaNome = $sql->fetch()['slug'];
                  ?>

              
                <div class=" mt-4 mb-4" style="width: 100%;background-color:white;display:flex;">
                <img class="card-img-top" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['capa'] ?>" alt="Card image cap" style="width: 50%; height: 260px;" >      

                  <div class="card-body">

                    <h5 class="card-title"><?php echo $value['titulo'];?></h5>

                    <h6 class="card-subtitle mb-2 text-muted"><?php echo date('d/m/Y',strtotime($value['data']));?></p>
                    
                    <p class="card-text"><?php echo substr($value['conteudo'],0,50).'...';?></p>

                    <a href="<?php echo INCLUDE_PATH; ?>noticia/<?php echo $categoriaNome; ?>/<?php echo $value['slug']; ?>" class="card-link">Link da Noticia</a>
                  </div>
                </div>
          <?php } ?>
      


          </div> <!--FIM NOTICIAS-->


    </section> <!--FIM TOTAL-->

<?php }else{
    include('page/noticia_single.php');
} ?>