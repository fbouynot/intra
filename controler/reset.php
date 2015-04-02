<?php 
    
    // Est-ce que l'utilisateur vient de soumettre le formulaire email ?
    if (!isset($POST['mailRecup']) || $POST['mailRecup'] == "")
    {
        // Est-ce que l'utilisateur vient de soumettre le formulaire mdp ?
        if (!isset($POST['newPwd']) || $POST['newPwd'] == "")
        {
            // Est-ce que l'utilisateur arrive sur la page avec un jeton de reinitialisation de mot de passe ?
            if (!isset($GET['token'] || $GET['token'] == ""))
            {
                // formulaire d'entree mail
            }
            else
            {
                if (!tokenValid($GET['token']))
                {
                    // Ce lien n'est plus valide.
                }
                else
                {
                    // formulaire d'entree mdp
                }
            }
        }
        else
        {
            // Changer mdp
            // Supprimer jeton
            // Afficher confirmation
        }
    }
    else
    {
        // Vérifier si le mail est dans la db
        if (!mailExists($POST['mailRecup']))
        {
            // Afficher "Adresse email incorrecte."
        }
        else
        {
            // generer un jeton
            // ajouter le jeton
            // envoyer un email
        }
    }
    include_once(ROOT . "/view/reset.php");