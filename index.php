<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>

<body id="bodyIndex">
    <form action="register.php" method="post">
        <div>
            <h1>Premier Formulaire</h1>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="user_name">
        </div>
        <div>
            <label for="mail">e-mail&nbsp;:</label>
            <input type="email" id="mail" name="user_mail">
        </div>
        <div>
            <label for="pwd">Mot de passe :</label>
            <input type="password" id="pwd" name="pwd"></input>
        </div>
        <button type="submit" id="sendButton">Envoyer les données</button>
    </form>

    <form id="formDisplay" action="DisplayDataFromDb.php">
        <button type="submit" id="getDataButton">Afficher les données</button>
    </form>



    <form id="formThree" action="login.php" method="post">
        <div>
            <h1>Entrez vos données de connexion</h1>
        </div>
        <div>
            <label for="mail">e-mail&nbsp;:</label>
            <input type="email" id="mail" name="user_mail">
        </div>
        <div>
            <label for="pwd">Mot de passe :</label>
            <input type="password" id="pwd" name="pwd"></input>
        </div>
        <button type="submit" id="sendButton">Login</button>
    </form>
</body>

</html>