<?php

date_default_timezone_set('America/Sao_Paulo'); //Capturar Horario

    $pdo = new PDO('mysql:host=localhost;dbname=bancoteste','root','');

if(isset($_POST['acao'])){
    $nome =$_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $momento_registro = date('Y-m-d H:i:s');

    $sql = $pdo->prepare("INSERT INTO `clientes` VALUES(null,?,?,?)");

    $sql->execute(array($nome,$sobrenome,$momento_registro));
    echo "Cliente inserido com susseco";
}
    

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario com PHP</title>
</head>
<body>
    
   
 

    <form method="post">

        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="sobrenome" placeholder="Sobrenome">
        <input type="submit" name="acao" value="Enviar">

    </form>
</body>
</html>