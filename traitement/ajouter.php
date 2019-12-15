<?php

if(isset($_GET['id'])){
	$sql = INSERT INTO lien VALUES (?,?,?,?);
	$query = $pdo->prepare($sql);
	$query -> execute(array(NULL, $_SESSION['id'], $_GET['id'], 'En attente'));
}

echo"Votre demande a était envoyé"; 






?>