<?php
session_start();
$bdd = mysqli_connect('172.60.0.15', 'ETU004197', '2HjGqrOI', 'db_s2_ETU004197');

    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $query = "SELECT * FROM EXAM_S2_membre WHERE email='$email' AND mdp='$mdp'";
    $result = mysqli_query($bdd, $query);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['id_membre'] = $user['id_membre'];
    header("Location: liste.php");
    exit;
    
?>