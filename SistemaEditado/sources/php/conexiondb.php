<?php 
try {
$pdo = new PDO('mysql:host=localhost;dbname=oticdb;charset=utf8',
'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$output = 'Conexión establecida con la base de datos.';
}
catch (PDOException $e) {
$output = 'No se ha podido conectar con la base de datos: ' . 
$e->getMessage . ' en ' .
$e->getFile() . ':' . $e->getLine();
$pdo = null;
}
 ?>
 