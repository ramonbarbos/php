<?php



    $pdo = new PDO('mysql:host=localhost;dbname=bancoteste','root','');

    $id = 5;

    $sql = $pdo->prepare("DELETE FROM `clientes` WHERE id =?");

    if($sql->execute(array($id))){
        echo "Meu cliente foi deletado com sucesso";
    }

?>


