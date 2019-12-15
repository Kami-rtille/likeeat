<?php

if(!empty($_POST)){
	extract($_POST);
	$valid=true;
}
if (isset($_POST['search'])){
	$contenu = (String) trim($contenu);

	if(empty($contenu)){
		$valid=false;
		echo "Remplissez le champs";
			}
		if($valid){
			$req_search = $pdo -> prepare("SELECT login FROM user WHERE login LIKE CONCAT(?,'%') LIMIT 100");
			$req_search->execute(array($contenu));
			$req_search = $req_search->fetchAll();

			if(count($req_search) == 0){
				echo "aucun resultat";
			}
			foreach($req_search as $user){
				echo "<div>".$user['login']."<div>";
			}	
		}
	

}


?>