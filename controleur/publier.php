<?php
session_start();


include '../modele/IncludeDB.php';
$descitpion = htmlspecialchars($_POST['description']);

// Where the file is going to be placed
//$target_path = "../fichierjoint/";
//
//var_dump($_FILES);
//die;

/* Add the original filename to our target path.
Result is "uploads/filename.extension" */
//$target_path = $target_path . basename( $_FILES['userfile']['name']);



//$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

//echo '-->' . $target_path;
//
//
//
//if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
//    echo "The file ".  basename( $_FILES['userfile']['name']).
//        " has been uploaded";
//} else{
//    echo "There was an error uploading the file, please try again!";
//}


//$path = "../fichierjoint";
//$path = $path . basename( $_FILES['userfile']['name']);
//
//echo "test";
//
//if(move_uploaded_file($_FILES['userfile']['tmp_name'], $path)) {
//    echo "Success uploading". basename($_FILES['userfile']['name']);
//} else {
//    echo "Error when uploading file.";
//}

if($descitpion == "" || is_null($descitpion)) {
}

$id = $_SESSION['NumInscrit'];

if(is_null($_SESSION['NumInscrit'])) {
}


$resultat = Chercheur::selectByNum($id);

if ($resultat) {
    PublicationPublique::insertPublicationPublique($_POST['titre'], $_POST['date'], $_POST['description'], $id);
} else {
    PublicationPrivee::insertPublicationPrivee($_POST['titre'], $_POST['description'], $id, $_POST['date']);
}

header('Location:../index.php');
