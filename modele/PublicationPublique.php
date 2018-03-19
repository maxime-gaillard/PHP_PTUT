<?php
/**
 * Created by PhpStorm.
 * User: f11468703
 * Date: 14/03/18
 * Time: 13:37
 */

class PublicationPublique
{
    public static function insertPublicationPublique($titre, $date, $description, $id)
    {
        $req = $GLOBALS['pdo']->prepare('INSERT INTO PublicationPublique (LibellePubl, NumInscrit, titre, date) VALUES (:Libelle, :NumInscrit, :titre, :date)');
        $req->execute(array(
            'titre' => $titre,
            'Libelle' => $description,
            'NumInscrit' => $id,
            'date' => $date) ) or die (print_r($req->errorInfo())) ;
    }


}