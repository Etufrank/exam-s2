<!DOCTYPE html>
<html>
<head>
    <title>Connexion / Inscription</title>
    
</head>
<body>

<h2>Se connecter</h2>
<form action="../inc/login.php" method="POST">
    <input name="email" placeholder="Email" required><br>
    <input type="password" name="mdp" placeholder="Mot de passe" required><br>
    <button type="submit">Connexion</button>
</form>

<h2>Creer un compte</h2>
<form action="../inc/inscription.php" method="POST" enctype="multipart/form-data">
    <input name="nom" placeholder="Nom" required><br>
    <input type="date" name="date_naissance" required><br>
    <select name="genre">   
                            <option>H</option>
                            <option>F</option></select>
                        <br>
    <input name="email" placeholder="Email" required><br>
    <input name="ville" placeholder="Ville" required><br>
    <input type="password" name="mdp" placeholder="Mot de passe" required><br>
    <input type="file" name="image" required><br>
    <button type="submit">S'inscrire</button>
</form>

</body>
</html>
