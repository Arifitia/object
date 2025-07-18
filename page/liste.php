<?php
session_start();
require('../inc/connexion.php');
$bdd = dbconnect();

$categorie_id = isset($_GET['categorie']) ? (int)$_GET['categorie'] : 0;

$categories = mysqli_query($bdd, "SELECT id_categorie, nom_categorie FROM EXAM_S2_categorie_objet");

$query = "
SELECT o.id_objet, o.nom_objet, m.nom, e.date_retour 
FROM EXAM_S2_objet AS o 
JOIN EXAM_S2_membre AS m ON o.id_membre = m.id_membre 
LEFT JOIN EXAM_S2_emprunt AS e ON o.id_objet = e.id_objet AND e.date_retour >= CURDATE()
";

if ($categorie_id > 0) {
    $query .= " WHERE o.id_categorie = $categorie_id";
}

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
        <h1 class="mt-5 display-6 text-center">Liste des objets</h1>

        <form method="get" class="text-center mt-3">
            <label for="categorie" class="form-label">Filtrer par catégorie :</label>
            <select name="categorie" id="categorie" class="form-select w-25 d-inline border- border-danger rounded-5" onchange="this.form.submit()">
                <option value="0">-- Toutes les catégories --</option>
                <?php while ($cat = mysqli_fetch_assoc($categories)) { ?>
                    <option value="<?= $cat['id_categorie'] ?>" <?= $cat['id_categorie'] == $categorie_id ? 'selected' : '' ?>>
                        <?= $cat['nom_categorie'] ?>
                    </option>
                <?php } ?>
            </select>
        </form>
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-lg rounded-5 btn-outline-danger">Retour à l'accueil</a>
            <a href="membres.php" class="btn btn-lg rounded-5 btn-outline-danger">voir les membres</a>
        </div>

        <div class="row justify-content-center">
            <table class="shadow-lg table table-striped table-danger table-hover text-center mt-4" style="width: 70%;">
                <thead>
                    <tr>
                        <th class="bg bg-danger lead text-white">Propriétaire</th>
                        <th class="bg bg-danger lead text-white">Objet</th>
                        <th class="bg bg-danger lead text-white">Date de retour</th>
                        <th class="bg bg-danger lead text-white">Disponibilité</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($donnees = mysqli_fetch_assoc($result)) {
                        $dispo = '-';
                        if ($donnees['date_retour']) {
                            $dateRetour = new DateTime($donnees['date_retour']);
                            $now = new DateTime();
                            $diff = $now->diff($dateRetour)->days;
                            $dispo = 'Disponible dans ' . $diff . ' jours';
                        } else {
                            $dispo = 'Disponible';
                        }
                    ?>
                        <tr>
                            <td><?= $donnees['nom'] ?></td>
                            <td><?= $donnees['nom_objet'] ?></td>
                            <td><?= $donnees['date_retour'] ?? '-' ?></td>
                            <td>
                                <?php if ($dispo === 'Disponible') { ?>
                                    <a href="emprunt.php?id_objet=<?= $donnees['id_objet'] ?>" class="link-danger link-underline-opacity-0"><?= $dispo ?></a>
                                <?php } else { ?>
                                    <?= $dispo ?>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>