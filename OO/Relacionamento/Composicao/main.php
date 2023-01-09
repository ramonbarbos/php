<?php

require_once './Caracteristica.php';
require_once './Produto.php';

$p1 =  new Produto("Cholocate", 10, 7);

$p1->addCaracteristica('Cor', "Branco");
$p1->addCaracteristica('Peso', "300g");

/*
echo "<pre>";
print_r($p1);
echo "</pre>";
*/

print "Produto: " . $p1->getDescricao() ."<br>";
foreach($p1->getCaracteristicas() as $caracteristica){
   $nome =$caracteristica->getNome();
   $valor = $caracteristica->getValor();

   print "Caracteristicas {$nome} = {$valor} <br>";

};