<?php
session_start();

require_once '../modele/Inscrit.php';

$articles = new stdClass();
$articles->publicationsPubl = array();
$articles->publicationsPriv = array();
$articles->est_entreprise = false;

if (Inscrit::estEntreprise($_SESSION['NumInscrit'])) {
    $articles->est_entreprise = true;
}

$pdo = new PDO('mysql:host=mysql-groupe2equipe2ptut.alwaysdata.net;dbname=groupe2equipe2ptut_base;charset=utf8',
    '146012',
    '123');
$pdo->exec('SET CHARACTER SET utf8');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*$req = $GLOBALS['pdo']->prepare('SELECT * FROM PublicationPublique');
$req->execute() or die (print_r($req->errorInfo()));*/

$req = $pdo->prepare('SELECT * FROM PublicationPublique ORDER BY NumPPubl DESC');
$req->execute() or die (print_r($req->errorInfo()));

while ($ligne = $req->fetch(PDO::FETCH_OBJ)) {
    $objet = new stdClass();
    $objet->NumPPubl = $ligne->NumPPubl;
    $objet->LibellePubl = $ligne->LibellePubl;
    $objet->NumInscrit = $ligne->NumInscrit;
    $objet->titre = $ligne->titre;
    $objet->date = $ligne->date;
    array_push($articles->publicationsPubl, $objet);
}

/*$req = $GLOBALS['pdo']->prepare('SELECT * FROM PublicationPrivee');
$req->execute() or die (print_r($req->errorInfo()));*/

$req = $pdo->prepare('SELECT * FROM PublicationPrivee ORDER BY NumPPriv DESC');
$req->execute() or die (print_r($req->errorInfo()));

while ($ligne = $req->fetch(PDO::FETCH_OBJ)) {
    $objet = new stdClass();
    $objet->NumPPriv = $ligne->NumPPriv;
    $objet->LibellePriv = $ligne->LibellePriv;
    $objet->NumInscrit = $ligne->NumInscrit;
    $objet->titre = $ligne->titre;
    $objet->date = $ligne->date;
    array_push($articles->publicationsPriv, $objet);
}

// Renvoyer les données pour affichage / JSON
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($articles);