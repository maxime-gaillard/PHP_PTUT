<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 29/10/17
 * Time: 15:06
 */
try {
    $bdd = new PDO('mysql:host=mysql-groupe2equipe2ptut.alwaysdata.net;dbname=groupe2equipe2ptut_base;charset=utf8', '146012_olivierg', '123');
}
catch (Exception $e) {
    die($e->getMessage());
}
?>

<form action="recherche_mots_clefs.php" method="post">
    <p>Saisir : <input type="text" name="keyword" /></p>
    <p><input type="submit" value="Trouver"/></p>
</form>

<?php

$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : NULL;
$request = $bdd->query("SELECT * FROM Publication WHERE LibelleP LIKE '%$keyword%'");

while($data = $request->fetch()) {
    ?>
    <strong>

    <?php echo $data['LibelleP']; ?>
    </strong><br />

    <?php echo $data['DescriptionP']; ?>
    <br/><br/>

    <?php
}

$request->closeCursor();
?>
