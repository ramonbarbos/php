<?php include('config.php' ); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilos/style.css">
    <link rel="stylesheet" href="estilos/font-awesome.min.css">

    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
    <title>Portfolio</title>
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
                <a class="nav-link" href="#">Serviços</a>
              </li>
              <li class="nav-item">
                <a  realtime="contato" class="nav-link" href="<?php echo INCLUDE_PATH; ?>pages/contato.php">Contato</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Entrar</a></li>
                  <li><a class="dropdown-item" href="#">Registrar</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Sair</a></li>
                </ul>
              </li>
              
            </ul>
            
          </div>
        </div>
      </nav>


<div class="container-principal">
   
  <?php
     $url = isset($_GET['url']) ? $_GET['url'] : 'home'; //Buscando a pagina home
     if(file_exists('pages/'.$url.'.php')){
       include('pages/'.$url.'.php');
     }else{
       //Podemos fazer o que quiser pois a pagina nao existe
       include('pages/404.php');
     }
     
  ?>
</div>

<div class="container-fluid" style="height: 70px;background-color: black ;color:white; display :flex; justify-content: center;align-items: center;">
<p>Todos os direitos resevados</p>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  
</body>
</html>