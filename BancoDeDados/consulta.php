<?php

        $pdo = new PDO('mysql:host=localhost;dbname=primeirobanco','root','');
/* CONSULTAR TABELA POST
        $sql = $pdo->prepare("SELECT * FROM post");

        $sql->execute();

        $info = $sql->fetchAll();

    foreach($info as $key => $value){
        echo "ID: " .$value['id'];
        echo "<br/>";
        echo "Titulo: " .$value['titulo'];
        echo "<br/>";
        echo "Noticia: " .$value['conteudo'];
        echo "<hr>";
        


    }
*/
 /* CONSULTAR TABELA CATEGORIA

    $sql = $pdo->prepare("SELECT * FROM categorias");

    $sql->execute();

    $info = $sql->fetchAll();

    foreach($info as $key => $value){
        echo "ID: " .$value['id'];
        echo "<br/>";
        echo "Titulo: " .$value['nome'];
        echo "<hr>";



    }
*/
    ///----------------------------------------------------------------------
    //INNER JOIN 
    $sql = $pdo->prepare("SELECT * FROM `post` INNER JOIN `categorias` ON `post`.`categoria_id` = `categorias`.`id`");

    $sql->execute();

    $info = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo '<pre>';
    print_r($info);
    echo '<pre>';

?>