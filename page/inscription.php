<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/css/css/bootstrap.min.css" />
    <script src="../assets/css/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="../assets/css/bootstrap-icons/font/bootstrap-icons.css" />
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="max-width: 450px; width: 100%;">
            <h2 class="mb-4 text-center">Inscription</h2>
            <form action="traitementinscri.php" method="post" novalidate>
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" required placeholder="Votre nom" />
                </div>

                <div class="mb-3">
                    <label for="date_naissance" class="form-label">Date de naissance</label>
                    <input type="date" class="form-control" id="date_naissance" name="date_naissance" required />
                </div>

                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <select class="form-select" id="genre" name="genre" required>
                        <option value="" disabled selected>Choisir...</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Adresse Email</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="exemple@domaine.com" />
                </div>

                <div class="mb-3">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" class="form-control" id="ville" name="ville" required placeholder="Votre ville" />
                </div>

                <div class="mb-4">
                    <label for="mdp" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="mdp" name="mdp" required placeholder="Votre mot de passe" />
                </div>

                <button type="submit" class="btn btn-danger w-100">S'inscrire</button>
            </form>
            <p class="mt-3 text-center">
                Déjà inscrit ? <a href="index.php" class="link-danger text-decoration-none">Se connecter</a>
            </p>
        </div>
    </div>
</body>

</html>
