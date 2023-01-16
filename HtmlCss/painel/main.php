<?php 

    if(isset($_GET['loggout'])){
        Painel::loggout();
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH;?>estilos/font-awesome.min.css">
    <title>Painel</title>
</head>
<body>
    
   
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Meu Site</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo INCLUDE_PATH; ?>">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="servicos">Serviços</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo INCLUDE_PATH_PAINEL?>?loggout" >Sair</a>
              </li>
              
              
            </ul>
            <div class="user" style="color:white;display:flex;    " >
            <?php
              if($_SESSION['img'] == ''){ 
            ?>
            <div class="img-user" > <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>" alt=""></div>

              <?php }else{ ?>
                <div class="fa-2x" ><i class="fa fa-user-circle-o" aria-hidden="true" ></i></div>

                <?php } ?>
              <div class="user-cargo" style="">
                  <p><?php echo $_SESSION['nome']; ?></p> 
                  <p style="font-size:10px;"><?php echo pegaCargo($_SESSION['cargo']); ?></p>
              </div>
            </div>
            


          </div>
        </div>
      </nav>

      


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>