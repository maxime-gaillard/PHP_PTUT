<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Accueil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</head>
<body>
<div class="w3-display-container background" style="width: 100%; min-height: 150px;">
    <div class="w3-display-middle w3-large" style="text-align: center; margin-top: 0em; min-width: 20%; height: 8em;">
        <img src="logosite.png" style="height: 8em;">
    </div>
    <div class="w3-display-bottomright" id="options">
        <div>
            <ul>
                <li><a href="inscription.html">S'inscrire</a></li>
                <li><a href="#" id="connexion">Connexion</a></li>
            </ul>
        </div>
    </div>
    <div id="modalConnexion" class="w3-display-right">
        <input type="email" name="mail" placeholder="Email">
        <input type="password" name="mdp" placeholder="Mot de passe">
        <a href="#" id="valider">Valider</a>
    </div>
</div>
<div class="flex-container">
    <div></div>
    <div>
        <ul>
            <li><a href="index.php" class="active">Accueil</a></li>
            <li><a href="#">Publication</a></li>
            <li><a href="#">Publier</a></li>
        </ul>
    </div>
    <div>
        <form action="keyword_query.php" method="post">
        <input id="recherchePublication" type="search" name="search" placeholder="Rechercher...">
        </form>
    </div>
</div>
<script>
    var connexion = document.getElementById('connexion');
    connexion.onclick = function() {
        document.getElementById("modalConnexion").style.visibility = "visible";
        document.getElementById("options").style.visibility = "hidden";
    };
    var input = document.getElementById("input");
    input.addEventListener('keyup',function(){
        alert(input.value);
    });
</script>
</body>
</html>