<?php
$host = "127.0.0.1";
$root = "root";
$password = "";
$db = "myfirstdatabase";
$dsn = "mysql:host=$host;dbname=$db";
try {
  $pdo = new PDO($dsn, $root, $password);

  $pdo->exec("CREATE TABLE users (id VARCHAR(50) NOT NULL,name VARCHAR(50) NOT NULL,email TEXT NOT NULL, password TEXT NOT NULL,creation_date DATE NOT NULL, PRIMARY KEY(id));")
    or die(print_r($pdo->errorInfo(), true));
} catch (PDOException $e) {
  die("DB ERROR: " . $e->getMessage());
}

?>