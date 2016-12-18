<?php
  /**
   *
   */
  class GeneroDAO{

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
      $genero = new Genero($data);
      $connection = mysqli_connect("localhost", "root", "", "biblioteca");
      $sql = "INSERT INTO generos (nome)
              VALUES ('".$genero->getNome()."')";
      $action = mysqli_query($connection, $sql);
      if (!$action) {
        throw new Exception();
      }
      return $genero;
    }

    public function getAll(){
      $generos = [];
      $connection = mysqli_connect("localhost", "root", "", "biblioteca");
      $sql = "SELECT * FROM generos";
      $resultado = mysqli_query($connection, $sql);
      for ($i=0; $i < mysqli_num_rows($resultado); $i++) {
        $data = mysqli_fetch_assoc($resultado);
        $generos[$i] = new Genero($data);
        $generos[$i]->setId($data['id']);
      }
      return $generos;
    }

    public function getById($id){
      $connection = mysqli_connect("localhost", "root", "", "biblioteca");
      $sql = "SELECT *
              FROM generos
              WHERE id = ".$id;
      $resultado = mysqli_query($connection, $sql);
      $data = mysqli_fetch_assoc($resultado);
      $genero = new Genero($data);
      $genero->setId($data['id']);
      return $genero;
    }

    public function getByNome($nome){
      $connection = mysqli_connect("localhost", "root", "", "biblioteca");
      $sql = "SELECT *
              FROM generos
              WHERE nome = '".$nome."'";
      $resultado = mysqli_query($connection, $sql);
      $data = mysqli_fetch_assoc($resultado);
      $genero = new Genero($data);
      $genero->setId($data['id']);
      return $genero;
    }
    public function exists($nome){
      $connection = mysqli_connect("localhost", "root", "", "biblioteca");
      $sql = "SELECT *
              FROM generos
              WHERE nome = '".$nome."'";
      $resultado = mysqli_query($connection, $sql);
      if (mysqli_num_rows($resultado) > 0) {
        return true;
      }
      else return false;
    }
  }

 ?>
