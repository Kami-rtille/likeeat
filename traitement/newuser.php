<?php

$sql = "INSERT INTO user VALUES(NULL, ?, PASSWORD(?), ?, NULL, NULL)";
$q = $pdo->prepare($sql);

$q->execute(array($_POST['login'], $_POST['mdp'], $_POST['email']));
header("Location:".$_SERVER['HTTP_REFERER']);
?>