<?php
session_start();
require('../inc/connexion.php');
$bdd = dbconnect();

$id_membre = $_SESSION['id_membre'] ?? 0;
$id_objet = $_POST['id_objet'] ?? 0;
$duree = $_POST['duree'] ?? 0;

if (!$id_membre || !$id_objet || !$duree) {
    header('Location: liste.php');
    exit;
}

$check = mysqli_query($bdd, "
SELECT 1 FROM EXAM_S2_emprunt 
WHERE id_objet = $id_objet AND date_retour >= CURDATE()
");

if (mysqli_num_rows($check) > 0) {
    echo "Objet déjà emprunté.";
    exit;
}

$date_emprunt = date('Y-m-d');
$date_retour = date('Y-m-d', strtotime("+$duree days"));

$stmt = mysqli_prepare($bdd, "
INSERT INTO EXAM_S2_emprunt (id_membre, id_objet, date_emprunt, date_retour) 
VALUES (?, ?, ?, ?)
");
mysqli_stmt_bind_param($stmt, "iiss", $id_membre, $id_objet, $date_emprunt, $date_retour);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header('Location: liste.php');
exit;
