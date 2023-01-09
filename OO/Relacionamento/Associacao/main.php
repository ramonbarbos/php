<?php
require_once './Fabricante.php';
require_once './Produto.php';

$p1 = new Produto('Chocolate', 10, 9,);
$f1 = new Fabricante('Cacau Show', 'Rua Av Jorge', '00,099887665');

$p1->setFabricante($f1);

$descricao = $p1->getDescricao();
$nm_fabri = $p1->getFabricante() -> getNome();
print "O Fabricante do produto {$descricao} é {$nm_fabri}";

echo '<pre>';
var_dump($p1);
echo '</pre>';