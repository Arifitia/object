<?php
session_start();
require('../inc/connexion.php');
$bdd = dbconnect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $etat = $_POST['etat'];
    $id_objet = (int)$_POST['id_objet']; 

    $query = "UPDATE EXAM_S2_objet SET etat = ? WHERE id_objet = ?";
    $stmt = mysqli_prepare($bdd, $query);
    mysqli_stmt_bind_param($stmt, 'si', $etat, $id_objet);
    mysqli_stmt_execute($stmt);

    header('Location: membres.php');
    exit();
}


$id_objet = isset($_GET['id']) ? (int)$_GET['id'] : 0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>État de l'objet</title>
    <link rel="stylesheet" href="../assets/css/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Déclarer l'état de l'objet</h2>

        <form method="post" class="w-50 mx-auto border p-4 shadow bg-white rounded">
            <input type="hidden" name="id_objet" value="<?= $id_objet ?>">

            <div class="mb-3">
                <label for="etat" class="form-label">État de l'objet :</label>
                <select name="etat" id="etat" class="form-select" required>
                    <option value="">-- Sélectionnez un état --</option>
                    <option value="neuf">Neuf</option>
                    <option value="abime">Abîmé</option>
                </select>
            </div>

            <button type="submit" class="btn btn-danger w-100">Enregistrer</button>
        </form>

        <div class="text-center mt-3">
            <a href="membres.php" class="btn btn-outline-secondary">Retour</a>
        </div>
    </div>
</body>
</html>
