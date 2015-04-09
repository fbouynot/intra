<?php

/* Si l'utilisateur est connecté, on le ramène sur la page précédente. Sinon, on lui affiche le formulaire de connexion. */
if(!(isset($_SESSION["connected"]) && ($_SESSION["connected"] == true)))
{
    include_once(ROOT . "/view/login.php");
}
else
{
    header("Location: " . BASE_URL . "/" . $_SESSION['prelogin']);
}