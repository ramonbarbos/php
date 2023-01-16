
<?php  include('./classes/MySql.php') ?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel de Controle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
 <section style="background-color: rgb(113, 113, 113);display: flex; align-items: center; height: 100vh;">

    <div class="container-sm" style="border-radius: 7px; background-color: rgb(250, 250, 250); display: flex; align-items: center;justify-content: center; padding: 40px; width: 800px;">
        <form style="width: 600px;" method="post">

        <?php 
        if(isset($_POST['acao'])){
          $user = $_POST['user'];
          $password = $_POST['password'];
          $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ? ");
          $sql->execute(array($user,$password));

          if($sql->rowCount() == 1){
            $info = $sql->fetch();
            //sucesso
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            $_SESSION['cargo'] = $info['cargo'];
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['img'] = $info['img'];
            header('Location: '.INCLUDE_PATH_PAINEL);
            die();
          }else{
            //falhou
            echo '<h6>Usuario ou senha incorreto.</h6>';
          }

        }
        
        ?>
            <div class="mb-3">
                <label for="user" class="form-label">Login</label>
                <input type="text" class="form-control" id="user" name="user" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
           
            <input type="submit" class="btn btn-outline-dark" value="Entrar" name="acao">
    </form>

    </div>
 </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>