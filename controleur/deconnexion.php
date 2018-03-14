<?php
/**
 * Created by PhpStorm.
 * User: gaill
 * Date: 14/03/2018
 * Time: 17:32
 */

session_start();
$_SESSION['NumInscrit'] = null;
$message = 'Vous avez été déconnecté.';
header("Location: ../index.php?message=$message");