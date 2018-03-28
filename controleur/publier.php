<?php
session_start();

include '../modele/IncludeDB.php';

$id = $_SESSION['NumInscrit'];
$resultat = Chercheur::selectByNum($id);

if ($resultat) {
    if (   empty($_POST['titre'])
        || empty($_POST['date'])
        || empty($_POST['description'])) {
        $messagepub = "Il faut remplir tous les champs";
        header("Location:ControleurPublier.php?messagepub=$messagepub");
    } else {
        define("UPLOAD_DIR", "../fichierjoint/");
        if (!empty($_FILES["myFile"]["name"])) {
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

        PublicationPublique::insertPublicationPublique($_POST['titre'], $_POST['date'], $_POST['description'], $id, $nomFic);
        header('Location:../index.php');
    }
} else {
    if (   empty($_POST['titre'])
        || empty($_POST['date'])
        || empty($_POST['description'])) {
        $messagepub = "Il faut remplir au minimum les champs : Titre, Date et Description";
        header("Location:ControleurPublier.php?messagepub=$messagepub");
    } else {
        define("UPLOAD_DIR", "../fichierjoint/");
        if (!empty($_FILES["myFile"]["name"])) {
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

        if($_POST['typePublication'] == "offre" || $_POST['typePublication'] == "demande"){
            PublicationPrivee::insertPublicationPrivee(
                $_POST['typeEntreprise'],
                $_POST['typePublication'],
                $_POST['titre'],
                $_POST['date'],
                $_POST['typeProduit'],
                $_POST['contrainte'],
                $_POST['description'],
                $id,
                $nomFic);
        } else {
            PublicationPrivee::insertPublicationPriveeRetour(
                $_POST['typeEntreprise'],
                $_POST['typePublication'],
                $_POST['titre'],
                $_POST['date'],
                $_POST['description'],
                $id,
                $nomFic);
        }
        header('Location:../index.php');
    }
}