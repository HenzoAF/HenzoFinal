<?php
  /**
   *
   */
  class EditoraDAO{

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
      $editora = new Editora($data);
      $connection = mysqli_connect("localhost", "root", "", "biblioteca");
      $sql = "INSERT INTO editoras (nome)
              VALUES ('".$editora->getNome()."')";
      $action = mysqli_query($connection, $sql);
      if (!$action) {
        throw new Exception();
      }
      return $editora;
    }

    public function getAll(){
      $editoras = [];
      $connection = mysqli_connect("localhost", "root", "", "biblioteca");
      $sql = "SELECT * FROM editoras";
      $resultado = mysqli_query($connection, $sql);
      for ($i=0; $i < mysqli_num_rows($resultado); $i++) {
        $data = mysqli_fetch_assoc($resultado);
        $editoras[$i] = new Editora($data);
        $editoras[$i]->setId($data['id']);
      }
      return $editoras;
    }

    public function getById($id){
      $connection = mysqli_connect("localhost", "root", "", "biblioteca");
      $sql = "SELECT *
              FROM editoras
              WHERE id = ".$id;
      $resultado = mysqli_query($connection, $sql);
      $data = mysqli_fetch_assoc($resultado);
      $editora = new Editora($data);
      $editora->setId($data['id']);
      return $editora;
    }

    public function getByNome($nome){
      $connection = mysqli_connect("localhost", "root", "", "biblioteca");
      $sql = "SELECT *
              FROM editoras
              WHERE nome = '".$nome."'";
      $resultado = mysqli_query($connection, $sql);
      $data = mysqli_fetch_assoc($resultado);
      $editora = new Editora($data);
      $editora->setId($data['id']);
      return $editora;
    }

    public function exists($nome){
      $connection = mysqli_connect("localhost", "root", "", "biblioteca");
      $sql = "SELECT *
              FROM editoras
              WHERE nome = '".$nome."'";
      $resultado = mysqli_query($connection, $sql);
      if (mysqli_num_rows($resultado) > 0) {
        return true;
      }
      else return false;
    }

  }

 ?>
