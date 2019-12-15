<?php

if ($_GET['action'] == "deconnexion")
        {
                        session_destroy();
                        unset($_SESSION);
                        setcookie('login');
                        setcookie('mdp');
                       
       
        }

        header("Location:log.php");


?>