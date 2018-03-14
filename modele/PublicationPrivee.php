<?php
/**
 * Created by PhpStorm.
 * User: f11468703
 * Date: 14/03/18
 * Time: 13:37
 */

class PublicationPrivee
{
    public static function insertPublicationPrivee($description, $id)
    {
        $req = $GLOBALS['pdo']->prepare('INSERT INTO PublicationPrivee (LibellePriv, NumInscrit) VALUES (:Libelle, :NumInscrit)');
        $req->execute(array(
            'Libelle' => $description,
            'NumInscrit' => $id) ) or die (print_r($req->errorInfo())) ;
    }


}