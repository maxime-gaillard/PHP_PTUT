<?php
try
{
    $bdd = new PDO('mysql:host=mysql-groupe2equipe2ptut.alwaysdata.net;dbname=groupe2equipe2ptut_base;charset=utf8', '146012', '123');

}
catch (Exception $e)
{
    die('Erreur de connexion : ' . $e->getMessage());
}


$req = $bdd->prepare('SELECT NumInscrit FROM Inscrit WHERE Nom = :nom');
$req->execute(array('Nom' => $nom));

$resultat = $req->fetch();

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    session_start();
    $_SESSION['NumInscrit'] = $resultat['NumInscrit'];
    $_SESSION['Nom'] = $nom;
    echo 'Vous êtes connecté !';
}
?>