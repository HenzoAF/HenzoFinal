<?php
  /**
   *
   */
  class Genero{

    public $id;
    public $nome;

    function __construct($data){
      $this->nome = $data['nome'];
    }

    public function setId($id){
      $this->id = $id;
    }
    public function getId($id){
      return $this->id;
    }
    public function setNome($nome){
      $this->nome = $nome;
    }
    public function getNome(){
      return $this->nome;
    }
  }

 ?>
