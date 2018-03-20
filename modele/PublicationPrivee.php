<?php
/**
 * Created by PhpStorm.
 * User: f11468703
 * Date: 14/03/18
 * Time: 13:37
 */

class PublicationPrivee
{
    public static function insertPublicationPrivee($titre, $description, $id, $date, $fichier)
    {
        $req = $GLOBALS['pdo']->prepare('INSERT INTO PublicationPrivee (LibellePriv, NumInscrit, titre, date, fichier) VALUES (:Libelle, :NumInscrit, :titre, :date, :fichier)');
        $req->execute(array(
            'titre' => $titre,
            'Libelle' => $description,
            'NumInscrit' => $id,
            'date' => $date,
            'fichier' => $fichier) ) or die (print_r($req->errorInfo())) ;
    }
}