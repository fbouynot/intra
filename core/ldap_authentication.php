<?php

/* Si l'utilisateur n'est pas déjà considéré comme connecté mais que ses identifiants et mot de passe sont disponibles, on tente de le connecter via l'AD */
if(!(isset($_SESSION["connected"]) && ($_SESSION["connected"] == true)))
{
    if((isset($_POST["userName"]) == true) && (isset($_POST["userPwd"]) == true))
    {
        /* La raçine de notre recherche */
        $dn = "OU=RH,DC=oiio,DC=loc";
        /* Ce que l'on cherche */
        $filter = "(sAMAccountName=" . $_POST['userName'] . ")";
        /* Les attributs recherchés : mail, prenom, nom de famille, login */
        $attr = array("mail", "sn", "givenname", "samaccountname");
        /* Contact de l'AD */
        $ad = ldap_connect("ldap://cd2.oiio.loc") or die("Couldn't connect to AD!");
        ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);
        /* Connexion à l'AD avec les identifiants de l'utilisateur. Si c'est accepté, on connecte l'utilsateur. */
        if (@$bd = ldap_bind($ad, $_POST['userName'] . "@oiio.loc", $_POST['userPwd']))
        {
            $result = ldap_search($ad,$dn,$filter,$attr) or die ("Erreur de recherche  : " . ldap_error($ad));
            $result = ldap_get_entries($ad, $result);
            
            @$_SESSION['sn'] = $result[0]['sn'][0];
            $_SESSION['givenName'] = $result[0]['givenname'][0];
            @$_SESSION['mail'] = $result[0]['mail'][0];
            $_SESSION["connected"] = true;
            $_SESSION["userName"] = $_POST["userName"];
            $_SESSION["userPwd"] = $_POST["userPwd"];
        }
        /* Deconnexion de l'AD. */
        ldap_unbind($ad);
    }
}