<?php
session_start();

$descitpion = htmlspecialchars($_POST['description']);
if($descitpion == "" || is_null($descitpion)) die();

$id = $_SESSION['NumInscrit'];

if(is_null($_SESSION['NumInscrit'])) {
    echo "Vous n'etes pas connecte !";
    die();
}

//$req1 = $bdd->prepare('SELECT * FROM Chercheur WHERE NumC = :numC');
//$req1->execute(array('numC' => $id,) ) or die (print_r($req->errorInfo())) ;

$resultat = Chercheur::selectByNum($id);

if ($resultat) {
    PublicationPublique::insertPublicationPublique($_POST['description'], $id);
//    $req = $bdd->prepare('INSERT INTO PublicationPublique (LibellePubl, NumInscrit) VALUES (:Libelle, :NumInscrit)');
//    $req->execute(array(
//        'Libelle' => $_POST['description'],
//        'NumInscrit' => $id) ) or die (print_r($req->errorInfo())) ;
} else {
    PublicationPrivee::insertPublicationPrivee($_POST['description'], $id);
//    $req = $bdd->prepare('INSERT INTO PublicationPrivee (LibellePriv, NumInscrit) VALUES (:Libelle, :NumInscrit)');
//    $req->execute(array(
//        'Libelle' => $_POST['description'],
//        'NumInscrit' => $id,) ) or die (print_r($req->errorInfo())) ;
}

echo 'L\'utilisateur ' . $id . ' a créé une nouvelle publication !';

$req->closeCursor();
$bdd = null;
//header('Location:index.html');
?>