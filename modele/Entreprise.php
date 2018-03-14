<?php
/**
 * Created by PhpStorm.
 * User: f11468703
 * Date: 14/03/18
 * Time: 13:37
 */

class Entreprise
{
    public static function insertEntreprise($NumInscrit, $NomE, $SIREN)
    {
        $req = $GLOBALS['pdo']->prepare('INSERT INTO Entreprise(NumE, NomE, SIREN) VALUES(:NumE, :NomE, :SIREN )');
        $req->execute(array(
            'NumE'  => $NumInscrit,
            'NomE'  => $NomE,
            'SIREN' => $SIREN)) or die (print_r($req->errorInfo()));
    }

}