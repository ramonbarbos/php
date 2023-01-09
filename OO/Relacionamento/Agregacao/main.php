<?php

require_once './Cesta.php';
require_once './Produto.php';

$c1 = new Cesta;

$p1 =  new Produto("Cholocate", 10, 7);
$p2 =  new Produto("Cacau", 10, 7);

$c1-> addItem($p1);
$c1->addItem($p2);

echo "<pre>";
var_dump($c1);
echo "</pre>";