<?php

    date_default_timezone_set('America/Sao_Paulo'); //Capturar Horario

    $pdo = new PDO('mysql:host=localhost;dbname=primeirobanco','root','');

    if(isset($_POST['acao'])){

        $nome = @$_POST['nome'];
        $sobrenome = @$_POST['sobrenome'];
        $senha = @$_POST['senha'];
        $momento_registro = date('Y-m-d H:i:s');

        $sql = $pdo->prepare("INSERT INTO `usuarios` VALUES(null, ?,?,?,?)");

        $sql->execute(array($nome,$sobrenome,$senha,$momento_registro));
        echo "Inserido as seguintes informações: <br>";
        echo $nome . '<br>';
        echo $sobrenome . '<br>';
        echo $senha . '<br>';
        echo $momento_registro . '<br>';
    }


 
    
?>
