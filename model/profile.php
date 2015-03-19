<?php

    $dn = "OU=RH,DC=oiio,DC=loc";
    $filter = "(cn=web)";
    $ad = ldap_connect("ldap://cd2.oiio.loc") or die("Couldn't connect to AD!");
    ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);
    if (@$bd = ldap_bind($ad, $_POST['userName'] . "@oiio.loc", $_POST['userPwd']))
    {
        ldap_search();
    }
    ldap_unbind($ad);