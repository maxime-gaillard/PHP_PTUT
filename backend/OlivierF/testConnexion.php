<?php
try
{
    $bdd = new PDO('mysql:host=mysql-groupe2equipe2ptut.alwaysdata.net;dbname=groupe2equipe2ptut_base;charset=utf8', '146012', '123');

}
catch (Exception $e)
{
    die('Erreur de connexion : ' . $e->getMessage());
}

$pass_hache = password_hash($_POST['MotDePasse1'], PASSWORD_DEFAULT);

$req = $bdd->prepare('SELECT NumInscrit FROM Inscrit WHERE Email = :Email1 AND MotDePasse = :MotDePasse1');

$req->execute(array('Email' => $_POST['Email1'],'MotDePasse' => $pass_hache));

$resultat = $req->fetch();

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
    echo '\n';
    echo $pass_hache;
}
else
{
    session_start();
    $_SESSION['NumInscrit'] = $resultat['NumInscrit'];
    $_SESSION['Email1'] = $Email;
    echo 'Vous êtes connecté !';
}
?>