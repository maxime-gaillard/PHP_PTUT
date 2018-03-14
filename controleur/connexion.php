<?php
session_start();
include '../modele/IncludeDB.php';
//try
//{
//    $bdd = new PDO('mysql:host=mysql-groupe2equipe2ptut.alwaysdata.net;dbname=groupe2equipe2ptut_base;charset=utf8', '146012', '123');
//
//}
//catch (Exception $e)
//{
//    die('Erreur de connexion : ' . $e->getMessage());
//}

//$req = $bdd->prepare('SELECT NumInscrit, MotDePasse FROM Inscrit WHERE Email = :Email');
//
//$req->execute(array('Email' => $_POST['Email']));

$resultat = Inscrit::selectByEmail($_POST['Email']);
$message ='';

if (!$resultat) {
    $message = 'Le mail n\'existe pas';
} else if (password_verify($_POST['MotDePasse'], $resultat['MotDePasse'])) {
                $_SESSION['NumInscrit'] = $resultat['NumInscrit'];
                $_SESSION['Email'] = $_POST['Email'];
                $message = 'Vous êtes connecté';
        } else {
    $message = 'Mauvais mot de passe';
    }
header('Location:../index.php?$message');
?>