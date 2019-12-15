<?php
print_r($_POST);
$sql="UPDATE lien SET etat='ami' WHERE idUtilisateur1=? AND idUtilisateur2=?";
$q = $pdo->prepare($sql);
$q -> execute(array($_POST['cible'], $_SESSION['id']));
header("Location:".$_SERVER['HTTP_REFERER']);
?>