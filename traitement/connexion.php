<?php
if(isset($_POST['login']) == false ) {
		header("Location: index.php?action=login");

} else {
$sql = "SELECT * FROM user WHERE login=? AND mdp=PASSWORD(?)";

$query = $pdo->prepare($sql); // Etpae 1 : On prépare la requête
	                              //  et celle-ci a un paramètre optionnel
	
	
	$query->execute(array($_POST['login'],$_POST['password'])); 
	// Etape 2 :On l'exécute. 
	                                        // On remplace le ? par l'année donnée 

	
	if ($line = $query->fetch()) { // Etape 3 : on parcours le résultat
		$_SESSION['id']=$line['id'];
		$_SESSION['login']=$line['login'];
		$_SESSION['avatar'] = $line['avatar'];
		$_SESSION['prenom'] = $line['prenom'];
		$_SESSION['nom'] = $line['nom'];

		header("Location: index.php?action=mur&id=".$_SESSION['id']);
	}   else{
		message("MDP/ID incorrects");
		header("Location:".$_SERVER['HTTP_REFERER']);
}
}


?>