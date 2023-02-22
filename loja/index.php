<?php 
include('./class/Componente.php'); 
include('config.php');
 include('painel/class/Painel.php');



?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--CSS -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH?>estilos/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title><?php echo NOME_SITE; ?></title>
  </head>
  <body>
     <?php Componente::carregarNav(); ?>
     
    
     <div class="container-principal">
   
   <?php
      $url = isset($_GET['url']) ? $_GET['url'] : 'home'; //Buscando a pagina home

      if(file_exists('page/'.$url.'.php')){
        include('page/'.$url.'.php');
      }else{
        //Podemos fazer o que quiser pois a pagina nao existe
        $urlPar =  explode('/',$url);
        if($urlPar[0] == 'noticia'){
          include('page/noticia.php');
        }else{
           include('home.php');
        }
      }
      
   ?>
 </div>

      <?php
        if(is_array($url) && strstr($url[0], 'noticia') !== false){
      ?>
      <script>

       /*$(function(){
          $('select').change(function()){
            location.href=INCLUDE_PATH+"noticia/"+$(this).val();
          })  x 
        })*/
      </script>
      <?php } ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>