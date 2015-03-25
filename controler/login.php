<?php

    include_once(ROOT . "/view/login.php");
    
if(!(isset($_SESSION["connected"]) && ($_SESSION["connected"] == true)))
{
    include_once(ROOT . "/view/login.php");
}
else
{
    header("Location: " . BASE_URL . "/" . $_SESSION['prelogin']);
}