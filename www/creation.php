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
$type = $_POST['type'];

$req = $bdd->prepare('INSERT INTO Inscrit(Nom, Prenom, Email, MotDePasse, Description) VALUES(:Nom, :Prenom, :Email, :MotDePasse, :Description)');

$req->execute(array(
    'Nom'         => $nom,
    'Prenom'      => $prenom,
    'Email'       => $email,
    'MotDePasse'  => $pass_hache,
    'Description' => $description) ) or die ( print_r($req->errorInfo())) ;

$NumInscrit = $bdd -> lastInsertId();

if($type == "chercheur"){
    $IdC = ($_POST['IdC']);
    $reqChercheur = $bdd->prepare('INSERT INTO Chercheur(NumC, IdC) VALUES(:NumC, :IdC)');
    $reqChercheur->execute(array(
        'NumC' => $NumInscrit,
        'IdC'  => $IdC)) or die (print_r($req->errorInfo()));
} else {
    $NomE = ($_POST['NomE']);
    $SIREN = ($_POST['SIREN']);
    $reqEntreprise = $bdd->prepare('INSERT INTO Entreprise(NumE, NomE, SIREN) VALUES(:NumE, :NomE, :SIREN )');
    $reqEntreprise->execute(array(
        'NumE'  => $NumInscrit,
        'NomE'  => $NomE,
        'SIREN' => $SIREN)) or die (print_r($req->errorInfo()));
    }

header('Location:index.html');

//echo 'Un nouvel inscrit a été ajouté !';
$bdd = null;
?>