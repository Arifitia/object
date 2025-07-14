<?php
if (isset($_POST['register'])) {
    $nom = $_POST['nom'];
    $date_naissance = $_POST['date_naissance'];
    $genre = $_POST['genre'];
    $email = $_POST['email'];
    $ville = $_POST['ville'];
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

    $query = "INSERT INTO EXAM_S2_membre (nom, date_naissance, genre, email, ville, mdp, image_profil) 
              VALUES ('$nom', '$date_naissance', '$genre', '$email', '$ville', '$mdp', '')";
    mysqli_query($bdd, $query);
    $message = "Inscription réussie. Veuillez vous connecter.";
}

?>