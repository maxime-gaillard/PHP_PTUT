<?php
try {
    $bdd = new PDO('mysql:host=mysql-groupe2equipe2ptut.alwaysdata.net;dbname=groupe2equipe2ptut_base;charset=utf8', '146012_maxime', '123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $type = htmlspecialchars($_POST['type']);
    echo $type;
//    if($type == "" || is_null($type)) die();
//
//    $libelle = htmlspecialchars($_POST['libelle']);
//    if($libelle == "" || is_null($libelle)) die();
//
//    $date = htmlspecialchars($_POST['date']);
//    if($date == "" || is_null($date)) die();
//
//    $descitpion = htmlspecialchars($_POST['description']);
//    if($descitpion == "" || is_null($descitpion)) die();


    if ($type == "chercheur") {
//        $idChercheur = htmlspecialchars($_POST['idChercheur']);
//        if($idChercheur == "" || is_null($idChercheur)) die();

        $req = $bdd->prepare('INSERT INTO Publication (LibelleP, DescriptionP, Date) VALUES (:LibelleP, :Description, :Date)/* SELECT * FROM Publication WHERE LibelleP LIKE ?*/');

        $req->execute(array(
            'LibelleP' => $_POST['libelle'],
            'Description' => $_POST['description'],
            'Date' => $_POST['date']) ) or die ( print_r($req->errorInfo())) ;

        echo 'Une nouvelle publication a été ajoutée !';

    } elseif ($type == "entreprise") {
        $siren = htmlspecialchars($_POST['siren']);
        if($siren == "" || is_null($siren)) die();

        $req = $bdd->prepare('INSERT INTO Publication (Nom, Description) VALUES (:Nom, :Description)/* SELECT * FROM Publication WHERE LibelleP LIKE ?*/');

        $req->execute(array(
            'LibelleP' => $_POST['libelle'],
            'Description' => $_POST['description'],
            'Date' => $_POST['date']) ) or die ( print_r($req->errorInfo())) ;

        echo 'Une nouvelle publication a été ajoutée !';

    } elseif ($type == "etudiant") {
        $req = $bdd->prepare('INSERT INTO Publication (Nom, Description) VALUES (:Nom, :Description)/* SELECT * FROM Publication WHERE LibelleP LIKE ?*/');

        $req->execute(array(
            'LibelleP' => $_POST['libelle'],
            'Description' => $_POST['description'],
            'Date' => $_POST['date']) ) or die ( print_r($req->errorInfo())) ;

        echo 'Une nouvelle publication a été ajoutée !';
    }


    $req->closeCursor();
    $bdd = null;
}
catch (PDOException $e) {
    $e->getMessage();
}
?>
