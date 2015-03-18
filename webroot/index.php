<?php

define('WEBROOT',dirname(__FILE__));
define('ROOT',dirname(WEBROOT));
define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));

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
include_once ROOT . "/controler/".$_GET['p'].".php";
$content = ob_get_clean(); // Récupération du contenu
include_once(WEBROOT . "/template.php");