<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Connexion</title>
    <link rel="stylesheet" href="../assets/css/css/bootstrap.min.css" />
    <script src="../assets/css/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="../assets/css/bootstrap-icons/font/bootstrap-icons.css" />
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
            <h2 class="mb-4 text-center">Connexion</h2>
            <form action="traitementlog.php" method="post" novalidate>
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse Email</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="exemple@domaine.com" />
                </div>
                <div class="mb-4">
                    <label for="mdp" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="mdp" name="mdp" required placeholder="Votre mot de passe" />
                </div>
                <button type="submit" name="login" class="btn btn-danger w-100">Se connecter</button>
            </form>
            <p class="mt-3 text-center">
                Pas encore inscrit ? <a href="inscription.php" class="link-danger text-decoration-none">S'inscrire</a>
            </p>
        </div>
    </div>
</body>

</html>
