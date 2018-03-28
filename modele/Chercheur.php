<?php
/**
 * Created by PhpStorm.
 * User: f11468703
 * Date: 14/03/18
 * Time: 13:36
 */

class Chercheur
{
    public static function insertChercheur($IdC, $NumInscrit)
    {
        $req = $GLOBALS['pdo']->prepare('INSERT INTO Chercheur(NumC, IdC) VALUES(:NumC, :IdC)');
        $req->execute(array(
            'NumC' => $NumInscrit,
            'IdC' => $IdC)) or die (print_r($req->errorInfo()));
    }

    public static function selectByNum ($id) {
        $req = $GLOBALS['pdo']->prepare('SELECT * FROM Chercheur WHERE NumC = :numC');
        $req->execute(array('numC' => $id) ) or die (print_r($req->errorInfo())) ;
        return $req->fetch();
    }
}