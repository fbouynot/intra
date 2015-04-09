<?php

/* Si l'utilisateur n'est pas déjà considéré comme connecté mais que ses identifiants et mot de passe sont disponibles, on tente de le connecter via l'AD */
if(!(isset($_SESSION["connected"]) && ($_SESSION["connected"] == true)))
{
    if((isset($_POST["userName"]) == true) && (isset($_POST["userPwd"]) == true))
    {
        /* La raçine de notre recherche */
        $dn = "OU=RH,DC=oiio,DC=loc";
        /* Ce que l'on cherche */
        $filter = "(cn=*)";
        /* Contact de l'AD */
        $ad = ldap_connect("ldap://cd2.oiio.loc") or die("Couldn't connect to AD!");
        ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);
        /* Connexion à l'AD avec les identifiants de l'utilisateur. Si c'est accepté, on connecte l'utilsateur. */
        if (@$bd = ldap_bind($ad, $_POST['userName'] . "@oiio.loc", $_POST['userPwd']))
        {
            $_SESSION["connected"] = true;
            $_SESSION["userName"] = $_POST["userName"];
            $_SESSION["userPwd"] = $_POST["userPwd"];
        }
        /* Deconnexion de l'AD. */
        ldap_unbind($ad);
    }
}