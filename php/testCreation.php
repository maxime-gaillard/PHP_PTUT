<?php
try
{
    $bdd = new PDO('mysql:host=mysql-groupe2equipe2ptut.alwaysdata.net;dbname=groupe2equipe2ptut_base;charset=utf8', '146012', '123');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur à la création : ' . $e->getMessage());
}

$pass_hache = password_hash($_POST['MotDePasse'], PASSWORD_DEFAULT);

$req = $bdd->prepare('INSERT INTO Inscrit(Nom, Prenom, Email, MotDePasse, Description) VALUES(:Nom, :Prenom, :Email, :MotDePasse, :Description)');

$req->execute(array(
    'Nom' => $_POST['Nom'],
    'Prenom' => $_POST['Prenom'],
    'Email' => $_POST['Email'],
    'MotDePasse' => $pass_hache,
    'Description' => $_POST['Description']) ) or die ( print_r($req->errorInfo())) ;

echo 'Un nouvel inscrit a été ajouté !';

?>