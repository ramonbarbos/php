<?php

    

?>


<section style="background-color: #ebebeb;display: flex; align-items: center; height: 100vh;">

<div class="container" style="border-radius: 7px; background-color: rgb(250, 250, 250); display: flex; align-items: center;justify-content: center; padding: 40px; width: 800px;">


    <form style="width: 600px;" method="post">


    <?php

        if(isset($_POST['acao'])){


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
       
        <a  class="btn btn-outline-primary" href="<?php echo INCLUDE_PATH; ?>" >Voltar</a>
        <input type="submit" class="btn btn-outline-dark" value="Entrar" name="acao">
</form>

</div>
</section>
