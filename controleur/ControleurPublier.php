<?php
/**
 * Created by PhpStorm.
 * User: gaill
 * Date: 14/03/2018
 * Time: 16:42
 */
session_start();

include '../modele/IncludeDB.php';

include 'startPage.php';
start_page('Publier');

$id = $_SESSION['NumInscrit'];
$resultat = Chercheur::selectByNum($id);

if ($resultat) {
    include '../vue/publierChercheur.html';
} else {
    include '../vue/publierEntreprise.html';
}