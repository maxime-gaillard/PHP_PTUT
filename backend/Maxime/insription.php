<?php
try {
    $bdd = new PDO('mysql:host=mysql-groupe2equipe2ptut.alwaysdata.net;dbname=groupe2equipe2ptut_base;charset=utf8', '146012_maxime', '123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $type = htmlspecialchars($_POST['type']);
    if($type == "" || is_null($type)) die();

    $name = htmlspecialchars($_POST['name']);
    if($name == "" || is_null($name)) die();

    $descitpion = htmlspecialchars($_POST['description']);
    if($descitpion == "" || is_null($descitpion)) die();

    if ($type == "chercheur") {
        $idChercheur = htmlspecialchars($_POST['idChercheur']);
        if($idChercheur == "" || is_null($idChercheur)) die();

        $req = $bdd->prepare('INSERT INTO Inscrit (Nom, Description) VALUES (?, ?)/* SELECT * FROM Publication WHERE LibelleP LIKE ?*/');
        $req->execute(array('%' . $descitpion . '%' . '%' . $name . '%'));
    } elseif ($type == "entreprise") {
        $siren = htmlspecialchars($_POST['siren']);
        if($siren == "" || is_null($siren)) die();

        $req = $bdd->prepare('INSERT INTO Inscrit (Nom, Description) VALUES (?, ?)/* SELECT * FROM Publication WHERE LibelleP LIKE ?*/');
        $req->execute(array('%' . $descitpion . '%' . '%' . $name . '%'));
    } elseif ($type == "etudiant") {
        $req = $bdd->prepare('INSERT INTO Inscrit (Nom, Description) VALUES (?, ?)/* SELECT * FROM Publication WHERE LibelleP LIKE ?*/');
        $req->execute(array('%' . $descitpion . '%' . '%' . $name . '%'));
    }


    $req->closeCursor();
    $bdd = null;
}
catch (PDOException $e) {
    $e->getMessage();
}
?>
