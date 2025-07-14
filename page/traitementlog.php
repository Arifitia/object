<?php
session_start();
require('../inc/connexion.php'); 

$bdd = dbconnect(); // <-- appel de la fonction

$email = $_POST['email'];
$mdp = $_POST['mdp'];

$email = mysqli_real_escape_string($bdd, $email);
$mdp = mysqli_real_escape_string($bdd, $mdp);

$query = "SELECT * FROM EXAM_S2_membre WHERE email='$email' AND mdp='$mdp'";
$result = mysqli_query($bdd, $query);

if ($user = mysqli_fetch_assoc($result)) {
    $_SESSION['id_membre'] = $user['id_membre'];
    header("Location: liste.php");
    exit;
} else {
    echo "Email ou mot de passe incorrect.";
}
