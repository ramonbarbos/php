<?php

class Produto{

    private $descricao;
    private $estoque;
    private $preco;


    public function __construct($descricao, $estoque, $preco)
    {
        echo "CRIANDO:  Objeto {$this->getDescricao()}";
        $this->setDescricao($descricao);
        $this->setEstoque($estoque);
        $this->setPreco($preco);
    }

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

    public function __destruct()
    {
        echo "DESTRUIDO: Objeto {$this->getDescricao()}";
    }

}

$prod = new Produto('Balnilha',10,100);



echo "a descricao e {$prod->getDescricao()}";
echo "<br>";
echo "o preco é {$prod->getPreco()}";
echo "<br>";
echo "a quantidade em estoque é {$prod->getEstoque()}";
echo "<br>";

unset($prod); //OBJETO SENDO DESTRUIDO