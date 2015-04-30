<?php

$title = "Déconnexion";

/* Si l'utilisateur est connecté, on le ramène sur la page précédente. Sinon, on lui affiche le formulaire de connexion. */
if(isset($_SESSION["connected"]) && ($_SESSION["connected"] == true))
{
    $_SESSION = array();
    session_destroy();
}

/* Redirection vers la page d'accueil */
header("Location: " . BASE_URL . "/");
