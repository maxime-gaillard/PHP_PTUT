<?php
session_start();
include "../modele/IncludeDB.php";




$nom = htmlspecialchars($_POST['Nom']);
$prenom = htmlspecialchars($_POST['Prenom']);
$email = htmlspecialchars($_POST['Email']);
$pass_hache = password_hash($_POST['MotDePasse'], PASSWORD_DEFAULT);
$description = htmlspecialchars($_POST['Description']);
$type = $_POST['type'];

$NumInscrit = Inscrit::insertInscrit($nom, $prenom, $email, $pass_hache, $description);

if ($type == "chercheur") {
    Chercheur::insertChercheur($_POST['IdC'], $NumInscrit);
} else {
    $NomE = ($_POST['NomE']);
    $SIREN = ($_POST['SIREN']);

    Entreprise::insertEntreprise($NumInscrit, $NomE, $SIREN);
}

header('Location:/index.php');
$bdd = null;
?>

