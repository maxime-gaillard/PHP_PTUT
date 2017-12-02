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

$nom = htmlspecialchars($_POST['Nom']);
$prenom = htmlspecialchars($_POST['Prenom']);
$email= htmlspecialchars($_POST['Email']);
$pass_hache = password_hash($_POST['MotDePasse'], PASSWORD_DEFAULT);
$description = htmlspecialchars($_POST['Description']);

$req = $bdd->prepare('INSERT INTO Inscrit(Nom, Prenom, Email, MotDePasse, Description) VALUES(:Nom, :Prenom, :Email, :MotDePasse, :Description)');

$req->execute(array(
    'Nom' => $nom,
    'Prenom' => $prenom,
    'Email' => $email,
    'MotDePasse' => $pass_hache,
    'Description' => $description) ) or die ( print_r($req->errorInfo())) ;



echo 'Un nouvel inscrit a été ajouté !';

?>