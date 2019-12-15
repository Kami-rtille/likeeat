<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Ma feuille de style à moi -->
     <link rel="stylesheet" type="text/css" href="css/style.css" />
      <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <title>Like eat</title>
</head>
    <body>

<nav class="enregistre">
<h6>Rejoins Nous !</h6>
<div id='color'><div id='motif'></div></div>

<form method="POST" action="index.php?action=newuser" class="inscristoi">
<input type="text" name="login" placeholder="Choisis ton login">
<input type="mail" name="email" placeholder="Adresse Mail ">
<input type="password" name="mdp" placeholder="Mot de Passe">
<button type="submit" class="submit">Incription</button>
</form>

 <a href="log.php"> Tu as dejà un compte ? <br/><span> Connecte toi !</span></a>

 </nav>

 <nav class="connexion">
    <h6>Connecte toi !</h6>
    <div id='color2'></div>
<form action="index.php?action=connexion" method="POST" class="connectetoi">
<input type="text" id="login" name="login" placeholder="Login" />
<input type="password" id="password" name="password" placeholder="Mot de Passe"/>
<button type="submit" value="Connexion" class="submit"/>Connexion</button>
</form>


 <a href="log.php"> Tu n'as pas de compte ? <br/><span> Inscris toi !</span></a>
</nav>

</body>
</html>