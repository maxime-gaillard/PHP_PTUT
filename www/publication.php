<?php
session_start();

try {
    $bdd = new PDO('mysql:host=mysql-groupe2equipe2ptut.alwaysdata.net;dbname=groupe2equipe2ptut_base;charset=utf8', '146012_maxime', '123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $descitpion = htmlspecialchars($_POST['description']);
    if($descitpion == "" || is_null($descitpion)) die();

    $id = $_SESSION['NumInscrit'];

    if(is_null($_SESSION['NumInscrit'])) {
        echo "Vous n'etes pas connecte !";
        die();
    }

    $req1 = $bdd->prepare('SELECT * FROM Chercheur WHERE NumC = :numC');
    $req1->execute(array('numC' => $id,) ) or die (print_r($req->errorInfo())) ;

    $resultat = $req1->fetch();

    if ($resultat) {
        $req = $bdd->prepare('INSERT INTO PublicationPublique (LibellePubl, NumInscrit) VALUES (:Libelle, :NumInscrit)');
        $req->execute(array(
            'Libelle' => $_POST['description'],
            'NumInscrit' => $id,) ) or die (print_r($req->errorInfo())) ;
    } else {
        $req = $bdd->prepare('INSERT INTO PublicationPrivee (LibellePriv, NumInscrit) VALUES (:Libelle, :NumInscrit)');
        $req->execute(array(
            'Libelle' => $_POST['description'],
            'NumInscrit' => $id,) ) or die (print_r($req->errorInfo())) ;
    }

    echo 'L\'utilisateur ' . $id . ' a créé une nouvelle publication !';

    $req->closeCursor();
    $bdd = null;
    //header('Location:index.html');
}
catch (PDOException $e) {
    $e->getMessage();
}
?>