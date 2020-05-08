<?php
$servername = "localhost";
$database = "lista_tareas";
$port = "80";

$username = "root";
$password = "";

$dns = "mysql:host=$servername;dbname=$database;port=$port;";

$connection = new PDO($dns, $username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


//var_dump($_GET);

$query = $connection->prepare('SELECT * FROM categorias');
$query->execute();

$categorias = array();

while($row = $query->fetch(PDO::FETCH_ASSOC)) {
  $categorias[] = $row;
}

$res = json_encode($categorias);
echo $res;

?>
