<?php
/**
 * Created by PhpStorm.
 * User: f11468703
 * Date: 14/03/18
 * Time: 13:37
 */

class PublicationPrivee
{

//    public static function insertPublicationPrivee($typeEntreprise, $typePublication, $titre, $date, $typeProduit, $contrainte, $description, $id, $fichier)
//    {
//        $req = $GLOBALS['pdo']->prepare(' INSERT INTO PublicationPrivee (typeEntreprise, typePublication, titre, date, typeProduit, contrainte, LibellePriv, NumInscrit, fichier)
//                                          VALUES (:typeEntreprise, typePublication, :titre, :date, :typeProduit, :contrainte, :LibellePriv, :NumInscrit, :fichier)');
//        $req->execute(array(
//            'typeEntreprise' => $typeEntreprise,
//            'typePublication' => $typePublication,
//            'titre' => $$titre,
//            'date' => $date,
//            'typeProduit' => $typeProduit,
//            'contrainte' => $contrainte,
//            'LibellePriv' => $description,
//            'NumInscrit' => $id,
//            'fichier' => $fichier) ) or die (print_r($req->errorInfo())) ;
//    }

    public static function insertPublicationPrivee($typeEntreprise, $typePublication, $titre, $date, $typeProduit, $contrainte, $description, $id, $fichier)
    {
        $req = $GLOBALS['pdo']->prepare(' INSERT INTO PublicationPrivee (typeEntreprise, typePublication, LibellePriv, NumInscrit, date, titre, fichier, typeProduit, contrainte)
                                          VALUES (:typeEntreprise, :typePublication, :LibellePriv, :NumInscrit, :date, :titre, :fichier, :typeProduit, :contrainte)');
        $req->execute(array(
            'typeEntreprise' => $typeEntreprise,
            'typePublication' => $typePublication,
            'LibellePriv' => $description,
            'NumInscrit' => $id,
            'date' => $date,
            'titre' => $titre,
            'fichier' => $fichier,
            'typeProduit' => $typeProduit,
            'contrainte' => $contrainte) ) or die (print_r($req->errorInfo())) ;
    }

    public static function insertPublicationPriveeRetour($typeEntreprise, $typePublication, $titre, $date, $description, $id, $fichier)
    {
        $req = $GLOBALS['pdo']->prepare(' INSERT INTO PublicationPrivee (typeEntreprise, typePublication, titre, date, LibellePriv, NumInscrit, fichier)
                                          VALUES (:typeEntreprise, :typePublication, :titre, :date, :LibellePriv, :NumInscrit, :fichier)');
        $req->execute(array(
            'typeEntreprise' => $typeEntreprise,
            'typePublication' => $typePublication,
            'titre' => $titre,
            'date' => $date,
            'LibellePriv' => $description,
            'NumInscrit' => $id,
            'fichier' => $fichier) ) or die (print_r($req->errorInfo())) ;
    }
}