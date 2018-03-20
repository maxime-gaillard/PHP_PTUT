<?php
session_start();

include '../modele/IncludeDB.php';

$descitpion = htmlspecialchars($_POST['description']);

define("UPLOAD_DIR", "../fichierjoint/");

if (!empty($_FILES["myFile"])) {
    $myFile = $_FILES["myFile"];
    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
    $i = 0;
    $parts = pathinfo($name);
    while (file_exists(UPLOAD_DIR . $name)) {
        $i++;
        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }
    $nomFic = $name;
    $success = move_uploaded_file($myFile["tmp_name"],
        UPLOAD_DIR . $name);

    chmod(UPLOAD_DIR . $name, 0644);
}
$id = $_SESSION['NumInscrit'];
$resultat = Chercheur::selectByNum($id);

if ($resultat) {
    PublicationPublique::insertPublicationPublique($_POST['titre'], $_POST['date'], $_POST['description'], $id, $nomFic);
} else {
    PublicationPrivee::insertPublicationPrivee($_POST['titre'], $_POST['description'], $id, $_POST['date'], $nomFic);
}

header('Location:../index.php');
