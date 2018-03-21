<?php
session_start();
include '../modele/IncludeDB.php';

if(empty($_POST['Email']) || empty($_POST['MotDePasse'])){
    $message = "Saisir mail ET Mot de passe";
} else {
    $resultat = Inscrit::selectByEmail($_POST['Email']);
    $message = '';

    if (!$resultat) {
        $message = "Le mail n'existe pas";
    } else {
        if (password_verify($_POST['MotDePasse'], $resultat['MotDePasse'])) {
            $_SESSION['NumInscrit'] = $resultat['NumInscrit'];
            $_SESSION['Email'] = $_POST['Email'];
            $message = 'Vous êtes connecté';
        } else {
            $message = 'Mauvais mot de passe';
        }
    }
}

header("Location:../index.php?message=$message");