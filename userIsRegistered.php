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

  $smiley = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-emoji-smile\" viewBox=\"0 0 16 16\">
  <path d=\"M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z\"/>
  <path d=\"M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z\"/>
  </svg>";
  $email = $_GET['email']; // Récupérer l'email avec get depuis un autre script
  echo "<pre>";
  echo $smiley;
  echo "Welcome User " . $email;
  echo "</pre>";
  $host = "127.0.0.1";
  $root = "root";
  $root_password = "";
  $db = "myfirstdatabase"; // Nom de la Base
  $dsn = "mysql:host=$host;dbname=$db"; //Hote et type de base de donnée ainsi que le nom
  

  /* try {
     $macAdress = getMacAdress();
     $myMacAdress = "";
     $id = "";
     $pdo = new PDO($dsn, $root, $root_password); //Le Connecteur
     $sql = "SELECT id ,email, mac_adress FROM sessions WHERE email = '$email' AND mac_adress = '$macAdress'"; //Recherche du password et de l'email
     echo $sql;
     $result = $pdo->query($sql)->fetchAll();
     if (count($result) != 0) {
       $myMacAdress = $result[0]["mac_adress"];
       $id = $result[0]['id'];
       $sql = "UPDATE sessions SET timestamp = UNIX_TIMESTAMP( NOW() ) WHERE id = '$id'"; //Mise a jour du timestamp
       $result = $pdo->query($sql)->fetchAll();
     } else {
       echo "<pre>";
       print_r($result);
       echo "</pre>";

       echo "Mac adress is " . $macAdress;
       $sql = "INSERT INTO sessions (id, email, timestamp, mac_adress) VALUES(UUID(),'$email', UNIX_TIMESTAMP( NOW() ), '$macAdress')";
       echo "<pre>";
       echo "SQL =" . $sql;
       echo "</pre>";
       $result = $pdo->query($sql)->fetchAll();
       /* echo "<pre>";
        print_r("result =" . $result);
        echo "</pre>"; */
  /*  }
 /* } catch (PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
  }*/
  session_start();
  $_SESSION["Username"] = $email;
  header("location: test.php");
  ?>
</body>

</html>