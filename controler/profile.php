<?php

$title = "Profil";

/* Si l'utilisateur n'est pas connecté, on le redirige sur la page de connexion et on prépare une variable pour le ramener ici ensuite */
if(!(isset($_SESSION["connected"]) && ($_SESSION["connected"] == true)))
{
    $_SESSION['prelogin'] = $_GET['p'];
    header("Location: " . BASE_URL . "/login");
}
else
{
    include_once(ROOT . "/model/profile.php");
    /* Si l'utilisateur a rempli le formulaire mail, on change le mail */
    if (isset($_POST['userMail']) && !($_POST['userMail'] == ""))
    {
        changeMail($_POST['userMail']);
    }
    /* Si l'utilisateur a rempli le formulaire de changement de mot passe, on change le mot de passe */
    if (isset($_POST['userPwd']) && isset($_POST['newPwd']) && isset($_POST['verifPwd']) && !($_POST['userPwd'] == "") && !($_POST['newPwd'] == "") && !($_POST['verifPwd'] == ""))
    {
        changePwd($_POST['userPwd'],$_POST['newPwd'],$_POST['verifPwd']);
    }

    include_once(ROOT . "/view/profile.php");
}