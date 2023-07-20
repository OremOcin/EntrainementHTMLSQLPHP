<?php
session_start();
echo "METHOD = " . $_SERVER["REQUEST_METHOD"];
if (isset($_SESSION['Username'])) {
  echo "Welcome User " . $_SESSION['Username'];
} else {
  echo "Vous n'êtes pas enregistré";
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["unregister"])) {
  echo "<h1>YOU ARE NOW UNREGISTERED</h1>";
  session_destroy();
  header("location: test.php");
}
//print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <button name="unregister">Unregister</button>
  </form>
</body>

</html>