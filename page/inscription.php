<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>inscription</title>
    <link rel="stylesheet" href="../assets/css/css/bootstrap.min.css" />
    <script src="../assets/css/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap-icons/font/bootstrap-icons.css" />
</head>

<body>
    <div class="container justify-content-center">
        <h2 class="display-6">Inscription</h2>
        <form action="traitementinscri.php" method="post">
            <p class="lead">Nom: <input type="text" name="nom" required></p>
            <p class="lead">Date de naissance: <input type="date" name="date_naissance" required></p>
            <p class="lead">Genre:</p>
            <select name="genre">
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
            </select><br>
            <p class="lead">Email: <input type="email" name="email" required></p>

            <p class="lead">Ville: <input type="text" name="ville" required></p>

            <p class="lead">Mot de passe: <input type="password" name="mdp" required></p>
            <br>
            <button type="submit">S'inscrire</button>
        </form>
        <p><a href="index.php">se connecter</a></p>
    </div>

</body>

</html>