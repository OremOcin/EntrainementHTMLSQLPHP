<?php
$host = "127.0.0.1";
$root = "root";
$password = "";
$db = "myfirstdatabase";
$dsn = "mysql:host=$host;dbname=$db";
try {
  $pdo = new PDO($dsn, $root, $password);

  $pdo->exec("CREATE TABLE IF NOT EXISTS users (id VARCHAR(50) NOT NULL,name VARCHAR(50) NOT NULL,email TEXT NOT NULL, password TEXT NOT NULL,creation_date DATE NOT NULL, PRIMARY KEY(id));");
  $pdo->exec("CREATE TABLE IF NOT EXISTS sessions (id VARCHAR(50) NOT NULL, email TEXT NOT NULL ,timestamp BIGINT NOT NULL, mac_adress TEXT NOT NULL, jwt TEXT NOT NULL, PRIMARY KEY(id));");

} catch (PDOException $e) {
  (print_r($pdo->errorInfo(), true));
  die("DB ERROR: " . $e->getMessage());
}

?>