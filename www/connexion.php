<?php
try
{
    $bdd = new PDO('mysql:host=mysql-groupe2equipe2ptut.alwaysdata.net;dbname=groupe2equipe2ptut_base;charset=utf8', '146012', '123');

}
catch (Exception $e)
{
    die('Erreur de connexion : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT NumInscrit, MotDePasse FROM Inscrit WHERE Email = :Email1');

$req->execute(array('Email1' => $_POST['Email1']));

$resultat = $req->fetch();

if (!$resultat)
{
    echo 'Mauvais mail !';
}
else
{
    if (password_verify($_POST['MotDePasse1'], $resultat['MotDePasse'])) {
        session_start();
        $_SESSION['NumInscrit'] = $resultat['NumInscrit'];
        $_SESSION['Email1'] = $_POST['Email1'];
        echo 'Vous êtes connecté !';
    }
    else {
        echo 'Mauvais mot de passe !';
    }
}

$bdd = null;
?>