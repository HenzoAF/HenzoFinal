<?php

  /**
   *
   */
  class LivroDAO{

    function __construct(){

    }

    static function getInstance() {
      static $instance = null;
      if (null === $instance) {
          $instance = new static();
      }
      return $instance;
    }

    public function insert($data){

      $generoDAO = GeneroDAO::getInstance();
      $editoraDAO = EditoraDAO::getInstance();

      if(!$generoDAO->exists($data['generoId'])){
        $novoGenero['nome']=$data['generoId'];
        $genero = $generoDAO->insert($novoGenero);
      }
      if (!$editoraDAO->exists($data['editoraId'])) {
        $novoEditora['nome']=$data['editoraId'];
        $editora = $editoraDAO->insert($novoEditora);
      }

      $genero = $generoDAO->getByNome($data['generoId']);
      $editora = $editoraDAO->getByNome($data['editoraId']);

      $data['generoId'] = $genero->getId();
      $data['editoraId'] = $editora->getId();


      $novoLivro = new Livro($data);
      $connection = mysqli_connect("localhost", "root", "", "biblioteca");
      $sql = "INSERT INTO livros (nome, edicao, editoraId, imagem, resumo, generoId)
              VALUES ('".$novoLivro->getNome()."', ".$novoLivro->getEdicao().", ".$novoLivro->getEditoraId().", '".$novoLivro->getImagem()."','".$novoLivro->getResumo()."', ".$novoLivro->getGeneroId().")";
      $action = mysqli_query($connection, $sql);
      var_dump($connection);
      if (!$action) {
        throw new Exception();
      }
      return $novoLivro;
    }

    public function getAll(){
      $livros = [];
      $connection = mysqli_connect("localhost", "root", "", "biblioteca");
      $sql = "SELECT *
              FROM livros";
      $resultado = mysqli_query($connection, $sql);
      for ($i=0; $i < mysqli_num_rows($resultado); $i++) {
        $data = mysqli_fetch_assoc($resultado);
        $livros[$i] = new Livro($data);
        $livros[$i]->setId($data['id']);
      }
      return $livros;
    }

    public function getById($id){
      $connection = mysqli_connect("localhost", "root", "", "biblioteca");
      $sql = "SELECT *
              FROM livros
              WHERE id = ".$id;
      $resultado = mysqli_query($connection, $sql);
      $data = mysqli_fetch_assoc($resultado);
      $livro = new Livro($data);
      $livro->setId($data['id']);
      return $livro;
    }
  }


 ?>
