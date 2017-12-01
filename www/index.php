<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Bootstrap Example</title>
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
    	<div class="w3-display-container background" style="width:100%; min-height:150px;">
			<div class="w3-display-middle w3-large"><img src="logo_site.png"></div>
		</div>
        <div class="flex-container">
            <div></div>
            <div>
                <ul>
                    <li><a href="#" class="active">Accueil</a></li>
                    <li><a href="inscription.html">Publication</a></li>
                    <li><a href="#">Publier</a></li>
                    <li></li>
                </ul>
            </div>
            <div>
                <input id="recherchePublication" onkeypress="return recherche(event)" type="search" name="search" placeholder="Your name..">
            </div>
        </div>

        <h2>Test de création d'un nouvel inscrit</h2>
        <form action="testCreation.php"  method="post">

            <div>
                <label for="Nom">Nom inscrit :</label>
                <input type="text" name="Nom" id="Nom" />
            </div>

            <div>
                <label for="Prenom">Prénom :</label>
                <input type="text" name="Prenom" id="Prenom" />
            </div>

            <div>
                <label for="Email">Adresse mail :</label>
                <input type="email" name="Email" id="Email" />
            </div>

            <div>
                <label for="MotDePasse">Mot de passe :</label>
                <input type="password" name="MotDePasse" id="MotDePasse" />
            </div>

            <div>
                <label for="Description">Description :</label>
                <input type="text" name="Description" id="Description" />
            </div>

            <div class="button">
                <button type="submit">Creer</button>
            </div>
        </form>

        <h2>Test de connexion d'un inscrit</h2>
        <form action="testConnexion.php"  method="post">
            <div>
                <label for="Email1">Adresse mail :</label>
                <input type="email" name="Email1" id="Email1" />
            </div>

            <div>
                <label for="MotDePasse1">Mot de passe :</label>
                <input type="password" name="MotDePasse1" id="MotDePasse1" />
            </div>

            <div class="button">
                <button type="submit">Se connecter</button>
            </div>
        </form>

        <h2>Test de recherche base de données</h2>
        <form action="keyword_query.php" method="post">
            <p>Saisir : <input type="text" name="keyword" /></p>
            <p><input type="submit" value="Trouver"/></p>
        </form>

        <h2>Test de la mise en ligne d'une publication</h2>
        <form action="publication.php" method="post">
            <p>Quelle personne etes vous ?</p>

<!--            <div>-->
<!--                <input type="radio" name="type" value="etudiant" id="Etudiant" checked="checked" />-->
<!--                <label for="Etudiant">Etudiant</label>-->
<!--            </div>-->
<!---->
<!--            <div>-->
<!--                <input type="radio" name="type" value="chercheur" id="Chercheur" />-->
<!--                <label for="Chercheur">Chercheur</label>-->
<!--            </div>-->
<!---->
<!--            <div>-->
<!--                <input type="radio" name="type" value="entreprise" id="Entreprise" />-->
<!--                <label for="Entreprise">Entreprise</label>-->
<!--            </div>-->

            <div>
                <p>Titre : </p>
                <input type="text" name="titre" />
            </div>

            <div>
                <p>Date : </p>
                <input type="text" name="date" />
            </div>
            <div>
                <p>Description : </p>
                <input type="text" name="description" />
            </div>

<!--            <div>-->
<!--                <p>Identifiant chercheur :</Identif> : </p>-->
<!--                <input type="text" name="idChercheur" />-->
<!--            </div>-->

            <div>
                <p>Votre message ici: </p>
                <textarea name="description" rows="8" cols="45"></textarea>
            </div>

            <p><input type="submit" value="S'inscrire"/></p>
        </form>

    <script>
        function recherche(e) {
            if(e.keyCode === 13 || e.which === 13) {
                var url = "/keyword_query.php";
                $.post(url);
                return false;
            }
        }
    </script>
    </body>
</html>