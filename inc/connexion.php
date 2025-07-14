<?php
function dbconnect()
{
    static $bdd = null;

    if ($bdd === null) {
$bdd = mysqli_connect('172.60.0.15', 'ETU004197', '2HjGqrOI', 'db_s2_ETU004197');

        if (!$bdd) {
            // Arrête le script et affiche une erreur si la connexion échoue
            die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
        }

        // Optionnel : définir l'encodage des caractères pour gérer les accents (UTF-8 recommandé)
        mysqli_set_charset($bdd, 'utf8mb4');
    }

    return $bdd;
}

?>