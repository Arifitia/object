<?php
session_start();
$id_objet = $_GET['id_objet'] ?? 0;
if (!$id_objet) {
    header('Location: liste.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Emprunt</title>
    <link rel="stylesheet" href="../assets/css/css/bootstrap.min.css" />
    <script src="../assets/css/js/bootstrap.bundle.min.js" defer></script>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
            <h2 class="mb-4 text-center">Emprunter</h2>
            <form action="traitementemprunt.php" method="post">
                <input type="hidden" name="id_objet" value="<?= $id_objet ?>">
                <div class="mb-3">
                    <label for="duree">Durée souhaitée (en jours) :</label>
                    <input type="number" name="duree" id="duree" class="form-control" min="1" required>
                </div>
                <button type="submit" class="btn btn-danger w-100">Valider l'emprunt</button>
            </form>
        </div>
    </div>
</body>
</html>
