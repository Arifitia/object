<?php
session_start();
require('../inc/connexion.php');
$bdd = dbconnect();

$query = "
SELECT o.nom_objet, m.nom, o.id_objet, o.etat
FROM EXAM_S2_objet AS o 
JOIN EXAM_S2_membre AS m ON o.id_membre = m.id_membre 
LEFT JOIN EXAM_S2_emprunt AS e ON o.id_objet = e.id_objet
";

$result = mysqli_query($bdd, $query);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des objets</title>
    <link rel="stylesheet" href="../assets/css/css/bootstrap.min.css">
    <script src="../assets/css/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="mt-5 display-6 text-center">Liste des membres</h1>

        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-lg rounded-5 btn-outline-danger">Retour à l'accueil</a>
            <a href="liste.php" class="btn btn-lg rounded-5 btn-outline-danger">Voir les objets</a>
        </div>

        <div class="row justify-content-center">
            <table class="shadow-lg table table-striped table-danger table-hover text-center mt-4" style="width: 70%;">
                <thead>
                    <tr>
                        <th class="bg bg-danger lead text-white">Nom</th>
                        <th class="bg bg-danger lead text-white">Objet</th>
                        <th class="bg bg-danger lead text-white">Déclarer état</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($donnees = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= $donnees['nom'] ?></td>
                            <td>
                                <a href="info.php?id=<?= $donnees['id_objet'] ?>" class="text-decoration-none text-dark">
                                    <?= $donnees['nom_objet'] ?>
                                </a>
                            </td>
                            <td><a href="etat.php?id=<?= $donnees['id_objet'] ?>">Déclarer</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>