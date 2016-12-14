<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
spl_autoload_register(function ($classname){
    require ("classes/".$classname .".php");
});

$app = new \Slim\App;
header("Access-Control-Allow-Origin: http://localhost:8000");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$app->post('/livro/insert', function(Request $req, Response $res){
  $data = $req->getParsedBody();
  $livroDAO = LivroDAO::getInstance();
  try {
    $livro = $livroDAO->insert($data);
    return $res->withJson($livro);
  } catch (Exception $e) {
    return $res->withStatus(400);
  }
});
$app->get('/livro/{id}', function(Request $req, Response $res, $args){
  $id = $args['id'];
  $livroDAO = LivroDAO::getInstance();
  $livro = $livroDAO->getById($id);
  return $res->withJson($livro);
});
$app->get('/livros', function(Request $req, Response $res){
  $livroDAO = LivroDAO::getInstance();
  $livros = $livroDAO->getAll();
  //var_dump($livros);
  return $res->withJson($livros);
});
$app->post('/editora/insert', function(Request $req, Response $res){
  $data = $req->getParsedBody();
  $editoraDAO = EditoraDAO::getInstance();
  try {
    $editora = $editoraDAO->insert($data);
    return $res->withJson($editora);
  } catch (Exception $e) {
    return $res->withStatus(400);
  }
});

$app->get('/editora/{id}', function(Request $req, Response $res, $args){
  $id = $args['id'];
  $editoraDAO = EditoraDAO::getInstance();
  $editora = $editoraDAO->getById($id);
  return $res->withJson($editora);
});

$app->get('/editoras', function(Request $req, Response $res){
  $editoraDAO = EditoraDAO::getInstance();
  $editoras = $editoraDAO->getAll();
  return $res->withJson($editoras);
});
$app->post('/genero/insert', function(Request $req, Response $res){
  $data = $req->getParsedBody();
  $generoDAO = GeneroDAO::getInstance();
  try {
    $genero = $generoDAO->insert($data);
    return $res->withJson($genero);
  } catch (Exception $e) {
    return $res->withStatus(400);
  }
});

$app->get('/genero/{id}', function(Request $req, Response $res, $args){
  $id = $args['id'];
  $generoDAO = GeneroDAO::getInstance();
  $genero = $generoDAO->getById($id);
  return $res->withJson($genero);
});

$app->get('/generos', function(Request $req, Response $res){
  $generoDAO = GeneroDAO::getInstance();
  $generos = $generoDAO->getAll();
  return $res->withJson($generos);
});

$app->run();
