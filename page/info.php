<?php
session_start();
require('../inc/connexion.php');
$bdd = dbconnect();


$id_objet = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id_objet <= 0) {
    echo "Objet invalide.";
    exit;
}


$query = "
    SELECT o.nom_objet, o.etat, m.nom AS nom_membre
    FROM EXAM_S2_objet AS o
    JOIN EXAM_S2_membre AS m ON o.id_membre = m.id_membre
    WHERE o.id_objet = ?
";

$stmt = mysqli_prepare($bdd, $query);
mysqli_stmt_bind_param($stmt, 'i', $id_objet);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$donnees = mysqli_fetch_assoc($result);

if (!$donnees) {
    echo "Objet introuvable.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Info de l'objet</title>
    <link rel="stylesheet" href="../assets/css/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Informations de l'objet</h2>

        <div class="card mx-auto shadow-lg" style="max-width: 500px;">
            <div class="card-body">
                <h5 class="card-title text-danger"><?= $donnees['nom_objet'] ?></h5>
                <p class="card-text"><strong>État :</strong> <?=$donnees['etat'] ?? 'Non renseigné' ?></p>
                <p class="card-text"><strong>Propriétaire :</strong> <?= $donnees['nom_membre'] ?></p>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="membres.php" class="btn btn-outline-danger">Retour à la liste</a>
        </div>
    </div>
</body>
</html>
