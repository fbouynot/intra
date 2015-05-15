<?php

    $title = "CV";

/* Si l'utilisateur n'est pas connecté, on le redirige sur la page de connexion et on prépare une variable pour le ramener ici ensuite */
if(!(isset($_SESSION["connected"]) && ($_SESSION["connected"] == true)))
{
    $_SESSION['prelogin'] = $_GET['p'];
    header("Location: " . BASE_URL . "/login");
}
else
{
    include_once(ROOT . "/view/cv.php");
}