<?php
session_start();
$nom = $_SESSION['nom'] ?? 'Utilisateur';
$uploadDir = __DIR__ . '/uploads/';
$maxSize = 2 * 1024 * 1024; // 2 Mo
$allowedMimeTypes = ['image/jpeg', 'image/png', 'application/pdf'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fichier'])) {
    $file = $_FILES['fichier'];

    // Vérification des erreurs
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die('<div class="alert alert-danger">Erreur lors de l’upload.</div>');
    }

    // Vérification de la taille
    if ($file['size'] > $maxSize) {
        die('<div class="alert alert-warning">Fichier trop volumineux !</div>');
    }

    // Vérification du type MIME
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($mime, $allowedMimeTypes)) {
        die('<div class="alert alert-danger">Type de fichier non autorisé !</div>');
    }

    // Renommer le fichier
    $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newName = preg_replace("/[^a-zA-Z0-9]/", "", $originalName) . '_' . uniqid() . '.' . $extension;

    // Créer le dossier si nécessaire
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Déplacer le fichier
    if (move_uploaded_file($file['tmp_name'], $uploadDir . $newName)) {
        header("Location: page2.php?nom=$nom");
        exit();
    } else {
        die('<div class="alert alert-danger">Erreur lors du déplacement du fichier.</div>');
    }
}
?>
