<?php

include_once 'interface.php';

class Teste implements Interface1{

    public function print(){
        echo "Olá Mundo ";
    }

}

$teste = new Teste;

$teste->print();