<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  function getMacAdress()
  {
    //Buffering the output
    ob_start();

    //Getting configuration details 
    system('ipconfig /all');

    //Storing output in a variable 
    $configdata = ob_get_contents();

    // Clear the buffer  
    ob_clean();

    //Extract only the physical address or Mac address from the output
    $mac = "physique";
    $pmac = strpos($configdata, $mac);

    // Get Physical Address  
    $macaddr = substr($configdata, ($pmac + 36), 17);

    //Display Mac Address  
    return $macaddr;
  }


  $email = $_GET['email']; // Récupérer l'email avec get depuis un autre script
  echo "<pre>";
  echo "Welcome User " . $email;
  echo "</pre>";
  $host = "127.0.0.1";
  $root = "root";
  $root_password = "";
  $db = "myfirstdatabase"; // Nom de la Base
  $dsn = "mysql:host=$host;dbname=$db"; //Hote et type de base de donnée ainsi que le nom
  

  try {
    $pdo = new PDO($dsn, $root, $root_password); //Le Connecteur
    $sql = "SELECT email, timestamp, mac_adress FROM sessions WHERE email = '$email'"; //Recherche du password et de l'email
    echo $sql;
    $result = $pdo->query($sql)->fetchAll();
    echo "<pre>";
    print_r($result);
    echo "</pre>";

    if (is_array($result) && count($result) == 0) {
      $macAdress = getMacAdress();
      echo "Mac adress is " . $macAdress;
      $sql = "INSERT INTO sessions (email, timestamp, mac_adress) VALUES('$email', UNIX_TIMESTAMP( NOW() ), '$macAdress')";
      echo $sql;
      $result = $pdo->query($sql)->fetchAll();
      echo "<pre>";
      print_r($result);
      echo "</pre>";
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

    } else {

    }
  } catch (PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
  }
  ?>
</body>

</html>