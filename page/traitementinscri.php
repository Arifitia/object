<?php
session_start();
require('../inc/connexion.php');
    $bdd = dbconnect(); 
    $nom = $_POST['nom'];
    $date_naissance = $_POST['date_naissance'];
    $genre = $_POST['genre'];
    $email = $_POST['email'];
    $ville = $_POST['ville'];
    $mdp =$_POST['mdp'];
    $user=$_SESSION['id_membre'];

    $query = "INSERT INTO EXAM_S2_membre (nom, date_naissance, genre, email, ville, mdp, image_profil) 
              VALUES ('$nom', '$date_naissance', '$genre', '$email', '$ville', '$mdp', '')";
    mysqli_query($bdd, $query);
    header("Location:index.php");

?>