<?php

    function changePwd($oldPwd, $newPwd, $verifPwd)
    {
        /* Racine de la recherche */
        $dn = "OU=RH,DC=oiio,DC=loc";
        /* Nom de compte recherché */
        $filter = "(sAMAccountName=" . $_SESSION['userName'] . ")";
        /* Connexion au LDAP de manière sécurisée (ldaps / port 636) */
        $ad = @ldap_connect("ldaps://cd1.oiio.loc",636) or die("Connexion à l'active directory impossible.");
        /* Options pour le LDAP */
        ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);
        /* Connexion en tant qu'utilisateur */
        if ($bd = @ldap_bind($ad, $_SESSION['userName'] . "@oiio.loc", $oldPwd))
        {
            /* On récupère le nombre de mauvais mot de passe entrés et le chemin complet de l'utilisateur */
            $result = ldap_search($ad,$dn,$filter,array("badpwdcount", "dn")) or die ("Erreur de recherche  : " . ldap_error($ad));
            $result = ldap_get_entries($ad, $result);
            /* On vérifie que les mauvais mot de passe sont inferieurs à 3 */
            if ($result[0]['badpwdcount'][0] == 3)
            {
                echo "Compte bloqué. Veuillez contacter votre administrateur systèmes.";
                return false;
            }
            else if ($newPwd != $verifPwd)
            {
                echo "Les deux mots de passe ne correspondent pas.";
                return false;
            }
            else if (strlen($newPwd) < 7)
            {
                echo "Votre mot de passe doit contenir au moins 7 charactères.";
                return false;
            }
            else if (!preg_match("/[0-9]/",$newPwd))
            {
                echo "Votre mot de passe doit contenir au moins un chiffre.";
                return false;
            }
            else if (!preg_match("/[a-z]/",$newPwd))
            {
                echo "Votre mot de passe doit contenir au moins une minuscule.";
                return false;
            }
            else if (!preg_match("/[A-Z]/",$newPwd))
            {
                echo "Votre mot de passe doit contenir au moins une majuscule.";
                return false;
            }
            else
            {
                /* Préparation de la requête. */
                $entry = array(
                    array(
                        "attrib"  => "unicodePwd",
                        "modtype" => LDAP_MODIFY_BATCH_REMOVE,
                        "values"  => array(iconv("UTF-8", "UTF-16LE", '"' . $oldPwd . '"'))
                    ),
                    array(
                        "attrib"  => "unicodePwd",
                        "modtype" => LDAP_MODIFY_BATCH_ADD,
                        "values"  => array(iconv("UTF-8", "UTF-16LE", '"' . $newPwd . '"'))
                    )
                );
                /* Changement du mot de passe */
                if (!ldap_modify_batch($ad, $result[0]['dn'], $entry))
                {
                    echo "Votre mot de passe ne peut pas être changé. Contactez votre administrateur systèmes.";
                }
                else
                {
                    echo "Votre mot de passe a été changé.";
                    $_SESSION['userPwd'] = $newPwd;
                }
            }       
            ldap_unbind($ad);        
        }
        else
        {
            echo "Mot de passe incorrect.";
        }
        
    }

    function changeMail ($newMail)
    {
        /* On vérifie que l'adresse mail est correctement formatée. */
        if (!filter_var($newMail, FILTER_VALIDATE_EMAIL))
        {
            echo "Adresse mail incorrecte";
            return false;
        }
        /* Racine de la recherche */
        $dn = "OU=RH,DC=oiio,DC=loc";
        /* Nom de compte recherché */
        $filter = "(sAMAccountName=" . $_SESSION['userName'] . ")";
        /* Connexion au LDAP de manière sécurisée (ldaps / port 636) */
        $ad = @ldap_connect("ldaps://cd1.oiio.loc",636) or die("Connexion à l'active directory impossible.");
        ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);
        /* Recuperer le mot de passe */
        $file = fopen("d:\LDAP\aaa.exe","r");
        $pwd = fgets($file);
        fclose($file);
        /* Connexion en tant qu'Administrateur, nécessaire au changement de mail */
        if ($bd = @ldap_bind($ad, Administrateur . "@oiio.loc", $pwd))
        {
            /* On récupère le dn (chemin complet objet compris) necesaire à la requête */
            $addn = ldap_search($ad,$dn,$filter,array("dn")) or die ("Erreur de recherche  : " . ldap_error($ad));
            $addn = ldap_get_entries($ad, $addn);
            /* On change le mail */
            ldap_modify($ad, $addn[0]['dn'], array("mail" => array($newMail)));
            $_SESSION['userMail'] = $newMail;
        }
        ldap_unbind($ad);
    }

    function changePhone ($number)
    {
            
        // If you want to clean the variable so that only + - . and 0-9 can be in it you can:
        $number = filter_var($number, FILTER_SANITIZE_NUMBER_INT);

        // If you want to clean it up manually you can:
        $phone = preg_replace('/[^0-9]/', '', $number);

        // If you want to check the length of the phone number and that it's valid you can:
        if(strlen($number) === 10) {
            if (!preg_match('/^[0-9]{10}$/',$number)) {
                echo "Numéro de téléphone incorrect.";
                return false;
            }
        }
        /* Racine de la recherche */
        $dn = "OU=RH,DC=oiio,DC=loc";
        /* Nom de compte recherché */
        $filter = "(sAMAccountName=" . $_SESSION['userName'] . ")";
        /* Connexion au LDAP de manière sécurisée (ldaps / port 636) */
        $ad = @ldap_connect("ldaps://cd1.oiio.loc",636) or die("Connexion à l'active directory impossible.");
        ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);
        /* Recuperer le mot de passe */
        $file = fopen("d:\LDAP\aaa.exe","r");
        $pwd = fgets($file);
        fclose($file);
        /* Connexion en tant qu'Administrateur, nécessaire au changement de mail */
        if ($bd = @ldap_bind($ad, Administrateur . "@oiio.loc", $pwd))
        {
            /* On récupère le dn (chemin complet objet compris) necesaire à la requête */
            $addn = ldap_search($ad,$dn,$filter,array("dn")) or die ("Erreur de recherche  : " . ldap_error($ad));
            $addn = ldap_get_entries($ad, $addn);
            /* On change le mail */
            ldap_modify($ad, $addn[0]['dn'], array("homePhone" => array($phone)));
            $_SESSION['userPhone'] = $phone;
        }
        ldap_unbind($ad);
    }


    function changeAddress ($address)
    {
            
        /* Racine de la recherche */
        $dn = "OU=RH,DC=oiio,DC=loc";
        /* Nom de compte recherché */
        $filter = "(sAMAccountName=" . $_SESSION['userName'] . ")";
        /* Connexion au LDAP de manière sécurisée (ldaps / port 636) */
        $ad = @ldap_connect("ldaps://cd1.oiio.loc",636) or die("Connexion à l'active directory impossible.");
        ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);
        /* Recuperer le mot de passe */
        $file = fopen("d:\LDAP\aaa.exe","r");
        $pwd = fgets($file);
        fclose($file);
        /* Connexion en tant qu'Administrateur, nécessaire au changement de mail */
        if ($bd = @ldap_bind($ad, Administrateur . "@oiio.loc", $pwd))
        {
            /* On récupère le dn (chemin complet objet compris) necesaire à la requête */
            $addn = ldap_search($ad,$dn,$filter,array("dn")) or die ("Erreur de recherche  : " . ldap_error($ad));
            $addn = ldap_get_entries($ad, $addn);
            /* On change le mail */
            ldap_modify($ad, $addn[0]['dn'], array("homePostalAddress" => array($address)));
            $_SESSION['userAddress'] = $address;
        }
        ldap_unbind($ad);
    }