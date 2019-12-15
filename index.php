<?php

include("config/bd.php"); // commentaire
include("divers/balises.php");
include("config/actions.php");
session_start();

ob_start(); // Je démarre le buffer de sortie : les données à afficher sont stockées


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Like eat</title>


  <link href="style2.css" />

    <!-- Ma feuille de style à moi -->

    <script src="js/jquery-3.2.1.min.js"></script>
</head>

<body>
<div class='logo' ><img src='img/logo.svg'/></div>

<?php
if (isset($_SESSION['info'])) {
    echo "<div>
          <strong>Information : </strong> " . $_SESSION['info'] . "</div>";
    unset($_SESSION['info']);
}
?>

<nav>
    <ul>
       <header>
        <?php
        if (isset($_SESSION['id'])) {
            echo "<div id='compte'>Hello ".$_SESSION['login'];
            echo "<a href='index.php?action=deconnexion' id='logout'><br/> Deconnexion</a></div>";
            echo "<a id='amis' href='index.php?action=utilisateur'>Les eat'eurs</a>";
        } else {
           
        }
        ?>
 </header>
 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" "><path fill="#f76464" fill-opacity="1" d="M0,32L80,74.7C160,117,320,203,480,202.7C640,203,800,117,960,101.3C1120,85,1280,139,1360,165.3L1440,192L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>
    </ul>
</nav>




            <?php
            // Quelle est l'action à faire ?
            if (isset($_GET["action"])) {
                $action = $_GET["action"];
            } else {
                $action = "accueil";
            }

            // Est ce que cette action existe dans la liste des actions
            if (array_key_exists($action, $listeDesActions) == false) {
                include("vues/404.php"); // NON : page 404
            } else {
                include($listeDesActions[$action]); // Oui, on la charge
            }

            ob_end_flush(); // Je ferme le buffer, je vide la mémoire et affiche tout ce qui doit l'être
 
            ?>


<footer> 
  <!-- logo -->
    <img src=""/>
    <img src=""/>
    <img src=""/>
</footer>
</body>
</html>
