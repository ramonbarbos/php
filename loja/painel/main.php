<?php
    if(isset($_GET['logout'])){
        Painel::logout();
       
    }

    
?>

<a href="<?php echo INCLUDE_PATH_PAINEL?>?logout">Sair da conta <?php echo $_SESSION['user']; ?> </a>

ja está logado