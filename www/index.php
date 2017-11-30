<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Connexion d'un inscrit</title>
    <meta charset="utf-8"/>
    <style>

        h2 {
            text-align: center;
        }
        form {
            margin: 0 auto;
            width: 300px;
            padding: 1em;
            border: 1px solid #CCC;
            border-radius: 1em;
        }

        form div + div{
            margin-top: 1em;
        }

        label {
            display: inline-block;
            width: 100px;
            text-align: left;
        }

        button {
            margin-left: 105px;
            width: 120px;
        }
    </style>
</head>
<body>

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

<form action="insription.php" method="post">
    <p>Quelle personne etes vous ?</p>
    <input type="radio" name="type" value="etudiant" id="Etudiant" checked="checked" /> <label for="Etudiant">Etudiant</label>
    <input type="radio" name="type" value="chercheur" id="Chercheur" /> <label for="Chercheur">Chercheur</label>
    <input type="radio" name="type" value="entreprise" id="Entreprise" /> <label for="Entreprise">Entreprise</label>

    <p>Nom : <input type="text" name="nom" /></p>
    <p>Prenom : <input type="text" name="prenom" /></p>
    <p>SIREN : <input type="text" name="siren" /></p>
    <p>Identifiant chercheur :</Identif> : <input type="text" name="idChercheur" /></p>

    <p>Votre message ici: </p>
    <textarea name="description" rows="8" cols="45">
        </textarea>

    <p><input type="submit" value="S'inscrire"/></p>
</form>

</body>
</html>