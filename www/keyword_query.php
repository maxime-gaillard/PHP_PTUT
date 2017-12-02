<?php
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
    $req->execute($_SESSION['NumInscrit']);

    if($req) {
        $req = $bdd->prepare('SELECT * FROM PublicationPrivee WHERE LibelleP LIKE ?');
    }
    else {
        $req = $bdd->prepare('SELECT * FROM PublicationPublique WHERE LibelleP LIKE ?');
    }
    $req->execute(array('%' . $keyword . '%')); // % to get completion

    echo "Resultats de la recherche : <br/><br/>";

    while ($data = $req->fetch()) {
        echo "<strong>";
        echo $data['LibelleP'];
        echo "</strong><br/>";

        echo $data['DescriptionP'];
        echo "<br/><br/>";
    }

    $req->closeCursor();
    $bdd = null;
}
catch (PDOException $e) {
    $e->getMessage();
}
?>