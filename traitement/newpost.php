<?php
$sql = "INSERT INTO ecrit VALUES(NULL,?,?,NOW(),?,?)";
$q = $pdo->prepare($sql);
$q->execute(Array($_POST['titre'], $_POST['contenu'], $_SESSION['id'], $_POST['Ami']));
header("Location:".$_SERVER['HTTP_REFERER']);

?>