<?php
$sql="INSERT INTO lien VALUES(NULL,?,?,'en attente')";
$q = $pdo->prepare($sql);
$q -> execute(array($_SESSION['id'],$_POST['cible']));
?>