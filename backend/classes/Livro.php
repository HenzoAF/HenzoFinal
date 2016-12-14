<?php
  /**
   *
   */
  class Livro {

    public $id;
    public $nome;
    public $edicao;
    public $editoraId;
    public $imagem;
    public $resumo;
    public $generoId;

    function __construct($array){
      $this->nome = $array['nome'];
      $this->edicao = $array['edicao'];
      $this->editoraId = $array['editoraId'];
      $this->imagem = $array['imagem'];
      $this->resumo = $array['resumo'];
      $this->generoId = $array['generoId'];
    }

    public function setId($id){
      $this->id = $id;
    }
    public function getId($id){
      return $this->id;
    }
    public function getNome(){
      return $this->nome;
    }
    public function getEdicao(){
      return $this->edicao;
    }
    public function getEditoraId(){
      return $this->editoraId;
    }
    public function getImagem(){
      return $this->imagem;
    }
    public function getResumo(){
      return $this->resumo;
    }
    public function getGeneroId(){
      return $this->generoId;
    }
  }

 ?>
