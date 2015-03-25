<?php

if(!(isset($_SESSION["connected"]) && ($_SESSION["connected"] == true)))
{
    $_SESSION['prelogin'] = $_GET['p'];
    header("Location: " . BASE_URL . "/login");
}
else
{
    include_once(ROOT . "/model/profile.php");
    if (isset($_POST['userMail']) && !($_POST['userMail'] == ""))
    {
        changeMail("coucou@lala.com");
    }
    if (isset($_POST['userPwd']) && isset($_POST['newPwd']) && isset($_POST['verifPwd']) && !($_POST['userPwd'] == "") && !($_POST['newPwd'] == "") && !($_POST['verifPwd'] == ""))
    {
        changePwd($_POST['userPwd'],$_POST['newPwd'],$_POST['verifPwd']);
    }

    @$sn = $result[0]['sn'][0];
    $givenName = $result[0]['givenname'][0];
    @$mail = $result[0]['mail'][0];

    include_once(ROOT . "/view/profile.php");
}