<?php
$sql="SELECT * FROM user";
$q = $pdo -> prepare($sql);
$q -> execute();
while($line=$q->fetch()) {
	echo "<div id='user'>".$line['login']."<div>";
	echo "<form method='post' action='index.php?action=demand'>";
	echo "<input type='hidden' name='cible' value='".$line['id']."'/>";
	echo "<button type='submit'>ajouter en ami</button>";
	echo "</form>";
}

?>
