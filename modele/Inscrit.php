<?php

class Inscrit
{
    public static function insertInscrit($nom, $prenom, $email, $pass_hache, $description)
    {
        $req = $GLOBALS['pdo']->prepare('INSERT INTO Inscrit(Nom, Prenom, Email, MotDePasse, Description) VALUES(:Nom, :Prenom, :Email, :MotDePasse, :Description)');
        $req->execute(array(
            'Nom' => $nom,
            'Prenom' => $prenom,
            'Email' => $email,
            'MotDePasse' => $pass_hache,
            'Description' => $description)) or die (print_r($req->errorInfo()));

        return $GLOBALS['pdo']->lastInsertId();
    }

    public static function selectByEmail($email)
    {
        $req = $GLOBALS['pdo']->prepare('SELECT NumInscrit, MotDePasse FROM Inscrit WHERE Email = :Email');
        $req->execute(array(
            'Email' => $email)) or die (print_r($req->errorInfo()));

        return $req->fetch();
    }

    public static function estEntreprise($numInscrit)
    {
        $pdo = new PDO('mysql:host=mysql-groupe2equipe2ptut.alwaysdata.net;dbname=groupe2equipe2ptut_base;charset=utf8',
            '146012',
            '123');
        $pdo->exec('SET CHARACTER SET utf8');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $req = $pdo->prepare('SELECT * FROM Entreprise WHERE NumE = :numInscrit');
        $req->execute(array(
            'numInscrit' => $numInscrit)) or die (print_r($req->errorInfo()));

        if ($req->rowCount() > 0) {
            return true;
        }
        return false;
    }
}