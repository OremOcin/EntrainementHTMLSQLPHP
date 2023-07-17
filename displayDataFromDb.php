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
  $trash = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-trash\" viewBox=\"0 0 16 16\"><path d=\"M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z\"/><path d=\"M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z\"/></svg>";
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
    echo "<th scope=\"col\">Delete</th>";
    echo "<th scope=\"col\">Prénoms</th>";
    echo "<th scope=\"col\">email</th>";
    echo "<th scope=\"col\">Date</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    for ($i = 0; $i < sizeof($result); $i++) {
      echo "<tr>";
      echo " <td id=\"trash-" . $i . "\">" . $trash . "</td>";
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