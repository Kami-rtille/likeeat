<?php
$sql="DELETE FROM ecrit WHERE id=?";
$q = $pdo->prepare($sql);
$q -> execute(array($_POST['cible']));
header("Location:".$_SERVER['HTTP_REFERER']);
?>