<?php
session_start();
$bdd = mysqli_connect('172.60.0.15', 'ETU004197', '2HjGqrOI', 'db_s2_ETU004197');

    $nom = $_POST['nom'];
    $date_naissance = $_POST['date_naissance'];
    $genre = $_POST['genre'];
    $email = $_POST['email'];
    $ville = $_POST['ville'];
    $mdp =$_POST['mdp'];

    $query = "INSERT INTO EXAM_S2_membre (nom, date_naissance, genre, email, ville, mdp, image_profil) 
              VALUES ('$nom', '$date_naissance', '$genre', '$email', '$ville', '$mdp', '')";
    mysqli_query($bdd, $query);
    header("Location:index.php");

?>