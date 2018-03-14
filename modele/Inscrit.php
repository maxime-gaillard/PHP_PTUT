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
            'Email' => $email));

        return $req->fetch();
    }
}