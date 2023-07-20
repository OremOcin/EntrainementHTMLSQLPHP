<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <?php
  echo '<pre>';
  print_r($_POST);
  echo '</pre>';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['user_mail'];
    $pwd = $_POST['pwd'];

    $host = "127.0.0.1";
    $root = "root";
    $root_password = "";
    $db = "myfirstdatabase"; // Nom de la Base
    $dsn = "mysql:host=$host;dbname=$db"; //Hote et type de base de donnée ainsi que le nom
  
    try {
      $pdo = new PDO($dsn, $root, $root_password); //Le Connecteur
      $sql = "SELECT email, password FROM users WHERE email = '$email'"; //Recherche du password et de l'email
      echo $sql;
      $result = $pdo->query($sql)->fetchAll();

      if (is_array($result) && count($result) == 0) {
        $log = ['error' => 'user_not_found'];
        $pdo = null;
        header('location: userNotRegistered.php');
        echo json_encode($log);
        return;
      }

      echo '<pre>';
      print_r($result);
      echo '</pre>';
      $hash_password = (string) $result[0]['password'];
      $password_is_verified = password_verify($pwd, $hash_password);
      echo '<pre>';
      print_r("password_is_verified = " . $password_is_verified);
      echo '</pre>';
      if ($password_is_verified) {
        $url = "userIsRegistered.php?email=" . urlencode($email); //Le point d'interrogation sert à transmettre des variables avec la méthode get
        echo $url;
        header('location: ' . $url);
        /*$answer = ["email" => $email];
        echo json_encode($answer);*/
      } else {
        header('location: userNotRegistered.php');
      }
    } catch (PDOException $e) {
      die("DB ERROR: " . $e->getMessage());
    }
  }
  ?>
</body>

</html>