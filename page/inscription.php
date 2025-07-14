<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Inscription</h2>
    <form action="../assets/traitementinscri.php" method="post">
        Nom: <input type="text" name="nom" required><br>
        Date de naissance: <input type="date" name="date_naissance" required><br>
        Genre: 
        <select name="genre">
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
        </select><br>
        Email: <input type="email" name="email" required><br>
        Ville: <input type="text" name="ville" required><br>
        Mot de passe: <input type="password" name="mdp" required><br>
        <button type="submit" name="register">S'inscrire</button>
    </form>
    <p><a href="index.php">se connecter</a></p>
</body>
</html>