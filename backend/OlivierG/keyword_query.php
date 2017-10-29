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
}
catch (Exception $e) {
    die($e->getMessage());
}

// $req = $bdd->query("SELECT * FROM Publication WHERE LibelleP LIKE '%".$keyword."%'");
// This instruction has low security regarding SQL injection, we use prepare and execute instead.

$req = $bdd->prepare("SELECT * FROM Publication WHERE LibelleP LIKE '%?%'");
//$req->execute(array(isset($_POST['keyword']) ? $_POST['keyword'] : NULL));
$req->execute(array($_POST['keyword']));

while($data = $req->fetch()) {
?> <strong>

<?php
    echo $data['LibelleP'];
?> </strong><br />

<?php
    echo $data['DescriptionP'];
?> <br/><br/>

<?php
}

$req->closeCursor();
?>
