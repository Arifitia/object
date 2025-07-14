<?php
session_start();
$bdd = mysqli_connect('172.60.0.15', 'ETU004197', '2HjGqrOI', 'db_s2_ETU004197');

// Requête : tous les objets, avec leur propriétaire et la date de retour SI elle est à venir
$query = "
SELECT o.nom_objet, m.nom, e.date_retour 
FROM EXAM_S2_objet AS o 
JOIN EXAM_S2_membre AS m ON o.id_membre = m.id_membre 
LEFT JOIN EXAM_S2_emprunt AS e 
    ON o.id_objet = e.id_objet 
    AND e.date_retour >= CURDATE()
";

$result = mysqli_query($bdd, $query);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des objets</title>
    <link rel="stylesheet" href="../assets/css/css/bootstrap.min.css">
    <script src="../assets/css/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <h1 class="mt-5 display-6 text-center">Liste des objets</h1>
        </div>
        <div class="row justify-content-center">
            <table class="shadow-lg table table-striped table-danger table-hover text-center mt-5" style="width: 70%;">
                <thead>
                    <tr>
                        <th class="bg bg-danger lead text-white">Propriétaire</th>
                        <th class="bg bg-danger lead text-white">Objet</th>
                        <th class="bg bg-danger lead text-white">Date de retour</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($donnees = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= $donnees['nom'] ?></td>
                            <td><?= $donnees['nom_objet'] ?></td>
                            <td><?= $donnees['date_retour'] ? $donnees['date_retour'] : '-' ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
