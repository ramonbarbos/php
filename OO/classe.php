<?php

class Produto{

    public $descricao;
    public $estoque;
    public $preco;

}

$prod = new Produto;
$prod->descricao = 'Chocolate';
$prod->estoque = 20;
$prod->preco = 100;

echo '<pre>';
var_dump($prod);
echo '</pre>';

