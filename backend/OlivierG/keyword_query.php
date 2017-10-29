<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 29/10/17
 * Time: 15:06
 */
try {
    $bdd = new PDO('mysql:host=mysql-groupe2equipe2ptut.alwaysdata.net;dbname=groupe2equipe2ptut_base;charset=utf8', '146012_olivierg', '123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    // array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION) : accurate SQL errors description

    // $req = $bdd->query("SELECT * FROM Publication WHERE LibelleP LIKE '%".$keyword."%'");
    // This instruction has low security regarding SQL injection, we use prepare and execute instead.

    $req = $bdd->prepare("SELECT * FROM Publication WHERE LibelleP LIKE '%?%'");

    $keyword = htmlspecialchars($_POST['keyword']);
    if($keyword == "" || is_null($keyword)) die();
    $req->execute(array($keyword));

    while ($data = $req->fetch()) {
        ?> <strong>

            <?php
            echo $data['LibelleP'];
            ?> </strong><br/>

        <?php
        echo $data['DescriptionP'];
        ?> <br/><br/>

        <?php
    }

    $req->closeCursor();
    $bdd = null;
}
catch (PDOException $e) {
    $e->getMessage();
}
?>
