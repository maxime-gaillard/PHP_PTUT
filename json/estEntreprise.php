<?php
session_start();

require_once '../modele/Inscrit.php';

$data = new stdClass();
$data->est_entreprise = false;

if (Inscrit::estEntreprise($_SESSION['NumInscrit'])) {
    $data->est_entreprise = true;
}

// Renvoyer les données pour affichage / JSON
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($data);