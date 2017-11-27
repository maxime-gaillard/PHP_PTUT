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
        <label for="Email">Adresse mail :</label>
        <input type="email" name='Email' id="Email" />
    </div>

    <div>
        <label for="MotDePasse">Mot de passe :</label>
        <input type="password" name="MotDePasse" id="MotDePasse" />
    </div>

    <div class="button">
        <button type="submit">Se connecter</button>
    </div>
</form>

</body>
</html>