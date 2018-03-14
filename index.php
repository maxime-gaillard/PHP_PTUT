<!--<!DOCTYPE html>-->
<!--<html lang="fr">-->
<!--<head>-->
    <!--<title>Index</title>-->
    <!--<meta charset="utf-8">-->
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">-->
    <!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
    <!--<link rel="stylesheet" href="css/style.css">-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>-->
    <!--<script type="text/javascript" language="javascript" src="js/rssToJson.js"></script>-->
<!--</head>-->

<?php
session_start();
include 'controleur/startPage.php';
start_page("Index");
include 'vue/Body.html';