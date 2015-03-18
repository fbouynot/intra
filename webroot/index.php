<?php

define('WEBROOT',dirname(__FILE__));
define('ROOT',dirname(WEBROOT));
define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));

session_start();

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

if(!isset($_GET['p']) || $_GET['p'] == "")
{
    $_GET['p'] = 'index';
}

if(strpos($_GET['p'],"/") != false)
{
    $params = explode("/",$_GET['p']);
    $_GET['p'] = $params[1];
}

if(!file_exists(ROOT . "/controler/".$_GET['p'].".php"))
{
    $_GET['p'] = '404';
}
ob_start(); // Suspend l'affichage
include_once(ROOT . "/controler/".$_GET['p'].".php");
$content = ob_get_clean(); // Récupération du contenu
include_once(WEBROOT . "/template.php");