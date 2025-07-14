<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Connexion</title>
    <link rel="stylesheet" href="../assets/css/css/bootstrap.min.css" />
    <script src="../assets/css/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap-icons/font/bootstrap-icons.css" />
</head>

<body>
    <div class="container">
        <h2>Connexion</h2>
        <form action="traitementlog.php" method="post">
            Email: <input type="email" name="email" required><br>
            Mot de passe: <input type="password" name="mdp" required><br>
            <button type="submit" name="login">Se connecter</button>
        </form>
        <p><a href="inscription.php">s'inscrire</a></p>
    </div>

</body>

</html>