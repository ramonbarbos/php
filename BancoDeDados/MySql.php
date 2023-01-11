<?php

define('HOST', 'localhost');
define('DBNAME', 'projeto_1');
define('USER', 'root');
define('PASS', '');


try {
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo 'erro ao conectar';
}

?>
