<?php

    $dn = "OU=RH,DC=oiio,DC=loc";
    $filter = "(sAMAccountName=fbouynot)";
    $attr = array("mail", "sn", "givenname", "samaccountname");
    $ad = ldap_connect("ldap://cd2.oiio.loc") or die("Couldn't connect to AD!");
    ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);
    if ($bd = @ldap_bind($ad, $_SESSION['userName'] . "@oiio.loc", $_SESSION['userPwd']))
    {
        $result = ldap_search($ad,$dn,$filter,$attr) or die ("Erreur de recherche  : " . ldap_error($ad));
        $result = ldap_get_entries($ad, $result);
    }
    ldap_unbind($ad);

    function changePwd($oldPwd, $newPwd, $verifPwd)
    {
        $dn = "OU=RH,DC=oiio,DC=loc";
        $filter = "(sAMAccountName=fbouynot)";
        $ad = @ldap_connect("ldaps://cd2.oiio.loc",636) or die("Couldn't connect to AD!");
        ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);
        if ($bd = @ldap_bind($ad, $_SESSION['userName'] . "@oiio.loc", $oldPwd))
        {
            $result = ldap_search($ad,$dn,$filter,array("badpwdcount", "dn")) or die ("Erreur de recherche  : " . ldap_error($ad));
            $result = ldap_get_entries($ad, $result);
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
                /*$entry = array();
                $entry["userPassword"] = "{SHA}" . base64_encode(pack("H*", sha1($newPwd)));
                
                function adifyPw($pw)
                {
                     return iconv("UTF-8", "UTF-16LE", '"' . $pw . '"');
                }*/

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
                
                if (!ldap_modify_batch($ad, $result[0]['dn'], $entry))
                {
                    echo "Votre mot de passe ne peut pas être changé. Contactez votre administrateur systèmes.";
                }
                else
                {
                    echo "Votre mot de passe a été changé.";
                }
            }       
            ldap_unbind($ad);        
        }
        else
        {
            echo "Mot de passe incorrect.";
        }
        
    }

// Récupérer pwdcount --> Vérifier PwdCount --> Vérifier mdp (, majuscules / minuscules / chiffres / confirmation) --> Définir mot de passe 