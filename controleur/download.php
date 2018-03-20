<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 20/03/2018
 * Time: 00:40
 */


$path = "../fichierjoint/";
$monfic = $_POST['nomFic'];

$path = $path . $monfic;

header('Content-Type: text/plain\n');
header('Content-disposition: attachment; filename='. $path);
header('Pragma: no-cache');
header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
header('Expires: 0');
readfile($path);