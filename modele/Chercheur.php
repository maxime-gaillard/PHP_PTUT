<?php
/**
 * Created by PhpStorm.
 * User: f11468703
 * Date: 14/03/18
 * Time: 13:36
 */

require_once ('db_connect.php');


class Chercheur
{

    public static function insertChercheur($IdC, $NumInscrit)
    {
        $req = $GLOBALS['pdo']->prepare('INSERT INTO Chercheur(NumC, IdC) VALUES(:NumC, :IdC)');
        $req->execute(array(
            'NumC' => $NumInscrit,
            'IdC' => $IdC)) or die (print_r($req->errorInfo()));
    }
}