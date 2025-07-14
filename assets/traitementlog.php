<?php
session_start();
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $query = "SELECT * FROM EXAM_S2_membre WHERE email='$email'";
    $result = mysqli_query($bdd, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($mdp, $user['mdp'])) {
        $_SESSION['id_membre'] = $user['id_membre'];
        header("Location: liste_objets.php");
        exit;
    } else {
        $message = "Email ou mot de passe incorrect.";
    }
}
?>