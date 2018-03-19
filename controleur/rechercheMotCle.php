<?php
session_start();
try {
    $bdd = new PDO('mysql:host=mysql-groupe2equipe2ptut.alwaysdata.net;dbname=groupe2equipe2ptut_base;charset=utf8',
        '146012_olivierg',
        '123',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    // array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION) : accurate SQL errors description

    // $req = $bdd->query("SELECT * FROM Publication WHERE LibelleP LIKE '%".$keyword."%'");
    // This instruction has low security regarding SQL injection, we use prepare and execute instead.

    $keyword = htmlspecialchars($_POST['search']);
    if($keyword == "" || is_null($keyword)) {
        echo "Valeur de recherche nulle !";
        die();
    }

    if(is_null($_SESSION['NumInscrit'])) {
        echo "Vous n'etes pas connecte !";
        die();
    }

    $req = $bdd->prepare('SELECT * FROM Entreprise WHERE NumE LIKE ?');
    $req->execute(array($_SESSION['NumInscrit']));



    if($req->fetch()) {
        $a = '%' . $_POST['search'] . '%';
        $req = $bdd->prepare('SELECT * FROM PublicationPrivee WHERE LibellePriv LIKE :search');
        $req->execute(array('search' => $a));
        $resultat = $req->fetchAll();

//        echo "Resultats de la recherche : <br/><br/>";
//        if($req->rowCount() == 0) {
//            echo "Pas de resultat";
//        }
//        else {
//            while ($data = $req->fetch()) {
//                echo "<strong>";
//                echo $data['LibellePriv'];
//                echo "</strong><br/>";
//            }
//        }
    }
    else {
        $a = '%' . $_POST['search'] . '%';
        $req = $bdd->prepare('SELECT * FROM PublicationPublique WHERE LibellePubl LIKE :search');
        $req->execute(array('search' => $a));
        $resultat = $req->fetchAll();

//        echo "Resultats de la recherche : <br/><br/>";
//        if($req->rowCount() == 0) {
//            echo "Pas de resultat";
//        }
//        else {
//            while ($data = $req->fetch()) {
//                echo "<strong>";
//                echo $data['LibellePubl'];
//                echo "</strong><br/>";
//            }
//        }
    }
//
//    $req->closeCursor();
//    $bdd = null;

    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
//    header("Location: ../index.php");
    echo json_encode($resultat);
}
catch (PDOException $e) {
    $e->getMessage();
}
?>