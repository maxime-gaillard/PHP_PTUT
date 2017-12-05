<?php
session_start();
try {
    $bdd = new PDO('mysql:host=mysql-groupe2equipe2ptut.alwaysdata.net;dbname=groupe2equipe2ptut_base;charset=utf8', '146012_maxime', '123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $titre = htmlspecialchars($_POST['titre']);
    if($titre == "" || is_null($titre)) die();

//    $date = htmlspecialchars($_POST['date']);
//    if($date == "" || is_null($date)) die();

    $descitpion = htmlspecialchars($_POST['description']);
    if($descitpion == "" || is_null($descitpion)) die();

//    if ($type == "chercheur") {

//        $idChercheur = htmlspecialchars($_POST['idChercheur']);
//        if($idChercheur == "" || is_null($idChercheur)) die();

    $id = $_SESSION['NumInscrit'];

    $req1 = $bdd->prepare('SELECT * FROM Chercheur WHERE idC LIKE ?');
    $req1->execute(array('%' . $id . '%'));

    $resultat = $req->fetch();

    if (!$resultat) {
        $req = $bdd->prepare('INSERT INTO PublicationPublique (LibelleP, DescriptionP) VALUES (:LibelleP, :Description)');

    }


    $req = $bdd->prepare('INSERT INTO Publication (LibelleP, DescriptionP) VALUES (:LibelleP, :Description)');
    $req->execute(array(
        'LibelleP' => $_POST['titre'],
        'Description' => $_POST['description']) ) or die ( print_r($req->errorInfo())) ;

    echo 'Une nouvelle publication a été ajoutée !';


//    } elseif ($type == "entreprise") {
//        $siren = htmlspecialchars($_POST['siren']);
//        if($siren == "" || is_null($siren)) die();
//
//        $req = $bdd->prepare('INSERT INTO Publication (LibelleP, DescriptionP) VALUES (:LibelleP, :Description)');
//
//        $req->execute(array(
//            'LibelleP' => $_POST['libelle'],
//            'Description' => $_POST['description']) ) or die ( print_r($req->errorInfo())) ;
//
//        echo 'Une nouvelle publication a été ajoutée !';
//
//
//    } elseif ($type == "etudiant") {
//        $req = $bdd->prepare('INSERT INTO Publication (LibelleP, DescriptionP) VALUES (:LibelleP, :Description)');
//
//        $req->execute(array(
//            'LibelleP' => $_POST['libelle'],
//            'Description' => $_POST['description']) ) or die ( print_r($req->errorInfo())) ;
//
//        echo 'Une nouvelle publication a été ajoutée !';
//    }

    $req->closeCursor();
    $bdd = null;
}
catch (PDOException $e) {
    $e->getMessage();
}
?>
