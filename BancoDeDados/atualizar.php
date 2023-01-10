<?php



    $pdo = new PDO('mysql:host=localhost;dbname=bancoteste','root','');

    $id = 6;

    $sql = $pdo->prepare("UPDATE  `clientes` SET nome='Derik' where id=?");

    if($sql->execute(array($id))){
        echo "Meu cliente foi atualizado com sucesso";
    }

?>


