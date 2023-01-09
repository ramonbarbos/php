<?php

class Produto{

    private $descricao;
    private $estoque;
    private $preco;
    private $fabricante;
    private $caracteristica=[];

    public function __construct($descricao,$estoque,$preco)
    {
        $this->descricao = $descricao;
        $this->estoque = $estoque;
        $this->preco = $preco;

    }

    public function getDescricao()
        {
          return $this->descricao;  
        }

        public function setFabricante(Fabricante $fabricante){
            $this->fabricante = $fabricante;
        }

        public function getFabricante(){
            return $this->fabricante;
        }


        public function addCaracteristica($nome, $valor){
            $this->caracteristica[] = new Caracteristica($nome, $valor);
        }

        public function getCaracteristicas(){
            return $this->caracteristica;
        }
}
