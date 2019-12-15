<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Ma feuille de style à moi -->
     <link rel="stylesheet" type="text/css" href="css/style2.css" />
      <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <title>Like eat</title>
</head>
<?php
echo "<div class='screen'></div>";;
echo "<div id='profil'><a href='index.php?action=profil'>Modifier le profil </a>";
// echo "<img id='pdp' src='uploads/".$_SESSION['avatar']."'/>";

//photo
// $sql = "SELECT avatar FROM user";
// $q=$pdo->prepare($sql);
// $q->execute();
//echo "<img src='uploads/" . $_SESSION['avatar'] . "'/>"; 

$sql="SELECT * FROM user WHERE id=?";
$q = $pdo->prepare($sql);
$q -> execute(array($_GET['id']));
$personne=$q->fetch();

$sql = "SELECT *, ecrit.id as ecritid FROM ecrit JOIN user ON idAuteur=user.id WHERE idami=? ORDER BY ecrit.id DESC";
$q=$pdo->prepare($sql);
$q->execute(array($_GET['id']));

//ecrire un message
echo "<div id='fil'>";
echo 
'<form method="POST" action="index.php?action=newpost" id="jetenvoieunmessage">
<h2 id="destinataire">Ecris un message a"'.$personne["prenom"].''.$personne["nom"].'</h2>
<input type=text name="titre" placeholder="Titre du message" id="titlemess"/>
<input type="hidden" name="Ami" value='.$_GET['id'].'/>
<textarea id="contenumess" name="contenu" placeholder="Message"></textarea>
<input type="submit" id="valider">
</form>';


//messages

while($l = $q->fetch()) {
	$ida = $l['idAuteur'];
	echo"<div id='message'>";
    echo "<h2 id='titre'>".$l['titre']."</h2>";
    echo "<p id='contenu'>".$l['contenu']."<br/>"."<span></p>";
    echo "<p> ecrit par <a href='index.php?action=mur&id=$ida'>".$l['login']."</a></span></p>";   
 if($l['idAuteur'] == $_SESSION['id']){
    echo "<form method='post' action='index.php?action=delete'>";
    echo "<input type='hidden' name='cible' value='".$l['ecritid']."/>";
    echo "<button id='button' type='submit'>Supprimer</button>";
    echo "</form>";
}
    echo "</div>";
    echo '<br/>';
}

echo "</div>";
echo "</div>";

echo "<div class='panneaulateral'></div>";
//ici nous devons afficher le post 

//Recherche de personne parmis les utilisateurs
echo '</div>
<form method="post" action="index.php?action=search">
<input type="text" id="recherche" name="contenu" placeholder="  Recherche"/>
<button value="submit" name="search"></button>
</form>
</div>';

echo '<div id="mesamis">';
echo '<h3 >Mes amis</h3>';
echo '<br/>';

$sql = "SELECT DISTINCT user.* FROM user JOIN lien ON user.id =lien.idUtilisateur2 OR user.id = lien.idUtilisateur1 WHERE (idUtilisateur1 = ? OR idUtilisateur2 = ?) AND etat='ami' AND user.id!=?";
$q = $pdo->prepare($sql);
$q -> execute(array($_SESSION['id'],$_SESSION['id'],$_SESSION['id']));
while($l = $q->fetch()) {
    $id = $l['id'];
    echo "<a href='index.php?action=mur&id=$id'>".$l['prenom'].$l['nom']."</a>";
    echo '<br/>';
}
echo '</div>';

echo '<div id="mesdemandes">';
echo '<h3> Mes demandes </h3>';
echo '<br/>';
$sql="SELECT user.* FROM user JOIN lien ON user.id = lien.idUtilisateur1 WHERE idUtilisateur2 = ? AND etat='en attente'";
$q = $pdo->prepare($sql);
$q -> execute(array($_SESSION['id']));
while($n = $q->fetch()) {
    echo $n['login'];
    echo "<form method='post' action='index.php?action=accept'>";
    echo "<input type='hidden' name='cible' value='".$n['id']."'/>";
    echo "<button type='submit'>Accepter</button>";
    echo "</form>";
    echo "<form method='post' action='index.php?action=refused'>";
    echo "<input type='hidden' name='cible' value='".$n['id']."'/>";
    echo "<button type='submit'>Refuser</button>";
    echo "</form>";
    echo '<br/>';
echo "</div>";

}
if($n==0){
    echo '<p> Aucune demandes </p>';
}


?>
