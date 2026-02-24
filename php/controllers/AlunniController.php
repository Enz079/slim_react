<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AlunniController
{
  public function index(Request $request, Response $response, $args){

    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    $result = $mysqli_connection->query("SELECT * FROM alunni");
    $results = $result->fetch_all(MYSQLI_ASSOC);

    $response->getBody()->write(json_encode($results));
    return $response->withHeader("Content-type", "application/json")->withStatus(200);
  }

  public function show(Request $request, Response $response, $args){

    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');

    $id = $args['id'];
    $result = $mysqli_connection->query("SELECT * FROM alunni WHERE id = $id");
    $results = $result->fetch_all(MYSQLI_ASSOC);

    $response->getBody()->write(json_encode($results));
    return $response->withHeader("Content-type", "application/json")->withStatus(200);
  }

  public function create(Request $request, Response $response, $args) {

    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');

    $data = json_decode($request->getBody(), true);
    $nome = $data['nome'];
    $cognome = $data['cognome'];
    
    $sql = "INSERT INTO alunni (nome, cognome) VALUES ('$nome', '$cognome')";

   
    $result = $mysqli_connection->query($sql);

    if ($result) {

      $payload = json_encode([
          "status" => "successo", 
          "id_inserito" => $mysqli_connection->insert_id
        ]);
    } 
    else {

      $payload = json_encode([
          "status" => "errore", 
          "error" => $mysqli_connection->error
        ]);
    }

    $response->getBody()->write($payload);
    return $response->withHeader("Content-type", "application/json")->withStatus(201);
  }

  public function update(Request $request, Response $response, $args) {

    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');

    $id = $args['id'];
    $data = json_decode($request->getBody(), true);
    $nome = $data['nome'];
    $cognome = $data['cognome'];
    
    $sql = "UPDATE alunni SET nome = '$nome', cognome = '$cognome' WHERE id = $id";
    $mysqli_connection->query($sql);

    $response->getBody()->write(json_encode(["status" => "Alunno $id aggiornato"]));
    return $response->withHeader("Content-type", "application/json")->withStatus(200);
}

  public function destroy(Request $request, Response $response, $args) {

    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    $id = $args['id'];
    
    $sql = "DELETE FROM alunni WHERE id = $id";
    $mysqli_connection->query($sql);

    return $response->withStatus(204);
  }
}
