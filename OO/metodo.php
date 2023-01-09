<?php

class Produto{

    private $descricao;
    private $estoque;
    private $preco;

    public function setDescricao($descricao){
        if(is_string($descricao)){
            $this->descricao = $descricao;
        }
    }

    public function getDescricao(){
        return $this->descricao;

    }
    public function setEstoque($estoque){
        if(is_numeric($estoque)){
            $this->estoque = $estoque;
        }
    }

    public function getEstoque(){
        return $this->estoque;

    }
    public function setPreco($preco){
        if(is_numeric($preco)){
            $this->preco = $preco;
        }
    }

    public function getPreco(){
        return $this->preco;

    }

    //Metodos
    public function aumentarEstoque($unidade){
        if(is_numeric($unidade)and $unidade >= 0){
            $this->estoque += $unidade;
        }

    }
    public function diminuitEstoque($unidade){
        if(is_numeric($unidade) and $unidade >= 0){
            $this->estoque -= $unidade;
        }

    }

}

$prod = new Produto;
$prod->setDescricao("Balnilha");
$prod->setPreco(10);
$prod->setEstoque(100);


echo "a descricao e {$prod->getDescricao()}";
echo "<br>";
echo "o preco é {$prod->getPreco()}";
echo "<br>";
echo "a quantidade em estoque é {$prod->getEstoque()}";