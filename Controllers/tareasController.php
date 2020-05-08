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
$categoria = $_GET["categoria"];

if($categoria == "Todas") {
  $query = $connection->prepare('SELECT * FROM tareas');
} else {
  $query = $connection->prepare("SELECT * FROM tareas WHERE categoria_id=$categoria");
}
$query->execute();

$tareas = array();

while($row = $query->fetch(PDO::FETCH_ASSOC)) {
  //$tarea = new Tarea($row["id"], $row["titulo"], $row["descripcion"], $row["fecha_limite"], $row["completada"], $row["categoria_id"]);
  $tareas[] = $row;
}

$res = json_encode($tareas);
echo $res;

?>
