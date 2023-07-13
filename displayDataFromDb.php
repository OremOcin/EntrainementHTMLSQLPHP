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

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //Connexion à la base mysql
    $host = "127.0.0.1";
    $root = "root";
    $root_password = "";
    $db = "myfirstdatabase";
    $dsn = "mysql:host=$host;dbname=$db";

    try {
      $pdo = new PDO($dsn, $root, $root_password);
      $sql = "SELECT name, email, creation_date FROM users";
      echo $sql;
      $result = $pdo->query($sql)->fetchAll();
      echo '<pre>';
      print_r($result);
      echo '</pre>';
      print("\n");
      echo '<pre>';
      echo ($result[0]['email']);
      echo '</pre>';
      $pdo = null;
    } catch (PDOException $e) {
      die("DB ERROR: " . $e->getMessage());
    }
    echo "<div id=\"infoWindow\">";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope=\"col\">Prénoms</th>";
    echo "<th scope=\"col\">email</th>";
    echo "<th scope=\"col\">Date</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    for ($i = 0; $i < sizeof($result); $i++) {
      echo "<tr>";
      echo " <td id=\"nameInfos-" . $i . "\">" . (string) $result[$i]['name'] . "</td>";
      echo "<td id=\"emailInfos-" . $i . "\">" . (string) $result[$i]['email'] . "</td>";
      echo "<td id=\"dateInfos-" . $i . "\">" . (string) $result[$i]['creation_date'] . "</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo '</div>';
  }
  ?>



</body>

</html>