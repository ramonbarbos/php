<?php 
include('./class/Componente.php'); 
include('config.php');
 include('painel/class/Painel.php');

 /*$url = explode('/',$_GET['url']);
 if(!isset($url[2]))
{
 $cat = MySql::conectar()->prepare("SELECT * FROM `tb_site.categoria` WHERE slug = ?");
 $cat->execute(array($url[1]));
 $cat = $cat->fetch();

 echo $cat['nome'];*/

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--CSS -->
    <link rel="stylesheet" href="estilos/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title><?php echo NOME_SITE; ?></title>
  </head>
  <body>
     <?php Componente::carregarNav(); ?>
    
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
     */ ?>
     </div>


    <section id="painel-noticia" class="container mt-5">

     

        <div id="lateral" class="container-fluid" >
     <?php Componente::lateralNoticias(); ?>
    </div>


     <div id="noticias" class="container-fluid" >
     <?php Componente::carregarNoticias(); ?>
    </div>



    </section>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
    <?php   ?>