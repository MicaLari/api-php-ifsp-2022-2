<?php

class Product{
    // Properties
    public $id;
    public $image;
    public $name; 
    public $price; 

    //Method Construct
    function __construct($id, $image,  $nome,  $price){
        $this->id = $id;
        $this->image = $image;
        $this->name = $name;
        //$this->setNome($nome)
        $this->price = $price;
    }


    // Method (Function)
    function setPrice($price){
        $this->price = $price;
    }

    function getPrice(){
        echo $this->price;
    }

    function setName($novoNome){
        $this->nome = $novoNome;
    }

    function getName(){
        echo $this->nome;
    }  
}

?>