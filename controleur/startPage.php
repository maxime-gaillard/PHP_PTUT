<?php
session_start();

function start_page($title)
{
    p1($title);

    if (empty($_SESSION['NumInscrit'])) {
        btnInsCo($title);
    } else {
        echo '<li><a href="../controleur/deconnexion.php">Déconnexion</a></li>';
    }

    p2($title);

    if (isset($_SESSION['NumInscrit'])) {
        echo '<li><a href="../controleur/ControleurPublier.php"';
        if ($title == "Publier") {
            echo 'class = active';
        }
        echo '>Publier</a></li>';
    }

    echo '</ul>
            </div>
            <div>';
    if (isset($_GET['a']) && $_SESSION['NumInscrit']) {
        echo '<form  id="recherche" action="../controleur/rechercheMotCle.php" method="post">
                    <input type="search" name="search" placeholder="  Chercher...">
                </form>';
    }

    echo '</div>
        </div>';
}

function p1($title)
{
    echo '<!DOCTYPE html>
    <html lang="fr">
    <head>
    <title>' . PHP_EOL . $title . '</title>' . PHP_EOL .
        '<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="../js/rssToJson.js"></script>
    </head>
    <body class="w3-light-grey">
    <div class="w3-display-container background" style="width: 100%; min-height: 150px;">
        <div class="w3-display-middle w3-large" style="text-align: center; margin-top: 0em; min-width: 20%; height: 8em;">
            <img src="../logosite.png" style="height: 8em;">
        </div>
        <div class="w3-display-bottomright" id="options">'
            . '<p style="text-align: center;">' . $_GET['message'] . '</p>' .
            '<div>
                <ul>';
}

function p2($title)
{
    echo '</ul>
                </div>
            </div>
            <div id="modalConnexion" class="w3-display-right">
                <form action="../controleur/connexion.php" method="post" class="text-center">
                    <input type="email" name="Email" placeholder="Email">
                    <input type="password" name="MotDePasse" placeholder="Mot de passe">
                    <!--<a href="#" id="valider">Valider</a>-->
                    <button id="valider" type="submit" class="w3-button w3-white w3-hover-orange">Valider</button>
                    <button id="annuler" class="w3-button w3-white w3-hover-orange">Annuler</button>
                    <script>
                        let annuler = $("#annuler");
                        annuler.onclick = function () {
                            $("#modalConnexion").hide();
                        };
                    </script>
                </form>
            </div>
        </div>
        
        <div class="flex-container">
            <div></div>
            <div>
                <ul>
                    <li><a href="/index.php"';

    if ($title == "Index") {
        echo 'class = active';
    }

    echo '>Accueil</a></li>
                    <li><a id="btn-publ" href="/vue/publications.php?a=1"';
    if ($title == "Publications") {
        echo 'class = active';
    }
    echo '>Publications</a></li>';
}

function btnInsCo($title)
{
    echo '<li><a href="../controleur/ControleurInscription.php"';

    if ($title == "Inscription") {
        echo 'class = active';
    }

    echo '>S\'inscrire</a></li>
                    <li><a href="#" id="connexion">Connexion</a></li>
                    <script>
                        let connexion = document.getElementById("connexion");
                        connexion.onclick = function () {
                            document.getElementById("modalConnexion").style.visibility = "visible";
                            document.getElementById("options").style.visibility = "hidden";
                        };
                        /*var input = document.getElementById("input");
                        input.addEventListener(\\\'keyup\\\',function(){
                            alert(input.value);
                        });*/
                    </script>';
}