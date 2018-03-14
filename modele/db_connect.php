<?php
/**
 * Created by PhpStorm.
 * User: f11468703
 * Date: 14/03/18
 * Time: 13:30
 */

try
{
    if(!isset($GLOBALS['pdo']))
    {
        $pdo= new PDO('mysql:host=mysql-groupe2equipe2ptut.alwaysdata.net;dbname=groupe2equipe2ptut_base;charset=utf8', '146012', '123');
        $pdo->exec('SET CHARACTER SET utf8');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
catch(PDOException $e)
{
    die('Error : ' . $e->getMessage());
}