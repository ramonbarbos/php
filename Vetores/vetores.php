<?php

$cores = ['vermelho', 'verde', 'amarelo'];

$pessoa['nome'] = 'ramon';
$pessoa['idade'] = '20';
$pessoa['endereco'] = 'imbui';


foreach($pessoa as $info){
    print "Dados " . $info;
    print '<br>';
};

$carros = ['siena' => ['cor' => 'azul',
                        'marca'=> 'fiat'],
                        
            'corsa' => ['cor' => 'branco',
                        'marca' => 'Chevrolet']];

foreach($carros as $modelo => $infor){
    print "<br>Modelo</br>";
    foreach($infor as $atributo => $valor){
        print "$atributo: $valor <br>";
    }
}                       