<?php

if(!(isset($_SESSION["connected"]) && ($_SESSION["connected"] == true)))
{
    if((isset($_POST["userName"]) == true) && (isset($_POST["userPwd"]) == true))
    {
        $dn = "OU=RH,DC=oiio,DC=loc";
        $filter = "(cn=*)";
        $ad = ldap_connect("ldap://cd2.oiio.loc") or die("Couldn't connect to AD!");
        ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);
        if (@$bd = ldap_bind($ad, $_POST['userName'] . "@oiio.loc", $_POST['userPwd']))
        {
            $_SESSION["connected"] = true;
            $_SESSION["userName"] = $_POST["userName"];
        }
        ldap_unbind($ad);
    }
}