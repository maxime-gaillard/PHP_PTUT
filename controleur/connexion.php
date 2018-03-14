<?php
session_start();

//try
//{
//    $bdd = new PDO('mysql:host=mysql-groupe2equipe2ptut.alwaysdata.net;dbname=groupe2equipe2ptut_base;charset=utf8', '146012', '123');
//
//}
//catch (Exception $e)
//{
//    die('Erreur de connexion : ' . $e->getMessage());
//}

//$req = $bdd->prepare('SELECT NumInscrit, MotDePasse FROM Inscrit WHERE Email = :Email');
//
//$req->execute(array('Email' => $_POST['Email']));

$resultat = Inscrit::selectByEmail($_POST['Email']);

if (!$resultat)
{
//    echo 'Mauvais mail !';
}

else
{
    if (password_verify($_POST['MotDePasse'], $resultat['MotDePasse'])) {
        $_SESSION['NumInscrit'] = $resultat['NumInscrit'];
        $_SESSION['Email'] = $_POST['Email'];
//        echo 'Vous êtes connecté ! Votre numéro d\'inscrit est ';
//        echo $_SESSION['NumInscrit'];
//        echo " et votre Email est ";
//        echo $_SESSION['Email'];
    }
    else {
//        echo 'Mauvais mot de passe !';
    }
}

header('Location:index.html');
$bdd = null;
?>