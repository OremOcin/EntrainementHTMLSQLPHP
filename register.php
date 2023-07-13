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
  echo ("<p>server method is " . $_SERVER["REQUEST_METHOD"] . "</p>");
  echo '<pre>';
  print_r($_POST);
  echo '</pre>';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['user_name'];
    $email = $_POST['user_mail'];
    $pwd = $_POST['pwd'];
    echo ("<p> Welcome user " . $name . " your email is " . $email . " and your password is " . $pwd . "</p>");


    //Connexion à la base mysql
    $host = "127.0.0.1";
    $root = "root";
    $root_password = "";
    $db = "myfirstdatabase"; // Nom de la Base
    $dsn = "mysql:host=$host;dbname=$db"; //Hote et type de base de donnée ainsi que le nom
  
    $hash_password = password_hash($pwd, CRYPT_BLOWFISH);

    try {
      $pdo = new PDO($dsn, $root, $root_password); //Le Connecteur
      $sql = "INSERT INTO users (id, name, password, email, creation_date) VALUES (UUID(), '$name', '$hash_password', '$email', NOW())";
      echo $sql;
      $pdo->exec($sql);

    } catch (PDOException $e) {
      die("DB ERROR: " . $e->getMessage());
    }
  }



  //indexphp bouton qui affiche les users et lors du click une table html s'affiche et affiche également toutes les données d'une table, nom email et date
  //faire un login php donner email password verifier que l'utilisateur est bien dans la base de données.
  ?>
</body>

</html>