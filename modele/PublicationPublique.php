<?php
/**
 * Created by PhpStorm.
 * User: f11468703
 * Date: 14/03/18
 * Time: 13:37
 */

class PublicationPublique
{
    public static function insertPublicationPublique($description, $id)
    {
        $req = $GLOBALS['pdo']->prepare('INSERT INTO PublicationPublique (LibellePubl, NumInscrit) VALUES (:Libelle, :NumInscrit)');
        $req->execute(array(
            'Libelle' => $description,
            'NumInscrit' => $id) ) or die (print_r($req->errorInfo())) ;
    }


}