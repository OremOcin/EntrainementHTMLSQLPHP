<?php
$host = "127.0.0.1";
$root = "root";
$root_password = "";
$db = "myfirstdatabase";

try {
  $dbh = new PDO("mysql:host=$host", $root, $root_password);

  $dbh->exec("CREATE DATABASE $db;")
    or die(print_r($dbh->errorInfo(), true));
} catch (PDOException $e) {
  die("DB ERROR: " . $e->getMessage());
}
?>